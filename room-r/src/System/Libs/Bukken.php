<?php

/**
 * @author ido
 *
 */
class Bukken
{
	private $_count;
	private $_boundLatLng;
	private $_layout;

	public function __construct()
	{

	}

	/**
	 * 部屋毎一覧情報を検索取得する
	 *
	 * @param $search
	 * @param array(sort key, sort) $sort
	 * @return array
	 */
	public function getHouseList($search = array(), $sort = null, $offset = 0, $limit = null)
	{
		global $CONF, $mdb2, $logger;

		$arrBWhere = array();
		if(!isset($search["searchBuilding"])){
			if(isset($search["dispFlg"])){
				if($search["dispFlg"] == "all"){
					// 何もしないのよ～
					$arrBWhere[] = 'h.status_c != -1';
					//$arrBWhere[] = 'b.status_c != 1';
				}else if($search["dispFlg"] == "hide"){
					// 公開非公開表示
					$arrBWhere[] = 'h.status_c != 0';
				}else if($search["dispFlg"] == "default"){
					// 公開のみ表示
					$arrBWhere[] = 'h.status_c = 1';
				}else if($search["dispFlg"] == "hideonly"){
					// 非公開のみ
					$arrBWhere[] = 'h.status_c = 2';
				}

			}else{
				// なければ公開のみ！
				$arrBWhere[] = 'h.status_c = 1';
			}
		}

		if( !empty($search["srchBuildingId"]) && is_numeric($search["srchBuildingId"]) ){
			$garbage = intval($search["srchBuildingId"]);
			$arrBWhere[] = "b.building_id_c = ".$garbage;
		}

		// ビル検索から始めるよ‐
		// 物件名検索
		if(isset($search["BUKKENMEI"]) && $search["BUKKENMEI"] != ""){
			$searchsql = '%' . $search["BUKKENMEI"] . '%';
			$arrBWhere[] = "(b.building_name_c LIKE " . $mdb2->quote($searchsql, 'text') . " OR b.building_furigana_c LIKE " . $mdb2->quote($searchsql, 'text') . ")";
		}

		// 沿線
		if(isset($search["searchEnsen"])){
			$workWhere2 = array();
			foreach($search["searchEnsen"] as $key=>$val){
				if($search["searchEnsen"][$key] != "" && $search["searchEnsen"][$key] != "0"){
					$workWhere = "";
					$workWhere .= "(transport1_c = " . $mdb2->quote($val, 'text');
					if($search["searchStation"][$key] != "" && $search["searchStation"][$key] != "0"){
						$workWhere .= " AND station1_c = " . $mdb2->quote($search["searchStation"][$key], 'text');
					}
					$workWhere .= ") OR ";
					$workWhere .= "(transport2_c = " . $mdb2->quote($val, 'text');
					if($search["searchStation"][$key] != "" && $search["searchStation"][$key] != "0"){
						$workWhere .= " AND station2_c = " . $mdb2->quote($search["searchStation"][$key], 'text');
					}
					$workWhere .= ")";
					$workWhere2[] = $workWhere;
				}
			}
			if(isset($workWhere2[0])){
				$arrBWhere[] = "(".implode(' OR ', $workWhere2).")";
			}
		}

		// 駅からの距離
		if(isset($search["searchDistance"]) && $search["searchDistance"] != ""){
			$arrBWhere[] = "( b.distance1_c <= " . $mdb2->quote($search["searchDistance"], 'integer') . " OR (b.distance2_c <= " . $mdb2->quote($search["searchDistance"], 'integer') . " AND b.distance2_c != '')  )";
		}

		// フラグ
		if (isset($search['searchFlg'])) {
			if (is_array($search['searchFlg'])) {
				$arrFlg = array();
				foreach ($search['searchFlg'] as $key=>$val){
					$strFlg = "";
					for($i = 0; $i < count($CONF["flg"]); $i++){
						if($key == $i){
							$strFlg .= "1";
						}else{
							$strFlg .= "_";
						}
					}
					$arrFlg[] = 'b.flg_c LIKE ' . $mdb2->quote($strFlg, 'text');
				}
				if (count($arrFlg) > 0) {
					$arrBWhere[] = '( ' . implode(' OR ', $arrFlg) . ' )';
				}
			} else {
				$arrBWhere[] = 'b.flg_c LIKE ' . $mdb2->quote($search['flg_c'], 'text');
			}
		}

		// 間取り
		if(isset($search['searchLayout'])){
			$arrLayoutWhere = array();
			foreach ($search['searchLayout'] as $key => $value) {
				$arrLayoutWhere[] = "h.layout_c = " . $mdb2->quote($key, 'integer');
			}
			if(isset($arrLayoutWhere[0])){
				$arrBWhere[] = "(".implode(' OR ', $arrLayoutWhere).")";
			}
		}

		// 設備
		if(isset($search['searchEquipment'])){
			$arrEquipmentWhere = array();
			foreach ($search['searchEquipment'] as $key => $value) {
				$arrEquipmentWhere[] = "h.equipment_c LIKE '%" . $mdb2->quote($key, 'integer') . "%'";
			}
			if(isset($arrEquipmentWhere[0])){
				$arrBWhere[] = "(".implode(' OR ', $arrEquipmentWhere).")";
			}
		}

		// 賃料
		if(isset($search['searchPriceMin']) && $search['searchPriceMin'] != ""){
			$arrBWhere[] = "h.rental_price_c >= " . $mdb2->quote($search['searchPriceMin'], 'integer');
		}
		if(isset($search['searchPriceMax']) && $search['searchPriceMax'] != ""){
			$arrBWhere[] = "h.rental_price_c <= " . $mdb2->quote($search['searchPriceMax'], 'integer');
		}


		$query = 'SELECT *,b.status_c AS bstatus FROM buildings_t AS b ';

		if(isset($search['searchFeature']) && $search["searchFeature"] != ""){
			// 特集あり
			$query .= 'LEFT OUTER JOIN houses_t AS h ON h.building_id_c = b.building_id_c ';
			$query .= 'LEFT OUTER JOIN feature_details_t AS f ON f.building_id_c = b.building_id_c WHERE ';
			$arrBWhere[] = "f.feature_id_c = " . $mdb2->quote($search['searchFeature'], 'integer');
		}else{
			// 特集なし
			$query .= 'LEFT OUTER JOIN houses_t AS h ON h.building_id_c = b.building_id_c WHERE ';
		}

		// WHERE句整形
		$where = implode(' AND ', $arrBWhere);
		$query .= $where;

		// 部屋検索か物件検索か
		if(isset($search["searchBuilding"])){
			$query .= ' GROUP BY b.building_id_c ';
		}else{
			$query .= ' GROUP BY h.house_id_c ';
		}

		if( !empty($sort) && is_array($sort) ){
			$g = array();
			foreach($sort as $k => $v) {
				$g[] = $k.' '.$v;
			}
			$query .= ' ORDER BY '.implode(' , ', $g);
		} else {
			$query .= " ORDER BY b.building_name_c";
		}

		if( !empty($limit) && is_numeric($limit) ){
			$query .= ' LIMIT '.$limit;
		}

		if( !empty($offset) && is_numeric($offset) ){
			$query .= ' OFFSET '.$offset;
		}

		$result = $mdb2->query($query);
		if ( PEAR::isError($result) ) {
			die($result->getMessage());
		}

		$line = array();
		while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {

			$line[] = $res;
		}

		return $line;
	}

