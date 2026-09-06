<?php
ini_set('mbstring.detect_order', 'UTF-8');
ini_set('mbstring.http_input', 'pass');
ini_set('mbstring.internal_encoding', 'UTF-8');
mb_detect_order('UTF-8');
mb_internal_encoding('UTF-8');

//ini_set('display_errors', 0);
//error_reporting(E_ALL);
ini_set('display_errors', 1);
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// ディレクトリ設定
define('DIR_BASE', implode(array_slice(explode(DIRECTORY_SEPARATOR, __FILE__), 0, -2), DIRECTORY_SEPARATOR));
define('DEFINE_DIR', DIR_BASE . DIRECTORY_SEPARATOR . 'include');
define('PHP_SYSTEM_DIR', DIR_BASE . DIRECTORY_SEPARATOR . 'System');
define('PHP_LIB_DIR', PHP_SYSTEM_DIR . DIRECTORY_SEPARATOR . 'Libs');
define('SMARTY_DIR', PHP_LIB_DIR . DIRECTORY_SEPARATOR . 'Smarty' . DIRECTORY_SEPARATOR);
define('SMARTY_COMPILE_DIR', PHP_SYSTEM_DIR . DIRECTORY_SEPARATOR . 'templates_c');
define('SMARTY_CACHE_DIR', PHP_SYSTEM_DIR . DIRECTORY_SEPARATOR . 'cache');
define('PEAR_DIR', PHP_LIB_DIR . DIRECTORY_SEPARATOR . 'pear');
define('MAIL_TEMPLATE_DIR', DIR_BASE . DIRECTORY_SEPARATOR . '_mail');
define('LOG_FILE_NAME', PHP_SYSTEM_DIR . DIRECTORY_SEPARATOR . 'logs' . DIRECTORY_SEPARATOR . 'system_log_' . date('Ymd') . '.log');
define('IMG_UPLOAD_DIR', DIR_BASE . DIRECTORY_SEPARATOR . 'uploads');
define('IMG_TEMP_DIR', DIR_BASE . DIRECTORY_SEPARATOR . 'timg');
define('IMG_BUILDING_NAME_DIR', DIR_BASE . DIRECTORY_SEPARATOR . 'names');
define('IMG_FEATURE_DIR', DIR_BASE . DIRECTORY_SEPARATOR . 'features');

// ini設定
ini_set('include_path', PHP_LIB_DIR.PATH_SEPARATOR.DEFINE_DIR.PATH_SEPARATOR.SMARTY_DIR.PATH_SEPARATOR.PEAR_DIR.PATH_SEPARATOR.ini_get('include_path'));

define('RATE_TAX', 8);// 消費税率%

$CONF = array();

$CONF['area'] = array(
	'0101' => array('name'=>'名古屋駅前エリア', 'slug'=>'nagoya', 'lat' => 0, 'long' => 0, 'zoom' => 14),
	'0102' => array('name'=>'大須エリア', 'slug'=>'osu', 'lat' => 0, 'long' => 0, 'zoom' => 14),
	'0103' => array('name'=>'栄エリア', 'slug'=>'sakae', 'lat' => 0, 'long' => 0, 'zoom' => 14),
	'0104' => array('name'=>'金山・鶴舞エリア', 'slug'=>'kanayama', 'lat' => 0, 'long' => 0, 'zoom' => 14),
	'0105' => array('name'=>'高岳・車道エリア', 'slug'=>'takaoka', 'lat' => 0, 'long' => 0, 'zoom' => 14),
	'0106' => array('name'=>'大曽根エリア', 'slug'=>'ozone', 'lat' => 0, 'long' => 0, 'zoom' => 14),
	'0107' => array('name'=>'千種エリア', 'slug'=>'chikusa', 'lat' => 0, 'long' => 0, 'zoom' => 14),
	'0108' => array('name'=>'覚王山エリア', 'slug'=>'kakuozan', 'lat' => 0, 'long' => 0, 'zoom' => 14),
	'0109' => array('name'=>'その他', 'slug'=>'sonota', 'lat' => 0, 'long' => 0, 'zoom' => 14)
);

