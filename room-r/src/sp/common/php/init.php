<?php
/**
 * アクセス時の処理
 */

require_once(dirname(__FILE__)."/define.php");

if( IS_DEBUG ){
	ini_set("display_errors", 1);
	error_reporting(E_ALL & ~E_STRICT);
} else {
	ini_set("display_errors", 0);
	error_reporting(0);
}
