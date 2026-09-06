<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="topMain">
		<div class="mvPanel">
			<h1>Colorful Days with LINEX</h1>
			<div class="mvMovie mvMovie--pc">
				<video src="<?php bloginfo('template_url'); ?>/image/top/top_kv_video_pc.mp4" autoplay="" loop="" muted="" playsinline=""></video>
			</div>
			<div class="mvMovie mvMovie--sp">
				<video src="<?php bloginfo('template_url'); ?>/image/top/top_kv_video_sp.mp4" autoplay="" loop="" muted="" playsinline=""></video>
			</div>
		</div>
		<div class="mvScroll"><img src="<?php bloginfo('template_url'); ?>/image/top/top_kv_scroll.png" alt="SCROLL"></div>
		<div class="topTxtPanel">
			<div class="txt fadeUp">
				<p>私たちリネクスは、カーポートや物置、<br class="spBreak">フェンスや石材等の<br>エクステリア商材の販売から輸送をはじめ、<br class="spBreak">設計から外構・造園工事まで<br>エクステリアをトータルにコーディネートします。</p>
			</div>
		</div>
		<div class="sec01">
			<div class="secWrap01">
				<div class="secTitle fadeUp">
					<h2><img src="<?php bloginfo('template_url'); ?>/image/top/top_sec01_title.png" alt="Sensibility"></h2>
				</div>
				<p class="fadeUp">感性をたいせつに。</p>
			</div>
			<div class="secPanel">
				<div class="secWrap01">
					<div class="txtBox">
						<div class="txt">
							<p class="fadeUp">感性とは人それぞれの色であり、<br>一人ひとりの個性であり、人生です。</p>
							<p class="fadeUp">”一期一会”の感性との出会いをよろこび。<br>わたしたちとつながる全ての人々に、<br>いろどりある人生をご提供したい・・・<br>それが、わたしたちの想いです。</p>
						</div>
					</div>
				</div>
				<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_sec01_photo.png" alt=""></div>
			</div>
		</div>
		<div class="sec02">
			<div class="secWrap02">
				<div class="secTitle fadeUp">
					<h2><img src="<?php bloginfo('template_url'); ?>/image/top/top_sec02_title.png" alt="Our Strength"></h2>
				</div>
				<div class="txtBox">
					<dl class="fadeUp">
						<dt>LINEXの5つの強み</dt>
						<dd>
							<div class="txt">
								<p>付加価値の高い挑戦を続ける<br>最強のパートナーとして</p>
							</div>
						</dd>
					</dl>
					<div class="btnLink"><a href="<?php echo home_url(); ?>/strength/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_read_more.png" alt=""></a></div>
				</div>
			</div>
			<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_sec02_photo.png" alt=""></div>
		</div>
		<div class="linkPanel01">
			<div class="inner">
				<ul>
					<li>
						<div class="img fadeUp"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_link_business_pc.png" alt=""></div>
						<div class="btnLink01 btnLink"><a href="<?php echo home_url(); ?>/business/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_read_more.png" alt=""></a></div>
					</li>
					<li>
						<div class="img fadeUp"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_link_recruit_pc.png" alt=""></div>
						<div class="btnLink02 btnLink"><a href="<?php echo home_url(); ?>/recruitment/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_read_more.png" alt=""></a></div>
					</li>
				</ul>
			</div>
		</div>
		<div class="linkPanel02">
			<ul>
				<li class="fadeUp">
					<p>代表メッセージ</p>
					<div class="btnLink"><a href="<?php echo home_url(); ?>/message/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_read_more.png" alt=""></a></div>
				</li>
				<li class="fadeUp">
					<p>会社概要</p>
					<div class="btnLink"><a href="<?php echo home_url(); ?>/company/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_read_more.png" alt=""></a></div>
				</li>
				<li class="fadeUp">
					<p>お問い合わせ</p>
					<div class="btnLink"><a href="<?php echo home_url(); ?>/contact/"><img src="<?php bloginfo('template_url'); ?>/image/common/btn_read_more.png" alt=""></a></div>
				</li>
			</ul>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>