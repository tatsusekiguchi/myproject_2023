<?php
/**
 * PHPの設定、定数及び変数と関数の定義
 */

// PC版における定義
require_once(dirname(__FILE__)."/PC.php");
$PC = new PC();

mb_internal_encoding("UTF-8");
mb_regex_encoding("UTF-8");
mb_language("Japanese");

// define("DOC_ROOT", implode("/", array_slice(explode("/", __FILE__), 0, -3)));
define("HOME_URL", "http://room-r.jp/sp");
define("SITE_NAME", "room R room");
define("IS_DEBUG", true);

define("DR", DOC_ROOT);
define("HU", HOME_URL);
define("SN", SITE_NAME);

// 物件検索関連の関数
require_once(dirname(__FILE__).'/search_functions.php');

$global = array();

// テンプレートファイルを読み込み
function include_template_part($include, $page = ""){
	global $global;
	if( !file_exists(dirname(__FILE__)."/tpl/{$include}.php") ) trigger_error("テンプレートファイル({$include}.php)が見つかりません。", E_USER_ERROR);
	$page = ( $page === "" ) ? get_current_page() : explode("/", $page);
	$home = get_relative_home_path($page);
	include(dirname(__FILE__)."/tpl/{$include}.php");
}

// ページ配列を取得
function get_current_page(){
	$backtrace = array_reverse(debug_backtrace());
	$cnt = 0;
	while( list($k, $v) = each($backtrace) ){
		if( defined("PHP2HTML_PAGE_SKIP") && $cnt++ < PHP2HTML_PAGE_SKIP + 1 ) continue;
		break;
	}
	$result = mb_substr(mb_substr($v["file"], 0, -1 * mb_strlen(".php")), mb_strlen(DR) + 1);
	return explode("/", $result);
}

// ホームへの相対パスを取得
function get_relative_home_path($page){
	$result = ".";
	for($i = 0; $i < count($page); $i++){
		if( $i === 0 ) continue;
		if( !is_string($page[$i]) || $page[$i] === "" ) break;
		$result .= ( $result === "." ) ? "." : "/..";
	}
	return $result;
}

if( !function_exists("h") ){
	// 文字列を画面表示用にエスケープ
	function h($t){
		if( is_array($t) ) return array_map("h", $t);
		if( !is_string($t) ) return $t;
		return htmlspecialchars($t);
	}
}

if( !function_exists("sanitize") ){
	// nullバイト文字を除去
	function sanitize($t){
		if( is_array($t) ) return array_map("sanitize", $t);
		if( !is_string($t) ) return $t;
		return str_replace("\0", "", $t);
	}
}
