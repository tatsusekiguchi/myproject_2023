<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="newsMain">
		<div class="pageKvContainer">
			<div class="kvLogo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/top_shop_logo.png" alt="confreAell"></a></div>
			<div class="pageKvPanel">
				<div class="kvTitle">
					<h1><img src="<?php bloginfo('template_url'); ?>/image/news/kv_title.png" alt="お知らせ・イベント"></h1>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01">
				<div class="blogContainer fadein">
					<div class="rightPanel">
						<div class="cateBox">
							<dl>
								<dt><img src="<?php bloginfo('template_url'); ?>/image/news/title_category.png" alt="カテゴリー"></dt>
								<dd>
									<ul>
										<li><a href="<?php echo home_url() ?>/newslist">ALL</a></li>
										<?php $cat_info = get_categories('orderby=count&order=desc&show_count=1&title_li=');
											foreach ($cat_info as $category) { if($category->count != 0) : ?>
											<li><a href="<?php echo home_url() ?>/category/<?php echo $category->category_nicename; ?>/"><?php echo $category->cat_name; ?></a></li>
										<?php endif; };?>
									</ul>
								</dd>
							</dl>
						</div>
					</div>
					<div class="leftPanel">
						<div class="newsList">
							<ul>
								<?php if(have_posts()): while(have_posts()):the_post(); ?>
								<li>
									<a href="<?php the_permalink() ?>">
										<div class="photo"><?php the_post_thumbnail('full'); ?></div>
										<div class="txtBox">
											<div class="timeBox">
												<p><em><?php the_time("Y.m.d") ?></em><span><?php echo date('D', strtotime(get_the_time('Y-m-d'))); ?></span></p>
											</div>
											<div class="titleBox">
												<p><?php the_title(); ?></p>
											</div>
										</div>
									</a>
								</li>
								<?php endwhile; endif; ?>
							</ul>
						</div>
						<div class="list__pagination">
							<?php
							//Pagenation
							if (function_exists("responsive_pagination")) {
								$GLOBALS['wp_query']->max_num_pages = $the_query->max_num_pages;
								responsive_pagination($additional_loop->max_num_pages);
								wp_reset_postdata();
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>