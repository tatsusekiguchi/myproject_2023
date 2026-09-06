<?php
	/* パラメータから物件の抽出及びページ管理 */

	if( !defined('NUM_IN_A_PAGE') ){ define('NUM_IN_A_PAGE', 16);}// 1ページ当りの物件数
	if( !defined('PAGINATION_RANGE') ){ define('PAGINATION_RANGE', 7);}// ページネーションの範囲

	$page = 1;// 現在のページ
	$bukken = array();// 物件配列
	$cnt_bukken = 0; // 総件数
	$params = array();
	$params["active_stations"] = array();
	$url_param = "";// リンクに付加するgetパラメータ
	$p = array();// ページネーションなど
	$where = array();
	$sql_where_p = '';
	$sql_order = '';
	$sql_limit = '';

	$result_text = array();

	$page = 1;// 現在のページ
	if( !empty($_GET["page"]) && is_numeric($_GET["page"]) ){
		$garbage = intval($_GET["page"]);
		if( $garbage > 1 ){ $page = $garbage;}
	}

	/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 抽出条件 %%%% */
	// 沿線
	if( !empty($_REQUEST["li"]) && is_numeric($_REQUEST["li"]) ){ $_REQUEST["li"] = array($_REQUEST["li"]);}
	if( !empty($_REQUEST["li"]) && is_array($_REQUEST["li"]) ){
		$params['line'] = $_REQUEST["li"];
		foreach($params['line'] as $l){
			if( (!is_string($l) && !is_numeric($l)) || $l == "" ){ continue;}
			$url_param .= "&li[]=".$l;
			$result_text[] = $CONF['transport'][$l];
			foreach ($CONF["transport_station"][$l] as $s) {
				if(!in_array($s,$params["active_stations"])){
					$params["active_stations"][] = $s;
				}
			}
		}
		foreach ($params["active_stations"] as $s) {
			if(!in_array($CONF['station'][$s],$result_text)){
				$result_text[] = $CONF['station'][$s];
			}
		}
	}

	// 駅
	if( !empty($_REQUEST["s"]) && is_numeric($_REQUEST["s"]) ){ $_REQUEST["s"] = array($_REQUEST["s"]);}
	if( !empty($_REQUEST["s"]) && is_array($_REQUEST["s"]) ){
		$params['station'] = $_REQUEST["s"];
		foreach($params['station'] as $s){
			if( (!is_string($s) && !is_numeric($s)) || $s == "" ){ continue;}
			$url_param .= "&s[]=".$s;
			if(!in_array($CONF['station'][$s],$result_text)){
				$result_text[] = $CONF['station'][$s];
			}
		}
	}

	// 沿線と駅に関するwhere句の組み立て
	if( !empty($params['line']) ){
		if( !empty($params['station']) ){// 沿線と駅
			$garbage_where = array();
			foreach($params['line'] as $l) {
				foreach ($params['station'] as $s) {
					$garbage_where[] = "( transport1_c = ".$mdb2->quote($l, 'text')." AND station1_c = ".$mdb2->quote($s, 'text')." )";
					$garbage_where[] = "( transport2_c = ".$mdb2->quote($l, 'text')." AND station2_c = ".$mdb2->quote($s, 'text')." )";
				}
			}
			$where[] = "(".implode(' OR ', $garbage_where).")";
		} else {// 沿線のみ
			$garbage_where = array();
			foreach($params['line'] as $l) {
				$garbage_where[] = "transport1_c = ".$mdb2->quote($l, 'text');
				$garbage_where[] = "transport2_c = ".$mdb2->quote($l, 'text');
			}
			$where[] = "(".implode(' OR ', $garbage_where).")";
		}
	}else if( !empty($params['station']) ){// 駅のみ
		$garbage_where = array();
		foreach($params['station'] as $s) {
			$garbage_where[] = "station1_c = ".$mdb2->quote($s, 'text');
			$garbage_where[] = "station2_c = ".$mdb2->quote($s, 'text');
		}
		$where[] = "(".implode(' OR ', $garbage_where).")";
	}

	// エリア
	if( !empty($_REQUEST["a"]) && is_numeric($_REQUEST["a"]) ){ $_REQUEST["a"] = array($_REQUEST["a"]);}
	if( !empty($_REQUEST["a"]) && is_array($_REQUEST["a"]) ){
		$params['area'] = $_REQUEST["a"];
		$garbage_where = array();
		foreach($params['area'] as $a){
			if( (!is_string($a) && !is_numeric($a)) || $a == "" ){ continue;}
			$url_param .= "&a[]=".$a;
			$garbage_where[] = "area_c LIKE ".$mdb2->quote("%".addcslashes($a, '\_%')."%", 'text');
			$result_text[] = $CONF['area'][$a]['name'];
		}
		$where[] = "(".implode(' OR ', $garbage_where).")";

	}

	// 特集フラグ
	if( (!empty($_REQUEST["f"]) || $_REQUEST["f"] == 0) && is_numeric($_REQUEST["f"]) ){
		$params['feature'] = $_REQUEST["f"];
		$url_param .= "&f=".$params["feature"];
		$where[] = "feature_c LIKE ".$mdb2->quote("%".addcslashes($params['feature'], '\_%')."%", 'text');
		$result_text[] = $CONF['feature'][$params['feature']];

	}

	// 家賃
	if( !empty($_REQUEST["rent"]) && is_string($_REQUEST["rent"]) ){
		$garbage = $CONF['rent'][$_REQUEST["rent"]];
		if( !empty($garbage) && is_array($garbage) && count($garbage) >= 2 ){
			$_REQUEST["min"] = $garbage[0];
			$_REQUEST["max"] = $garbage[1];
		}
	}
	// 賃料下限
	if( isset($_REQUEST["min"]) && is_numeric($_REQUEST["min"]) ){
		$garbage = intval($_REQUEST["min"]);
		if( $garbage > 0 ){
			$params['min'] = $garbage;
			$where[] = "price_min_c >= ".$mdb2->quote($params['min'], 'integer');
			$url_param .= "&min=".$params['min'];
		}
	}
	// 賃料上限
	if( isset($_REQUEST["max"]) && is_numeric($_REQUEST["max"]) ){
		$garbage = intval($_REQUEST["max"]);
		if( $garbage > 0 ){
			$params['max'] = $garbage;
			$where[] = "price_max_c <= ".$mdb2->quote($params['max'], 'integer');
			$url_param .= "&max=".$params['max'];
		}
	}
	if( intval($_REQUEST["min"]) > 0 ){
		$g = number_format($_REQUEST["min"])."円〜";
		if( intval($_REQUEST["max"]) > 0 ){
			$g .= number_format($_REQUEST["max"])."円";
		}
		$result_text[] = $g;
	}else if( intval($_REQUEST["max"]) > 0 ){
		$g = "〜".number_format($_REQUEST["max"])."円";
		$result_text[] = $g;
	}

	// 間取り
	if( !empty($_REQUEST["l"]) && is_numeric($_REQUEST["l"]) ){ $_REQUEST["l"] = array($_REQUEST["l"]);}
	if( !empty($_REQUEST["l"]) && is_array($_REQUEST["l"]) ){
		$params['layout'] = $_REQUEST["l"];
		$garbage_where = array();
		foreach($params['layout'] as $l){
			if( (!is_string($l) && !is_numeric($l)) || $l == "" ){ continue;}
			foreach($CONF["layout_search"][$l] as $v){
				$garbage_where[] = "layout_type_c LIKE ".$mdb2->quote("%".addcslashes($v, '\_%')."%", 'text');
			}
			$url_param .= "&l[]=".$l;
			$result_text[] = $CONF['layout'][$l];
		}
		$where[] = "(".implode(' OR ', $garbage_where).")";
	}

	/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 表示順序 %%%% */
	if( !empty($_REQUEST["order"]) && is_numeric($_REQUEST["order"]) ){
		$o = intval($_REQUEST["order"]);
		switch($o){
			case 1:
				$params['order'] = $o;
				$sql_order = " ORDER BY reg_date_c DESC, ";
				break;
		}
	}

	if( empty($sql_order) ){
		$sql_order = " ORDER BY ";
		if(basename($_SERVER['PHP_SELF']) == "line.php"){
			// 沿線の場合
			$sql_order .= 'sort_ensen_c IS NULL , sort_ensen_c ASC, ';
		}
		if(basename($_SERVER['PHP_SELF']) == "area.php"){
			// マップから探すの場合
			$sql_order .= 'sort_area_c IS NULL , sort_area_c ASC, ';
		}
	}
	$sql_order .= "order_c IS NULL, order_c DESC,";

	if( !empty($_GET['new']) && $_GET['new'] ){
		// トップページの新着と合わせる
		$sql_order = " ORDER BY sort_sincyaku_c IS NULL, sort_sincyaku_c ASC, reg_date_c DESC";
	}else{
		$sql_order .= "reg_date_c DESC";
	}

	/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 総件数と物件情報の取得 %%%% */

	// 総件数
	$sql_where_p = implode(' AND ', $where);
	if( !empty($sql_where_p) ){ $sql_where_p = " AND ".$sql_where_p;}
	$sql = "SELECT COUNT(buildings_t.building_id_c) AS count FROM buildings_t ".$sql_join." WHERE status_c = 1 AND house_count_c > 0 ".$sql_where_p;
	$result = $mdb2->query($sql);
	if( PEAR::isError($result) ){ echo $result->getDebugInfo(); die($result->getMessage());}
	$row = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
	$cnt_bukken = intval($row["count"]);

	// $pageの値を総件数を比較して取り得るものに限る
	if( $page < 1 || $page > ceil($cnt_bukken/NUM_IN_A_PAGE) ){ $page = 1;}

	if( $cnt_bukken > 0 ){
		$sql_where_p = implode(' AND ', $where);
		if( !empty($sql_where_p) ){ $sql_where_p = " AND ".$sql_where_p;}
		$sql_limit = " LIMIT ".(($page-1)*NUM_IN_A_PAGE).", ".NUM_IN_A_PAGE;
		$sql = "SELECT * FROM buildings_t ".$sql_join." WHERE status_c = 1 AND house_count_c > 0 ".$sql_where_p.$sql_order.$sql_limit;
		$result = $mdb2->query($sql);
		if( PEAR::isError($result) ){ die($result->getMessage());}
		// 配列に物件情報を格納
		while($row = $result->fetchRow(MDB2_FETCHMODE_ASSOC)){
			//if( substr($row['flg_c'], 3, 1) == "1" ){ $row['shinchiku'] = 10; }
			$row["building_name_c"] = mb_strimwidth($row["building_name_c"], 0, 30, "...","UTF-8");
			$bukken[] = $row;
		}

		foreach($bukken as $k => $v){
			$sql = "SELECT layout_c, min(rental_price_c) AS rental_price_c
				FROM houses_t
				WHERE status_c = 1 AND building_id_c = {$mdb2->quote($v["building_id_c"], 'integer')}
				GROUP BY layout_c";
			$result = $mdb2->query($sql);
			if( PEAR::isError($result) ) { die($result->getDebugInfo());}//getMessage()

			$br = 0;
			while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){
				//if( $br > 3 ){ break;} $br++;
				$bukken[$k]["houses"][] = $row;
			}

			// 間取一覧表示用
			$bukken[$k]["layout_disp"] = array();
			$layout_type = explode(',', $bukken[$k]["layout_type_c"]);
			if(count($layout_type) > 1){
				$bukken[$k]["layout_disp"] = $CONF["layout_regist"][min($layout_type)]."&nbsp;〜&nbsp;".$CONF["layout_regist"][max($layout_type)];
			}else if(count($layout_type) != 0){
				$bukken[$k]["layout_disp"] = $CONF["layout_regist"][min($layout_type)];
			}

			// ペットかどうか判定するため
			$petFlg = false;
			for($i=0; $i<10; $i++){
				if( isset($bukken[$k]["flg_c"]) && $bukken[$k]["flg_c"][$i] == 1 ){
					/*if( $i == 1 || $i == 2 ){
						if( !$petFlg ){
							$bukken[$k]["flgdisp"][] = "ペット";
							$petFlg = true;
						}
					} else {*/
						$bukken[$k]["flgdisp"][] = $CONF["flg"][$i];
					//}
				}
			}
		}
	}

	// ページ設定
	$p['cnt_start'] = ($page - 1) * NUM_IN_A_PAGE + 1;
	$p['cnt_end'] = $page * NUM_IN_A_PAGE;
	$p['pagination'] = array();

	$gs = $page - floor(PAGINATION_RANGE/2);
	if( $gs < 1 ){ $gs = 1;}

	$ge = $gs + PAGINATION_RANGE;
	$gmx = ceil($cnt_bukken/NUM_IN_A_PAGE);
	if( $ge > $gmx ){ $ge = $gmx+1;}

	for($i=$gs; $i<$ge; $i++){
		$p['pagination'][] = $i;
	}
