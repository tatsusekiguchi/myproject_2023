<?php
require_once '../include/define.php';
require_once(dirname(__FILE__).'/functions_m.php');
require_once(dirname(__FILE__).'/define_m.php');

// Libs
require_once 'HTML/QuickForm.php';
require_once 'HTML/QuickForm/Renderer/ArraySmarty.php';

// 共通関数
require_once 'user_function.php';
require_once 'Bukken.php';
require_once 'login.php';

//$optEquipments = $CONF['equipment'];
$optLayout = $CONF['layout_regist'];
$optLayoutOption = $CONF['layout_option'];
$optDirection = $CONF['direction'];

if( !empty($_POST['back_x']) ){ $_POST['back'] = 1;}

// ------------------------------------------
// フォーム要素の定義
// ------------------------------------------

$form = new HTML_QuickForm('Form', 'post', '', '');
$renderer = new HTML_QuickForm_Renderer_ArraySmarty($smarty);

$bid = 0;
if( isset($_GET['bid']) ) $bid = (int) $_GET['bid'];
if( isset($_POST['bid']) ) $bid = (int) $_POST['bid'];

if(empty($bid)){
	header("Location: ./");
}

$hid = 0;
if( isset($_GET['hid']) ) $hid = (int) $_GET['hid'];
if( isset($_POST['hid']) ) $hid = (int) $_POST['hid'];

if (isset($_GET['cp']) && $_GET['cp'] == 'y') {
	$cid = 0;
} else {
	$cid = $hid;
}

// ID
$form->addElement('hidden', 'hid', $cid, 'id="id_id"');
$form->addElement('hidden', 'bid', $bid, 'id="id_bid"');

// タイプ
$form->addElement('text', 'house_no_c', 'タイプ', ' size="10" maxlength="20"');
$form->addElement('text', 'house_no_note_c', '号室', ' size="30" maxlength="255"');

// 表示順
$form->addElement('text', 'sort_c', '表示順', ' size="10" maxlength="20"');

// 状態
$statusArr[] = $form->createElement('radio', 'status_c', '公開状況', '空き有り', 1,'id="id_status1"');
$statusArr[] = $form->createElement('radio', 'status_c', '公開状況', '空きなし', 2,'id="id_status2"');
$statusArr[] = $form->createElement('radio', 'status_c', '公開状況', '確認中', 3,'id="id_status3"');
$form->addGroup($statusArr, 'statusGrp', '公開状況', '&nbsp;', false);

// 賃料
$form->addElement('text', 'rental_price_c', '賃料', 'id="id_rental_min_c" size="10" maxlength="8" style="ime-mode:disabled;"');

// 共益費
$form->addElement('text', 'common_price_c', '共益費', 'id="id_common_min_c" maxlength="8" style="ime-mode:disabled;"');
$form->addElement('select', 'more_common_flg_c', '賃料以上フラグ', array("0"=>"","1"=>"〜"), 'id="id_layout_option_c"');

// 損害保険
$form->addElement('text', 'insurance_price_c', '損害保険', 'id="id_insurance_price_c" maxlength="8" style="ime-mode:disabled;"');

// 他費用
$form->addElement('text', 'other_price_c', '他費用', 'id="id_other_price_c" maxlength="35" style="ime-mode:disabled;"');

//間取り
$layoutArr = array();
foreach($optLayout as $key=>$val){
	if($val == "1LDK"){
		$layoutArr[] = $form->createElement('radio', 'layout_c', '間取り', $val."<br />", $key);
	}elseif($val == "2LDK"){
		$layoutArr[] = $form->createElement('radio', 'layout_c', '間取り', $val."<br />", $key);
	}elseif($val == "3LDK"){
		$layoutArr[] = $form->createElement('radio', 'layout_c', '間取り', $val."<br />", $key);
	}elseif($val == "4LDK"){
		$layoutArr[] = $form->createElement('radio', 'layout_c', '間取り', $val."<br />", $key);
	}else{
		$layoutArr[] = $form->createElement('radio', 'layout_c', '間取り', $val, $key);
	}
}
$form->addGroup($layoutArr, 'layoutGrp', '間取り', ' ', false);

