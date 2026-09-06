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

// ファイル削除用
require_once 'fncFileDell.php';

$optMonths = array();
for($i=1;$i<=12;$i++) {$optMonths[$i] = $i;}
$optPrefs = array('愛知県' => '愛知県');
$optArea = $CONF['area'];
$optTransport = $CONF['transport'];
$optStructures = $CONF['structure'];// 構造
$optStatus = array('0' => '削除', '1' => '公開', '2' => '非公開');

if( !empty($_POST['back_x']) ){ $_POST['back'] = 1;}

// ------------------------------------------
// フォーム要素の定義
// ------------------------------------------

//$form = new HTML_QuickForm('Form', 'post', '', '');
$renderer = new HTML_QuickForm_Renderer_ArraySmarty($smarty);

$id = 0;
if( !empty($_GET['id']) && is_numeric($_GET['id']) ){
	$id = (int) $_GET['id'];
	if( isset($_POST['send']) == true || isset($_POST['send_x']) ){ $_POST['id'] = $id;}
}
if (isset($_POST['id'])) {
	$id = (int) $_POST['id'];
}
if (isset($_GET['dl']) && $_GET['dl'] == 'y') {
	if (isset($_GET['hid'])) {
		deleteHouse($_GET['hid']);
		Bukken::updateBuilding($id);
	}
}

$g = '';
if( !empty($id) ){ $g = '?id='.$id;}
$form = new HTML_QuickForm('Form', 'post', 'buildingEdit.php'.$g, '');

// ID
$form->addElement('hidden', 'id', $id, 'id="id_id"');

// 物件番号
$form->addElement('text', 'building_no_c', '物件番号', 'id="id_building_no_c" maxlength="20" style="ime-mode:disabled;"');

// 物件名
$form->addElement('text', 'building_name_c', '物件名', 'id="id_building_name_c" maxlength="50"');

// フリガナ
$form->addElement('text', 'building_furigana_c', '物件名', 'id="id_building_furigana_c" maxlength="50"');

// 所在地
$form->addElement('select', 'pref_c', '住所', $optPrefs, 'id="id_pref_c"');

// 所在地
$g = $CONF['ku_nagoya'];
for($i=0; $i<count($g); $i++){ $g[$i] = '名古屋市'.$g[$i];}
$form->addElement('select', 'ku_c', '区', $g, '');

// 所在地
$form->addElement('text', 'address_c', '詳細住所', 'id="id_address_c" maxlength="100"');

if( $id != 0 && ((!isset($_POST['confirm']) && !isset($_POST['confirm_x'])) && !isset($_POST['back'])) ){
	$transportStation = getBuilding($id);
	$dummy1 = $CONF['transport_station'][$transportStation["transport1_c"]];
	foreach($dummy1 as $key=>$val){
		$optStation1[$val] = $CONF['station'][$val];
	}
	if($transportStation["transport2_c"] != "" && $transportStation["transport2_c"] != "0"){
		$dummy2 = $CONF['transport_station'][$transportStation["transport2_c"]];
		foreach($dummy2 as $key=>$val){
			$optStation2[$val] = $CONF['station'][$val];
		}
	}
}

if( (isset($_POST['confirm']) || isset($_POST['confirm_x'])) || isset($_POST['back'])){
	if($_POST["transport1_c"] != "" && $_POST["transport1_c"] != "0"){
		$dummy1 = $CONF['transport_station'][$_POST["transport1_c"]];
		foreach($dummy1 as $key=>$val){
			$optStation1[$val] = $CONF['station'][$val];
		}
	}else{
		$optStation1 = array();
	}

	if($_POST["transport2_c"] != "" && $_POST["transport2_c"] != "0"){
		$dummy2 = $CONF['transport_station'][$_POST["transport2_c"]];
		foreach($dummy2 as $key=>$val){
			$optStation2[$val] = $CONF['station'][$val];
		}
	}else{
		$optStation2 = array();
	}
} else {
	$optStation1 = array();
	$optStation2 = array();
	if ($id != 0) {
		$transportStation = getBuilding($id);
		$dummy1 = $CONF['transport_station'][$transportStation["transport1_c"]];
		foreach($dummy1 as $key=>$val){
			$optStation1[$val] = $CONF['station'][$val];
		}
		if($transportStation["transport2_c"] != "" && $transportStation["transport2_c"] != "0"){
			$dummy2 = $CONF['transport_station'][$transportStation["transport2_c"]];
			foreach($dummy2 as $key=>$val){
				$optStation2[$val] = $CONF['station'][$val];
			}
		}
	}
}

