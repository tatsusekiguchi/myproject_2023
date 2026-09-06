<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	require_once(dirname(__FILE__).'/get_bukken.php');

	$smarty->assign("pagetitle", "条件検索｜名古屋のデザイナーズマンション【roomRroom】");
	$smarty->assign("meta_description", "名古屋のデザイナーズ賃貸を条件で検索。");
	$smarty->assign("meta_keywords", "名古屋,デザイナーズマンション,デザイナーズ賃貸,物件検索");
	$smarty->assign("location", "search");
	$smarty->assign("css", "search.css");
	$smarty->assign("cnf", $CONF);
	/* 物件出力用 */
	$smarty->assign("bukken", $bukken);
	$smarty->assign('cnt_bukken', $cnt_bukken);
	$smarty->assign('page', $page);
	$smarty->assign('p', $p);
	$smarty->assign('url_param', $url_param);
	$smarty->assign('params', $params);
	$smarty->assign('result_text', $result_text);

	$smarty->display("search.tpl");
