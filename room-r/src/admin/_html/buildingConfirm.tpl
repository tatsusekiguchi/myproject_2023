






使いません!








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

	if($("input:radio[name='parking_flg_c']:checked").val() != 2){
		$("#id_parking_kind_c").attr("disabled","1");
		$("#id_parking_price_c").attr("disabled","1");
	}else{
		$("#id_parking_kind_c").removeAttr("disabled");
		$("#id_parking_price_c").removeAttr("disabled");
	}

	$("input:radio[name='parking_flg_c']").change(function(){
		if($("input:radio[name='parking_flg_c']:checked").val() != 2){
			$("#id_parking_kind_c").attr("disabled","1");
			$("#id_parking_price_c").attr("disabled","1");
		}else{
			$("#id_parking_kind_c").removeAttr("disabled");
			$("#id_parking_price_c").removeAttr("disabled");
		}
	});

	/* %%%%%%%%%%%%%%%% */

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
<title><!--{if $id > 0}-->建物の編集<!--{else}-->建物の新規追加<!--{/if}--></title>
</head>
<body>
<div id="wrapper">
	<!--{include file='menu.tpl'}-->

	<div id="main" class="sd01">
		<div class="inner">
			<h1><!--{if $id > 0}-->建物の編集<!--{else}-->建物の新規追加<!--{/if}--></h1>

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
						<th class="required">公開状況<span class="red">※</span></th>
						<td><!--{$form.statusGrp.html}--><!--{$form.statusGrp.error}--></td>
					</tr>
					<tr>
						<th class="required">所在地<span class="red">※</span></th>
						<td><!--{$form.pref_c.html}--><!--{$form.pref_c.error}--> <!--{$form.address_c.html}--><!--{$form.address_c.error}--></td>
					</tr>
					<tr>
						<th class="required">google座標<span class="red">※</span></th>
						<td>
							<label>緯度: <!--{$form.latitude_c.html}--><!--{$form.latitude_c.error}--></label>
							<label>経度: <!--{$form.longitude_c.html}--><!--{$form.longitude_c.error}--></label>
							<img class="middle have_effect" src="img/sign_up/btn_pos.png" alt="座標設定" onclick="javascript:openSubWindow('./GoogleMapsSimple.php');" />
						</td>
					</tr>
					<tr>
						<th class="required">沿線1<span class="red">※</span></th>
						<td>
							<!--{if !empty($form.transport1_c.html)}-->
								<!--{$form.transport1_c.html}-->
							<!--{/if}-->
							<!--{if !empty($form.station1_c.html)}-->
								<!--{$form.station1_c.html}-->
							<!--{/if}-->
							<!--{if !empty($form.distance1_c.html)}-->
								徒歩 <!--{$form.distance1_c.html}--> 分<br />
							<!--{/if}-->
							<!--{$form.transport1_c.error}-->
							<!--{$form.traffic1_c.error}-->
							<!--{$form.distance1_c.error}-->
							<!--{if $form.transport3_c.html != ""}-->
								<!--{$form.transport3_c.html}-->
							<!--{/if}-->
							<!--{if $form.station3_c.html != ""}-->
								<!--{$form.station3_c.html}-->
							<!--{/if}-->
							<!--{if $form.distance3_c.html != ""}-->
								徒歩 <!--{$form.distance3_c.html}--> 分<br />
							<!--{/if}-->
						</td>
					</tr>
					<tr>
						<th>沿線2</th>
						<td>
							<!--{$form.transport2_c.html}--><!--{$form.transport2_c.error}-->
							<!--{$form.station2_c.html}--><!--{$form.traffic2_c.error}-->
							徒歩 <!--{$form.distance2_c.html}--><!--{$form.distance2_c.error}--> 分
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
						<td><!--{$form.floor_c.html}--><!--{$form.floor_c.error}--> 階建</td>
					</tr>
					<tr>
						<th>築年月（西暦）</th>
						<td><!--{$form.completion_year_c.html}--> 年 <!--{$form.completion_year_c.error}--><!--{$form.completion_month_c.html}--> 月 <!--{$form.completion_month_c.error}--></td>
					</tr>
					<tr>
						<th>敷金</th>
						<td><!--{$form.deposit_c.html}--> 3桁以下はヶ月。4桁以上は円<!--{$form.deposit_c.error}--></td>
					</tr>
					<tr>
						<th>礼金</th>
						<td><!--{$form.keymoney_c.html}--> 3桁以下はヶ月。4桁以上は円<!--{$form.keymoney_c.error}--></td>
					</tr>
					<tr>
						<th>償却</th>
						<td><!--{$form.repayment_c.html}--> 3桁以下はヶ月。4桁以上は円<!--{$form.repayment_c.error}--></td>
					</tr>
					<tr>
						<th>フラグ</th>
						<td><!--{$form.FlgGrp.html}--></td>
					</tr>
					<tr>
						<th>駐車場</th>
						<td>
							<!--{$form.parkingFlgGrp.html}-->
							<!--{$form.parking_kind_c.html}-->
							<!--{$form.parking_price_c.html}--> 円<br />
							<!--{$form.parkingFlgGrp.error}-->
						</td>
					</tr>
					<tr>
						<th class="required">おすすめ<br />ポイント<span class="red">※</span></th>
						<td><!--{$form.comment1_c.html}--><!--{$form.comment1_c.error}--> ※最大60文字</td>
					</tr>
					<tr>
						<th class="required">キャッチコピー<span class="red">※</span></th>
						<td><!--{$form.catch_c.html}--><!--{$form.catch_c.error}--> ※最大18文字</td>
					</tr>
					<tr>
						<th class="required">一覧画像<span class="red">※</span></th>
						<td>
							<div class="box_fileup">
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span>
									<div class="hidden"><input name="name_b_photo0_c" type="file" /></div>
									<!--{if $b_photo0_err != ''}--><div><!--{$b_photo0_err}--></div><!--{/if}-->
								</div>
								<div class="column1-4">
									<div>横155×縦115px</div>
									<!--{if $photo.b_photo0_c != ''}-->
									<br />
									<span class="confirm0"><a href="showImage.php?dir=uploads&file=<!--{$photo.b_photo0_c}-->&bg=FFF" target="_blank" id=><img src="../uploads/<!--{$photo.b_photo0_c}-->" style="width: 100px;" /></a></span>
									<br />
									<!--{$form.chk_b_photo0_c.html}--><br />
									<span class="confirm0"><input type="button" class="del_photo" id="<!--{$id}-->" value="今すぐ削除" title="0"  /></span>
									<!--{/if}-->
								</div>
							</div>
						</td>
					</tr>
					<!--{section name=hoge loop=7 start=1}-->
					<!--{strip}-->
					<!--{assign var=s value=`$smarty.section.hoge.index+10`}-->
					<!--{assign var=colname value="b_photo`$smarty.section.hoge.index`_c"}-->
					<!--{assign var=s_colname value="b_photo`$s`_c"}-->
					<!--{assign var=chk value="chk_`$colname`"}-->
					<!--{assign var=s_chk value="chk_`$s_colname`"}-->
					<tr>
						<th class="<!--{if true == $smarty.section.hoge.first}-->required<!--{/if}-->">外観<!--{$smarty.section.hoge.index}--><!--{if true == $smarty.section.hoge.first}--><span class="red">※</span><!--{/if}--></th>
						<td>
							<div class="box_fileup">
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span>
									<div class="hidden"><input name="name_b_photo<!--{$smarty.section.hoge.index}-->_c" type="file" /></div>
									<!--{if true == $smarty.section.hoge.first && $b_photo1_err != ''}--><div><!--{$b_photo1_err}--></div><!--{/if}-->
								</div>
								<div class="column1-4">
									<div>横350×縦410px</div>
									<!--{if $photo.$colname != ''}-->
										<br /><span class="confirm<!--{$smarty.section.hoge.index}-->"><a href="showImage.php?dir=uploads&file=<!--{$photo.$colname}-->&bg=FFF" target="_blank"><img src="../uploads/<!--{$photo.$colname}-->" style="width: 100px;" /></a></span><br />
										<!--{$form.$chk.html}-->
										<br /><span class="confirm<!--{$smarty.section.hoge.index}-->"><input type="button" class="del_photo" id="<!--{$id}-->" value="今すぐ削除" title="<!--{$smarty.section.hoge.index}-->" /></span>
									<!--{/if}-->
								</div>
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload_thumb.png" alt="サムネイルアップロード" /></span>
									<div class="hidden"><input name="name_b_photo<!--{$smarty.section.hoge.index}-->_c" type="file" /></div>
									<!--{if true == $smarty.section.hoge.first && $b_photo1_err != ''}--><div><!--{$b_photo1_err}--></div><!--{/if}-->
								</div>
								<div class="column1-4">
									<div>サムネイルを変更する場合<br />横60×縦60px</div>
									<!--{if $photo.$colname != ''}-->
										<br /><span class="confirm<!--{$smarty.section.hoge.index}-->"><a href="showImage.php?dir=uploads&file=<!--{$photo.$s_colname}-->&bg=FFF&thumbFlg=true&width=75px" target="_blank"><img src="../uploads/<!--{$photo.$s_colname}-->" style="width: 100px;" /></a></span><br />
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
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="css/fileuploader.css" rel="stylesheet" type="text/css" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">

