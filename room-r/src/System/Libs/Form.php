<?php
/*
	Form.php v1.0

	Copyright (c) 2015 Hiroyuki Suzuki - http://a-hsm.com

	Released under the MIT license - http://opensource.org/licenses/MIT
*/
class Form{
	protected $sess = 'c22d0f68e6b6e182';
	protected $info = array();
	protected $values = array();
	protected $errors = array();
	protected $f = array();

	// フォーマット
	const FMT_NONE = 0;
	const FMT_INT = 1;
	const FMT_ALP = 2;
	const FMT_NUM = 3;
	const FMT_ALPNUM = 4;
	const FMT_HIRA = 5;
	const FMT_KATA = 6;
	const FMT_TEL = 7;
	const FMT_MAIL = 8;
	const FMT_URL = 9;

	// フィルター
	const FLT_TO_ZENKAKU_KANA = 1;
	const FLT_TO_HANKAKU_ALPNUM = 2;
	const FLT_TO_UPPER_CASE = 3;
	const FLT_TO_LOWER_CASE = 4;
	const FLT_EOL_TO_N = 5;
	const FLT_EOL_TO_SPACE = 6;
	const FLT_TRIM = 7;
	const FLT_RTRIM = 8;
	const FLT_LTRIM = 9;

	// エラー
	const E_NONE = "_0";
	const E_REQUIRED = "_1";
	const E_MINLEN = "_2";
	const E_MAXLEN = "_3";
	const E_PATTERN = "_4";
	const E_FMT_INT = "_5";
	const E_FMT_ALP = "_6";
	const E_FMT_NUM = "_7";
	const E_FMT_ALPNUM = "_8";
	const E_FMT_HIRA = "_9";
	const E_FMT_KATA = "_10";
	const E_FMT_TEL = "_11";
	const E_FMT_MAIL = "_12";
	const E_FMT_URL = "_13";

	function __construct($name_sess = '', $itemdata = array()){
		if( !session_id() ) trigger_error('セッションが開始されていません。', E_USER_NOTICE);
		if( is_string($name_sess) && $name_sess !== '' ) $this->sess = $name_sess;
		$this->init();
		$this->read_form_info();

		if( $this->info['page'] === 1 && !empty($_POST) ){
			while( list($k, $v) = each($itemdata) ){
				$this->register_item($k, $v);
			}
		}

		$this->import_postdata();
		if( $this->f['reset'] ){
			$this->end_clean();
			$this->init();
		}
	}

	// 初期設定
	protected function init(){
		$this->info['page'] = 1;
		$this->info['error_format'] = '<div style="color:#f00;">#THE_ERROR_MESSAGE#</div>';
		$this->info['array_glue'] = ', ';
		$this->info['name_for_enter'] = 'enter';
		$this->info['name_for_back'] = 'back';
		$this->info['name_for_reset'] = 'reset';
		$this->info['error_mes'] = array(
			self::E_REQUIRED => "必須項目です",
			self::E_MINLEN => "文字数が足りません",
			self::E_MAXLEN => "最大文字数を超えています",
			self::E_PATTERN => "書式が不正です",
			self::E_FMT_INT => "整数のみ使用できます",
			self::E_FMT_ALP => "アルファベットのみ使用できます",
			self::E_FMT_NUM => "数字のみ使用できます",
			self::E_FMT_ALPNUM => "アルファベットと数字のみ使用できます",
			self::E_FMT_HIRA => "ひらがなのみ使用できます",
			self::E_FMT_KATA => "カタカナのみ使用できます",
			self::E_FMT_TEL => "無効な電話番号です",
			self::E_FMT_MAIL => "無効なメールアドレスです",
			self::E_FMT_URL => "無効なURLです"
		);

		$this->f['enter'] = false;
		$this->f['back'] = false;
		$this->f['reset'] = false;
		$this->f['settled'] = false;
	}

	// フォームを終了
	public function end_clean(){
		$_SESSION[$this->sess] = array();
		$this->values = array();
		$this->errors = array();
	}

