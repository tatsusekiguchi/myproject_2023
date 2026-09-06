
<div class="header ovh">
	<div class="found">
    <div style="margin-bottom:15px; background: linear-gradient(transparent 60%, #ff0 0%); font-size:18px; width:29em; font-weight:bold;">roomRroom取り扱い総物件数<span style="font-size:30px;"> 521</span>棟<span style="font-size:30px;">1825</span>タイプ</div>
		<div class="count color03"><!--{if $cnt_bukken < 1}-->物件が見つかりませんでした<!--{else}--><span class="num"><!--{$cnt_bukken}--></span>件の物件が見つかりました<!--{/if}--></div>
		<!--{if $cnt_bukken > 0}-->
		<div class="display">[ <!--{$p.cnt_start}-->-<!--{if $cnt_bukken < $p.cnt_end}--><!--{$cnt_bukken}--><!--{else}--><!--{$p.cnt_end}--><!--{/if}-->件表示中 ]</div>
		<!--{/if}-->
		<div class="conditions color04">
			<!--{foreach from=$result_text item=v key=k}-->
			<div class="dib"><!--{$v}-->　</div>
			<!--{/foreach}-->
			<!--{if count($result_text) == 0}-->
			すべて表示
			<!--{/if}-->
			<!--名古屋駅前エリア　50,000〜70,000円　1R・1K-->
		</div>
	</div><!-- .found -->
	<!--{include file='pagenation.tpl'}-->
</div><!-- .header -->