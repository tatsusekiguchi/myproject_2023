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
						<div class="newsDetail">
							<div class="titleHeader">
								<div class="title">
									<h2><?php the_title(); ?></h2>
								</div>
								<div class="time">
									<p><?php the_time("Y.m.d") ?></p>
								</div>
							</div>
							<div class="cntBody">
								<div class="thumbnailBox"><?php the_post_thumbnail('full'); ?></div>
								<div class="postContents">
									<?php while (have_posts()) : the_post(); ?>
										<?php the_content(); ?>
									<?php endwhile; ?>
								</div>
								<div class="pagingBox">
									<ul>
										<li><?php previous_post_link('%link', '&lt; 前の記事'); ?></li>
										<li><?php next_post_link('%link', '次の記事 &gt;'); ?></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>