	// 項目を登録
	public function register_item($k, $options){
		$_SESSION[$this->sess]['repo'][$k]['page'] = ( isset($options['page']) ) ? intval($options['page']) : 1;
		$_SESSION[$this->sess]['repo'][$k]['label'] = ( isset($options['label']) ) ? $options['label'] : '';
		$_SESSION[$this->sess]['repo'][$k]['required'] = ( isset($options['required']) ) ? $options['required'] : false;
		$_SESSION[$this->sess]['repo'][$k]['rule'] = ( isset($options['rule']) ) ? $options['rule'] : array();
		$_SESSION[$this->sess]['repo'][$k]['add'] = ( isset($options['add']) ) ? $options['add'] : array();
		$_SESSION[$this->sess]['repo'][$k]['filter'] = ( isset($options['filter']) ) ? $options['filter'] : null;
	}

	// 項目を削除
	public function remove_item($k){
		if( array_key_exists($k, $this->values) ) unset($this->values[$k]);
		if( array_key_exists($k, $_SESSION[$this->sess]['repo']) ) unset($_SESSION[$this->sess]['repo'][$k]);
		if( array_key_exists($k, $this->errors) ) unset($this->errors[$k]);
	}

	// 全ての項目の値を削除
	public function clear_all_values(){
		if( empty($_SESSION[$this->sess]['repo']) || !is_array($_SESSION[$this->sess]['repo']) ) return false;
		foreach($_SESSION[$this->sess]['repo'] as $k => $v){
			if( array_key_exists($k, $this->values) ) unset($this->values[$k]);
			if( array_key_exists('value', $_SESSION[$this->sess]['repo'][$k]) ) unset($_SESSION[$this->sess]['repo'][$k]['value']);
		}
	}

	// 項目のグループを作成
	public function make_group($id, $label, $items, $separator = ' '){
		if( is_string($items) || is_int($items) ) $items = array($items);
		$_SESSION[$this->sess]['groups'][$id] = array(
			'label' => $label,
			'items' => $items,
			'sep' => $separator
		);
	}

	// 項目のグループを削除
	public function delete_group($id){
		if( array_key_exists($id, $_SESSION[$this->sess]['groups']) ) unset($_SESSION[$this->sess]['groups'][$id]);
	}

	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% フォーム情報の操作 %%%%

	// 現在のページを取得
	public function get_page(){
		return $this->info['page'];
	}

	// 現在のページを設定
	public function set_page($p){
		$p = intval($p);
		$this->info['page'] = ( $p > 0 ) ? $p : 1;
	}

	// エラー出力のフォーマットを設定
	public function set_error_format($format){
		$this->info['error_format'] = $format;
	}

	// 配列のつなぎ文字列を設定
	public function set_array_glue($glue){
		$this->info['array_glue'] = $glue;
	}

	// enter, back, resetの名前を取得
	public function get_name_for($type){
		if( !array_key_exists("name_for_{$type}", $this->info) ) return false;
		return $this->info['name_for_'.$type];
	}

	// enter, back, resetの名前を設定
	public function set_name_for($type, $name){
		if( !array_key_exists("name_for_{$type}", $this->info) ) return false;
		$this->info['name_for_'.$type] = $name;
	}

	// エラーメッセージを設定
	public function set_error_mes($mes){
		if( !is_array($mes) ) return false;
		$this->info['error_mes'] = array_merge($this->info['error_mes'], $mes);
	}

	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% コア %%%%

	// フォーム情報を読み込み
	protected function read_form_info(){
		if( isset($_SESSION[$this->sess]['info']) ) $this->info = $_SESSION[$this->sess]['info'];
	}

	// フォーム情報を書き込み
	protected function write_form_info(){
		$_SESSION[$this->sess]['info'] = $this->info;
	}

	// 項目の値を書き込み
	protected function commit(){
		if( !isset($_SESSION[$this->sess]['repo']) ) return false;
		foreach($_SESSION[$this->sess]['repo'] as $k => $v){
			if( $v['page'] !== $this->info['page'] ) continue;
			$_SESSION[$this->sess]['repo'][$k]['value'] = ( isset($this->values[$k]) ) ? $this->values[$k] : null;
		}
	}

