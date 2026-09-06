<?php

require_once '../include/define.php';

// Libs

// 共通関数
require_once 'user_function.php';
require_once 'Bukken.php';
$bukken = new Bukken();

$query = 'SELECT building_id_c FROM buildings_t';
$result = $mdb2->query($query);
if (PEAR::isError($result)) {
    $logger->err($query);
    $logger->err($result->getMessage());
    die($result->getMessage());
}
$line = array();
while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
    if (isset($res['building_id_c'])) {
        $bukken->updateBuilding($res['building_id_c']);
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<title>確認</title>
</head>
<body>
<?php
print '$_GET<br />' . "\n";
print_r ($_GET);
print '<br />$_POST<br />' . "\n";
print_r ($_POST);
print '<br />$_COOKIE<br />' . "\n";
print_r ($_COOKIE);
print '<br />$_REQUEST<br />' . "\n";
print_r ($_REQUEST);
print '<br />$_SESSION<br />' . "\n";
print_r ($_SESSION);
?>
</body>
</html>