//間取りオプション
$form->addElement('select', 'layout_option_c', '部屋向き', $optLayoutOption, 'id="id_layout_option_c"');


//面積
$form->addElement('text', 'space_c', '面積', 'id="id_space_c" size="10" maxlength="20" style="ime-mode:disabled;"');

//部屋向き
$form->addElement('select', 'direction_c', '部屋向き', $optDirection, 'id="id_direction_c"');

//備考
$form->addElement('text', 'other_c', '備考', 'id="id_other_c" style="width:405px;" maxlength="35"');

//設備  equipment_c
/*$equipmentArr = array();
foreach ($optEquipments AS $key => $value) {
	$equipmentArr[] = $form->createElement('checkbox', $key, $value, $value, array('id'=>'id_equipment_c_' . $key));
}
$form->addGroup($equipmentArr, 'EquipmentGrp', '設備', ' ', true);*/

// フラグ
$flgArr = array();
foreach ($CONF['flg'] AS $key => $value) {
		$flgArr[] = $form->createElement('checkbox', $key, $value, $value, array('id'=>'id_flg_c_' . $key));
}
$form->addGroup($flgArr, 'FlgGrp', 'フラグ', ' ', true);

// ファイルダミー
$form->addElement('file', 'dummyfile');
for ($i=0; $i<=40; $i++) {
	$chkname = 'chk_r_photo' . $i . '_c';
	if($i != 0 && $i != 1){
		$form->addElement('checkbox', $chkname, '削除', '削除', 'id="id_' . $chkname . '"');
	}
}

// 共益費
$form->addElement('text', 'money_01_c', null, ' size="10" style="ime-mode:disabled;"');

// 敷金／保証金
$g = array();
foreach($CONF['label_02'] as $k => $v){ $g[] = $form->createElement('radio', null, null, $v, $k);}
$form->addGroup($g, 'divide_money_02_c');
$form->addElement('text', 'money_02_c', null, ' size="10" style="ime-mode:disabled;"');
$g = array();
$g[] = $form->createElement('radio', null, null, 'ヶ月', 0);
$g[] = $form->createElement('radio', null, null, '%', 1);
$g[] = $form->createElement('radio', null, null, '円', 2);
$form->addGroup($g, 'money_02_type_c', '種類', '&nbsp;');

// 償却／敷引／解約引
$g = array();
foreach($CONF['label_03'] as $k => $v){ $g[] = $form->createElement('radio', null, null, $v, $k);}
$form->addGroup($g, 'divide_money_03_c');
$form->addElement('text', 'money_03_c', null, ' size="10" style="ime-mode:disabled;"');
//$form->addElement('text', 'money_03_month_c', null, ' size="5" maxlength="2"');
//$form->addElement('text', 'money_03_rate_c', null, ' size="5" maxlength="3"');
$g = array();
$g[] = $form->createElement('radio', null, null, 'ヶ月', 0);
$g[] = $form->createElement('radio', null, null, '%', 1);
$g[] = $form->createElement('radio', null, null, '円', 2);
$form->addGroup($g, 'money_03_type_c', '種類', '&nbsp;');

// 礼金／権利金
$g = array();
foreach($CONF['label_04'] as $k => $v){ $g[] = $form->createElement('radio', null, null, $v, $k);}
$form->addGroup($g, 'divide_money_04_c');
$form->addElement('text', 'money_04_c', null, ' size="10" style="ime-mode:disabled;"');
//$form->addElement('text', 'money_04_month_c', null, ' size="5" maxlength="2"');
$g = array();
$g[] = $form->createElement('radio', null, null, 'ヶ月', 0);
$g[] = $form->createElement('radio', null, null, '%', 1);
$g[] = $form->createElement('radio', null, null, '円', 2);
$form->addGroup($g, 'money_04_type_c', '種類', '&nbsp;');

