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
<title>部屋一覧</title>
</head>
<body>
<div id="wrapper">
	<!--{include file='menu.tpl'}-->

	<div id="main" class="sd01">
		<div class="inner">
			<h1>部屋一覧</h1>
			<!--{* include file='search.tpl' *}-->

			<!--{if !empty($result) && is_array($result)}--><div class="result<!--{if $result.res}--> done<!--{else}--> error<!--{/if}-->"><!--{$result.mes}--></div><!--{/if}-->

			<div id="area_list">
				<!--{*
				<ul class="pagination">
					<!--{if $p.page > 1}-->
					<li class="prev"><a href="houseList.php?page=<!--{$p.page-1}--><!--{$urlp}--><!--{$urlps.sort}--><!--{$op}-->">前へ</a></li>
					<!--{/if}-->

					<!--{foreach from=$p.pagination item=v}-->
					<li<!--{if $p.page == $v}--> class="on"<!--{/if}-->><a href="houseList.php?page=<!--{$v}--><!--{$urlp}--><!--{$urlps.sort}--><!--{$op}-->"><!--{$v}--></a></li>
					<!--{/foreach}-->

					<!--{if $p.cnt_all > $p.page*$smarty.const.NUM_PAR_PAGE}-->
					<li class="next"><a href="houseList.php?page=<!--{$p.page+1}--><!--{$urlp}--><!--{$urlps.sort}--><!--{$op}-->">次へ</a></li>
					<!--{/if}-->
				</ul>
				*}-->

				<form action="" method="post">
				<input type="hidden" name="building_id" value="<!--{$bid}-->" />

				<div class="mb30"><input type="image" src="img/btn_update_all.png" alt="一括更新" class="have_effect" /></div>

				<table class="style_l">
					<tr>
						<th class="first" style="width:64px;">物件番号</th>
						<th style="width:40px;">公開</th>
						<th style="width:56px;">非公開</th>
						<th>物件名</th>
						<th style="width:50px;"><a href="houseList.php<!--{$sort_link_param.house_no_c}-->&bid=<!--{$bid}--><!--{$urlp}-->">タイプ</a></th>
						<th style="width:80px;"><a href="houseList.php<!--{$sort_link_param.rental_price_c}-->&bid=<!--{$bid}--><!--{$urlp}-->">家賃</a></th>
						<th style="width:64px;"><a href="houseList.php<!--{$sort_link_param.layout_c}-->&bid=<!--{$bid}--><!--{$urlp}-->">間取り</a></th>
						<th style="width:40px;"><a href="houseList.php<!--{$sort_link_param.floor_c}-->&bid=<!--{$bid}--><!--{$urlp}-->">階数</a></th>
						<th style="width:150px;">沿線</th>
					</tr>
					<!--{section name=b loop=$buildings}-->
					<!--{assign var=event_c value=`$buildings[b].event_c`}-->
					<!--{assign var=status_c value=`$buildings[b].status_c`}-->
					<!--{assign var=bstatus value=`$buildings[b].bstatus`}-->
					<!--{assign var=building_id_c value=`$buildings[b].building_id_c`}-->

					<!--{assign var=layout_c value=$buildings[b].layout_c}-->
					<!--{assign var=transport1_c value=$buildings[b].transport1_c}-->
					<!--{assign var=transport2_c value=$buildings[b].transport2_c}-->
					<!--{assign var=station1_c value=$buildings[b].station1_c}-->
					<!--{assign var=station2_c value=$buildings[b].station2_c}-->
					<tr<!--{if !empty($buildings[b].auto_private)}--> style="background:#fcc;"<!--{/if}-->>
						<td class="first">
							<div class="num">
								<div><!--{$buildings[b].building_no_c|escape}--></div>
								<div class="hidden">
									<div class="rightside">部屋情報：<!--{$statuses.$status_c|escape}--></div>
									<ul class="menu_item">
										<li style="margin-right:20px;"><span class="btn_slideup clickable have_effect"><img src="img/btn_slideup.png" alt="閉じる" /></span></li>
										<li><a href="../detail.php?b=<!--{$building_id_c}-->&h=<!--{$buildings[b].house_id_c|escape}-->" target="_blank" class="have_effect"><img src="img/btn_preview_02.png" alt="プレビュー" /></a></li>
										<!--{if $user_auth_level <= 2}-->
										<li><a href="houseEdit.php?bid=<!--{$bid}-->&hid=<!--{$buildings[b].house_id_c|escape}-->" class="have_effect"><img src="img/btn_edit.png" alt="編集する" /></a></li>
										<li><a href="houseEdit.php?bid=<!--{$bid}-->&hid=<!--{$buildings[b].house_id_c|escape}-->&cp=y" class="have_effect"><img src="img/btn_copy.png" alt="複製する" /></a></li>
										<li><a href="houseList.php?hid=<!--{$buildings[b].house_id_c|escape}-->&dl=y&bid=<!--{$bid}-->" onclick="javascript:return deleteAlert();" class="have_effect"><img src="img/btn_delete.png" alt="削除する" /></a></li>
										<!--{/if}-->
									</ul>
								</div>
							</div>
						</td>
						<td><input type="radio" name="houses_publish[<!--{$buildings[b].house_id_c|escape}-->]" value="1" <!--{if $status_c == 1}-->checked="checked" <!--{/if}-->/></td>
						<td><input type="radio" name="houses_publish[<!--{$buildings[b].house_id_c|escape}-->]" value="2" <!--{if $status_c == 2}-->checked="checked" <!--{/if}-->/></td>
						<td><!--{$buildings[b].building_name_c|escape}--></td>
						<td><!--{$buildings[b].house_no_c|escape}--></td>
						<td><!--{$buildings[b].rental_price_c|escape}-->円</td>
						<td><!--{$layout[$layout_c]}--></td>
						<td><!--{$buildings[b].floor_c|escape}-->階</td>
						<td><!--{$transport[$transport1_c]}--><!--{$station[$station1_c]}-->駅<br />徒歩<!--{$buildings[b].distance1_c|escape}-->分</td>
					</tr>
					<!--{/section}-->
				</table>

				<div class="mt30"><input type="image" src="img/btn_update_all.png" alt="一括更新" class="have_effect" /></div>

				</form>
			</div>

			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>



















