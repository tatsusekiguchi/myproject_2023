<?php
require_once '../include/define.php';

/**
 * ファイル名から削除
 *
 * @param string $filename ファイル名
 * @return boolean
 */
function fileDelete($filename = "",$sessname = ""){
	if($filename == ""){
		return false;
		exit();
	}
	if($sessname != ""){
		$sess = substr($sessname, 0, 7);
		$_SESSION[$sess][$sessname] = "";
	}

	$return = true;
	$path = IMG_UPLOAD_DIR. '/' .$filename;

	if(file_exists($path)){
		//$return = unlink($path);
	}
	return $return;
}

/**
 * DBにないファイルを一斉削除？
 *
 * @return boolean
 */
function allFileDelete(){
	global $CONF, $mdb2, $logger, $optEquipments;

	if($filename == ""){
		return false;
		exit();
	}
	if($sessname != ""){
		$sess = substr($sessname, 0, 7);
		$_SESSION[$sess][$sessname] = "";
	}

	$return = true;
	$path = IMG_UPLOAD_DIR. '/' .$filename;

	if(file_exists($path)){
		//$return = unlink($path);
	}
	return $return;
}
?>