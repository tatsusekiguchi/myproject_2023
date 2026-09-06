<?php

/**
 * マルチバイト文字列が制限文字数以内か確認
 * 
 * @param string $value 入力値
 * @param integer $max 最大文字数
 * @return boolean
 */
function chkMbLength($value, $max = 0)
{
    if (mb_strlen($value) > $max) {
        return false;
    }
    return true;
}

/**
 * マルチバイト文字列の正規表現
 * 
 * @param string $value 入力値
 * @param string $reg 正規表現文字列
 * @return boolean
 */
function chkNotMbRegex($value, $reg = '')
{
    if (mb_ereg($reg, $value) == false)
    {
        return true;
    }
    else
    {
        return false;
    }
}

/**
 * マルチバイト文字列の正規表現
 * 
 * @param string $value 入力値
 * @param string $reg 正規表現文字列
 * @return boolean
 */
function chkMbRegex($value, $reg = '')
{
    if (mb_ereg($reg, $value) == false)
    {
        return false;
    }
    else
    {
        return true;
    }
}

/**
 * マルチバイト文字列のtrim
 * 
 * @param string $value 入力値
 * @return string 空白が除去された値
 */
function mb_trim($string)
{
    mb_regex_encoding("UTF-8");
    $whitespace = '[\0\s]';
    $ret = mb_ereg_replace(sprintf('(^%s+|%s+$)', $whitespace, $whitespace), '',  $string);
    return  $ret;
}

/**
 * マルチバイト文字列のtruncate
 * 
 * @param string $value 入力値
 * @return string 空白が除去された値
 */
function mb_truncate($str, $length, $ext = '') {
    $ret = mb_strimwidth($str, 0, $length, $ext);
    return $ret;
}


//----------------------------------------
// メール処理
//----------------------------------------
/**
 * メール送信
 *
 * @param string $from_name 送信者名
 * @param string $from 送信元アドレス
 * @param string $to 送信先アドレス
 * @param string $subject 表題
 * @param string $body_text 本文
 * @param string $header ヘッダ
 * @param string $option オプション
 * @return bool
 */
function attach_mail($to, $subject, $body_text, $header, $option)
{

    if (is_array($to)) {
        foreach ($to as $t) {
            $ret = @mb_send_mail($t, $subject, $body_text, $header, $option);
            if (!$ret) {
                return false;
            }
        }
        return true;
    } else {
        return @mb_send_mail($to, $subject, $body_text, $header, $option);
    }
}

//-------------------------------------
//ページリンク文字列を作成
//-------------------------------------
function makePageLink ($TotalItems, $CurrentPage, $PerPage, $ExtraVars = array()) {

    // Pagerパラメータ
    $params = array(
        'mode' => 'sliding',
        'perPage' => $PerPage,
        'delta' => 5,
        'urlVar' => 'page',
        'currentPage' => $CurrentPage,
        'spacesBeforeSeparator' => 1,
        'spacesAfterSeparator' => 1,
        'clearIfVoid' => false,
        'totalItems' => $TotalItems,
        'extraVars' => $ExtraVars
    );

    $pager = Pager::factory($params);
    $links = $pager->getLinks();
    return $links['all'];
}

/**
 * アップロードされたファイルが画像か確認する
 * 
 * @param array $_FILE
 * @return boolean
 */
function chkUpFile($fileinfo)
{
    if ($fileinfo['error']) {
        return false;
    }
    
    if ($fileinfo['size'] < 100)
    {
        return false;
    }
    $size = getimagesize($fileinfo['tmp_name']);
    if ($size === false)
    {
        return false;
    }
    switch ($size[2])
    {
        case IMAGETYPE_GIF:
            return true;
            break;
        case IMAGETYPE_JPEG:
            return true;
            break;
        case IMAGETYPE_JPEG2000:
            return true;
            break;
        case IMAGETYPE_PNG:
            return true;
            break;
        default:
            return false;
            break;
    }
    return false;
}

function escapeWildCard($text)
{
    $order = array('%', '_');
    $replace = array('\%', '\_');
    $ret = str_replace($order, $replace, $text);
    return $ret;
}


/**
 * 共通エラーを処理します。
 *
 * @param unknown_type $err_no
 * @param unknown_type $err_str
 * @param unknown_type $err_file
 * @param unknown_type $err_line
 * @param unknown_type $err_context
 */
function errorHandler( $err_no, $err_str, $err_file, $err_line, $err_context )
{
    //現在のプロトコルを使用したまま、
    //WEBサイトのベースパスを取得してエラーページパスを作成する。
    $url = URL_BASE_PATH . '/';

    //エラーのみハンドリングする。
    switch ( $err_no )
    {
        case E_ERROR:
            header('Location: ' . $url . 'error.php');
            exit;
            break;

//      case E_WARNING:
      case E_PARSE:
            header('Location: ' . $url . 'error.php');
            exit;
            break;
//      case E_NOTICE:
        case E_CORE_ERROR:
            header('Location: ' . $url . 'error.php');
            exit;
            break;

//      case E_CORE_WARNING:
        case E_COMPILE_ERROR:
            header('Location: ' . $url . 'error.php');
            exit;
            break;

//      case E_COMPILE_WARNING:
        case E_USER_ERROR:
            unset( $_SESSION['error'] );
            $_SESSION['error']['err_str'] = $err_str;
            $_SESSION['error']['err_file'] = $err_file;
            $_SESSION['error']['err_line'] = $err_line;
            header('Location: ' . $url . 'error.php');
            exit;
            break;

//      case E_USER_WARNING:
//      case E_USER_NOTICE:
//      case E_ALL:
//      case E_STRICT:
//      case E_RECOVERABLE_ERROR:

    }
    
}

/**
 * 特殊を取得
 *
 * @param integer $building_id
 * @return array
 */
function getFeature()
{
    global $CONF, $mdb2, $logger;

    $query = 'SELECT * FROM feature_t';
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

//error_reporting(E_ALL);

//set_error_handler('errorHandler');


	// NULLバイト除去
	function sanitize($t){
		if( is_array($t) ){ return array_map('sanitize', $t);}
		return str_replace("\0", "", $t);
	}
















