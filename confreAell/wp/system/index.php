<?php
/*
Template Name: 料金システム
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="systemMain">
		<div class="pageKvContainer">
			<div class="kvLogo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/top_shop_logo.png" alt="confreAell"></a></div>
			<div class="pageKvPanel">
				<div class="kvTitle">
					<h1><img src="<?php bloginfo('template_url'); ?>/image/system/kv_title.png" alt="料金システム"></h1>
				</div>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap02 fadein">
				<div class="topTxt">
					<div class="txt">
						<p>こんふれあえるは、わかりやすく明瞭な料金システムを導入しております。<br>お1人様およそ1000～4000円のご予算で楽しめます！<br>30分からプランがございますのでお気軽にご来店ください。</p>
					</div>
				</div>
				<div class="infoBox">
					<dl>
						<dt>カウンター席：30min</dt>
						<dd>ソフトドリンク飲み放題：900円<br>アルコールあり飲み放題：1,500円</dd>
					</dl>
					<dl>
						<dt>BOX席：40min</dt>
						<dd>アルコール・ソフトドリンク全て飲み放題：4,000円</dd>
					</dl>
					<aside>
						<p>※いずれもチャージ料込み</p>
					</aside>
					<dl>
						<dt>大好き料</dt>
						<dd>2,000円<br>(ツーショットチェキ付き・アイドルが優先的につきます)<br>大好きが増える場合は各セット人数分料金をいただきます。</dd>
					</dl>
					<aside>
						<p>※上記に記されている内容は税サ込みの料金となっております。</p>
					</aside>
				</div>
				<div class="payment">
					<div class="title">
						<h2><img src="<?php bloginfo('template_url'); ?>/image/system/title_pay.png" alt="お支払い方法"></h2>
					</div>
					<div class="txt">
						<p>お支払いは現金と併せて以下クレジットカードでのお支払いがいただけます。</p>
					</div>
					<div class="creditCard"><img src="<?php bloginfo('template_url'); ?>/image/system/pay_card.png" alt=""></div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>