// 更新料
$form->addElement('text', 'money_05_c', null, ' size="10" style="ime-mode:disabled;"');
$form->addElement('text', 'money_05_zimu_c', null, ' size="10" style="ime-mode:disabled;"');

// 町費
$g = array();
$g[] = $form->createElement('radio', null, null, '初期費用', 0);
$g[] = $form->createElement('radio', null, null, '月額費用', 1);
$g[] = $form->createElement('radio', null, null, '年額費用', 2);
$form->addGroup($g, 'chouhi_type_c', '種類', '&nbsp;');
$form->addElement('text', 'chouhi_c', null, 'size="10" maxlength="11"');
$g = array();
$g[] = $form->createElement('radio', null, null, '税別', 0);
$g[] = $form->createElement('radio', null, null, '税込み', 1);
$form->addGroup($g, "tax_chouhi_c", '税金', '&nbsp;');

// 雑費
for($i = 1; $i <= 8; $i++){
	$n = ( $i <= 4 ) ? "0" . strval($i) : "1" . strval($i - 4);
	$form->addElement('checkbox', "zappi_{$n}_required_c", null, ' 必須');
	$form->addElement('text', "zappi_{$n}_name_c", null, 'size="10" maxlength="255" placeholder="項目名"');
	$form->addElement('text', "zappi_{$n}_amount_c", null, 'size="10" maxlength="10" style="ime-mode:disabled;"');
	$g = array();
	$g[] = $form->createElement('radio', null, null, '税別', 0);
	$g[] = $form->createElement('radio', null, null, '税込み', 1);
	$form->addGroup($g, "zappi_{$n}_amount_taxin_c", '税金', '&nbsp;');
}

// ------------------------------------------
// デフォルト値の設定
// ------------------------------------------

$defaults = array();
if ($hid != 0) {// 更新
	$defaults = getHouse($hid);
/*
	$equ = explode(',', $defaults['equipment_c']);
	foreach ($equ as $v) {
		$defaults['EquipmentGrp'][$v] = 1;
	}
*/
	for ($i=0; $i<strlen($defaults['flg_c']); $i++) {
		if (substr($defaults['flg_c'], $i, 1) == '1') {
			$defaults['FlgGrp'][$i] = 1;
		}
	}

	if (isset($_REQUEST['mode']) == false) {
		unset($_SESSION['r_photo']);
		if( $cid !== 0 ){
			for ($i = 0; $i <= 40; $i++) {
				$colname = 'r_photo' . $i . '_c';
				(isset($defaults[$colname])) ? $_SESSION['r_photo'][$colname] = $defaults[$colname] : $_SESSION['r_photo'][$colname] = '';
			}
		}
	}

	// 雑費
	$g = get_house_zappi($hid);
	foreach($g as $z){
		$defaults["zappi_{$z['type_c']}{$z['num_c']}_name_c"] = $z['name_c'];
		$defaults["zappi_{$z['type_c']}{$z['num_c']}_amount_c"] = $z['amount_c'];
		$defaults["zappi_{$z['type_c']}{$z['num_c']}_amount_taxin_c"] = $z['amount_taxin_c'];
		$defaults["zappi_{$z['type_c']}{$z['num_c']}_required_c"] = $z['required_c'];
	}
	unset($g);

} else {// 新規追加
	if (isset($_REQUEST['mode']) == false) {
		unset($_SESSION['r_photo']);
		for ($i = 0; $i <= 40; $i++) {
			$colname = 'r_photo' . $i . '_c';
			$_SESSION['r_photo'][$colname] = '';
		}
	}
	$defaults['more_price_flg_c'] = 1;
	$defaults['more_common_flg_c'] = 1;

//	$defaults['zappi_01_name_c'] = "鍵交換";
//	$defaults['zappi_11_name_c'] = "CATV";
}
$form->setDefaults($defaults);

// ------------------------------------------
// ルール/フィルタの定義
// ------------------------------------------

