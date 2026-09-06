<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');
	require_once(dirname(__FILE__).'/System/Libs/Bukken.php');
	require_once(dirname(__FILE__).'/System/Libs/Form.php');
	require_once(dirname(__FILE__).'/System/Libs/Mail.php');

	ini_set('display_errors', 1);
	error_reporting(E_ERROR | E_WARNING | E_PARSE);

	$contact_mail_admin = $CONF['contact_addr'][0];
	$contact_mail_from = MAIL_FROM_ADDR;

	if( !session_id() ) session_start();




	// 部屋情報を取得

	$bukken = new Bukken();
	$houses = array();

	// $bid = array();
	// if( !empty($_GET["b"]) && is_numeric($_GET["b"]) ) $bid[] = $_GET["b"];

	$hid = array();
	if( !empty($_GET["h"]) && is_numeric($_GET["h"]) ) $hid[] = $_GET["h"];

	$login = ( isset($_SESSION["user_name"]) && $CONF["login_flg"]) ? true : false;

	if( !empty($hid) ){
		foreach($hid as $key => $value){
			$houses[$key]["house"] = $bukken->getHouse($value, $login);
			$houses[$key]["building"] = $bukken->getBuilding($houses[$key]["house"]["building_id_c"]);
			if( !isset($houses[$key]["house"]["house_id_c"]) || !isset($houses[$key]["building"]["building_id_c"]) ){
				unset($houses[$key]);
				// header("Location: index.php");
				// exit;
			}
		}
		$houses = array_values($houses);
	}




	// フォームの処理

	$form_items = array(
		'name' => array(
			'label' => '※お名前',
			'required' => true
		),
		'furi' => array(
			'label' => '※フリガナ',
			'required' => true
		),
		'tel' => array(
			'label' => '※電話番号',
			'rule' => array('format' => Form::FMT_TEL),
			'filter' => Form::FLT_TO_HANKAKU_ALPNUM,
			'required' => true
		),
		'tel_time' => array(
			'label' => 'ご連絡希望時間'
		),
		'rent' => array(
			'label' => '※ご希望家賃',
			'required' => true
		),
		'mail' => array(
			'label' => 'メールアドレス',
			'rule' => array('format' => Form::FMT_MAIL)
		),
		'zip' => array(
			'label' => '郵便番号'
		),
		'address' => array(
			'label' => '現在お住まいのご住所'
		),
		'gyoshu' => array(
			'label' => '業種'
		),
		'madori' => array(
			'label' => '間取り'
		),
		'area' => array(
			'label' => 'お探しのエリア'
		),
		'area_othre' => array(
			'label' => 'お探しのエリア（その他）'
		),
		'date_m' => array(
			'label' => 'ご案内希望日時第1希望'
		),
		'date_d' => array(
			'label' => 'ご案内希望日時第1希望'
		),
		'date_h' => array(
			'label' => 'ご案内希望日時第1希望'
		),
		'date_h_2' => array(
			'label' => 'ご案内希望日時第1希望'
		),
		'date_m2' => array(
			'label' => 'ご案内希望日時第2希望'
		),
		'date_d2' => array(
			'label' => 'ご案内希望日時第2希望'
		),
		'date_h2' => array(
			'label' => 'ご案内希望日時第2希望'
		),
		'date_h2_2' => array(
			'label' => 'ご案内希望日時第2希望'
		),/*
		'soudan' => array(
			'label' => 'ご相談内容'
		),*/
		'other' => array(
			'label' => 'その他条件・ご質問等'
		)
	);

	$form = new Form('roomrroom_contact', $form_items);
	$form->set_error_format('<div style="color:#f00;">#THE_ERROR_MESSAGE#</div>');
	$form->set_array_glue(', ');
	$form->set_name_for("enter", "enter");
	$form->set_name_for("back", "back");
	$form->set_name_for("reset", "reset");

	$page = $form->settle();

	if( $page === 3 ){
		$adminmail = new Mail();
		$adminmail->add_to($contact_mail_admin);
		$adminmail->set_subject("お問合せフォームから送信がありました");
		$adminmail->set_body(get_smarty_mail_body($form, $houses, false));
		$adminmail->add_header("From: {$contact_mail_from}");
		$result = $adminmail->send();

		if( $result ){
			$usermail = new Mail();
			$usermail->add_to($form->get_value("mail"));
			$usermail->set_subject("お問い合わせありがとうございます");
			$usermail->set_body(get_smarty_mail_body($form, $houses, true));
			$usermail->add_header("From: {$contact_mail_from}");
			$usermail->send();
		}

		$form->end_clean();

		if( $result ){
			$_SESSION['roomrroom_contact_done'] = 1;
			header("Location: ".WEB_ROOT."/contact_complete.html");
			exit;
		}
	}




	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 描画 %%%%

	ob_start();
	include("{$smarty->template_dir}/contact_0{$page}.php");
	$form_content = ob_get_contents();
	ob_end_clean();
	$smarty->assign("form_content", $form_content);
	$smarty->assign("hid", intval($hid[0]));

	$smarty->assign("pagetitle", "お問い合わせ｜名古屋のデザイナーズマンション【roomRroom】");
	$smarty->assign("meta_description", "名古屋でデザイナーズマンションの賃貸情報を探すなら【roomRroom】へ。お気軽にお問い合わせください。");
	$smarty->assign("meta_keywords", "名古屋,デザイナーズマンション,デザイナーズ賃貸,roomRroom,問い合わせ");
	$smarty->assign("location", "contact");
	$smarty->assign("css", "contact.css");
	$smarty->assign("cnf", $CONF);
	$smarty->assign("location", "contact");
	$smarty->display("contact.tpl");




	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 関数 %%%%

	// Smartyで処理されたメール本文を取得
	function get_smarty_mail_body($form, $houses, $sender){
		global $CONF;

		$smty = new Smarty();
		$smty->template_dir = MAIL_TEMPLATE_DIR;
		$smty->compile_dir = SMARTY_COMPILE_DIR;
		$smty->cache_dir = SMARTY_CACHE_DIR;
		$smty->compile_id = realpath($smty->template_dir);

		$data = array();
		$form_items = array("name", "furi", "tel", "tel_time", "rent", "mail", "zip", "address", "gyoshu", "madori", "area", "area_othre", "date_m", "date_d", "date_h", "date_h_2", "date_m2", "date_d2", "date_h2", "date_h2_2", "other");
		foreach($form_items as $i){
			$v = $form->get_value($i);
			if( !empty($v) ){
				$data[$i] = ( is_array($v) ) ? implode(", ", $v) : strval($v);
			} else {
				$data[$i] = "";
			}
		}

		$smty->assign('v', $data);
		$smty->assign('h', $houses);
		$smty->assign('cnf', $CONF);
		$tpl = ( $sender ) ? 'mail_contact_sender.txt' : 'mail_contact.txt';
		return $smty->fetch($tpl);
	}
