<?php

$dir = (isset($_GET['dir'])) ? $_GET['dir'] : '';
$file = (isset($_GET['file'])) ? $_GET['file'] : '';
$bg = (isset($_GET['bg'])) ? $_GET['bg'] : 'FFF';
$thumbFlg = (isset($_GET['thumbFlg'])) ? $_GET['thumbFlg'] : '';
$width = (isset($_GET['width'])) ? $_GET['width'] : '';
if (!ctype_xdigit($bg)) {
    $bg = 'FFF';
}
if($thumbFlg){
	$file = str_replace('L','S',$file);
}
?><!DOCTYPE html>
<html>
<head>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title>画像チェック</title>
</head>
<body style="background-color: #<?php echo htmlspecialchars($bg); ?>;">
<?php
if($thumbFlg){
?>
<div style="width: <?php echo $width; ?>; height:<?php echo $width; ?>; background: url(../<?php echo htmlspecialchars($dir); ?>/<?php echo htmlspecialchars($file); ?>) center; border: 1px solid "></div>
<?php
}else{
?>
<img src="../<?php echo htmlspecialchars($dir); ?>/<?php echo htmlspecialchars($file); ?>" border="1" />
<?php
}
?>
</body>
</html>
