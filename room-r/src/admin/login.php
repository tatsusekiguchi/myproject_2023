<?php
require_once '../include/define.php';

// Libs
require_once 'HTML/QuickForm.php';
require_once 'HTML/QuickForm/Renderer/ArraySmarty.php';

// 共通関数
require_once 'user_function.php';

$user_auth_level = "";

if("index.php" != basename($_SERVER["PHP_SELF"])){
	if(isset($_SESSION["user_name"])){
		if(checkUser($_SESSION["user_name"])){
			// ログインしてる場合
			// 権限レベル取得
			$query = 'SELECT * FROM admin_user_t WHERE admin_user_c = ' . $mdb2->quote($_SESSION["user_name"], 'text');
			$result = $mdb2->query($query);
			if ( PEAR::isError($result) ) {
				die($result->getMessage());
			}
			while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
				$line[] = $res;
			}
			$user_auth_level = $line[0]["level_c"];
			$smarty->assign("user_auth_level",$user_auth_level);
		}else{
			// ログインしていない場合
			header("Location: index.php");
		}
	}else{
		header("Location: index.php");
		die();
	}
}
function checkUser($username){
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
function checkLogin($username,$passwd){
	global $CONF, $mdb2, $logger;
	$query = 'SELECT * FROM admin_user_t WHERE admin_user_c = ' . $mdb2->quote($username, 'text') .' AND password_c = '. $mdb2->quote(md5($passwd), 'text');
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

?>