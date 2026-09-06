<?php
/*
Template Name: 採用情報
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="recruitmentMain">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<div class="imgTitle"><img src="<?php bloginfo('template_url'); ?>/image/recruitment/kv_title.png" alt="Recruitment"></div>
				<h1>採用情報</h1>
			</div>
		</div>
		<div class="topPanel">
			<div class="message fadeUp"><img src="<?php bloginfo('template_url'); ?>/image/recruitment/top_message.png" alt=""></div>
		</div>
		<div class="sec01">
			<div class="secPanel">
				<div class="secWrap01">
					<div class="txtBox">
						<div class="txt">
							<p class="fadeUp">リネクスは、採用活動という出会いの場を通じて、<br>新たな挑戦心との出会いを求めています。</p>
							<p class="fadeUp">自分らしさをツラぬき、<br>口だけではなく行動で示せる人、<br>常識や固定概念にとらわれず、<br>新たな可能性に挑みたい人、<br>そんなこと無理でしょ、<br>できるわけないと笑われても、<br>自分がこれだと信じる事に、<br>情熱を燃やせる人に出会いたい。</p>
						</div>
					</div>
				</div>
				<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/recruitment/cnt_photo_01.png" alt=""></div>
			</div>
		</div>
		<div class="sec02">
			<div class="secPanel">
				<div class="secWrap01">
					<div class="txtBox">
						<div class="txt">
							<p class="fadeUp">いつだって新たな価値観をつくっていく原動力は、<br>一人ひとりの中にある”感性”と”情熱”です。</p>
							<p class="fadeUp">納得できないことで、イヤイヤ働いても意味がない<br>上司や社長を動かし、そして会社全体を動かす。<br>あなたらしく、あなたがワクワクできる、<br>そんな自由な働き方を、生き方を全力で推奨する。<br>それが、リネクスという会社です。</p>
							<p class="fadeUp">リネクスが、あなただけの個性を活かせる会社かどうか、<br>あなた自身で判断してください。</p>
						</div>
					</div>
				</div>
				<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/recruitment/cnt_photo_02.png" alt=""></div>
			</div>
		</div>
		<div class="bnrPanel"><a href="https://www.youtube.com/@Linex_ch" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/recruitment/bnr_youtube.png" alt=""></a></div>
		<div class="gallerySection">
			<div class="galleryContainer">
				<div class="galleryTitle">
					<h2><img src="<?php bloginfo('template_url'); ?>/image/recruitment/gallery_title.png" alt="Colorful Days with LINEX"></h2>
				</div>
				<div class="galleryPanel">
					<div class="imgBlock01 imgBlock">
						<?php $image = SCF::get('recruit_gallery_01'); ?>
						<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
							<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
						</a>
					</div>
					<div class="imgBlock02 imgBlock">
						<ul>
							<li>
								<?php $image = SCF::get('recruit_gallery_02'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
							<li>
								<?php $image = SCF::get('recruit_gallery_03'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
							<li>
								<?php $image = SCF::get('recruit_gallery_04'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
						</ul>
					</div>
					<div class="imgBlock03 imgBlock">
						<?php $image = SCF::get('recruit_gallery_05'); ?>
						<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
							<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
						</a>
					</div>
					<div class="imgBlock04 imgBlock">
						<?php $image = SCF::get('recruit_gallery_06'); ?>
						<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
							<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
						</a>
					</div>
					<div class="imgBlock05 imgBlock">
						<?php $image = SCF::get('recruit_gallery_07'); ?>
						<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
							<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
						</a>
					</div>
					<div class="imgBlock06 imgBlock">
						<?php $image = SCF::get('recruit_gallery_08'); ?>
						<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
							<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
						</a>
					</div>
					<div class="imgBlock07 imgBlock">
						<ul>
							<li>
								<?php $image = SCF::get('recruit_gallery_09'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
							<li>
								<?php $image = SCF::get('recruit_gallery_10'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
							<li>
								<?php $image = SCF::get('recruit_gallery_11'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
						</ul>
					</div>
					<div class="imgBlock08 imgBlock">
						<?php $image = SCF::get('recruit_gallery_12'); ?>
						<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
							<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
						</a>
					</div>
					<div class="imgBlock09 imgBlock">
						<?php $image = SCF::get('recruit_gallery_13'); ?>
						<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
							<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
						</a>
					</div>
					<div class="imgBlock10 imgBlock">
						<?php $image = SCF::get('recruit_gallery_14'); ?>
						<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
							<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
						</a>
					</div>
					<div class="imgBlock11 imgBlock">
						<?php $image = SCF::get('recruit_gallery_15'); ?>
							<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
								<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
							</a>
						<ul>
							<li>
								<?php $image = SCF::get('recruit_gallery_16'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
							<li>
								<?php $image = SCF::get('recruit_gallery_17'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
							<li>
								<?php $image = SCF::get('recruit_gallery_18'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
						</ul>
					</div>
					<div class="imgBlock12 imgBlock">
						<ul>
							<li>
								<?php $image = SCF::get('recruit_gallery_19'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
							<li>
								<?php $image = SCF::get('recruit_gallery_20'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
						</ul>
					</div>
					<div class="imgBlock13 imgBlock">
						<ul>
							<li>
								<?php $image = SCF::get('recruit_gallery_21'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
							<li>
								<?php $image = SCF::get('recruit_gallery_22'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
							<li>
								<?php $image = SCF::get('recruit_gallery_23'); ?>
								<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
									<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
								</a>
							</li>
						</ul>
						<?php $image = SCF::get('recruit_gallery_24'); ?>
						<a href="<?php echo wp_get_attachment_url($image); ?>" data-lightbox="lightBox" data-title="">
							<img src="<?php echo wp_get_attachment_url($image); ?>" alt="">
						</a>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>