// 雑費
$zappi_items = array();
for($i = 1; $i <= 8; $i++){
	$n = ( $i <= 4 ) ? "0" . strval($i) : "1" . strval($i - 4);
	$zappi_items[] = "zappi_{$n}_amount_c";
	$zappi_items[] = "zappi_{$n}_amount_taxin_c";
}

// フィルタ
$form->applyFilter('__ALL__', 'trim');
$form->applyFilter(array_merge(array(
	"rental_price_c",
	"space_c",
	"money_01_c",
	"money_02_c",
	"money_03_c",
	"money_04_c",
	"money_05_c",
	"money_05_zimu_c",
	"chouhi_c"
), $zappi_items), "m_filter_2_hankaku");

// 削除してください
// function rule_isempty($data){
// 	if($data == ""){
// 		return false;
// 	}else{
// 		return true;
// 	}
// }
// // 独自ルール
// $form->registerRule('isEmpty', 'callback', 'rule_isempty');

$form->addRule('house_no_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('sort_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('sort_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('rental_price_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('rental_price_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('layout_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('space_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('space_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('statusGrp', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule("layoutGrp", "<br /><span class='error'>必須入力です</span>","required");
$form->addRule('money_01_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('money_02_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('money_03_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('money_04_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('money_05_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('money_05_zimu_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('chouhi_c', '<br /><span class="error">数値入力です</span>', 'numeric');

// 雑費
for($i = 1; $i <= 8; $i++){
	$n = ( $i <= 4 ) ? "0" . strval($i) : "1" . strval($i - 4);
	$form->addRule("zappi_{$n}_amount_c", '<br /><span class="error">数値入力です</span>', 'numeric');
	$form->addRule("zappi_{$n}_amount_taxin_c", '<br /><span class="error">数値入力です</span>', 'numeric');
}

$r_photo_flg = false;
$r_photo0_err = "";
$r_photo1_err = "";
/*
if( ( isset($_POST['confirm']) || isset($_POST['confirm_x']) ) && $_SESSION["r_photo"]["r_photo0_c"] == ""){
	$r_photo_flg = true;
	$r_photo0_err = "<span class='error'>必須入力です</span>";
}
if( ( isset($_POST['confirm']) || isset($_POST['confirm_x']) ) && $_SESSION["r_photo"]["r_photo1_c"] == ""){
	$r_photo_flg = true;
	$r_photo1_err = "<span class='error'>必須入力です</span>";
}
*/

//--------------------------------------------------
// Request
//--------------------------------------------------

$imgError = '';
$hidden = '';
$tpl_path = 'houseEdit.tpl';
$form_state = 1;
if( isset($_POST['confirm']) || isset($_POST['confirm_x']) ){// 確認
	if( $form->validate() == true && !$r_photo_flg ){
		$form->freeze();
		$form_state = 2;
	}
}else if( isset($_POST['send']) == true || isset($_POST['send_x']) ){
	if( $form->validate() === true ){
		$hid = $form->process('storeData');
		if( !empty($hid) ){
			set_result_set(true, '保存しました - <a href="../detail.php?b='.$bid.'&h='.$hid.'" target="_blank">部屋をプレビュー</a>');
			header('location: houseEdit.php?bid='.$bid.'&hid='.$hid);
			exit;
		}
	}
	set_result_set(false, '保存に失敗しました');
}

//--------------------
// レンダリング
//--------------------

$form->accept($renderer);
$smarty->assign('form',$renderer->toArray());
$smarty->assign('token', md5(uniqid(rand(), true)));
$smarty->assign('hidden', $hidden);
$smarty->assign('bid', $bid);
$smarty->assign('hid', $cid);
if (isset($_SESSION['r_photo'])) {
	$smarty->assign('photo', $_SESSION['r_photo']);
}
$g = Bukken::getBuilding($bid,false);
$smarty->assign('building', $g);
$smarty->assign('house', 'yes');
$smarty->assign('r_photo0_err', $r_photo0_err);
$smarty->assign('r_photo1_err', $r_photo1_err);
$smarty->assign('result', get_result_set());
$smarty->assign('form_state', $form_state);
$smarty->assign('rate_tax_in', RATE_TAX * 0.01 + 1.0);
$smarty->display($tpl_path);
exit;

//--------------------
// メソッド
//--------------------

/**
 * 登録ファンクション
 *
 * @param array $value
 */
function storeData($value)
{
	global $CONF, $mdb2, $logger/*, $optEquipments*/;

	$set = array();

	$set[] = 'house_no_c='	  . $mdb2->quote($value['house_no_c'], 'text');   // タイプ名
	$set[] = 'sort_c='	  . $mdb2->quote($value['sort_c'], 'integer');   // 表示順
	$set[] = 'house_no_note_c='	  . $mdb2->quote($value['house_no_note_c'], 'text');   // タイプ - 号室
	$set[] = 'status_c='		. $mdb2->quote($value['status_c'], 'integer');  // 状態
	$set[] = 'rental_price_c='	. $mdb2->quote($value['rental_price_c'], 'integer');  // 賃料
	$set[] = 'layout_c='		. $mdb2->quote($value['layout_c'], 'integer');  // 間取り
	$set[] = 'space_c='		 . $mdb2->quote($value['space_c'], 'decimal');// 面積
	$set[] = 'direction_c='		 . $mdb2->quote($value['direction_c'], 'integer');// 部屋向き
	$set[] = 'chouhi_type_c='		. $mdb2->quote($value['chouhi_type_c'], 'integer');// 町費(初期/月額)
	$set[] = 'other_c='		 . $mdb2->quote($value['other_c'], 'text');// 備考

	// 0 or 1
	$g = array( 'tax_chouhi_c');
	foreach($g as $c){
		$set[] = ( empty($value[$c]) ) ? "{$c} = 0" : "{$c} = 1";
	}

	// nullありint
	$g = array('money_01_c', 'money_02_c', 'money_03_c', 'money_04_c', 'money_05_c',
		'money_02_month_c', 'money_03_month_c', 'money_04_month_c', 'money_03_rate_c',
		'divide_money_02_c', 'divide_money_03_c', 'divide_money_04_c', 'money_05_zimu_c',
		'chouhi_c');
	foreach($g as $c){
		$set[] = ( !isset($value[$c]) || $value[$c] == '' ) ? "{$c} = NULL" : "{$c} = {$mdb2->quote($value[$c], 'decimal')}";
	}

	$set[] = 'money_02_type_c='  . $mdb2->quote($value['money_02_type_c'], 'integer');
	$set[] = 'money_03_type_c='  . $mdb2->quote($value['money_03_type_c'], 'integer');
	$set[] = 'money_04_type_c='  . $mdb2->quote($value['money_04_type_c'], 'integer');

	$set[] = 'auto_private=0';

	// 設備
	/*
	$equipmentArr = array();
	if (isset($value['EquipmentGrp'])) {
		foreach ($value['EquipmentGrp'] as $key => $v) {
			$equipmentArr[] = $key;
		}
		$set[] = 'equipment_c='.$mdb2->quote(implode(',', $equipmentArr), 'text');
	} else {
		$set[] = 'equipment_c='.$mdb2->quote('', 'text');
	}
	*/

	// フラグ
	$flgs = '';
	for ($i=0; $i<count($CONF['flg']); $i++) {
		if (isset($value['FlgGrp'][$i])) {
			$flgs .= '1';
		} else {
			$flgs .= '0';
		}
	}
	$set[] = 'flg_c=' . $mdb2->quote($flgs, 'text');

	$set[] = 'r_photo0_c=' . $mdb2->quote($_SESSION['r_photo']['r_photo0_c'], 'text');
	for ($i = 1; $i <= 20; $i++) {
		$j = $i + 20;
		$large = 'r_photo' . $i . '_c';
		$small = 'r_photo' . $j . '_c';
		$del = 'chk_' . $large;
		if (isset($value[$del]) == false) {
			if (isset($_SESSION['r_photo'][$large])) {
				$set[] = $large . '=' . $mdb2->quote($_SESSION['r_photo'][$large], 'text');
				$set[] = $small . '=' . $mdb2->quote($_SESSION['r_photo'][$small], 'text');
			} else {
				$set[] = $large . '=' . $mdb2->quote('', 'text');
				$set[] = $small . '=' . $mdb2->quote('', 'text');
			}
		} else {
			$set[] = $large . '=' . $mdb2->quote('', 'text');
			$set[] = $small . '=' . $mdb2->quote('', 'text');
		}
	}

	// query作成
	if( !empty($value['hid']) ){
		$query = 'UPDATE houses_t SET ';
		$where = ' WHERE house_id_c='.$mdb2->quote($value['hid'], 'integer');
		$set[] = 'mod_date_c=now()';
	} else {
		$query = 'INSERT INTO houses_t SET ';
		$where = '';
		$set[] = 'reg_date_c=now()';
		$set[] = 'building_id_c='.$mdb2->quote($value['bid'], 'integer');// 建物ID
	}
	$query .= ' '.implode(', ', $set).$where;

	$result = $mdb2->exec($query);
	if ( PEAR::isError($result) ) {
		$logger->err($query);
		die($result->getDebugInfo());
	}
	if( !empty($value['hid']) ){
		$hid = (int) $value['hid'];
	} else {
		$hid = $mdb2->lastInsertID();
	}

	// 雑費
	for($i = 1; $i <= 4; $i++){
		$n = ( $i <= 2 ) ? "0" . strval($i) : "1" . strval($i - 2);
		$zappi_type_c = substr($n, 0, 1);
		$zappi_num_c = substr($n, 1, 1);
		$zappi_name_c = $mdb2->quote($value["zappi_{$n}_name_c"], 'text');
		$zappi_amount_c = ( isset($value["zappi_{$n}_amount_c"]) && $value["zappi_{$n}_amount_c"] == "" ) ? "NULL" : $mdb2->quote($value["zappi_{$n}_amount_c"], 'decimal');
		$zappi_amount_taxin_c = ( isset($value["zappi_{$n}_amount_taxin_c"]) && $value["zappi_{$n}_amount_taxin_c"] == "" ) ? "NULL" : $mdb2->quote($value["zappi_{$n}_amount_taxin_c"], 'decimal');
		$zappi_required_c = ( empty($value["zappi_{$n}_required_c"]) ) ? 0 : 1;
		$sql = "INSERT INTO house_zappi_t (house_id_c, type_c, num_c, name_c, amount_c, amount_taxin_c, required_c)
			VALUES (".intval($hid).", {$zappi_type_c}, {$zappi_num_c}, {$zappi_name_c}, {$zappi_amount_c}, {$zappi_amount_taxin_c}, {$zappi_required_c})
			ON DUPLICATE KEY UPDATE name_c = {$zappi_name_c}, amount_c = {$zappi_amount_c}, amount_taxin_c = {$zappi_amount_taxin_c}, required_c = {$zappi_required_c};";
		$result = $mdb2->exec($sql);
		if( PEAR::isError($result) ){
			$logger->err($query);
			die($result->getDebugInfo());
		}
	}

	Bukken::updateBuilding($value['bid']);
	return $hid;
}

/**
 * 部屋情報を取得する
 *
 * @param integer $house_id
 * @return array
 */
function getHouse($house_id)
{
	global $CONF, $mdb2, $logger;

	$query = 'SELECT * FROM houses_t WHERE house_id_c = ' . $mdb2->quote($house_id, 'integer');
	$result = $mdb2->query($query);
	if ( PEAR::isError($result) ) {
		$logger->err($query);
		die($result->getMessage());
	}

	$line = array();

	while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
		$line = $res;
	}
	return $line;
}

// 部屋$idの雑費を取得
function get_house_zappi($id){
	global $CONF, $mdb2, $logger;
	$zappi = array();
	$sql = "SELECT * FROM house_zappi_t WHERE house_id_c = ".intval($id);
	$result = $mdb2->query($sql);
	if( PEAR::isError($result) ) return array();
	while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){
		$zappi[] = $row;
	}
	return $zappi;
}
