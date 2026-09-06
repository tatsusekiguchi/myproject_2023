<?php
/*
Template Name: 採用情報
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="recruitMain">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<p>Recruit Information</p>
				<h1>採用情報</h1>
			</div>
		</div>
		<div class="recruitLinkContainer">
			<div class="secWrap01">
				<div class="secBox">
					<div class="img"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/recruit/recruit_link_img_01_pc.png" alt=""></div>
					<div class="btnMore"><a href="<?php echo home_url(); ?>/recruitmessage/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_more_blue.png" alt=""></a></div>
				</div>
				<div class="secBox">
					<div class="img"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/recruit/recruit_link_img_02_pc.png" alt=""></div>
					<div class="btnMore"><a href="<?php echo home_url(); ?>/member/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_more_blue.png" alt=""></a></div>
				</div>
			</div>
		</div>
		<div class="subNavContainer">
			<div class="secWrap01">
				<ul>
					<li><a href="<?php echo home_url(); ?>/requirements/">
							<div class="ttl">
								<p>募集要項</p>
							</div>
							<div class="linkButton"><img src="<?php bloginfo('template_url'); ?>/image/top/top_sub_nav_btn.png" alt=""></div>
						</a></li>
				</ul>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>