$CONF['transport'] = array(
	'0' => '',
	'1' => '地下鉄東山線',
	'2' => '地下鉄鶴舞線',
	'3' => '地下鉄名城線',
	'4' => '地下鉄桜通線',
	'5' => 'JR中央本線',
	'6' => '地下鉄名港線',
	'7' => 'あおなみ線'
);

$CONF['station'] = array(
	'' => '',
	'1' => '名古屋',
	'2' => '伏見',
	'3' => '栄',
	'4' => '新栄町',
	'5' => '千種',
	'6' => '今池',
	'7' => '池下',
	'8' => '覚王山',
	'9' => '本山',
	'10' => '東山公園',
	'11' => '星ヶ丘',
	'12' => '一社',
	'13' => '上社',
	'14' => '本郷',
	'15' => '藤が丘',
	'16' => '高畑',
	'17' => '八田',
	'18' => '岩塚',
	'19' => '中村公園',
	'20' => '中村日赤',
	'21' => '本陣',
	'22' => '亀島',
	'23' => '中村区役所',
	'24' => '国際センター',
	'25' => '丸の内',
	'26' => '久屋大通',
	'27' => '高岳',
	'28' => '車道',
	'29' => '吹上',
	'30' => '御器所',
	'31' => '桜山',
	'32' => '瑞穂区役所',
	'33' => '瑞穂運動場西',
	'34' => '新瑞橋',
	'35' => '桜本町',
	'36' => '鶴里',
	'37' => '野並',
	'38' => '鳴子北',
	'39' => '相生山',
	'40' => '神沢',
	'41' => '徳重',
	'42' => '上小田井',
	'43' => '庄内緑地公園',
	'44' => '庄内通',
	'45' => '浄心',
	'46' => '浅間町',
	'47' => '大須観音',
	'48' => '上前津',
	'49' => '鶴舞',
	'50' => '荒畑',
	'51' => '川名',
	'52' => 'いりなか',
	'53' => '八事',
	'54' => '塩釜口',
	'55' => '植田',
	'56' => '原',
	'57' => '平針',
	'58' => '赤池',
	'59' => '市役所',
	'60' => '名城公園',
	'61' => '黒川',
	'62' => '志賀本通',
	'63' => '平安通',
	'64' => '上飯田',
	'65' => '大曽根',
	'66' => 'ナゴヤドーム前矢田',
	'67' => '砂田橋',
	'68' => '茶屋ヶ坂',
	'69' => '自由ヶ丘',
	'70' => '名古屋大学',
	'71' => '八事日赤',
	'72' => '総合リハビリセンター',
	'73' => '瑞穂運動場東',
	'74' => '妙音通',
	'75' => '堀田',
	'76' => '伝馬町',
	'77' => '神宮西',
	'78' => '西高蔵',
	'79' => '金山',
	'80' => '東別院',
	'81' => '矢場町',
	'82' => '名古屋港',
	'83' => '築地口',
	'84' => '港区役所',
	'85' => '東海通',
	'86' => '六番町',
	'87' => '日比野',

	'88' => 'ささしまライブ',
	'89' => '小本',
	'90' => '荒子',
	'91' => '南荒子',
	'92' => '中島',
	'93' => '名古屋競馬場前',
	'94' => '荒子川公園',
	'95' => '稲永',
	'96' => '野跡',
	'97' => '金城ふ頭'
);

// 駅名ヒモ付用
$CONF['transport_station'] = array(
	'0' => array(),
	'1' => array('1','2','3','4','5','6','7','8','9','10','11','22','21'),
	'2' => array('46','25','2','47','48','49','50','30','51','52','53','54','42','45',),
	'3' => array('61','60','59','26','3','81','48','80','79','34','73','72','53','71','70','9','69', '68','67','66','65','63','62'),
	'4' => array('23','1','24','25','26','27','28','6','29','30','31','32','33','34'),
	'5' => array('1','79','49','5','65'),
	'6' => array('79','87','86','85','84','83','82'),
	'7' => array('1','88','89','90','91','92','93','94','95','96','97')
);

