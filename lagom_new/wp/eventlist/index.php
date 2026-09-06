<?php
/*
Template Name: イベント・新着情報一覧
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="eventList">
		<div class="postPanel">
			<div class="postPanel__wrap">
				<div class="postPanel__left">
					<div class="titleBox">
						<h1>News and<br>Event</h1>
					</div>
					<div class="categoryList">
						<dl>
							<dt>Category</dt>
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
				<div class="postPanel__right">
					<div class="list__event">
						<ul>
							<?php
								$the_query = new WP_Query( array(
								'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
								'post_type'   => 'post',
								'posts_per_page' => 8,
							) ); ?>
							<?php if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
							<li>
								<a href="<?php the_permalink() ?>">
									<div class="photoBox">
										<div class="photo">
											<?php the_post_thumbnail('full'); ?>
										</div>
									</div>
									<div class="txtBox">
										<div class="info">
											<div class="time">
												<p><?php the_time("Y.m.d") ?></p>
											</div>
											<div class="cate">
												<?php
													$category = get_the_category();
													$cat_name = $category[0]->cat_name;
													$cat_slug = $category[0]->category_nicename;
												?>
												<p><?php echo $cat_name; ?></p>
											</div>
										</div>
										<div class="date">
											<p><?php the_field('event_date'); ?></p>
										</div>
										<div class="title">
											<p><?php the_title(); ?></p>
										</div>
									</div>
								</a>
							</li>
							<?php endwhile; ?>
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
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>