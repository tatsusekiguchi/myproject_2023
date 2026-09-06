<?php
require_once '../include/define.php';
require_once(dirname(__FILE__).'/functions_m.php');
require_once(dirname(__FILE__).'/define_m.php');

// Libs
require_once 'HTML/QuickForm.php';
require_once 'HTML/QuickForm/Renderer/ArraySmarty.php';

// 共通関数
require_once 'user_function.php';
require_once 'Bukken.php';
require_once 'login.php';

// csv設定ファイル
require_once 'csv_conf.php';


// 物件登録CSV
require_once 'csv_building.php';

// 部屋登録CSV
require_once 'csv_room.php';


$tpl_path = 'csv.tpl';
//--------------------
// レンダリング
//--------------------
$smarty->assign("errorMsgBuilding",$errorMsgBuilding);
$smarty->assign("resultMsgBuilding",$resultMsgBuilding);
$smarty->assign("errorMsgRoom",$errorMsgRoom);
$smarty->assign("resultMsgRoom",$resultMsgRoom);
$smarty->assign("username",$user);
$smarty->assign("pass",$pass);
$smarty->display($tpl_path);

/**
* CSVから配列を作成する関数
*
* @param $csv string CSVファイルのパス
* @return $array array UTF8エンコード済の配列
*/
function csv_to_array($csv) {
	$file = new SplFileObject($csv);
	$file->setFlags(SplFileObject::READ_CSV);
	$array = array();
	foreach ($file as $line) {
		//空行はスキップ
		if (empty($line)) continue;
		foreach ($line as $key => $value) {
			$value = mb_convert_encoding($value,"UTF-8","sjis");
			$value = preg_replace('/^[ 　]+/u', '', $value);
			$value = preg_replace('/[ 　]+$/u', '', $value);
			$line[$key] = trim($value);
//			$line[$key] = trim($value, " \t\n\r\0\x0B　");
		}
		$array[] = $line;
	}
//	mb_convert_variables("UTF-8", array("ASCII","JIS","UTF-8","EUC-JP","SJIS"), $array);
	return $array;
}

/**
* クエリ発行
*
* @param $query string SQL文
* @return $line array クエリ実行結果の配列
*/
function getQuery($query){
	global $CONF, $mdb2, $logger;

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
exit;