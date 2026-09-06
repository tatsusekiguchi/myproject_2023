		<div class="bnr__entry fadeUp">
			<div class="photoBox">
				<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_bnr_entry_img_pc.png" alt=""></div>
			</div>
			<div class="txtBox">
				<div class="inner">
					<div class="logo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_bnr_entry_logo.png" alt=""></div>
					<dl>
						<dt>イベント・内覧会の予約はこちら</dt>
						<dd>内覧会は水曜日を除く10：00〜17：00に常時行っております。<br>完全ご予約のため、ゆったりとlagomの家を見ていただけます。</dd>
					</dl>
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
		<!-- ▽footer▽-->
		<footer class="footer">
			<div class="footer__items">
				<div class="footer__items__entry">
					<?php if(is_home()): ?>
						<a href="#contact"><span>イベント・内覧会の<br>予約はこちら</span></a>
					<?php else : ?>
						<a href="<?php echo home_url(); ?>/#contact"><span>イベント・内覧会の<br>予約はこちら</span></a>
					<?php endif; ?>
				</div>
				<div class="footer__items__contact">
					<?php if(is_home()): ?>
						<a href="#contact"><span>家づくりの<br>お問い合わせはこちら</span></a>
					<?php else : ?>
						<a href="<?php echo home_url(); ?>/#contact"><span>家づくりの<br>お問い合わせはこちら</span></a>
					<?php endif; ?>
				</div>
			</div>
			<div class="logo"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_logo.png" alt="Lagom"></div>
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
		</footer>
		<!-- △footer△-->
		<?php wp_footer(); ?>
	</body>
</html>