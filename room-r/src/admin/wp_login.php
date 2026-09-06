<?php
	require_once '../include/define.php';
	require_once 'login.php';
	require_once(dirname(__FILE__).'/../info/wp-load.php');
	require_once(dirname(__FILE__).'/define_m.php');

	if( is_user_logged_in() ){
		header('Location: '.WEB_ROOT.'/info/wp-admin/');
		exit;
	}

	$_POST['log'] = WP_AUTO_LOGIN_USER;
	$_POST['pwd'] = WP_AUTO_LOGIN_PASS;
	$_POST['rememberme'] = 'forever';
	$_POST['redirect_to'] = WEB_ROOT.'/info/wp-admin/';

	require_once(dirname(__FILE__).'/../info/wp-login.php');
