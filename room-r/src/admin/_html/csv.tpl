<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="css/csv.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.11.0m.js"></script>
<script type="text/javascript" src="js/jquery.upload-1.0.2.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<title>CSV</title>
<!--{literal}-->
<script type="text/javascript">
$(function(){
	$("#menu_top > li").eq(2).addClass("on");
});
</script>
<!--{/literal}-->
</head>
<body>
<div id="wrapper">
	<!--{include file='menu.tpl'}-->

	<div id="main" class="sd01">
		<div class="inner">
			<form action="csv.php" method="post" enctype="multipart/form-data">
			<h1>CSV登録</h1>
			<h2>物件CSV</h2>
			<!--{if !empty($errorMsgBuilding)}-->
			<div class="error">
				<div class="error_inner">
				<!--{foreach from=$errorMsgBuilding item=v}-->
				<p><!--{$v}--></p>
				<!--{/foreach}-->
				</div>
			</div>
			<!--{/if}-->
			<!--{if !empty($resultMsgBuilding)}-->
			<div class="result">
				<!--{$resultMsgBuilding}-->
			</div>
			<!--{/if}-->
			<input type="file" name="building" class="fileupload" />
			<hr style="margin-top:25px;" />
			<h2 style="margin-top: 25px;">部屋CSV</h2>
			<!--{if !empty($errorMsgRoom)}-->
			<div class="error">
				<div class="error_inner">
				<!--{foreach from=$errorMsgRoom item=v}-->
				<p><!--{$v}--></p>
				<!--{/foreach}-->
				</div>
			</div>
			<!--{/if}-->
			<!--{if !empty($resultMsgRoom)}-->
			<div class="result">
				<!--{$resultMsgRoom}-->
			</div>
			<!--{/if}-->
			<input type="file" name="room" class="fileupload" />
			<div class="btn_submit">
				<input type="submit" value="登録" />
			</div>
			<input type="hidden" value="1" name="register" />
			</form>
			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>