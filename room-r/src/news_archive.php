<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	// ! このファイルはWordPressから読み込まれます
	if( !defined('WP_DEBUG') ){
		header('Location: '.WEB_ROOT.'/');
		exit;
	}

	$smarty->template_dir = dirname(__FILE__).'/_html';
	$tpl_path = 'news_archive.tpl';

	$yaku_template_params = array('type' => explode('/', 'news////'));

	$smarty->assign("pagetitle", "新着情報｜名古屋のデザイナーズマンション【roomRroom】");
	$smarty->assign("meta_description", "名古屋のデザイナーズ賃貸マンションを専門とする【roomRroom】から新着ニュースをお届けします！");
	$smarty->assign("meta_keywords", "名古屋,デザイナーズマンション,デザイナーズ賃貸,新着ニュース,roomRroom");
	$smarty->assign("css", "news_archive.css");
	$smarty->assign("location", "info");
	$smarty->display($tpl_path);
