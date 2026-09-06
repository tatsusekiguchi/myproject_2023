<?php

class UsForm{

	public $usf = array();
	public $mail = array();

	private $data = array();
	private $group = array();
	private $sess = 'usf';// UsFormは$_SESSION[$sess]を使用することになります
	private $f = array();
	private $post = array();
	private $error = array();
	private $confirmation = array();

	const NONE = 0;
	const INT = 1;

	const NUMERIC = 101;
	const ALPHABET = 102;
	const ALPHANUMERIC = 103;
	const ALPHANUMERIC2 = 104;

	const KANJI_HIRA = 201;
	const HIRA = 202;
	const KATA = 203;

	const ZIP = 400;
	const TEL = 500;

	const MAIL = 600;
	const MAIL_JA = 601;

	const URL = 700;
	const URL_JA = 701;

	public $prefecture = array('北海道', '青森県', '岩手県', '宮城県', '秋田県', '山形県', '福島県', '茨城県', '栃木県', '群馬県', '埼玉県', '千葉県', '東京都', '神奈川県',
		'新潟県', '富山県', '石川県', '福井県', '山梨県', '長野県', '岐阜県', '静岡県', '愛知県', '三重県', '滋賀県', '京都府', '大阪府', '兵庫県', '奈良県', '和歌山県', '鳥取県',
		'島根県', '岡山県', '広島県', '山口県', '徳島県', '香川県', '愛媛県', '高知県', '福岡県', '佐賀県', '長崎県', '熊本県', '大分県', '宮崎県', '鹿児島県', '沖縄県');
	public $month = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
	public $day = array('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday');
	public $day2 = array('Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun');
	public $day_ja = array('月', '火', '水', '木', '金', '土', '日');

	private $page = 0;

	/*
		set() -> $data
		impost_post() -> $data
		エラーが無ければ $data -> session['data']
		$dataは一時的であり、session['data']は常に正しく新しい

		make_group() -> $group
		エラーが無ければ $group -> session['group']
		$groupは一時的であり、session['group']は常に正しく新しい

		session['usf'] -> $usf
		$usf -> session['usf']

		session['r']: 最も新しい値
	*/

	function __construct($name_sess = ''){
		if( !session_id() ){ session_start();}
		if( !empty($name_sess) ){ $this->sess = $name_sess;}

		// 一部の正規表現はutf8以外では正しく動作しません
		mb_regex_encoding('UTF-8');
		mb_internal_encoding('UTF-8');
		mb_language('Japanese');

		$this->usf['page'] = 1;
		$this->usf['error_format'] = '<div style="color:#f00;font-size:80%;">#THE_ERROR_MESSAGE#</div>';
		$this->usf['name_for_back'] = 'usf_back';
		$this->usf['name_for_reset'] = 'usf_reset';
		$this->usf['name_for_token'] = 'usf_token';

		$this->mail['admin']['to'] = "";
		$this->mail['admin']['subject'] = "";
		$this->mail['admin']['header'] = "";
		$this->mail['admin']['body_before'] = "";
		$this->mail['admin']['body_after'] = "";

		$this->mail['user']['to'] = "";
		$this->mail['user']['subject'] = "";
		$this->mail['user']['header'] = "";
		$this->mail['user']['body_before'] = "";
		$this->mail['user']['body_after'] = "";

		$this->f['back'] = false;// ページを戻すか
		$this->f['reset'] = false;// フォームをリセットするか

		$this->read_session();
	}

	// 項目情報をセット
	public function set($key, $label, $require = false, $rule = array(), $isselect = false, $sub = array()){
		if( !isset($rule) ){ $rule = array();}
		if( !isset($sub) ){ $sub = array();}

		$this->data[$key]['label'] = $label;// 項目名(日本語)
		$this->data[$key]['require'] = $require;// 必須か
		$this->data[$key]['rule'] = $rule;// ルール
		$this->data[$key]['isselect'] = $isselect;// 選択式か(エラーテキストのため)
		$this->data[$key]['sub'] = $sub;// 値の先頭, 末尾に付加する文字列
		/*
			基本的な形
			$rule = array(
				'format' = self::NONE,
				'minlen' = 1,
				'maxlen' = 255
			);
			$sub = array(
				'before' = '先頭',
				'after' = '末尾'
			);
		*/
	}

