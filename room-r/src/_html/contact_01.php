<?php /* このファイルはSmartyで処理されません */ ?>
						<div id="ct_1">
							<h3><img src="src/img/contact/progress_01.png" alt="入力" /></h3>
							<p class="fz14 fwb mt15">ご希望の物件について必要事項を入力の上、「確認する」ボタンを押してください。</p>
							<p class="fz12 color03">※は入力必須項目です。</p>
							<table class="mt20">
								<tbody>
									<tr>
										<th>※お名前</th>
										<td>
											<input type="text" name="name" value="<?php echo $form->h($form->get_value('name')); ?>" placeholder="例）山田太郎" style="width:50%;" />
											<?php $form->e('name'); ?>
										</td>
									</tr>
									<tr>
										<th>※フリガナ</th>
										<td>
											<input type="text" name="furi" value="<?php echo $form->h($form->get_value('furi')); ?>" placeholder="例）ヤマダタロウ" style="width:50%;" />
											<?php $form->e('furi'); ?>
										</td>
									</tr>
									<tr>
										<th>※電話番号</th>
										<td>
											<input type="text" name="tel" value="<?php echo $form->h($form->get_value('tel')); ?>" placeholder="例）123-4567-8910" style="width:50%;" />
											<?php $form->e('tel'); ?>
										</td>
									</tr>
									<tr>
										<th>ご連絡希望時間</th>
										<td>
											<label><?php $form->html_options('tel_time', array('指定なし','10：00～12：00','12：00～14：00','14：00～16：00','16：00～18：00')); ?></label>
										</td>
									</tr>
									<tr>
										<th>※ご希望家賃</th>
										<td>
											<?php $form->html_checks('rent', array('〜7万', '〜10万', '〜13万', '〜15万', '〜20万', '25万以上'), 'radio', ' style="margin-right:8px;"'); ?>
											<?php $form->e('rent'); ?>
										</td>
									</tr>
									<tr>
										<th>メールアドレス</th>
										<td>
											<input type="text" name="mail" value="<?php echo $form->h($form->get_value('mail')); ?>" placeholder="例）info@example.com" />
											<?php $form->e('mail'); ?>
										</td>
									</tr>
									<tr>
										<th>現在お住まいのご住所</th>
										<td>
											<span class="p-country-name" style="display:none;">Japan</span>
											<span class="dib" style="line-height: 30px;">郵便番号</span>：<input type="text" name="zip" value="<?php echo $form->h($form->get_value('zip')); ?>" placeholder="例）460-0002" class="p-postal-code" style="width:100px;" /><br />
											<?php $form->e('zip'); ?>
											<input type="text" name="address" value="<?php echo $form->h($form->get_value('address')); ?>" placeholder="例）愛知県名古屋市中区丸の内0-00-00　Rマンション201号室" class="mt5 p-region p-locality p-street-address p-extended-address" />
											<?php $form->e('address'); ?>
										</td>
									</tr>
									<tr>
										<th>職種</th>
										<td>
											<label><?php $form->html_options('gyoshu', array('会社員','医療関係','製造業','飲食業','サービス業','IT関係','水商売','学生','その他'), '----'); ?></label>
										</td>
									</tr>
									<tr>
										<th>間取り（複数可）</th>
										<td>
											<?php $form->html_checks('madori', array('1R・1K', '1DK・1LDK', '2LDK', '3LDK以上'), 'checkbox', ' style="margin-right:8px;"'); ?>
											<?php $form->e('madori'); ?>
										</td>
									</tr>
									<tr>
										<th>お探しのエリア（複数可）</th>
										<td>
											<?php $form->html_checks('area', array('名古屋駅前', '大須', '栄', '金山・鶴舞', '高岳・車道', '大曽根', '千種', '覚王山', 'その他'), 'checkbox', 'class="dib" style="margin-right:8px;"'); ?>
											<?php $form->e('area'); ?>
											<p>その他をお選びの場合以下の欄にご希望のエリアを入力ください。</p>
											<input type="text" name="area_othre" value="<?php echo $form->h($form->get_value('area_othre')); ?>" style="width:200px;" />
										</td>
									</tr>
									<tr>
										<th>ご案内希望日時</th>
										<td>
											<?php
											$g = array('10:00','11:00','12:00','13:00','14:00','15:00','16:00','17:00','18:00');
											?>
											<div>
												第1希望：
												<label><?php $form->html_options('date_m', range(1, 12), '----'); ?> 月&nbsp;</label>
												<label><?php $form->html_options('date_d', range(1, 31), '----'); ?> 日&nbsp;</label>
												<label><?php $form->html_options('date_h', $g, '未選択'); ?>&nbsp;〜&nbsp;<?php $form->html_options('date_h_2', $g, '未選択'); ?> 頃&nbsp;</label>
												<?php $form->e('date_m'); ?>
												<?php $form->e('date_d'); ?>
												<?php $form->e('date_h'); ?>
												<?php $form->e('date_h_2'); ?>
											</div>
											<div class="mt5">
												第2希望：
												<label><?php $form->html_options('date_m2', range(1, 12), '----'); ?> 月&nbsp;</label>
												<label><?php $form->html_options('date_d2', range(1, 31), '----'); ?> 日&nbsp;</label>
												<label><?php $form->html_options('date_h2', $g, '未選択'); ?>&nbsp;〜&nbsp;<?php $form->html_options('date_h2_2', $g, '未選択'); ?> 頃&nbsp;</label>
												<?php $form->e('date_m2'); ?>
												<?php $form->e('date_d2'); ?>
												<?php $form->e('date_h2'); ?>
												<?php $form->e('date_h2_2'); ?>
											</div>
										</td>
									</tr>
									<?php /*
									<tr>
										<th>ご相談内容（複数可）</th>
										<td>
											<?php $form->html_checks('soudan', array('デザイナーズ物件', '女性向け物件', 'ペット物件', '新築物件'), 'checkbox', ' style="margin-right:8px;"'); ?>
											<?php $form->e('soudan'); ?>
										</td>
									</tr>
									*/ ?>
									<tr>
										<th>その他条件・ご質問等</th>
										<td>
											<textarea name="other" rows="6"><?php echo $form->h($form->get_value('other')); ?></textarea>
											<?php $form->e('other'); ?>
										</td>
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
							<input type="image" name="<?php echo $form->get_name_for('enter'); ?>" src="src/img/contact/b_01.png" alt="確認する" class="fade_on_hover" />
							<span class="pad">　</span>
							<input type="image" name="<?php echo $form->get_name_for('reset'); ?>" src="src/img/contact/b_02.png" alt="リセット" class="fade_on_hover" />
						</div>
