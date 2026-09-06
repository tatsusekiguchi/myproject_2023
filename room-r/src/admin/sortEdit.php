<?php
require_once '../include/define.php';

// Libs
require_once 'HTML/QuickForm.php';
require_once 'HTML/QuickForm/Renderer/ArraySmarty.php';
require_once 'Bukken.php';
require_once(dirname(__FILE__).'/functions_m.php');

// 共通関数
require_once 'user_function.php';
require_once 'login.php';


// 構造
$optStructures = $CONF['structure'];

// 種目
$optEvents = $CONF['event'];

// 状態
$optStatuses = array(
    '0' => '削除',
    '1' => '公開',
    '2' => '非公開'
);

// ------------------------------------------
// フォーム要素の定義
// ------------------------------------------
$features = getFeature();


//--------------------------------------------------
// Request
//--------------------------------------------------


	define('NUM_PAR_PAGE', 20);
	$page = 1;
	if( !empty($_GET['page']) && is_numeric($_GET['page']) ){
		$garbage = intval($_GET['page']);
		if( $garbage > 0 ){
			$page = $garbage;
		}
	}

	if( isset($_POST["BUKKENMEI"]) ){
		// postデータからurlに付加するgetパラメータの文字列を取得
		$url_params = get_url_params($_POST);
	}else if( !empty($_GET["get"]) && $_GET["get"] == 'true' ){
		// getパラメータから検索条件を取得
		$_POST = array_merge($_POST, get_srch_params_from_get($_GET));
		$url_params = get_url_params($_POST);
	}



// 検索開始
$buildingsList = null;
$formData = null;
$ensen = array();

$title = "";
$pageVal = "";
$pageMode = "";

$altFlg = false;

$orderby = null;
// 条件分岐
if(isset($_GET["sincyaku"])){
    $title = "新着物件";
    $pageVal = $_GET["sincyaku"];
    $pageMode = "sincyaku";
    $orderby = array("sort_sincyaku_c"=>"IS NULL , b.sort_sincyaku_c ASC,b.order_c IS NULL, b.order_c DESC,b.reg_date_c DESC");
}else if(isset($_GET["area"])){
    $title = "エリアから探す";
    $pageVal = $_GET["area"];
    $pageMode = "area";
    $orderby = array("sort_area_c"=>"IS NULL , b.sort_area_c ASC,b.order_c IS NULL, b.order_c DESC,b.reg_date_c DESC");
}else if(isset($_GET["ensen"])){
    $title = "沿線から探す";
    $pageVal = $_GET["ensen"];
    $pageMode = "ensen";
    $orderby = array("sort_ensen_c"=>"IS NULL , b.sort_ensen_c ASC ,b.order_c IS NULL, b.order_c DESC,b.reg_date_c DESC");
}else if(isset($_GET["fid"])){
    $title = "特集";
    $pageVal = $_GET["fid"];
    $pageMode = "fid";
    $orderby = array("sort_c"=>"IS NULL , b.sort_c ASC,order_c IS NULL, b.order_c DESC,b.reg_date_c DESC");
}else{
    header("Location:index.php");
    die();
}
if(isset($_POST["renewSort"]) && $_POST["renewSort"] == "順位を更新"){
    // 表示更新ボタン押下
    $sql = array();
    $table = "";
    $colmun = "";
    $whereOption = "";
    switch ($pageMode) {
        case 'sincyaku':
            $table = "buildings_t";
            $colmun = "sort_sincyaku_c";
            break;
        case 'area':
            $table = "buildings_t";
            $colmun = "sort_area_c";
            break;
        case 'ensen':
            $table = "buildings_t";
            $colmun = "sort_ensen_c";
            break;
        case 'fid':
            $table = "feature_details_t";
            $colmun = "sort_c";
            $whereOption = " AND feature_id_c = ".$mdb2->quote($pageVal,"text");
            break;
        default:
            # code...
            break;
    }
    foreach($_POST["sort"] as $key=>$val){
        $val = trim($val);
        if($val != ""){
            $sql[] = "UPDATE ".$table." SET ".$colmun." = ".$mdb2->quote($val, 'integer')." WHERE building_id_c = ".$mdb2->quote($key, 'integer').$whereOption;
        }else{
            $sql[] = "UPDATE ".$table." SET ".$colmun." = NULL WHERE building_id_c = ".$mdb2->quote($key, 'integer').$whereOption;
        }
    }

    if(isset($sql[0])){
        foreach ($sql as $key => $query) {
            $result = $mdb2->exec($query);
            if ( PEAR::isError($result) ) {
                die($result->getMessage());
            }
        }
        $altFlg = true;
    }
}

