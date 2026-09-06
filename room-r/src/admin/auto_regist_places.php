<?php
	/* このファイルはテスト用です. テストが済んだら削除してください. */

	require_once '../include/define.php';
	require_once(dirname(__FILE__).'/define_m.php');

	// auto_regist_places($mdb2, G_PLACES_API_KEY, 80, '35.164995', '136.958924');

	function auto_regist_places(&$mdb2, $apikey, $bid, $lat, $lng){
		if( !is_numeric($bid) || !is_string($lat) || !is_string($lng) ){ return false;}
		$bid = intval($bid);

		// 既に登録されているか
		$sql = "SELECT * FROM places_t WHERE `building_id_c` = ".$bid;
		$result = $mdb2->query($sql);
		if( PEAR::isError($result) ){ echo $result->getMessage(); exit;}
		if( $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){
			return true;
		}

		// apiからデータ取得
		$request = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location={$lat},{$lng}&radius=2000&language=ja&key={$apikey}&sensor=false";
		if( $result = file_get_contents($request) ){
			$result = json_decode($result, true);
			if( $result['status'] != 'OK' ){ echo 'error.'; exit;}
		} else {
			 echo 'error.'; exit;
		}
		$places = $result['results'];

		// データベースへ登録
		$cnt = 0;
		foreach($places as $p){
			// ID	..	$p['id']
			// 名前	..	$p['name']
			// 緯度	..	$p['geometry']['location']['lat']
			// 経度	..	$p['geometry']['location']['lng']

			$cnt++;
			if( $cnt > 15 ){ break;}

			$sql = "INSERT INTO places_t (building_id_c, name_c, g_id_c, latlng_c) VALUES ("
				.$mdb2->quote($bid, 'integer').','
				.$mdb2->quote($p['name'], 'text').','
				.$mdb2->quote($p['id'], 'text').','
				.$mdb2->quote($p['geometry']['location']['lat'].','.$p['geometry']['location']['lng'], 'text')
				.")";
			$result = $mdb2->exec($sql);
			if( PEAR::isError($result) ){
				echo $result->getMessage(); exit;
			}
		}
	}

	echo 'done.';







