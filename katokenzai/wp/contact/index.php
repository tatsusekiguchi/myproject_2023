<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="contactMain">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<p>Contact</p>
				<h1>お問い合わせ</h1>
			</div>
		</div>
		<div class="formContainer">
			<div class="secWrap01">
				<div class="topTxt">
					<p>下記フォームに必要事項をご記入の上、<br class="spBreak">お問い合わせください。</p>
				</div>
				<div class="formBox">
					<?php echo do_shortcode('[mwform_formkey key="41"]'); ?>
				</div>
			</div>
		</div>
		<div class="itemContainer">
			<div class="secWrap01">
				<div class="itemList">
					<div class="itemBox tel">
						<dl>
							<dt>お電話での<br>お問い合わせ</dt>
							<dd><a href="tel:0561849811">（0561）84-9811</a></dd>
						</dl>
					</div>
					<div class="itemBox mail">
						<dl>
							<dt>メールでの<br>お問い合わせ</dt>
							<dd><a href="mailto:info@katokenzai.net">info@katokenzai.net</a></dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>