var currentInfoWindow = null;

function initialize() {
	var centerPos = new google.maps.LatLng(<!--{$form.latitude_c.value}-->, <!--{$form.longitude_c.value}-->);
	var mapOptions = {
		zoom : 17,
		center : centerPos,
		scaleControl : true,
		streetViewControl : false,
		mapTypeControl : false,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	var map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);

  //マーカーを作成
	var markerPos = new google.maps.LatLng(<!--{$form.latitude_c.value}-->, <!--{$form.longitude_c.value}-->);
	var markerOpts = {
			position : markerPos,
			map : map,
			title : "<!--{$form.building_name_c.value|escape}-->"
	};
	var marker = new google.maps.Marker(markerOpts);
}


</script>
<title><!--{if $id > 0}-->建物編集<!--{else}-->建物新規登録<!--{/if}-->確認 </title>
</head>
<body onload="javascript:initialize();">
<div id="header"><h1><!--{if $id > 0}-->建物編集<!--{else}-->建物新規登録<!--{/if}-->確認 </h1></div>
<div class="clear"></div>

<div id="content">
<div id="menu">
<!--{include file='menu.tpl'}--></div>
<div id="main">
<form <!--{$form.attributes}-->>
<!--{$form.hidden}-->
<input type="hidden" name="mode" value="edit" />
<table border="1">
<thead><!--{if $id > 0}-->建物編集<!--{else}-->建物新規登録<!--{/if}-->確認 <span class="error">※</span>の項目は必須項目です</thead>
<tr>
	<th class="required">物件番号<span class="error">※</span></th>
	<td class="normal"><!--{$form.building_no_c.html}--><!--{$form.building_no_c.error}--></td>
