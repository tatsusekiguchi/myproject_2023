<?php
/*
Template Name: 店舗情報ACCESS
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="infoMain">
		<div class="pageKvContainer">
			<div class="kvLogo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/top_shop_logo.png" alt="confreAell"></a></div>
			<div class="pageKvPanel">
				<div class="kvTitle">
					<h1><img src="<?php bloginfo('template_url'); ?>/image/info/kv_title.png" alt="店舗紹介"></h1>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap02 fadein">
				<div class="infoBox">
					<dl>
						<dt>店舗名</dt>
						<dd>confre Aell（こんふれ　あえる）</dd>
					</dl>
					<dl>
						<dt>住所</dt>
						<dd>愛知県名古屋市中村区名駅4丁目25-16　ウインズ名駅5F</dd>
					</dl>
					<dl>
						<dt>営業時間</dt>
						<dd>平日 17:00～24:00<br>土日祝日　12:00～24：00</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="slidePanel">
			<div class="slideBox">
				<ul>
					<li><img src="<?php bloginfo('template_url'); ?>/image/info/info_slide_01.png" alt=""></li>
					<li><img src="<?php bloginfo('template_url'); ?>/image/info/info_slide_02.png" alt=""></li>
					<li><img src="<?php bloginfo('template_url'); ?>/image/info/info_slide_03.png" alt=""></li>
					<li><img src="<?php bloginfo('template_url'); ?>/image/info/info_slide_04.png" alt=""></li>
					<li><img src="<?php bloginfo('template_url'); ?>/image/info/info_slide_05.png" alt=""></li>
				</ul>
			</div>
		</div>
		<div class="sec02">
			<div class="secWrap02 fadein">
				<div class="secTtl">
					<h2><img src="<?php bloginfo('template_url'); ?>/image/info/title_access.png" alt="アクセス"></h2>
				</div>
				<div class="txt">
					<p>名古屋駅からこんふれ　あえるまでのわかりやすいなびげーとをいたします。</p>
				</div>
				<div class="videoBox"><iframe src="https://www.youtube.com/embed/bjmBJ1Fl0cs?si=jlbCWvQKk2UNbdIg" allow="fullscreen"></iframe></div>
			</div>
		</div>
		<div class="mapBox"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13046.070940873587!2d136.8875012!3d35.1686464!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6003772473ca9021%3A0xe8d384827ac0531f!2zQ29uZnJlIEFlbGwgKOOCs-ODs-OCq-ODleOCpyDlkI3lj6TlsYsp!5e0!3m2!1sja!2sjp!4v1695553001488!5m2!1sja!2sjp" allow="fullscreen"></iframe></div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>