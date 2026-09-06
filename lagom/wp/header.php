<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="知立の街並みに佇むLagom(ラーゴム)の家の完成見学会を行います。すっとが、ずっとに。いつもが、いつまでもに続くそんな住まいをつくりました。「見つかった」「探していた」と感じていただける規格住宅が、Lagomです。">
	<meta name="keywords" content="ラーゴム,Lagom,規格化,規格住宅,新築,住宅,丸協,イランイラン,工務店,知立,愛知">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/image/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/image/apple-touch-icon.png">
	<!-- favicon-->
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/image/favicon.ico">
	<!--OGP-->
	<meta property="og:title" content=" Lagom（ラーゴム）の家【完成見学会開催】">
	<meta property="og:site_name" content="Lagom（ラーゴム）の家【完成見学会開催】" />
	<meta property="og:description" content="知立の街並みに佇むLagom(ラーゴム)の家の完成見学会を行います。すっとが、ずっとに。いつもが、いつまでもに続くそんな住まいをつくりました。「見つかった」「探していた」と感じていただける規格住宅が、Lagomです。">
	<meta property="og:image" content="<?php bloginfo('template_url'); ?>/image/ogp.png">
	<meta property="og:url" content="http://lagom-liv.jp/">
	<meta property="og:type" content="website">
	<!-- css-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css?202301161630">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css?202301161630">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css?202301161630">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css?202301162300">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js?202301121100"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js?202301121100"></script>
	<!-- title-->
	<title>
		<?php if(is_home()): ?>
			Lagom（ラーゴム）の家【完成見学会開催】
		<?php else: ?>
		<?php wp_title(''); ?>｜Lagom（ラーゴム）の家【完成見学会開催】
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="headBox">
			<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt="Lagom"></a></div>
			<nav class="navBox">
				<div class="navBox__list">
					<ul>
						<?php if(is_home()): ?>
							<li><a href="#concept">Lagomコンセプト</a></li>
							<li><a href="#event">イベント情報　</a></li>
							<li><a href="#point">Lagomポイント</a></li>
							<li><a href="#story">家が建つまで</a></li>
							<li><a href="#faq">よくある質問</a></li>
						<?php else : ?>
							<li><a href="<?php echo home_url(); ?>/#concept">Lagomコンセプト</a></li>
							<li><a href="<?php echo home_url(); ?>/#event">イベント情報　</a></li>
							<li><a href="<?php echo home_url(); ?>/#point">Lagomポイント</a></li>
							<li><a href="<?php echo home_url(); ?>/#story">家が建つまで</a></li>
							<li><a href="<?php echo home_url(); ?>/#faq">よくある質問</a></li>
						<?php endif; ?>
					</ul>
					<div class="navBox__list__insta"><a href="https://www.instagram.com/lagom_marukyo/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/header_insta.png" alt=""></a></div>
				</div>
				<div class="navBox__item">
					<ul>
						<?php if(is_home()): ?>
							<li class="contactLink"><a href="#contact">お問い合わせ</a></li>
						<?php else : ?>
							<li class="contactLink"><a href="<?php echo home_url(); ?>/#contact">お問い合わせ</a></li>
						<?php endif; ?>
						<li class="hamburgerBox">
							<div class="hamburger"><span></span><span></span><span></span></div>
						</li>
					</ul>
				</div>
			</nav>
		</div>
		<div class="subNavigationContainer">
			<div class="subNavigation">
				<div class="subNavigation__wrap">
					<div class="subNavigation__main">
						<div class="subNavigation__main__wrap">
							<div class="subNavigation__main__logo"><img src="<?php bloginfo('template_url'); ?>/image/common/navigation_logo.png" alt="Lagom"></div>
							<div class="subNavigation__main__list">
								<ul>
									<?php if(is_home()): ?>
										<li><a href="#concept"><em>concept</em><span>ラーゴムのコンセプト</span></a></li>
										<li><a href="#event"><em>NEWS&amp;EVENT</em><span>ニュース＆イベント</span></a></li>
										<li><a href="#point"><em>Lagom’s Point</em><span>ラーゴムのポイント</span></a></li>
										<li><a href="#faq"><em>FAQ</em><span>よくある質問</span></a></li>
									<?php else : ?>
										<li><a href="<?php echo home_url(); ?>/#concept"><em>concept</em><span>ラーゴムのコンセプト</span></a></li>
										<li><a href="<?php echo home_url(); ?>/#event"><em>NEWS&amp;EVENT</em><span>ニュース＆イベント</span></a></li>
										<li><a href="<?php echo home_url(); ?>/#point"><em>Lagom’s Point</em><span>ラーゴムのポイント</span></a></li>
										<li><a href="<?php echo home_url(); ?>/#faq"><em>FAQ</em><span>よくある質問</span></a></li>
									<?php endif; ?>
								</ul>
								<ul>
									<?php if(is_home()): ?>
										<li><a href="#story"><em>Flow</em><span>家が建つまで</span></a></li>
										<li><a href="#contact"><em>Contact</em><span>お問い合わせ</span></a></li>
										<li><a href="#company"><em>Company</em><span>会社概要</span></a></li>
									<?php else : ?>
										<li><a href="<?php echo home_url(); ?>/#story"><em>Flow</em><span>家が建つまで</span></a></li>
										<li><a href="<?php echo home_url(); ?>/#contact"><em>Contact</em><span>お問い合わせ</span></a></li>
										<li><a href="<?php echo home_url(); ?>/#company"><em>Company</em><span>会社概要</span></a></li>
									<?php endif; ?>
								</ul>
							</div>
						</div>
					</div>
					<div class="subNavigation__bottom--pc">
						<div class="bnr__entry">
							<div class="photoBox">
								<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/common/navigation_bnr_img.png" alt=""></div>
							</div>
							<div class="txtBox">
								<div class="inner">
									<div class="logo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_bnr_entry_logo.png" alt=""></div>
									<div class="ttl">
										<p>イベント・内覧会の予約はこちら</p>
										<div class="ttl__img"><img src="<?php bloginfo('template_url'); ?>/image/common/navigation_bnr_title.png" alt="イベント・内覧会の予約はこちら"></div>
									</div>
									<div class="btn">
										<?php if(is_home()): ?>
											<a href="#contact">CLICK</a>
										<?php else : ?>
											<a href="<?php echo home_url(); ?>/#contact">CLICK</a>
										<?php endif; ?>
									</div>
								</div>
							</div>
						</div>
						<div class="contactBox">
							<div class="ttl">
								<p>お問い合わせ</p>
							</div>
							<div class="txtBox">
								<dl class="sns">
									<dt>FOLLOW ME</dt>
									<dd>
										<ul>
											<li class="insta"><a href="https://www.instagram.com/lagom_marukyo/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/navigation_insta.png" alt=""></a></li>
											<!-- <li class="tweet"><a href="" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/navigation_tweet.png" alt=""></a></li>
											<li class="youtube"><a href="" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/navigation_youtube.png" alt=""></a></li> -->
										</ul>
									</dd>
								</dl>
								<div class="copy">
									<p>COPYRIGHT （C） Lagom ALL RIGHTS RESERVED.</p>
								</div>
							</div>
						</div>
					</div>
					<div class="subNavigation__bottom--sp">
						<dl class="sns">
							<dt>FOLLOW ME</dt>
							<dd>
								<ul>
									<li class="insta"><a href="https://www.instagram.com/lagom_marukyo/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_insta.png" alt=""></a></li>
									<!-- <li class="tweet"><a href="" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_tweet.png" alt=""></a></li>
									<li class="youtube"><a href="" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_youtube.png" alt=""></a></li> -->
								</ul>
							</dd>
						</dl>
						<div class="copy">
							<p>COPYRIGHT （C） Lagom ALL RIGHTS RESERVED.</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- △header△-->