if(isset($_POST["BUKKENMEI"])){
    $formData = $_POST;

    // 沿線検索の初期値設定
    if(isset($formData["searchEnsen"])){
        foreach($formData["searchEnsen"] as $key => $val){
            $ensen[$key]["ensen"] = $val;
        }
        if( !empty($formData["searchStation"]) && is_array($formData["searchStation"]) ){
        foreach($formData["searchStation"] as $key => $val){
            $ensen[$key]["station"] = $val;
        }
        }
    }
}
$obj = new Bukken();
$formData["searchBuilding"] = "building";
if(isset($_GET["fid"])){
    $formData["searchFeature"] = $pageVal;
}

// 総件数取得
$buildingsList = $obj->getBuildingsList($formData, $orderby);
$cnt_all = count($buildingsList);

$g2 = $orderby;

$sort = '';
$order = '';
$g = null;
if( !empty($_GET['sort']) && is_string($_GET['sort']) && !empty($_GET['order']) && is_string($_GET['order']) ){
	if( preg_match('#^[a-zA-Z0-9_\-]+_c$#', $_GET['sort']) && preg_match('#^(ASC)|(DESC)$#', $_GET['order']) ){
		$sort = $_GET['sort'];
		$order = $_GET['order'];
		$g = array($_GET['sort'] => $_GET['order']);
	}
}

if( !empty($g) ){ $g2 = $g;}

// リスト取得
$buildingsList = $obj->getBuildingsList($formData, $g2, NUM_PAR_PAGE*($page-1), NUM_PAR_PAGE);
/*
$bukkenmei = '';
if (isset($_POST['BUKKENMEI'])) {
    $bukkenmei = mb_trim($_POST['BUKKENMEI']);
}

$buildingsList = getBuildingList($bukkenmei);
*/


	// ページ設定
	define("PAGINATION_RANGE", 7);

	$p['page'] = $page;
	$p['cnt_all'] = $cnt_all;
	$p['cnt_start'] = ($page - 1) * NUM_PAR_PAGE + 1;
	$p['cnt_end'] = $page * NUM_PAR_PAGE;
	$p['pagination'] = array();

	$gs = $page - floor(PAGINATION_RANGE / 2);
	if( $gs < 1 ){ $gs = 1;}

	$ge = $gs + PAGINATION_RANGE;
	$gmx = ceil($cnt_all / NUM_PAR_PAGE);
	if( $ge > $gmx ){ $ge = $gmx + 1;}

	for($i=$gs; $i<$ge; $i++){
		$p['pagination'][] = $i;
	}


	$url_params_sub = array();

	$url_params_sub['page'] = '';
	if( !empty($page) ){ $url_params_sub['page'] = '&page='.$page;}

	$url_params_sub['sort'] = '';
	if( !empty($sort) && !empty($order) ){ $url_params_sub['sort'] = '&sort='.$sort.'&order='.$order;}


	$sort_link_param = array();
	$sort_link_param['building_no_c'] = get_param_text_sort_link('building_no_c', $url_params_sub);
	$sort_link_param['building_name_c'] = get_param_text_sort_link('building_name_c', $url_params_sub);







