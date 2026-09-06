<?php
	require_once(dirname(__FILE__).'/../common/php/init.php');

	error_reporting(E_ERROR | E_WARNING | E_PARSE);// PC版でNoticeが出るため
	list($bukken, $cnt_bukken, $params, $url_param, $result_text) = $PC->get_bukken();
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
		<div class="lh100 mt15 tac"><img src="img/i_01.png" alt="" height="16" /></div>
		<h2 class="fz20 lts3 mt5 tac color-red01">条件検索</h2>
		<div class="h-01 fz15 lts0 mt10">ご希望の条件を選択してください</div>
<?php echo_search_table($PC, $params); ?>
	</div><!-- #main -->

<?php include_template_part("footer"); ?>
</div><!-- #wrapper -->
</body>
</html>