	// ポストデータを取り込み
	protected function import_postdata(){
		if( empty($_POST) || empty($_SESSION[$this->sess]['repo']) ) return false;
		if( !empty($_POST[$this->info['name_for_enter']]) || !empty($_POST["{$this->info['name_for_enter']}_x"]) ) $this->f['enter'] = true;
		if( !empty($_POST[$this->info['name_for_back']]) || !empty($_POST["{$this->info['name_for_back']}_x"]) ) $this->f['back'] = true;
		if( !empty($_POST[$this->info['name_for_reset']]) || !empty($_POST["{$this->info['name_for_reset']}_x"]) ) $this->f['reset'] = true;

		foreach($_SESSION[$this->sess]['repo'] as $k => $v){
			if( $v['page'] !== $this->info['page'] || !isset($_POST[$k]) || (!is_string($_POST[$k]) && !is_array($_POST[$k])) ) continue;
			$val = $this->sanitize($_POST[$k]);
			if( isset($v['filter']) ) $val = $this->apply_filter($val, $v['filter']);
			$this->values[$k] = $val;
		}
	}

	// フォームの状態を確定
	public function settle(){
		if( $this->f['settled'] ) return $this->info['page'];
		$this->f['settled'] = true;

		if( $this->f['enter'] && $this->count_errors() === 0 ){
			$this->commit();
			$this->set_page($this->info['page'] + 1);

		}else if( $this->f['back'] ){
			$this->set_page($this->info['page'] - 1);
		}

		$this->write_form_info();
		return $this->info['page'];
	}

	// エラーの数をカウント
	protected function count_errors(){
		$result = 0;
		foreach($_SESSION[$this->sess]['repo'] as $k => $v){
			if( $v['page'] !== $this->info['page'] ) continue;
			if( ($e = $this->validate($k)) !== self::E_NONE ) $this->errors[$k] = $this->info['error_mes'][$e];
			if( isset($this->errors[$k]) ) $result++;
		}
		return $result;
	}

	// エラーをチェック
	public function validate($k){
		if( !isset($_SESSION[$this->sess]['repo'][$k]) ) return false;
		$i = $_SESSION[$this->sess]['repo'][$k];

		if( $i['page'] !== $this->info['page'] ) return self::E_NONE;

		if( !isset($this->values[$k]) || $this->values[$k] === '' || $this->values[$k] === array() ){
			if( $i['required'] ) return self::E_REQUIRED;
			return self::E_NONE;
		}

		if( is_array($this->values[$k]) ) return self::E_NONE;

		$v = strval($this->values[$k]);
		if( isset($i['rule']['minlen']) && mb_strlen($v) < $i['rule']['minlen'] ) return self::E_MINLEN;
		if( isset($i['rule']['maxlen']) && mb_strlen($v) > $i['rule']['maxlen'] ) return self::E_MAXLEN;
		if( isset($i['rule']['pattern']) && !preg_match($i['rule']['pattern'], $v) ) return self::E_PATTERN;
		if( isset($i['rule']['format']) ){
			switch( $i['rule']['format'] ){
				case self::FMT_INT:
					if( !preg_match('/^[1-9][0-9]*$/', $v) && $v !== '0' ) return self::E_FMT_INT;
					break;
				case self::FMT_ALP:
					if( !preg_match('/^[a-zA-Z]+$/', $v) ) return self::E_FMT_ALP;
					break;
				case self::FMT_NUM:
					if( !preg_match('/^[0-9]+$/', $v) ) return self::E_FMT_NUM;
					break;
				case self::FMT_ALPNUM:
					if( !preg_match('/^[a-zA-Z0-9]+$/', $v) ) return self::E_FMT_ALPNUM;
					break;
				case self::FMT_HIRA:
					if( !preg_match('/^[ぁ-んー　 ]+$/u', $v) ) return self::E_FMT_HIRA;
					break;
				case self::FMT_KATA:
					if( !preg_match('/^[ァ-ヶー　 ]+$/u', $v) ) return self::E_FMT_KATA;
					break;
				case self::FMT_TEL:
					if( !preg_match('/^[0-9]{2,}-?[0-9]{2,}-?[0-9]{2,}$/', $v) ) return self::E_FMT_TEL;
					break;
				case self::FMT_MAIL:
					if( !preg_match('/^[.a-zA-Z0-9_\-]+@[a-zA-Z0-9_\-]+(\.[a-zA-Z0-9_\-]+)+$/', $v) ) return self::E_FMT_MAIL;
					break;
				case self::FMT_URL:
					if( !preg_match('{^https?://[a-zA-Z0-9_\-]+(\.[a-zA-Z0-9_\-]+)+(/[.?&%#=a-zA-Z0-9_\-]*)*$}', $v) ) return self::E_FMT_URL;
					break;
			}
		}
		return self::E_NONE;
	}

	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% データの操作 %%%%

