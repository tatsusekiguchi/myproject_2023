<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="名古屋、岐阜に新しくオープンする美容院Santa’Fe（サンタフェ）は、新しい白髪へのカラーアプローチを行う”ミッドグレース”を提供しています。白髪は隠すもの。そんなことはありません。私の髪色で私だけの色で、もっと自由にヘアカラーをしませんか？">
	<meta name="keywords" content="名古屋駅,名古屋,岐阜,ヘアサロン,美容院,サンタフェ,Santa’Fe,白髪染め,白髪ぼかし,ハイライト">
	<link rel="apple-touch-icon" sizes="180x180" href="<?php bloginfo('template_url'); ?>/image/apple-touch-icon.png">
	<link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/image/apple-touch-icon.png">
	<!-- favicon-->
	<link rel="icon" href="<?php bloginfo('template_url'); ?>/image/favicon.ico">
	<!--OGP-->
	<meta property="og:title" content=" 白髪への新しいカラーアプローチ【ミッドグレース】を提案するヘアサロン｜Santa’Fe">
	<meta property="og:site_name" content="白髪への新しいカラーアプローチ【ミッドグレース】を提案するヘアサロン｜Santa’Fe" />
	<meta property="og:description" content="名古屋、岐阜に新しくオープンする美容院Santa’Fe（サンタフェ）は、新しい白髪へのカラーアプローチを行う”ミッドグレース”を提供しています。白髪は隠すもの。そんなことはありません。私の髪色で私だけの色で、もっと自由にヘアカラーをしませんか？">
	<meta property="og:image" content="<?php bloginfo('template_url'); ?>/image/ogp.png">
	<meta property="og:url" content="http://santafe-salon.com">
	<meta property="og:type" content="website">
	<!--サーチコンソール-->
	<meta name="google-site-verification" content="nnD7nbDjqjpuJY5Al_FpljPOT0UMaINbEVgnsaxUqBg" />
	<!-- css-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/slick-theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css?202307312100">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css?202307312100">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css?202307312100">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css?202307312100">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/slick.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js?202305250800"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js"></script>
	<!-- title-->
	<title>
		<?php if(is_home()): ?>
			白髪への新しいカラーアプローチ【ミッドグレース】を提案するヘアサロン｜Santa’Fe
		<?php else: ?>
		<?php wp_title(''); ?>｜白髪への新しいカラーアプローチ【ミッドグレース】を提案するヘアサロン｜Santa’Fe
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="headBox">
			<div class="logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_logo.png" alt="SantaFe"></a></div>
			<div class="headItem">
				<div class="btnStyleGallery"><a href="https://www.instagram.com/iwa.hikaru.www/" target="_blank" rel="noopener"><em>Style Gallery</em><span><img src="<?php bloginfo('template_url'); ?>/image/common/header_btn_insta.png" alt=""><span>施術写真はこちら</span></span></a></div>
				<div class="btnReserveAccordion">
					<dl class="accord">
						<dt><em>Reserve</em><span>ご予約はこちら</span></dt>
						<dd>
							<ul>
								<?php
									$field = SCF::get('shop', 22);
									foreach ($field as $fields) {
								?>
								<li><a href="<?php echo $fields['shop_reserve']; ?>" target="_blank" rel="noopener"><?php echo $fields['shop_branch']; ?></a></li>
								<?php  } ?>
							</ul>
							<p class="close">CLOSE</p>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</header>
	<!-- △header△-->