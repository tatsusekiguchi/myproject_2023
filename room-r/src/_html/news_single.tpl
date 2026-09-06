<!--{php}-->
	while( have_posts() ):
		the_post();
		$cats = get_the_terms(get_the_ID(), 'category');
		$prevpost = get_adjacent_post(false,'',false);
		$nextpost = get_adjacent_post(false,'',true);
<!--{/php}-->
<!--{include file='header_subpage.tpl'}-->

	<div id="main">
		<div class="inner">
			<div class="topicpath w980 mra mla">
				<span><a href="<!--{$smarty.const.WEB_ROOT}-->/">HOME</a></span>
				<span><a href="<!--{$smarty.const.WEB_ROOT}-->/info/">＞ 新着情報</a></span>
				<span>＞ <!--{php}-->the_title();<!--{/php}--></span>
			</div><!-- .topicpath -->
			<h2 class="tac mb25"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/news/h_01.png" alt="新着情報" /></h2>
			<div id="box_area">
				<div class="inner">
					<div class="date"><!--{php}-->echo get_the_time('Y.m.d');<!--{/php}--> <div class="ico <!--{php}-->echo $cats[0]->slug;<!--{/php}-->"><!--{php}-->echo $cats[0]->name;<!--{/php}--></div></div>
					<h2><!--{php}-->the_title();<!--{/php}--></h2>
					<div class="postcontent">
						<!--{php}-->the_content();<!--{/php}-->
					</div>
					<div class="link_block tac">
					<!--{php}-->
					if(!empty($prevpost)):
						$id = $prevpost->ID;
						$cats = get_the_terms($id, 'category');
					<!--{/php}-->
						<div class="new">
							<a href="<!--{php}-->echo get_permalink($id);<!--{/php}-->" class="fade_on_hover">
								<div class="item">
									<div class="ico <!--{php}-->echo $cats[0]->slug;<!--{/php}-->"><!--{php}-->echo $cats[0]->name;<!--{/php}--></div>
									<div class="image"><!--{php}-->echo get_the_post_thumbnail($id,array(140, 93))<!--{/php}--></div>
									<p class="date"><!--{php}-->echo get_the_time("Y/m/d",$id);<!--{/php}--></p>
									<p class="title"><!--{php}-->echo get_the_title($id);<!--{/php}--></p>
								</div>
							</a>
						</div>
					<!--{php}--> endif; <!--{/php}-->
						<a href="<!--{$smarty.const.WEB_ROOT}-->/info/" class="dib mt50"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/news/btn_01.png" alt="記事一覧に戻る" class="fade_on_hover" /></a>
					<!--{php}-->
					if(!empty($nextpost)):
						$id = $nextpost->ID;
						$cats = get_the_terms($id, 'category');
					<!--{/php}-->
						<div class="old">
							<a href="<!--{php}-->echo get_permalink($id);<!--{/php}-->" class="fade_on_hover">
								<div class="item">
									<div class="ico <!--{php}-->echo $cats[0]->slug;<!--{/php}-->"><!--{php}-->echo $cats[0]->name;<!--{/php}--></div>
									<div class="image"><!--{php}-->echo get_the_post_thumbnail($id,array(140, 93))<!--{/php}--></div>
									<p class="date"><!--{php}-->echo get_the_time("Y/m/d",$id);<!--{/php}--></p>
									<p class="title"><!--{php}-->echo get_the_title($id);<!--{/php}--></p>
								</div>
							</a>
						</div>
					<!--{php}--> endif; <!--{/php}-->
					</div>
				</div>
			</div>
		</div>
	</div><!-- #main -->
<!--{php}-->
	endwhile;
<!--{/php}-->
<!--{include file='footer.tpl'}-->
