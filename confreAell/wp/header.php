<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="私たちのコンセプトは、お客様がくつろぎ、笑顔になっていただける場所を提供すること。「みんな友達、仲良しがテーマのアットホームなコンカフェ コンフレアエル」にて心温まる時間を共に過ごしませんか？">
	<meta name="keywords" content="名古屋,名古屋駅,コンカフェ,コンセプトカフェ,名駅,カフェ">
	<!-- css-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/animate.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/common.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/layout.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/common_sp.css">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/css/layout_sp.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/attach.css">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/js/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/infiniteslide.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/common.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/js/scrollAnimation.js"></script>
	<!-- title-->
	<title>
		<?php if(is_home()): ?>
			名古屋名駅のコンカフェ☆コンフレアエル（Confre Aell）
		<?php else: ?>
		<?php wp_title(''); ?>｜名古屋名駅のコンカフェ☆コンフレアエル（Confre Aell）
		<?php endif; ?>
	</title>
	<?php wp_head(); ?>
</head>

<body id="top">
	<!-- ▽header▽-->
	<?php
	if (is_front_page()) :
	?>
	<header class="header" id="topHeader">
		<div class="headContainer">
			<div class="headBox">
				<div class="logoPc logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/top_shop_logo.png" alt=""></a></div>
				<div class="logoSp logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_cross_bear.png" alt=""></a></div>
				<div class="headInfo">
					<dl>
						<dt>【営業時間 】</dt>
						<dd> 平日 17:00～24:00<br>土日祝日 12:00～24:00</dd>
					</dl>
				</div>
				<nav class="navBox">
					<div class="navWrap">
						<div class="navList">
							<ul>
								<li><a href="<?php echo home_url(); ?>">T<em>O</em>P</a></li>
								<li><a href="<?php echo home_url(); ?>/concept/">CO<em>NC</em>EPT</a></li>
								<li><a href="<?php echo home_url(); ?>/system/">SY<em>ST</em>EM</a></li>
								<li><a href="<?php echo home_url(); ?>/castlist/">C<em>AS</em>T</a></li>
								<li><a href="<?php echo home_url(); ?>/newslist/">NEW<em>S/E</em>VENT</a></li>
								<li><a href="<?php echo home_url(); ?>/info/">AC<em>CE</em>SS</a></li>
								<li><a href="<?php echo home_url(); ?>/contact/">CON<em>T</em>ACT</a></li>
							</ul>
						</div>
						<div class="sns">
							<ul>
								<li><a href="https://www.tiktok.com/@confre.aell" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/sns_tiktok.png" alt=""></a></li>
								<li><a href="https://twitter.com/confreAell" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/sns_x.png" alt=""></a></li>
							</ul>
						</div>
						<div class="navInfo">
							<p>愛知県名古屋市中村区名駅4丁目25-16　ウインズ名駅5F</p>
							<p>【営業時間 】 平日 17:00～24:00　土日祝日　12:00～24：00</p>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<div class="hamburger"><span></span><span></span><span></span></div>
	</header>
	<?php
	else :
	?>
	<header class="header" id="pageHeader">
		<div class="headContainer">
			<div class="headBox">
				<div class="logoPc logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/top_shop_logo.png" alt=""></a></div>
				<div class="logoSp logo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/header_cross_bear.png" alt=""></a></div>
				<div class="headInfo">
					<dl>
						<dt>【営業時間 】</dt>
						<dd> 平日 17:00～24:00<br>土日祝日 12:00～24:00</dd>
					</dl>
				</div>
				<nav class="navBox">
					<div class="navWrap">
						<div class="navList">
							<ul>
								<li><a href="<?php echo home_url(); ?>">T<em>O</em>P</a></li>
								<li><a href="<?php echo home_url(); ?>/concept/">CO<em>NC</em>EPT</a></li>
								<li><a href="<?php echo home_url(); ?>/system/">SY<em>ST</em>EM</a></li>
								<li><a href="<?php echo home_url(); ?>/castlist/">C<em>AS</em>T</a></li>
								<li><a href="<?php echo home_url(); ?>/newslist/">NEW<em>S/E</em>VENT</a></li>
								<li><a href="<?php echo home_url(); ?>/info/">AC<em>CE</em>SS</a></li>
								<li><a href="<?php echo home_url(); ?>/contact/">CON<em>T</em>ACT</a></li>
							</ul>
						</div>
						<div class="sns">
							<ul>
								<li><a href="https://www.tiktok.com/@confre.aell" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/sns_tiktok.png" alt=""></a></li>
								<li><a href="https://twitter.com/confreAell" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/sns_x.png" alt=""></a></li>
							</ul>
						</div>
						<div class="navInfo">
							<p>愛知県名古屋市中村区名駅4丁目25-16　ウインズ名駅5F</p>
							<p>【営業時間 】 平日 17:00～24:00　土日祝日　12:00～24：00</p>
						</div>
					</div>
				</nav>
			</div>
		</div>
		<div class="hamburger"><span></span><span></span><span></span></div>
	</header>
	<?php
	endif;
	?>
	<!-- △header△-->