// 駐車場種類
/*
$CONF['parking'] = array(
	'' => '',
	'1' => '平面',
	'2' => '機械式',
	'3' => '近隣'
);
*/

// 駐車場種類(部屋)
$CONF['parking2'] = array(
	'なし',
	'あり',
	'要確認'
);
$CONF['parking_type'] = array(1=>'屋内平面', 2=>'屋外平面', 3=>'機械式', 4=>'シャッター付き');

$CONF['event'] = array(
	'' => '選択してください',
	'1' => 'マンション',
	'2' => 'アパート',
	'3' => 'コーポ',
	'4' => '貸家',
	'5' => 'テラスハウス'
);

$CONF['structure'] = array(
	'' => '選択してください',
	'1' => '木造',
	'2' => 'S造',
	'3' => 'RC造',
	'4' => 'SRC造'
);

$CONF['layout'] = array(
	'1' => '1R・1K',
	'2' => '1DK・1LDK',
	'3' => '2LDK',
	'4' => '3LDK以上'
);

$CONF['layout_regist'] = array(
	'101' => '1R',
	'102' => '1K',
	'103' => '1DK',
	'104' => '1LDK',
	'105' => '2K',
	'106' => '2DK',
	'107' => '2LDK',
	'108' => '3LDK',
	'109' => '4LDK以上'
);

$CONF['layout_search'] = array(
	'1' => array(101, 102),
	'2' => array(103, 104),
	'3' => array(105, 106, 107),
	'4' => array(108, 109, 110, 111, 112, 113)
);

$CONF['layout_option'] = array(
	'0' => '',
	'1' => 'LOFT',
	'2' => 'DEN',
	'3' => 'STO.'
);

$CONF['type'] = array(
	"type1" => array('num_c'=>1, 'layout_c'=>2),
	"type2" => array('num_c'=>1, 'layout_c'=>1),
	"type3" => array('num_c'=>1, 'layout_c'=>3),
	"type4" => array('num_c'=>1, 'layout_c'=>4),
	"type5" => array('num_c'=>1, 'layout_c'=>5),
	"type6" => array('num_c'=>1, 'layout_c'=>6),
	"type7" => array('num_c'=>2, 'layout_c'=>1),
	"type8" => array('num_c'=>2, 'layout_c'=>3),
	"type9" => array('num_c'=>2, 'layout_c'=>4),
	"type10" => array('num_c'=>2, 'layout_c'=>5),
	"type11" => array('num_c'=>2, 'layout_c'=>6),
	"type12" => array('num_c'=>3, 'layout_c'=>1),
	"type13" => array('num_c'=>3, 'layout_c'=>3),
	"type14" => array('num_c'=>3, 'layout_c'=>4),
	"type15" => array('num_c'=>3, 'layout_c'=>5),
	"type16" => array('num_c'=>3, 'layout_c'=>6),
	"type17" => array('over_all'=>1, 'num_c'=>4, 'layout_c'=>1)
);

$CONF['equipment'] = array(
	'1003' => '追い炊き',
	'1004' => '浴槽換気乾燥機',
	'1005' => '独立洗面台',
	'1006' => '温水洗浄暖房便座',
	'1007' => 'TVインターホン',
	'1008' => '冷暖房',
	'1009' => '床暖房',
	'1010' => 'ウォークインクローゼット',
	'1011' => 'メゾネット',
	'1012' => 'ロフト'
);

$CONF['flg'] = array(
	'0' => 'オートロック',
	'1' => 'エレベーター',
	'2' => '宅配ボックス',
	'3' => '駐車場付き',
	'4' => 'TVインターホン',
	'5' => 'BS・CSアンテナ',
	'6' => 'システムキッチン',
	'7' => '独立洗面台',
	'8' => 'ウォシュレット',
	'9' => '浴槽換気乾燥機',
	'10' => 'エアコン',
	'11' => '床暖房',
	'12' => 'ウォークインクローゼット',
	'13' => 'メゾネット',
	'14' => 'ロフト',
	'15' => 'フローリング',
	'16' => 'クローゼット'
);

