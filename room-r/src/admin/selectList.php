<?php
require_once '../include/define.php';

// Libs
require_once 'HTML/QuickForm.php';
require_once 'HTML/QuickForm/Renderer/ArraySmarty.php';

// 共通関数
require_once 'user_function.php';


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



//--------------------------------------------------
// Request
//--------------------------------------------------


$bukkenmei = '';
if (isset($_REQUEST['sname'])) {
    $bukkenmei = mb_trim($_REQUEST['sname']);
}


$tpl_path = 'selectList.tpl';
//--------------------
// レンダリング
//--------------------
$smarty->assign('buildings', getBuildingList($bukkenmei));
$smarty->assign('structures', $optStructures);
$smarty->assign('events', $optEvents);
$smarty->assign('statuses', $optStatuses);
$smarty->assign('area', $CONF['area']);
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

