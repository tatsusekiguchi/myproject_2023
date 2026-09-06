<?php
/*
Template Name: サイトマップ
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="main" id="sitemap">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<h1>サイトマップ</h1>
			</div>
		</div>
		<div class="mainContainer">
			<div class="secWrap02">
				<div class="pageSecTtl">
					<p class="secTtl">サイトマップ</p>
					<p class="futura">SITE MAP</p>
				</div>
				<div class="sitemapContainer">
					<div class="sitemapPanel">
						<div class="sitemapBox">
							<div class="top"><a href="<?php echo home_url(); ?>">トップページ</a></div>
						</div>
						<div class="sitemapBox">
							<dl>
								<dt>がん治療について</dt>
								<dd>
									<ul>
										<li><a href="<?php echo home_url(); ?>/nk/">- 活性NK 細胞療法</a></li>
										<li><a href="<?php echo home_url(); ?>/vitamin/">- 高密度ビタミンC 点滴療法</a></li>
										<li><a href="<?php echo home_url(); ?>/schedule/">- 治療スケジュール</a></li>
										<li><a href="<?php echo home_url(); ?>/flow/">- がん治療開始までの流れ</a></li>
										<li><a href="<?php echo home_url(); ?>/results/">- がん治療実績と症例</a></li>
										<li><a href="<?php echo home_url(); ?>/price/">- 治療費用</a></li>
									</ul>
								</dd>
							</dl>
						</div>
						<div class="sitemapBox">
							<dl>
								<dt>当院について</dt>
								<dd>
									<ul>
										<li><a href="<?php echo home_url(); ?>/profile/">- 医師紹介</a></li>
										<li><a href="<?php echo home_url(); ?>/access/">- 交通のご案内</a></li>
										<li><a href="<?php echo home_url(); ?>/faq/">- よくある質問</a></li>
									</ul>
								</dd>
							</dl>
						</div>
					</div>
					<div class="sitemapPanel">
						<div class="sitemapBox">
							<dl>
								<dt>直属施設及び外部機関</dt>
								<dd>
									<ul>
										<li><a href="<?php echo home_url(); ?>/cpc/">- 当院直属・免疫細胞培養センター</a></li>
										<li><a href="<?php echo home_url(); ?>/network/">- 協力医療機関</a></li>
									</ul>
								</dd>
							</dl>
						</div>
						<div class="sitemapBox">
							<dl>
								<dt>その他</dt>
								<dd>
									<ul>
										<li><a href="<?php echo home_url(); ?>/saisei/">- 再生医療関連法について</a></li>
									</ul>
								</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>