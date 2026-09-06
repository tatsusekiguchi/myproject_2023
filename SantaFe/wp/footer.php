		<!-- ▽footer▽-->
		<footer class="footer">
			<div class="secWrap">
				<div class="logo"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_logo.png" alt="SantaFe"></div>
				<div class="footBox01">
					<dl>
						<dt>自分の髪は「こんなにいい。」<br class="spBreak">を実感しませんか？</dt>
						<dd>
							<div class="btnReserveAccordion">
								<dl class="accord">
									<dt>予約はこちら</dt>
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
						</dd>
					</dl>
				</div>
				<div class="footBox02">
					<div class="insta"><a href="https://www.instagram.com/iwa.hikaru.www/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/footer_insta.png" alt=""></a></div>
					<div class="copy">
						<p>Copyright ©Santa'Fe All rights reserved.</p>
					</div>
				</div>
			</div>
		</footer>
		<!-- △footer△-->
		<?php wp_footer(); ?>
	</body>
</html>