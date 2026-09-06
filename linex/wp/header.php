<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="カーポートや物置・フェンスや石材等のエクステリア商材の販売から輸送をはじめ、設計から外構・造園工事までエクステリアをトータルにコーディネートします。">
	<meta name="keywords" content="カーポート,物置,フェンス,石材,エクステリア商材,外構,造園工事,エクステリア">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/image/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/image/apple-touch-icon.png">
	<!-- favicon-->
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/image/favicon.ico">
	<!-- css-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/css/lightbox.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css?202304131430">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css?202304131430">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.7.1/js/lightbox.min.js" type="text/javascript"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js?"></script>
	<!-- title-->
	<title>
		<?php if(is_home()): ?>
			LINEX株式会社 エクステリアのトータルコーディネーター
		<?php else: ?>
		<?php wp_title(''); ?>｜LINEX株式会社 エクステリアのトータルコーディネーター
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="headWrap">
			<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt="LINEX"></a></div>
			<div class="hamburger">
				<p>MENU</p><span></span><span></span>
			</div>
		</div>
		<div class="navBox">
			<div class="navList">
				<ul>
					<li><a href="<?php echo home_url(); ?>">TOP</a></li>
					<li><a href="<?php echo home_url(); ?>/strength/">当社の強み</a></li>
					<li><a href="<?php echo home_url(); ?>/business/">事業内容</a></li>
					<li><a href="<?php echo home_url(); ?>/message/">代表メッセージ</a></li>
					<li><a href="<?php echo home_url(); ?>/recruitment/">採用情報</a></li>
					<li><a href="<?php echo home_url(); ?>/company/">会社概要</a></li>
					<li><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></li>
				</ul>
			</div>
		</div>
	</header>
	<!-- △header△-->