// 交通機関
$form->addElement('select', 'transport1_c', '交通機関1', $optTransport, 'id="id_transport1_c"');
$form->addElement('select', 'station1_c', '駅1', $optStation1, 'id="id_station1_c"');
$form->addElement('text', 'distance1_c', '駅からの距離1', 'id="id_distance1_c" style="ime-mode:disabled;"');
// 交通機関2
$form->addElement('select', 'transport2_c', '交通機関2', $optTransport, 'id="id_transport2_c"');
$form->addElement('select', 'station2_c', '駅2', $optStation2, 'id="id_station2_c"');
$form->addElement('text', 'distance2_c', '駅からの距離2', 'id="id_distance2_c" style="ime-mode:disabled;"');
// 交通機関その他
$form->addElement('text', 'transport3_c', 'その他の交通機関', 'id="id_transport3_c"');
$form->addElement('text', 'station3_c', 'その他の駅', 'id="id_station3_c"');
$form->addElement('text', 'distance3_c', 'その他の駅からの距離', 'id="id_distance3_c" style="ime-mode:disabled;"');

// 交通
//$form->addElement('text', 'traffic1_c', '交通1', 'id="id_traffic1_c" maxlength="100"');
//$form->addElement('text', 'traffic2_c', '交通2', 'id="id_traffic2_c" maxlength="100"');
//$form->addElement('text', 'traffic3_c', '交通3', 'id="id_traffic3_c" maxlength="100"');

// エリア
$areaArr = array();
foreach ($optArea AS $key => $value) {
	if ($key != '9999') {
		$areaArr[] = $form->createElement('checkbox', $key, $value['name'], $value['name'], array('id'=>'id_area_c_' . $key));
	}
}
$form->addGroup($areaArr, 'AreaGrp', 'エリア', ' ', true);

// 構造
$form->addElement('select', 'structure_c', '構造', $optStructures, 'id="id_structure_c"');

// 総戸数
$form->addElement('text', 'house_c', '総戸数', 'id="id_house_c" maxlength="4" style="ime-mode:disabled;"');

// 階建て
$form->addElement('text', 'floor_c', '階建て', 'id="id_floor_c" maxlength="2" style="ime-mode:disabled;"');

// 竣工日
$form->addElement('text', 'completion_year_c', '竣工年', 'id="id_completion_year_c" maxlength="4" style="ime-mode:disabled;"');
$form->addElement('select', 'completion_month_c', '竣工月', $optMonths, 'id="id_completion_month_c"');

// 特集フラグ
$featureArr = array();
foreach ($CONF["feature"] AS $key => $value) {
	$featureArr[] = $form->createElement('checkbox', $key, $value, $value, array('id'=>'id_feature_c_' . $key));
}
$form->addGroup($featureArr, 'FeatureGrp', '特集フラグ', ' ', true);

//ペット
$petArr = array();
foreach($CONF["pet"] as $key=>$val){
	$g = $val;
	if($key == 0){
		$g = '<span style="color:red">'.$val.'</span>';
	}
	$petArr[] = $form->createElement('checkbox', $key, $val, $g,array('id'=>'id_pet_c_'.$key));
}
$form->addGroup($petArr, 'petGrp', 'ペット', ' ', true);

//ペットフリーワード
$form->addElement('text', 'petfree_c', 'ペットフリーワード', 'id="id_petfree_c"');


// 駐車場
$form->addElement('select', 'parking_c', null, $CONF['parking2'], '');
$g = array();
foreach($CONF['parking_type'] as $k => $v){ $g[] = $form->createElement('checkbox', $k, $v, $v, '');}
$form->addGroup($g, 'parking_type_c');
$form->addElement('text', 'parking_charge_c', null, ' size="10" style="ime-mode:disabled;"');