$CONF['equipment_num'] = array(
	1001,
	1002,
	1003,
	1004,
	1005,
	1006,
	1007,
	1008,
	1009,
	1010,
	1011,
	1012,
	1013,
	1014,
	1015,
	1016,
	1017,
	1018,
	1019,
	1020
);

$CONF['direction'] = array(
	'' => '選択してください',
	'1' => '南東',
	'2' => '南',
	'3' => '南西',
	'4' => '西',
	'5' => '北西',
	'6' => '北',
	'7' => '北東',
	'8' => '東'
);

$CONF['img'] = array(
	'0201' => 'nagoya',
	'0202' => 'kokusai',
	'0203' => 'marunouchi',
	'0204' => 'hisaya',
	'0205' => 'takaoka',
	'0206' => 'kurumamichi',
	'0207' => 'ozone',
	'0208' => 'fushimi',
	'0209' => 'sakae',
	'0210' => 'shinsakae',
	'0211' => 'chikusa',
	'0212' => 'meitou',
	'0213' => 'yaba',
	'0214' => 'osu',
	'0215' => 'kamimaezu',
	'0216' => 'tsurumai',
	'0217' => 'syouwa',
	'0218' => 'higashibetuin',
	'0219' => 'kanayama',
	'0220' => 'other'
);

// 賃貸料金範囲
$CONF['rent'] = array(
	'5万円以下' => array(0, 50000),
	'5万円〜6万円' => array(50000, 60000),
	'6万円〜7万円' => array(60000, 70000),
	'7万円〜8万円' => array(70000, 80000),
	'8万円〜9万円' => array(80000, 90000),
	'9万円〜10万円' => array(90000, 100000)
);

$CONF['label_01'] = array('管理費', '共益費');
$CONF['label_02'] = array('敷金', '保証金');
$CONF['label_03'] = array('償却', '敷引', '解約引');
$CONF['label_04'] = array('礼金', '権利金');

$CONF['ku_nagoya'] = array(
	"昭和区",
	"瑞穂区",
	"天白区",
	"名東区",
	"中区",
	"中村区",
	"西区",
	"中川区",
	"港区",
	"南区",
	"熱田区",
	"緑区",
	"北区",
	"東区",
	"千種区",
	"守山区"
);

$CONF['floor_dir'] = array('地上', '地下');

$CONF['syoki_tuki'] = array('初期費用', '月額費用', '年額費用');
$CONF['tuki_rate_en'] = array('ヶ月', '%', '円');



$CONF['feature'] = array(
		'0'=>'ペット',
		'1'=>'駅近',
		'2'=>'新築',
		'3'=>'女性向け',
		'4'=>'リノベーション',
		'5'=>'転勤者向け',
		'6'=>'キャンペーン',
		'7'=>'高級物件'
	);
$CONF['pet'] = array(
		'0'=>'不可',
		'4'=>'可',
		'1'=>'小型犬1匹',
		'2'=>'小型犬2匹',
		'3'=>'猫'
	);

/*
if($_SERVER["SERVER_NAME"]=="d-brand.sakura.ne.jp"){
	// テストサーバ
	$ini = parse_ini_file(DEFINE_DIR.'/stg_config.ini', true);
	define('MAIL_FROM_NAME', 'roomRroom');
	//define('MAIL_FROM_ADDR', 'honda@fsent.jp');
	//$CONF['contact_addr'] = array('honda@fsent.jp');
	define('MAIL_FROM_ADDR', 'info@room-r.jp');
	$CONF['contact_addr'] = array('info@room-r.jp');

	define('WEB_ROOT', 'http://d-brand.sakura.ne.jp/room-r.jp_dev');
}else{
*/
	// 本番サーバ
	$ini = parse_ini_file(DEFINE_DIR.'/config.ini', true);
	define('MAIL_FROM_NAME', 'roomRroom');
	define('MAIL_FROM_ADDR', 'info@room-r.jp');
	$CONF['contact_addr'] = array('info@room-r.jp');

	define('WEB_ROOT', 'http://room-r.jp');
