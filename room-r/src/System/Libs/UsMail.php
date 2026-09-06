<?php

class UsMail{

	private $to = "";
	private $subject = "";
	private $header = "";
	private $body = "";

	const PTN_MAIL = '#^[.a-zA-Z0-9_\-]+@[a-zA-Z0-9_\-]+(\.[a-zA-Z0-9_\-]+)+$#';// メールアドレスのパターン
	const PTN_HEADER = '#^[a-zA-Z0-9_\-]+ *: *[^:]+$#';// ヘッダーのパターン

	private $encording = "UTF-8";
	private $language = "Japanese";

	function __construct($enc = '', $lang = ''){
		if( !empty($enc) ){ $this->encording = $enc;}
		if( !empty($lang) ){ $this->language = $lang;}
		mb_internal_encoding($this->encording);
		mb_language($this->language);
	}

	// メールを送信
	public function send(){
		$to = $this->to;
		$subject = $this->subject;
		$header = $this->header;
		$body = $this->body;

		// UsFormオブジェクトの場合
		if( func_num_args() == 2 && is_object(func_get_arg(0)) && get_class(func_get_arg(0)) == 'UsForm' ){
			$usf = func_get_arg(0);
			$auto_reply = func_get_arg(1);
			$result = false;

			$to = $usf->mail['admin']['to'];
			$subject = $usf->mail['admin']['subject'];
			$header = $usf->mail['admin']['header'];
			$body = $this->construct_body($usf->get_all_data(), $usf->mail['admin']['body_before'], $usf->mail['admin']['body_after'], $usf->get_all_group());
			$result = $this->send($to, $subject, $header, $body);

			// 自動返信
			if( $auto_reply && $result ){
				$to = $usf->mail['user']['to'];
				$subject = $usf->mail['user']['subject'];
				$header = $usf->mail['user']['header'];
				$body = $this->construct_body($usf->get_all_data(), $usf->mail['user']['body_before'], $usf->mail['user']['body_after'], $usf->get_all_group());
				$result = $this->send($to, $subject, $header, $body);
			}
			return $result;
		}

		// 引数の情報で送信
		if( func_num_args() == 4 ){
			$to = func_get_arg(0);
			$subject = func_get_arg(1);
			$header = func_get_arg(2);
			$body = func_get_arg(3);
		}

		$result = false;
		$to = $this->adjust($to, ",", self::PTN_MAIL);
		if( !empty($to) ){
			$header = $this->adjust($header, "\n", self::PTN_HEADER, true);
			if( empty($header) ){
				$result = mb_send_mail($to, $subject, $body);
			} else {
				$result = mb_send_mail($to, $subject, $body, $header);
			}
		}
		return $result;
	}

	// 文字列または配列で渡されたデータを適切な形の文字列に整形します
	// この関数はToやHeaderのために用意されています
	public function adjust($t, $separator = ',', $pattern = '/.*/', $rn2n = false){
		if( is_string($t) ){
			if( $rn2n ){ $t = preg_replace('/\r\n/', "\n", $t);}
			$t = trim($t, " \t\n\r\0\x0B");
			$t = explode($separator, $t);
		}

		$br = 0;// ブレーカー
		if( is_array($t) ){
			for($i=0; $i<count($t); $i++){
				$br++;
				if( $br > 1024 ){ break;}
				if( $rn2n ){ $t[$i] = preg_replace('/\r\n/', "\n", $t[$i]);}
				$t[$i] = trim($t[$i], " \t\n\r\0\x0B");
				if( !is_string($t[$i]) || !preg_match($pattern, $t[$i]) ){
					array_splice($t, $i, 1);
					$i--;
				}
			}
			$t = implode($separator, $t);
		}

		if( !is_string($t) || $br > 1024 ){ $t = '';}
		return $t;
	}

	// 宛先に登録
	// 文字列でも配列でも可能
	public function add_to($to){
		$this->to = $this->adjust($this->to, ",", self::PTN_MAIL);
		if( !empty($this->to) ){ $this->to .= ",";}
		$this->to .= $this->adjust($to, ",", self::PTN_MAIL);
	}

	// 件名を登録
	public function set_subject($subject){
		if( is_string($subject) ){ $this->subject = $subject;}
	}

	// ヘッダーに登録
	// 文字列でも配列でも可能ですが、現時点においてこの関数を使ってCCやBCCなどをバラバラに追加することはできません(同じ種類の情報はまとめて追加してください)
	public function add_header($header){
		$this->header = $this->adjust($this->header, "\n", self::PTN_HEADER, true);
		if( !empty($this->header) ){ $this->header .= "\n";}
		$this->header .= $this->adjust($header, "\n", self::PTN_HEADER, true);
	}

	// bodyを設定
	public function set_body($body){
		if( is_string($body) ){ $this->body = $body;}
	}

	// 宛先を取得
	public function get_to($str = true, $echo = false){
		$this->to = $this->adjust($this->to, ",", self::PTN_MAIL);
		if( !$str ){ return explode(",", $this->to);}
		if( $echo ){ echo $this->to;}
		return $this->to;
	}

	// 件名を取得
	public function get_subject($echo = false){
		if( $echo ){ echo $this->subject;}
		return $this->subject;
	}

	// ヘッダーを取得
	public function get_header($str = true, $echo = false){
		$this->header = $this->adjust($this->header, "\n", self::PTN_HEADER, true);
		if( !$str ){ return explode("\n", $this->header);}
		if( $echo ){ echo $this->header;}
		return $this->header;
	}

	// bodyを取得
	public function get_body($echo = false){
		if( $echo ){ echo $this->body;}
		return $this->body;
	}

	// send()にUsFormオブジェクトが渡されたとき、メールの本文を組み立てる
	private function construct_body($data, $bBefore = "", $bAfter = "", $group = array()){
		$result = $bBefore;
		if( !empty($data) && is_array($data) ){
			while( list($k, $v) = each($data) ){
				if( !empty($group) && is_array($group) ){
					foreach($group as $k2 => $v2){
						if( in_array($k, $v2) ){
							$result .= "[".$k2."]\n";
							for($i=0; $i<count($v2); $i++){
								if( isset($data[$v2[$i]]['value']) ){
									if( isset($data[$v2[$i]]['sub']['before']) ){ $result .= $data[$v2[$i]]['sub']['before'];}
									$result .= $data[$v2[$i]]['value'];
									if( isset($data[$v2[$i]]['sub']['after']) ){ $result .= $data[$v2[$i]]['sub']['after'];}
								}
								$result .= " ";
								unset($data[$v2[$i]]);
							}
							$result .= "\n\n";
							continue 2;
						}
					}
				}
				$result .= "[".$v['label']."]\n";
				if( isset($v['value']) ){
					if( isset($v['sub']['before']) ){ $result .= $v['sub']['before'];}
					$result .= $v['value'];
					if( isset($v['sub']['after']) ){ $result .= $v['sub']['after'];}
				}
				$result .= "\n\n";
			}
		}
		$result = rtrim($result, "\n").$bAfter;
		return $result;
	}
}