</tr>
<tr>
	<th class="required">物件名<span class="error">※</span></th>
	<td class="normal"><!--{$form.building_name_c.html}--><!--{$form.building_name_c.error}--></td>
</tr>
<tr>
	<th class="required">フリガナ<span class="error">※</span></th>
	<td class="normal"><!--{$form.building_furigana_c.html}--><!--{$form.building_furigana_c.error}--></td>
</tr>
<tr>
	<th class="required">状態<span class="error">※</span></th>
	<td class="normal"><!--{$form.statusGrp.html}--><!--{$form.statusGrp.error}--></td>
</tr>
<tr>
	<th class="required">所在地<span class="error">※</span></th>
	<td class="normal"><!--{$form.pref_c.html}--><!--{$form.pref_c.error}--><!--{$form.address_c.html}--><!--{$form.address_c.error}--></td>
</tr>
<tr>
	<th class="required">google座標<span class="error">※</span></th>
	<td class="normal">緯度:<!--{$form.latitude_c.html}--><!--{$form.latitude_c.error}--> 経度:<!--{$form.longitude_c.html}--><!--{$form.longitude_c.error}--><div id="map_canvas" style="width:400px;height:300px;"></div></td>
</tr>
<tr>
	<th class="required">沿線1<span class="error">※</span></th>
	<td class="normal">
	<!--{$form.transport1_c.html}--><!--{$form.transport1_c.error}-->
	<!--{$form.station1_c.html}--><!--{$form.traffic1_c.error}-->
	徒歩<!--{$form.distance1_c.html}-->分<!--{$form.distance1_c.error}-->
	</td>
