<?php
require_once '../include/define.php';
// ファイル削除用
require_once 'fncFileDell.php';
require_once 'user_function.php';

$sessname = $_POST["sessname"];
$id = $_POST["id"];
$no = $_POST["no"];

$sno = $no;
if($sessname == "b_photo"){
	// 物件ならサムネイルは１０個上
	$sno = $no + 10;
}elseif($sessname == "r_photo"){
	// 部屋ならサムネイルは20個上
	$sno = $no + 20;
}
$name = $sessname.$no."_c";
$sname = $sessname.$sno."_c";

if($sessname != ""){
	$sess = substr($sessname, 0, 7);
}
$filename = $_SESSION[$sessname][$name];

// サムネイルとテーブルを更新する必要がある
if(isset($_SESSION[$sessname][$sname])){
	$sfilename = $_SESSION[$sessname][$sname];
}else{
	$sfilename = "";
}

$flg = fileDelete($filename, $sessname.$no."_c");

if($sfilename != ""){
	$flg = fileDelete($sfilename, $sessname.$sno."_c");
}
// テーブル更新
if($id != 0){
	if($sessname == "b_photo"){
		$table = "buildings_t";
		$idname = "building_id_c";
	}elseif($sessname == "r_photo"){
		$table = "houses_t";
		$idname = "house_id_c";
	}
	if($sfilename != ""){
		$query = 'UPDATE '.$table.' SET '.$name.'="", '.$sname.'="" WHERE '.$idname.' = ' . $mdb2->quote($id, 'integer');
	}else{
		$query = 'UPDATE '.$table.' SET '.$name.'="" WHERE '.$idname.' = ' . $mdb2->quote($id, 'integer');
	}
	$result = $mdb2->exec($query);
	if ( PEAR::isError($result) ) {
		//echo($result->getMessage());
		//die();
	}
}

if($flg){
	echo "1";
}else{
	echo "0";
}
?>