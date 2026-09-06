<?php
require_once '../include/define.php';
require_once(dirname(__FILE__).'/functions_m.php');
require_once(dirname(__FILE__).'/define_m.php');

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

	$bid = '';
	if( !empty($_GET["bid"]) && is_numeric($_GET["bid"]) ){
		$_POST['srchBuildingId'] = $_GET['bid'];
		$bid = $_GET['bid'];
	}

	// 部屋の削除
	if( !empty($_GET['dl']) && $_GET['dl'] === 'y' && !empty($_GET['hid']) && is_numeric($_GET['hid']) ){
		deleteHouse($_GET['hid'],$bid);// 部屋削除
		$redirect = 'houseList.php';
		if( !empty($bid) ){ $redirect .= '?bid='.$bid;}
		if( !empty($_GET['back2buildingsList']) ) $redirect = "buildingsList.php";
		set_result_set(true, '部屋を削除しました。');
		header('Location: '.$redirect);
		exit;
	}

	// 公開状況の更新
	if( !empty($_POST['houses_publish']) && is_array($_POST['houses_publish']) ){
		$rooms = array(array(), array(), array());
		while( list($k, $v) = each($_POST['houses_publish']) ){
			$v = intval($v);
			if( $v < 0 || $v > 2 ) continue;
			$rooms[$v][] = $k;
		}
		update_rooms_status($rooms, intval($_POST['building_id']));
		set_result_set(true, '公開状況を更新しました。');
		header("Location: houseList.php?bid={$bid}");
		exit;
	}

	define('NUM_PAR_PAGE', 999999);// ページングなし
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

	if( empty($bid) ){// 建物が指定されていないときはヒットさせない
		$_POST["BUKKENMEI"] = '2bd5_4de7_c000_01ab_7b00_ab9d_ab7f_5b8d';
	}

// 検索開始
$buildingsList = null;
$formData = null;
$ensen = array();
if( isset($_POST["BUKKENMEI"]) || !empty($_POST['srchBuildingId']) ){
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

	if( empty($formData['dispFlg']) ){
		$formData['dispFlg'] = 'hide';// 公開と非公開の両方を表示
	}

// 総件数取得
$buildingsList = $obj->getHouseList($formData);
$cnt_all = count($buildingsList);

$sort = '';
$order = '';
$g = null;
if( !empty($_GET['sort']) && is_string($_GET['sort']) && !empty($_GET['order']) && is_string($_GET['order']) ){
	if( preg_match('#^[a-zA-Z0-9_\-]+_c$#', $_GET['sort']) && preg_match('#^(ASC)|(DESC)$#', $_GET['order']) ){
		$sort = $_GET['sort'];
		$order = $_GET['order'];
		$g = array('h.'.$sort => $order);// getHouseList()のSQLが建物テーブルとJOINしているのでh.を付加
	}
}

// リスト取得
$buildingsList = $obj->getHouseList($formData, $g, NUM_PAR_PAGE*($page-1), NUM_PAR_PAGE);

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



	$url_params_sub['page'] = '';
	if( !empty($page) ){ $url_params_sub['page'] = '&page='.$page;}

	$url_params_sub['sort'] = '';
	if( !empty($sort) && !empty($order) ){ $url_params_sub['sort'] = '&sort='.$sort.'&order='.$order;}



	$sort_link_param['house_no_c'] = get_param_text_sort_link('house_no_c', $url_params_sub);
	$sort_link_param['rental_price_c'] = get_param_text_sort_link('rental_price_c', $url_params_sub);
	$sort_link_param['layout_c'] = get_param_text_sort_link('layout_c', $url_params_sub);
	$sort_link_param['floor_c'] = get_param_text_sort_link('floor_c', $url_params_sub);




$tpl_path = 'houseList.tpl';
//--------------------
// レンダリング
//--------------------
$smarty->assign('buildings', $buildingsList);
$smarty->assign('structures', $optStructures);
$smarty->assign('events', $optEvents);
$smarty->assign('statuses', $optStatuses);
$smarty->assign('area', $CONF['area']);
$smarty->assign('flg', $CONF['flg']);
$smarty->assign('station', $CONF['station']);
$smarty->assign('transport', $CONF['transport']);
$smarty->assign('transport_station', $CONF['transport_station']);
$smarty->assign('equipment', $CONF['equipment']);
$smarty->assign('ensen', $ensen);
$smarty->assign('layout', $CONF['layout_regist']);
//$smarty->assign('bukkenmei', $bukkenmei);
$smarty->assign('features', $features);
$smarty->assign('formData', $formData);
$smarty->assign('p', $p);
$smarty->assign('urlp', $url_params);
$smarty->assign('urlps', $url_params_sub);
$smarty->assign('sort_link_param', $sort_link_param);
$smarty->assign('bid', $bid);
$smarty->assign('result', get_result_set());
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
 * 部屋情報を削除する
 *
 *
 */
function deleteHouse($h,$b = null){
    global $CONF, $mdb2, $logger;

	if( empty($h) || !is_numeric($h) ){ return false;}

	$h = intval($h);
	$sql = 'UPDATE houses_t SET `status_c` = 0 WHERE `house_id_c` = '.$h;
	$result = $mdb2->exec($sql);

    if ( PEAR::isError($result) ) {
        die($result->getMessage());
    }
	if(!is_null($b)){
		Bukken::updateBuilding($b);
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

// 部屋の公開状況を更新する
function update_rooms_status($rooms, $building_id){
	global $mdb2;
	if( !is_array($rooms) ) return false;

	$status = array(1, 2);
	foreach($status as $s){
		if( !empty($rooms[$s]) && is_array($rooms[$s]) ){
			$sql = "UPDATE `houses_t` SET `mod_date_c` = NOW(), `status_c` = {$s}, `auto_private` = 0 WHERE `house_id_c` IN (".implode(",", $rooms[$s]).") AND `status_c` != {$s}";
			$result = $mdb2->exec($sql);
			if( PEAR::isError($result) ) die($result->getMessage());
		}
	}
	Bukken::updateBuilding($building_id);
}
