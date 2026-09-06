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
<script type="text/javascript" src="js/searchensen.js"></script>
<script type="text/javascript">
/* Cookie への書き出し
引数 key　 : データキー （半角英数 _ のみ）
引数 value : データの値（日本語可）
引数 days  : データを保持する日数（ 0 の時は有効期限は省略）*/
function WriteCookie(key, value, days)
{
	var str = key + "=" + escape(value) + ";";	  // 書き出す値１ : key=value
	if (days != 0) {								/* 日数 0 の時は省略 */
		var dt = new Date();					   // 現在の日時
		dt.setDate(dt.getDate() + days);			// days日後の日時
		str += "expires=" + dt.toGMTString() + ";"; // 書き出す値２ : 有効期限
	}
	document.cookie = str;						  // Cookie に書き出し
}

/* Cookie の読み込み
引数 key : 求める値のキー
戻り値　 : 値（ない時は空文字""）*/
function ReadCookie(key) {
	var sCookie = document.cookie;	// Cookie文字列
	var aData = sCookie.split(";");	   // ";"で区切って"キー=値"の配列にする
	var oExp = new RegExp(" ", "g");   // すべての半角スペースを表す正規表現
	key = key.replace(oExp, "");		  // 引数keyから半角スペースを除去

	var i = 0;
	while (aData[i]) {						   /* 語句ごとの処理 : マッチする要素を探す */
		var aWord = aData[i].split("=");						 // さらに"="で区切る
		aWord[0] = aWord[0].replace(oExp, "");			  // 半角スペース除去
		if (key == aWord[0]) return unescape(aWord[1]); // マッチしたら値を返す
		if (++i >= aData.length) break;						  // 要素数を超えたら抜ける
	}
	return "";								   // 見つからない時は空文字を返す
}


function deleteAlert() {
	var con = confirm("削除します、よろしいですか？");
	return con;
}
</script>
<title>建物一覧</title>
<script type="text/javascript">
$(window).bind("load",function(){
	$("#menu_top > li").eq(0).addClass("on");

	$("#area_list .style_l tr:not(.no_menu) td, .area_list .style_l tr:not(.no_menu) td").each(function(){
		if( $(this).hasClass("clickable") ){
			$(this).parents('tr').find('td').removeClass('clickable');
			var h = $(this).find('.hidden').show().innerHeight();
			$(this).parents('tr').find('.num').height($(this).height()).css({'padding-bottom': h+18+'px'});
		}
	});
});
</script>
</head>
<body>
<div id="wrapper" class="buildingsList">
	<!--{include file='menu.tpl'}-->

	<div id="main" class="sd01">
		<div class="inner">
			<h1>建物一覧</h1>

			<!--{if !empty($result) && is_array($result)}--><div class="result<!--{if $result.res}--> done<!--{else}--> error<!--{/if}-->"><!--{$result.mes}--></div><!--{/if}-->

			<!--{assign var="srch_form_target" value="buildingsList.php"}-->
			<!--{include file='searchBuilding.tpl'}-->

			<div id="area_list">
				<p>該当物件数：<strong style="font-size:20px; font-weight: bold;"><!--{$p.cnt_all}--></strong>件</p>
				<ul class="pagination">
					<!--{if $p.page > 1}-->
					<li class="prev"><a href="buildingsList.php?page=<!--{$p.page-1}--><!--{$urlp}--><!--{$urlps.sort}--><!--{$op}-->">前へ</a></li>
					<!--{/if}-->

					<!--{foreach from=$p.pagination item=v}-->
					<li<!--{if $p.page == $v}--> class="on"<!--{/if}-->><a href="buildingsList.php?page=<!--{$v}--><!--{$urlp}--><!--{$urlps.sort}--><!--{$op}-->"><!--{$v}--></a></li>
					<!--{/foreach}-->

					<!--{if $p.cnt_all > $p.page*$smarty.const.NUM_PAR_PAGE}-->
					<li class="next"><a href="buildingsList.php?page=<!--{$p.page+1}--><!--{$urlp}--><!--{$urlps.sort}--><!--{$op}-->">次へ</a></li>
					<!--{/if}-->
				</ul>

				<form action="" method="post">
				<div class="mb10"><input type="image" src="img/btn_update_all.png" alt="一括更新" class="have_effect" height="28" /></div>
				<p style="padding:5px;"><span style="background: #fcc";>背景赤</span>・・・30日以上更新がない　<span style="background: #ffc";>背景黄</span>・・・14日以上更新がない　<span style="background: #ccf";>背景青</span>・・・7日以上更新がない</p>
				<table class="style_l">
				<tbody>
					<tr>
						<th class="first" style="width:95px;"><a href="buildingsList.php<!--{$sort_link_param.building_no_c}--><!--{$urlp}-->">物件番号</a></th>
						<th><a href="buildingsList.php<!--{$sort_link_param.building_name_c}--><!--{$urlp}-->">物件名</a></th>
						<th>沿線</th>
						<th class="last" style="width:85px;">公開状況</th>
					</tr>
					<!--{section name=b loop=$buildings}-->
					<!--{assign var=event_c value=`$buildings[b].event_c`}-->
					<!--{assign var=status_c value=`$buildings[b].status_c`}-->
					<!--{assign var=building_id_c value=`$buildings[b].building_id_c`}-->

					<!--{assign var=layout_c value=$buildings[b].layout_c}-->
					<!--{assign var=transport1_c value=$buildings[b].transport1_c}-->
					<!--{assign var=transport2_c value=$buildings[b].transport2_c}-->
					<!--{assign var=station1_c value=$buildings[b].station1_c}-->
					<!--{assign var=station2_c value=$buildings[b].station2_c}-->
					<tr<!--{if false && !empty($buildings[b].has_auto_private)}--> style="background:#fcc;"<!--{/if}-->>
						<td class="first">
							<div class="num">
								<div><!--{$buildings[b].building_no_c|escape}--></div>
								<div class="hidden">
									<table class="buildingrooms">
										<tbody>
											<tr>
												<td style="width:100px;">タイプ</td>
												<td style="width:140px;">家賃</td>
												<td style="width:50px; font-size: 12px;">空き有り</td>
												<td style="width:50px; font-size: 12px;">空きなし</td>
												<td style="width:50px; font-size: 12px;">確認中</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
												<td>&nbsp;</td>
											</tr>
