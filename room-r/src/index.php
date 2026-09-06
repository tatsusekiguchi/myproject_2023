<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	if( !defined('NUM_IN_A_PAGE') ){ define('NUM_IN_A_PAGE', 20);}// 1ページ当りの物件数
//	$_REQUEST["order"] = 1; // 登録日潤
	require_once(dirname(__FILE__).'/get_bukken.php');

	$smarty->assign("pagetitle", "名古屋のデザイナーズマンションの賃貸物件情報｜roomRroom");
	$smarty->assign("meta_description", "名古屋に特化したデザイナーズマンションの賃貸情報を豊富に掲載中！「新築物件」「高級賃貸」「女性向け物件」「ペット可物件」など、名古屋で人気のデザイナーズ賃貸を特集中。roomRroom(ルームRルーム)のスタッフが「新しいあなたが始まる部屋探し」をサポートいたします。");
	$smarty->assign("meta_keywords", "デザイナーズマンション,デザイナーズ賃貸,名古屋,物件情報,roomRroom");
	$smarty->assign("css", "index.css");
	$smarty->assign("js", array("jquery.slider.js", "index.js"));
	$smarty->assign("cnf", $CONF);
	$smarty->assign("bukken", $bukken);
	$smarty->display("index.tpl");
