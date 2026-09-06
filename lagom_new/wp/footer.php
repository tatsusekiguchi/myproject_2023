		<!-- ▽footer▽-->
		<footer class="footer">
			<div class="footer__items">
				<div class="footer__items__insta"><a href="https://www.instagram.com/lagom_marukyo/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/header_insta.png" alt=""></a></div>
				<div class="footer__items__contact">
					<?php if(is_home()): ?>
						<a href="#contact">contact</a>
					<?php else : ?>
						<a href="<?php echo home_url(); ?>/#contact">contact</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="logo"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_logo.png" alt="Lagom"></div>
			<div class="txt">
				<p>3-22-8, Chiyoda, Naka Ku, Nagoya, <br class="spBreak">Aichi, 460-0012</p>
			</div>
			<div class="sns">
				<div class="insta"><a href="https://www.instagram.com/lagom_marukyo/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_insta.png" alt=""></a></div>
			</div>
			<div class="copy">
				<p>COPYRIGHT （C） Lagom ALL RIGHTS RESERVED.</p>
			</div>
		</footer>
		<!-- △footer△-->
		<?php wp_footer(); ?>
	</body>
</html>