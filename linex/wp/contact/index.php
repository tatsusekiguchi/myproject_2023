<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="contactMain">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<div class="imgTitle"><img src="<?php bloginfo('template_url'); ?>/image/contact/kv_title.png" alt="contact Profile"></div>
				<h1>お問い合わせ</h1>
			</div>
		</div>
		<div class="formContainer">
			<div class="secWrap01">
				<div class="topTxt">
					<p>下記フォームに必要事項をご記入の上、<br class="spBreak">お問い合わせください。</p>
				</div>
				<div class="formBox">
					<?php echo do_shortcode('[mwform_formkey key="21"]'); ?>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>