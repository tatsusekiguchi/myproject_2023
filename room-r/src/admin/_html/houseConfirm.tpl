


使いません!



<?xml version="1.0" encoding="utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.11.0m.js"></script>
<script type="text/javascript" src="js/jquery.upload-1.0.2.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/houseEdit.js"></script>
<title><!--{if $hid > 0}--><!--{$building.building_name_c|escape}-->部屋編集<!--{else}--><!--{$building.building_name_c|escape}-->部屋新規登録<!--{/if}--></title>
<script type="text/javascript">
$(function(){
	$(".box_fileup .clickable").on('click', function(){
		$(this).next('.hidden').find('input[type="file"]').click();
	});

	$('.box_fileup input[type="file"]').on('change', function(){
		var updated_file_path = $(this).val();
		var garbage = updated_file_path.split('\\');
		var updated_file = garbage[garbage.length-1];
		$(this).parents('.hidden').prev('.clickable').after('<div>'+updated_file+'</div>');
	});
});
</script>
</head>
<body>
<div id="wrapper">
	<!--{include file='menu.tpl'}-->

	<div id="main" class="sd01">
		<div class="inner">
			<h1><!--{if $hid > 0}--><!--{$building.building_name_c|escape}-->部屋編集<!--{else}--><!--{$building.building_name_c|escape}-->お部屋の新規追加<!--{/if}--></h1>

			<div id="area_building_edit">
				<div class="right small mb5"><span style="color:#ae151d;">※</span>は必須項目です</div>
				<form<!--{$form.attributes}-->>
				<input type="hidden" name="mode" value="edit" />
				<!--{if !empty($bid)}--><input type="hidden" name="bid" value="<!--{$bid}-->" /><!--{/if}-->
				<!--{if !empty($hid)}--><input type="hidden" name="hid" value="<!--{$hid}-->" /><!--{/if}-->

				<h2 class="h2a">お部屋情報</h2>
				<table class="style_e">
					<tr>
						<th class="required">建物名</th>
						<td>
							<!--{$building.building_name_c|escape}-->
						</td>
					</tr>
					<tr>
						<th class="required">タイプ名<span class="red">※</span></th>
						<td>
							<!--{$form.house_no_c.html}--><!--{$form.house_no_c.error}-->
						</td>
					</tr>
					<tr>
						<th class="required">公開状況<span class="red">※</span></th>
						<td>
							<!--{$form.statusGrp.html}--><!--{$form.statusGrp.error}-->
						</td>
					</tr>
					<tr>
						<th class="required">間取り<span class="red">※</span></th>
						<td>
							<!--{$form.layoutGrp.html}--><br /><!--{$form.layoutGrp.error}-->
						</td>
					</tr>
					<tr>
						<th class="required">階数<span class="red">※</span></th>
						<td>
							<!--{$form.floor_c.html}--> 階<!--{$form.floor_c.error}-->
						</td>
					</tr>
					<tr>
						<th class="required">面積<span class="red">※</span></th>
						<td>
							<!--{$form.space_c.html}--> m<sup style="vertical-align:top;">2</sup><!--{$form.space_c.error}-->
						</td>
					</tr>
					<tr>
						<th class="required">部屋向き<span class="red">※</span></th>
						<td>
							<!--{$form.direction_c.html}--><!--{$form.direction_c.error}-->
						</td>
					</tr>
				</table>

				<h2 class="h2a">賃 料</h2>
				<table class="style_e">
					<tr>
						<th class="required">賃料<span class="red">※</span></th>
						<td>
							<!--{$form.rental_price_c.html}--> 円<!--{$form.rental_price_c.error}-->
							　料金 <!--{$form.tax_rental_price_c.html}--> 円<!--{$form.tax_rental_price_c.error}-->
						</td>
					</tr>
					<tr>
						<th>管理費／共益費</th>
						<td>
							<!--{$form.divide_money_01_c.html}--><!--{$form.divide_money_01_c.error}--><br />
							<!--{$form.money_01_c.html}--> 円<!--{$form.money_01_c.error}-->
							　料金 <!--{$form.tax_money_01_c.html}--> 円<!--{$form.tax_money_01_c.error}-->
						</td>
					</tr>
					<tr>
						<th>敷金／保証金</th>
						<td>
							<!--{$form.divide_money_02_c.html}--><!--{$form.divide_money_02_c.error}--><br />
							<!--{$form.money_02_c.html}--> 円<!--{$form.money_02_c.error}-->　　
							<!--{$form.money_02_month_c.html}--> ヶ月<!--{$form.money_02_month_c.error}-->
						</td>
					</tr>
					<tr>
						<th>償却／敷引／<br />解約引</th>
						<td>
							<!--{$form.divide_money_03_c.html}--><!--{$form.divide_money_03_c.error}--><br />
							<!--{$form.money_03_c.html}--> 円<!--{$form.money_03_c.error}-->　　
							<!--{$form.money_03_month_c.html}--> ヶ月<!--{$form.money_03_month_c.error}-->　　
							<!--{$form.money_03_rate_c.html}--> %<!--{$form.money_03_rate_c.error}-->
						</td>
					</tr>
					<tr>
						<th>礼金／権利金</th>
						<td>
							<!--{$form.divide_money_04_c.html}--><!--{$form.divide_money_04_c.error}--><br />
							<!--{$form.money_04_c.html}--> 円<!--{$form.money_04_c.error}-->　　
							<!--{$form.money_04_month_c.html}--> ヶ月<!--{$form.money_04_month_c.error}-->
							　料金 <!--{$form.tax_money_04_c.html}--> 円<!--{$form.tax_money_04_c.error}-->
						</td>
					</tr>
					<tr>
						<th>更新料</th>
						<td>
							<!--{$form.money_05_c.html}--> 円<!--{$form.money_05_c.error}-->
							　料金 <!--{$form.tax_money_05_c.html}--> 円<!--{$form.tax_money_05_c.error}-->
						</td>
					</tr>
					<tr>
						<th>月額・初期費用</th>
						<td>
							項目名 <!--{$form.money_06_name_c.html}--><!--{$form.money_06_name_c.error}-->　　
							<!--{$form.money_06_c.html}--> 円<!--{$form.money_06_c.error}-->
							　料金 <!--{$form.tax_money_06_c.html}--> 円<!--{$form.tax_money_06_c.error}-->
						</td>
					</tr>
				</table>

				<h2 class="h2a">設 備</h2>
				<table class="style_e">
					<tr>
						<th>お部屋設備</th>
						<td>
							<!--{$form.EquipmentGrp.html}--><!--{$form.EquipmentGrp.error}-->
						</td>
					</tr>
					<tr>
						<th>備考</th>
						<td>
							<!--{$form.other_c.html}--><!--{$form.other_c.error}-->
						</td>
					</tr>
				</table>

				<h2 class="h2a">駐車場</h2>
				<table class="style_e">
					<tr>
						<th class="required">駐車場<span class="red">※</span></th>
						<td>
							<!--{$form.parking_c.html}--><!--{$form.parking_c.error}-->
						</td>
					</tr>
					<tr>
						<th>駐車場タイプ</th>
						<td>
							<!--{$form.parking_type_c.html}--><!--{$form.parking_type_c.error}-->
						</td>
					</tr>
					<tr>
						<th>駐車場料金</th>
						<td>
							<!--{$form.parking_charge_c.html}--> 円<!--{$form.parking_charge_c.error}-->
							　料金 <!--{$form.tax_parking_charge_c.html}--> 円<!--{$form.tax_parking_charge_c.error}-->
						</td>
					</tr>
				</table>

				<h2 class="h2a">画 像</h2>
				<table class="style_e">
					<tr>
						<th class="required">間取り図<span class="red">※</span></th>
						<td>
							<div class="box_fileup">
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span>
									<div class="hidden"><input name="name_r_photo0_c" type="file" /></div>
									<!--{if true == $smarty.section.hoge.first && $r_photo0_err != ''}--><div><!--{$r_photo0_err}--></div><!--{/if}-->
								</div>
								<div class="column1-4">
									<div>横380×縦480px</div>
									<!--{if $photo.r_photo0_c != ''}-->
										<br /><span class="confirm0"><a href="showImage.php?dir=uploads&file=<!--{$photo.r_photo0_c}-->&bg=FFF" target="_blank"><img src="../uploads/<!--{$photo.r_photo0_c}-->" style="width: 100px;" /></a></span><br />
										<!--{$form.chk_r_photo0_c.html}-->
										<br /><span><input type="button" class="del_photo" id="<!--{$id}-->" value="今すぐ削除" /></span>
									<!--{/if}-->
								</div>
							</div>
						</td>
					</tr>
					<!--{section name=hoge loop=7 start=1}-->
					<!--{strip}-->
					<!--{assign var=s value=`$smarty.section.hoge.index+20`}-->
					<!--{assign var=colname value="r_photo`$smarty.section.hoge.index`_c"}-->
					<!--{assign var=s_colname value="r_photo`$s`_c"}-->
					<!--{assign var=chk value="chk_`$colname`"}-->
					<!--{assign var=s_chk value="chk_`$s_colname`"}-->
					<tr>
						<th class="<!--{if true == $smarty.section.hoge.first}-->required<!--{/if}-->">内観<!--{$smarty.section.hoge.index}--><!--{if true == $smarty.section.hoge.first}--><span class="red">※</span><!--{/if}--></th>
						<td>
							<div class="box_fileup">
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span>
									<div class="hidden"><input name="name_r_photo<!--{$smarty.section.hoge.index}-->_c" type="file" /></div>
									<!--{if true == $smarty.section.hoge.first && $b_photo1_err != ''}--><div><!--{$b_photo1_err}--></div><!--{/if}-->
								</div>
								<div class="column1-4">
									<div>横320×縦230px</div>
									<!--{if $photo.$colname != ''}-->
										<br /><span><a href="showImage.php?dir=uploads&file=<!--{$photo.$colname}-->&bg=FFF" target="_blank"><img src="../uploads/<!--{$photo.$colname}-->" style="width: 100px;" /></a></span><br />
										<!--{$form.$chk.html}-->
										<br /><span><input type="button" class="del_photo" id="<!--{$id}-->" value="今すぐ削除" /></span>
									<!--{/if}-->
								</div>
							</div>
						</td>
					</tr>
					<!--{/strip}-->
					<!--{/section}-->
				</table>

				<div class="center mt30">
					<input type="image" name="back" src="img/btn_mod.png" alt="修正する" class="have_effect" />　
					<input type="image" name="send" src="img/btn_regist.png" alt="登録する" class="have_effect" />
				</div>
				</form>
			</div>

			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>












