<?php
require_once '../include/define.php';

// 共通関数
require_once 'user_function.php';

if(!isset($_GET['thumbflg'])){
	// サムネイルと拡大画像両方
	$colName = isset($_GET['name']) ? $_GET['name'] : '';
	if (substr($colName, 0, 7) == 'b_photo') {
		// 建物
		$sess = 'b_photo';
		$head = 'B';
		$width = 430;
		$height = 645;
		$shift = 10;
	} elseif (substr($colName, 0, 7) == 'r_photo') {
		// 部屋
		$sess = 'r_photo';
		$head = 'R';
		$width = 582;
		$height = 388;
		$shift = 20;
	} else {
		$sess = 'dummy';
		$width = 10;
		$height = 10;
	}
	$num = (int) substr($colName, 7);

	$file = false;
	$name = 'name_' . $colName . '_c';
	if (isset($_FILES[$name])) {
		$file = $_FILES[$name];
	}
	if (chkUpFile($file)) {

		$imgdir = 'uploads';
		$bg = 'FFF';
		//$pathinfo = pathinfo($file['name']);
		//$ext = (isset($pathinfo['extension'])) ? $pathinfo['extension'] : '' ;

		if (22 == $num) {
			$ext = strtolower(substr(strrchr($file['name'], '.'), 1));
		} else {
			$ext = 'jpg';
		}
		$filename = date('YmdHis') . md5(uniqid());
		while (check_file($filename . '.' . $ext, $head)) {
			$filename = date('YmdHis') . md5(uniqid());
		}


		switch ($num) {
			case 0:
				if ($head == 'B') {
					// 建物
					// 一覧画像
					$single = true;
					$pre = 'A';
					$path = IMG_UPLOAD_DIR . '/' . $head . $pre . $filename . '.' . $ext;
				} else {
					$single = true;
					$pre = 'M';
					$path = IMG_TEMP_DIR . '/' . $head . 'o' . $filename . '.' . $ext;
				}
				break;
			case 21:
				if ($head == 'B') {
					// 建物
					// 一覧画像サムネイル
					$single = true;
					$pre = 'A';
					$path = IMG_UPLOAD_DIR . '/' . $head . $pre . $filename . '.' . $ext;
				} else {
					$single = true;
					$pre = 'M';
					$path = IMG_TEMP_DIR . '/' . $head . 'o' . $filename . '.' . $ext;
				}
				break;
			case 22:
				$bg = '222';
				$imgdir = 'names';
				$pre = '';
				$single = true;
				$path = IMG_BUILDING_NAME_DIR . '/' . $head . $filename . '.' . $ext;
				break;
			default:
				$single = false;
				$path = IMG_TEMP_DIR . '/' . $head . 'o' . $filename . '.' . $ext;
		}

		$sessname = $colName . '_c';
		$num2 = $num + $shift;
		$small = $sess . $num2 . '_c';
		if(move_uploaded_file($file['tmp_name'], $path)) {
			chmod($path, 0666);
			$upload = 'success';
			if ($single) {
				// 一枚のみ
				if (0 == $num && 'M' == $pre) {
					// 部屋の間取り図
					$bgcolor = array('red'=>255, 'green'=>255, 'blue'=>255);
					$img = fit_canvas($path, 580, 751, $bgcolor);
					imagejpeg($img, IMG_UPLOAD_DIR . '/' . $head . $pre . $filename . '.' . $ext, 100);
					imagedestroy($img);
					//unlink($path);
				}
				if ((0 == $num || 21 == $num)&& 'A' == $pre){
					// 一覧画像か一覧画像マウスオーバー
					$bgcolor = array('red'=>255, 'green'=>255, 'blue'=>255);
					$img = fit_canvas($path, 240, 160, $bgcolor);
					imagejpeg($img, IMG_UPLOAD_DIR . '/' . $head . $pre . $filename . '.' . $ext, 100);
					imagedestroy($img);
					//unlink($path);
				}
				$_SESSION[$sess][$sessname] =  $head . $pre . $filename . '.' . $ext;
			} else {
				// サムネイルあり
				$_SESSION[$sess][$sessname] =  $head . 'L' . $filename . '.' . $ext;
				$_SESSION[$sess][$small] =  $head . 'S' . $filename . '.' . $ext;
				//$bgcolor = array('red'=>71, 'green'=>69, 'blue'=>69);
				$bgcolor = array('red'=>255, 'green'=>255, 'blue'=>255);
				$img = fit_canvas($path, $width, $height, $bgcolor);
				imagejpeg($img, IMG_UPLOAD_DIR . '/' . $head . 'L' . $filename . '.' . $ext, 100);
				imagedestroy($img);
				// サムネイル作成
				if($head == "B"){
					$bgcolor = array('red'=>255, 'green'=>255, 'blue'=>255);
					$img = scaling_canvas($path, 130, 130,$bgcolor);
				}elseif($head == "R"){
					$bgcolor = array('red'=>255, 'green'=>255, 'blue'=>255);
					$img = scaling_canvas($path, 80, 80,$bgcolor);
				}
				imagejpeg($img, IMG_UPLOAD_DIR . '/' . $head . 'S' . $filename . '.' . $ext, 100);
				imagedestroy($img);
				//unlink($path);

				// 部屋の内観画像のために大きめのサイズを保存
				if( $sess == 'r_photo' ){
					$img = fit_canvas($path, 515, 360, $bgcolor);
					imagejpeg($img, IMG_UPLOAD_DIR.'/'.$head.'O'.$filename.'.'.$ext, 80);
					imagedestroy($img);
				}
			}
		} else {
			$upload = 'fail';
		}
	} else {
		$upload = 'fail';
	}

	$tpl_path = 'fileUpload.tpl';
	$smarty->assign('upload', $upload);
	$smarty->assign('file', $_SESSION[$sess][$sessname]);
	$smarty->assign('name', $colName);
	$smarty->assign('num', $num);
	$smarty->assign('imgdir', $imgdir);
	$smarty->assign('bg', $bg);

	header("Content-Type: text/html; charset=utf-8");
	$smarty->display($tpl_path);
}else{
	// サムネイルのみ更新

	$alterFlg = false; // 上書きか新規か

	$colName = isset($_GET['name']) ? $_GET['name'] : '';
	if (substr($colName, 0, 7) == 'b_photo') {
		// 建物
		$sess = 'b_photo';
		$head = 'B';
		$width = 130;
		$height = 130;
		$shift = 10;
	} elseif (substr($colName, 0, 7) == 'r_photo') {
		// 部屋
		$sess = 'r_photo';
		$head = 'R';
		$width = 80;
		$height = 80;
		$shift = 20;
	} else {
		$sess = 'dummy';
		$width = 10;
		$height = 10;
	}
	$num = (int) substr($colName, 7);

	$file = false;
	$name = 'name_' . $colName . '_c';
	if (isset($_FILES[$name])) {
		$file = $_FILES[$name];
	}
	if (chkUpFile($file)) {
		// 画像ファイルだったら
		$imgdir = 'uploads';
		$bg = 'FFF';
		//$pathinfo = pathinfo($file['name']);
		//$ext = (isset($pathinfo['extension'])) ? $pathinfo['extension'] : '' ;

		$ext = 'jpg';

		// ファイル名の設定
		$sessname = $colName . '_c';
		if($_SESSION[$sess][$sessname] != ""){
			$alterFlg = true;
			$filename = str_replace($head.'L','',$_SESSION[$sess][$sessname]);
			$filename = str_replace('.jpg','',$filename);
		}else{
			// 拡大写真がないとはじく
			echo false;
			die();
			$filename = date('YmdHis') . md5(uniqid());
			while (check_file($filename . '.' . $ext, $head)) {
				$filename = date('YmdHis') . md5(uniqid());
			}
			$alterFlg = false;
		}

		$single = false;

		// 一時保存先
		$path = IMG_TEMP_DIR . '/' . $head . 'o' . $filename . '.' . $ext;


		$sessname = $colName . '_c';
		$num2 = $num + $shift;
		$small = $sess . $num2 . '_c';
		if(move_uploaded_file($file['tmp_name'], $path)) {
			chmod($path, 0666);
			$upload = 'success';
			// サムネイルあり
			//$_SESSION[$sess][$sessname] =  $head . 'L' . $filename . '.' . $ext;

			$_SESSION[$sess][$small] =  $head . 'S' . $filename . '.' . $ext;
			//$bgcolor = array('red'=>71, 'green'=>69, 'blue'=>69);
			$bgcolor = array('red'=>255, 'green'=>255, 'blue'=>255);
			// サムネイル作成
			if($head == "B"){
				$bgcolor = array('red'=>255, 'green'=>255, 'blue'=>255);
				$img = scaling_canvas($path, 130, 130,$bgcolor);
			}elseif($head == "R"){
				$bgcolor = array('red'=>255, 'green'=>255, 'blue'=>255);
				$img = scaling_canvas($path, 80, 80,$bgcolor);
			}
			imagejpeg($img, IMG_UPLOAD_DIR . '/' . $head . 'S' . $filename . '.' . $ext, 100);
			imagedestroy($img);
			//unlink($path);
		} else {
			$upload = 'fail';
		}
	} else {
		$upload = 'fail';
	}

	$tpl_path = 'fileUploadThumb.tpl';
	$smarty->assign('upload', $upload);
	if($upload != 'fail'){
		$smarty->assign('file', $head . 'S' . $filename . '.' . $ext);
	}else{
		$smarty->assign('file', "");
	}
	$smarty->assign('name', $colName);
	$smarty->assign('num', $num);
	$smarty->assign('imgdir', $imgdir);
	$smarty->assign('bg', $bg);

	header("Content-Type: text/html; charset=utf-8");
	$smarty->display($tpl_path);

}

