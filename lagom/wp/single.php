<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="eventDetail">
		<div class="eventKvPanel">
			<div class="kvTitle">
				<h1>NEWS&amp;EVENT</h1>
			</div>
		</div>
		<div class="postPanel">
			<div class="postPanel__wrap">
				<div class="postPanel__left">
					<div class="detail__event">
						<div class="titleHeader">
							<div class="titleHeader__info">
								<div class="time">
									<p><?php the_time("Y.m.d") ?></p>
								</div>
								<div class="cateBox">
									<div class="cate">
										<?php
											$category = get_the_category();
											$cat_name = $category[0]->cat_name;
											$cat_slug = $category[0]->category_nicename;
										?>
										<p><?php echo $cat_name; ?></p>
									</div>
								</div>
							</div>
							<div class="title">
								<div class="date">
									<p><?php the_field('event_date'); ?></p>
								</div>
								<h2><?php the_title(); ?></h2>
							</div>
						</div>
						<div class="thumbnailBox">
							<?php the_post_thumbnail('full'); ?>
						</div>
						<div class="postContents">
							<?php while (have_posts()) : the_post(); ?>
								<?php the_content(); ?>
							<?php endwhile; ?>
						</div>
					</div>
					<div class="btnBack"><a href="<?php echo home_url(); ?>/eventlist/">Page back</a></div>
				</div>
				<div class="postPanel__right">
					<div class="categoryList">
						<dl>
							<dt><span class="spHidden">Category</span><span class="spBreak">カテゴリ一覧</span></dt>
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
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>