<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="blog">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<h1>ブログ</h1>
			</div>
		</div>
		<div class="sectionContainer">
			<div class="secWrap01">
				<div class="categoryList">
					<dl>
						<dt>カテゴリ</dt>
						<dd>
							<ul>
								<?php $cat_info = get_categories('orderby=count&order=desc&show_count=1&title_li=');
								foreach ($cat_info as $category) { if($category->count != 0) : ?>
								<li><a href="<?php echo home_url() ?>/category/<?php echo $category->category_nicename; ?>/"><?php echo $category->cat_name; ?></a></li>
								<?php endif; };?>
							</ul>
						</dd>
					</dl>
				</div>
				<div class="detail__blog">
					<div class="titleHeader">
						<div class="infoBox">
							<div class="time">
								<p><?php the_time("Y.m.d") ?></p>
							</div>
							<?php
								$category = get_the_category();
								$cat_name = $category[0]->cat_name;
								$cat_slug = $category[0]->category_nicename;
							?>
							<div class="cate">
								<p><?php echo $cat_name; ?></p>
							</div>
						</div>
						<div class="title">
							<h2><?php the_title(); ?></h2>
						</div>
					</div>
					<div class="thumbnailBox"><?php the_post_thumbnail('full'); ?></div>
					<div class="postContents">
						<?php while (have_posts()) : the_post(); ?>
							<?php the_content(); ?>
						<?php endwhile; ?>
					</div>
				</div>
				<div class="btnBack"><a href="<?php echo home_url(); ?>/bloglist/"><span>一覧に戻る</span></a></div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>