	// 項目の値を設定
	public function set_value($k, $v){
		$this->values[$k] = $v;
	}

	// 項目の値を取得
	public function get_value($k){
		if( isset($this->values[$k]) ){
			$val = $this->values[$k];
		}else if( isset($_SESSION[$this->sess]['repo'][$k]['value']) ){
			$val = $_SESSION[$this->sess]['repo'][$k]['value'];
		}
		return ( isset($val) ) ? $val : false;
	}

	// 項目の値を出力
	public function v($k, $add = true){
		if( !$this->f['settled'] || !is_string($k) ) return false;
		$val = $this->get_value($k);
		if( is_array($val) ) $val = implode($this->info['array_glue'], $val);
		if( $add && $val !== '' && $val !== false ){
			if( isset($_SESSION[$this->sess]['repo'][$k]['add']['before']) ) $val = $_SESSION[$this->sess]['repo'][$k]['add']['before'].$val;
			if( isset($_SESSION[$this->sess]['repo'][$k]['add']['after']) ) $val = $val.$_SESSION[$this->sess]['repo'][$k]['add']['after'];
		}
		echo nl2br(htmlspecialchars($val));
	}

	// 項目のエラーを設定
	public function set_error($k, $mes){
		$this->errors[$k] = $mes;
	}

	// 項目のエラーを出力
	public function e($k){
		if( !$this->f['settled'] || !is_string($k) || !isset($this->errors[$k]) ) return false;
		echo str_replace('#THE_ERROR_MESSAGE#', htmlspecialchars($this->errors[$k]), $this->info['error_format']);
	}

	// 項目がエラーを持つか
	public function has_error($k){
		return ( $this->validate($k) === self::E_NONE ) ? false : true;
	}

	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% html部品 %%%%

	// <select>-<option>形式のフォーム部品を出力
	public function html_options($name, $items, $empty = '', $attr_txt = ''){
		if( !is_array($items) ) $items = array($items);
		$out = "<select name=\"{$name}\"{$attr_txt}>";
		if( $empty !== '' ) $out .= "<option value=\"\">{$empty}</option>";
		if( $attr_txt !== '' ) $attr_txt = " ".ltrim($attr_txt);
		foreach($items as $i){
			if( !is_string($i) ) $i = strval($i);
			$selected = ( $this->get_value($name) === $i ) ? ' selected="selected"' : '';
			$out .= "<option value=\"{$i}\"{$selected}>{$i}</option>";
		}
		$out .= "</select>";
		echo $out;
	}

	// <label>-<input type="checkbox or radio">形式のフォーム部品を出力
	public function html_checks($name, $items, $type = 'checkbox', $attr_txt = ''){
		if( is_string($items) ){ $items = array($items);}
		$out = '';
		$data = $this->get_value(str_replace('[]', '', $name));
		if( !is_array($data) ) $data = array($data);
		if( $attr_txt !== '' ) $attr_txt = " ".ltrim($attr_txt);
		foreach($items as $i){
			if( !is_string($i) ) $i = strval($i);
			$checked = ( in_array($i, $data) ) ? ' checked="checked"' : '';
			$brackets = ( count($items) > 1 && $type === 'checkbox' ) ? '[]' : '';
			$out .= "<label{$attr_txt}><input type=\"{$type}\" name=\"{$name}{$brackets}\" value=\"{$i}\"{$checked} /> {$i}</label>";
		}
		echo $out;
	}

	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% メール %%%%