//}
define('DOC_ROOT', $_SERVER["DOCUMENT_ROOT"]);
define('WEB_NAME_MAIN', "");
define('WEB_NAME', "");
define('WEB_DESCRIPTION_MAIN',"");
define('WEB_DESCRIPTION_PT1',"");
define('WEB_DESCRIPTION_PT2',"");

/**
 * DBコネクタ
 */
define('DB_TYPE1', $ini['db_section']['DB_TYPE']);
define('DB_HOST1', $ini['db_section']['DB_HOST']);
define('DB_USER1', $ini['db_section']['DB_USER']);
define('DB_PASS1', $ini['db_section']['DB_PASS']);
define('DB_NAME1', $ini['db_section']['DB_NAME']);
define('DB_CHAR1', 'utf8');
define('CHAR_CODE', 'UTF-8');

//define('MAX_PICKUP_COUNT', $ini['define_section']['MAX_PICKUP_COUNT']);

/***********************************************************
 * 全ページ共通モジュール読み込み
 ***********************************************************/
session_start();
header('Expires:-1');
header('Cache-Control:');
header('Pragma:');
// pear設定
require_once('PEAR.php');
require_once('MDB2.php');
require_once('Log.php');

// LOGGING開始
$logger_conf = array(
    'append' => true,
    'locking' => false,
    'mode' => '0644',
    'dirmode' => '0755',
    'lineFormat' => '%1$s %2$s [%3$s] %4$s',
    'timeFormat' => '%Y/%m/%d %H:%M:%S'
);
$logger = Log::factory('file', LOG_FILE_NAME, 'bukken', $logger_conf, PEAR_LOG_DEBUG);

// smarty設定
require_once('Smarty.class.php');
$smarty = new Smarty;
$smarty->template_dir = './_html';
$smarty->compile_dir  = SMARTY_COMPILE_DIR;
$smarty->cache_dir    = SMARTY_CACHE_DIR;
$smarty->left_delimiter = '<!--{';
$smarty->right_delimiter = '}-->';
$smarty->compile_id = realpath($smarty->template_dir);
$smarty->register_modifier('mb_truncate', 'mb_truncate');

// DB設定
$dsn = DB_TYPE1.'://' . DB_USER1 . ':' . DB_PASS1 . '@tcp(' . DB_HOST1 . ')/' . DB_NAME1 . '?charset=' . DB_CHAR1 ;
$dsn_options = array(
    'portability' => MDB2_PORTABILITY_NONE
);
$mdb2 = MDB2::factory($dsn, $dsn_options);
if (PEAR::isError($mdb2))
{
    $logger->alert('DBに接続できません');
    $logger->alert($mdb2->getMessage());
    die('DBに接続できません');
}

$mdb2->setFetchMode(MDB2_FETCHMODE_ASSOC);
if ( PEAR::isError($mdb2) ) {
    $logger->alert('データベースエラーMDB2_FETCHMODE_ASSOC');
    $logger->alert($mdb2->getMessage());
    trigger_error('データベースエラー', E_USER_ERROR);
}
$mdb2->query('SET NAMES utf8');

// ログイン
$login_flg = false;

$query = 'SELECT * FROM admin_user_t WHERE admin_user_c = ' . $mdb2->quote($_SESSION["user_name"], 'text');
$result = $mdb2->query($query);
if ( PEAR::isError($result) ) {
	die($result->getMessage());
}
while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
	$line[] = $res;
}
if(isset($line[0])){
	$login_flg =  true;
}
$CONF["login_flg"] = $login_flg;


/*
使わない
if(checkUserAuth($_SESSION["user_name"])){
	$login_flg = true;
}
$CONF["login_flg"] = $login_flg;
function checkUserAuth($username){
	global $CONF, $mdb2, $logger;
	$query = 'SELECT * FROM admin_user_t WHERE admin_user_c = ' . $mdb2->quote($username, 'text');
	$result = $mdb2->query($query);
	if ( PEAR::isError($result) ) {
		die($result->getMessage());
	}
	while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
		$line[] = $res;
	}
	if(isset($line[0])){
		return true;
	}else{
		return false;
	}
}
*/