<!--{php}-->
$rooms = $this->get_template_vars('rooms');
$building_id = $this->get_template_vars('building_id_c');
if( !empty($rooms[$building_id]) ){
	while( list($k, $v) = each($rooms[$building_id]) ){
		foreach($v as $k2 => $v2){ $v[$k2] = htmlspecialchars($v2);}
		$checked_1 = ( $v['status_c'] == 1 ) ? "checked=\"checked\" ": "";
		$checked_2 = ( $v['status_c'] == 2 ) ? "checked=\"checked\" ": "";
		$checked_3 = ( $v['status_c'] == 3 ) ? "checked=\"checked\" ": "";
		/*
		$highlight = ( !empty($v['auto_private']) ) ? " style=\"background:#fcc;\"": "";
		*/
		$highlight = '';
		$mod_date = '';
		$mod_date_time = 0;
		if(empty($v['mod_date_c'])){
			$mod_date = '<br /><span style="font-size: 11px;">'.date("Y/m/d",strtotime($v['reg_date_c'])).'更新</span>';
			$mod_date_time = strtotime($v['reg_date_c']);
		}else{
			$mod_date = '<br /><span style="font-size: 11px;">'.date("Y/m/d",strtotime($v['mod_date_c'])).'更新</span>';
			$mod_date_time = strtotime($v['mod_date_c']);
		}
		$now = strtotime(date("Y/m/d"));
		if($mod_date_time <= $now-(60*60*24*7) && $mod_date_time > $now-(60*60*24*14) ){
			$highlight = " style=\"background:#ccf;\"";
		}elseif($mod_date_time <= $now-(60*60*24*14) && $mod_date_time > $now-(60*60*24*30) ){
			$highlight = " style=\"background:#ffc;\"";
		}elseif($mod_date_time <= $now-(60*60*24*30) ){
			$highlight = " style=\"background:#fcc;\"";
		}
		echo <<< EOD
											<tr{$highlight}>
												<td>{$v['house_no_c']}{$mod_date}</td>
												<td>{$v['rental_price_c']}円</td>
												<td><input type="radio" name="houses_publish[{$building_id}][{$v['house_id_c']}]" value="1" {$checked_1}/></td>
												<td><input type="radio" name="houses_publish[{$building_id}][{$v['house_id_c']}]" value="2" {$checked_2}/></td>
												<td><input type="radio" name="houses_publish[{$building_id}][{$v['house_id_c']}]" value="3" {$checked_3}/></td>
												<td><a href="houseEdit.php?bid={$building_id}&amp;hid={$v['house_id_c']}">編集</a></td>
												<td><a href="houseEdit.php?bid={$building_id}&amp;hid={$v['house_id_c']}&amp;cp=y">複製</a></td>
												<td><a href="houseList.php?bid={$building_id}&amp;hid={$v['house_id_c']}&amp;dl=y&amp;back2buildingsList=1" onclick="javascript:return deleteAlert();">削除</a></td>
												<td><a href="../detail.php?b={$building_id}&amp;h={$v['house_id_c']}" target="_blank">プレビュー</a></td>
											</tr>
EOD;
	}
}
<!--{/php}-->
										</tbody>
									</table>

									<ul class="menu_item mt10">
										<li><a href="../detail.php?b=<!--{$building_id_c}-->" target="_blank" class="have_effect"><img src="img/btn_preview.png" alt="プレビュー" /></a></li>
										<!--{if $user_auth_level <= 2}-->
										<li><a href="buildingEdit.php?id=<!--{$buildings[b].building_id_c|escape}-->" class="have_effect"><img src="img/btn_edit.png" alt="編集する" /></a></li>
										<li><a href="buildingsList.php?id=<!--{$buildings[b].building_id_c|escape}-->&amp;dl=y" onclick="javascript:return deleteAlert();" class="have_effect"><img src="img/btn_delete.png" alt="削除する" /></a></li>
										<li><a href="houseEdit.php?bid=<!--{$buildings[b].building_id_c|escape}-->" class="have_effect"><img src="img/btn_add_house.png" alt="お部屋を新規追加する" /></a></li>
										<!--{/if}-->
									</ul>
								</div>
							</div>
						</td>
						<td><!--{$buildings[b].building_name_c|escape}--></td>
						<td><!--{$transport[$transport1_c]}--><!--{$station[$station1_c]}-->駅&nbsp;徒歩<!--{$buildings[b].distance1_c|escape}-->分</td>
						<td class="last"><!--{$statuses.$status_c|escape}--></td>
					</tr>
					<!--{/section}-->
				</tbody>
				</table>
				<div class="mt10"><input type="image" src="img/btn_update_all.png" alt="一括更新" class="have_effect" height="28" /></div>
				</form>
			</div>

			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>
















