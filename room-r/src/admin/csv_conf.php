<?php
$area_check = array();
foreach($CONF['area'] as $key => $val){
	$area_check[$key] = $val["name"];
}

$parking_tax = array(0=>"税別",1=>"税込み",2=>"要確認");

$fire_flg = array(1=>"有り",0=>"無し",2=>"要確認");

$hoshou_availability = array(0=>"利用可",1=>"必須",2=>"なし",3=>"要確認");

$hoshou_charge2_type = array(0=>"%",1=>"円");

$hoshou_charge2_interval = array(0=>"月",1=>"年",2=>"2年");

$status = array(1=>"空き有り",2=>"空きなし",3=>"確認中");

$tax_list = array(0=>"税別",1=>"税込み");