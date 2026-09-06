<?php
	require_once(dirname(__FILE__).'/../common/php/init.php');
	require_once(dirname(__FILE__).'/../../System/Libs/Bukken.php');
	require_once(dirname(__FILE__).'/../../System/Libs/Form.php');
	require_once(dirname(__FILE__).'/../../System/Libs/Mail.php');

	error_reporting(E_ERROR | E_WARNING | E_PARSE);// PC版でNoticeが出るため

	//$contact_mail_admin = "honda@fsent.jp";
	//$contact_mail_from = "noreply@example.com";
	$contact_mail_admin = "info@room-r.jp";
	$contact_mail_from = "info@room-r.jp";

	$hid = ( isset($_REQUEST["h"]) && is_numeric($_REQUEST["h"]) ) ? intval($_REQUEST["h"]) : null;

	$CONF = $PC->conf;// Bukkenクラス中でglobalを見ているのでこのようなことをしなければならない
	$mdb2 = $PC->MDB2;
	$logger = $PC->Log;
	$houses = pc_get_house_record($hid);
	unset($CONF);
	unset($mdb2);
	unset($logger);

	if( !session_id() ) session_start();

	$form_items = array(
		'name' => array(
			'label' => 'お名前',
			'required' => true
		),
		'furi' => array(
			'label' => 'フリガナ',
			'required' => true
		),
		'tel' => array(
			'label' => '電話番号',
			'rule' => array('format' => Form::FMT_TEL),
			'filter' => Form::FLT_TO_HANKAKU_ALPNUM,
			'required' => true
		),
		'tel_time' => array(
			'label' => 'ご連絡希望時間'
		),
		'rent' => array(
			'label' => 'ご希望家賃',
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

	$form = new Form('roomrroom_sp_contact', $form_items);
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
		$adminmail->set_body(pc_get_smarty_mail_body($form, $houses, false));
		$adminmail->add_header("From: {$contact_mail_from}");
		$result = $adminmail->send();

		if( $result ){
			$usermail = new Mail();
			$usermail->add_to($form->get_value("mail"));
			$usermail->set_subject("お問い合わせありがとうございます");
			$usermail->set_body(pc_get_smarty_mail_body($form, $houses, true));
			$usermail->add_header("From: {$contact_mail_from}");
			$usermail->send();
		}

		$form->end_clean();

		if( $result ){
			$_SESSION['roomrroom_sp_contact_done'] = 1;
			header("Location: ".HU."/contact/thanks/");
			exit;
		}
	}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<meta name="description" content="名古屋のデザイナーズマンションを専門とする【roomRroom】の会社概要です。" />
<title>ご予約・お問合せ | <?php echo SITE_NAME; ?></title>
<meta name="description" content="名古屋でデザイナーズマンションの賃貸情報を探すなら【roomRroom】へ。お気軽にお問い合わせください。" />
<meta name="keywords" content="名古屋,デザイナーズマンション,デザイナーズ賃貸,roomRroom,問い合わせ" />
<?php include_template_part("common_head"); ?>
<link rel="stylesheet" href="css/local.css" />
<script src="js/local.js"></script>
<?php include_template_part("additional_head"); ?>
</head>
<body>
<div id="wrapper">
<?php include_template_part("header"); ?>

	<div id="main">
		<div class="lh100 mt15 tac"><img src="img/i_01.png" alt="" height="13" /></div>
		<h2 class="fz20 lts3 mt5 tac color-red01">ご予約・お問合せ</h2>
<?php include(dirname(__FILE__)."/php/page-0{$page}.php"); ?>
	</div><!-- #main -->

<?php include_template_part("footer"); ?>
</div><!-- #wrapper -->
</body>
</html>
<?php
/**
 * Smartyで処理されたメール本文を取得(PC版からのコピー)
 *
 * @param object $form フォーム
 * @param array $houses 部屋情報
 * @param bool $is_to_sender 送信者宛てか
 * @return string
 */
function pc_get_smarty_mail_body($form, $houses, $is_to_sender){
	global $PC;

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
	$smty->assign('cnf', $PC->conf);
	$tpl = ( $is_to_sender ) ? 'mail_contact_sender.txt' : 'mail_contact.txt';
	return $smty->fetch($tpl);
}

/**
 * 部屋情報を取得(PC版からのコピー)
 *
 * @param integer $hid 部屋ID
 * @return array
 */
function pc_get_house_record($hid){
	global $PC;
	$bukken = new Bukken();
	$houses = array();

	$login = ( isset($_SESSION["user_name"]) && $PC->conf["login_flg"] ) ? true : false;

	$hid = ( is_int($hid) ) ? array($hid) : array();
	if( !empty($hid) ){
		foreach($hid as $key => $value){
			$houses[$key]["house"] = $bukken->getHouse($value, $login);
			$houses[$key]["building"] = $bukken->getBuilding($houses[$key]["house"]["building_id_c"]);
			if( !isset($houses[$key]["house"]["house_id_c"]) || !isset($houses[$key]["building"]["building_id_c"]) ){
				unset($houses[$key]);
			}
		}
		$houses = array_values($houses);
	}
	return $houses;
}
