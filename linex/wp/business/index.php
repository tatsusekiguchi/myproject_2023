<?php
/*
Template Name: 事業内容
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="businessMain">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<div class="imgTitle"><img src="<?php bloginfo('template_url'); ?>/image/business/kv_title.png" alt="Business"></div>
				<h1>事業内容</h1>
			</div>
		</div>
		<div class="introContainer">
			<div class="introPanel">
				<div class="title01"><img src="<?php bloginfo('template_url'); ?>/image/business/intro_title_01.png" alt=""></div>
				<div class="title02">
					<h2>個人でお住いのお客様から、<br>法人を営まれるお客様まで。</h2>
				</div>
				<div class="imgBox"><img src="<?php bloginfo('template_url'); ?>/image/business/intro_img_01.png" alt=""></div>
				<div class="txt">
					<p>お客様のこだわりをとことん、お聞かせください。<br>お客様のニーズをさらに膨らませた<br>エクステリアを企画提案から設計、外構・造園工事までを<br>トータルにコーディネートします。</p>
					<p>お客様ごとのスタイルの違い、建物と敷地の違いを、<br>空間から景観まで深く考えた上で、<br>機能性とデザイン性が備わった数々のアイテムを組み合わせて、<br>ご満足いただけるイメージを創出します。<br>センスと使いやすさをこだわればこだわるほど、<br>そのエクステリアは、お客様そのものを表現してくれます。</p>
				</div>
			</div>
			<div class="mv"><img src="<?php bloginfo('template_url'); ?>/image/business/intro_mv_01.png" alt=""></div>
		</div>
		<div class="introContainer">
			<div class="introPanel">
				<div class="title01"><img src="<?php bloginfo('template_url'); ?>/image/business/intro_title_02.png" alt=""></div>
				<div class="title02">
					<h2>エクステリア商材の<br>販売から輸送。</h2>
				</div>
				<div class="imgBox"><img src="<?php bloginfo('template_url'); ?>/image/business/intro_img_01.png" alt=""></div>
				<div class="txt">
					<p>ハウスメーカー様や外構工事業者様向けに、カーポートや物置、<br>フェンスや石材等のエクステリア商材の販売から輸送をはじめ、<br>設計から外構・造園工事までをトータルにサポートします。</p>
				</div>
			</div>
			<div class="mv"><img src="<?php bloginfo('template_url'); ?>/image/business/intro_mv_02.png" alt=""></div>
		</div>
		<div class="listContainer">
			<div class="secTtl">
				<h2>施工事例</h2>
			</div>
			<div class="listBox">
				<ul>
					<?php
						$field = SCF::get('case');
						foreach ($field as $fields) {
							$image = wp_get_attachment_image_src($fields['case_image'] , 'full');
					?>
						<li>
							<div class="photo">
								<img src="<?php echo $image[0]; ?>" alt="">
							</div>
							<div class="comment">
								<p><?php echo $fields['case_comment']; ?></p>
							</div>
						</li>
					<?php  } ?>
				</ul>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>