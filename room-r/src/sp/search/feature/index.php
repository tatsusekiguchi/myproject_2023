<?php
	require_once(dirname(__FILE__).'/../../common/php/init.php');

	define("NUM_IN_A_PAGE", 10);// ページあたりの表示件数

	$f = ( isset($_REQUEST["f"]) ) ? strval($_REQUEST["f"]) : "";
	$f_titles = array(
		'0' => "ペット可物件特集",
		// '1' => "駅近物件特集",
		'2' => "新築物件特集",
		'3' => "女性にオススメ物件特集",
		// '4' => "リノベーション物件特集",
		// '5' => "転勤者向け物件特集",
		// '6' => "キャンペーン",
		'7' => "高級物件特集"
	);
	$f_keyword = array(
		'0' => "ペット可,デザイナーズマンション,デザイナーズ賃貸,名古屋",
		// '1' => "",
		'2' => "新築物件,デザイナーズマンション,デザイナーズ賃貸,名古屋",
		'3' => "女性向け,デザイナーズマンション,デザイナーズ賃貸,名古屋",
		// '4' => "",
		// '5' => "",
		// '6' => "",
		'7' => "高級賃貸,デザイナーズマンション,デザイナーズ賃貸,名古屋"
	);
	$f_description = array(
		'0' => "名古屋でペット可デザイナーズ賃貸を探すなら、roomRroom(ルームRルーム)にお任せください。名古屋で可愛いペットと一緒に暮らせる部屋を特集しております。",
		// '1' => "",
		'2' => "名古屋でデザイナーズ賃貸の新築物件を探すなら、roomRroom(ルームRルーム)にお任せ。早いもの勝ちのキレイな新築物件を特集しております。",
		'3' => "名古屋の女性向けのデザイナーズマンションを探すなら、roomRroom(ルームRルーム)にお任せください。女性が安心して暮らせる物件を特集しております。",
		// '4' => "",
		// '5' => "",
		// '6' => "",
		'7' => "名古屋の高級賃貸を探すなら、roomRroom(ルームRルーム)にお任せください。ワンランク上の上質な高級賃貸物件を特集しております。"
	);
	if( empty($f_titles[$f]) ){
		header("Location: ".HU."/");
		exit;
	}

	error_reporting(E_ERROR | E_WARNING | E_PARSE);// PC版でNoticeが出るため
	list($bukken, $cnt_bukken, $params, $url_param, $result_text) = $PC->get_bukken();

	$page = 1;
	if( !empty($_GET["page"]) && is_numeric($_GET["page"]) ){
		$page = intval($_GET["page"]);
		if( $page > ceil($cnt_bukken / NUM_IN_A_PAGE) ) $page = 1;
	}
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title><?php echo h(str_replace("特集", "", $f_titles[$f])); ?>｜名古屋のデザイナーズマンション【roomRroom】</title>
<meta name="description" content="名古屋でデザイナーズ賃貸を探すならroomRroom（ルームRルーム）。<?php echo h($f_titles[$f]); ?>のページです。" />
<meta name="keywords" content="<?php echo h($f_titles[$f]); ?>,roomRroom,ルームRルーム,ルームアールルーム,賃貸,デザイナーズ,ペット可,新築" />
<?php include_template_part("common_head"); ?>
<link rel="stylesheet" href="css/local.css" />
<script src="js/local.js"></script>
<?php include_template_part("additional_head"); ?>
</head>
<body>
<div id="wrapper">
<?php include_template_part("header"); ?>

	<div id="main">
		<div class="lh100 mt15 tac"><img src="img/i_01.png" alt="こだわりの特集物件" height="25" /></div>
		<h2 class="fz15 lts1 mt5 tac color-red01 mrl10"><?php echo h($f_titles[$f]); ?></h2>

		<div class="lcl-f"><img src="img/f<?php echo intval($f); ?>.jpg" alt="" class="lcl-f__img" /></div>

		<div class="lcl-result">
			<div><?php echo number_format($cnt_bukken); ?>件の物件が見つかりました</div>
			<div class="lcl-result-displaying"><?php echo number_format(($page - 1) * NUM_IN_A_PAGE + 1); ?>〜<?php echo number_format(($page - 1) * NUM_IN_A_PAGE + count($bukken)); ?>件表示中</div>
		</div>
		<div class="lcl-page-nav mrl10 ovh">
<?php if( $page - 1 > 0 ): ?>
			<div class="fll"><a class="lcl-page-nav__prev" href="./?page=<?php echo $page - 1; ?><?php echo $url_param; ?>">前へ</a></div>
<?php endif; ?>
<?php if( $page < ceil($cnt_bukken / NUM_IN_A_PAGE) ): ?>
			<div class="flr"><a class="lcl-page-nav__next" href="./?page=<?php echo $page + 1; ?><?php echo $url_param; ?>">次へ</a></div>
<?php endif; ?>
		</div><!-- .lcl-page-nav -->
<?php echo_list_articles($PC, $bukken); ?>
		<div class="lcl-page-nav mrl10 ovh">
<?php if( $page - 1 > 0 ): ?>
			<div class="fll"><a class="lcl-page-nav__prev" href="./?page=<?php echo $page - 1; ?><?php echo $url_param; ?>">前へ</a></div>
<?php endif; ?>
<?php if( $page < ceil($cnt_bukken / NUM_IN_A_PAGE) ): ?>
			<div class="flr"><a class="lcl-page-nav__next" href="./?page=<?php echo $page + 1; ?><?php echo $url_param; ?>">次へ</a></div>
<?php endif; ?>
		</div><!-- .lcl-page-nav -->
	</div><!-- #main -->

<?php include_template_part("footer"); ?>
</div><!-- #wrapper -->
</body>
</html>
