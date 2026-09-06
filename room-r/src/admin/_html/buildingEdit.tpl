<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="css/fileuploader.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.11.0m.js"></script>
<script type="text/javascript" src="js/jquery.upload-1.0.2.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/buildingEdit.js"></script>
<script type="text/javascript">
$(function(){
	$("#7aeda81bed346dc").on('click', function(){
		var sub = window.open('img/ref_area.png', '', 'width=707,height=512,status=0,location=0,resizable=0,scrollbars=1,toolbar=0');
		sub.focus();
	});

	$("#id_transport1_c").on('change',function(){
		var no = $(this).val();
		if(no != ""){
			ajax = jQuery.ajax({
				url : '../ajax/ajaxStation.php',
				type: 'POST',
				data: {
					"no": no
					},
				success: function(data){
						$("#id_station1_c").html("");
						for(var i in data){
							$("#id_station1_c").append('<option value="'+data[i]["id"]+'">'+data[i]["val"]+'</option>');
						}
					},
				error: function(){
						alert("沿線データ取得に失敗しました");
					}
			});
		}else{
			$("#id_station1_c").html('<option value=""></option>');
		}
	});
	$("#id_transport2_c").on('change',function(){
		var no = $(this).val();
		if(no != ""){
			ajax = jQuery.ajax({
				url : '../ajax/ajaxStation.php',
				type: 'POST',
				data: {
					"no": no
					},
				success: function(data){
						$("#id_station2_c").html("");
						for(var i in data){
							$("#id_station2_c").append('<option value="'+data[i]["id"]+'">'+data[i]["val"]+'</option>');
						}
					},
				error: function(){
						alert("沿線データ取得に失敗しました");
					}
			});
		}else{
			$("#id_station2_c").html('<option value=""></option>');
		}
	});

	/* %%%%%%%%%%%%%%%% */

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
<title><!--{if $id > 0}-->建物の編集<!--{else}-->建物の新規追加<!--{/if}--></title>
</head>
<body>
<div id="wrapper">
	<!--{include file='menu.tpl'}-->

	<div id="main" class="sd01">
		<div class="inner">
			<h1><!--{if $id > 0}-->建物の編集<!--{else}-->建物の新規追加<!--{/if}--></h1>

			<!--{if !empty($result) && is_array($result)}--><div class="result<!--{if $result.res}--> done<!--{else}--> error<!--{/if}-->"><!--{$result.mes}--></div><!--{/if}-->

			<div id="area_building_edit">
				<div class="right small mb5"><span style="color:#ae151d;">※</span>は必須項目です</div>
				<form<!--{$form.attributes}-->>
				<input type="hidden" name="mode" value="edit" />
				<table class="style_e">
					<tr>
						<th class="required">物件番号<span class="red">※</span></th>
						<td><!--{$form.building_no_c.html}--><!--{$form.building_no_c.error}--></td>
					</tr>
					<tr>
						<th class="required">物件名<span class="red">※</span></th>
						<td>
							<div><label><!--{$form.building_name_c.html}--><!--{$form.building_name_c.error}--></label></div>
							<div class="mt5"><label>フリガナ <!--{$form.building_furigana_c.html}--><!--{$form.building_furigana_c.error}--></label></div>
						</td>
					</tr>
					<tr>
						<th class="required">所在地<span class="red">※</span></th>
						<td>
							<!--{$form.pref_c.html}--><!--{$form.pref_c.error}-->
							<!--{$form.ku_c.html}--><!--{$form.ku_c.error}-->
							<!--{$form.address_c.html}--><!--{$form.address_c.error}-->
						</td>
					</tr>
					<tr>
						<th class="required">google座標<span class="red">※</span></th>
						<td>
							<label>緯度: <!--{$form.latitude_c.html}--><!--{$form.latitude_c.error}--></label>
							<label>経度: <!--{$form.longitude_c.html}--><!--{$form.longitude_c.error}--></label>
							<!--{if $form_state == 1}-->
							<img class="middle have_effect" src="img/sign_up/btn_pos.png" alt="座標設定" onclick="javascript:openSubWindow('./GoogleMapsSimple.php');" />
							<!--{/if}-->
						</td>
					</tr>
					<tr>
						<th class="required">沿線1<span class="red">※</span></th>
						<td>
							<!--{$form.transport1_c.html}-->
							<!--{$form.station1_c.html}-->
							徒歩 <!--{$form.distance1_c.html}--> 分<br />
							<!--{$form.transport1_c.error}-->
							<!--{$form.station1_c.error}-->
							<!--{$form.distance1_c.error}-->
							その他の沿線の場合は以下を入力してください<br />
							沿線名：<!--{$form.transport3_c.html}-->
							駅名：<!--{$form.station3_c.html}-->
							徒歩 <!--{$form.distance3_c.html}--> 分<br />
							<!--{$form.transport3_c.error}-->
							<!--{$form.station3_c.error}-->
							<!--{$form.distance3_c.error}--><br />
						</td>
					</tr>
					<tr>
						<th>沿線2</th>
						<td>
							<!--{$form.transport2_c.html}-->
							<!--{$form.station2_c.html}-->
							徒歩 <!--{$form.distance2_c.html}--> 分
							<!--{$form.transport2_c.error}-->
							<!--{$form.station2_c.error}-->
							<!--{$form.distance2_c.error}-->
						</td>
					</tr>
					<tr>
						<th class="required">エリア<span class="red">※</span></th>
						<td>
							<!--{strip}-->
							<!--{assign var=old value="01"}-->
							<!--{foreach from=$area item=val key=k name=a}-->
							<!--{if $k != "9999"}-->
							<!--{assign var=spacer value=" , "}-->
							<!--{if $smarty.foreach.a.first == true}-->
								<!--{assign var=spacer value=""}-->
							<!--{/if}-->
							<!--{$spacer}-->
							<!--{$form.AreaGrp[$k].html}-->
							<!--{assign var=old value=$new}-->
							<!--{/if}-->
							<!--{/foreach}-->
							<!--{/strip}--><br />
							<!-- <span class="clickable have_effect" id="7aeda81bed346dc"><img src="img/btn_area.png" alt="図を表示する" /></span> -->
							<!--{$form.AreaGrp.error}-->
						</td>
					</tr>
					<tr>
						<th class="required">構造<span class="red">※</span></th>
						<td><!--{$form.structure_c.html}--><!--{$form.structure_c.error}--></td>
					</tr>
					<tr>
						<th>総戸数</th>
						<td><!--{$form.house_c.html}--><!--{$form.house_c.error}--></td>
					</tr>
					<tr>
						<th>階数</th>
						<td>
							<!--{$form.floor_c.html}--><!--{$form.floor_c.error}--> 階建
						</td>
					</tr>
					<tr>
						<th class="required">築年月（西暦）<span class="red">※</span></th>
						<td><!--{$form.completion_year_c.html}--> 年 <!--{$form.completion_year_c.error}--><!--{$form.completion_month_c.html}--> 月 <!--{$form.completion_month_c.error}--></td>
					</tr>
					<tr>
						<th class="normal">特集フラグ</th>
						<td>
							<!--{strip}-->
							<!--{assign var=old value="01"}-->
							<!--{foreach from=$cnf.feature item=val key=k name=a}-->
							<!--{assign var=spacer value="&nbsp;&nbsp;"}-->
							<!--{if $smarty.foreach.a.first == true}-->
								<!--{assign var=spacer value=""}-->
							<!--{/if}-->
							<!--{$spacer}-->
							<!--{$form.FeatureGrp[$k].html}-->
							<!--{assign var=old value=$new}-->
							<!--{/foreach}-->
							<!--{/strip}--><br />
							<!--{$form.FeatureGrp.error}-->
						</td>
					</tr>
					<tr>
						<th class="normal">ペット</th>
						<td>
							<!--{$form.petGrp.html}--><br /><!--{$form.petGrp.error}-->
							<div>フリーワード：<!--{$form.petfree_c.html}--></div>
							<!--{$form.petfree_c.error}-->
						</dt>
					</tr>
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
						<td class="tax_scope">
							<span class="tax_excluded"><!--{$form.parking_charge_c.html}--></span> 円 <!--{$form.parking_charge_c.error}-->
							<!--{$form.parking_tax_c.html}--><!--{$form.parking_tax_c.error}-->
						</td>
					</tr>
					<tr>
						<th>火災保険</th>
						<td class="tax_scope">
							<span class="tax_excluded"><!--{$form.fire_c.html}--></span> 円<!--{$form.fire_c.error}-->
							<!--{$form.fire_flg_c.html}--><!--{$form.fire_flg_c.error}-->
						</td>
					</tr>
					<tr>
						<th>おすすめ<br />ポイント</th>
						<td><!--{$form.comment1_c.html}--><!--{$form.comment1_c.error}--><!--{if $form_state == 1}--> ※最大200文字<!--{/if}--></td>
					</tr>
					<tr>
						<th>キャッチコピー</th>
						<td><!--{$form.catch_c.html}--><!--{$form.catch_c.error}--><!--{if $form_state == 1}--> ※最大18文字<!--{/if}--></td>
					</tr>
					<tr>
						<th>管理会社情報</th>
						<td>
							<div><div class="leftside" style="width:60px;">名前</div><!--{$form.yanushi_name_c.html}--><!--{$form.yanushi_name_c.error}--></div>
							<div class="mt5"><div class="leftside" style="width:60px;">電話1</div><!--{$form.yanushi_tel1_c.html}--><!--{$form.yanushi_tel1_c.error}--></div>
							<div class="mt5"><div class="leftside" style="width:60px;">電話2</div><!--{$form.yanushi_tel2_c.html}--><!--{$form.yanushi_tel2_c.error}--></div>
						</td>
					</tr>
					<tr>
						<th>保証会社</th>
						<td>
							<div><!--{$form.hoshou_availability_c.html}--><!--{$form.hoshou_availability_c.error}--></div>
							<div class="mt5">
								<!--{$form.hoshou_company_c.html}--><!--{$form.hoshou_company_c.error}-->
								<span class="pad">&nbsp;&nbsp;</span>
								保証料 <!--{$form.hoshou_charge_c.html}--> 円<!--{$form.hoshou_charge_c.error}-->
							</div>
							<div class="mt5">
								更新料 <!--{$form.hoshou_charge2_c.html}--><!--{$form.hoshou_charge2_c.error}-->
								<!--{$form.hoshou_charge2_type_c.html}--><!--{$form.hoshou_charge2_type_c.error}-->
								<span>/</span>
								<!--{$form.hoshou_charge2_interval_c.html}--><!--{$form.hoshou_charge2_interval_c.error}-->
							</div>
						</td>
					</tr>
					<tr>
						<th>一覧画像</th>
						<td>
							<div class="box_fileup">
								<!--{if $form_state != 2}-->
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span>
									<div class="hidden"><input name="name_b_photo0_c" type="file" class="class_photo" title="b_photo0" /></div>
									<!--{if $b_photo0_err != ''}--><div><!--{$b_photo0_err}--></div><!--{/if}-->
								</div>
								<!--{/if}-->
								<div id="text_b_photo0_c" class="column1-4">
									<div>横240px × 縦160px</div>
									<!--{if $photo.b_photo0_c != ''}-->
									<br />
									<span class="confirm0"><a href="showImage.php?dir=uploads&file=<!--{$photo.b_photo0_c}-->&bg=FFF" target="_blank" id=><img src="../uploads/<!--{$photo.b_photo0_c}-->" style="width: 100px;" /></a></span>
									<br />
									<!--{$form.chk_b_photo0_c.html}-->
									<!--{if $form_state != 2}-->
									<br /><span class="confirm0"><input type="button" class="del_photo" id="<!--{$id}-->" value="今すぐ削除" title="0"  /></span>
									<!--{/if}-->
									<!--{/if}-->
								</div>
							</div>
						</td>
					</tr>
					<!--{section name=hoge loop=9 start=1}-->
					<!--{strip}-->
					<!--{assign var=s value=`$smarty.section.hoge.index+10`}-->
					<!--{assign var=colname value="b_photo`$smarty.section.hoge.index`_c"}-->
					<!--{assign var=s_colname value="b_photo`$s`_c"}-->
					<!--{assign var=chk value="chk_`$colname`"}-->
					<!--{assign var=s_chk value="chk_`$s_colname`"}-->
					<tr>
						<th>外観<!--{$smarty.section.hoge.index}--></th>
						<td>
							<div class="box_fileup">
								<!--{if $form_state != 2}-->
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span>
									<div class="hidden"><input name="name_b_photo<!--{$smarty.section.hoge.index}-->_c" type="file" class="class_photo" title="b_photo<!--{$smarty.section.hoge.index}-->" /></div>
									<!--{if true == $smarty.section.hoge.first && $b_photo1_err != ''}--><div><!--{$b_photo1_err}--></div><!--{/if}-->
								</div>
								<!--{/if}-->
								<div id="text_b_photo<!--{$smarty.section.hoge.index}-->_c" class="column1-4">
									<div>横430px × 縦645px</div>
									<!--{if $photo.$colname != ''}-->
										<br /><span class="confirm<!--{$smarty.section.hoge.index}-->"><a href="showImage.php?dir=uploads&file=<!--{$photo.$colname}-->&bg=FFF" target="_blank"><img src="../uploads/<!--{$photo.$colname}-->" style="width: 100px;" /></a></span><br />
										<!--{$form.$chk.html}-->
										<!--{if $form_state != 2}-->
										<br /><span class="confirm<!--{$smarty.section.hoge.index}-->"><input type="button" class="del_photo" id="<!--{$id}-->" value="今すぐ削除" title="<!--{$smarty.section.hoge.index}-->" /></span>
										<!--{/if}-->
									<!--{/if}-->
								</div>
								<!--{if $form_state != 2}-->
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload_thumb.png" alt="サムネイルアップロード" /></span>
									<div class="hidden"><input name="name_b_photo<!--{$smarty.section.hoge.index}-->_c" type="file" class="class_photo_thumb" title="b_photo<!--{$smarty.section.hoge.index}-->" /></div>
									<!--{if true == $smarty.section.hoge.first && $b_photo1_err != ''}--><div><!--{$b_photo1_err}--></div><!--{/if}-->
								</div>
								<!--{/if}-->
								<div id="text_b_photo<!--{$smarty.section.hoge.index}-->_c_thumb" class="column1-4">
									<div>サムネイル<!--{if $form_state != 2}-->を変更する場合<!--{/if}--><br />横130px × 縦130px</div>
									<!--{if $photo.$colname != ''}-->
										<br /><span class="confirm<!--{$smarty.section.hoge.index}-->"><a href="showImage.php?dir=uploads&file=<!--{$photo.$s_colname}-->&bg=FFF&thumbFlg=true&width=130px" target="_blank"><img src="../uploads/<!--{$photo.$s_colname}-->" style="width: 100px;" /></a></span><br />
									<!--{/if}-->
								</div>
							</div>
						</td>
					</tr>
					<!--{/strip}-->
					<!--{/section}-->
					<tr>
						<th>優先度</th>
						<td>
							<div class="mb5"><!--{$form.order_c.html}--><!--{$form.order_c.error}--></div>
							<!--{$form.OrderGrp.html}-->
							<div style="margin-left:10px;">（チェックを入れると、優先度に関係なく下位表示されます）</div>
						</td>
					</tr>
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















<!--{*
<div id="header"><h1><!--{if $id > 0}-->建物編集<!--{else}-->建物新規登録<!--{/if}--></h1></div>
<div class="clear"></div>
<div id="content">
<div id="menu">
<!--{include file='menu.tpl'}-->
</div>
<div id="main">
<form <!--{$form.attributes}-->>
<!--{$form.hidden}-->
<input type="hidden" name="mode" value="edit" />
<table border="1">
<thead>
	<!--{if $id > 0}-->建物編集<!--{else}-->建物新規登録<!--{/if}--> <span class="error">※</span>の項目は必須項目です
</thead>
<tr>
	<th class="required">物件番号<span class="error">※</span></th>
	<td class="normal" colspan="2"><!--{$form.building_no_c.html}--><!--{$form.building_no_c.error}--></td>
</tr>
<tr>
	<th class="required">物件名<span class="error">※</span></th>
	<td class="normal" colspan="2"><!--{$form.building_name_c.html}--><!--{$form.building_name_c.error}--></td>
</tr>
<tr>
	<th class="required">フリガナ<span class="error">※</span></th>
	<td class="normal" colspan="2"><!--{$form.building_furigana_c.html}--><!--{$form.building_furigana_c.error}--></td>
</tr>
<tr>
	<th class="required">状態<span class="error">※</span></th>
	<td class="normal" colspan="2"><!--{$form.statusGrp.html}--><!--{$form.statusGrp.error}--></td>
</tr>
<tr>
	<th class="required">所在地<span class="error">※</span></th>
	<td class="normal" colspan="2"><!--{$form.pref_c.html}--><!--{$form.pref_c.error}--><!--{$form.address_c.html}--><!--{$form.address_c.error}--></td>
</tr>
<tr>
	<th class="required">google座標<span class="error">※</span></th>
	<td class="normal" colspan="2">緯度:<!--{$form.latitude_c.html}--><!--{$form.latitude_c.error}--> 経度:<!--{$form.longitude_c.html}--><!--{$form.longitude_c.error}--><input type="button" value="座標設定" onclick="javascript:openSubWindow('./GoogleMapsSimple.php');" /></td>
</tr>
<tr>
	<th class="required">沿線1<span class="error">※</span></th>
	<td class="normal" colspan="2">
	<!--{$form.transport1_c.html}-->
	<!--{$form.station1_c.html}-->
	徒歩<!--{$form.distance1_c.html}-->分<br />
	<!--{$form.transport1_c.error}-->
	<!--{$form.traffic1_c.error}-->
	<!--{$form.distance1_c.error}-->
	</td>
</tr>
<tr>
	<th class="normal">沿線2</th>
	<td class="normal" colspan="2">
	<!--{$form.transport2_c.html}--><!--{$form.transport2_c.error}-->
	<!--{$form.station2_c.html}--><!--{$form.traffic2_c.error}-->
	徒歩<!--{$form.distance2_c.html}--><!--{$form.distance2_c.error}-->分
	</td>
</tr>
<tr>
	<th class="required">エリア<span class="error">※</span></th>
	<td class="normal" colspan="2">
	<!--{strip}-->
	<!--{assign var=old value="01"}-->
	<!--{foreach from=$area item=val key=k name=a}-->
	<!--{if $k != "9999"}-->
	<!--{assign var=spacer value=" , "}-->
	<!--{if $smarty.foreach.a.first == true}-->
		<!--{assign var=spacer value=""}-->
	<!--{/if}-->
	<!--{$spacer}-->
	<!--{$form.AreaGrp[$k].html}-->
	<!--{assign var=old value=$new}-->
	<!--{/if}-->
	<!--{/foreach}-->
	<!--{/strip}--><br />
	<!--{$form.AreaGrp.error}-->
	</td>
</tr>
<tr>
	<th class="required">構造<span class="error">※</span></th>
	<td class="normal" colspan="2"><!--{$form.structure_c.html}--><!--{$form.structure_c.error}--></td>
</tr>
<tr>
	<th class="normal">総戸数</th>
	<td class="normal" colspan="2"><!--{$form.house_c.html}--><!--{$form.house_c.error}--></td>
</tr>
<tr>
	<th class="normal">階建</th>
	<td class="normal" colspan="2"><!--{$form.floor_c.html}--><!--{$form.floor_c.error}-->階建</td>
</tr>
<tr>
	<th class="required">築年月(西暦)<span class="error">※</span></th>
	<td class="normal" colspan="2"><!--{$form.completion_year_c.html}-->年<!--{$form.completion_year_c.error}--><!--{$form.completion_month_c.html}-->月<!--{$form.completion_month_c.error}--></td>
</tr>
<tr>
	<th class="normal">特集フラグ</th>
	<td class="normal" colspan="2">
	<!--{strip}-->
	<!--{assign var=old value="01"}-->
	<!--{foreach from=$cnf.feature item=val key=k name=a}-->
	<!--{assign var=spacer value="&nbsp;&nbsp;"}-->
	<!--{if $smarty.foreach.a.first == true}-->
		<!--{assign var=spacer value=""}-->
	<!--{/if}-->
	<!--{$spacer}-->
	<!--{$form.FeatureGrp[$k].html}-->
	<!--{assign var=old value=$new}-->
	<!--{/foreach}-->
	<!--{/strip}--><br />
	<!--{$form.FeatureGrp.error}-->
	</td>
</tr>
<tr>
	<th class="normal">ペット</th>
	<td class="normal" colspan="2">
		&nbsp;&nbsp;&nbsp;<!--{$form.petGrp.html}--><br /><!--{$form.petGrp.error}-->
		<div>フリーワード：<!--{$form.petfree_c.html}--></div>

	</td>
</tr>
<tr>
	<th class="normal">敷金</th>
	<td class="normal" colspan="2"><!--{$form.deposit_c.html}-->3桁以下はヶ月。4桁以上は円<!--{$form.deposit_c.error}--></td>
</tr>
<tr>
	<th class="normal">礼金</th>
	<td class="normal" colspan="2"><!--{$form.keymoney_c.html}-->3桁以下はヶ月。4桁以上は円<!--{$form.keymoney_c.error}--></td>
</tr>
<tr>
	<th class="normal">償却</th>
	<td class="normal" colspan="2"><!--{$form.repayment_c.html}-->3桁以下はヶ月。4桁以上は円<!--{$form.repayment_c.error}--></td>
</tr>
<tr>
	<th class="normal">物件ポイント</th>
	<td class="normal" colspan="2"><!--{$form.comment1_c.html}--><!--{$form.comment1_c.error}-->
		※最大60文字
	</td>
</tr>
<tr>
	<th class="normal">キャッチコピー</th>
	<td class="normal" colspan="2"><!--{$form.catch_c.html}--><!--{$form.catch_c.error}-->※最大15文字</td>
</tr>
<tr>
	<th class="normal">リードコピー</th>
	<td class="normal" colspan="2"><!--{$form.lead_c.html}--><!--{$form.lead_c.error}-->※最大45文字</td>
</tr>
<tr>
	<th class="required">一覧画像<span class="error">※</span></th>
	<td class="normal" colspan="2">
	(215×215)<br />
	<div class="fileupload"><input name="name_b_photo0_c" id="id_b_photo0_c" type="file" class="class_photo" title="b_photo0" /></div>
	<div id="text_b_photo0_c">
		<!--{if $photo.b_photo0_c != ''}-->
		<br />
		<span class="confirm0"><a href="showImage.php?dir=uploads&file=<!--{$photo.b_photo0_c}-->&bg=FFF" target="_blank" id=><img src="../uploads/<!--{$photo.b_photo0_c}-->" style="width: 100px;" /></a></span>
		<br />
		<!--{$form.chk_b_photo0_c.html}--><br />
	<span class="confirm0"><input type="button" class="del_photo" id="<!--{$id}-->" value="今すぐ削除" title="0"  /></span><!--{/if}-->
	</div>

	<!--{$b_photo0_err}-->
	</td>
</tr>
<tr>
	<th class="required">
		一覧画像<br />
		マウスオーバー
		<span class="error">※</span>
	</th>
	<td class="normal" colspan="2">
	(215×215)<br />
	<div class="fileupload"><input name="name_b_photo21_c" id="id_b_photo21_c" type="file" class="class_photo" title="b_photo21" /></div>
	<div id ="text_b_photo21_c">
		<!--{if $photo.b_photo21_c != ''}-->
		<br />
		<span class="confirm21"><a href="showImage.php?dir=uploads&file=<!--{$photo.b_photo21_c}-->&bg=FFF" target="_blank"><img src="../uploads/<!--{$photo.b_photo21_c}-->" style="width: 100px;" /></a></span>
		<br />
		<!--{$form.chk_b_photo21_c.html}--><br />
	<span class="confirm21"><input type="button" class="del_photo" id="<!--{$id}-->" value="今すぐ削除" title="21" /></span><!--{/if}-->
	</div>
	<!--{$b_photo21_err}-->
	</td>
</tr>
<!--{section name=hoge loop=5 start=1}-->
<!--{strip}-->
<!--{assign var=s value=`$smarty.section.hoge.index+10`}-->
<!--{assign var=colname value="b_photo`$smarty.section.hoge.index`_c"}-->
<!--{assign var=s_colname value="b_photo`$s`_c"}-->
<!--{assign var=chk value="chk_`$colname`"}-->
<!--{assign var=s_chk value="chk_`$s_colname`"}-->
<tr>
	<th class="<!--{if true == $smarty.section.hoge.first}-->required<!--{else}-->normal<!--{/if}-->">外観画像<!--{$smarty.section.hoge.index}--><!--{if true == $smarty.section.hoge.first}--><span class="error">※</span><!--{/if}--></th>
	<td class="normal">
	拡大画像(400×500)<br /><div class="fileupload"><input name="name_b_photo<!--{$smarty.section.hoge.index}-->_c" id="id_b_photo<!--{$smarty.section.hoge.index}-->_c" type="file" class="class_photo" title="b_photo<!--{$smarty.section.hoge.index}-->" /></div>
	<div id="text_b_photo<!--{$smarty.section.hoge.index}-->_c">
		<!--{if $photo.$colname != ''}-->
		<br />
		<span class="confirm<!--{$smarty.section.hoge.index}-->"><a href="showImage.php?dir=uploads&file=<!--{$photo.$colname}-->&bg=FFF" target="_blank"><img src="../uploads/<!--{$photo.$colname}-->" style="width: 100px;" /></a></span><br />
		<!--{$form.$chk.html}-->
		<br />
		<span class="confirm<!--{$smarty.section.hoge.index}-->"><input type="button" class="del_photo" id="<!--{$id}-->" value="今すぐ削除" title="<!--{$smarty.section.hoge.index}-->" /></span><!--{/if}-->
	</div>
	<div class="clear"></div>
	<!--{if true == $smarty.section.hoge.first}--><!--{$b_photo1_err}--><!--{/if}-->
	</td>
	<td class="normal">
	サムネイル画像(75×75)<br />
	※縮小画像を変更する場合はこちら。
	<div class="fileupload"><input name="name_b_photo<!--{$smarty.section.hoge.index}-->_c" id="id_b_photo<!--{$smarty.section.hoge.index}-->_c" type="file" class="class_photo_thumb" title="b_photo<!--{$smarty.section.hoge.index}-->" /></div>
	<div id="text_b_photo<!--{$smarty.section.hoge.index}-->_c_thumb">
		<!--{if $photo.$colname != ''}-->
		<br />
		<span class="confirm<!--{$smarty.section.hoge.index}-->"><a href="showImage.php?dir=uploads&file=<!--{$photo.$s_colname}-->&bg=FFF&thumbFlg=true&width=75px" target="_blank"><img src="../uploads/<!--{$photo.$s_colname}-->" style="width: 100px;" /></a></span><br />
		<!--{/if}-->
		</div>
	<div class="clear"></div>
	<!--{if true == $smarty.section.hoge.first}--><!--{$b_photo1_err}--><!--{/if}-->
	</td>
</tr>
<!--{/strip}-->
<!--{/section}-->
<tr>
	<th class="normal">表示位置</th>
	<td class="normal" colspan="2">
		優先度<!--{$form.order_c.html}--><!--{$form.order_c.error}-->
		<span class="error">※優先度が高ければ検索結果の上位に表示されます</span><br />
		<!--{$form.OrderGrp.html}-->
		<span class="error">※チェックをすると優先度に関係なく検索結果の下位に表示されます。</span>
	</td>
</tr>
</table>
<input type="submit" name="confirm" value="確認" onclick="javascript:submitNoFile();return true;"/>
</form>

<div class="clear"></div>
<!--{if $id != 0}-->
<a href="houseEdit.php?bid=<!--{$id|escape}-->">部屋情報新規追加</a>
<table border="1">
<tr>
<th class="normal">タイプ名</th>
<th class="normal">間取り</th>
<th class="normal">賃料</th>
<th class="normal">公開</th>
<th class="normal">編集</th>
<th class="normal">コピー</th>
<th class="normal">削除</th>
</tr>
<!--{section name=house loop=$houses}--><!--{strip}-->
<!--{assign var=hoge value=`$houses[house].layout_c`}-->
<!--{assign var=status_c value=`$houses[house].status_c`}-->
<tr>
<td class="normal"><!--{$houses[house].house_no_c|escape}--></td>
<td class="normal"><!--{$houses[house].num_c|escape}--><!--{$layout_regist.$hoge}--></td>
<td class="normal"><!--{$houses[house].rental_price_c}-->円
</td>
<td class="normal"><!--{$status.$status_c}--></td>
<td class="normal"><a href="houseEdit.php?bid=<!--{$id|escape}-->&amp;hid=<!--{$houses[house].house_id_c|escape}-->">編集</a></td>
<td class="normal"><a href="houseEdit.php?bid=<!--{$id|escape}-->&amp;hid=<!--{$houses[house].house_id_c|escape}-->&amp;cp=y">複製</a></td>
<td class="normal"><a href="buildingEdit.php?id=<!--{$id|escape}-->&amp;hid=<!--{$houses[house].house_id_c|escape}-->&amp;dl=y" onclick="javascript:return deleteAlert();">削除</a></td>
</tr>
<!--{/strip}-->
<!--{/section}-->
</table>
<!--{/if}-->
</div>
<div class="clear"></div>
</div>
<div class="clear">&nbsp;</div>
</body>
</html>
*}-->
