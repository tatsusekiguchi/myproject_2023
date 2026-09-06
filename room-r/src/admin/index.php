<?php
require_once '../include/define.php';

// Libs
require_once 'HTML/QuickForm.php';
require_once 'HTML/QuickForm/Renderer/ArraySmarty.php';

// 共通関数
require_once 'user_function.php';
require_once 'login.php';




// 140512追加
function logout(){
	unset($_SESSION["user_name"]);
	header('Location: index.php');
	exit;
}

if( !empty($_GET['logout']) && $_GET['logout'] ){
	logout();
}




$user = "";
$pass = "";
$error = "";
if(isset($_POST["user"]) && isset($_POST["passwd"])){
	$user = $_POST["user"];
	$pass = $_POST["passwd"];
	// ユーザ名パスワード送信されてればログイン判断処理
	if(checkLogin($user,$pass)){
		$_SESSION["user_name"] = $user;
		header("Location: buildingsList.php");
		die();
	}else{
		$error = "<strong style='color:#f00'>ユーザ名またはパスワードが違います。</strong><br />";
	}
}else{
	if(isset($_SESSION["user_name"])){
		if(checkUser($_SESSION["user_name"])){
			header("Location: buildingsList.php");
			die();
		}
	}
}

$tpl_path = 'login.tpl';
//--------------------
// レンダリング
//--------------------
$smarty->assign("error",$error);
$smarty->assign("username",$user);
$smarty->assign("pass",$pass);
$smarty->display($tpl_path);
exit;
?>