	// 項目のグループを作成
	public function make_group($label, $items){
		if( is_string($items) || is_numeric($items) ){ $items = array($items);}
		if( empty($items) ){ return false;}
		$this->group[$label] = $items;
		return true;
	}

	// 確認用の項目をバインド
	public function make_confirmation($key, $parent){
		if( empty($key) || !is_string($key) || empty($parent) || !is_string($parent) ){ return false;}
		if( !isset($this->data[$parent]) ){ return false;}
		$this->confirmation[$parent] = $key;
		return true;
	}

	// nullバイト文字を除去
	public function sanitize($t){
		if( is_array($t) ){ return array_map(array($this, 'sanitize'), $t);}
		return str_replace("\0", '', $t);
	}

	// フォームを終了
	public function finish(){
		if( !empty($_SESSION[$this->sess]) ){ unset($_SESSION[$this->sess]);}
		unset($this->data);
	}

	// セッション読み込み
	private function read_session(){
		if( empty($_SESSION[$this->sess]['usf']) ){ return false;}
		$this->usf = $_SESSION[$this->sess]['usf'];
		return true;
	}

	// セッション書き込み
	private function write_session($data = false){
		unset($_SESSION[$this->sess]['usf']);
		$_SESSION[$this->sess]['usf'] = $this->usf;
		if( $data ){
			if( empty($_SESSION[$this->sess]['data']) ){ $_SESSION[$this->sess]['data'] = array();}
			$_SESSION[$this->sess]['data'] = array_merge($_SESSION[$this->sess]['data'], $this->data);
			if( empty($_SESSION[$this->sess]['group']) ){ $_SESSION[$this->sess]['group'] = array();}
			$_SESSION[$this->sess]['group'] = array_merge($_SESSION[$this->sess]['group'], $this->group);
		}
	}

	// ポストデータを取り込み
	public function import_post(){
		if( empty($_POST) ){ return false;}
		$post = $this->sanitize($_POST);
		foreach( $this->data as $k => $v ){
			if( isset($post[$k]) ){
				if( is_string($post[$k]) && $post[$k] != '' ){
					$this->data[$k]['value'] = $post[$k];
				}else if( is_array($post[$k]) && !empty($post[$k]) ){
					$this->data[$k]['value'] = implode(',', $post[$k]);
				}
			}
		}

		if( !empty($post[$this->usf['name_for_back']]) || !empty($post[$this->usf['name_for_back'].'_x']) ){
			$this->f['back'] = true;
		}

		if( !empty($post[$this->usf['name_for_reset']]) || !empty($post[$this->usf['name_for_reset'].'_x']) ){
			$this->f['reset'] = true;
		}

		$this->post = $post;
		return true;
	}

	// ページ等、フォームの状態を確定します
	public function settle($redirect = ''){
		if( !empty($this->page) ){ return $this->page;}
		$fin = false;

		if( $this->import_post() ){
			if( $this->f['reset'] ){
				$this->finish();
				$fin = true;
			}else if( $this->f['back'] ){
				if( $this->usf['page'] > 1 ){ $this->usf['page']--;}
				$this->write_session();
			}else if( $this->count_error() == 0 ){
				$this->usf['page']++;
				$this->write_session(true);
			}

			// リダイレクトさせる
			if( isset($redirect) && $redirect != '' ){
				if( !$fin ){
					$_SESSION[$this->sess]['r']['error'] = $this->error;
					$_SESSION[$this->sess]['r']['data'] = $this->data;
				}
				header('Location: '.$redirect);
				exit;
			}
		}

		$this->page = $this->usf['page'];
		return $this->page;
	}