//駐車場税金
$g = array();
$g[] = $form->createElement('radio', null, null, '税別', 0);
$g[] = $form->createElement('radio', null, null, '税込み', 1);
$g[] = $form->createElement('radio', null, null, '要確認', 2);
$form->addGroup($g, 'parking_tax_c', '税金', '&nbsp;');

// 火災保険
$g = array();
$g[] = $form->createElement('radio', null, null, '有り', 1);
$g[] = $form->createElement('radio', null, null, '無し', 0);
$g[] = $form->createElement('radio', null, null, '要確認', 2);
$form->addGroup($g, 'fire_flg_c', '有無', '&nbsp;');
$form->addElement('text', 'fire_c', null, 'size="10" maxlength="11" style="ime-mode:disabled;"');


// 経度
$form->addElement('text', 'longitude_c', '経度', 'id="id_longitude_c" maxlength="20" style="ime-mode:disabled;"');

// 緯度
$form->addElement('text', 'latitude_c', '緯度', 'id="id_latitude_c" maxlength="20" style="ime-mode:disabled;"');

// フラグ
$flgArr = array();
foreach ($CONF['flg'] AS $key => $value) {
		$flgArr[] = $form->createElement('checkbox', $key, $value, $value, array('id'=>'id_flg_c_' . $key));
}
$form->addGroup($flgArr, 'FlgGrp', 'フラグ', ' ', true);

// おすすめポイント
$form->addElement('textarea', 'comment1_c', 'おすすめポイント', 'id="id_comment1_c" maxlength="200"');

// スタッフコメント
$form->addElement('textarea', 'comment2_c', 'スタッフコメント', 'id="id_comment2_c"');

// キャッチコピー
$form->addElement('text', 'catch_c', 'キャッチコピー', 'id="id_catch_c" maxlength="18"');

// 管理会社情報
$form->addElement('text', 'yanushi_name_c', '管理会社情報 - 名前', ' size="40" maxlength="255"');
$form->addElement('text', 'yanushi_tel1_c', '管理会社情報 - 電話1', ' size="40" maxlength="255"');
$form->addElement('text', 'yanushi_tel2_c', '管理会社情報 - 電話2', ' size="40" maxlength="255"');


// 保証会社
$g = array();
$g[] = $form->createElement('radio', null, null, '利用可', 0);
$g[] = $form->createElement('radio', null, null, '必須', 1);
$g[] = $form->createElement('radio', null, null, 'なし', 2);
$g[] = $form->createElement('radio', null, null, '要確認', 3);
$form->addGroup($g, 'hoshou_availability_c', '利用', '');
$form->addElement('text', 'hoshou_company_c', null, 'size="30"');
$form->addElement('text', 'hoshou_charge_c', null, 'size="10" style="ime-mode:disabled;"');
$form->addElement('text', 'hoshou_charge2_c', null, 'size="10" style="ime-mode:disabled;"');
$g = array();
$g[] = $form->createElement('radio', null, null, '%', 0);
$g[] = $form->createElement('radio', null, null, '円', 1);
$form->addGroup($g, 'hoshou_charge2_type_c', '更新料%円', '');
$g = array();
$g[] = $form->createElement('radio', null, null, '月', 0);
$g[] = $form->createElement('radio', null, null, '年', 1);
$g[] = $form->createElement('radio', null, null, '2年', 2);
$form->addGroup($g, 'hoshou_charge2_interval_c', '更新料期間', '');

// 備考
$form->addElement('textarea', 'other_c', '備考', 'id="id_other_c"');

// ファイルダミー
$form->addElement('file', 'dummyfile');
for ($i=0; $i<=22; $i++) {
	$chkname = 'chk_b_photo' . $i . '_c';
	if($i != 0 && $i != 1){
		$form->addElement('checkbox', $chkname, '削除', '削除', 'id="id_' . $chkname . '"');
	}
}

// 優先順位
$form->addElement('select', 'order_c', '優先順位', array(''=>'','1'=>'1','2'=>'2','3'=>'3','4'=>'4','5'=>'5'), 'id="id_order_c"');

// 下位表示フラグ
$underArry = array();
$underArry[] = $form->createElement('checkbox', '1', 'under_flg_c', '下位表示させる', array('id'=>'id_under_flg_c_'));
$form->addGroup($underArry, 'OrderGrp', '下位表示フラグ', ' ', true);

