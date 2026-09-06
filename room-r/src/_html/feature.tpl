<!--{include file='header_subpage.tpl'}-->

	<div id="main">
		<div class="inner">
			<div class="topicpath w980 mra mla">
				<span><a href="<!--{$smarty.const.WEB_ROOT}-->/">HOME</a></span>
				<span>＞ <!--{$f_title}--></span>
			</div><!-- .topicpath -->
			<h2 class="tac"><img src="src/img/feature/h_01.png" alt="こだわりの特集物件" /></h2>
			<h3 class="tac mt25"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/feature/main_<!--{$f}-->.png" alt="<!--{$f_title}-->"></h3>
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
