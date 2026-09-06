<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="光触媒・外壁塗装・防水工事・リフォーム等。熱交換塗料、TOTO光触媒ハイドロテクトもラインナップに！ホームページでも相談を受け付けています。">
	<meta name="keywords" content="ハイドロテクト,断熱,塗装,防水,屋上,雨漏り,ひび割れ,ペンキ,塗り替え,模様替え,リフォーム,屋根,熱交換塗料,光触媒,酸化チタン,タフコート">
	<!-- favicon-->
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/image/favicon.ico">
	<!-- css-->
	<link rel="stylesheet" type="text/css" href="https://unpkg.com/modal-video@2.4.8/css/modal-video.min.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="https://unpkg.com/modal-video@2.4.8/js/jquery-modal-video.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js?"></script>
	<!-- title-->
	<title>
		<?php if(is_home()): ?>
			カトー建材工業株式会社
		<?php else: ?>
		<?php wp_title(''); ?>｜カトー建材工業株式会社
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="headWrap">
			<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt="カトー建材工業株式会社"></a></div>
			<div class="hamburger">
				<p>MENU</p><span></span><span></span>
			</div>
			<nav class="navBox">
				<div class="navList">
					<ul>
						<li><a href="<?php echo home_url(); ?>">TOP</a></li>
						<li><a href="<?php echo home_url(); ?>/business/">事業内容</a></li>
						<li><a href="<?php echo home_url(); ?>/features/">私たちの特長</a></li>
						<li><a href="<?php echo home_url(); ?>/achievements/">施工実績</a></li>
						<li><a href="<?php echo home_url(); ?>/company/">企業情報</a></li>
						<li><a href="<?php echo home_url(); ?>/recruit/">採用情報</a></li>
						<li><a href="<?php echo home_url(); ?>/contact/">お問い合わせ</a></li>
					</ul>
				</div>
			</nav>
		</div>
	</header>
	<!-- △header△-->