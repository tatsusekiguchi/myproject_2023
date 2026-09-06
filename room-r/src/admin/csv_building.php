<?php
$errorMsgBuilding = array();
$buildingCsv = array(); // 物件CSV
$aryBuilding = array();

$resultMsgBuilding = "";

if(isset($_POST["register"])){
	/**
	 * 物件CSV検証
	 */
	if (is_uploaded_file($_FILES["building"]["tmp_name"])) {
		// CSV内容読み込み
		$buildingCsv = csv_to_array($_FILES["building"]["tmp_name"]);
		// ファイル内のデータループ
		$count = 1;
		foreach ($buildingCsv as $key => $line) {
			if($line[0] == "物件番号"){
				$count++;
				continue; // 一行目の最初が"物件番号"だったらスキップ
			}

			// 物件番号 --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[0]),"n","UTF-8");
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：物件番号が未記入です";
			}elseif(!is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：物件番号は半角数字で入力してください";
			}else{
				$result = getQuery( 'SELECT * FROM buildings_t WHERE building_no_c = '. $mdb2->quote($data, 'text') );
				if(!empty($result)){
					$errorMsgBuilding[] = $count."行目：物件番号はすでに登録されています";
				}else{
					$aryBuilding[$key][0] = $data;
				}
			}

			// 物件名 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[1];
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：物件名が未記入です";
			}elseif(mb_strlen($data,"UTF-8") > 50){
				$errorMsgBuilding[] = $count."行目：物件名は50文字以内で入力してください";
			}else{
				$result = getQuery( 'SELECT * FROM buildings_t WHERE building_name_c = '. $mdb2->quote($data, 'text') );
				if(!empty($result)){
					$errorMsgBuilding[] = $count."行目：物件名はすでに登録されています";
				}else{
					$aryBuilding[$key][1] = $data;
				}
			}

			// 物件名フリガナ --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[2];
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：物件名フリガナが未記入です";
			}elseif(mb_strlen($data,"UTF-8") > 50){
				$errorMsgBuilding[] = $count."行目：物件名フリガナは50文字以内で入力してください";
			}else{
				$result = getQuery( 'SELECT * FROM buildings_t WHERE building_furigana_c = '. $mdb2->quote($data, 'text') );
				if(!empty($result)){
					$errorMsgBuilding[] = $count."行目：物件名フリガナはすでに登録されています";
				}else{
					$aryBuilding[$key][2] = $data;
				}
			}

			// 都道府県 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[3];
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：都道府県が未記入です";
			}elseif($data != "愛知県"){
				$errorMsgBuilding[] = $count."行目：都道府県は愛知県と入力してください";
			}else{
				$aryBuilding[$key][3] = $data;
			}

			// 市区 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[4];
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：市区が未記入です";
			}elseif(!in_array(str_replace("名古屋市", "", $data),$CONF['ku_nagoya'])){
				$errorMsgBuilding[] = $count."行目：市区は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][4] = $data;
			}

			// 以下住所 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[5];
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：以下住所が未記入です";
			}elseif(mb_strlen($data,"UTF-8") > 100){
				$errorMsgBuilding[] = $count."行目：以下住所は100文字以内で入力してください";
			}else{
				$aryBuilding[$key][5] = $data;
			}

			// 沿線名1 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[6];
			$g_data = mb_convert_kana(trim($line[12]),"n","UTF-8"); // その他の沿線
			if(empty($g_data) && empty($data)){
				$errorMsgBuilding[] = $count."行目：その他の沿線が未入力の場合は沿線名1を入力してください";
			}elseif(!empty($data) && !in_array($data,$CONF['transport'])){
				$errorMsgBuilding[] = $count."行目：沿線名1は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][6] = $data;
			}

			// 駅名1 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[7];
			$g_data = mb_convert_kana(trim($line[13]),"n","UTF-8"); // その他の駅名
			if(empty($g_data) && empty($data)){
				$errorMsgBuilding[] = $count."行目：その他駅名が未入力の場合は駅名1を入力してください";
			}elseif(!empty($data) && !in_array($data,$CONF['station'])){
				$errorMsgBuilding[] = $count."行目：駅名1は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][7] = $data;
			}

			// 徒歩距離1（分） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[8]),"n","UTF-8");
			$g_data = mb_convert_kana(trim($line[14]),"n","UTF-8"); // その他の徒歩距離
			if(empty($g_data) && empty($data)){
				$errorMsgBuilding[] = $count."行目：その他徒歩距離（分）が未入力の場合は徒歩距離1（分）を入力してください";
			}elseif(!empty($data) && !is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：徒歩距離1（分）は半角数字で入力してください";
			}else{
				$aryBuilding[$key][8] = $data;
			}

			// その他の沿線 --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[12]),"n","UTF-8");
			$g_data = mb_convert_kana(trim($line[6]),"n","UTF-8"); // 沿線名1
			if(empty($g_data) && empty($data)){
				$errorMsgBuilding[] = $count."行目：沿線名1が未入力の場合はその他の沿線を入力してください";
			}
			$aryBuilding[$key][12] = $data;

			// その他の駅 --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[13]),"n","UTF-8");
			$g_data = mb_convert_kana(trim($line[7]),"n","UTF-8"); // 駅名1
			if(empty($g_data) && empty($data)){
				$errorMsgBuilding[] = $count."行目：駅名1が未入力の場合はその他駅名を入力してください";
			}
			$aryBuilding[$key][13] = $data;

			// その他の徒歩距離（分） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[14]),"n","UTF-8");
			$g_data = mb_convert_kana(trim($line[8]),"n","UTF-8"); // 徒歩距離1（分）
			if(empty($g_data) && empty($data)){
				$errorMsgBuilding[] = $count."行目：徒歩距離1（分）が未入力の場合はその他徒歩距離（分）を入力してください";
			}elseif(!empty($data) && !is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：その他の徒歩距離（分）は半角数字で入力してください";
			}else{
				$aryBuilding[$key][14] = $data;
			}

			// 沿線名2 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[9];
			if(!empty($data) && !in_array($data,$CONF['transport'])){
				$errorMsgBuilding[] = $count."行目：沿線名2は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][9] = $data;
			}

			// 駅名2 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[10];
			if(!empty($data) && !in_array($data,$CONF['station'])){
				$errorMsgBuilding[] = $count."行目：駅名2は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][10] = $data;
			}

			// 徒歩距離2（分） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[11]),"n","UTF-8");
			if(!empty($data) && !is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：徒歩距離2（分）は半角数字で入力してください";
			}else{
				$aryBuilding[$key][11] = $data;
			}

			// エリア --------------------------------------------------------------------------------------------------------------------------------
			$data = explode(" ",mb_convert_kana(trim($line[15]),"s","UTF-8"));
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：エリアが未記入です";
			}else{
				$g = false;
				foreach ($data as $key2 => $value) {
					if($value == "その他エリア"){ $value = "その他"; }
					if(in_array(trim($value),$area_check)) $g = true;
				}
				if(!$g){
					$errorMsgBuilding[] = $count."行目：エリアは指定の形式で入力してください";
				}else{
					$aryBuilding[$key][15] = $data;
				}
			}

			// 構造 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[16];
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：構造が未記入です";
			}elseif(!in_array($data,$CONF['structure'])){
				$errorMsgBuilding[] = $count."行目：構造は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][16] = $data;
			}

			// 総戸数 --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[17]),"n","UTF-8");
			if(!empty($data) && !is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：総戸数は半角数字で入力してください";
			}else{
				$aryBuilding[$key][17] = $data;
			}

			// 階数 --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[18]),"n","UTF-8");
			if(!empty($data) && !is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：階数は半角数字で入力してください";
			}else{
				$aryBuilding[$key][18] = $data;
			}

			// 築年月（年） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[19]),"n","UTF-8");
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：築年月（年）が未記入です";
			}elseif(!preg_match('/^[0-9][0-9][0-9][0-9]$/',$data)){
				$errorMsgBuilding[] = $count."行目：築年月（年）は西暦（半角数字4桁）で入力してください";
			}else{
				$aryBuilding[$key][19] = $data;
			}

			// 築年月（月） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[20]),"n","UTF-8");
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：築年月（月）が未記入です";
			}elseif(!is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：築年月（月）は半角数字で入力してください";
			}else{
				$aryBuilding[$key][20] = $data;
			}

			// 特集フラグ --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[21])){
				$data = explode(" ",mb_convert_kana(trim($line[21]),"s","UTF-8"));
				$g = false;
				foreach ($data as $key2 => $value) {
					if(in_array(trim($value),$CONF["feature"])) $g = true;
				}
				if(!$g){
					$errorMsgBuilding[] = $count."行目：特集フラグは指定の形式で入力してください".$line[21];
				}else{
					$aryBuilding[$key][21] = $data;
				}
			}

			// ペット可不可 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[22])){
				$data = explode(" ",mb_convert_kana(trim($line[22]),"s","UTF-8"));
				$g = false;
				foreach ($data as $key2 => $value) {
					if(in_array(trim($value),$CONF["pet"])) $g = true;
				}
				if(!$g){
					$errorMsgBuilding[] = $count."行目：ペット可不可は指定の形式で入力してください".$line[21];
				}else{
					$aryBuilding[$key][22] = $data;
				}
			}

			// ペットフリーワード --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[23];
			$aryBuilding[$key][23] = $data;

			// 駐車場 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[24];
			if(empty($data)){
				$errorMsgBuilding[] = $count."行目：駐車場が未記入です";
			}elseif(!in_array($data,$CONF['parking2'])){
				$errorMsgBuilding[] = $count."行目：駐車場は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][24] = $data;
			}

			// 駐車場タイプ --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[25])){
				$data = explode(" ",mb_convert_kana(trim($line[25]),"s","UTF-8"));
				$g = false;
				foreach ($data as $key2 => $value) {
					if(in_array(trim($value),$CONF["parking_type"])) $g = true;
				}
				if(!$g){
					$errorMsgBuilding[] = $count."行目：駐車場タイプは指定の形式で入力してください".$line[21];
				}else{
					$aryBuilding[$key][25] = $data;
				}
			}

			// 駐車料金（円） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[26]),"n","UTF-8");
			if(!empty($data) && !is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：駐車料金（円）は半角数字で入力してください";
			}else{
				$aryBuilding[$key][26] = $data;
			}

			// 駐車料金（税） --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[27];
			if(!empty($data) && !in_array($data,$parking_tax)){
				$errorMsgBuilding[] = $count."行目：駐車料金（税）は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][27] = $data;
			}

			// 火災保険（円） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[28]),"n","UTF-8");
			if(!empty($data) && !is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：火災保険（円）は半角数字で入力してください";
			}else{
				$aryBuilding[$key][28] = $data;
			}

			// 火災保険（有り無し） --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[29];
			if(!empty($data) && !in_array($data,$fire_flg)){
				$errorMsgBuilding[] = $count."行目：火災保険（有り無し）は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][29] = $data;
			}

			// おすすめポイント --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[30]),"n","UTF-8");
			if(!empty($data) && mb_strlen($data,"UTF-8") > 100){
				$errorMsgBuilding[] = $count."行目：おすすめポイントは200文字以内で入力してください";
			}else{
				$aryBuilding[$key][30] = $data;
			}

			// キャッチコピー --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[31]),"n","UTF-8");
			if(!empty($data) && mb_strlen($data,"UTF-8") > 100){
				$errorMsgBuilding[] = $count."行目：キャッチコピーは18文字以内で入力してください";
			}else{
				$aryBuilding[$key][31] = $data;
			}

			// 管理会社（名前） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[32]),"n","UTF-8");
			if(!empty($data) && mb_strlen($data,"UTF-8") > 255){
				$errorMsgBuilding[] = $count."行目：管理会社（名前）は255文字以内で入力してください";
			}else{
				$aryBuilding[$key][32] = $data;
			}

			// 管理会社（電話1） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[33]),"n","UTF-8");
			if(!empty($data) && mb_strlen($data,"UTF-8") > 255){
				$errorMsgBuilding[] = $count."行目：管理会社（電話1）は255文字以内で入力してください";
			}else{
				$aryBuilding[$key][33] = $data;
			}

			// 管理会社（電話2） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[34]),"n","UTF-8");
			if(!empty($data) && mb_strlen($data,"UTF-8") > 255){
				$errorMsgBuilding[] = $count."行目：管理会社（電話2）は255文字以内で入力してください";
			}else{
				$aryBuilding[$key][34] = $data;
			}

			// 保証会社（利用可不可） --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[35];
			if(!empty($data) && !in_array($data,$hoshou_availability)){
				$errorMsgBuilding[] = $count."行目：保証会社（利用可不可）は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][35] = $data;
			}

			// 保証会社名 --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[36];
			$aryBuilding[$key][36] = $data;

			// 保証料（円） --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[37]),"n","UTF-8");
			if(!empty($data) && !is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：保証料（円）は半角数字で入力してください";
			}else{
				$aryBuilding[$key][37] = $data;
			}

			// 保証更新料 --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[38]),"n","UTF-8");
			if(!empty($data) && !is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：保証更新料は半角数字で入力してください";
			}else{
				$aryBuilding[$key][38] = $data;
			}

			// 保証（％／円） --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[39];
			if(!empty($data) && !in_array($data,$hoshou_charge2_type)){
				$errorMsgBuilding[] = $count."行目：保証（％／円）は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][39] = $data;
			}

			// 保証（月／年／2年） --------------------------------------------------------------------------------------------------------------------------------
			$data = $line[40];
			if(!empty($data) && !in_array($data,$hoshou_charge2_interval)){
				$errorMsgBuilding[] = $count."行目：保証（月／年／2年）は指定の形式で入力してください";
			}else{
				$aryBuilding[$key][40] = $data;
			}

			// 優先度 --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[41]),"n","UTF-8");
			if(!empty($data) && !is_numeric($data)){
				$errorMsgBuilding[] = $count."行目：優先度は半角数字で入力してください";
			}else{
				$aryBuilding[$key][41] = $data;
			}

			// 下位表示フラグ --------------------------------------------------------------------------------------------------------------------------------
			$data = mb_convert_kana(trim($line[42]),"n","UTF-8");
			if(!empty($data)){
				if($data == 1){
					$errorMsgBuilding[] = $count."行目：下位表示フラグは1を入力するか未入力にしてください";
				}else{
					$aryBuilding[$key][42] = $data;
				}
			}
			$count++;
		}
	}
	if(empty($errorMsgBuilding)){
		// エラー無し 登録
		foreach ($aryBuilding as $key => $line) {
			$query = array();
			// 物件番号 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[0])){
				$data = $line[0];
				$query[] = "building_no_c=".$mdb2->quote($data, 'text');
			}


			// 物件名 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[1])){
				$data = $line[1];
				$query[] = "building_name_c=".$mdb2->quote($data, 'text');
			}

			// 物件名フリガナ --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[2])){
				$data = $line[2];
				$query[] = "building_furigana_c=".$mdb2->quote($data, 'text');
			}

			$address = ""; // 住所

			// 都道府県 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[3])){
				$data = $line[3];
				$address = $data;
				$query[] = "pref_c=".$mdb2->quote($data, 'text');
			}

			// 市区 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[4])){
				$data = $line[4];
				$address .= $data;
				$g = array_search(str_replace("名古屋市", "", $data),$CONF['ku_nagoya']);
				$query[] = "ku_c=".$mdb2->quote($g, 'integer');
			}

			// 以下住所 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[5])){
				$data = $line[5];
				$address .= $data;
				$query[] = "address_c=".$mdb2->quote($data, 'text');
			}

			// 緯度経度 --------------------------------------------------------------------------------------------------------------------------------
			$g = get_gps_from_address($address);
			if(isset($g["lat"])){
				$query[] = 'longitude_c='.$mdb2->quote($g["lng"], 'decimal');		   // 経度
				$query[] = 'latitude_c='.$mdb2->quote($g["lat"], 'decimal');			// 緯度
			}

			// 沿線名1 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[6])){
				$data = $line[6];
				$g = array_search($data,$CONF['transport']);
				$query[] = "transport1_c=".$mdb2->quote($g, 'integer');
			}

			// 駅名1 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[7])){
				$data = $line[7];
				$g = array_search($data,$CONF['station']);
				$query[] = "station1_c=".$mdb2->quote($g, 'integer');
			}

			// 徒歩距離1（分） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[8])){
				$data = $line[8];
				$query[] = "distance1_c=".$mdb2->quote($data, 'text');
			}

			// 沿線名2 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[9])){
				$data = $line[9];
				$g = array_search($data,$CONF['transport']);
				$query[] = "transport2_c=".$mdb2->quote($g, 'integer');
			}

			// 駅名2 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[10])){
				$data = $line[10];
				$g = array_search($data,$CONF['station']);
				$query[] = "station2_c=".$mdb2->quote($g, 'integer');
			}

			// 徒歩距離2（分） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[11])){
				$data = $line[11];
				$query[] = "distance2_c=".$mdb2->quote($data, 'text');
			}

			// その他の沿線 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[12])){
				$data = $line[12];
				$query[] = "transport3_c=".$mdb2->quote($data, 'text');
			}

			// その他の駅 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[13])){
				$data = $line[13];
				$query[] = "station3_c=".$mdb2->quote($data, 'text');
			}

			// その他の徒歩距離（分） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[14])){
				$data = $line[14];
				$query[] = "distance3_c=".$mdb2->quote($data, 'text');
			}

			// エリア --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[15])){
				$data = $line[15];
				$g = array();
				foreach ($data as $key2 => $value) {
					$value = $value=="その他エリア"?"その他":$value;
					$g[] = array_search($value,$area_check);
				}
				$query[] = "area_c=".$mdb2->quote(implode(",",$g), 'text');
			}

			// 構造 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[16])){
				$data = $line[16];
				$address .= $data;
				$g = array_search($data,$CONF['structure']);
				$query[] = "structure_c=".$mdb2->quote($g, 'integer');
			}

			// 総戸数 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[17])){
				$data = $line[17];
				$query[] = "house_c=".$mdb2->quote($data, 'integer');
			}

			// 階数 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[18])){
				$data = $line[18];
				$query[] = "floor_c=".$mdb2->quote($data, 'integer');
			}

			// 築年月（年） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[19])){
				$data = $line[19];
				$query[] = "completion_year_c=".$mdb2->quote($data, 'integer');
			}

			// 築年月（月） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[20])){
				$data = $line[20];
				$query[] = "completion_month_c=".$mdb2->quote($data, 'integer');
			}

			// 特集フラグ --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[21])){
				$data = $line[21];
				$g = array();
				foreach ($data as $key2 => $value) {
					$g[] = array_search($value,$CONF["feature"]);
				}
				$query[] = "feature_c=".$mdb2->quote(implode(",",$g), 'text');
			}

			// ペット可不可 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[22])){
				$data = $line[22];
				$g = array();
				foreach ($data as $key2 => $value) {
					$g[] = array_search($value,$CONF["pet"]);
				}
				$query[] = "pet_c=".$mdb2->quote(implode(",",$g), 'text');
			}

			// ペットフリーワード --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[23])){
				$data = $line[23];
				$query[] = "petfree_c=".$mdb2->quote($data, 'text');
			}

			// 駐車場 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[24])){
				$data = $line[24];
				$address .= $data;
				$g = array_search($data,$CONF['parking2']);
				$query[] = "parking_c=".$mdb2->quote($g, 'integer');
			}

			// 駐車場タイプ --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[25])){
				$data = $line[25];
				$g = array();
				foreach ($data as $key2 => $value) {
					$g[] = array_search($value,$CONF["parking_type"]);
				}
				$query[] = "parking_type_c=".$mdb2->quote(implode(",",$g), 'text');
			}else{
				$query[] = "parking_type_c=".$mdb2->quote("", 'text');
			}

			// 駐車料金（円） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[26])){
				$data = $line[26];
				$query[] = "parking_charge_c=".$mdb2->quote($data, 'decimal');
			}else{
				$query[] = "parking_charge_c=NULL";
			}

			// 駐車料金（税） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[27])){
				$data = $line[27];
				$address .= $data;
				$g = array_search($data,$parking_tax);
				$query[] = "parking_tax_c=".$mdb2->quote($g, 'integer');
			}else{
				$query[] = "parking_tax_c=".$mdb2->quote(0, 'integer');
			}

			// 火災保険（円） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[28])){
				$data = $line[28];
				$query[] = "fire_c=".$mdb2->quote($data, 'decimal');
			}else{
				$query[] = "fire_c=NULL";
			}

			// 火災保険（有り無し） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[29])){
				$data = $line[29];
				$address .= $data;
				$g = array_search($data,$fire_flg);
				$query[] = "fire_flg_c=".$mdb2->quote($g, 'integer');
			}else{
				$query[] = "fire_flg_c=".$mdb2->quote(0, 'integer');
			}

			// おすすめポイント --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[30])){
				$data = $line[30];
				$query[] = "comment1_c=".$mdb2->quote($data, 'text');
			}

			// キャッチコピー --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[31])){
				$data = $line[31];
				$query[] = "catch_c=".$mdb2->quote($data, 'text');
			}

			// 管理会社（名前） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[32])){
				$data = $line[32];
				$query[] = "yanushi_name_c=".$mdb2->quote($data, 'text');
			}

			// 管理会社（電話1） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[33])){
				$data = $line[33];
				$query[] = "yanushi_tel1_c=".$mdb2->quote($data, 'text');
			}

			// 管理会社（電話2） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[34])){
				$data = $line[34];
				$query[] = "yanushi_tel2_c=".$mdb2->quote($data, 'text');
			}

			// 保証会社（利用可不可） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[35])){
				$data = $line[35];
				$address .= $data;
				$g = array_search($data,$hoshou_availability);
				$query[] = "hoshou_availability_c=".$mdb2->quote($g, 'decimal');
			}else{
				$query[] = "hoshou_availability_c=0";
			}

			// 保証会社名 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[36])){
				$data = $line[36];
				$query[] = "hoshou_company_c=".$mdb2->quote($data, 'text');
			}

			// 保証料（円） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[37])){
				$data = $line[37];
				$query[] = "hoshou_charge_c=".$mdb2->quote($data, 'decimal');
			}else{
				$query[] = "hoshou_charge_c=NULL";
			}

			// 保証更新料 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[38])){
				$data = $line[38];
				$query[] = "hoshou_charge2_c=".$mdb2->quote($data, 'decimal');
			}else{
				$query[] = "hoshou_charge2_c=NULL";
			}

			// 保証（％／円） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[39])){
				$data = $line[39];
				$address .= $data;
				$g = array_search($data,$hoshou_charge2_type);
				$query[] = "hoshou_charge2_type_c=".$mdb2->quote($g, 'decimal');
			}else{
				$query[] = "hoshou_charge2_type_c=0";
			}

			// 保証（月／年／2年） --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[40])){
				$data = $line[40];
				$g = array_search($data,$hoshou_charge2_interval);
				$query[] = "hoshou_charge2_interval_c=".$mdb2->quote($g, 'decimal');
			}else{
				$query[] = "hoshou_charge2_interval_c=0";
			}

			// 優先度 --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[41])){
				$data = $line[41];
				$query[] = "order_c=".$mdb2->quote($data, 'text');
			}

			// 下位表示フラグ --------------------------------------------------------------------------------------------------------------------------------
			if(!empty($line[42])){
				$data = $line[42];
				if($data == 1){
					$query[] = "under_flg_c=1";
				}else{
					$query[] = "under_flg_c=0";
				}
			}else{
				$query[] = "under_flg_c=0";
			}

			$query[] = 'reg_date_c=now()';
			$query[] = 'status_c = 1';

			$sql = "INSERT INTO buildings_t SET ";
			$sql .= implode(", ",$query);

			$result = $mdb2->exec($sql);
			if ( PEAR::isError($result) ) {
				$logger->err($query);
				die($result->getMessage());
			}

			$id = $mdb2->lastInsertID();
			Bukken::updateBuilding($id);

			$count++;
		}
		if(!empty($aryBuilding)){
			$resultMsgBuilding = "物件情報を取り込みました！";
		}
	}
}
function get_gps_from_address( $address='' ){
	$res = array();
	$req = 'http://maps.google.com/maps/api/geocode/xml';
	$req .= '?address='.urlencode($address);
	$req .= '&sensor=false';    
	$xml = simplexml_load_file($req) or die('XML parsing error');
	if ($xml->status == 'OK') {
		$location = $xml->result->geometry->location;
		$res['lat'] = (string)$location->lat[0];
		$res['lng'] = (string)$location->lng[0];
	}
	return $res;
}