function check_file($filename, $head)
{
	if (file_exists(IMG_UPLOAD_DIR . '/' . $head . 'L' . $filename)) {
		return true;
	}
	if (file_exists(IMG_UPLOAD_DIR . '/' . $head . 'S' . $filename)) {
		return true;
	}
	if (file_exists(IMG_TEMP_DIR . '/' . $head . 'o' . $filename)) {
		return true;
	}
	if (file_exists(IMG_BUILDING_NAME_DIR . '/' . $head . $filename)) {
		return true;
	}
	return false;
}

/**
 * 画像をキャンバスサイズに縮小する(背景は黒)
 *
 * @param string $filename
 * @param integer $can_x
 * @param integer $can_y
 * @return resource
 */
function fit_canvas($filename, $can_x, $can_y, $bgcolor = null)
{
	if ($can_x <=0 || $can_y <= 0)
	{
		return false;
	}

	$size = getimagesize($filename);
	if ($size === false)
	{
		return false;
	}
	$old_x = $size[0];
	$old_y = $size[1];
	$type = $size[2];
	$x = $old_x / $can_x;
	$y = $old_y / $can_y;

	$x = round($x,1);
	$y = round($y,1);


	if ($x < 1 && $y < 1)
	{
		$dst_x = ($can_x - $old_x) / 2;
		$dst_y = ($can_y - $old_y) / 2;
		$dst_w = $old_x;
		$dst_h = $old_y;
	}
	elseif ($x > $y)
	{
		$new_y = $old_y / $x;
		$dst_x = 0;
		$dst_y = ($can_y - $new_y) / 2;
		$dst_w = $can_x;
		$dst_h = $new_y;
	}
	else
	{
		$new_x = $old_x / $y;
		$dst_x = ($can_x - $new_x) / 2;
		$dst_y = 0;
		$dst_w = $new_x;
		$dst_h = $can_y;
	}

	$dst = imagecreatetruecolor($can_x, $can_y);
	$bg = imagecolorallocate($dst, $bgcolor['red'], $bgcolor['green'], $bgcolor['blue']);
	imagefill($dst, 0, 0, $bg);
	switch ($type)
	{
		case IMAGETYPE_GIF:
			$src = imagecreatefromgif($filename);
			break;
		case IMAGETYPE_JPEG:
			$src = imagecreatefromjpeg($filename);
			break;
		case IMAGETYPE_JPEG2000:
			$src = imagecreatefromjpeg($filename);
			break;
		case IMAGETYPE_PNG:
			$src = imagecreatefrompng($filename);
			break;
		default:
			return false;
			break;
	}

	$ret = imagecopyresampled($dst, $src, $dst_x, $dst_y, 0, 0, $dst_w, $dst_h, $old_x, $old_y);
	if ($ret === true)
	{
		imagedestroy($src);
		return $dst;
	}
}