	/**
	 * 物件一覧情報を検索取得する
	 *
	 * @param $search
	 * @param array(sort key, sort) $sort
	 * @return array
	 */
	public function getBuildingsList($search = array(),$sort = null, $offset = 0, $limit = null)
	{
		global $CONF, $mdb2, $logger;

		$arrBWhere = array();
		if(isset($search["dispFlg"])){
			if($search["dispFlg"] == "default"){
				// すべて表示
				$arrBWhere[] = 'b.status_c != 0';
			}else if($search["dispFlg"] == "empty"){
				// 空き有り
				$arrBWhere[] = 'h.status_c = 1';
			}else if($search["dispFlg"] == "full"){
				// 空きなし
				$arrBWhere[] = 'h.status_c = 2';
			}else if($search["dispFlg"] == "checking"){
				// 確認中
				$arrBWhere[] = 'h.status_c = 3';
			}
		}else{
			// なければ全て
			$arrBWhere[] = 'b.status_c != 0';
		}
		if (isset($search['searchHaveHouse'])) {
			$arrBWhere[] = "b.house_count_c > 0";
		}

		// ビル検索から始めるよ‐
		// 物件名検索
		if(isset($search["BUKKENMEI"]) && $search["BUKKENMEI"] != ""){
			$searchsql = '%' . $search["BUKKENMEI"] . '%';
			$arrBWhere[] = "(b.building_name_c LIKE " . $mdb2->quote($searchsql, 'text') . " OR b.building_furigana_c LIKE " . $mdb2->quote($searchsql, 'text') . ")";
		}
		if( isset($search["no_bukken"]) && $search["no_bukken"] != "" ){
			$arrBWhere[] = "b.building_no_c = ".$mdb2->quote($search["no_bukken"], 'integer');
		}

		// 所在地(区)
		if( isset($search["searchKuNagoya"]) && is_numeric($search["searchKuNagoya"]) ){
			$arrBWhere[] = "b.ku_c = ".intval($search["searchKuNagoya"]);
		}

		// 所在地(以降の住所)
		if( isset($search["searchAddress"]) && is_string($search["searchAddress"]) && $search["searchAddress"] !== "" ){
			$g = "%".str_replace(array("%", "_"), array('\%', '\_'), $search['searchAddress'])."%";
			$arrBWhere[] = "b.address_c LIKE {$mdb2->quote($g, 'text')}";
		}

		// 沿線
		if(isset($search["searchEnsen"])){
			$workWhere2 = array();
			foreach($search["searchEnsen"] as $key=>$val){
				if($search["searchEnsen"][$key] != "" && $search["searchEnsen"][$key] != "0"){
					$workWhere = "";
					$workWhere .= "(transport1_c = " . $mdb2->quote($val, 'text');
					if($search["searchStation"][$key] != "" && $search["searchStation"][$key] != "0"){
						$workWhere .= " AND station1_c = " . $mdb2->quote($search["searchStation"][$key], 'text');
					}
					$workWhere .= ") OR ";
					$workWhere .= "(transport2_c = " . $mdb2->quote($val, 'text');
					if($search["searchStation"][$key] != "" && $search["searchStation"][$key] != "0"){
						$workWhere .= " AND station2_c = " . $mdb2->quote($search["searchStation"][$key], 'text');
					}
					$workWhere .= ")";
					$workWhere2[] = $workWhere;
				}
			}
			if(isset($workWhere2[0])){
				$arrBWhere[] = "(".implode(' OR ', $workWhere2).")";
			}
		}

		// 駅からの距離
		if(isset($search["searchDistance"]) && $search["searchDistance"] != ""){
			$arrBWhere[] = "( b.distance1_c <= " . $mdb2->quote($search["searchDistance"], 'integer') . " OR (b.distance2_c <= " . $mdb2->quote($search["searchDistance"], 'integer') . " AND b.distance2_c != '') )";
		}

		// 築年月
		if( isset($search["searchCompletionYear"]) && is_numeric($search["searchCompletionYear"]) ){
			if( isset($search["searchCompletionMonth"]) && is_numeric($search["searchCompletionMonth"]) ){
				$arrBWhere[] = "(b.completion_year_c > ".intval($search["searchCompletionYear"])." OR (b.completion_year_c = ".intval($search["searchCompletionYear"])." AND b.completion_month_c >= ".intval($search["searchCompletionMonth"])."))";
			} else {
				$arrBWhere[] = "b.completion_year_c >= ".intval($search["searchCompletionYear"]);
			}
		}

		// フラグ
		if (isset($search['searchFlg'])) {
			if (is_array($search['searchFlg'])) {
				$arrFlg = array();
				foreach ($search['searchFlg'] as $key=>$val){
					$strFlg = "";
					for($i = 0; $i < count($CONF["flg"]); $i++){
						if($key == $i){
							$strFlg .= "1";
						}else{
							$strFlg .= "_";
						}
					}
					$arrFlg[] = 'h.flg_c LIKE ' . $mdb2->quote($strFlg, 'text');
				}
				if (count($arrFlg) > 0) {
					$arrBWhere[] = '( ' . implode(' OR ', $arrFlg) . ' )';
				}
			} else {
				$arrBWhere[] = 'h.flg_c LIKE ' . $mdb2->quote($search['flg_c'], 'text');
			}
		}

		// 特集フラグ
		if (isset($search['searchFeatureFlg']) && is_array($search['searchFeatureFlg'])) {
			$featureWhere = array();
			foreach ($search["searchFeatureFlg"] as $key => $value) {
				$featureWhere[] = "b.feature_c LIKE ".$mdb2->quote("%".addcslashes($value, '\_%')."%", 'text');
			}
			$arrBWhere[] = "(".implode(" OR ", $featureWhere).")";
		}


		$query = 'SELECT *,b.building_id_c,b.status_c FROM buildings_t AS b ';
		$query .= 'LEFT OUTER JOIN houses_t AS h ON h.building_id_c = b.building_id_c ';

		if(isset($search['searchFeature']) && $search["searchFeature"] != ""){
			// 特集あり
			$query .= 'LEFT OUTER JOIN feature_details_t AS f ON f.building_id_c = b.building_id_c WHERE ';
			$arrBWhere[] = "f.feature_id_c = ".$mdb2->quote($search['searchFeature'], 'text');
		}else{
			// 特集なし
			$query .= ' WHERE ';
		}

		// WHERE句整形
		$where = implode(' AND ', $arrBWhere);		$query .= $where;

		$query .= ' GROUP BY b.building_id_c';
		if(is_array($sort)){
			foreach ($sort as $key => $value) {
				$arrOrderby[] = $key . ' ' . $value;
			}
			$query .= ' ORDER BY ' . implode(' , ', $arrOrderby) . ' ';
		}else{
			$query .= ' ORDER BY b.building_name_c';
		}

		if( !empty($limit) && is_numeric($limit) ){
			$query .= ' LIMIT '.$limit;
		}

		if( !empty($offset) && is_numeric($offset) ){
			$query .= ' OFFSET '.$offset;
		}

		$result = $mdb2->query($query);
		if ( PEAR::isError($result) ) {
			die($result->getDebugInfo());
		}

		$line = array();
		while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$line[] = $res;
		}

