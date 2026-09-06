<?php
	require_once(dirname(__FILE__).'/../../common/php/init.php');

	define("NUM_IN_A_PAGE", 10);// ページあたりの表示件数

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
<title>条件検索｜名古屋のデザイナーズマンション【roomRroom】</title>
<meta name="description" content="理想の条件から名古屋のデザイナーズマンションの賃貸物件を検索しよう！家賃5万円～、1R・1K～3LDK以上まで、おしゃれなくデザイナーズマンションを幅広くご紹介中。" />
<meta name="keywords" content="名古屋,デザイナーズマンション,デザイナーズ賃貸,物件検索" />
<?php include_template_part("common_head"); ?>
<link rel="stylesheet" href="css/local.css" />
<script src="js/local.js"></script>
<?php include_template_part("additional_head"); ?>
</head>
<body>
<div id="wrapper">
<?php include_template_part("header"); ?>

	<div id="main">
		<div class="lh100 mt15 tac"><img src="img/i_01.png" alt="検索結果" height="25" /></div>
		<h2 class="fz15 lts1 mt5 tac color-red01 mrl10"><?php
			if( !empty($result_text) ){
				$out_array = array();
				foreach($result_text as $k => $v){
					$out_array[] = '<div class="dib">'.h($v).'</div>';
				}
				echo implode("／", $out_array);
			}else{
				echo "すべて表示";
			}
		?></h2>
		<div class="mt10"><a href="javascript:void(0);" class="lcl-js-open-conditions lcl-btn-01">条件をつけて絞り込む</a></div>
		<div class="lcl-conditions lcl-js-conditions dn">
<?php echo_search_table($PC, $params); ?>
		</div>
		<div class="lcl-result">
        <div style="margin-bottom:15px; background: linear-gradient(transparent 60%, #ff0 0%); font-size:16px; width:24em; font-weight:bold;">roomRroom取り扱い総物件数 521棟1825タイプ</div>
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
