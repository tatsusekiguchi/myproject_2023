<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');
	require_once(dirname(__FILE__).'/get_bukken.php');

	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 描画 %%%%

	$smarty->assign("bukken", $bukken);
	$smarty->assign('cnt_bukken', $cnt_bukken);
	$smarty->assign('page', $page);
	$smarty->assign('p', $p);
	$smarty->assign('url_param', $url_param);
	$smarty->assign('params', $params);
	$smarty->assign('result_text', $result_text);

	$smarty->assign("pagetitle", "沿線検索 | room R room");
	$smarty->assign("location", "line");
	$smarty->assign("css", "line.css");
	$smarty->assign("cnf", $CONF);
	$smarty->display("line.tpl");
