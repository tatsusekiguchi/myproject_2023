<?php
require_once '../include/define.php';

// Libs
require_once 'HTML/QuickForm.php';
require_once 'HTML/QuickForm/Renderer/ArraySmarty.php';

// 共通関数
require_once 'user_function.php';
require_once 'login.php';


$features = getFeatureList();



$tpl_path = 'sortList.tpl';
//--------------------
// レンダリング
//--------------------
$smarty->assign('features', $features);
$smarty->display($tpl_path);


//--------------------
// メソッド
//--------------------

/**
 * 特集を取得する
 *
 * @return array
 */
function getFeatureList($name = '')
{
    global $CONF, $mdb2, $logger;
    $query = 'SELECT * FROM feature_t ';
    $result = $mdb2->query($query);
    if ( PEAR::isError($result) ) {
//        $logger->info($query);
        die($result->getMessage());
    }

    $line = array();

    while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
        $line[] = $res;
    }
    return $line;
	
	
}


?>