<?php
/*
Template Name: 採用エントリーページ
*/
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="「公益財団法人服部国際奨学財団」大学生、大学院生の修学を月額10万円の給付型奨学金で支援します！">
	<meta name="keywords" content="">
	<!--OGP-->
	<meta property="og:title" content="公益財団法人服部国際奨学財団 – 大学生、大学院生の修学を月額10万円の給付型奨学金で支援します！" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://hattori-zaidan.or.jp" />
	<!-- <meta property="og:image" content="<?php bloginfo('template_url'); ?>/ogp.png" /> -->
	<meta property="og:site_name" content="公益財団法人服部国際奨学財団 – 大学生、大学院生の修学を月額10万円の給付型奨学金で支援します！" />
	<meta property="og:description" content=" 「公益財団法人服部国際奨学財団」大学生、大学院生の修学を月額10万円の給付型奨学金で支援します！" />
	<!-- css-->
	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/reset.css?ver=<?php echo filemtime(get_template_directory() . '/css/reset.css'); ?>">
	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/slick.css?ver=<?php echo filemtime(get_template_directory() . '/css/slick.css'); ?>">
	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/slick-theme.css?ver=<?php echo filemtime(get_template_directory() . '/css/slick-theme.css'); ?>">
	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/animate.css?ver=<?php echo filemtime(get_template_directory() . '/css/animate.css'); ?>">
	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/common.css?ver=<?php echo filemtime(get_template_directory() . '/css/common.css'); ?>">
	<link rel="stylesheet" href="<?php echo bloginfo('template_url'); ?>/css/layout.css?ver=<?php echo filemtime(get_template_directory() . '/css/layout.css'); ?>">
	<link rel="stylesheet" media="screen and (max-width: 1139px)" type="text/css" href="<?php echo bloginfo('template_url'); ?>/css/common_sp.css?ver=<?php echo filemtime(get_template_directory() . '/css/common_sp.css'); ?>">
	<link rel="stylesheet" media="screen and (max-width: 1139px)" type="text/css" href="<?php echo bloginfo('template_url'); ?>/css/layout_sp.css?ver=<?php echo filemtime(get_template_directory() . '/css/layout_sp.css'); ?>">

	<!-- js-->
	<script src="<?php echo bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js?ver=<?php echo filemtime(get_template_directory() . '/js/jquery-1.11.3.min.js'); ?>"></script>
	<script src="<?php echo bloginfo('template_url'); ?>/js/slick.min.js?ver=<?php echo filemtime(get_template_directory() . '/js/slick.min.js'); ?>"></script>
	<script src="<?php echo bloginfo('template_url'); ?>/js/count.js?ver=<?php echo filemtime(get_template_directory() . '/js/count.js'); ?>"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	<script src="<?php echo bloginfo('template_url'); ?>/js/common.js?ver=<?php echo filemtime(get_template_directory() . '/js/common.js'); ?>"></script>
	<script src="<?php echo bloginfo('template_url'); ?>/js/scrollAnimation.js?ver=<?php echo filemtime(get_template_directory() . '/js/scrollAnimation.js'); ?>"></script>

	<!-- title-->
	<title><?php wp_title(''); ?> | 公益財団法人服部国際奨学財団 – 大学生、大学院生の修学を月額10万円の給付型奨学金で支援します！</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="headBox">
			<div class="logo"><a href="#"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png?20231127" alt=""></a></div>
			<nav class="navBox">
				<div class="navWrap">
					<div class="navList">
						<ul>
							<li><a href="#section__recruitment">募集要項</a></li>
							<li><a href="#section__job">仕事について</a></li>
							<li><a href="#section__interview">スタッフインタビュー</a></li>
							<li><a href="#section__voice">奨学生の声</a></li>
							<li><a href="#section__data__title">数字で見る服部</a></li>
							<li><a href="#section__about">財団概要</a></li>
							<li><a href="#section__office">働く環境</a></li>
							<li><a href="#section__entry">お問い合わせ</a></li>
						</ul>
					</div>
					<div class="btnEntry"><a href="#section__entry">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/common/header_entry_photo.png" alt=""></div>
							<div class="txtBox">
								<dl>
									<dt>ENTRY</dt>
									<dd>説明会予約・お問い合わせ</dd>
								</dl>
							</div>
						</a></div>
					<div class="navBnr">
						<a href="#section__entry">
							<?php
								$image = SCF::get('top_bnr_pc');
								echo wp_get_attachment_image($image, 'full');
							?>
						</a>
					</div>
				</div>
			</nav>
		</div>
		<div class="headSns">
			<ul>
				<li><a href="https://www.instagram.com/hattori_scholarship/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_sns_insta.png" alt=""></a></li>
				<li><a href="https://twitter.com/hattori_zaidan" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_sns_x.png" alt=""></a></li>
				<li><a href="https://www.facebook.com/hattorizaidan" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_sns_fb.png" alt=""></a></li>
				<li><a href="https://note.com/hisf/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_sns_note.png" alt=""></a></li>
			</ul>
		</div>
		<div class="btnMenu hamburger"><img class="menu-open" src="<?php bloginfo('template_url'); ?>/image/common/header_menu.png" alt=""><img class="menu-close" src="<?php bloginfo('template_url'); ?>/image/common/header_menu_close.png" alt=""></div>
	</header>
	<!-- △header△-->
	<!-- ▽メイン▽-->
	<main id="top">
		<div class="topKvPanel">
			<div class="kvWrap">
				<div class="spKv01 spKv"><img src="<?php bloginfo('template_url'); ?>/image/top/top_kv_sp_01.png" alt=""></div>
				<div class="kvTitle">
					<h1><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_kv_title_pc.png" alt="誰かの、今日のために。わたしたちの、未来のために。"></h1>
				</div>
				<div class="spKv02 spKv"><img src="<?php bloginfo('template_url'); ?>/image/top/top_kv_sp_02.png" alt=""></div>
				<div class="kvBnr">
					<div class="kvClose"><img src="<?php bloginfo('template_url'); ?>/image/top/top_kv_bnr_close.png" alt=""></div>
					<a class="kvBnr__pc" href="#section__entry">
						<?php
							$image = SCF::get('top_bnr_pc');
							echo wp_get_attachment_image($image, 'full');
						?>
					</a>
					<a class="kvBnr__sp" href="#section__entry">
						<div class="leftBox">
							<div class="inner">
								<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_kv_bnr_sp_01.png" alt=""></div>
								<div class="txtBox">
									<dl>
										<dt><span>ENTRY</span></dt>
										<dd><span>応募してみる</span></dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="rightBox">
							<div class="inner">
								<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_kv_bnr_sp_02.png" alt=""></div>
								<div class="txtBox">
									<dl>
										<dt><span>SEMINAR</span></dt>
										<dd><span>説明会に参加する</span></dd>
									</dl>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
		</div>
		<div class="topMessageContainer">
			<div class="secWrap01">
				<div class="txtPanel">
					<div class="title"><img src="<?php bloginfo('template_url'); ?>/image/top/top_message_title.png" alt=""></div>
					<div class="txt">
						<p>たとえば、こんな人はこの仕事に向いていると思います。</p>
						<p>人と関わる仕事がしたい人。<br>お祝いの席や、サプライズ企画が好きな人。<br>人をサポートをすることに、やりがいを感じる人。<br>外国語のスキルを活かして働いてみたい人や、<br>世の中をもっとよくしたいと、漠然と思っている人。<br>とにかく、“人”が、好きな人。<br>生み出す仕事より、支える仕事が似合う人。<br>誰かのために考え動くことに、喜びを感じられる人。</p>
						<p>そんな人と一緒に、つくりたい未来があります。</p>
						<p>服部国際奨学財団は、本気の夢を持った学生たちを<br>本気で応援し、本気でサポートする財団です。</p>
						<p>これからの世の中を創ってゆく若者たちを、<br>力強い体制と優しい心で支えていくことを通じて<br>輝く未来を見つめ続けていく、そんな仕事とも言えます。</p>
						<p>あなたのその手は、未来を切り拓いていく人の背中を<br>そっと支え、押してあげることができるのです。</p>
					</div>
					<div class="btnAbout"><a href="#section__about"><em>ABOUT US</em><span>服部国際奨学財団について</span></a></div>
				</div>
				<div class="photo01 photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_message_img_01_pc.png" alt=""></div>
				<div class="photo02 photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_message_img_02_pc.png" alt=""></div>
			</div>
		</div>
		<div id="section__recruit">
			<div class="secTitlePanel">
				<div class="secWrap01">
					<div class="secTitleBox">
						<p>RECRUIT</p>
						<h2>採用情報</h2>
					</div>
				</div>
			</div>
			<div class="introContainer">
				<div class="introPanel01 introPanel">
					<div class="secWrap01">
						<div class="txtBox">
							<dl>
								<dt>募集職種</dt>
								<dd>
									<ul>
										<li>・広報／プレス</li>
										<li>・プランナー</li>
									</ul>
									<ul>
										<li>・企画営業</li>
										<li>・ディレクター</li>
										<li>・事務</li>
									</ul>
								</dd>
							</dl>
						</div>
						<div class="photoBox">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/recruit_intro_photo_01.png" alt=""></div>
						</div>
					</div>
				</div>
				<div class="introPanel02 introPanel">
					<div class="secWrap01">
						<div class="txtBox">
							<dl>
								<dt>求める人物像</dt>
								<dd>
									<div class="photoBox">
										<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/recruit_intro_photo_02.png" alt=""></div>
									</div>
									<div class="markerBox">
										<div class="marker">
											<p>「誰かのために働くこと」に</p>
										</div>
										<div class="marker">
											<p>やりがいを感じる人</p>
										</div>
									</div>
									<div class="txt">
										<p>わたしたちは、志ある学生たちの応援団。<br>頑張る人を全力でバックアップしていくサポーターを募集しています。</p>
									</div>
								</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
			<div class="stepContainer">
				<div class="secWrap01">
					<div class="stepPanel01 stepPanel">
						<div class="stepBox">
							<dl>
								<dt>01</dt>
								<dd>人とのコミュニケーションが好きな人</dd>
							</dl>
						</div>
						<div class="stepBox">
							<dl>
								<dt>02</dt>
								<dd>頑張る人をサポートする仕事がしたい人</dd>
							</dl>
						</div>
					</div>
					<div class="stepPanel02 stepPanel">
						<div class="stepBox">
							<dl>
								<dt>03</dt>
								<dd>相手の立場になって考えられる人</dd>
							</dl>
						</div>
						<div class="stepBox">
							<dl>
								<dt>04</dt>
								<dd>自ら積極的に発信していける人</dd>
							</dl>
						</div>
					</div>
					<div class="stepPanel03 stepPanel">
						<div class="stepBox">
							<dl>
								<dt>05</dt>
								<dd>好奇心旺盛な人</dd>
							</dl>
						</div>
						<div class="stepBox">
							<dl>
								<dt>06</dt>
								<dd>変化を楽しめる人</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
			<aside>
				<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/recruit_aside_photo_pc.png" alt=""></div>
			</aside>
		</div>
		<div id="section__job">
			<div class="secTitlePanel">
				<div class="secWrap01">
					<div class="secTitleBox">
						<p>JOB</p>
						<h2>仕事について</h2>
					</div>
				</div>
			</div>
			<div class="introContainer">
				<?php
					$field = SCF::get('gr_job');
					$i = 1;
					foreach ($field as $fields) {
						$image = wp_get_attachment_image_src($fields['gr_job_img'] , 'full');
				?>
				<div class="introPanel">
					<div class="photoBox">
						<div class="photo">
							<img src="<?php echo $image[0]; ?>" alt="">
						</div>
					</div>
					<div class="txtBox">
						<div class="ttlBox">
							<div class="ttlNum"><span>JOB</span><em><?php echo sprintf('%02d', $i); ?></em></div>
							<div class="ttlTxt">
								<p><?php echo nl2br($fields['gr_job_title']); ?></p>
							</div>
						</div>
						<div class="txt">
							<?php echo nl2br($fields['gr_job_txt']); ?>
						</div>
					</div>
				</div>
				<?php $i++; } ?>
			</div>
			<div class="flowContainer">
				<div class="photoPanel">
					<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/job_flow_photo_pc.png?20201029" alt=""></div>
					<div class="secTitleBox">
						<p>DAY FLOW</p>
						<h2>一日の流れ</h2>
					</div>
				</div>
				<div class="flowPanel">
					<div class="secWrap01">
						<div class="scheduleBox">
							<div class="secTitleBox">
								<p>DAY FLOW</p>
								<h2>一日の流れ</h2>
							</div>
							<div class="schedule">
								<ol>
									<?php
										$field = SCF::get('gr_day_flow');
										foreach ($field as $fields) {
									?>
									<li>
										<div class="time">
											<p><?php echo nl2br($fields['gr_day_flow_time']); ?></p>
										</div>
										<div class="detail">
											<dl>
												<dt><?php echo nl2br($fields['gr_day_flow_task']); ?></dt>
												<dd><?php echo nl2br($fields['gr_day_flow_txt']); ?></dd>
											</dl>
										</div>
									</li>
									<?php } ?>
								</ol>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="orientationContainer">
			<div class="orientationContainer__panel">
				<div class="orientationContainer__title">
					<p>まずは説明会に参加！</p>
				</div>
				<div class="orientationContainer__bnr">
					<a href="#section__entry">
						<?php
							$image = SCF::get('content_bnr_pc');
							$attr = array('class' => 'orientationContainer__bnr--pc');
							echo wp_get_attachment_image($image, 'full', false, $attr);
						?>

						<?php
							$image = SCF::get('content_bnr_sp');
							$attr = array('class' => 'orientationContainer__bnr--sp');
							echo wp_get_attachment_image($image, 'full', false, $attr);
						?>
					</a>
				</div>
			</div>
		</div>
		<div id="section__interview">
			<div class="secTitlePanel">
				<div class="secWrap01">
					<div class="secTitleBox">
						<p>INTERVIEW</p>
						<h2>スタッフインタビュー</h2>
					</div>
				</div>
			</div>
			<div class="interviewSlider">
				<?php
					$field = SCF::get('gr_interview');
					$i = 1;
					foreach ($field as $fields) {
						$image = wp_get_attachment_image_src($fields['gr_interview_img'] , 'full');
				?>
				<div class="slider">
					<div class="sliderBox">
						<div class="photoBox">
							<div class="photo">
								<img src="<?php echo $image[0]; ?>" alt="">
							</div>
							<div class="name">
								<p><?php echo nl2br($fields['gr_interview_name_02']); ?></p>
							</div>
						</div>
						<div class="detailBox">
							<dl>
								<dt><?php echo nl2br($fields['gr_interview_title']); ?></dt>
								<dd><?php echo nl2br($fields['gr_interview_pos']); ?></dd>
								<dd><?php echo nl2br($fields['gr_interview_name_01']); ?></dd>
							</dl>
							<div class="btnMore interviewModalOpen" data-modal-id="modal<?php echo $i; ?>">
								<p>LEARN MORE</p>
							</div>
						</div>
					</div>
				</div>
				<?php $i++; } ?>
			</div>
			<div class="interviewItemOverlay overlay"></div>
			<div class="itemModalContainer">
				<?php
					$field = SCF::get('gr_interview');
					$i = 1;
					foreach ($field as $fields) {
						$image = wp_get_attachment_image_src($fields['gr_interview_img'] , 'full');
				?>
				<div class="interviewItemModal itemModal" data-modal="modal<?php echo $i; ?>">
					<div class="modalBox">
						<div class="modalBoxInner">
							<div class="photo">
								<img src="<?php echo $image[0]; ?>" alt="">
							</div>
							<div class="txtBox">
								<p class="pos">STAFF<?php echo sprintf('%02d', $i); ?></p>
								<p class="name"><?php echo nl2br($fields['gr_interview_name_01']); ?></p>
								<dl>
									<dt><?php echo nl2br($fields['gr_interview_title']); ?></dt>
									<dd>
										<div class="txt">
											<?php echo nl2br($fields['gr_interview_txt']); ?>
										</div>
									</dd>
								</dl>
							</div>
						</div>
						<div class="modalClose"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_modal_close.png" alt="">
							<p>CLOSE</p>
						</div>
						<div class="modalScroll"><img src="<?php bloginfo('template_url'); ?>/image/common/modal_scroll.png" alt=""></div>
					</div>
				</div>
				<?php $i++; } ?>
			</div>
		</div>
		<div id="section__voice">
			<div class="voiceContainer">
				<div class="secWrap01">
					<div class="secTitlePanel">
						<div class="secTitleBox">
							<h2>奨学生の声</h2>
							<p>STUDENT’s VOICE</p>
						</div>
					</div>
					<div class="photoContainer">
						<div class="photoList">
							<?php
								$field = SCF::get('gr_message');
								$i = 1;
								foreach ($field as $fields) {
									if ($i > 6) {
										break; // 6件を超えたらループを終了
									}
									$imageTitle = wp_get_attachment_image_src($fields['gr_message_title'] , 'full');
									$imagePhoto = wp_get_attachment_image_src($fields['gr_message_img'] , 'full');
							?>
								<div class="photoBox0<?php echo $i; ?> photoBox voiceModalOpen" data-modal-id="modal<?php echo $i; ?>">
									<div class="titleBox">
										<div class="title">
											<img src="<?php echo $imageTitle[0]; ?>" alt="">
										</div>
									</div>
									<div class="photo"><img src="<?php echo $imagePhoto[0]; ?>" alt=""></div>
									<p class="pos"><?php echo nl2br($fields['gr_message_from']); ?></p>
									<div class="nameBox">
										<p class="name"><?php echo nl2br($fields['gr_message_name']); ?></p>
										<div class="btnMore">
											<p>LEARN <br>MORE</p>
										</div>
									</div>
								</div>
							<?php $i++; } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="voiceItemOverlay overlay"></div>
			<div class="itemModalContainer">
					<?php
						$field = SCF::get('gr_message');
						$i = 1;
						foreach ($field as $fields) {
							if ($i > 6) {
								break; // 6件を超えたらループを終了
							}
							$imageTitle = wp_get_attachment_image_src($fields['gr_message_title'] , 'full');
							$imagePhoto = wp_get_attachment_image_src($fields['gr_message_img'] , 'full');
					?>
					<div class="voiceItemModal itemModal" data-modal="modal<?php echo $i; ?>">
						<div class="modalBox">
							<div class="modalBoxInner">
								<div class="voicePhoto photo">
									<div class="photoWrap">
										<img src="<?php echo $imagePhoto[0]; ?>" alt="">
									</div>
								</div>
								<div class="txtBox">
									<p class="voicePos">VOICE<?php echo sprintf('%02d', $i); ?></p>
									<div class="voiceTitle">
										<img src="<?php echo $imageTitle[0]; ?>" alt="">
									</div>
									<div class="posName">
										<p><span><?php echo nl2br($fields['gr_message_from']); ?></span><em><?php echo nl2br($fields['gr_message_name']); ?></em></p>
									</div>
									<div class="txt">
										<?php echo nl2br($fields['gr_message_txt']); ?>
									</div>
								</div>
							</div>
							<div class="modalClose"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_modal_close.png" alt="">
								<p>CLOSE</p>
							</div>
							<div class="modalScroll"><img src="<?php bloginfo('template_url'); ?>/image/common/modal_scroll.png" alt=""></div>
						</div>
					</div>
				<?php $i++; } ?>
			</div>
		</div>
		<div id="section__data">
			<div class="secWrap">
				<div class="secWrap01">
					<div class="balloonSection">
						<div class="titleBox">
							<div class="title01">
								<p>学生に聞きました！</p>
							</div>
							<div class="title02">
								<h3>あなたにとって服部国際奨学財団とは？</h3>
							</div>
						</div>
						<div class="balloonList">
							<ul>
								<li>
									<p>家でもなく学校でもない<br>もう一つの安全基地</p>
								</li>
								<li>
									<p>遠くから見守っていてくれる<br>親戚みたいな存在</p>
								</li>
								<li>
									<p>頑張る理由と<br>自信をくれる場所</p>
								</li>
								<li>
									<p>服部財団は<br>私のファミリーです！</p>
								</li>
								<li>
									<p>研究生活から離れて<br>自分を癒すことが<br class="pcBreak">できる場所</p>
								</li>
								<li>
									<p>わたしの<br>アナザースカイ！</p>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<div id="section__data__title" class="secTitlePanel">
				<div class="secWrap01">
					<div class="secTitleBox">
						<p>HATTORI’S <br class="spBreak">DATA</p>
						<h2>数字で見る服部国際奨学財団</h2>
					</div>
				</div>
			</div>
			<div class="secWrap">
				<div class="secWrap01">
					<div id="section__data__style">
						<h3>WORKSTYLE &amp; PEOPLE</h3>
						<div class="dataCountContainer">
							<div class="dataCountPanel01 dataCountPanel">
								<div class="dataCountBox">
									<dl>
										<dt>設立</dt>
										<dd>
											<div class="itemBox">
												<div class="countBox">
													<div class="count">
														<p><em class="yearNum blue"><?php echo SCF::get('data_establish'); ?></em><span class="year">年</span></p>
													</div>
												</div>
												<div class="iconBox establishBox">
													<div class="icon establish"><img src="<?php bloginfo('template_url'); ?>/image/top/data_icon_establish.png" alt=""></div>
												</div>
											</div>
										</dd>
									</dl>
									<div class="explain">
										<p>おかげさまで、設立から15年を迎えることができました。</p>
									</div>
								</div>
								<div class="dataCountBox">
									<dl>
										<dt>局員数</dt>
										<dd>
											<div class="itemBox">
												<div class="countBox">
													<div class="count">
														<p><em class="staffNum green"><?php echo SCF::get('data_staff'); ?></em><span class="staff">人</span></p>
													</div>
												</div>
												<div class="iconBox personBox">
													<div class="icon person"><img src="<?php bloginfo('template_url'); ?>/image/top/data_icon_person.png" alt=""></div>
												</div>
											</div>
										</dd>
									</dl>
									<div class="explain">
										<p>少数精鋭でチームワークは抜群です！</p>
									</div>
								</div>
							</div>
							<div class="dataCountPanel02 dataCountPanel">
								<div class="dataCountBox01 dataCountBox">
									<dl>
										<dt>男女比</dt>
										<dd>
											<div class="comparison">
												<div class="countBox">
													<div class="count">
														<p><em class="blue"><?php echo SCF::get('data_gender_male'); ?></em></p>
													</div><span>:</span>
													<div class="count">
														<p><em class="green"><?php echo SCF::get('data_gender_female'); ?></em></p>
													</div>
												</div>
											</div>
										</dd>
									</dl>
									<div class="explain">
										<p>性別にとらわれない働き方ができます。</p>
									</div>
								</div>
								<div class="dataCountBox02 dataCountBox">
									<dl>
										<dt>有休消化率</dt>
										<dd>
											<div class="itemBox">
												<div class="countBox">
													<div class="count">
														<p><em class="green"><?php echo SCF::get('data_holiday'); ?></em><span>%</span></p>
													</div>
												</div>
												<div class="iconBox airplaneBox">
													<div class="icon airplane"><img src="<?php bloginfo('template_url'); ?>/image/top/data_icon_airplane.png" alt=""></div>
												</div>
											</div>
										</dd>
									</dl>
									<div class="explain">
										<p>ワークライフバランスを大切にしています。</p>
									</div>
								</div>
								<div class="dataCountBox03 dataCountBox">
									<dl>
										<dt>賞与</dt>
										<dd>
											<div class="itemBox">
												<div class="countBox">
													<div class="count">
														<p><em class="blue"><?php echo SCF::get('data_bonus'); ?></em><span>回/年</span></p>
													</div>
												</div>
												<div class="iconBox walletBox">
													<div class="icon wallet"><img src="<?php bloginfo('template_url'); ?>/image/top/data_icon_wallet.png" alt=""></div>
												</div>
											</div>
										</dd>
									</dl>
									<div class="explain">
										<p>ボーナスもしっかり支給します！</p>
									</div>
								</div>
							</div>
							<div class="dataCountPanel03 dataCountPanel">
								<div class="multiContainer">
									<div class="doorsPanel">
										<div class="dataCountBox">
											<dl>
												<dt>インドアorアウトドア</dt>
												<dd>
													<div class="itemList">
														<div class="itemBox">
															<div class="iconBox">
																<div class="icon game"><img src="<?php bloginfo('template_url'); ?>/image/top/data_icon_game.png" alt=""></div>
																<p class="green">インドア</p>
															</div>
															<div class="countBox">
																<div class="count">
																	<p><em class="green"><?php echo SCF::get('data_indoor'); ?></em><span>人</span></p>
																</div>
															</div>
														</div>
														<div class="itemBox">
															<div class="iconBox">
																<div class="icon camp"><img src="<?php bloginfo('template_url'); ?>/image/top/data_icon_camp.png" alt=""></div>
																<p class="blue">アウトドア</p>
															</div>
															<div class="countBox">
																<div class="count">
																	<p><em class="blue"><?php echo SCF::get('data_outdoor'); ?></em><span>人</span></p>
																</div>
															</div>
														</div>
													</div>
												</dd>
											</dl>
											<div class="explain">
												<p>いろいろな趣味を持ったメンバーが集まっています。</p>
											</div>
										</div>
									</div>
									<div class="itemPanel">
										<div class="dataCountBox">
											<dl>
												<dt>仕事着</dt>
												<dd>
													<div class="itemBox">
														<div class="iconBox clothesBox">
															<div class="icon clothes"><img src="<?php bloginfo('template_url'); ?>/image/top/data_icon_clothes.png" alt=""></div>
															<p class="blue">私服</p>
														</div>
														<div class="countBox">
															<div class="count">
																<p><em class="blue"><?php echo SCF::get('data_clothes'); ?></em><span>%</span></p>
															</div>
														</div>
													</div>
												</dd>
											</dl>
											<div class="explain">
												<p>時々スーツでキメる日もあります。</p>
											</div>
										</div>
										<div class="dataCountBox">
											<dl>
												<dt>お弁当持参率</dt>
												<dd>
													<div class="itemBox lunchItemBox">
														<div class="iconBox lunchBox">
															<div class="icon lunch"><img src="<?php bloginfo('template_url'); ?>/image/top/data_icon_lunch.png" alt=""></div>
															<p class="green">お弁当</p>
														</div>
														<div class="countBox">
															<div class="count">
																<p><em class="green"><?php echo SCF::get('data_lunchbox'); ?></em><span>%</span></p>
															</div>
														</div>
													</div>
												</dd>
											</dl>
											<div class="explain">
												<p>お昼は皆好きなものを食べています。</p>
											</div>
										</div>
									</div>
								</div>
								<div class="singleContainer">
									<div class="dataCountBox">
										<dl>
											<dt>お酒は好き？</dt>
											<dd>
												<div class="alcohol"><img src="<?php bloginfo('template_url'); ?>/image/top/data_icon_alcohol.png" alt=""></div>
												<div class="countList">
													<ul>
														<li>
															<p class="ttl">好き</p>
															<div class="count">
																<p><em class="green"><?php echo SCF::get('data_alcohol_like'); ?></em><span>人</span></p>
															</div>
														</li>
														<li>
															<p class="ttl">普通</p>
															<div class="count">
																<p><em class="green"><?php echo SCF::get('data_alcohol_normal'); ?></em><span>人</span></p>
															</div>
														</li>
														<li>
															<p class="ttl">苦手</p>
															<div class="count">
																<p><em class="blue"><?php echo SCF::get('data_alcohol_dislike'); ?></em><span>人</span></p>
															</div>
														</li>
													</ul>
												</div>
											</dd>
										</dl>
										<div class="explain">
											<p>飲み仲間大募集！by局長</p>
										</div>
									</div>
								</div>
							</div>
							<div class="dataCountPanel04 dataCountPanel">
								<div class="dataCountBox">
									<dl>
										<dt>テンションが上がる瞬間</dt>
										<dd>
											<div class="itemList01 itemList">
												<ul>
													<li>
														<div class="leftBox">
															<p class="blue">美味しいご飯とお酒に出会ったとき</p>
														</div>
														<div class="rightBox">
															<div class="count">
																<p><em class="blue"><?php echo SCF::get('data_tension_01'); ?></em><span>人</span></p>
															</div>
														</div>
													</li>
													<li>
														<div class="leftBox">
															<p class="green">運動していい汗をかいたとき</p>
														</div>
														<div class="rightBox">
															<div class="count">
																<p><em class="green"><?php echo SCF::get('data_tension_02'); ?></em><span>人</span></p>
															</div>
														</div>
													</li>
													<li>
														<div class="leftBox">
															<p class="blue">子どもの成長を感じたとき</p>
														</div>
														<div class="rightBox">
															<div class="count">
																<p><em class="blue"><?php echo SCF::get('data_tension_03'); ?></em><span>人</span></p>
															</div>
														</div>
													</li>
													<li>
														<div class="leftBox">
															<p class="green">植木に花の蕾がついたとき</p>
														</div>
														<div class="rightBox">
															<div class="count">
																<p><em class="green"><?php echo SCF::get('data_tension_04'); ?></em><span>人</span></p>
															</div>
														</div>
													</li>
													<li>
														<div class="leftBox">
															<p class="blue">学生がいい報告をしてくれたとき</p>
														</div>
														<div class="rightBox">
															<div class="count">
																<p><em class="blue"><?php echo SCF::get('data_tension_05'); ?></em><span>人</span></p>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</dd>
									</dl>
									<div class="explain">
										<p>学生の幸せは私たちの幸せです！</p>
									</div>
								</div>
								<div class="dataCountBox">
									<dl>
										<dt> 1日で1番好きな時間</dt>
										<dd>
											<div class="itemList02 itemList">
												<ul>
													<li>
														<div class="leftBox">
															<p class="blue">寝る前、趣味に時間をつかえるとき</p>
														</div>
														<div class="rightBox">
															<div class="count">
																<p><em class="blue"><?php echo SCF::get('data_favorite_01'); ?></em><span>人</span></p>
															</div>
														</div>
													</li>
													<li>
														<div class="leftBox">
															<p class="green">布団でゴロゴロしているとき</p>
														</div>
														<div class="rightBox">
															<div class="count">
																<p><em class="green"><?php echo SCF::get('data_favorite_02'); ?></em><span>人</span></p>
															</div>
														</div>
													</li>
													<li>
														<div class="leftBox">
															<p class="blue">おいしいご飯をたべているとき</p>
														</div>
														<div class="rightBox">
															<div class="count">
																<p><em class="blue"><?php echo SCF::get('data_favorite_03'); ?></em><span>人</span></p>
															</div>
														</div>
													</li>
													<li>
														<div class="leftBox">
															<p class="green">仕事終わりの一杯をのむとき</p>
														</div>
														<div class="rightBox">
															<div class="count">
																<p><em class="green"><?php echo SCF::get('data_favorite_04'); ?></em><span>人</span></p>
															</div>
														</div>
													</li>
													<li>
														<div class="leftBox">
															<p class="blue">身体を動かしてリフレッシュするとき</p>
														</div>
														<div class="rightBox">
															<div class="count">
																<p><em class="blue"><?php echo SCF::get('data_favorite_05'); ?></em><span>人</span></p>
															</div>
														</div>
													</li>
												</ul>
											</div>
										</dd>
									</dl>
									<div class="explain">
										<p>アクティブ派ものんびり派もみんな自分の時間を楽しんでいます。</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div id="section__data__student">
						<h3>STUDENT</h3>
						<div class="dataStudentPanel01 dataStudentPanel">
							<div class="dataStudentWrap">
								<div class="transitionBox">
									<dl>
										<dt>在籍奨学生数</dt>
										<dd>
											<ul>
												<li>
													<div class="yearBox">
														<p><?php echo SCF::get('gr_data_student_year_01'); ?>年</p>
													</div>
													<div class="countBox">
														<div class="count">
															<p><em><?php echo SCF::get('gr_data_student_num_01'); ?></em><span>名</span></p>
														</div>
													</div>
													<div class="iconBox iconBox1">
														<div class="icon"><img src="<?php bloginfo('template_url'); ?>/image/top/data_student_list_01.png" alt=""></div>
													</div>
												</li>
												<li>
													<div class="yearBox">
														<p><?php echo SCF::get('gr_data_student_year_02'); ?>年</p>
													</div>
													<div class="countBox">
														<div class="count">
															<p><em><?php echo SCF::get('gr_data_student_num_02'); ?></em><span>名</span></p>
														</div>
													</div>
													<div class="iconBox iconBox2">
														<div class="icon"><img src="<?php bloginfo('template_url'); ?>/image/top/data_student_list_02.png" alt=""></div>
													</div>
												</li>
												<li>
													<div class="yearBox">
														<p><?php echo SCF::get('gr_data_student_year_03'); ?>年</p>
													</div>
													<div class="countBox">
														<div class="count">
															<p><em><?php echo SCF::get('gr_data_student_num_03'); ?></em><span>名</span></p>
														</div>
													</div>
													<div class="iconBox iconBox1">
														<div class="icon"><img src="<?php bloginfo('template_url'); ?>/image/top/data_student_list_01.png" alt=""></div>
													</div>
												</li>
											</ul>
										</dd>
									</dl>
								</div>
								<div class="areaBox">
									<dl>
										<dt>出身地</dt>
										<dd>
											<div class="chart"><img src="<?php bloginfo('template_url'); ?>/image/top/data_student_chart.png" alt=""></div>
										</dd>
									</dl>
									<div class="areaList">
										<ul class="list01">
											<li>
												<div class="areaItem">
													<div class="ttl">
														<p>日本</p>
													</div>
													<div class="countBox">
														<div class="count">
															<p><em><?php echo SCF::get('data_area_japan'); ?></em><span>%</span></p>
														</div>
													</div>
												</div>
											</li>
										</ul>
										<div class="listBox">
											<ul class="list02">
												<li>
													<div class="areaItem">
														<div class="ttl">
															<p>日本以外</p>
														</div>
														<div class="countBox">
															<div class="count">
																<p><em><?php echo SCF::get('data_area_other'); ?></em><span>%</span></p>
															</div>
														</div>
													</div>
												</li>
											</ul>
											<div class="areaTxt">
												<p>【出身国（50音順）】</p>
												<p>イラン、エジプト、オマーン、韓国、<br class="pcBreak">シリア、新疆ウイグル自治区、タイ、<br class="pcBreak">台湾、中国、パキスタン、フィリピン、<br class="pcBreak">ブラジル、マレーシア、ミャンマー、<br class="pcBreak">モンゴル、ルワンダ</p>
											</div>
										</div>
										<aside>
											<p>海外出身の学生も多く受け入れています。</p>
										</aside>
									</div>
								</div>
							</div>
						</div>
						<div class="dataStudentPanel02 dataStudentPanel">
							<dl>
								<dt>現奨学生の在籍大学</dt>
								<dd>
									<div class="txt">
										<?php echo nl2br(SCF::get('data_college')); ?>
									</div>
								</dd>
							</dl>
						</div>
						<div class="dataStudentPanel03 dataStudentPanel">
							<dl>
								<dt>在籍奨学生の専門分野</dt>
								<dd>
									<div class="txt">
										<?php echo nl2br(SCF::get('data_faculty')); ?>
									</div>
								</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="section__about">
			<div class="mvContainer">
				<div class="mvPanel">
					<div class="mv"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/about_mv_pc.png" alt=""></div>
				</div>
				<div class="secTitlePanel">
					<div class="secWrap01">
						<div class="secTitleBox">
							<p>ABOUT US</p>
							<h2>財団概要</h2>
						</div>
					</div>
				</div>
			</div>
			<div class="infoContainer">
				<div class="secWrap01">
					<div class="infoBox">
						<dl>
							<dt>名称</dt>
							<dd>
								<p><?php echo nl2br(SCF::get('about_name')); ?></p>
							</dd>
						</dl>
						<dl>
							<dt>所在地</dt>
							<dd>
								<p><?php echo nl2br(SCF::get('about_place')); ?></p>
							</dd>
						</dl>
						<dl>
							<dt>理事長</dt>
							<dd>
								<p><?php echo nl2br(SCF::get('about_chairman')); ?></p>
							</dd>
						</dl>
						<dl>
							<dt>目的</dt>
							<dd>
								<?php echo nl2br(SCF::get('about_purpose')); ?>
							</dd>
						</dl>
						<dl>
							<dt>役員名簿</dt>
							<dd>
								<?php
									$file_id = SCF::get('about_list');
									$file_url = wp_get_attachment_url($file_id);
								?>
								<a href="<?php echo esc_url($file_url); ?>" target="_blank" rel="noopener">PDF</a>
							</dd>
						</dl>
						<dl>
							<dt>資産状況</dt>
							<dd>
								<?php
									$file_id = SCF::get('about_assets');
									$file_url = wp_get_attachment_url($file_id);
								?>
								<a href="<?php echo esc_url($file_url); ?>" target="_blank" rel="noopener">PDF</a>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
		<div id="section__office">
			<div class="secTitlePanel">
				<div class="secWrap01">
					<div class="secTitleBox">
						<p>OFFICE</p>
						<h2>働く環境</h2>
					</div>
				</div>
			</div>
			<div class="officeSlider">
				<?php
					$field = SCF::get('gr_office');
					$i = 1;
					foreach ($field as $fields) {
						$image = wp_get_attachment_image_src($fields['gr_office_img'] , 'full');
				?>
				<div class="slider">
					<div class="sliderBox">
						<div class="photoBox">
							<div class="photo"><img src="<?php echo $image[0]; ?>" alt=""></div>
						</div>
						<div class="txtBox">
							<dl>
								<dt><?php echo nl2br($fields['gr_office_title']); ?></dt>
								<dd><?php echo nl2br($fields['gr_office_txt']); ?></dd>
							</dl>
						</div>
					</div>
				</div>
				<?php $i++; } ?>
			</div>
		</div>
		<div id="section__message">
			<div class="secTitlePanel">
				<div class="secWrap01">
					<div class="secTitleBox">
						<p>DIRECTOR’S <br class="spBreak">MESSAGE</p>
						<h2>局長メッセージ</h2>
					</div>
				</div>
			</div>
			<div class="messageContainer">
				<div class="secWrap01">
					<div class="messagePanel">
						<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/message_photo_pc.png" alt=""></div>
						<div class="txtBox">
							<h3>未来をつくる人の<br>心を心で支える仕事。</h3>
							<div class="txt">
								<p>奨学生を支えるこの仕事は、究極の裏方仕事だと思います。<br>人の成長を、心から支えることができる人、そしてそれを心から喜べる人が、この仕事に向いていると思っていますし、実際にそこに喜びややりがいを感じて輝いている事務局員が、財団を力強く支えてくれています。</p>
								<p>でもそれは、自分を犠牲にすることとは違います。人を支える仕事ではありますが、どんな時でもそこにはぜひ「あなた」がいてほしい。私はそう、強く思っています。</p>
								<p>興味のある分野や、得意なことを発揮しながら、これまで触れてこなかったことにもぜひ、果敢にチャレンジしてください。たくさんの人と関わり、多角的な視野を手に入れることで、自分自身のキャリアアップにもきっとつながるはずです。<br>職員の中には、学業と両立している人や、副業を持つ人、ボランティアや趣味の時間をしっかり確保しながらうまく働いている人もたくさんいます。職員それぞれの理想の働きかたを実現するため、勤務体制も柔軟に対応しています。</p>
								<p>裏方の仕事のやりがいを心から楽しみながら、自分の人生にも潤いを感じられる、そんな人と一緒に、手を取り合って楽しく働きたいと思っています。</p>
							</div>
							<div class="nameBox">
								<p><span>事務局長</span><em>米山 正弘</em></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="section__recruitment">
			<div class="secTitlePanel">
				<div class="secWrap01">
					<div class="secTitleBox">
						<p>RECRUIT</p>
						<h2>募集要項</h2>
					</div>
					<div class="txt">
						<p>中途採用向けの募集を随時行っております。<br class="spBreak">皆様のご応募をお待ちしております。</p>
					</div>
				</div>
			</div>
			<div class="infoContainer">
				<div class="secWrap01">
					<div class="infoBox">
						<dl>
							<dt>募集職種</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_01')); ?>
							</dd>
						</dl>
						<dl>
							<dt>勤務地</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_02')); ?>
							</dd>
						</dl>
						<dl>
							<dt>雇用形態</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_03')); ?>
							</dd>
						</dl>
						<dl>
							<dt>対象となる方</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_04')); ?>
							</dd>
						</dl>
						<dl>
							<dt>選考行程</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_05')); ?>
							</dd>
						</dl>
						<dl>
							<dt>給与</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_06')); ?>
							</dd>
						</dl>
						<dl>
							<dt>昇給</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_07')); ?>
							</dd>
						</dl>
						<dl>
							<dt>勤務時間・曜日</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_08')); ?>
							</dd>
						</dl>
						<dl>
							<dt>休日休暇</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_09')); ?>
							</dd>
						</dl>
						<dl>
							<dt>待遇・福利厚生</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_10')); ?>
							</dd>
						</dl>
						<dl>
							<dt>採用担当者</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_11')); ?>
							</dd>
						</dl>
						<dl>
							<dt>採用人数</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_12')); ?>
							</dd>
						</dl>
						<dl>
							<dt>備考</dt>
							<dd>
								<?php echo nl2br(SCF::get('requirements_13')); ?>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
		<div class="orientationContainer">
			<div class="orientationContainer__panel">
				<div class="orientationContainer__title">
					<p>まずは説明会に参加！</p>
				</div>
				<div class="orientationContainer__bnr">
					<a href="#section__entry">
						<img class="orientationContainer__bnr--pc" src="<?php bloginfo('template_url'); ?>/image/top/main_bnr_pc.png" alt="">
						<img class="orientationContainer__bnr--sp" src="<?php bloginfo('template_url'); ?>/image/top/main_bnr_sp.png" alt="">
					</a>
				</div>
			</div>
		</div>
		<div id="section__entry">
			<div class="secTitleBox">
				<p>ENTRY</p>
				<h2>エントリーフォーム</h2>
			</div>
			<div class="formBox">
				<?php echo do_shortcode('[mwform_formkey key="6057"]'); ?>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
	<!-- ▽footer▽-->
	<footer class="footer">
		<div class="footContainer">
			<div class="footPanel">
				<div class="footBox">
					<div class="logoSns">
						<div class="logo"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_logo.png" alt=""></div>
						<div class="footSns">
							<ul>
								<li><a href="https://www.instagram.com/hattori_scholarship/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_sns_insta.png" alt=""></a></li>
								<li><a href="https://twitter.com/hattori_zaidan" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_sns_x.png" alt=""></a></li>
								<li><a href="https://www.facebook.com/hattorizaidan" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_sns_fb.png" alt=""></a></li>
								<li><a href="https://note.com/hisf/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/icon_sns_note.png" alt=""></a></li>
							</ul>
						</div>
					</div>
					<div class="footNav">
						<ul>
							<li><a href="#section__recruitment">募集要項</a></li>
							<li><a href="#section__about">財団概要</a></li>
							<li><a href="#section__job">仕事について</a></li>
							<li><a href="#section__office">働く環境</a></li>
							<li><a href="#section__interview">スタッフインタビュー</a></li>
							<li><a href="#section__entry">お問い合わせ</a></li>
							<li><a href="#section__voice">奨学生の声</a></li>
						</ul>
					</div>
				</div>
				<div class="footItem">
					<div class="btnEntry"><a href="#section__entry">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/common/header_entry_photo.png" alt=""></div>
							<div class="txtBox">
								<dl>
									<dt>ENTRY</dt>
									<dd>説明会予約・お問い合わせ</dd>
								</dl>
							</div>
						</a></div>
				</div>
			</div>
		</div>
		<div class="copy">
			<p>Copyright&copy; 公益財団法人服部国際奨学財団 All Rights Reserved.</p>
		</div>
	</footer>
	<!-- △footer△-->
	<?php wp_footer(); ?>
</body>

</html>