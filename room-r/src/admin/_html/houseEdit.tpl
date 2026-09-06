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
		$(this).nextAll('.hidden').find('input[type="file"]').click();
	});

	$('.box_fileup input[type="file"]').on('change', function(){
		var updated_file_path = $(this).val();
		var garbage = updated_file_path.split('\\');
		var updated_file = garbage[garbage.length-1];
		$(this).parents('.hidden').prevAll('.updated_filename').remove();
		$(this).parents('.hidden').prevAll('.clickable').after('<div class="updated_filename">'+updated_file+'</div>');
	});

	// imemode
	$("input").each(function(){
		style = String($(this).attr("style"));
		if(style.indexOf("ime-mode: disabled") != -1 || style.indexOf("ime-mode:disabled") != -1){
			// 適用
			txt  = $(this).val();
			han = txt.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){return String.fromCharCode(s.charCodeAt(0)-0xFEE0)});
			han = han.replace(/[^A-Za-z0-9\\\*\+\.\?\{\}\(\)\[\]\^\$\-\|\/]/g,'');
			if($(this).attr("maxlength") >= 1){
				if(han.length > parseInt($(this).attr("maxlength"))){
					han = han.substr(0,parseInt($(this).attr("maxlength")));
				}
			}
			$(this).val(han);

			$(this).bind("keyup",function(){
				txt  = $(this).val();
				han = txt.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){return String.fromCharCode(s.charCodeAt(0)-0xFEE0)});
				han = han.replace(/[^A-Za-z0-9\\\*\+\.\?\{\}\(\)\[\]\^\$\-\|\/]/g,'');
				if($(this).attr("maxlength") >= 1){
					if(han.length > parseInt($(this).attr("maxlength"))){
						han = han.substr(0,parseInt($(this).attr("maxlength")));
					}
				}
				if(han !== txt){
					$(this).val(han);
				}
			});
		}
	})
});
</script>
<style type="text/css">
<!--{if $form_state == 2}-->
#main .ifs{
	display: none;
}
<!--{/if}-->
</style>
</head>
<body>
<div id="wrapper">
	<!--{include file='menu.tpl'}-->

	<div id="main" class="sd01">
		<div class="inner">
			<h1><!--{if $hid > 0}--><!--{$building.building_name_c|escape}-->部屋編集<!--{else}--><!--{$building.building_name_c|escape}-->お部屋の新規追加<!--{/if}--></h1>

			<!--{if !empty($result) && is_array($result)}--><div class="result<!--{if $result.res}--> done<!--{else}--> error<!--{/if}-->"><!--{$result.mes}--></div><!--{/if}-->

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
							タイプ <!--{$form.house_no_c.html}--><!--{$form.house_no_c.error}-->
							<span class="pad">&nbsp;&nbsp;</span>
							号室 <!--{$form.house_no_note_c.html}--><!--{$form.house_no_note_c.error}-->
						</td>
					</tr>
						<th class="required">表示順</th>
						<td>
							<!--{$form.sort_c.html}--><!--{$form.sort_c.error}-->
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
						<th class="required">面積<span class="red">※</span></th>
						<td>
							<!--{$form.space_c.html}--> m<sup style="vertical-align:top;">2</sup><!--{$form.space_c.error}-->
						</td>
					</tr>
					<tr>
						<th>部屋向き</th>
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
							<span class="tax_excluded"><!--{$form.rental_price_c.html}--></span> 円〜<!--{$form.rental_price_c.error}-->
						</td>
					</tr>
					<tr>
						<th>共益費</th>
						<td class="tax_scope">
							<span class="tax_excluded"><!--{$form.money_01_c.html}--></span> 円<!--{$form.money_01_c.error}-->
						</td>
					</tr>
					<tr>
						<th>敷金／保証金</th>
						<td>
							<!--{$form.divide_money_02_c.html}--><!--{$form.divide_money_02_c.error}--><br />
							<!--{$form.money_02_c.html}--><!--{$form.money_02_c.error}-->　　
							<!--{$form.money_02_type_c.html}--><!--{$form.money_02_type_c.error}-->
						</td>
					</tr>
					<tr>
						<th>償却／敷引／<br />解約引</th>
						<td>
							<!--{$form.divide_money_03_c.html}--><!--{$form.divide_money_03_c.error}--><br />
							<!--{$form.money_03_c.html}--><!--{$form.money_03_c.error}-->　　
							<!--{$form.money_03_type_c.html}--><!--{$form.money_03_type_c.error}-->
						</td>
					</tr>
					<tr>
						<th>礼金／権利金</th>
						<td>
							<!--{$form.divide_money_04_c.html}--><!--{$form.divide_money_04_c.error}--><br />
							<!--{$form.money_04_c.html}--><!--{$form.money_04_c.error}-->　　
							<!--{$form.money_04_type_c.html}--><!--{$form.money_04_type_c.error}-->
						</td>
					</tr>
					<tr>
						<th>更新料</th>
						<td>
							<div class="tax_scope">
								<span class="tax_excluded"><!--{$form.money_05_c.html}--></span> 円<!--{$form.money_05_c.error}-->
							</div>
							<div class="tax_scope mt5">
								更新事務手数料 <span class="tax_excluded"><!--{$form.money_05_zimu_c.html}--></span> 円<!--{$form.money_05_zimu_c.error}-->
							</div>
						</td>
					</tr>
					<tr>
						<th>雑費</th>
						<td style="padding:0;">
							<table style="width:100%;">
								<tr>
									<th rowspan="2" style="width:100px;">初期費用</th>
									<td class="tax_scope" style="border-right:none;">
										<!--{$form.zappi_01_required_c.html}--><!--{$form.zappi_01_required_c.error}-->
										<!--{$form.zappi_01_name_c.html}--><!--{$form.zappi_01_name_c.error}-->
										<span class="tax_excluded"><!--{$form.zappi_01_amount_c.html}--></span> 円<!--{$form.zappi_01_amount_c.error}-->
										<!--{$form.zappi_01_amount_taxin_c.html}--><!--{$form.zappi_01_amount_taxin_c.error}-->
									</td>
								</tr>
								<tr>
									<td class="tax_scope" style="border-right:none;">
										<!--{$form.zappi_02_required_c.html}--><!--{$form.zappi_02_required_c.error}-->
										<!--{$form.zappi_02_name_c.html}--><!--{$form.zappi_02_name_c.error}-->
										<span class="tax_excluded"><!--{$form.zappi_02_amount_c.html}--></span> 円<!--{$form.zappi_02_amount_c.error}-->
										<!--{$form.zappi_02_amount_taxin_c.html}--><!--{$form.zappi_02_amount_taxin_c.error}-->
									</td>
								</tr>
								<tr>
									<th rowspan="2" style="width:100px;border-bottom:none;">月額費用</th>
									<td class="tax_scope" style="border-right:none;">
										<!--{$form.zappi_11_required_c.html}--><!--{$form.zappi_11_required_c.error}-->
										<!--{$form.zappi_11_name_c.html}--><!--{$form.zappi_11_name_c.error}-->
										<span class="tax_excluded"><!--{$form.zappi_11_amount_c.html}--></span> 円<!--{$form.zappi_11_amount_c.error}-->
										<!--{$form.zappi_11_amount_taxin_c.html}--><!--{$form.zappi_11_amount_taxin_c.error}-->
									</td>
								</tr>
								<tr>
									<td class="tax_scope" style="border-right:none;">
										<!--{$form.zappi_12_required_c.html}--><!--{$form.zappi_12_required_c.error}-->
										<!--{$form.zappi_12_name_c.html}--><!--{$form.zappi_12_name_c.error}-->
										<span class="tax_excluded"><!--{$form.zappi_12_amount_c.html}--></span> 円<!--{$form.zappi_12_amount_c.error}-->
										<!--{$form.zappi_12_amount_taxin_c.html}--><!--{$form.zappi_12_amount_taxin_c.error}-->
									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th>町費</th>
						<td>
							<!--{$form.chouhi_type_c.html}--><!--{$form.chouhi_type_c.error}-->
							　<!--{$form.chouhi_c.html}--><!--{$form.chouhi_c.error}-->
							　<!--{$form.tax_chouhi_c.html}--><!--{$form.tax_chouhi_c.error}-->
						</td>
					</tr>
				</table>

				<h2 class="h2a">設 備</h2>
				<table class="style_e">
					<!--{*
					<tr>
						<th>お部屋設備</th>
						<td>
							<!--{$form.EquipmentGrp.html}--><!--{$form.EquipmentGrp.error}-->
						</td>
					</tr>
					*}-->
					<tr>
						<th>フラグ</th>
						<td><!--{$form.FlgGrp.html}--></td>
					</tr>
					<tr>
						<th>備考</th>
						<td>
							<!--{$form.other_c.html}--><!--{$form.other_c.error}-->
						</td>
					</tr>
				</table>

				<h2 class="h2a">画 像</h2>
				<table class="style_e">
					<tr>
						<th>間取り図</th>
						<td>
							<div class="box_fileup">
								<!--{if $form_state != 2}-->
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span>
									<div class="hidden"><input name="name_r_photo0_c" type="file" class="class_photo" title="r_photo0" /></div>
									<!--{if !empty($r_photo0_err)}--><div><!--{$r_photo0_err}--></div><!--{/if}-->
								</div>
								<!--{/if}-->
								<div id="text_r_photo0_c" class="column1-4">
									<div>横580px × 縦751px</div>
									<!--{if $photo.r_photo0_c != ''}-->
										<br /><span class="confirm0"><a href="showImage.php?dir=uploads&file=<!--{$photo.r_photo0_c}-->&bg=FFF" target="_blank"><img src="../uploads/<!--{$photo.r_photo0_c}-->" style="width: 100px;" /></a></span><br />
										<!--{$form.chk_r_photo0_c.html}-->
										<!--{if $form_state != 2}-->
										<br /><span class="confirm0"><input type="button" class="del_photo" id="<!--{$hid}-->" value="今すぐ削除" title="0" /></span>
										<!--{/if}-->
									<!--{/if}-->
								</div>
							</div>
						</td>
					</tr>
					<!--{section name=hoge loop=11 start=1}-->
					<!--{strip}-->
					<!--{assign var=s value=`$smarty.section.hoge.index+20`}-->
					<!--{assign var=colname value="r_photo`$smarty.section.hoge.index`_c"}-->
					<!--{assign var=s_colname value="r_photo`$s`_c"}-->
					<!--{assign var=chk value="chk_`$colname`"}-->
					<!--{assign var=s_chk value="chk_`$s_colname`"}-->
					<tr>
						<th>内観<!--{$smarty.section.hoge.index}--></th>
						<td>
							<div class="box_fileup">
								<!--{if $form_state != 2}-->
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span>
									<div class="hidden"><input name="name_r_photo<!--{$smarty.section.hoge.index}-->_c" type="file" class="class_photo" title="r_photo<!--{$smarty.section.hoge.index}-->" /></div>
									<!--{if $smarty.section.hoge.first && !empty($r_photo1_err)}--><div><!--{$r_photo1_err}--></div><!--{/if}-->
								</div>
								<!--{/if}-->
								<div id="text_r_photo<!--{$smarty.section.hoge.index}-->_c" class="column1-4">
									<div>横582px × 縦388px</div>
									<!--{if $photo.$colname != ''}-->
										<br /><span class="confirm<!--{$smarty.section.hoge.index}-->"><a href="showImage.php?dir=uploads&file=<!--{$photo.$colname}-->&bg=FFF" target="_blank"><img src="../uploads/<!--{$photo.$colname}-->" style="width: 100px;" /></a></span><br />
										<!--{$form.$chk.html}-->
										<!--{if $form_state != 2}-->
										<br /><span class="confirm<!--{$smarty.section.hoge.index}-->"><input type="button" class="del_photo" id="<!--{$hid}-->" value="今すぐ削除" title="<!--{$smarty.section.hoge.index}-->" /></span>
										<!--{/if}-->
									<!--{/if}-->
								</div>
								<!--{if $form_state != 2}-->
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload_thumb.png" alt="サムネイルアップロード" /></span>
									<div class="hidden"><input name="name_r_photo<!--{$smarty.section.hoge.index}-->_c" type="file" class="class_photo_thumb" title="r_photo<!--{$smarty.section.hoge.index}-->" /></div>
									<!--{if true == $smarty.section.hoge.first && $r_photo1_err != ''}--><div><!--{$r_photo1_err}--></div><!--{/if}-->
								</div>
								<!--{/if}-->
								<div id="text_r_photo<!--{$smarty.section.hoge.index}-->_c_thumb" class="column1-4">
									<div>サムネイル<!--{if $form_state != 2}-->を変更する場合<!--{/if}--><br />横80px × 縦80px</div>
									<!--{if $photo.$colname != ''}-->
										<br /><span class="confirm<!--{$smarty.section.hoge.index}-->"><a href="showImage.php?dir=uploads&file=<!--{$photo.$s_colname}-->&bg=FFF&thumbFlg=true&width=80px" target="_blank"><img src="../uploads/<!--{$photo.$s_colname}-->" style="width: 100px;" /></a></span><br />
									<!--{/if}-->
								</div>
							</div>
						</td>
					</tr>
					<!--{/strip}-->
					<!--{/section}-->
				</table>
				<div class="center mt30">
					<!--{if $form_state == 2}-->
					<input type="image" name="back" src="img/btn_mod.png" alt="修正する" class="have_effect" />　
					<input type="image" name="send" src="img/btn_regist.png" alt="登録する" class="have_effect" />
					<!--{else}-->
					<input type="image" name="confirm" src="img/sign_up/btn_conf.png" alt="確認する" class="have_effect" />
					<!--{/if}-->
				</div>
				</form>
			</div>

			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>

