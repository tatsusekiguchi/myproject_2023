<!--{include file='header_subpage.tpl'}-->

	<div id="main">
		<div class="inner">
			<div class="topicpath w980 mra mla">
				<span><a href="<!--{$smarty.const.WEB_ROOT}-->/">HOME</a></span>
				<span>＞ エリア検索</span>
			</div><!-- .topicpath -->
			<h2 class="tac"><img src="src/img/area/h_01.png" alt="エリア検索" /></h2>
			<form action="./area.html#result" method="post">
				<div id="search-area" class="mt25">
<!--{include file='search_by_area_map_form_inner.tpl'}-->
				</div><!-- #search-area -->
				<div id="search-cond">
					<h3 class="tac"><img src="src/img/area/h_02.png" alt="条件をつけて絞り込む" /></h3>
					<div class="w800 mra mla mt15">
						<!--{include file='search_box.tpl'}-->
					</div>
					<div class="tac mt20"><input type="image" src="src/img/area/b_search.png" alt="検索する" class="fade_on_hover" /></div>
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
