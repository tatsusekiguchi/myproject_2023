<?php
/*
Template Name: 送信完了
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="contactComplete">
		<div class="contactTitlePanel">
			<div class="contactTitle">
				<p>CONTACT</p>
				<h1>お問い合わせ</h1>
			</div>
			<h2>送信完了</h2>
		</div>
		<div class="completePanel">
			<div class="completePanel__wrap">
				<dl>
					<dt>送信ありがとうございます。</dt>
					<dd>
						<p>この度はご応募いただきありがとうございます。<br>通常2-3営業日以内にご返信させていただいております。<br>万が一、返信がない場合はお手数ですがお電話にてご連絡ください。</p>
					</dd>
				</dl>
				<ul>
					<li> <a href="" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/form_insta.png" alt=""></a></li>
					<li> <a href="https://www.instagram.com/lagom_marukyo" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/form_line.png" alt=""></a></li>
				</ul>
				<div class="flow"> <img src="<?php bloginfo('template_url'); ?>/image/common/form_flow_complete.png" alt=""></div>
			</div>
			<div class="btnBack"><a href="<?php echo home_url(); ?>">TOPへ戻る</a></div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>