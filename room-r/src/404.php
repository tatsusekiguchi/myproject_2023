<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	$tpl_path = '404.tpl';

	$yaku_template_params = array('type' => explode('/', '404////'));

	$smarty->assign('ytp', $yaku_template_params);
	$smarty->display($tpl_path);