</tr>
<tr>
	<th class="normal">沿線2</th>
	<td class="normal">
	<!--{$form.transport2_c.html}--><!--{$form.transport2_c.error}-->
	<!--{$form.station2_c.html}--><!--{$form.traffic2_c.error}-->
	徒歩<!--{$form.distance2_c.html}--><!--{$form.distance2_c.error}-->分
	</td>
</tr>
<tr>
	<th class="required">エリア<span class="error">※</span></th>
	<td class="normal"><!--{strip}-->
	<!--{assign var=old value="01"}-->
	<!--{assign var=before value=false}-->
	<!--{foreach from=$area item=val key=k name=a}-->
	<!--{if $k != "9999"}-->
		<!--{assign var=spacer value=""}-->
		<!--{assign var=new value=$k|truncate:2:""}-->
		<!--{if $new != $old}-->
			<!--{assign var=spacer value="<hr />"}-->
			<!--{assign var=before value=false}-->
		<!--{else}-->
			<!--{if $form.AreaGrp[$k].value == 1 && $before == true}-->
				<!--{assign var=spacer value=" , "}-->
			<!--{/if}-->
		<!--{/if}-->
		<!--{if $smarty.foreach.a.first == true}-->
			<!--{assign var=spacer value=""}-->
		<!--{/if}-->
		<!--{$spacer}-->
		<!--{if $form.AreaGrp[$k].value == 1}-->
			<!--{$form.AreaGrp[$k].html}-->
			<!--{assign var=before value=true}-->
		<!--{/if}-->
		<!--{assign var=old value=$new}-->
	<!--{/if}-->
	<!--{/foreach}-->
	<!--{/strip}-->
	</td>
</tr>
<tr>
	<th class="required">構造<span class="error">※</span></th>
	<td class="normal"><!--{$form.structure_c.html}--><!--{$form.structure_c.error}--></td>
</tr>
<tr>
	<th class="required">総戸数<span class="error">※</span></th>
	<td class="normal"><!--{$form.house_c.html}--><!--{$form.house_c.error}--></td>
</tr>
<tr>
	<th class="required">階建<span class="error">※</span></th>
	<td class="normal"><!--{$form.floor_c.html}--><!--{$form.floor_c.error}-->階建</td>
</tr>
<tr>
	<th class="normal">築年月(西暦)</th>
	<td class="normal"><!--{$form.completion_year_c.html}-->年<!--{$form.completion_year_c.error}--><!--{$form.completion_month_c.html}-->月<!--{$form.completion_month_c.error}--></td>
</tr>
<tr>
	<th class="normal">敷金</th>
	<td class="normal"><!--{$form.deposit_c.html}--><!--{$form.deposit_c.error}--></td>
</tr>
<tr>
	<th class="normal">礼金</th>
	<td class="normal"><!--{$form.keymoney_c.html}--><!--{$form.keymoney_c.error}--></td>
</tr>
<tr>
	<th class="normal">償却</th>
	<td class="normal"><!--{$form.repayment_c.html}--><!--{$form.repayment_c.error}--></td>
