<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="topMain">
		<div class="mvPanel">
			<div class="mvMovie mvMovie--pc">
				<video src="<?php bloginfo('template_url'); ?>/image/top/top_kv_movie_pc.mp4" autoplay="" loop="" muted="" playsinline=""></video>
			</div>
			<div class="mvMovie mvMovie--sp">
				<video src="<?php bloginfo('template_url'); ?>/image/top/top_kv_movie_sp.mp4" autoplay="" loop="" muted="" playsinline=""></video>
			</div>
		</div>
		<div class="mvScroll"><img src="<?php bloginfo('template_url'); ?>/image/top/top_kv_scroll.png" alt="SCROLL"></div>
		<div class="topTitlePanel">
			<div class="secWrap">
				<h1 class="fadeUp">建物の美観を護る<br>街の景観を護る</h1>
				<p class="fadeUp">私たちは持続可能な<br class="spBreak">街づくりに貢献し続けます。</p>
			</div>
		</div>
		<div class="topNavContainer">
			<div class="secWrap01">
				<div class="topNavPanel">
					<div class="linkBox01 linkBox fadeUp">
						<div class="inner">
							<div class="ttlBox">
								<p>Our business</p>
								<h2>事業・サービス領域</h2>
							</div>
							<div class="btnMore01 btnMore"><a href="<?php echo home_url(); ?>/business/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_more_black.png" alt=""></a></div>
						</div>
					</div>
					<div class="linkBox02 linkBox fadeUp">
						<div class="inner">
							<div class="ttlBox">
								<p>Our Features</p>
								<h2>私たちの特長</h2>
							</div>
							<div class="btnMore02 btnMore"><a href="<?php echo home_url(); ?>/features/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_more_black.png" alt=""></a></div>
						</div>
					</div>
					<div class="linkBox03 linkBox fadeUp">
						<div class="inner">
							<div class="ttlBox">
								<h2>施工実績</h2>
							</div>
							<div class="btnMore03 btnMore"><a href="<?php echo home_url(); ?>/achievements/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_more_black.png" alt=""></a></div>
						</div>
					</div>
					<div class="linkBox04 linkBox fadeUp">
						<div class="inner">
							<div class="ttlBox">
								<p>Recruit</p>
								<h2>採用情報</h2>
							</div>
							<div class="btnMore04 btnMore"><a href="<?php echo home_url(); ?>/recruit/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_more_black.png" alt=""></a></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="subNavContainer">
			<div class="secWrap01">
				<ul>
					<li class="link01 fadeUp"><a href="<?php echo home_url(); ?>/company/">
							<div class="ttl">
								<p>企業情報</p>
							</div>
							<div class="linkButton"><img src="<?php bloginfo('template_url'); ?>/image/top/top_sub_nav_btn.png" alt=""></div>
						</a></li>
					<li class="link02 fadeUp"><a href="<?php echo home_url(); ?>/contact/">
							<div class="ttl">
								<p>お問い合わせ</p>
							</div>
							<div class="linkButton"><img src="<?php bloginfo('template_url'); ?>/image/top/top_sub_nav_btn.png" alt=""></div>
						</a></li>
				</ul>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>