	// 現在のページを返します
	public function get_page(){
		return $this->usf['page'];
	}

	// トークンに関するフォーム部品を出力します
	public function get_token_html($echo = true, $close = true){
		$result = '';
		$g = '';
		if( $close ){ $g = ' /';}
		if( $this->get_page() != 1 ){
			$result = '<input type="hidden" name="'.$this->usf['name_for_token'].'" value="f92a2f25404e44f5d7c8692e4d1fd6d0"'.$g.'>';
			if( $echo ){ echo $result;}
		}
		return $result;
	}

	// $dataにおけるエラーの数を返します
	private function count_error(){
		$cnt = 0;
		if( !is_array($this->data) ){ return 0;}

		foreach($this->data as $k => $v){

			// 確認用の項目
			if( isset($this->confirmation[$k]) && isset($v['value']) && $v['value'] != '' ){
				if( $v['value'] != $this->post[$this->confirmation[$k]] ){
					$this->error[$k] = "入力内容が異なります";
				}
			}

			// ルール
			if( !empty($v['rule']) && isset($v['value']) && $v['value'] != '' ){

				// 最小文字数
				if( isset($v['rule']['minlen']) ){
					if( mb_strlen($v['value']) < $v['rule']['minlen'] ){
						$this->error[$k] = "文字数が足りません";
					}
				}

				// 最大文字数
				if( isset($v['rule']['maxlen']) ){
					if( mb_strlen($v['value']) > $v['rule']['maxlen'] ){
						$this->error[$k] = "最大文字数を超えています";
					}
				}

				// 書式
				if( isset($v['rule']['format']) ){
					switch( $v['rule']['format'] ){
						case self::INT:
							if( !preg_match('/^[1-9][0-9]*$/', $v['value']) && $v['value'] !== '0' ){
								$this->error[$k] = "整数のみ可能です";
							}
							break;
						case self::NUMERIC:
							if( !preg_match('/^[0-9]+$/', $v['value']) ){
								$this->error[$k] = "半角数字のみ使用可能です";
							}
							break;
						case self::ALPHABET:
							if( !preg_match('/^[a-zA-Z]+$/', $v['value']) ){
								$this->error[$k] = "半角英字のみ使用可能です";
							}
							break;
						case self::ALPHANUMERIC:
							if( !preg_match('/^[a-zA-Z0-9]+$/', $v['value']) ){
								$this->error[$k] = "半角英数字のみ使用可能です";
							}
							break;
						case self::ALPHANUMERIC2:
							if( !preg_match('/^[a-zA-Z0-9_\-]+$/', $v['value']) ){
								$this->error[$k] = "半角英数字のみ使用可能です";
							}
							break;
						case self::KANJI_HIRA:
							if( !preg_match('/^[一-龠ぁ-んー　 ]+$/u', $v['value']) ){
								$this->error[$k] = "全角漢字,ひらがなのみ使用可能です";
							}
							break;
						case self::HIRA:
							if( !preg_match('/^[ぁ-んー　 ]+$/u', $v['value']) ){
								$this->error[$k] = "全角ひらがなのみ使用可能です";
							}
							break;
						case self::KATA:
							if( !preg_match('/^[ァ-ヶー　 ]+$/u', $v['value']) ){
								$this->error[$k] = "全角カタカナのみ使用可能です";
							}
							break;
						case self::ZIP:
							if( !preg_match('/^[0-9]{3}-?[0-9]{4}$/', $v['value']) ){
								$this->error[$k] = "書式が不正です";
							}
							break;
						case self::TEL:
							if( !preg_match('/^[0-9]{2,}-?[0-9]{2,}-?[0-9]{2,}$/', $v['value']) ){
								$this->error[$k] = "書式が不正です";
							}
							break;
						case self::MAIL:
							if( !preg_match('/^[.a-zA-Z0-9_\-]+@[a-zA-Z0-9_\-]+(\.[a-zA-Z0-9_\-]+)+$/', $v['value']) ){
								$this->error[$k] = "書式が不正です";
							}
							break;
						case self::MAIL_JA:
							if( !preg_match('/^[.a-zA-Z0-9一-龠ぁ-んー_\-]+@[a-zA-Z0-9一-龠ぁ-んー_\-]+(\.[a-zA-Z0-9一-龠ぁ-んー_\-]+)+$/u', $v['value']) ){
								$this->error[$k] = "書式が不正です";
							}
							break;
						case self::URL:
							if( !preg_match('{^https?://[a-zA-Z0-9_\-]+(\.[a-zA-Z0-9_\-]+)+(/[.?&%#=a-zA-Z0-9_\-]*)*$}', $v['value']) ){
								$this->error[$k] = "書式が不正です";
							}
							break;
						case self::URL_JA:
							if( !preg_match('{^https?://[a-zA-Z0-9一-龠ぁ-んー_\-]+(\.[a-zA-Z0-9一-龠ぁ-んー_\-]+)+(/[.?&%#=a-zA-Z0-9一-龠ぁ-んー_\-]*)*$}u', $v['value']) ){
								$this->error[$k] = "書式が不正です";
							}
							break;
					}
				}
			}

			// 必須
			if( $v['require'] && ( !isset($v['value']) || $v['value'] == '' ) ){
				if( $v['isselect'] ){
					$this->error[$k] = "選択してください";
				} else {
					$this->error[$k] = "入力してください";
				}
			}

			if( isset($this->error[$k]) ){ $cnt++;}
		}
		return $cnt;
	}

