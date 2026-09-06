<?php /* このファイルはSmartyで処理されません */ ?>
						<div id="ct_1">
							<h3><img src="src/img/contact/progress_02.png" alt="確認" /></h3>
							<p class="fz14 fwb mt15">入力内容をご確認の上、「送信する」ボタンを押してください。</p>
							<p class="fz12 color03">※は入力必須項目です。</p>
							<table class="mt20">
								<tbody>
									<tr>
										<th>※お名前</th>
										<td><?php $form->v('name'); ?></td>
									</tr>
									<tr>
										<th>※フリガナ</th>
										<td><?php $form->v('furi'); ?></td>
									</tr>
									<tr>
										<th>※電話番号</th>
										<td><?php $form->v('tel'); ?></td>
									</tr>
									<tr>
										<th>ご連絡希望時間</th>
										<td><?php $form->v('rent'); ?></td>
									</tr>
									<tr>
										<th>※ご希望家賃</th>
										<td><?php $form->v('rent'); ?></td>
									</tr>
									<tr>
										<th>メールアドレス</th>
										<td><?php $form->v('mail'); ?></td>
									</tr>
									<tr>
										<th>現在お住まいのご住所</th>
										<td>
											〒<?php $form->v('zip'); ?><br />
											<?php $form->v('address'); ?></td>
									</tr>
									<tr>
										<th>職種</th>
										<td><?php $form->v('gyoshu'); ?></td>
									</tr>
									<tr>
										<th>間取り（複数可）</th>
										<td><?php $form->v('madori'); ?></td>
									</tr>
									<tr>
										<th>お探しのエリア（複数可）</th>
										<td>
											<?php $form->v('area'); ?><br>
											<?php $form->v('area_othre'); ?>
										</td>
									</tr>
									<tr>
										<th>ご案内希望日時</th>
										<td>
											<div>
												第1希望：<?php $form->v('date_m'); ?>月 <?php $form->v('date_d'); ?>日 <?php $form->v('date_h'); ?>頃
											</div>
											<div class="mt5">
												第2希望：<?php $form->v('date_m2'); ?>月 <?php $form->v('date_d2'); ?>日 <?php $form->v('date_h2'); ?>頃
											</div>
										</td>
									</tr>
									<?php /*
									<tr>
										<th>ご相談内容</th>
										<td><?php $form->v('soudan'); ?></td>
									</tr> */ ?>
									<tr>
										<th>その他条件・ご質問等</th>
										<td><?php $form->v('other'); ?></td>
									</tr>
								</tbody>
							</table>
						</div><!-- #ct_1 -->
<?php if( !empty($houses[0]) ): ?>
						<div id="ct_2" class="mt20">
							<div class="h">この物件に問合せする</div>
							<div class="img" style="background-image:url(<?php echo WEB_ROOT."/uploads/".$houses[0]["building"]["b_photo0_c"] ?>);"></div>
							<div class="ml">
								<div class="name"><span class="h">物件名</span><?php echo htmlspecialchars($houses[0]["building"]["building_name_c"]); ?></div>
								<table>
									<tbody>
										<tr>
											<th>タイプ</th>
											<th>間取り</th>
											<th>賃料</th>
										</tr>
										<tr>
											<td><?php echo htmlspecialchars($houses[0]["house"]["house_no_c"]); ?></td>
											<td><?php echo $CONF["layout_regist"][$houses[0]["house"]["layout_c"]]; ?></td>
											<td><?php echo number_format($houses[0]["house"]["rental_price_c"])."円〜"; ?></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div><!-- #ct_2 -->
<?php endif; ?>
						<div class="tac mt40">
							<input type="image" name="<?php echo $form->get_name_for('enter'); ?>" src="src/img/contact/b_03.png" alt="送信する" class="fade_on_hover" />
							<span class="pad">　</span>
							<input type="image" name="<?php echo $form->get_name_for('back'); ?>" src="src/img/contact/b_04.png" alt="修正する" class="fade_on_hover" />
						</div>
