<?php
$errorMsgRoom = array();
$roomCsv = array(); // 物件CSV
$aryRoom = array();

$resultMsgRoom = "";

if(isset($_POST["register"])){
	/**
	 * 部屋CSV検証
	 */
	if (is_uploaded_file($_FILES["room"]["tmp_name"])) {
		if(empty($errorMsgBuilding)){
			// CSV内容読み込み
			$roomCsv = csv_to_array($_FILES["room"]["tmp_name"]);
			// ファイル内のデータループ
			$count = 1;
			foreach ($roomCsv as $key => $line) {
				if($line[0] == "物件番号"){
					$count++;
					continue; // 一行目の最初が"物件番号"だったらスキップ
				}

				// 物件番号 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[0]),"n","UTF-8");
				if(empty($data)){
					$errorMsgRoom[] = $count."行目：物件番号が未記入です";
				}elseif(!is_numeric($data)){
					$errorMsgRoom[] = $count."行目：物件番号は半角数字で入力してください";
				}else{
					$result = getQuery( 'SELECT * FROM buildings_t WHERE building_no_c = '. $mdb2->quote($data, 'text') );
					if(empty($result)){
						$errorMsgRoom[] = $count."行目：物件番号が存在しません";
					}else{
						$aryRoom[$key][0] = $data;
					}
				}

				// タイプ名 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[1];
				if(empty($data)){
					$errorMsgRoom[] = $count."行目：タイプ名が未記入です";
				}elseif(mb_strlen($data,"UTF-8") > 20){
					$errorMsgRoom[] = $count."行目：タイプ名は20文字以内で入力してください";
				}else{
					$aryRoom[$key][1] = $data;
				}

				// 号室 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[2];
				if(empty($data)){
					$errorMsgRoom[] = $count."行目：号室が未記入です";
				}elseif(mb_strlen($data,"UTF-8") > 20){
					$errorMsgRoom[] = $count."行目：号室は20文字以内で入力してください";
				}else{
					$aryRoom[$key][2] = $data;
				}

				// 表示順 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[3]),"n","UTF-8");
				if(empty($data)){
					$errorMsgRoom[] = $count."行目：表示順が未記入です";
				}elseif(!is_numeric($data)){
					$errorMsgRoom[] = $count."行目：表示順は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 20){
					$errorMsgRoom[] = $count."行目：表示順は20文字以内で入力してください";
				}else{
					$aryRoom[$key][3] = $data;
				}

				// 公開状況 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[4];
				if(empty($data)){
					$errorMsgRoom[] = $count."行目：公開状況が未記入です";
				}elseif(!in_array($data,$status)){
					$errorMsgRoom[] = $count."行目：公開状況は指定の形式で入力してください";
				}else{
					$aryRoom[$key][4] = $data;
				}

				// 間取り --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[5];
				if(empty($data)){
					$errorMsgRoom[] = $count."行目：間取りが未記入です";
				}elseif(!in_array($data,$CONF['layout_regist'])){
					$errorMsgRoom[] = $count."行目：間取りは指定の形式で入力してください";
				}else{
					$aryRoom[$key][5] = $data;
				}

				// 面積 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[6]),"n","UTF-8");
				if(empty($data)){
					$errorMsgRoom[] = $count."行目：面積が未記入です";
				}elseif(!is_numeric($data)){
					$errorMsgRoom[] = $count."行目：面積は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 20){
					$errorMsgRoom[] = $count."行目：面積は20文字以内で入力してください";
				}else{
					$aryRoom[$key][6] = $data;
				}

				// 部屋向き --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[7];
				if(!empty($data) && !in_array($data,$CONF['direction'])){
					$errorMsgRoom[] = $count."行目：部屋向きは指定の形式で入力してください";
				}else{
					$aryRoom[$key][7] = $data;
				}

				// 賃料 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[8]),"n","UTF-8");
				if(empty($data)){
					$errorMsgRoom[] = $count."行目：賃料が未記入です";
				}elseif(!is_numeric($data)){
					$errorMsgRoom[] = $count."行目：賃料は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 8){
					$errorMsgRoom[] = $count."行目：賃料は8文字以内で入力してください";
				}else{
					$aryRoom[$key][8] = $data;
				}

				// 共益費 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[9]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：共益費は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 8){
					$errorMsgRoom[] = $count."行目：共益費は8文字以内で入力してください";
				}else{
					$aryRoom[$key][9] = $data;
				}

				// 敷金／礼金選択 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[10];
				if(!empty($data) && !in_array($data,$CONF['label_02'])){
					$errorMsgRoom[] = $count."行目：敷金／礼金選択は指定の形式で入力してください";
				}else{
					$aryRoom[$key][10] = $data;
				}

				// 敷金／礼金数値 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[11]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：敷金／礼金数値は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 8){
					$errorMsgRoom[] = $count."行目：敷金／礼金数値は8文字以内で入力してください";
				}else{
					$aryRoom[$key][11] = $data;
				}

				// 敷金／礼金単位 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[12];
				if(!empty($data) && !in_array($data,$CONF['tuki_rate_en'])){
					$errorMsgRoom[] = $count."行目：敷金／礼金単位は指定の形式で入力してください";
				}else{
					$aryRoom[$key][12] = $data;
				}

				// 償却／敷引／解約金選択 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[13];
				if(!empty($data) && !in_array($data,$CONF['label_03'])){
					$errorMsgRoom[] = $count."行目：償却／敷引／解約金選択は指定の形式で入力してください";
				}else{
					$aryRoom[$key][13] = $data;
				}

				// 償却／敷引／解約金数値 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[14]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：償却／敷引／解約金数値は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 8){
					$errorMsgRoom[] = $count."行目：償却／敷引／解約金数値は8文字以内で入力してください";
				}else{
					$aryRoom[$key][14] = $data;
				}

				// 償却／敷引／解約金単位 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[15];
				if(!empty($data) && !in_array($data,$CONF['tuki_rate_en'])){
					$errorMsgRoom[] = $count."行目：償却／敷引／解約金単位は指定の形式で入力してください";
				}else{
					$aryRoom[$key][15] = $data;
				}

				// 礼金／権利金選択 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[16];
				if(!empty($data) && !in_array($data,$CONF['label_04'])){
					$errorMsgRoom[] = $count."行目：礼金／権利金選択は指定の形式で入力してください";
				}else{
					$aryRoom[$key][16] = $data;
				}

				// 礼金／権利金数値 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[17]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：礼金／権利金数値は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 8){
					$errorMsgRoom[] = $count."行目：礼金／権利金数値は8文字以内で入力してください";
				}else{
					$aryRoom[$key][17] = $data;
				}

				// 礼金／権利金単位 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[18];
				if(!empty($data) && !in_array($data,$CONF['tuki_rate_en'])){
					$errorMsgRoom[] = $count."行目：礼金／権利金単位は指定の形式で入力してください";
				}else{
					$aryRoom[$key][18] = $data;
				}

				// 更新料 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[19]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：更新料は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 8){
					$errorMsgRoom[] = $count."行目：更新料は8文字以内で入力してください";
				}else{
					$aryRoom[$key][19] = $data;
				}

				// 更新事務手数料 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[20]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：更新事務手数料は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 8){
					$errorMsgRoom[] = $count."行目：更新事務手数料は8文字以内で入力してください";
				}else{
					$aryRoom[$key][20] = $data;
				}

				// 初期費用1必須 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[21]),"n","UTF-8");
				if(!empty($data) && $data != 1){
					$errorMsgRoom[] = $count."行目：初期費用1必須は未記入か1を入力してください";
				}else{
					$aryRoom[$key][21] = $data;
				}

				// 初期費用1名前 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[22];
				if(!empty($data) && mb_strlen($data,"UTF-8") > 255){
					$errorMsgRoom[] = $count."行目：初期費用1名前は255文字以内で入力してください";
				}else{
					$aryRoom[$key][22] = $data;
				}

				// 初期費用1金額 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[23]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：初期費用1金額は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 10){
					$errorMsgRoom[] = $count."行目：初期費用1金額は10文字以内で入力してください";
				}else{
					$aryRoom[$key][23] = $data;
				}

				// 初期費用1税別／税込み --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[24];
				if(!empty($data) && !in_array($data,$tax_list)){
					$errorMsgRoom[] = $count."行目：初期費用1税別／税込みは指定の形式で入力してください";
				}else{
					$aryRoom[$key][24] = $data;
				}

				// 初期費用2必須 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[25]),"n","UTF-8");
				if(!empty($data) && $data != 1){
					$errorMsgRoom[] = $count."行目：初期費用2必須は未記入か1を入力してください";
				}else{
					$aryRoom[$key][25] = $data;
				}

				// 初期費用2名前 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[26];
				if(!empty($data) && mb_strlen($data,"UTF-8") > 255){
					$errorMsgRoom[] = $count."行目：初期費用2名前は255文字以内で入力してください";
				}else{
					$aryRoom[$key][26] = $data;
				}

				// 初期費用2金額 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[27]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：初期費用2金額は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 10){
					$errorMsgRoom[] = $count."行目：初期費用2金額は10文字以内で入力してください";
				}else{
					$aryRoom[$key][27] = $data;
				}

				// 初期費用2税別／税込み --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[28];
				if(!empty($data) && !in_array($data,$tax_list)){
					$errorMsgRoom[] = $count."行目：初期費用2税別／税込みは指定の形式で入力してください";
				}else{
					$aryRoom[$key][28] = $data;
				}

				// 月額費用1必須 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[29]),"n","UTF-8");
				if(!empty($data) && $data != 1){
					$errorMsgRoom[] = $count."行目：月額費用1必須は未記入か1を入力してください";
				}else{
					$aryRoom[$key][29] = $data;
				}

				// 月額費用1名前 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[30];
				if(!empty($data) && mb_strlen($data,"UTF-8") > 255){
					$errorMsgRoom[] = $count."行目：月額費用1名前は255文字以内で入力してください";
				}else{
					$aryRoom[$key][30] = $data;
				}

				// 月額費用1金額 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[31]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：月額費用1金額は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 10){
					$errorMsgRoom[] = $count."行目：月額費用1金額は10文字以内で入力してください";
				}else{
					$aryRoom[$key][31] = $data;
				}

				// 月額費用1税別／税込み --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[32];
				if(!empty($data) && !in_array($data,$tax_list)){
					$errorMsgRoom[] = $count."行目：月額費用1税別／税込みは指定の形式で入力してください";
				}else{
					$aryRoom[$key][32] = $data;
				}

				// 月額費用2必須 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[33]),"n","UTF-8");
				if(!empty($data) && $data != 1){
					$errorMsgRoom[] = $count."行目：月額費用2必須は未記入か1を入力してください";
				}else{
					$aryRoom[$key][33] = $data;
				}

				// 月額費用2名前 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[34];
				if(!empty($data) && mb_strlen($data,"UTF-8") > 255){
					$errorMsgRoom[] = $count."行目：月額費用2名前は255文字以内で入力してください";
				}else{
					$aryRoom[$key][34] = $data;
				}

				// 月額費用2金額 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[35]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：月額費用2金額は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 10){
					$errorMsgRoom[] = $count."行目：月額費用2金額は10文字以内で入力してください";
				}else{
					$aryRoom[$key][35] = $data;
				}

				// 月額費用2税別／税込み --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[36];
				if(!empty($data) && !in_array($data,$tax_list)){
					$errorMsgRoom[] = $count."行目：月額費用2税別／税込みは指定の形式で入力してください";
				}else{
					$aryRoom[$key][36] = $data;
				}

				// 町費 選択 --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[37];
				if(!empty($data) && !in_array($data,$CONF["syoki_tuki"])){
					$errorMsgRoom[] = $count."行目：町費 選択は指定の形式で入力してください";
				}else{
					$aryRoom[$key][37] = $data;
				}

				// 町費金額 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[38]),"n","UTF-8");
				if(!empty($data) && !is_numeric($data)){
					$errorMsgRoom[] = $count."行目：町費金額は半角数字で入力してください";
				}elseif(mb_strlen($data,"UTF-8") > 11){
					$errorMsgRoom[] = $count."行目：町費金額は11文字以内で入力してください";
				}else{
					$aryRoom[$key][38] = $data;
				}

				// 町費税別／税込み --------------------------------------------------------------------------------------------------------------------------------
				$data = $line[39];
				if(!empty($data) && !in_array($data,$tax_list)){
					$errorMsgRoom[] = $count."行目：町費税別／税込みは指定の形式で入力してください";
				}else{
					$aryRoom[$key][39] = $data;
				}

				// 設備フラグ --------------------------------------------------------------------------------------------------------------------------------
				$data = explode(" ",mb_convert_kana(trim($line[40]),"s","UTF-8"));
				if(!empty($data[0])){
					$g = false;
					foreach ($data as $key2 => $value) {
						if(in_array(trim($value),$CONF['flg'])) $g = true;
					}
					if(!$g){
						$errorMsgRoom[] = $count."行目：設備フラグは指定の形式で入力してください";
					}else{
						$aryRoom[$key][40] = $data;
					}
				}

				// 設備備考 --------------------------------------------------------------------------------------------------------------------------------
				$data = mb_convert_kana(trim($line[41]),"n","UTF-8");
				if(!empty($data) && mb_strlen($data,"UTF-8") > 35){
					$errorMsgRoom[] = $count."行目：設備備考は35文字以内で入力してください";
				}else{
					$aryRoom[$key][41] = $data;
				}

				$count++;
			}
		}else{
			$errorMsgRoom[] = "物件登録でエラーがあるため部屋の登録をキャンセルしました";
		}
	}

	if(empty($errorMsgRoom)){
		if(empty($errorMsgBuilding)){
			// エラー無し 登録
			foreach ($aryRoom as $key => $line) {
				$query = array();

				$bid = 0;

				// 物件番号 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[0])){
					$data = $line[0];
					$result = getQuery( 'SELECT building_id_c FROM buildings_t WHERE building_no_c = '. $mdb2->quote($data, 'text') );
					$bid = $result[0]["building_id_c"];
					$query[] = "building_id_c=".$mdb2->quote($result[0]["building_id_c"], 'text');
				}

				// タイプ名 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[1])){
					$data = $line[1];
					$query[] = "house_no_c=".$mdb2->quote($data, 'text');
				}

				// 号室 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[2])){
					$data = $line[2];
					$query[] = "house_no_note_c=".$mdb2->quote($data, 'text');
				}

				// 表示順 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[3])){
					$data = $line[3];
					$query[] = "sort_c=".$mdb2->quote($data, 'text');
				}

				// 公開状況 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[4])){
					$data = $line[4];
					$g = array_search($data,$status);
					$query[] = "status_c=".$mdb2->quote($g, 'integer');
				}

				// 間取り --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[5])){
					$data = $line[5];
					$g = array_search($data,$CONF['layout_regist']);
					$query[] = "layout_c=".$mdb2->quote($g, 'integer');
				}

				// 面積 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[6])){
					$data = $line[6];
					$query[] = "space_c=".$mdb2->quote($data, 'decimal');
				}

				// 部屋向き --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[7])){
					$data = $line[7];
					$g = array_search($data,$CONF['direction']);
					$query[] = "direction_c=".$mdb2->quote($g, 'integer');
				}

				// 賃料 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[8])){
					$data = $line[8];
					$query[] = "rental_price_c=".$mdb2->quote($data, 'integer');
				}

				// 共益費 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[9])){
					$data = $line[9];
					$query[] = "money_01_c=".$mdb2->quote($data, 'decimal');
				}else{
					$query[] = "money_01_c=NULL";
				}

				// 敷金／礼金選択 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[10])){
					$data = $line[10];
					$g = array_search($data,$CONF['label_02']);
					$query[] = "divide_money_02_c=".$mdb2->quote($g, 'decimal');
				}else{
					$query[] = "divide_money_02_c=NULL";
				}

				// 敷金／礼金数値 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[11])){
					$data = $line[11];
					$query[] = "money_02_c=".$mdb2->quote($data, 'decimal');
				}else{
					$query[] = "money_02_c=NULL";
				}

				// 敷金／礼金単位 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[12])){
					$data = $line[12];
					$g = array_search($data,$CONF['tuki_rate_en']);
					$query[] = "money_02_type_c=".$mdb2->quote($g, 'decimal');
				}else{
					$query[] = "money_02_type_c=NULL";
				}

				// 償却／敷引／解約金選択 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[13])){
					$data = $line[13];
					$g = array_search($data,$CONF['label_03']);
					$query[] = "divide_money_03_c=".$mdb2->quote($g, 'decimal');
				}else{
					$query[] = "divide_money_03_c=NULL";
				}

				// 償却／敷引／解約金数値 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[14])){
					$data = $line[14];
					$query[] = "money_03_c=".$mdb2->quote($data, 'decimal');
				}else{
					$query[] = "money_03_c=NULL";
				}

				// 償却／敷引／解約金単位 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[15])){
					$data = $line[15];
					$g = array_search($data,$CONF['tuki_rate_en']);
					$query[] = "money_03_type_c=".$mdb2->quote($g, 'decimal');
				}else{
					$query[] = "money_03_type_c=NULL";
				}

				// 礼金／権利金選択 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[16])){
					$data = $line[16];
					$g = array_search($data,$CONF['label_04']);
					$query[] = "divide_money_04_c=".$mdb2->quote($g, 'decimal');
				}else{
					$query[] = "divide_money_04_c=NULL";
				}

				// 礼金／権利金数値 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[17])){
					$data = $line[17];
					$query[] = "money_04_c=".$mdb2->quote($data, 'decimal');
				}else{
					$query[] = "money_04_c=NULL";
				}

				// 礼金／権利金単位 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[18])){
					$data = $line[18];
					$g = array_search($data,$CONF['tuki_rate_en']);
					$query[] = "money_04_type_c=".$mdb2->quote($g, 'decimal');
				}else{
					$query[] = "money_04_type_c=NULL";
				}

				// 更新料 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[19])){
					$data = $line[19];
					$query[] = "money_05_c=".$mdb2->quote($data, 'decimal');
				}else{
					$query[] = "money_05_c=NULL";
				}

				// 更新事務手数料 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[20])){
					$data = $line[20];
					$query[] = "money_05_zimu_c=".$mdb2->quote($data, 'decimal');
				}else{
					$query[] = "money_05_zimu_c=NULL";
				}

				// 町費 選択 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[37])){
					$data = $line[37];
					$g = array_search($data,$CONF['syoki_tuki']);
					$query[] = "chouhi_type_c=".$mdb2->quote($g, 'integer');
				}else{
					$query[] = "chouhi_type_c=NULL";
				}

				// 町費金額 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[38])){
					$data = $line[38];
					$query[] = "chouhi_c=".$mdb2->quote($data, 'decimal');
				}else{
					$query[] = "chouhi_c=NULL";
				}

				// 町費税別／税込み --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[39])){
					$data = $line[39];
					$g = array_search($data,$tax_list);
					$query[] = "tax_chouhi_c=".$mdb2->quote($g, 'integer');
				}else{
					$query[] = "tax_chouhi_c=0";
				}

				// 設備フラグ --------------------------------------------------------------------------------------------------------------------------------
				$flgs = '';
				$data = $line[40];
				for ($i=0; $i<count($CONF['flg']); $i++) {
					if (!empty($data) && in_array($CONF['flg'][$i],$data)) {
						$flgs .= '1';
					} else {
						$flgs .= '0';
					}
				}
				$query[] = 'flg_c=' . $mdb2->quote($flgs, 'text');

				// 設備備考 --------------------------------------------------------------------------------------------------------------------------------
				if(!empty($line[41])){
					$data = $line[41];
					$query[] = "other_c=".$mdb2->quote($data, 'text');
				}

				$query[] = 'auto_private=0';
				$query[] = 'reg_date_c=now()';

				$sql = "INSERT INTO houses_t SET ";
				$sql .= implode(", ",$query);

				$result = $mdb2->exec($sql);
				if ( PEAR::isError($result) ) {
					$logger->err($query);
					die($result->getMessage());
				}

				// 雑費
				$hid = $mdb2->lastInsertID();
				for($i=21;$i<37;$i=$i+4){
					$query = array();
					// 必須
					$data = $line[$i];

					$zappi_type_c = ($i<29)?0:1;
					switch ($i) {
						case 21:
						case 29:
							$zappi_num_c = 1;
							break;
						case 25:
						case 33:
							$zappi_num_c = 2;
							break;
						default:
							$zappi_num_c = 1;
							break;
					}
					if(!empty($line[$i+1])){
						$zappi_name_c = $mdb2->quote($line[$i+1], 'text');
					}else{
						$zappi_name_c = $mdb2->quote("", 'text');
					}
					$zappi_amount_c = ( empty($line[$i+2]) ) ? "NULL" : $mdb2->quote($line[$i+2], 'decimal');
					$zappi_amount_taxin_c = ( empty($line[$i+3]) ) ? "NULL" : $mdb2->quote(array_search($line[$i+3],$tax_list), 'decimal');
					$zappi_required_c = ( empty($line[$i]) ) ? 0 : 1;
					$sql = "INSERT INTO house_zappi_t (house_id_c, type_c, num_c, name_c, amount_c, amount_taxin_c, required_c)
						VALUES (".intval($hid).", {$zappi_type_c}, {$zappi_num_c}, {$zappi_name_c}, {$zappi_amount_c}, {$zappi_amount_taxin_c}, {$zappi_required_c})
						ON DUPLICATE KEY UPDATE name_c = {$zappi_name_c}, amount_c = {$zappi_amount_c}, amount_taxin_c = {$zappi_amount_taxin_c}, required_c = {$zappi_required_c};";
					$result = $mdb2->exec($sql);
					if( PEAR::isError($result) ){
						$logger->err($query);
						die($result->getDebugInfo());
					}
				}

				Bukken::updateBuilding($bid);


				$count++;
			}
			if(!empty($aryRoom)){
				$resultMsgRoom = "部屋情報を取り込みました！";
			}
		}
	}

}