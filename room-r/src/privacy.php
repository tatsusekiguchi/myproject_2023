<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	$smarty->assign("pagetitle", "プライバシーポリシー | room R room");
	$smarty->assign("meta_description", "名古屋でデザイナーズ賃貸を探すならroomRroom（ルームRルーム）。roomRroomのプライバシーポリシーです。");
	$smarty->assign("meta_keywords", "プライバシーポリシー,roomRroom,ルームRルーム,ルームアールルーム,賃貸,デザイナーズ,ペット可,新築");
	$smarty->assign("css", "privacy.css");
	$smarty->assign("location", "privacy");
//	$smarty->assign("js", array("jquery.slider.js", "index.js"));
	$smarty->display("privacy.tpl");
