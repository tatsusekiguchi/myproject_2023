<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	$smarty->assign("pagetitle", "会社概要｜名古屋のデザイナーズマンション【roomRroom】");
	$smarty->assign("meta_description", "名古屋のデザイナーズマンションを専門とする【roomRroom】の会社概要です。");
	$smarty->assign("meta_keywords", "名古屋,デザイナーズマンション,不動産,roomRroom,会社概要");
	$smarty->assign("css", "company.css");
	$smarty->assign("location", "company");
//	$smarty->assign("js", array("jquery.slider.js", "index.js"));
	$smarty->display("company.tpl");
