<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	require_once(dirname(__FILE__).'/get_bukken.php');

	$smarty->assign("pagetitle", "エリア検索|名古屋のデザイナーズマンション【roomRroom】");
	$smarty->assign("meta_description", "名古屋の人気エリアから、理想のデザイナーズマンションの賃貸物件検索しよう！名古屋駅・大須・栄・金山・鶴舞・千種・大曽根・覚王山など、住みたい場所で理想の一人暮らしを実現しよう。 ");
	$smarty->assign("meta_keywords", "デザイナーズマンション,デザイナーズ賃貸,名古屋,部屋探し,エリア検索");
	$smarty->assign("location", "area");
	$smarty->assign("css", "area.css");
	$smarty->assign("cnf", $CONF);
	/* 物件出力用 */
	$smarty->assign("bukken", $bukken);
	$smarty->assign('cnt_bukken', $cnt_bukken);
	$smarty->assign('page', $page);
	$smarty->assign('p', $p);
	$smarty->assign('url_param', $url_param);
	$smarty->assign('params', $params);
	$smarty->assign('result_text', $result_text);

	$smarty->display("area.tpl");
