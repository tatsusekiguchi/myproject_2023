<?php

	$srch_params_label_millor = array(
		'dispFlg' => 'disp',
		'BUKKENMEI' => 'n',
		'searchEnsen' => 'li',
		'searchStation' => 'st',
		'searchDistance' => 'd',
		'searchFlg' => 'f',
		'flg_c' => 'flg',
		'searchLayout' => 'l',
		'searchEquipment' => 'e',
		'searchPriceMin' => 'mn',
		'searchPriceMax' => 'mx',
		'searchFeature' => 'ft',
		'searchBuilding' => 'b',
		'searchHaveHouse' => 'hh'
	);

	function get_url_params($p = array()){
		global $srch_params_label_millor;
		$result = '';
		if( !empty($p) && is_array($p) ){
			foreach($srch_params_label_millor as $k => $v){
				if( !empty($p[$k]) && is_array($p[$k]) ){
					foreach($p[$k] as $a){
						$result .= "&{$v}[]={$a}";
					}
				}else if( isset($p[$k]) ){
					$result .= "&{$v}={$p[$k]}";
				}
			}
		}
		$result = '&get=true'.$result;
		return $result;
	}

	function get_srch_params_from_get($g = array()){
		global $srch_params_label_millor;
		$result = array();
		if( !empty($g) && is_array($g) ){
			foreach($srch_params_label_millor as $k => $v){
				if( isset($g[$v]) ){ $result[$k] = $g[$v];}
			}
		}
		return $result;
	}

	function set_srch_session($name = '', $data = array()){
		$result = false;
		if( !session_id() ){ session_start();}
		if( !empty($name) && is_string($name) && !empty($data) && is_array($data) ){
			$_SESSION[$name] = $data;
			$result = true;
		}
		return $result;
	}

	function get_srch_session($name = ''){
		$result = array();
		if( !session_id() ){ session_start();}
		if( !empty($name) && is_string($name) && !empty($_SESSION[$name]) && is_array($_SESSION[$name]) ){
			$result = $_SESSION[$name];
		}
		return $result;
	}

	function clean_srch_session($name = ''){
		$result = false;
		if( !session_id() ){ session_start();}
		if( !empty($name) && is_string($name) ){
			unset($_SESSION[$name]);
			$result = true;
		}
		return $result;
	}

	function get_param_text_sort_link($col, $urlps){
		if( empty($col) || !is_string($col) ){ return '?null=null';}
		$result = '?sort='.$col;
		if( !empty($urlps['sort']) && mb_strpos($urlps['sort'], 'sort='.$col) !== false ){
			if( mb_strpos($urlps['sort'], 'order=ASC') === false ){ $result .= '&order=ASC';
			} else { $result .= '&order=DESC';}
		} else { $result .= '&order=ASC';}
		return $result;
	}

	// 物件・部屋編集において入力値を半角に変換する
	function m_filter_2_hankaku($t){
		return mb_convert_kana($t, 'a');
	}

	// 物件・部屋編集において入力値を全角に変換する
	function m_filter_2_zenkaku($t){
		return mb_convert_kana($t, 'AK');
	}

	/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 結果セット %%%% */

	function get_result_set($clean = true){
		$result = array();
		if( !empty($_SESSION['result_87349212']) && is_array($_SESSION['result_87349212']) ){
			$result = $_SESSION['result_87349212'];
			if( $clean ){ unset($_SESSION['result_87349212']);}
		}
		return $result;
	}

	function set_result_set($success = true, $message = ''){
		$_SESSION['result_87349212'] = array(
			'res' => $success,
			'mes' => $message
		);
	}

	/* %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 特集 %%%% */

	// 全ての特集を取得
	function get_features($id = ''){
		global $mdb2;
		if( !empty($id) && (!is_string($id) || !preg_match('/^[a-z0-9A-Z_\-]+$/', $id) || mb_strlen($id) > 20) ){ return false;}

		$sql = "SELECT * FROM feature_t ";
		if( !empty($id) ){ $sql .= "WHERE feature_id_c = ".$mdb2->quote($id, 'text');}
		$result = $mdb2->query($sql);
		if( PEAR::isError($result) ){ echo $result->getDebugInfo(); exit;}

		$features = array();
		while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){ $features[] = $row;}
		if( !empty($id) ){ $features = $features[0];}
		return $features;
	}

	// 特集を新規追加または更新
	function update_feature($id, $name, $sort = 0){
		global $mdb2;
		if( empty($id) || !is_string($id) || !preg_match('/^[a-z0-9A-Z_\-]+$/', $id) || mb_strlen($id) > 20 ){ return false;}
		if( empty($name) || !is_string($name) || mb_strlen($name) > 20 ){ return false;}
		$sort = intval($sort);

		$sql = "
			UPDATE feature_t
			SET `feature_name_c` = ".$mdb2->quote($name, 'text').", `feature_sort_c` = ".$mdb2->quote($sort, 'integer')."
			WHERE feature_id_c = ".$mdb2->quote($id, 'text');

		// 存在しなければsqlをinsertとする
		$f_new = true;
		$fs = get_features();
		foreach($fs as $f){ if( $f['feature_id_c'] == $id ){ $f_new = false;}}
		if( $f_new ){
			$sql = "
				INSERT INTO feature_t
				(`feature_id_c`, `feature_name_c`, `feature_sort_c`, `feature_comment`)
				VALUES
				(".$mdb2->quote($id, 'text').", ".$mdb2->quote($name, 'text').", ".$mdb2->quote($sort, 'integer').", NULL)";
		}

		$result = $mdb2->query($sql);
		if( PEAR::isError($result) ){ echo $result->getDebugInfo(); exit;}

		return true;
	}

	// 特集を削除
	function delete_feature($id){
		global $mdb2;
		if( empty($id) || !is_string($id) || !preg_match('/^[a-z0-9A-Z_\-]+$/', $id) || mb_strlen($id) > 20 ){ return false;}

		$is_feature = false;
		$fs = get_features();
		foreach($fs as $f){ if( $f['feature_id_c'] == $id ){ $is_feature = true;}}
		if( $is_feature ){
			$sql = "DELETE FROM feature_t WHERE feature_id_c = ".$mdb2->quote($id, 'text');
			$result = $mdb2->query($sql);
			if( PEAR::isError($result) ){ echo $result->getDebugInfo(); exit;}

			$sql = "DELETE FROM feature_details_t WHERE feature_id_c = ".$mdb2->quote($id, 'text');
			$result = $mdb2->query($sql);
			if( PEAR::isError($result) ){ echo $result->getDebugInfo(); exit;}

			return true;
		}
		return false;
	}