	// 項目の値を返します
	public function get_data($key, $echo = true, $esc = 2, $sub = false){
		if( isset($this->data[$key]['value']) ){
			$source = $this->data[$key];
		}else if( isset($_SESSION[$this->sess]['data'][$key]['value']) ){
			$source = $_SESSION[$this->sess]['data'][$key];
		}else if( isset($_SESSION[$this->sess]['r']['data'][$key]['value']) ){
			$source = $_SESSION[$this->sess]['r']['data'][$key];
		} else { return false;}

		$result = $source['value'];
		if( $esc > 0 ){ $result = htmlspecialchars($result);}
		if( $esc > 1 ){ $result = preg_replace("/\n/", '<br />', $result);}
		if( $sub ){ $result = $source['sub']['before'].$result.$source['sub']['after'];}
		if( $echo ){ echo $result;}
		return $result;
	}

	// エラー内容を返します
	public function get_error($key, $echo = true){
		if( isset($this->error[$key]) ){
			$source = $this->error[$key];
		}else if( isset($_SESSION[$this->sess]['r']['error'][$key]) ){
			$source = $_SESSION[$this->sess]['r']['error'][$key];
		} else { return false;}

		$result = str_replace('#THE_ERROR_MESSAGE#', $source, $this->usf['error_format']);
		if( $echo ){ echo $result;}
		return $result;
	}

	// セッションに保存されている全項目の情報を返します
	public function get_all_data(){
		$result = array();
		if( !empty($_SESSION[$this->sess]['data']) ){ $result = $_SESSION[$this->sess]['data'];}
		return $result;
	}

	// セッションに保存されている全グループを返します
	public function get_all_group(){
		$result = array();
		if( !empty($_SESSION[$this->sess]['group']) ){ $result = $_SESSION[$this->sess]['group'];}
		return $result;
	}

	// <select>-<option>形式のフォーム部品を出力します
	public function html_options($name = "", $options = array(), $empty = "", $echo = true){
		$result = '<select name="'.$name.'">';
		if( $empty != "" ){ $result .= '<option value="">'.$empty.'</option>';}
		foreach($options as $o){
			$selected = '';
			if( $this->get_data($name, false, 0) == $o ){ $selected = ' selected="selected"';}
			$result .= '<option value="'.$o.'"'.$selected.'>'.$o.'</option>';
		}
		$result .= '</select>';

		if( $echo ){ echo $result;}
		return $result;
	}
}