$tpl_path = 'sortEdit.tpl';
//--------------------
// レンダリング
//--------------------
$smarty->assign('buildings', $buildingsList);
$smarty->assign('structures', $optStructures);
$smarty->assign('events', $optEvents);
$smarty->assign('statuses', $optStatuses);
$smarty->assign('area', $CONF['area']);
$smarty->assign('flg', $CONF['flg']);
$smarty->assign('feature', $CONF['feature']);
$smarty->assign('station', $CONF['station']);
$smarty->assign('transport', $CONF['transport']);
$smarty->assign('transport_station', $CONF['transport_station']);
$smarty->assign('equipment', $CONF['equipment']);
$smarty->assign('ensen', $ensen);
$smarty->assign('layout', $CONF['layout_regist']);
//$smarty->assign('bukkenmei', $bukkenmei);
$smarty->assign('features', $features);
$smarty->assign('formData', $formData);
$smarty->assign('sortFlg', "1");
$smarty->assign('title',$title);
$smarty->assign('pageVal', $pageVal);
$smarty->assign('pageMode', $pageMode);
$smarty->assign('altFlg', $altFlg);
$smarty->assign('p', $p);
$smarty->assign('urlp', $url_params);
$smarty->assign('urlps', $url_params_sub);
$smarty->assign('sort_link_param', $sort_link_param);
$smarty->assign('ku_nagoya', $CONF['ku_nagoya']);
$smarty->display($tpl_path);
exit;

//--------------------
// メソッド
//--------------------

/**
 * 建物情報を取得する
 *
 * @param integer $building_id
 * @return array
 */
/*
function getBuildingList($name = '')
{
    global $CONF, $mdb2, $logger;
    $arrWhere = array();
    $arrWhere[] = 'b.status_c != 0';
    if ($name != '') {
        $search = '%' . $name . '%';
        $arrWhere[] = "(b.building_name_c LIKE " . $mdb2->quote($search, 'text') . " OR b.building_furigana_c LIKE " . $mdb2->quote($search, 'text') . ")";
    }
    $query = 'SELECT b.*,(SELECT COUNT(h.house_id_c) FROM houses_t AS h WHERE h.building_id_c= b.building_id_c AND h.status_c!=0) AS house_count_c FROM buildings_t AS b ';
    $query .= ' WHERE ' . implode(' AND ', $arrWhere);
    $query .= ' ORDER BY b.building_furigana_c ASC';
    $result = $mdb2->query($query);
    if ( PEAR::isError($result) ) {
//        $logger->info($query);
        die($result->getMessage());
    }

    $line = array();

    while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
        $res['area_array_c'] = explode(',', $res['area_c']);
        $line[] = $res;
    }
    return $line;

}
*/

/**
 * 部屋情報を取得する
 *
 * @param integer $building_id
 * @return array
 */
function getHouses($building_id)
{
    global $CONF, $mdb2, $logger;

    $query = 'SELECT * FROM houses_t WHERE building_id_c = ' . $mdb2->quote($building_id, 'integer');
    $result = $mdb2->query($query);
    if ( PEAR::isError($result) ) {
        die($result->getMessage());
    }

    $line = array();

    while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
        $line[] = $res;
    }
    return $line;
}

/**
 * 建物情報を削除する
 *
 * @param integer $building_id
 */
function deleteBuilding($building_id)
{
    global $CONF, $mdb2, $logger;

    $query = 'UPDATE buildings_t SET status_c=0 WHERE building_id_c = ' . $mdb2->quote($building_id, 'integer');
    $result = $mdb2->exec($query);

    if ( PEAR::isError($result) ) {
        die($result->getMessage());
    }
}

/**
 * ピックアップ情報を取得する
 *
 * @param integer $building_id
 * @return array
 */
function getPickupList()
{
    global $CONF, $mdb2, $logger;

    $query = 'SELECT * FROM pickup_t';
    $result = $mdb2->query($query);
    if ( PEAR::isError($result) ) {
        die($result->getMessage());
    }

    $line = array();

    while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
        $line[$res['building_id_c']] = "1";
    }
    return $line;

}
?>
