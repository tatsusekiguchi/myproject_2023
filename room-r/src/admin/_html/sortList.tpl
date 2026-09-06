<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.11.0m.js"></script>
<script type="text/javascript" src="js/jquery.upload-1.0.2.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<title>順位付け一覧</title>
<!--{literal}-->
<script type="text/javascript">
$(function(){
	$("#menu_top > li").eq(1).addClass("on");
});
</script>
<!--{/literal}-->
</head>
<body>
<div id="wrapper">
	<!--{include file='menu.tpl'}-->

	<div id="main" class="sd01">
		<div class="inner">
			<h1>表示順位設定</h1>

			<div class="center mb80">
				<!--{* <div class="mt15"><a href="sortEdit.php?sincyaku=1" class="have_effect"><img src="img/order/btn_01.png" alt="「新着物件」の順位を設定する" /></a></div>*}-->
				<div class="mt15"><a href="sortEdit.php?area=1" class="have_effect"><img src="img/order/btn_02.png" alt="「マップから探す」の順位を設定する" /></a></div>
				<div class="mt15"><a href="sortEdit.php?ensen=1" class="have_effect"><img src="img/order/btn_03.png" alt="「沿線から探す」の順位を設定する" /></a></div>
			</div>
<!--{*
			<div id="area_list">
				<div class="mb5 bold" style="color:#7c7c7c;">特集一覧</div>
				<table class="style_l">
					<tr>
						<th class="first" style="width:228px;">特集ID</th>
						<th class="last">特集名</th>
					</tr>
					<!--{section name=b loop=$features}-->
					<!--{assign var=id_c value=`$features[b].feature_id_c`}-->
					<!--{assign var=name_c value=`$features[b].feature_name_c`}-->
					<!--{assign var=comment_c value=`$features[b].feature_comment_c`}-->
					<tr>
						<td class="first">
							<div class="num">
								<div><!--{$id_c}--></div>
								<div class="hidden">
									<ul class="menu_item">
										<li style="margin-right:20px;"><span class="btn_slideup clickable have_effect"><img src="img/btn_slideup.png" alt="閉じる" /></span></li>
										<li><a href="sortEdit.php?fid=<!--{$id_c}-->" class="have_effect"><img src="img/btn_order.png" alt="順位を設定する" /></a></li>
									</ul>
								</div>
							</div>
						</td>
						<td class="last"><!--{$name_c}--></td>
					</tr>
					<!--{/section}-->
				</table>
			</div>
*}-->
			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>


















<!--{*
<div id="header"><h1>順位付け一覧</h1></div>
<div class="clear"></div>
<div id="content">
<div id="menu">
<!--{include file='menu.tpl'}-->
</div>
<div id="main">
<div class="clear">&nbsp;</div>
<h1><a href="sortEdit.php?sincyaku=1" style="font-size: 14pt">トップページ「新着物件」の順位設定</a></h1>
<br />
<h1><a href="sortEdit.php?area=1" style="font-size: 14pt">「エリアから探す」の順位設定</a></h1>
<br />
<h1><a href="sortEdit.php?ensen=1" style="font-size: 14pt">「沿線から探す」の順位設定</a></h1>
<br />
<h1>「特集」の順位設定</h1>
<table border="1" style="width:500px; text-align: center;">
<tr>
    <th>特集ID</th>
    <th>特集名</th>
	<th>編集</th>
</tr>
<!--{section name=b loop=$features}-->
<!--{assign var=id_c value=`$features[b].feature_id_c`}-->
<!--{assign var=name_c value=`$features[b].feature_name_c`}-->
<!--{assign var=comment_c value=`$features[b].feature_comment_c`}-->
<tr class="ASC">
<td><!--{$id_c}--></td>
<td><!--{$name_c}--></td>
<td><a href="sortEdit.php?fid=<!--{$id_c}-->">編集</a></td>
</tr>
<!--{/section}-->
</table>
</div>
<div class="clear"></div>
</div>
<div class="clear">&nbsp;</div>
</body>
</html>
*}-->
