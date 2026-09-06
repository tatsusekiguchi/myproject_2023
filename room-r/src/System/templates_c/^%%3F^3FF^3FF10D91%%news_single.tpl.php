<?php /* Smarty version 2.6.26, created on 2016-03-03 09:30:41
         compiled from news_single.tpl */ ?>
<?php 
	while( have_posts() ):
		the_post();
		$cats = get_the_terms(get_the_ID(), 'category');
		$prevpost = get_adjacent_post(false,'',false);
		$nextpost = get_adjacent_post(false,'',true);
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header_subpage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="main">
		<div class="inner">
			<div class="topicpath w980 mra mla">
				<span><a href="<?php echo @WEB_ROOT; ?>
/">HOME</a></span>
				<span><a href="<?php echo @WEB_ROOT; ?>
/info/">＞ 新着情報</a></span>
				<span>＞ <?php the_title(); ?></span>
			</div><!-- .topicpath -->
			<h2 class="tac mb25"><img src="<?php echo @WEB_ROOT; ?>
/src/img/news/h_01.png" alt="新着情報" /></h2>
			<div id="box_area">
				<div class="inner">
					<div class="date"><?php echo get_the_time('Y.m.d'); ?> <div class="ico <?php echo $cats[0]->slug; ?>"><?php echo $cats[0]->name; ?></div></div>
					<h2><?php the_title(); ?></h2>
					<div class="postcontent">
						<?php the_content(); ?>
					</div>
					<div class="link_block tac">
					<?php 
					if(!empty($prevpost)):
						$id = $prevpost->ID;
						$cats = get_the_terms($id, 'category');
					 ?>
						<div class="new">
							<a href="<?php echo get_permalink($id); ?>" class="fade_on_hover">
								<div class="item">
									<div class="ico <?php echo $cats[0]->slug; ?>"><?php echo $cats[0]->name; ?></div>
									<div class="image"><?php echo get_the_post_thumbnail($id,array(140, 93)) ?></div>
									<p class="date"><?php echo get_the_time("Y/m/d",$id); ?></p>
									<p class="title"><?php echo get_the_title($id); ?></p>
								</div>
							</a>
						</div>
					<?php  endif;  ?>
						<a href="<?php echo @WEB_ROOT; ?>
/info/" class="dib mt50"><img src="<?php echo @WEB_ROOT; ?>
/src/img/news/btn_01.png" alt="記事一覧に戻る" class="fade_on_hover" /></a>
					<?php 
					if(!empty($nextpost)):
						$id = $nextpost->ID;
						$cats = get_the_terms($id, 'category');
					 ?>
						<div class="old">
							<a href="<?php echo get_permalink($id); ?>" class="fade_on_hover">
								<div class="item">
									<div class="ico <?php echo $cats[0]->slug; ?>"><?php echo $cats[0]->name; ?></div>
									<div class="image"><?php echo get_the_post_thumbnail($id,array(140, 93)) ?></div>
									<p class="date"><?php echo get_the_time("Y/m/d",$id); ?></p>
									<p class="title"><?php echo get_the_title($id); ?></p>
								</div>
							</a>
						</div>
					<?php  endif;  ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #main -->
<?php 
	endwhile;
 ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>