// ------------------------------------------
// デフォルト値の設定
// ------------------------------------------

if ($id != 0) {
	//	print "id!=0\n";
	$defaults['id'] = $id;
	$defaults = getBuilding($id);
	$equ = explode(',', $defaults['area_c']);
	foreach ($equ as $v) {
		$defaults['AreaGrp'][$v] = 1;
	}
	$equ = explode(',', $defaults['feature_c']);
	foreach ($equ as $v) {
		$defaults['FeatureGrp'][$v] = 1;
	}
	$equ = explode(',', $defaults['pet_c']);

	foreach ($equ as $v) {
		$defaults['petGrp'][$v] = 1;
	}
	for ($i=0; $i<strlen($defaults['flg_c']); $i++) {
		if (substr($defaults['flg_c'], $i, 1) == '1') {
			$defaults['FlgGrp'][$i] = 1;
		}
	}

	if($defaults['under_flg_c'] == 1){
		$defaults['OrderGrp'][1] = 1;
	}

	if(!empty($defaults['parking_type_c'])){
		$g = explode(',', $defaults['parking_type_c']);
		$defaults['parking_type_c'] = null;
		foreach ($g as $key => $value) {
			$defaults['parking_type_c'][$value] = $value;
		}
	}

	if (isset($_REQUEST['mode']) == false) {
		unset($_SESSION['b_photo']);
		for ($i = 0; $i <= 22; $i++) {
			$colname = 'b_photo' . $i . '_c';
			(isset($defaults[$colname])) ? $_SESSION['b_photo'][$colname] = $defaults[$colname] : $_SESSION['b_photo'][$colname] = '';
		}
		//		print "sessionクリア\n";
	}
} else {
	//	print "id=0\n";
	$defaults = array();

	$defaults['pet_c'] = 0;
	$defaults['parking_tax_c'] = 0;
	
	if (isset($_REQUEST['mode']) == false) {
		unset($_SESSION['b_photo']);
		for ($i = 0; $i <= 22; $i++) {
			$colname = 'b_photo' . $i . '_c';
			$_SESSION['b_photo'][$colname] = '';
		}
		//		print "sessionクリア\n";
	}
}
$form->setDefaults($defaults);

// ------------------------------------------
// ルール/フィルタの定義
// ------------------------------------------

// フィルタ
$form->applyFilter('__ALL__', 'mb_trim');
$form->applyFilter(array(
	"building_no_c",
	"latitude_c",
	"longitude_c",
	"distance1_c",
	"distance3_c",
	"distance2_c",
	"house_c",
	"floor_c",
	"completion_year_c"
), "m_filter_2_hankaku");
/*
$form->applyFilter(array(
	"building_name_c"
), "m_filter_2_zenkaku");
*/

