<?php
/*
Template Name: 企業情報
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="companyMain">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<p>Company Profile</p>
				<h1>企業情報</h1>
			</div>
		</div>
		<div class="companyLinkContainer">
			<div class="secWrap01">
				<div class="secBox">
					<div class="img"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/company/company_link_img_01_pc.png" alt=""></div>
					<div class="btnMore"><a href="<?php echo home_url(); ?>/message/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_more_blue.png" alt=""></a></div>
				</div>
				<div class="secBox">
					<div class="img"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/company/company_link_img_02_pc.png" alt=""></div>
					<div class="btnMore"><a href="<?php echo home_url(); ?>/profile/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_more_blue.png" alt=""></a></div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>