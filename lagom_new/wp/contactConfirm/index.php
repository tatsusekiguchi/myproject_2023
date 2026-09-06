<?php
/*
Template Name: 送信内容確認
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="contactConfirm">
		<div class="contactTitlePanel">
			<div class="contactTitle">
				<h1>Contact</h1>
			</div>
			<h2>送信内容確認</h2>
		</div>
		<div class="confirmPanel">
			<div class="confirmPanel__wrap">
				<div class="formConfirm">
					<?php echo do_shortcode('[mwform_formkey key="26"]'); ?>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>