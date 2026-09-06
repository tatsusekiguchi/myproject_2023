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

$(function(){
	<!--{if $altFlg}-->
		alert("順位を更新しました");
	<!--{/if}-->
});

</script>
<title>順位変更</title>
<script type="text/javascript">
$(function(){
	$("#menu_top > li").eq(1).addClass("on");
});
</script>
</head>
<body>
<div id="wrapper">
	<!--{include file='menu.tpl'}-->

	<div id="main" class="sd01">
		<div class="inner">
			<h1>順位変更</h1>
			<!--{assign var="srch_form_target" value="sortEdit.php?`$pageMode`=`$pageVal`"}-->
			<!--{include file='searchBuilding.tpl'}-->

			<div id="area_list">
				<p>該当物件数：<strong style="font-size:20px; font-weight: bold;"><!--{$p.cnt_all}--></strong>件</p>
				<ul class="pagination">
					<!--{if $p.page > 1}-->
					<li class="prev"><a href="<!--{$srch_form_target}-->&page=<!--{$p.page-1}--><!--{$urlp}--><!--{$urlps.sort}--><!--{$op}-->">前へ</a></li>
					<!--{/if}-->
				
					<!--{foreach from=$p.pagination item=v}-->
					<li<!--{if $p.page == $v}--> class="on"<!--{/if}-->><a href="<!--{$srch_form_target}-->&page=<!--{$v}--><!--{$urlp}--><!--{$urlps.sort}--><!--{$op}-->"><!--{$v}--></a></li>
					<!--{/foreach}-->
				
					<!--{if $p.cnt_all > $p.page*$smarty.const.NUM_PAR_PAGE}-->
					<li class="next"><a href="<!--{$srch_form_target}-->&page=<!--{$p.page+1}--><!--{$urlp}--><!--{$urlps.sort}--><!--{$op}-->">次へ</a></li>
					<!--{/if}-->
				</ul>

				<form action="<!--{$srch_form_target}-->" method="post">
				<table class="style_l">
					<tr>
						<th class="first" style="width:95px;"><a href="sortEdit.php<!--{$sort_link_param.building_no_c}-->&<!--{$pageMode}-->=<!--{$pageVal}--><!--{$urlp}-->">物件番号</a></th>
						<th><a href="sortEdit.php<!--{$sort_link_param.building_name_c}-->&<!--{$pageMode}-->=<!--{$pageVal}--><!--{$urlp}-->">物件名</a></th>
						<th>沿線</th>
						<th style="width:85px;">公開状況</th>
						<th class="last" style="width:85px;">表示順位</th>
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
					<tr class="no_menu">
						<td class="first">
							<div class="num">
								<div><!--{$buildings[b].building_no_c|escape}--></div>
							</div>
						</td>
						<td><!--{$buildings[b].building_name_c|escape}--></td>
						<td><!--{$transport[$transport1_c]}--><!--{$station[$station1_c]}-->駅&nbsp;徒歩<!--{$buildings[b].distance1_c|escape}-->分</td>
						<td class="last"><!--{$statuses.$status_c|escape}--></td>
						<td style="width: 60px; text-align: center;">
							<!--{if $pageMode == "sincyaku"}--><!--{assign var=sort_val value=$buildings[b].sort_sincyaku_c}--><!--{/if}-->
							<!--{if $pageMode == "area"}--><!--{assign var=sort_val value=$buildings[b].sort_area_c}--><!--{/if}-->
							<!--{if $pageMode == "ensen"}--><!--{assign var=sort_val value=$buildings[b].sort_ensen_c}--><!--{/if}-->
							<!--{if $pageMode == "fid"}--><!--{assign var=sort_val value=$buildings[b].sort_c}--><!--{/if}-->
							<input type="text" size="2" value="<!--{$sort_val|escape}-->" name="sort[<!--{$buildings[b].building_id_c}-->]">
						</td>
					</tr>
					<!--{/section}-->
				</table>
				<div class="right mt20"><input type="submit" name="renewSort" value="順位を更新" /></div>
				</form>
			</div>

			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>