	// フォームデータをメール本文用のテキストに整形
	public function construct_mail_text($label_open = "[", $label_close = "]\n", $separator = "\n\n"){
		$repo = ( !empty($_SESSION[$this->sess]['repo']) ) ? $_SESSION[$this->sess]['repo'] : array();
		$groups = ( !empty($_SESSION[$this->sess]['groups']) ) ? $_SESSION[$this->sess]['groups'] : array();

		$result = '';
		while( list($k, $v) = each($repo) ){
			if( empty($v) ) continue;

			while( list($gk, $gv) = each($groups) ){
				if( !in_array($k, $gv['items']) ) continue;
				$result .= $label_open.$gv['label'].$label_close;
				for($i=0; $i<count($gv['items']); $i++){
					$item = $gv['items'][$i];
					if( isset($repo[$item]['value']) && $repo[$item]['value'] !== '' && $repo[$item]['value'] !== array() ){
						if( is_array($repo[$item]['value']) ) $repo[$item]['value'] = implode($this->info['array_glue'], $repo[$item]['value']);
						if( isset($repo[$item]['add']['before']) ) $result .= $repo[$item]['add']['before'];
						$result .= $repo[$item]['value'];
						if( isset($repo[$item]['add']['after']) ) $result .= $repo[$item]['add']['after'];
					}
					$result .= $gv['sep'];
					if( isset($repo[$item]) ) $repo[$item] = array();
				}
				unset($groups[$gk]);
				if( ($seplen = mb_strlen($gv['sep'])) > 0 ) $result = mb_substr($result, 0, -$seplen);
				$result .= $separator;
				continue 2;
			}
			reset($groups);

			$result .= $label_open.$v['label'].$label_close;
			if( isset($v['value']) && $v['value'] !== '' && $v['value'] !== array() ){
				if( is_array($v['value']) ) $v['value'] = implode($this->info['array_glue'], $v['value']);
				if( isset($v['add']['before']) ) $result .= $v['add']['before'];
				$result .= $v['value'];
				if( isset($v['add']['after']) ) $result .= $v['add']['after'];
			}
			$result .= $separator;
		}

		if( ($seplen = mb_strlen($separator)) > 0 ) $result = mb_substr($result, 0, -$seplen);
		return $result;
	}

	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% その他の関数 %%%%

	// nullバイト文字を除去
	public function sanitize($t){
		if( is_array($t) ) return array_map(array($this, 'sanitize'), $t);
		if( !is_string($t) ) return $t;
		return str_replace("\0", '', $t);
	}

	// 画面表示用にエスケープ
	public function h($t){
		if( is_array($t) ) return array_map(array($this, 'h'), $t);
		if( !is_string($t) ) return $t;
		return htmlspecialchars($t);
	}

	// フィルターを適用した値を取得
	public function apply_filter($t, $filter){
		if( !is_string($t) ) return $t;
		$result = $t;

		if( is_array($filter) ){
			foreach($filter as $f){
				$result = $this->apply_filter($result, $f);
			}

		} else {
			switch($filter){
				case self::FLT_TO_ZENKAKU_KANA:
					$result = mb_convert_kana($result, 'KV');
					break;
				case self::FLT_TO_HANKAKU_ALPNUM:
					$result = mb_convert_kana($result, 'a');
					break;
				case self::FLT_TO_UPPER_CASE:
					$result = strtoupper($result);
					break;
				case self::FLT_TO_LOWER_CASE:
					$result = strtolower($result);
					break;
				case self::FLT_EOL_TO_N:
					$result = str_replace(array("\r\n", "\r"), "\n", $result);
					break;
				case self::FLT_EOL_TO_SPACE:
					$result = str_replace(array("\r\n", "\r", "\n"), " ", $result);
					break;
				case self::FLT_TRIM:
					$result = trim($result);
					break;
				case self::FLT_RTRIM:
					$result = rtrim($result);
					break;
				case self::FLT_LTRIM:
					$result = ltrim($result);
					break;
			}
		}
		return $result;
	}
}