/**
 * 画像をキャンバスサイズに縮小する
 *
 * @param string $filename
 * @param integer $can_x
 * @param integer $can_y
 * @return resource
 */
function resize_canvas($filename, $can_x, $can_y)
{
	if ($can_x <=0 || $can_y <= 0)
	{
		return false;
	}

	$size = getimagesize($filename);
	if ($size === false)
	{
		return false;
	}
	$old_x = $size[0];
	$old_y = $size[1];
	$type = $size[2];

	$dst = imagecreatetruecolor($can_x, $can_y);
	$white = imagecolorallocate($dst, 255, 255, 255);
	$black = imagecolorallocate($dst, 0, 0, 0);
	imagefill($dst, 0, 0, $white);
	switch ($type)
	{
		case IMAGETYPE_GIF:
			$src = imagecreatefromgif($filename);
			break;
		case IMAGETYPE_JPEG:
			$src = imagecreatefromjpeg($filename);
			break;
		case IMAGETYPE_JPEG2000:
			$src = imagecreatefromjpeg($filename);
			break;
		case IMAGETYPE_PNG:
			$src = imagecreatefrompng($filename);
			break;
		default:
			return false;
			break;
	}

	$ret = imagecopyresampled($dst, $src, 0, 0, 0, 0, $can_x, $can_y, $old_x, $old_y);
	if ($ret === true)
	{
		imagedestroy($src);
		return $dst;
	}
}