</tr>
<tr>
	<th class="normal">フラグ</th>
	<td class="normal"><!--{$form.FlgGrp.html}--></td>
</tr>
<tr>
	<th class="normal">駐車場</th>
	<td class="normal">

		<!--{$form.parkingFlgGrp.html}-->
		<!--{if $smarty.post.parking_flg_c == 2}-->
			<!--{$form.parking_kind_c.html}-->
			<!--{$form.parking_price_c.html}-->円<br />
			<!--{$form.parkingFlgGrp.error}-->
		<!--{/if}-->
	</td>
</tr>
<tr>
	<th class="normal">物件ポイント</th>
	<td class="normal"><!--{$form.comment1_c.html}--><!--{$form.comment1_c.error}--></td>
</tr>
<tr>
	<th class="normal">キャッチコピー</th>
	<td class="normal"><!--{$form.catch_c.html}--><!--{$form.catch_c.error}--></td>
</tr>
<tr>
	<th class="normal">リードコピー</th>
	<td class="normal"><!--{$form.lead_c.html}--><!--{$form.lead_c.error}--></td>
</tr>
<tr>
	<th class="required">一覧画像<span class="error">※</span></th>
	<td class="normal">
		<div id ="text_b_photo0_c">
			<!--{if $photo.b_photo0_c != ''}-->
			<div style="margin: 5px; width: 120px; height:120px; background: url(../uploads/<!--{$photo.b_photo0_c}-->) center;"></div>
			<!--{/if}-->
			<!--{$form.chk_b_photo0_c.html}-->
		</div>
	</td>
</tr>
<tr>
	<th class="required">
		一覧画像<br />
		サムネイル<span class="error">※</span>
	</th>
	<td class="normal">
		<div id ="text_b_photo21_c">
			<!--{if $photo.b_photo21_c != ''}-->
			<div style="margin: 5px; width: 120px; height:120px; background: url(../uploads/<!--{$photo.b_photo21_c}-->) center;"></div>
			<!--{/if}--><!--{$form.chk_b_photo21_c.html}-->
		</div>
	</td>
</tr>
<!--{section name=hoge loop=7 start=1}-->
<!--{strip}-->
<!--{assign var=s value=`$smarty.section.hoge.index+10`}-->
<!--{assign var=colname value="b_photo`$smarty.section.hoge.index`_c"}-->
<!--{assign var=s_colname value="b_photo`$s`_c"}-->
<!--{assign var=chk value="chk_`$colname`"}-->
<!--{assign var=s_chk value="chk_`$s_colname`"}-->
<tr>
	<th class="<!--{if true == $smarty.section.hoge.first}-->required<!--{else}-->normal<!--{/if}-->">外観画像<!--{$smarty.section.hoge.index}--><!--{if true == $smarty.section.hoge.first}--><span class="error">※</span><!--{/if}--></th>
	<td class="normal">
		<div class="left admin_img">縮小画像<br />
			<div id ="text_b_photo<!--{$s}-->_c" style="width: 75px; height:75px; background: url(../uploads/<!--{$photo.$s_colname}-->) center;">
			</div>
				<!--{$form.$s_chk.html}-->
		</div>
		<div class="left admin_img">拡大画像<br />
			<div id ="text_b_photo<!--{$smarty.section.hoge.index}-->_c"><!--{if $photo.$colname != ''}--><img src="../uploads/<!--{$photo.$colname}-->" />
			</div>
				<!--{/if}-->
		</div>
		<div class="clear"><!--{$form.$chk.html}--></div>
	</td>
</tr>
<!--{/strip}-->
<!--{/section}-->
<tr>
	<th class="normal">表示位置</th>
	<td class="normal">
		優先度<!--{$form.order_c.html}--><!--{$form.order_c.error}--><br />
		<!--{$form.OrderGrp.html}-->
	</td>
</tr>
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
