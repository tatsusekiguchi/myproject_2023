<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	require_once(dirname(__FILE__).'/get_bukken.php');


	$bid = 0;
	$hid = 0;
	$bukken = array();
	$houseList = array();
	$house = array();

	$recommend = array();

	if(isset($_REQUEST["b"]) && is_numeric($_REQUEST["b"])){
		$bid = $_REQUEST["b"];
	}else{
		header("Location:".WEB_ROOT."/");
		die();
	}
	if(isset($_REQUEST["h"]) && is_numeric($_REQUEST["h"])){
		$hid = $_REQUEST["h"];
	}

	// 物件取得
	$status = " AND status_c > 0";
	if(!$CONF["login_flg"]){
		$status = "";
	}
	$sql = 'SELECT * FROM buildings_t WHERE building_id_c = '.intval($bid).$status;
	$result = $mdb2->query($sql);
	if( PEAR::isError($result) ) die($result->getDebugInfo());
	while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){
		// エリアテキスト
		$row["area_txt"] = array();
		if(!empty($row["area_c"])){
			$area_garbage = explode(",", $row["area_c"]);
			foreach ($area_garbage as $key => $value) {
				$row["area_txt"][] = $CONF["area"][$value]["name"];
			}
		}
		// パーキング
		$row["parking_txt"] = array();
		if(!empty($row["parking_type_c"])){
			$parking_garbage = explode(",", $row["parking_type_c"]);
			foreach ($parking_garbage as $key => $value) {
				$row["parking_txt"][] = $CONF["parking_type"][$value];
			}
		}
		$bukken = $row;
	}

	// 部屋一覧取得
	$status = " AND status_c > 0";
	if(!$CONF["login_flg"]){
		$status = " AND (status_c = 1 OR status_c = 3)";
	}
	$sql = 'SELECT * FROM houses_t WHERE building_id_c = '.intval($bid).$status.' ORDER BY sort_c';

	$result = $mdb2->query($sql);
	if( PEAR::isError($result) ) die($result->getDebugInfo());
	while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){

		$houseList[$row["house_id_c"]] = $row;
	}

	// 現在の部屋格納
	if($hid != 0){
		if(!isset($houseList[$hid])){ header("Location:".WEB_ROOT."/"); die(); }
		$house = $houseList[$hid];
	}else{
		$house = current($houseList);
	}
	if(!empty($house)){
		$house["flg_disp"] = str_split($house["flg_c"]);
	}

	// 物件がなければ
	if(empty($bukken)){ header("Location:".WEB_ROOT."/"); die(); }
	if(empty($houseList)){ header("Location:".WEB_ROOT."/"); die(); }

	// 関連物件
	$area_g = $bukken["area_c"];
	$area = explode(",", $area_g);
	foreach($area as $a){
		if( (!is_string($a) && !is_numeric($a)) || $a == "" ){ continue;}
		$garbage_where[] = "area_c LIKE ".$mdb2->quote("%".addcslashes($a, '\_%')."%", 'text');
	}
	$sql = 'SELECT * FROM buildings_t WHERE status_c = 1 AND '."(".implode(' OR ', $garbage_where).") AND house_count_c > 0 ORDER BY RAND() LIMIT 4";
	$result = $mdb2->query($sql);
	if( PEAR::isError($result) ) die($result->getDebugInfo());
	while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){
		// 間取一覧表示用
		$row["layout_disp"] = array();
		$layout_type = explode(',', $row["layout_type_c"]);
		if(count($layout_type) > 1){
			$row["layout_disp"] = $CONF["layout_regist"][min($layout_type)]."&nbsp;〜&nbsp;".$CONF["layout_regist"][max($layout_type)];
		}else if(count($layout_type) != 0){
			$row["layout_disp"] = $CONF["layout_regist"][min($layout_type)];
		}
		$recommend[] = $row;
	}

	$smarty->assign("pagetitle", $bukken["building_name_c"]." | room R room");
	$smarty->assign("meta_description", "名古屋でデザイナーズ賃貸を探すならroomRroom（ルームRルーム）。".$bukken["building_name_c"]."の詳細ページです。");
	$smarty->assign("meta_keywords", $bukken["building_name_c"].",物件詳細,roomRroom,ルームRルーム,ルームアールルーム,賃貸,デザイナーズ,ペット可,新築");
	$smarty->assign("location", "detail");
	$smarty->assign("css", "detail.css");
	$smarty->assign("js", array("jquery.slider.js", "detail.js"));
	$smarty->assign("cnf", $CONF);

	// 物件情報
	$smarty->assign("bukken", $bukken);
	$smarty->assign("houseList", $houseList);
	$smarty->assign("house", $house);
	$smarty->assign('house_zappi', get_house_zappi($house['house_id_c']));
	$smarty->assign("recommend", $recommend);
	if($_GET["print"]){
		$smarty->display("print.tpl");
	}else{
		$smarty->display("detail.tpl");
	}


// 部屋$idの雑費を取得
function get_house_zappi($id){
	global $CONF, $mdb2, $logger;
	$zappi = array();
	$sql = "SELECT * FROM house_zappi_t WHERE house_id_c = ".intval($id);
	$result = $mdb2->query($sql);
	if( PEAR::isError($result) ) return array();
	while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){
		if( empty($row['amount_taxin_c']) && empty($row['amount_c']) ) continue;
		$zappi[] = $row;
	}
	return $zappi;
}