<!--{*
<?xml version="1.0" encoding="utf-8" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<title><!--{if $hid > 0}--><!--{$building.building_name_c|escape}-->部屋編集<!--{else}--><!--{$building.building_name_c|escape}-->部屋新規登録<!--{/if}--></title>
</head>
<body>
<div id="content">
<div id="menu">
<!--{include file='menu.tpl'}-->
</div>
<div id="main">
<form <!--{$form.attributes}-->>
<!--{$form.hidden}-->
<input type="hidden" name="mode" value="edit" />
<table border="1">
<thead><!--{if $hid > 0}--><!--{$building.building_name_c|escape}-->部屋編集<!--{else}--><!--{$building.building_name_c|escape}-->部屋新規登録<!--{/if}--></thead>
<tr>
	<th class="normal">建物名</th>
	<td class="normal"><!--{$building.building_name_c|escape}--></td>
</tr>
<tr>
	<th class="required">タイプ名<span class="error">※</span></th>
	<td class="normal"><!--{$form.house_no_c.html}--><!--{$form.house_no_c.error}--></td>
</tr>
<tr>
	<th class="required">表示順<span class="error">※</span></th>
	<td class="normal"><!--{$form.sort_c.html}--><!--{$form.sort_c.error}--></td>
</tr>
<tr>
	<th class="required">状態<span class="error">※</span></th>
	<td class="normal"><!--{$form.statusGrp.html}--><!--{$form.statusGrp.error}--></td>
</tr>
<tr>
	<th class="required">賃料<span class="error">※</span></th>
	<td class="normal"><!--{$form.rental_price_c.html}-->円<!--{$form.more_price_flg_c.html}--></td>
</tr>
<tr>
	<th class="required">共益費<span class="error">※</span></th>
	<td class="normal"><!--{$form.common_price_c.html}-->円<!--{$form.more_common_flg_c.html}--></td>
</tr>
<tr>
	<th class="required">損害保険<span class="error">※</span></th>
	<td class="normal"><!--{$form.insurance_price_c.html}--></td>
</tr>
<tr>
	<th class="normal">他費用</th>
	<td class="normal"><!--{$form.other_price_c.html}--><!--{$form.other_price_c.error}--></td>
</tr>
<tr>
	<th class="required">間取り<span class="error">※</span></th>
	<td class="normal">
		<!--{$form.layoutGrp.html}--><br />
		＋<!--{$form.layout_option_c.html}-->
		<!--{$form.layoutGrp.error}-->
	</td>
</tr>
<tr>
	<th class="required">面積<span class="error">※</span></th>
	<td class="normal"><!--{$form.space_c.html}-->m<sup style="vertical-align:top;">2</sup><!--{$form.space_c.error}--></td>
</tr>
<tr>
	<th class="required">部屋向き<span class="error">※</span></th>
	<td class="normal"><!--{$form.direction_c.html}--><!--{$form.direction_c.error}--></td>
</tr>
<tr>
	<th class="normal">備考</th>
	<td class="normal"><!--{$form.other_c.html}--><!--{$form.other_c.error}--></td>
</tr>
<tr>
	<th class="normal">設備</th>
	<td class="normal"><a href="#"></a><!--{$form.EquipmentGrp.html}--><!--{$form.EquipmentGrp.error}--></td>
</tr>
<tr>
	<th class="required">間取り図<span class="error">※</span></th>
	<td class="normal">
		<div id ="text_r_photo0_c">
			<!--{if $photo.r_photo0_c != ''}-->
			<img src="../uploads/<!--{$photo.r_photo0_c}-->" />
			<!--{/if}-->
			<!--{$form.chk_r_photo0_c.html}-->
		</div>
	</td>
</tr>
<!--{section name=hoge loop=9 start=1}-->
<!--{strip}-->
<!--{assign var=s value=`$smarty.section.hoge.index+20`}-->
<!--{assign var=colname value="r_photo`$smarty.section.hoge.index`_c"}-->
<!--{assign var=s_colname value="r_photo`$s`_c"}-->
<!--{assign var=chk value="chk_`$colname`"}-->
<!--{assign var=s_chk value="chk_`$s_colname`"}-->
<tr>
	<th class="<!--{if true == $smarty.section.hoge.first}-->required<!--{else}-->normal<!--{/if}-->">内装画像<!--{$smarty.section.hoge.index}--><!--{if true == $smarty.section.hoge.first}--><span class="error">※</span><!--{/if}--></th>
	<td class="normal">
		<div class="left admin_img">縮小画像<br />
			<div id ="text_r_photo<!--{$s}-->_c" style="width: 103px; height:75px; background: url(../uploads/<!--{$photo.$s_colname}-->) center;"><!--{if $photo.$s_colname != ''}--><!--<img src="../uploads/<!--{$photo.$s_colname}-->" />--><!--{/if}--><!--{$form.$s_chk.html}--></div>
		</div>
		<div class="left admin_img">拡大画像<br />
			<div id ="text_r_photo<!--{$smarty.section.hoge.index}-->_c"><!--{if $photo.$colname != ''}--><img src="../uploads/<!--{$photo.$colname}-->" /><!--{/if}--><!--{$form.$chk.html}--></div>
		</div>
	</td>
</tr>
<!--{/strip}-->
<!--{/section}-->
</table>
<input type="submit" name="back" value="戻る" /><input type="submit" name="send" value="登録" />
</form>
</div>
<div class="clear"></div>
</div>
<div class="clear">&nbsp;</div>
</body>
</html>
*}-->
