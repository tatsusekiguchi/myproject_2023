<?php
/*
Template Name: キャスト一覧
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="castMain">
		<div class="pageKvContainer">
			<div class="kvLogo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/top_shop_logo.png" alt="confreAell"></a></div>
			<div class="pageKvPanel">
				<div class="kvTitle">
					<h1><img src="<?php bloginfo('template_url'); ?>/image/cast/kv_title.png" alt="キャスト"></h1>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01">
				<div class="listPanel pink">
					<ul>
						<?php
			                $the_query = new WP_Query( array(
			                  'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
			                  'post_type'   => 'cast',
			                  'posts_per_page' => 8,
			            	));
							$count = 1;
						?>
						<?php if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li>
							<a href="<?php the_permalink() ?>">
								<div class="photo"><?php the_post_thumbnail('full'); ?></div>
								<div class="nameBox">
									<p><?php the_title(); ?></p>
								</div>
							</a>
						</li>
						<?php $count++; endwhile; ?>
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
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>