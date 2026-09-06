<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	if( !session_id() ) session_start();
	if( empty($_SESSION['roomrroom_contact_done']) ){
		header("Location: ".WEB_ROOT."/");
		exit;
	}
	unset($_SESSION['roomrroom_contact_done']);




	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 描画 %%%%

	$smarty->assign("pagetitle", "お問い合わせ｜名古屋のデザイナーズマンション【roomRroom】");
	$smarty->assign("meta_description", "名古屋でデザイナーズマンションの賃貸情報を探すなら【roomRroom】へ。お気軽にお問い合わせください。");
	$smarty->assign("meta_keywords", "名古屋,デザイナーズマンション,デザイナーズ賃貸,roomRroom,問い合わせ");
	$smarty->assign("location", "contact");
	$smarty->assign("css", "contact.css");
	$smarty->assign("cnf", $CONF);
	$smarty->display("contact_complete.tpl");
