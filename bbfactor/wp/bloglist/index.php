<?php
/*
Template Name: ブログ一覧
*/
?>
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
				<div class="list__blog">
					<?php
						$the_query = new WP_Query( array(
						'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
						'post_type'   => 'post',
						'posts_per_page' => 9,
						) ); ?>
					<?php if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
					<div class="list__blog__section">
						<a href="<?php the_permalink() ?>">
							<div class="photo"><?php the_post_thumbnail('full'); ?></div>
							<div class="txtBox">
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
									<p><?php the_title(); ?></p>
								</div>
							</div>
						</a>
					</div>
					<?php endwhile; ?>
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
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>