<!--{*
<div id="header"><h1>建物一覧</h1></div>
<div class="clear"></div>
<div id="content">
<div id="menu">
<!--{include file='menu.tpl'}-->
</div>
<div id="main">
<form action="buildingsList.php" method="post">
<!--{include file='searchBuilding.tpl'}-->
<div class="clear">&nbsp;</div>
<p>※背景がピンクの物件は公開部屋数が8件を超えている物件です。</p>
<table border="1" style="width: 730px">
<tr>
	<th>物件番号</th>
	<th>物件名</th>
	<th>沿線</th>
	<th>公開</th>
	<!--{if $user_auth_level <= 2}-->
	<th>編集</th>
	<th>削除</th>
	<!--{/if}-->
</tr>
<!--{section name=b loop=$buildings}-->
<!--{assign var=event_c value=`$buildings[b].event_c`}-->
<!--{assign var=status_c value=`$buildings[b].status_c`}-->
<!--{assign var=building_id_c value=`$buildings[b].building_id_c`}-->

<!--{assign var=layout_c value=$buildings[b].layout_c}-->
<!--{assign var=transport1_c value=$buildings[b].transport1_c}-->
<!--{assign var=transport2_c value=$buildings[b].transport2_c}-->
<!--{assign var=station1_c value=$buildings[b].station1_c}-->
<!--{assign var=station2_c value=$buildings[b].station2_c}-->
<tr class="ASC<!--{if $buildings[b].house_count_c > 8}--> backpink<!--{/if}-->">
<td><!--{$buildings[b].building_no_c|escape}--></td>
<td><a href="../detail.php?b=<!--{$building_id_c}-->" target="_blank"><!--{$buildings[b].building_name_c|escape}--></a></td>
<td><!--{$transport[$transport1_c]}--><!--{$station[$station1_c]}-->駅&nbsp;徒歩<!--{$buildings[b].distance1_c|escape}-->分</td>
<td><!--{$statuses.$status_c|escape}--></td>
<!--{if $user_auth_level <= 2}-->
<td><a href="buildingEdit.php?id=<!--{$buildings[b].building_id_c|escape}-->">編集</a></td>
<td><a href="buildingsList.php?id=<!--{$buildings[b].building_id_c|escape}-->&dl=y" onclick="javascript:return deleteAlert();">削除</a></td>
<!--{/if}-->
</tr>
<!--{/section}-->
</table>
</form>
</div>
<div class="clear"></div>
</div>
<div class="clear">&nbsp;</div>
</body>
</html>
*}-->
