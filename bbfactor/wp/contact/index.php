<?php
/*
Template Name: お問い合わせ
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="contact">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<h1>お問い合わせ</h1>
			</div>
		</div>
		<div class="sectionContainer">
			<div class="secWrap01">
				<div class="topTxt">
					<p>ビーブリッジファクターに関するお問い合わせは、電話・LINE・メールにて承っております。<br>まずはお気軽にお問い合わせください。</p>
				</div>
				<div class="section">
					<h2><em>お電話</em><span>でのお問い合わせ</span></h2>
					<div class="telBox"><a href="tel:0527461234"><span>Tel.</span><em>052-746-1234</em></a>
						<p>営業時間 9：00 ～ 19：00　年中無休</p>
					</div>
				</div>
				<div class="section">
					<h2><em>LINE</em><span>でのお問い合わせ</span></h2>
					<div class="lineBox"><a href="https://lin.ee/jEFpQMq" target="_blank" rel="noopener">
							<div class="qr"><img src="<?php bloginfo('template_url'); ?>/image/common/line_qr.png" alt=""></div>
							<dl>
								<dt>ビデオ通話もOK♪<br>お手軽LINEでお問合せ！</dt>
								<dd>ビーブリッジファクター<br>公式LINE</dd>
							</dl>
						</a></div>
				</div>
				<div class="section">
					<h2><em>メール</em><span>でのお問い合わせ</span></h2>
					<div class="formBox">
						<?php echo do_shortcode( '[contact-form-7 id="22" title="お問い合わせフォーム"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>