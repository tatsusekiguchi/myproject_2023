<?php
	require_once("../include/define.php");
	header('Content-type: application/json');
	echo json_encode($CONF['transport']);
