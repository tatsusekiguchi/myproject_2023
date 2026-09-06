<?php
	require_once("../include/define.php");
	$result = "";

	if(isset($_POST["no"])){
		$stationNo = $CONF['transport_station'][$_POST["no"]];
		$i = 0;
		foreach($stationNo as $key=>$val){
			$result[$i]["id"] = $val;
			$result[$i]["val"] = $CONF['station'][$val];
			$i++;
		}
	}

	header('Content-type: application/json');
	echo json_encode($result);
