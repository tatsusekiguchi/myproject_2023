		<form action="./<?php if( isset($hid) ) echo "?h=".$hid; ?>" method="post">
			<dl class="lcl-table01">
				<dt class="lcl-table01__t">お名前<span class="lcl-ico-form-req">必須</span></dt>
				<dd class="lcl-table01__d">
					<?php $form->v('name'); ?>
				</dd>
				<dt class="lcl-table01__t">フリガナ<span class="lcl-ico-form-req">必須</span></dt>
				<dd class="lcl-table01__d">
					<?php $form->v('furi'); ?>
				</dd>
				<dt class="lcl-table01__t">お電話番号<span class="lcl-ico-form-req">必須</span></dt>
				<dd class="lcl-table01__d">
					<?php $form->v('tel'); ?>
				</dd>
				<dt class="lcl-table01__t">ご連絡希望時間</dt>
				<dd class="lcl-table01__d">
					<?php $form->v('tel_time'); ?>
				</dd>
				<dt class="lcl-table01__t">ご希望家賃<span class="lcl-ico-form-req">必須</span></dt>
				<dd class="lcl-table01__d">
					<?php $form->v('rent'); ?>
				</dd>
				<dt class="lcl-table01__t">メールアドレス</dt>
				<dd class="lcl-table01__d">
					<?php $form->v('mail'); ?>
				</dd>
				<dt class="lcl-table01__t">現在お住まいのご住所</dt>
				<dd class="lcl-table01__d">
					〒<?php $form->v('zip'); ?><br>
					<?php $form->v('address'); ?>
				</dd>
				<dt class="lcl-table01__t">職種</dt>
				<dd class="lcl-table01__d">
					<?php $form->v('gyoshu'); ?>
				</dd>
				<dt class="lcl-table01__t">間取り（複数可）</dt>
				<dd class="lcl-table01__d">
					<?php $form->v('madori'); ?>
				</dd>
				<dt class="lcl-table01__t">お探しのエリア（複数可）</dt>
				<dd class="lcl-table01__d">
					<?php $form->v('area'); ?><br>
					<?php $form->v('area_othre'); ?>
				</dd>
				<dt class="lcl-table01__t">ご案内希望日時</dt>
				<dd class="lcl-table01__d">
					<div>
						第1希望：<?php $form->v('date_m'); ?>月 <?php $form->v('date_d'); ?>日 <?php $form->v('date_h'); ?> 〜 <?php $form->v('date_h_2'); ?>頃
					</div>
					<div class="mt5">
						第2希望：<?php $form->v('date_m2'); ?>月 <?php $form->v('date_d2'); ?>日 <?php $form->v('date_h2'); ?> 〜 <?php $form->v('date_h2_2'); ?>頃
					</div>
				</dd>
				<?php /*
				<dt class="lcl-table01__t">ご相談内容</dt>
				<dd class="lcl-table01__d">
					<?php $form->v('soudan'); ?>
				</dd>
				*/ ?>
				<dt class="lcl-table01__t">その他条件・ご質問等</dt>
				<dd class="lcl-table01__d">
					<?php $form->v('other'); ?>
				</dd>
			</dl>
<?php if( !empty($houses[0]) ): ?>
			<div class="lcl-contact-bukken mt30">
				<div class="lcl-contact-bukken__h">この物件に問合せする</div>
				<div class="lcl-bukken lcl-contact-bukken__article">
					<div class="lcl-bukken__name"><span class="h">物件名</span><?php echo htmlspecialchars($houses[0]["building"]["building_name_c"]); ?></div>
					<div class="lcl-bukken__img" style="background-image:url(<?php echo HU."/../uploads/".$houses[0]["building"]["b_photo0_c"] ?>);"></div>
					<ul class="lcl-bukken__data">
						<li class="lcl-bukken__data-item">タイプ：<?php echo htmlspecialchars($houses[0]["house"]["house_no_c"]); ?></li>
						<li class="lcl-bukken__data-item">間取り：<?php echo $CONF["layout_regist"][$houses[0]["house"]["layout_c"]]; ?></li>
						<li class="lcl-bukken__data-item">賃料：<?php echo number_format($houses[0]["house"]["rental_price_c"])."円〜"; ?></li>
					</ul>
				</div>
			</div>
<?php endif; ?>
			<div class="mt30 tac"><input type="image" name="<?php echo $form->get_name_for('enter'); ?>" src="img/b_send.png" alt="送信する" height="60" class="vat" /></div>
			<div class="mt10 tac"><input type="image" name="<?php echo $form->get_name_for('back'); ?>" src="img/b_back.png" alt="修正する" height="60" class="vat" /></div>
		</form>
