<?php
/**
 * PC版のいろいろ
 */
class PC{
	/** @var object */
	public $Smarty = null;

	/** @var object */
	public $MDB2 = null;

	/** @var object */
	public $Log = null;

	/** @var array */
	public $conf = array();

	/**
	 * PC版の定義を取り込み
	 */
	function __construct(){
		require_once(dirname(__FILE__)."/../../../include/define.php");
		require_once(dirname(__FILE__)."/../../../include/user_function.php");
		$this->Smarty = $smarty;
		$this->MDB2 = $mdb2;
		$this->Log = $logger;
		$this->conf = $CONF;
	}

	/**
	 * get_bukken.php のラップ
	 *
	 * @return array
	 */
	public function get_bukken(){
		$mdb2 = $this->MDB2;
		$logger = $this->Log;
		$CONF = $this->conf;
		include(dirname(__FILE__)."/../../../get_bukken.php");
		return array($bukken, $cnt_bukken, $params, $url_param, $result_text);
	}
}
