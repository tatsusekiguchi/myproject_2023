<!--{include file='header_subpage.tpl'}-->
<script type="text/javascript" src="../../src/js/yubinbango.js"></script>
		<form action="./<?php if( isset($hid) ) echo "?h=".$hid; ?>" method="post" class="h-adr">
			<dl class="lcl-table01">
				<dt class="lcl-table01__t">お名前<span class="lcl-ico-form-req">必須</span></dt>
				<dd class="lcl-table01__d">
					<input type="text" name="name" value="<?php echo $form->h($form->get_value('name')); ?>" placeholder="例）山田太郎" />
					<?php $form->e('name'); ?>
				</dd>
				<dt class="lcl-table01__t">フリガナ<span class="lcl-ico-form-req">必須</span></dt>
				<dd class="lcl-table01__d">
					<input type="text" name="furi" value="<?php echo $form->h($form->get_value('furi')); ?>" placeholder="例）ヤマダタロウ" />
					<?php $form->e('furi'); ?>
				</dd>
				<dt class="lcl-table01__t">お電話番号<span class="lcl-ico-form-req">必須</span></dt>
				<dd class="lcl-table01__d">
					<input type="text" name="tel" value="<?php echo $form->h($form->get_value('tel')); ?>" placeholder="例）123-4567-8910" />
					<?php $form->e('tel'); ?>
				</dd>
				<dt class="lcl-table01__t">ご連絡希望時間</dt>
				<dd class="lcl-table01__d">
					<label><?php $form->html_options('tel_time', array('指定なし','10：00～12：00','12：00～14：00','14：00～16：00','16：00～18：00')); ?></label>
				</dd>
				<dt class="lcl-table01__t">ご希望家賃<span class="lcl-ico-form-req">必須</span></dt>
				<dd class="lcl-table01__d">
					<?php $form->html_checks('rent', array('〜7万', '〜10万', '〜13万', '〜15万', '〜20万', '25万以上'), 'radio', ' style="display:inline-block;margin-right:12px;"'); ?>
					<?php $form->e('rent'); ?>
				</dd>
				<dt class="lcl-table01__t">メールアドレス</dt>
				<dd class="lcl-table01__d">
					<input type="text" name="mail" value="<?php echo $form->h($form->get_value('mail')); ?>" placeholder="例）info@example.com" />
					<?php $form->e('mail'); ?>
				</dd>
				<dt class="lcl-table01__t">現在お住まいのご住所</dt>
				<dd class="lcl-table01__d">
					<span class="p-country-name" style="display:none;">Japan</span>
					郵便番号：<input type="text" name="zip" value="<?php echo $form->h($form->get_value('zip')); ?>" placeholder="例）460-0002" style="width: 100px;" class="p-postal-code" /><br />
					<?php $form->e('zip'); ?>
					<input type="text" name="address" value="<?php echo $form->h($form->get_value('address')); ?>" placeholder="例）愛知県名古屋市中区丸の内0-00-00" class="mt5 p-region p-locality p-street-address p-extended-address" />
					<?php $form->e('address'); ?>
				</dd>
				<dt class="lcl-table01__t">職種</dt>
				<dd class="lcl-table01__d">
					<label><?php $form->html_options('gyoshu', array('会社員','医療関係','製造業','飲食業','サービス業','IT関係','水商売','学生','その他'), '----'); ?></label>
				</dd>
				<dt class="lcl-table01__t">間取り（複数可）</dt>
				<dd class="lcl-table01__d">
					<?php $form->html_checks('madori', array('1R・1K', '1DK・1LDK', '2LDK', '3LDK以上'), 'checkbox', ' style="display:inline-block;margin-right:12px;"'); ?>
					<?php $form->e('madori'); ?>
				</dd>
				<dt class="lcl-table01__t">お探しのエリア（複数可）</dt>
				<dd class="lcl-table01__d">
					<?php $form->html_checks('area', array('名古屋駅前', '大須', '栄', '金山・鶴舞', '高岳・車道', '大曽根', '千種', '覚王山', 'その他'), 'checkbox', ' style="display:inline-block;margin-right:12px;"'); ?>
					<?php $form->e('area'); ?>
					<p class="fz12 mt5">その他をお選びの場合以下の欄にご希望のエリアを入力ください。</p>
					<input type="text" name="area_othre" value="<?php echo $form->h($form->get_value('area_othre')); ?>" />
				</dd>
				<dt class="lcl-table01__t">ご案内希望日時</dt>
				<dd class="lcl-table01__d">
					<?php
					$g = array('10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00');
					?>
					<div>
						【第1希望】<br />
						<label><?php $form->html_options('date_m', range(1, 12), '----'); ?> 月&nbsp;</label>
						<label><?php $form->html_options('date_d', range(1, 31), '----'); ?> 日&nbsp;</label><br>
						<label class="dib mt10"><?php $form->html_options('date_h', $g, '未選択'); ?> 〜 <?php $form->html_options('date_h_2', $g, '未選択'); ?> 頃&nbsp;</label>
						<?php $form->e('date_m'); ?>
						<?php $form->e('date_d'); ?>
						<?php $form->e('date_h'); ?>
						<?php $form->e('date_h_2'); ?>
					</div>
					<div class="mt10">
						【第2希望】<br />
						<label><?php $form->html_options('date_m2', range(1, 12), '----'); ?> 月&nbsp;</label>
						<label><?php $form->html_options('date_d2', range(1, 31), '----'); ?> 日&nbsp;</label>
						<label class="dib mt10"><?php $form->html_options('date_h2', $g, '未選択'); ?> 〜 <?php $form->html_options('date_h2_2', $g, '未選択'); ?> 頃&nbsp;</label>
						<?php $form->e('date_m2'); ?>
						<?php $form->e('date_d2'); ?>
						<?php $form->e('date_h2'); ?>
						<?php $form->e('date_h2_2'); ?>
					</div>
				</dd>
				<?php /*
				<dt class="lcl-table01__t">ご相談内容（複数可）</dt>
				<dd class="lcl-table01__d">
					<?php $form->html_checks('soudan', array('デザイナーズ物件', '女性向け物件', 'ペット物件', '新築物件'), 'checkbox', ' style="display:inline-block;margin-right:12px;"'); ?>
					<?php $form->e('soudan'); ?>
				</dd>
				*/?>
				<dt class="lcl-table01__t">その他条件・ご質問等</dt>
				<dd class="lcl-table01__d">
					<textarea name="other" rows="6"><?php echo $form->h($form->get_value('other')); ?></textarea>
					<?php $form->e('other'); ?>
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
			<div class="mt30 tac"><input type="image" name="<?php echo $form->get_name_for('enter'); ?>" src="img/b_check.png" alt="確認する" height="60" class="vat" /></div>
			<div class="mt10 tac"><input type="image" name="<?php echo $form->get_name_for('reset'); ?>" src="img/b_reset.png" alt="リセット" height="60" class="vat" /></div>
		</form>
