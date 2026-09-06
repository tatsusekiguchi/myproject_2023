<!DOCTYPE html>
<html lang="ja">

<head>
<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-DQLS5D8F8P"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-DQLS5D8F8P');
</script>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="知立の街並みに佇むLagom(ラーゴム)の家はモデルハウスを行っています。すっとが、ずっとに。いつもが、いつまでもに続くそんな住まいをつくりました。「見つかった」「探していた」と感じていただける規格住宅が、Lagomです。">
	<meta name="keywords" content="モデルハウス,見学,オープンハウス,ラーゴム,Lagom,規格化,規格住宅,新築,住宅,丸協,イランイラン,工務店,知立,愛知">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/image/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/image/apple-touch-icon.png">
	<!-- favicon-->
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/image/favicon.ico">
	<!--OGP-->
	<meta property="og:title" content=" Lagom（ラーゴム）の家【モデルハウス】">
	<meta property="og:site_name" content="Lagom（ラーゴム）の家【モデルハウス】" />
	<meta property="og:description" content="知立の街並みに佇むLagom(ラーゴム)の家のモデルハウスを行います。すっとが、ずっとに。いつもが、いつまでもに続くそんな住まいをつくりました。「見つかった」「探していた」と感じていただける規格住宅が、Lagomです。">
	<meta property="og:image" content="<?php bloginfo('template_url'); ?>/image/ogp.png">
	<meta property="og:url" content="http://lagom-liv.jp/">
	<meta property="og:type" content="website">
	<!--サーチコンソール-->
	<meta name="google-site-verification" content="nWE4zFhExyKA95bGIkhEvr4SGKdkg34YgMsbTuo3AL0" />
	<!-- css-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick-theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css?202301241430">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css?202303162200">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css?202301241546">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css?202303162200">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/smoothness/jquery-ui.css">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
	<script src="//code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js?202302101750"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js?202301232200"></script>
	<!-- title-->
	<title>
		<?php if(is_home()): ?>
			Lagom（ラーゴム）の家【モデルハウス】
		<?php else: ?>
		<?php wp_title(''); ?>｜Lagom（ラーゴム）の家【モデルハウス】
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<?php if(is_home()): ?>
		<header class="header topHeader">
	<?php else : ?>
		<header class="header pageHeader">
	<?php endif; ?>
		<div class="headBox">
			<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt="Lagom"></a></div>
			<div class="headItem">
				<div class="headItem__insta"><a href="https://www.instagram.com/lagom_marukyo/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/header_insta.png" alt=""></a></div>
				<div class="headItem__scroll"></div>
			</div>
			<nav class="navBox">
				<div class="navBox__list">
					<?php if(is_home()): ?>
						<ul>
							<li><a href="#concept">Concept</a></li>
							<li><a href="#features">Features</a></li>
							<li><a href="#openHouse">Model House</a></li>
							<li><a href="#news">News and Event</a></li>
							<li><a href="#faq">Faq</a></li>
							<li><a href="#company">Company</a></li>
						</ul>
					<?php else : ?>
						<ul>
							<li><a href="<?php echo home_url(); ?>/#concept">Concept</a></li>
							<li><a href="<?php echo home_url(); ?>/#features">Features</a></li>
							<li><a href="<?php echo home_url(); ?>/#openHouse">Model House</a></li>
							<li><a href="<?php echo home_url(); ?>/#news">News and Event</a></li>
							<li><a href="<?php echo home_url(); ?>/#faq">Faq</a></li>
							<li><a href="<?php echo home_url(); ?>/#company">Company</a></li>
						</ul>
					<?php endif; ?>
				</div>
				<div class="navBox__item">
					<ul>
						<?php if(is_home()): ?>
							<li class="contactLink"><a href="#contact">Contact</a></li>
						<?php else : ?>
							<li class="contactLink"><a href="<?php echo home_url(); ?>/#contact">Contact</a></li>
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
							<div class="subNavigation__main__logo"><a href=""><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt="Lagom"></a></div>
							<div class="subNavigation__main__list">
								<div class="subNavigation__main__list__wrap">
									<ul class="navList">
										<?php if(is_home()): ?>
											<li><a href="#concept">Concept</a></li>
											<li><a href="#features">Features</a></li>
											<li><a href="#openHouse">Model House</a></li>
											<li><a href="#news">News and Event</a></li>
											<li><a href="#faq">Faq</a></li>
											<li><a href="#company">Company</a></li>
											<li class="contact"><a href="#contact">Contact</a></li>
										<?php else : ?>
											<li><a href="<?php echo home_url(); ?>/#concept">Concept</a></li>
											<li><a href="<?php echo home_url(); ?>/#features">Features</a></li>
											<li><a href="<?php echo home_url(); ?>/#openHouse">Model House</a></li>
											<li><a href="<?php echo home_url(); ?>/#news">News and Event</a></li>
											<li><a href="<?php echo home_url(); ?>/#faq">Faq</a></li>
											<li><a href="<?php echo home_url(); ?>/#company">Company</a></li>
											<li class="contact"><a href="<?php echo home_url(); ?>/#contact">Contact</a></li>
										<?php endif; ?>
									</ul>
									<ul class="iconList">
										<li class="insta"><a href="https://www.instagram.com/lagom_marukyo/" target="_blank" rel="noopener">Instagram</a></li>
										<li class="line"><a href="https://line.me/R/ti/p/@488gvbmr?oat__id=1806778" target="_blank" rel="noopener">LINE</a></li>
										<li class="tel"><a href="tel:0522287770">052-228-7770</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
	<!-- △header△-->