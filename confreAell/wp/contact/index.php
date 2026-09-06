<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="contactMain">
		<div class="pageKvContainer">
			<div class="kvLogo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/top_shop_logo.png" alt="confreAell"></a></div>
			<div class="pageKvPanel">
				<div class="kvTitle">
					<h1><img src="<?php bloginfo('template_url'); ?>/image/contact/kv_title.png" alt="お問い合わせ"></h1>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01 fadein">
				<div class="topTxt">
					<div class="txt">
						<p>採用募集・当店へのお問い合わせは、以下お問い合わせフォームよりお問い合わせください。</p>
					</div>
				</div>
				<div class="formBox">
					<?php echo do_shortcode( '[contact-form-7 id="059eee5" title="お問い合わせフォーム"]' ); ?>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>