<?php
/*
Template Name: お問い合わせ確認
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="contactConfirm">
		<div id="section__contact">
			<div class="contactContainer">
				<div class="secWrap01">
					<div class="secTitleBox">
						<h2>送信内容のご確認</h2>
					</div>
					<div class="topTxt">
						<div class="txt">
							<p>お問い合わせをいただいて2～3営業日以内に内容の確認をさせていただき、<br>メールもしくは電話にて対応いたします。</p>
						</div>
					</div>
					<div class="formConfirm">
						<?php echo do_shortcode('[mwform_formkey key="41"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>