<!--{*
<div id="header"><h1>部屋一覧</h1></div>
<div class="clear"></div>
<div id="content">
<div id="menu">
<!--{include file='menu.tpl'}-->
</div>
<div id="main">
<form action="houseList.php" method="post">
<!--{include file='search.tpl'}-->
<div class="clear">&nbsp;</div>
<table border="1" style="width: 730px;">
<tr>
	<th>物件番号</th>
	<th>物件名</th>
	<th>タイプ</th>
	<th>家賃</th>
	<th>間取り</th>
	<th>沿線</th>
	<th>部屋公開状態</th>
	<th>建物公開状態</th>
	<!--{if $user_auth_level <= 2}-->
	<th>編集</th>
	<!--{/if}-->
</tr>
<!--{section name=b loop=$buildings}-->
<!--{assign var=event_c value=`$buildings[b].event_c`}-->
<!--{assign var=status_c value=`$buildings[b].status_c`}-->
<!--{assign var=bstatus value=`$buildings[b].bstatus`}-->
<!--{assign var=building_id_c value=`$buildings[b].building_id_c`}-->

<!--{assign var=layout_c value=$buildings[b].layout_c}-->
<!--{assign var=transport1_c value=$buildings[b].transport1_c}-->
<!--{assign var=transport2_c value=$buildings[b].transport2_c}-->
<!--{assign var=station1_c value=$buildings[b].station1_c}-->
<!--{assign var=station2_c value=$buildings[b].station2_c}-->
<tr class="ASC">
<td><!--{$buildings[b].building_no_c|escape}--></td>
<td><a href="../detail.php?b=<!--{$building_id_c}-->&h=<!--{$buildings[b].house_id_c|escape}-->" target="_blank"><!--{$buildings[b].building_name_c|escape}--></a></td>
<td><a href="../detail.php?b=<!--{$building_id_c}-->&h=<!--{$buildings[b].house_id_c|escape}-->" target="_blank"><!--{$buildings[b].house_no_c|escape}--></a></td>
<td><!--{$buildings[b].rental_price_c|escape}-->円</td>
<td><!--{$layout[$layout_c]}--></td>
<td><!--{$transport[$transport1_c]}--><!--{$station[$station1_c]}-->駅&nbsp;徒歩<!--{$buildings[b].distance1_c|escape}-->分</td>
<td><!--{$statuses.$status_c|escape}--></td>
<td><!--{$statuses.$bstatus|escape}--></td>
<!--{if $user_auth_level <= 2}-->
<td><a href="houseEdit.php?bid=<!--{$buildings[b].building_id_c|escape}-->&hid=<!--{$buildings[b].house_id_c|escape}-->">編集</a></td>
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
