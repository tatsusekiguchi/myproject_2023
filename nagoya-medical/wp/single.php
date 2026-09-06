<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="postMain" id="news">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<p>NEWS</p>
				<h2>新着情報</h2>
			</div>
		</div>
		<div class="postPanel">
			<div class="secWrap01">
				<div class="categoryList">
					<ul>
						<li><a href="<?php echo home_url() ?>/newslist">ALL</a></li>
						<?php $cat_info = get_categories('orderby=count&order=desc&show_count=1&title_li=');
							foreach ($cat_info as $category) { if($category->count != 0) : ?>
							<li><a href="<?php echo home_url() ?>/category/<?php echo $category->category_nicename; ?>/"><?php echo $category->cat_name; ?></a></li>
						<?php endif; };?>
					</ul>
				</div>
				<div class="detail__news">
					<div class="titleHeader">
						<div class="infoBox">
							<p class="time"><?php the_time("Y.m.d") ?></p>
							<?php
								$category = get_the_category();
								$cat_name = $category[0]->cat_name;
								$cat_slug = $category[0]->category_nicename;
							?>
							<p class="cate"><?php echo $cat_name; ?></p>
						</div>
						<div class="title">
							<h3><?php the_title(); ?></h3>
						</div>
					</div>
					<div class="thumbnailBox"><?php the_post_thumbnail('full'); ?></div>
					<div class="postContents">
						<?php while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					</div>
				</div>
				<div class="detail__back">
					<div class="btnBack"><a href="<?php echo home_url(); ?>/newslist/"><span>戻る</span></a></div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>