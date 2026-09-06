<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	$smarty->assign("pagetitle", "店舗紹介｜名古屋のデザイナーズマンション【roomRroom】");
	$smarty->assign("meta_description", "名古屋でデザイナーズ賃貸マンションを探すなら【roomRroom】にお任せ。新しい生活を始めるあなたをルームRルームスタッフがサポートしますので、お気軽に店舗にお越しくださいませ。");
	$smarty->assign("meta_keywords", "名古屋,デザイナーズマンション,デザイナーズ賃貸,roomRroom,店舗紹介");
	$smarty->assign("css", "store.css");
	$smarty->assign("location", "store");
//	$smarty->assign("js", array("jquery.slider.js", "index.js"));
	$smarty->display("store.tpl");
