<?php
	require_once(dirname(__FILE__).'/include/define.php');
	require_once(dirname(__FILE__).'/include/user_function.php');

	if(isset($_REQUEST["f"])){
		$f = $_REQUEST["f"];
	}
	$title = "";
	$keyword = "";
	$description = "";
	switch ($f) {
		case '0':
			$title = "ペット可物件特集";
			$keyword = "ペット可,デザイナーズマンション,デザイナーズ賃貸,名古屋";
			$description = "名古屋でペット可デザイナーズ賃貸を探すなら、roomRroom(ルームRルーム)にお任せください。名古屋で可愛いペットと一緒に暮らせる部屋を特集しております。";
			break;
		case '1':
			$title = "駅近物件特集";
			$keyword = "";
			$description = "";
			break;
		case '2':
			$title = "新築物件特集";
			$keyword = "新築物件,デザイナーズマンション,デザイナーズ賃貸,名古屋";
			$description = "名古屋でデザイナーズ賃貸の新築物件を探すなら、roomRroom(ルームRルーム)にお任せ。早いもの勝ちのキレイな新築物件を特集しております。";
			break;
		case '3':
			$title = "女性にオススメ物件特集";
			$keyword = "女性向け,デザイナーズマンション,デザイナーズ賃貸,名古屋";
			$description = "名古屋の女性向けのデザイナーズマンションを探すなら、roomRroom(ルームRルーム)にお任せください。女性が安心して暮らせる物件を特集しております。";
			break;
		case '4':
			$title = "リノベーション物件特集";
			$keyword = "";
			$description = "";
			break;
		case '5':
			$title = "転勤者向け物件特集";
			$keyword = "";
			$description = "";
			break;
		case '6':
			$title = "キャンペーン";
			$keyword = "";
			$description = "";
			break;
		case '7':
			$title = "高級物件特集";
			$keyword = "高級賃貸,デザイナーズマンション,デザイナーズ賃貸,名古屋";
			$description = "名古屋の高級賃貸を探すなら、roomRroom(ルームRルーム)にお任せください。ワンランク上の上質な高級賃貸物件を特集しております。";
			break;
		default:
			header("Location: ".WEB_ROOT."/");
			die();
			break;
	}

	require_once(dirname(__FILE__).'/get_bukken.php');

	$smarty->assign("pagetitle", str_replace("特集", "", $title)."｜名古屋のデザイナーズマンション【roomRroom】");
	$smarty->assign("meta_description", $description);
	$smarty->assign("meta_keywords", $keyword);
	$smarty->assign("f_title", $title);
	$smarty->assign("f", $f);
	$smarty->assign("location", "feature");
	$smarty->assign("css", "feature.css");
	$smarty->assign("cnf", $CONF);
	/* 物件出力用 */
	$smarty->assign("bukken", $bukken);
	$smarty->assign('cnt_bukken', $cnt_bukken);
	$smarty->assign('page', $page);
	$smarty->assign('p', $p);
	$smarty->assign('url_param', $url_param);
	$smarty->assign('params', $params);
	$smarty->assign('result_text', $result_text);

	$smarty->display("feature.tpl");