// ルール
$form->registerRule('building_no_duplication', 'callback', 'building_no_duplication');
$form->addRule('building_no_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('building_no_c', '<br /><span class="error">既に使用されています</span>', 'building_no_duplication');
$form->registerRule('building_name_duplication', 'callback', 'building_name_duplication');
$form->addRule('building_name_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('building_name_c', '<br /><span class="error">既に使用されています</span>', 'building_name_duplication');
$form->addRule('building_furigana_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('pref_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('address_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('distance1_c', '<br /><span class="error">徒歩距離は半角数値入力です</span><br />', 'numeric');
$form->addRule('distance2_c', '<br /><span class="error">徒歩距離は半角数値入力です</span>', 'numeric');
$form->addRule('distance3_c', '<br /><span class="error">徒歩距離は半角数値入力です</span>', 'numeric');
$form->addRule('AreaGrp', '<span class="error">必須入力です</span>', 'required');
if( ( isset($_POST['confirm']) || isset($_POST['confirm_x']) ) && ( $_POST["transport3_c"] == "" && $_POST["station3_c"] == "" && $_POST["distance3_c"] == "") ){
	$form->addRule('transport1_c', '<span class="error">必須入力です</span>', 'required');
	$form->addRule('station1_c', '<br /><span class="error">必須入力です</span>', 'required');
	$form->addRule('distance1_c', '<br /><span class="error">必須入力です</span>', 'required');
}
$form->addRule('structure_c', '<br /><span class="error">必須入力です</span>', 'required');
//$form->addRule('comment1_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('latitude_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('latitude_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('longitude_c', '<br /><span class="error">必須入力です</span>', 'required');
$form->addRule('longitude_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('house_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('completion_year_c', '<span class="error">必須入力です</span>', 'required');
$form->addRule('completion_year_c', '<span class="error">西暦数値です</span>', 'numeric');
$form->addRule('completion_year_c', '<span class="error">西暦4桁数値です</span>', 'minlength', 4);
$form->addRule('floor_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->registerRule('max35', 'callback', 'fncMax35');
$form->addRule("catch_c", "<span class='error'>35文字以内で入力してください。</span>","max35");
$form->addRule('parking_charge_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('fire_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('hoshou_charge_c', '<br /><span class="error">数値入力です</span>', 'numeric');
$form->addRule('hoshou_charge2_c', '<br /><span class="error">数値入力です</span>', 'numeric');

$b_photo_flg = false;
$b_photo0_err = "";
$b_photo21_err = "";
$b_photo1_err = "";
/*
if( ( isset($_POST['confirm']) || isset($_POST['confirm_x']) ) && $_SESSION["b_photo"]["b_photo0_c"] == ""){
	$b_photo_flg = true;
	$b_photo0_err = "<br /><span class='error'>必須入力です</span>";
}
 if( false && ( isset($_POST['confirm']) || isset($_POST['confirm_x']) ) && $_SESSION["b_photo"]["b_photo21_c"] == ""){
	$b_photo_flg = true;
	$b_photo21_err = "<br /><span class='error'>必須入力です</span>";
}
if( ( isset($_POST['confirm']) || isset($_POST['confirm_x']) ) && $_SESSION["b_photo"]["b_photo1_c"] == ""){
	$b_photo_flg = true;
	$b_photo1_err = "<br /><span class='error'>必須入力です</span>";
}
*/

function fncMax35($moji){
	if(mb_strlen($moji) <= 35){
		return true;
	}else{
		return false;
	}
}

function building_no_duplication($value){
	global $mdb2, $id;
	if( !empty($id) ) return true;
	$sql = "SELECT building_id_c FROM buildings_t WHERE building_no_c = {$mdb2->quote($value, 'text')}";
	$result = $mdb2->query($sql);
	return ( !PEAR::isError($result) && $result->fetchRow(MDB2_FETCHMODE_ASSOC) ) ? false : true;
}

function building_name_duplication($value){
	global $mdb2, $id;
	if( !empty($id) ) return true;
	$sql = "SELECT building_id_c FROM buildings_t WHERE building_name_c = {$mdb2->quote($value, 'text')}";
	$result = $mdb2->query($sql);
	return ( !PEAR::isError($result) && $result->fetchRow(MDB2_FETCHMODE_ASSOC) ) ? false : true;
}

//--------------------------------------------------
// Request
//--------------------------------------------------

$imgError = '';
$hidden = '';
$tpl_path = 'buildingEdit.tpl';
$form_state = 1;
if( isset($_POST['confirm']) || isset($_POST['confirm_x']) ){
	if( $form->validate() == true && !$b_photo_flg ){
		$form->freeze();
		//$tpl_path = 'buildingConfirm.tpl';
		$form_state = 2;
	}
}else if( isset($_POST['send']) || isset($_POST['send_x']) ){
	if( $form->validate() == true ){
		$buildingId = $form->process('storeData');
		if( !empty($buildingId) ){
			set_result_set(true, '保存しました - <a href="houseEdit.php?bid='.$buildingId.'">部屋を追加する</a>');
			header('location: buildingEdit.php?id='.$buildingId);
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
if (isset($_SESSION['b_photo'])) {
	$smarty->assign('photo', $_SESSION['b_photo']);
}
$smarty->assign('id', $id);
$smarty->assign('houses', getHouses($id));
$smarty->assign('layout_regist', $CONF['layout_regist']);
$smarty->assign('area', $CONF['area']);
$smarty->assign('transport', $CONF['transport']);
$smarty->assign('station', $CONF['station']);
$smarty->assign('cnf', $CONF);
$smarty->assign('status', $optStatus);
$smarty->assign('b_photo0_err', $b_photo0_err);
$smarty->assign('b_photo21_err', $b_photo21_err);
$smarty->assign('b_photo1_err', $b_photo1_err);
$smarty->assign('result', get_result_set());
$smarty->assign('form_state', $form_state);
$smarty->display($tpl_path);
//print_r($smarty);
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
	global $CONF, $mdb2, $logger;

	$set = array();

	$set[] = 'building_no_c='	   . $mdb2->quote($value['building_no_c'], 'text');			// 物件番号
	$set[] = 'building_name_c='	 . $mdb2->quote($value['building_name_c'], 'text');		  // 物件名
	$set[] = 'building_furigana_c=' . $mdb2->quote($value['building_furigana_c'], 'text');	  // フリガナ
	$set[] = 'pref_c='			  . $mdb2->quote($value['pref_c'], 'text');				   // 所在地都道府県
	$set[] = 'ku_c='			  . $mdb2->quote($value['ku_c'], 'integer');				   // 所在地都名古屋市の区
	$set[] = 'address_c='		   . $mdb2->quote($value['address_c'], 'text');				// 所在地詳細
	$set[] = 'longitude_c='		 . $mdb2->quote($value['longitude_c'], 'decimal');		   // 経度
	$set[] = 'latitude_c='		  . $mdb2->quote($value['latitude_c'], 'decimal');			// 緯度
	$set[] = 'transport1_c='		. $mdb2->quote($value['transport1_c'], 'integer');			 // 沿線1
	$set[] = 'station1_c='		. $mdb2->quote($value['station1_c'], 'integer');			 // 駅名1
	$set[] = 'distance1_c='		   . $mdb2->quote($value['distance1_c'], 'text');				// 徒歩距離1
	$set[] = 'transport2_c='		. $mdb2->quote($value['transport2_c'], 'integer');			 // 沿線2
	if(isset($value['station2_c'])){
		$set[] = 'station2_c='		. $mdb2->quote($value['station2_c'], 'integer');			 // 駅名2
	}
	$set[] = 'distance2_c='		   . $mdb2->quote($value['distance2_c'], 'text');				// 徒歩距離2
	$set[] = 'transport3_c='		. $mdb2->quote($value['transport3_c'], 'text');			 // その他沿線
	$set[] = 'station3_c='		. $mdb2->quote($value['station3_c'], 'text');			 // その他駅名
	$set[] = 'distance3_c='		   . $mdb2->quote($value['distance3_c'], 'text');				// その他徒歩距離
	$set[] = 'structure_c='		 . $mdb2->quote($value['structure_c'], 'integer');		   // 構造
//	$set[] = 'pet_c='		. $mdb2->quote($value['pet_c'], 'integer');  // ペット
	$set[] = 'petfree_c='		. $mdb2->quote($value['petfree_c'], 'text');  // ペットフリーワード

	$set[] = 'parking_c='. $mdb2->quote($value['parking_c'], 'integer');  // 駐車場
	// 駐車場タイプ
	$g = array();
	if( isset($value['parking_type_c']) ){
		foreach($value['parking_type_c'] as $k => $v){ $g[] = $k;}
		$set[] = 'parking_type_c='.$mdb2->quote(implode(',', $g), 'text');
	} else {
		$set[] = 'parking_type_c='.$mdb2->quote('', 'text');
	}

	// 0 or 1
	$g = array('parking_tax_c', 'fire_flg_c');
	foreach($g as $c){
		$set[] = ( empty($value[$c]) ) ? "{$c} = 0" : "{$c} = ".$value[$c];
	}

	$set[] = 'yanushi_name_c='		 . $mdb2->quote($value['yanushi_name_c'], 'text');// 管理会社情報 - 名前
	$set[] = 'yanushi_tel1_c='		 . $mdb2->quote($value['yanushi_tel1_c'], 'text');// 管理会社情報 - 電話1
	$set[] = 'yanushi_tel2_c='		 . $mdb2->quote($value['yanushi_tel2_c'], 'text');// 管理会社情報 - 電話2

	$set[] = 'hoshou_company_c=' . $mdb2->quote($value['hoshou_company_c'], 'text');   // 保証会社名

	// nullありint
	$g = array('parking_charge_c','fire_c','hoshou_charge_c', 'hoshou_charge2_c');
	foreach($g as $c){
		$set[] = ( !isset($value[$c]) || $value[$c] == '' ) ? "{$c} = NULL" : "{$c} = {$mdb2->quote($value[$c], 'decimal')}";
	}

	// nullなしint
	$g = array('hoshou_availability_c', 'hoshou_charge2_type_c', 'hoshou_charge2_interval_c');
	foreach($g as $c){
		$set[] = ( !isset($value[$c]) || $value[$c] == '' ) ? "{$c} = 0" : "{$c} = {$mdb2->quote($value[$c], 'decimal')}";
	}
	
	if(isset($value['house_c']) && $value['house_c'] != ""){
		$set[] = 'house_c='			 . $mdb2->quote($value['house_c'], 'integer');			   // 総戸数
	}
	if(isset($value['floor_c']) && $value['floor_c'] != ""){
		$set[] = 'floor_c='			 . $mdb2->quote($value['floor_c'], 'integer');			   // 階建て
	}
	if(isset($value['completion_year_c']) && $value['completion_year_c'] != ""){
		$set[] = 'completion_year_c='   . $mdb2->quote($value['completion_year_c'], 'integer');	 // 築年
	}
	$set[] = 'completion_month_c='  . $mdb2->quote($value['completion_month_c'], 'integer');	// 築月
	
	$set[] = 'comment1_c='		  . $mdb2->quote($value['comment1_c'], 'text');			   // 物件ポイント
	$set[] = 'catch_c='			 . $mdb2->quote($value['catch_c'], 'text');				  // キャッチコピー

	$set[] = 'order_c='		. $mdb2->quote($value['order_c'], 'integer');			 // 優先順位

	if(isset($value['OrderGrp'][1])){
		$set[] = 'under_flg_c='		. $mdb2->quote($value['OrderGrp'], 'integer');			 // 下位表示フラグ
	}else{
		$set[] = 'under_flg_c=0';
	}

	// 写真
//	foreach ($_SESSION['b_photo'] as $key => $val) {
//		$del = 'chk_' . $key;
//		if (isset($value[$del]) == false) {
//			$set[] = $key . '=' . $mdb2->quote($val, 'text');
//		} else {
//			$set[] = $key . '=' . $mdb2->quote('', 'text');
//		}
//	}
	// 一覧画像
	if (isset($value["chk_b_photo0_c"]) == false) {
		$set[] = 'b_photo0_c=' . $mdb2->quote($_SESSION['b_photo']['b_photo0_c'], 'text');
	}else{
		$set[] = 'b_photo0_c=' . $mdb2->quote('', 'text');
		fileDelete($_SESSION['b_photo']['b_photo0_c']);
	}
	// 一覧画像マウスオーバー
	if (isset($value["chk_b_photo21_c"]) == false) {
		$set[] = 'b_photo21_c=' . $mdb2->quote($_SESSION['b_photo']['b_photo21_c'], 'text');
	}else{
		$set[] = 'b_photo21_c=' . $mdb2->quote('', 'text');
		fileDelete($_SESSION['b_photo']['b_photo21_c']);
	}

	for ($i = 1; $i <= 10; $i++) {
		$j = $i + 10;
		$large = 'b_photo' . $i . '_c';
		$small = 'b_photo' . $j . '_c';
		$del = 'chk_' . $large;
		if (isset($value[$del]) == false) {
			if (isset($_SESSION['b_photo'][$large]) && isset($_SESSION['b_photo'][$small])) {
				$set[] = $large . '=' . $mdb2->quote($_SESSION['b_photo'][$large], 'text');
				$set[] = $small . '=' . $mdb2->quote($_SESSION['b_photo'][$small], 'text');
			} else {
				$set[] = $large . '=' . $mdb2->quote('', 'text');
				$set[] = $small . '=' . $mdb2->quote('', 'text');
				if (isset($_SESSION['b_photo'][$large])) {
					fileDelete($_SESSION['b_photo'][$large]);
				}
				if (isset($_SESSION['b_photo'][$small])) {
					fileDelete($_SESSION['b_photo'][$small]);
				}
			}
		} else {
			$set[] = $large . '=' . $mdb2->quote('', 'text');
			$set[] = $small . '=' . $mdb2->quote('', 'text');
			if (isset($_SESSION['b_photo'][$large])) {
				fileDelete($_SESSION['b_photo'][$large]);
			}
			if (isset($_SESSION['b_photo'][$small])) {
				fileDelete($_SESSION['b_photo'][$small]);
			}
		}
	}
	//$set[] = 'b_photo22_c=' . $mdb2->quote($_SESSION['b_photo']['b_photo22_c'], 'text');

	// エリア
	if (isset($value['AreaGrp'])) {
		$areaArr = array();
		foreach ($value['AreaGrp'] as $key => $v) {
			$areaArr[] = $key;
		}
		$set[] = 'area_c=' . $mdb2->quote(implode(',', $areaArr), 'text');
	} else {
		$set[] = 'area_c=' . $mdb2->quote('', 'text');
	}

	// 特集
	if (isset($value['FeatureGrp'])) {
		$featureArr = array();
		foreach ($value['FeatureGrp'] as $key => $v) {
			$featureArr[] = $key;
		}
		$set[] = 'feature_c=' . $mdb2->quote(implode(',', $featureArr), 'text');
	} else {
		$set[] = 'feature_c=' . $mdb2->quote('', 'text');
	}

	// ペット
	if (isset($value['petGrp'])) {
		$featureArr = array();
		foreach ($value['petGrp'] as $key => $v) {
			$featureArr[] = $key;
		}
		$set[] = 'pet_c=' . $mdb2->quote(implode(',', $featureArr), 'text');
	} else {
		$set[] = 'pet_c=' . $mdb2->quote('', 'text');
	}

	if( !empty($value['id']) ){
		$query = 'UPDATE buildings_t SET ';
		$where = ' WHERE building_id_c=' . $mdb2->quote(intval($value['id']), 'integer');
		$set[] = 'mod_date_c=now()';
	} else {
		$query = 'INSERT INTO buildings_t SET ';
		$where = '';
		$set[] = 'reg_date_c=now()';
		$set[] = 'status_c = 1';
	}

	$query .= ' ' . implode(' , ', $set) . $where;

	$result = $mdb2->exec($query);
	if ( PEAR::isError($result) ) {
		$logger->err($query);
		die($result->getMessage());
	}

	if( !empty($value['id']) ){
		$id = intval($value['id']);
	} else {
		$id = $mdb2->lastInsertID();
	}
	Bukken::updateBuilding($id);
	return $id;
}

/**
 * 建物情報を取得する
 *
 * @param integer $building_id
 * @return array
 */
function getBuilding($building_id)
{
	global $CONF, $mdb2, $logger;

	$query = 'SELECT * FROM buildings_t WHERE building_id_c = ' . $mdb2->quote($building_id, 'integer');
	$result = $mdb2->query($query);
	if ( PEAR::isError($result) ) {
		die($result->getMessage());
	}

	$line = array();
	while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
		$line = $res;
	}

	return $line;

}

/**
 * 部屋情報を取得する
 *
 * @param integer $building_id
 * @return array
 */
function getHouses($building_id)
{
	global $CONF, $mdb2, $logger;

	$query = 'SELECT * FROM houses_t WHERE status_c!=0 AND building_id_c = ' . $mdb2->quote($building_id, 'integer') . ' ORDER BY sort_c ASC ';
	$result = $mdb2->query($query);
	if ( PEAR::isError($result) ) {
		die($result->getMessage());
	}

	$line = array();

	while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
		$line[] = $res;
	}
	return $line;
}

/**
 * 部屋情報を削除する
 *
 * @param integer $house_id
 */
function deleteHouse($house_id)
{
	global $CONF, $mdb2, $logger;

	$query = 'UPDATE houses_t SET status_c=0 WHERE house_id_c = ' . $mdb2->quote($house_id, 'integer');
	$result = $mdb2->exec($query);
	if ( PEAR::isError($result) ) {
		die($result->getMessage());
	}
}
