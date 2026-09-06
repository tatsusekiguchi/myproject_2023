<?php
/*
	Mail.php v1.0

	Copyright (c) 2015 Hiroyuki Suzuki - http://a-hsm.com

	Released under the MIT license - http://opensource.org/licenses/MIT
*/
class Mail{
	protected $to = "";
	protected $subject = "";
	protected $body = "";
	protected $header = "";

	public $mail_format = '#^[.a-zA-Z0-9_\-]+@[a-zA-Z0-9_\-]+(\.[a-zA-Z0-9_\-]+)+$#';
	public $header_format = '#^[a-zA-Z0-9_\-]+ *: *[^:]+$#';

	// メールを送信
	public function send($to = "", $subject = "", $body = "", $header = ""){
		$result = false;

		if( $to === "" && $subject === "" && $body === "" && $header === "" ){
			$to = $this->to;
			$subject = $this->subject;
			$body = $this->body;
			$header = $this->header;
		}

		$to = $this->adjust($to, ",", $this->mail_format);
		if( !empty($to) ){
			$header = $this->adjust($header, "\n", $this->header_format);
			$result = ( empty($header) ) ? mb_send_mail($to, $subject, $body) : mb_send_mail($to, $subject, $body, $header);
		}
		return $result;
	}

	// 文字列または配列で渡されたデータを適切な形の文字列に整形
	public function adjust($t, $separator = ',', $pattern = '/.*/'){
		if( is_string($t) ){
			$t = trim($t, " \t\n\r\0\x0B");
			$t = explode($separator, $t);
		}

		if( is_array($t) ){
			for($i=0; $i<count($t); $i++){
				$t[$i] = trim($t[$i], " \t\n\r\0\x0B");
				if( !is_string($t[$i]) || !preg_match($pattern, $t[$i]) ) unset($t[$i]);
			}
			$t = implode($separator, $t);
		}

		if( !is_string($t) ) $t = "";
		return $t;
	}

	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 設定 %%%%

	// 宛先へ追加
	public function add_to($to){
		if( !empty($this->to) ) $this->to .= ",";
		$this->to .= $this->adjust($to, ",", $this->mail_format);
	}

	// 件名を設定
	public function set_subject($subject){
		if( !is_string($subject) ) return false;
		$this->subject = $subject;
	}

	// bodyを設定
	public function set_body($body){
		if( !is_string($body) ) return false;
		$this->body = $body;
	}

	// ヘッダーへ追加
	public function add_header($header){
		if( !empty($this->header) ) $this->header .= "\n";
		$this->header .= $this->adjust($header, "\n", $this->header_format);
	}

	// %%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%%% 取得 %%%%

	// 宛先を取得
	public function get_to($str = true){
		if( !$str ) return explode(",", $this->to);
		return $this->to;
	}

	// 件名を取得
	public function get_subject(){
		return $this->subject;
	}

	// bodyを取得
	public function get_body(){
		return $this->body;
	}

	// ヘッダーを取得
	public function get_header($str = true){
		if( !$str ) return explode("\n", $this->header);
		return $this->header;
	}
}
