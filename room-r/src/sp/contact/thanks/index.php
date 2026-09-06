<?php
	require_once(dirname(__FILE__).'/../../common/php/init.php');

	if( !session_id() ) session_start();
	if( empty($_SESSION['roomrroom_sp_contact_done']) ){
		header("Location: ".HU."/");
		exit;
	}
	unset($_SESSION['roomrroom_sp_contact_done']);
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<base href="../" />
<title>お問合せ | <?php echo SITE_NAME; ?></title>
<meta name="description" content="名古屋でデザイナーズ賃貸を探すならroomRroom（ルームRルーム）。お問合せはこちら。" />
<meta name="keywords" content="お問合せ,roomRroom,ルームRルーム,ルームアールルーム,賃貸,デザイナーズ,ペット可,新築" />
<?php include_template_part("common_head"); ?>
<link rel="stylesheet" href="css/local.css" />
<script src="js/local.js"></script>
<?php include_template_part("additional_head"); ?>
</head>
<body>
<div id="wrapper">
<?php include_template_part("header"); ?>

	<div id="main">
		<div class="lh100 mt15 tac"><img src="img/i_01.png" alt="" height="13" /></div>
		<h2 class="fz20 lts3 mt5 tac color-red01">お問合せ</h2>
		<div class="mrl15">
			<p>お問い合わせいただき、ありがとうございます。<br />メールの送信に成功しました。</p>
			<p class="mt10 fz12"><a href="<?php echo HU; ?>/" class="tdu">トップページへ戻る</a></p>
		</div>
	</div><!-- #main -->

<?php include_template_part("footer"); ?>
</div><!-- #wrapper -->
<!-- ▼YAHOO!SS Conversion▼ -->
<!-- Yahoo Code for your Conversion Page -->
<script type="text/javascript">
    /* <![CDATA[ */
    var yahoo_conversion_id = 1000272478;
    var yahoo_conversion_label = "mq2-CPWK_GIQzuCNvgM";
    var yahoo_conversion_value = 0;
    /* ]]> */
</script>
<script type="text/javascript" src="//s.yimg.jp/images/listing/tool/cv/conversion.js">
</script>
<noscript>
    <div style="display:inline;">
        <img height="1" width="1" style="border-style:none;" alt="" src="//b91.yahoo.co.jp/pagead/conversion/1000272478/?value=0&label=mq2-CPWK_GIQzuCNvgM&guid=ON&script=0&disvt=true"/>
    </div>
</noscript>

<!-- ▼YAHOO!DN Conversion▼ -->
<script type="text/javascript" language="javascript">
  /* <![CDATA[ */
  var yahoo_ydn_conv_io = "xVE6djIOLDVtB..20xOq";
  var yahoo_ydn_conv_label = "86I7V1BKXOGQBI0GQP8119336";
  var yahoo_ydn_conv_transaction_id = "";
  var yahoo_ydn_conv_amount = "0";
  /* ]]> */
</script>
<script type="text/javascript" language="javascript" charset="UTF-8" src="//b90.yahoo.co.jp/conv.js"></script>

<!-- ▼Google Conversion▼ -->
<!-- Google Code for &#12362;&#21839;&#12356;&#21512;&#12431;&#12379; Conversion Page -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 938392328;
var google_conversion_language = "en";
var google_conversion_format = "3";
var google_conversion_color = "ffffff";
var google_conversion_label = "QTaRCPyXhmMQiPa6vwM";
var google_remarketing_only = false;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//www.googleadservices.com/pagead/conversion/938392328/?label=QTaRCPyXhmMQiPa6vwM&amp;guid=ON&amp;script=0"/>
</div>
</noscript>


</body>
</html>
