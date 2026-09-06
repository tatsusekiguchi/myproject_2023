<!--{include file='header_subpage.tpl'}-->

	<div id="main">
		<div class="inner">
			<div class="topicpath w980 mra mla">
				<span><a href="<!--{$smarty.const.WEB_ROOT}-->/">HOME</a></span>
				<span>＞ 条件検索</span>
			</div><!-- .topicpath -->
			<h2 class="tac"><img src="src/img/search/h_01.png" alt="条件検索" /></h2>
			<form action="./search.html#result" method="post">
				<div id="search-cond" class="mt25">
					<div class="w800 mra mla pt30">
						<!--{include file='search_box.tpl'}-->
					</div>
					<div class="tac mt20"><input type="image" src="src/img/area/b_search.png" alt="検索する" class="fade_on_hover" /></a></div>
				</div><!-- #search-cond -->
			</form>
			<div id="result">
				<div class="w980 mra mla">
					<!--{include file='search_found.tpl'}-->
					<!--{include file='list.tpl'}-->
					<div class="pagination-block">
						<!--{include file='pagenation.tpl'}-->
					</div><!-- .pagination-block -->
				</div>
			</div><!-- #result -->
		</div><!-- .inner -->
	</div><!-- #main -->

<!--{include file='footer.tpl'}-->