		return $line;
	}
	/**
	 * 建物一覧情報を検索取得する
	 *
	 * @param $search
	 * @param array(sort key, sort) $sort
	 * @return array
	 */
	/*
	public function getBuildingList($search = array(), $sort = null, $offset = 0, $limit = NULL)
	{
		global $CONF, $mdb2, $logger;

		$arrWhere = array();
		$arrWhere[] = 'b.status_c = 1';
		if (is_array($search)) {
			// エリア検索
			if (isset($search['area_c']) && $search['area_c'] != '') {
				if(is_array($search['area_c'])){
					// 複数検索
					$workWhere = array();
					foreach($search['area_c'] as $key => $val){
						$workWhere[] = "b.area_c LIKE '%" . escapeWildCard($mdb2->escape($val)) . "%'";
					}
					$arrWhere[] = '( ' . implode(' OR ', $workWhere) . ' ) ';

				}else{
					$arrWhere[] = "b.area_c LIKE '%" . escapeWildCard($mdb2->escape($search['area_c'])) . "%'";
				}
			}
			// フラグ検索
			if (isset($search['flg_c'])) {
				if (is_array($search['flg_c'])) {
					$arrFlg = array();
					foreach ($search['flg_c'] as $key=>$val){
						$arrFlg[] = 'b.flg_c LIKE ' . $mdb2->quote($val, 'text');
					}
					if (count($arrFlg) > 0) {
						$arrWhere[] = '( ' . implode(' OR ', $arrFlg) . ' ) ';
					}
				} else {
					$arrWhere[] = 'b.flg_c LIKE ' . $mdb2->quote($search['flg_c'], 'text');
				}
			}
			// ピックアップ物件
			if (isset($search['pickup'])) {
				$arrWhere[] = 'b.building_id_c IN (SELECT building_id_c FROM pickup_t WHERE status_c = 1)';
			}

			// 特集
			if(isset($search['special'])){
				$arrWhere[] = 'b.building_id_c IN (SELECT d.building_id_c FROM feature_t AS f, feature_details_t AS d WHERE f.feature_id_c = d.feature_id_c AND d.feature_id_c = "'. escapeWildCard($mdb2->escape($search['special'])) .'")';

			}

			// 賃料
			if(isset($search['rental_min_c']) && isset($search['rental_max_c'])){
				$arrWhere[] = 'b.building_id_c IN (SELECT building_id_c FROM houses_t WHERE rental_min_c BETWEEN '. escapeWildCard($mdb2->escape($search['rental_min_c'])) .' AND '. escapeWildCard($mdb2->escape($search['rental_max_c'])) .')';
			}

			// タイプ
			if(isset($search['type'])){
				$typeWhere = array();
				foreach($search['type'] as $key=>$val){
					if(isset($val['over_all'])){
						$typeWhere[] = "(num_c >= ".$val['num_c']." AND layout_c >=  ".$val['layout_c'].")";
					}else{
						$typeWhere[] = "(num_c = ".$val['num_c']." AND layout_c = ".$val['layout_c'].")";
					}
				}
				$arrWhere[] = 'b.building_id_c IN ( SELECT building_id_c FROM houses_t WHERE ' . implode(' OR ', $typeWhere) . ' ) ';
			}

		}
		$where = ' WHERE ' . implode(' AND ', $arrWhere);

		$arrOrderby = array();
		$orderby = ' ';
		if (is_array($sort)) {
			foreach ($sort as $key => $value) {
				$arrOrderby[] = $key . ' ' . $value;
			}
			$orderby = ' ORDER BY ' . implode(' , ', $arrOrderby) . ' ';
		}
		$query  = 'SELECT SQL_CALC_FOUND_ROWS b.*,max(h.rental_max_c) AS rental_max_c,min(h.rental_min_c) AS rental_min_c FROM buildings_t AS b ';
		$query .= 'LEFT OUTER JOIN houses_t AS h ON h.building_id_c = b.building_id_c AND h.status_c = 1 ';
		$query .= $where;
		$query .= ' GROUP BY b.building_id_c ';
		$query .= $orderby;
		if (is_null($limit) == false) {
			$mdb2->setLimit($limit, $offset);
		}
		$result = $mdb2->query($query);
		if (PEAR::isError($result)) {
			$logger->err($query);
			$logger->err($result->getMessage());
			die($result->getMessage());
		}
		$line = array();
		$this->clearBound();
		while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			if ($res['latitude_c'] < $this->_boundLatLng['latitude_min']) {$this->_boundLatLng['latitude_min'] = $res['latitude_c'];}
			if ($res['latitude_c'] > $this->_boundLatLng['latitude_max']) {$this->_boundLatLng['latitude_max'] = $res['latitude_c'];}
			if ($res['longitude_c'] < $this->_boundLatLng['longitude_min']) {$this->_boundLatLng['longitude_min'] = $res['longitude_c'];}
			if ($res['longitude_c'] > $this->_boundLatLng['longitude_max']) {$this->_boundLatLng['longitude_max'] = $res['longitude_c'];}
			$flg = array();
			for ($i=0; $i<strlen($res['flg_c']); $i++) {
				if (substr($res['flg_c'], $i, 1) == '1') {
					$flg[] = 1;
				} else {
					$flg[] = 0;
				}
			}
			$res['flg'] = $flg;
			$line[] = $res;
		}
		$query = "SELECT FOUND_ROWS() AS resent_row";
		$result = $mdb2->query($query);
		if (PEAR::isError($result)) {
			$logger->err($query);
			$logger->err($result->getMessage());
			die($result->getMessage());
		}
		$res = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
		$this->_count = $res['resent_row'];
		return $line;
	}
	*/

	public function getBuildingRoomsList($building_id,$login=false)
	{
		global $CONF, $mdb2, $logger;
		if($login){
			$query  = 'SELECT SQL_CALC_FOUND_ROWS * FROM houses_t WHERE status_c!=0 AND building_id_c=' . $mdb2->quote($building_id, 'integer');
		}else{
			$query  = 'SELECT SQL_CALC_FOUND_ROWS * FROM houses_t WHERE status_c=1 AND building_id_c=' . $mdb2->quote($building_id, 'integer');
		}
		$query .= ' ORDER BY house_no_c COLLATE utf8_unicode_ci ASC';
		$result = $mdb2->query($query);
		if (PEAR::isError($result)) {
			$logger->err($query);
			$logger->err($result->getMessage());
			die($result->getMessage());
		}
		$line = array();
		while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$ev = explode(',', $res['equipment_c']);
			$i = 0;
			foreach ($ev as $val) {
				if (isset($CONF['equipment'][$val])) {
					$res['equip_value'][$val] = $val;
					$i++;
				}
			}
			$res['house_no_c'] = strtoupper(mb_convert_kana( $res['house_no_c'], "r" ));
			$res['equipment_row_max'] = floor($i / 2) + ($i % 2);
			$res['equipment_count'] = $i;
			$line[] = $res;
		}
		$query = "SELECT FOUND_ROWS() AS resent_row";
		$result = $mdb2->query($query);
		if (PEAR::isError($result)) {
			$logger->err($query);
			$logger->err($result->getMessage());
			die($result->getMessage());
		}
		$res = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
		$this->_count = $res['resent_row'];
		return $line;
	}

	/**
	 * 部屋IDから部屋情報を取得する
	 *
	 * @param integer $house_id
	 * @return mixed array
	 */
	public function getHouse($house_id,$login = false)
	{
		global $CONF, $mdb2, $logger;
		if($login){
			$query  = 'SELECT * FROM houses_t WHERE status_c!=0 AND house_id_c=' . $mdb2->quote($house_id, 'integer');
		}else{
			$query  = 'SELECT * FROM houses_t WHERE (status_c=1 OR status_c=3) AND house_id_c=' . $mdb2->quote($house_id, 'integer');
		}
		$result = $mdb2->query($query);
		if (PEAR::isError($result)) {
			$logger->err($query);
			$logger->err($result->getMessage());
			die($result->getMessage());
		}
		$line = array();
		while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$ev = explode(',', $res['equipment_c']);
			$i = 0;
			foreach ($ev as $val) {
				if (isset($CONF['equipment'][$val])) {
					$res['equip_value'][$val] = $val;
					$i++;
				}
			}
			$res['equipment_row_max'] = floor($i / 2) + ($i % 2);
			$res['equipment_count'] = $i;
			$line = $res;
		}
		$this->_count = count($line);
		return $line;
	}


	/**
	 * 建物情報を取得する
	 *
	 * @param integer $building_id
	 * @return array
	 */
	public function getBuilding($building_id = '',$statusFlg = true)
	{
		global $CONF, $mdb2, $logger;

		$arrWhere = array();
		if($statusFlg){
			$arrWhere[] = 'status_c = 1';
		}else{
			$arrWhere[] = 'status_c >= 1';
		}
		$arrWhere[] = 'building_id_c = ' . $mdb2->quote($building_id, 'integer');
		$query  = 'SELECT * FROM buildings_t ';
		$query .= 'WHERE ' . implode(' AND ', $arrWhere);
		$result = $mdb2->query($query);
		if ( PEAR::isError($result) ) {
			$logger->err($query);
			$logger->err($result->getMessage());
			die($result->getMessage());
		}
		$line = array();
		while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$flg = array();
			for ($i=0; $i<strlen($res['flg_c']); $i++) {
				if (substr($res['flg_c'], $i, 1) == '1') {
					$flg[] = 1;
				} else {
					$flg[] = 0;
				}
			}
			$res['flg'] = $flg;
			$res['deposit_c'] = (double)$res['deposit_c'];
			$res['keymoney_c'] = (double)$res['keymoney_c'];
			$res['repayment_c'] = (double)$res['repayment_c'];
			$line = $res;
		}
		return $line;
	}
	/**
	 * 建物情報を部屋情報をもとに更新する
	 * 部屋数,間取り,最大最小賃料を格納
	 * @param integer $building_id 建物ID
	 */
	public function updatePhotos()
	{
		global $CONF, $mdb2, $logger;
		$bre = "";
		$hre = "";
		$dbFile = array();
		$dirFile = array();
		$fileSql = array();
		$fileSql2 = array();
		// 物件情報更新かららら
		for($i=0;$i<=22;$i++){
			$fileSql[] = "b_photo".$i."_c";
		}
		$where = "SELECT ".implode(' , ', $fileSql)." FROM buildings_t";

		$result = $mdb2->query($where);
		if ( PEAR::isError($result) ) {
			die($result->getMessage());
		}

		$line = array();
		while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$bre[] = $res;
		}

		// 物件情報更新かららら
		for($i=0;$i<=40;$i++){
			$fileSql2[] = "r_photo".$i."_c";
		}
		$where = "SELECT ".implode(' , ', $fileSql2)." FROM houses_t";

		$result = $mdb2->query($where);
		if ( PEAR::isError($result) ) {
			die($result->getMessage());
		}

		$line = array();
		while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$hre[] = $res;
		}

		foreach($bre as $key=>$val){
			foreach($val as $key2 => $val2){
				if(!is_null($val2)){
					$dbFile[] = $val2;
				}
			}
		}
		foreach($hre as $key=>$val){
			foreach($val as $key2 => $val2){
				if(!is_null($val2)){
					$dbFile[] = $val2;
				}
			}
		}


		$dbFile = array_unique($dbFile);
		//ディレクトリ・ハンドルをオープン
		$res_dir = opendir( '../uploads/' );
		//ディレクトリ内のファイル名を１つずつを取得
		$count = 0;
		while(false !== ($file_name = readdir($res_dir))){
			if ($file_name != "." && $file_name != "..") {
				$dirFile[] = $file_name;
			}
		}


		//ディレクトリ・ハンドルをクローズ
		closedir( $res_dir );
		$diff = array_diff($dirFile, $dbFile);
		foreach($dbFile as $key=>$val){
			if (!file_exists('../uploads/'.$val)){
				echo("../uploads/".$val."\n");
			}
		}
		//var_dump(count($diff));
		//var_dump(count($dirFile));
		//var_dump(count($dbFile));
		foreach ($diff as $key => $value) {
			//unlink('../uploads/'.$value);
		}
		//echo("//");
		//var_dump(count($diff));
		//var_dump(count($dirFile));
		//var_dump(count($dbFile));
	}

	/**
	 * 建物情報を部屋情報をもとに更新する
	 * 部屋数,間取り,最大最小賃料を格納
	 * @param integer $building_id 建物ID
	 */
	public function updateBuilding($building_id)
	{
		global $CONF, $mdb2, $logger;

		$houseCount = 0;
		$minPrice = 0;
		$maxPrice = 0;
		$aryLayout = array();
		$strLayout = '';

		$query = 'SELECT COUNT(*) AS count_c FROM houses_t WHERE (status_c = 1 OR status_c = 3) AND building_id_c=' . $mdb2->quote($building_id, 'integer');

		$result = $mdb2->query($query);
		if ( PEAR::isError($result) ) {
			$logger->err($query);
			$logger->err($result->getMessage());
			die($result->getMessage());
		}
		$res = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
		if (is_array($res) && isset($res['count_c'])) {
			$houseCount = $res['count_c'];
		}

		$query = 'SELECT MAX(rental_price_c) AS price_max_c, MIN(rental_price_c) AS price_min_c FROM houses_t WHERE (status_c = 1 OR status_c = 3) AND building_id_c=' . $mdb2->quote($building_id, 'integer');
		$result = $mdb2->query($query);
		if ( PEAR::isError($result) ) {
			$logger->err($query);
			$logger->err($result->getMessage());
			die($result->getDebugInfo());
		}
		$res = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
		if (is_array($res) && isset($res['price_max_c']) && isset($res['price_min_c'])) {
			$minPrice = $res['price_min_c'];
			$maxPrice = $res['price_max_c'];
		}

		$query = 'SELECT layout_c FROM houses_t WHERE (status_c = 1 OR status_c = 3) AND building_id_c=' . $mdb2->quote($building_id, 'integer').' GROUP BY layout_c';

		$result = $mdb2->query($query);
		if ( PEAR::isError($result) ) {
			$logger->err($query);
			die($result->getDebugInfo());
		}

		$aryLayout = array();

		while ($res = $result->fetchRow(MDB2_FETCHMODE_ASSOC)) {
			$aryLayout[] = $res["layout_c"];
		}


		// %%%%%%%%%%%%%%%% start %%%% 部屋の公開状況によって物件の公開状況を判定
		$query = "SELECT house_id_c FROM houses_t WHERE building_id_c = ".intval($building_id)." AND (status_c = 1 OR status_c = 3)";
		$result = $mdb2->query($query);
		$g = $result->fetchRow(MDB2_FETCHMODE_ASSOC);
		$building_status = ( $g ) ? 1 : 2;// 1:公開, 2:非公開
		// %%%%%%%%%%%%%%%% end %%%%

		$strLayout = implode(',', $aryLayout);
		$set = array(
			'house_count_c = '.$mdb2->quote($houseCount, 'integer'),
			'layout_type_c = '.$mdb2->quote($strLayout, 'text'),
			'price_min_c = '.$mdb2->quote($minPrice, 'integer'),
			'price_max_c = '.$mdb2->quote($maxPrice, 'integer'),
			/*'has_auto_private = '.$hap,*/
			'status_c = '.$building_status
		);

		$query = 'UPDATE buildings_t ';
		$query .= ' SET ' . implode(' , ', $set);
		$query .= ' WHERE building_id_c=' . $mdb2->quote($building_id, 'integer').' AND status_c > 0';

		$result = $mdb2->exec($query);
		if ( PEAR::isError($result) ) {
			$logger->err($query);
			$logger->err($result->getMessage());
			die($result->getDebugInfo());
		}
	}


	public function getCount()
	{
		return $this->_count;
	}

	public function getBound()
	{
		if (90 == $this->_boundLatLng['latitude_min']) {
			$this->resetBound();
		}
		return $this->_boundLatLng;
	}

	private function clearBound()
	{
		$this->_boundLatLng['latitude_min'] = 90;
		$this->_boundLatLng['latitude_max'] = -90;
		$this->_boundLatLng['longitude_min'] = 180;
		$this->_boundLatLng['longitude_max'] = -180;
	}

	private function resetBound()
	{
		$this->_boundLatLng['latitude_min'] = 35.156776;
		$this->_boundLatLng['latitude_max'] = 35.206170;
		$this->_boundLatLng['longitude_min'] = 136.880744;
		$this->_boundLatLng['longitude_max'] = 136.932242;
	}

	private function clearLayout()
	{
		$this->_layout['num_min'] = 99;
		$this->_layout['num_max'] = 0;
		$this->_layout['layout_min'] = 99;
		$this->_layout['layout_max'] = 0;
	}

}

?>