/**
 * 画像をキャンバスサイズに縮小する(短い辺に合わせる)
 *
 * @param string $filename
 * @param integer $can_x
 * @param integer $can_y
 * @return resource
 */
function scaling_canvas($filename, $can_x, $can_y)
{
	if ($can_x <=0 || $can_y <= 0)
	{
		return false;
	}

	$size = getimagesize($filename);
	if ($size === false)
	{
		return false;
	}
	$old_x = $size[0];
	$old_y = $size[1];
	$type = $size[2];
	$scale = 0;

	$new_x = $can_x;
	$new_y = $can_y;

	if($old_x < $old_y){
		// Xの方が短ければ
		$scale = $can_x / $old_x;
		$new_x = $can_x;
		$new_y = $old_y * $scale;
	}else{
		// Yの方が短ければ
		$scale = $can_y / $old_y;
		$new_y = $can_y;
		$new_x = $old_x * $scale;
	}
	$new_x = round($new_x,0);
	$new_y = round($new_y,0);

	$dst = imagecreatetruecolor($new_x, $new_y);
	$white = imagecolorallocate($dst, 255, 255, 255);
	$black = imagecolorallocate($dst, 0, 0, 0);
	imagefill($dst, 0, 0, $white);
	switch ($type)
	{
		case IMAGETYPE_GIF:
			$src = imagecreatefromgif($filename);
			break;
		case IMAGETYPE_JPEG:
			$src = imagecreatefromjpeg($filename);
			break;
		case IMAGETYPE_JPEG2000:
			$src = imagecreatefromjpeg($filename);
			break;
		case IMAGETYPE_PNG:
			$src = imagecreatefrompng($filename);
			break;
		default:
			return false;
			break;
	}

	$ret = imagecopyresampled($dst, $src, 0, 0, 0, 0, $new_x, $new_y, $old_x, $old_y);
	if ($ret === true)
	{
		imagedestroy($src);
		return $dst;
	}
}

?>
