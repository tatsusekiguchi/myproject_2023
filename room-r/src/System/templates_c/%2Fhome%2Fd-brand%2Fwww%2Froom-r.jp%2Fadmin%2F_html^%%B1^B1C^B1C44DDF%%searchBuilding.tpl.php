<?php /* Smarty version 2.6.26, created on 2018-02-08 14:49:11
         compiled from searchBuilding.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'searchBuilding.tpl', 18, false),)), $this); ?>
<div id="area_search">
	<form action="<?php echo $this->_tpl_vars['srch_form_target']; ?>
" method="post">
		<div class="h">
			<div><img src="img/building_list/h_01.png" alt="物件検索" /></div>
			<div class="btn"><span id="btn_toggle_srch_area" class="clickable have_effect"><img src="img/btn_03.png" alt="" /></span></div>
			<script type="text/javascript">
			$(function(){
				$("#btn_toggle_srch_area").on("click", function(){
					$(this).parents('.h').next('.area').stop(true, false).slideToggle(480);
				});
			});
			</script>
		</div>
		<div class="area">
			<table class="style_s">
				<tr>
					<th>物件番号</th>
					<td><input type="text" name="no_bukken" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['formData']['no_bukken'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:406px;" /></td>
				</tr>
				<tr>
					<th>物件名</th>
					<td><input type="text" name="BUKKENMEI" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['formData']['BUKKENMEI'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" id="idBUKKENMEI" style="width:406px;" /></td>
				</tr>
				<tr>
					<th>所在地</th>
					<td>
						<span>愛知県</span>
						<select name="searchKuNagoya">
							<option value=""></option>
						<?php $_from = $this->_tpl_vars['ku_nagoya']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
							<option value="<?php echo $this->_tpl_vars['k']; ?>
"<?php if (isset ( $this->_tpl_vars['formData']['searchKuNagoya'] ) && $this->_tpl_vars['formData']['searchKuNagoya'] !== "" && $this->_tpl_vars['formData']['searchKuNagoya'] == $this->_tpl_vars['k']): ?> selected="selected"<?php endif; ?>>名古屋市<?php echo $this->_tpl_vars['v']; ?>
</option>
						<?php endforeach; endif; unset($_from); ?>
						</select>
						<input type="text" name="searchAddress" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['formData']['searchAddress'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="width:250px;" />
					</td>
				</tr>
				<tr>
					<th>沿線</th>
					<td>
						<div style="position: relative">
							<div id="ensenBox">
								<?php if (isset ( $this->_tpl_vars['ensen'][0]['ensen'] ) && $this->_tpl_vars['ensen'][0]['ensen'] != '0'): ?>
								<?php $_from = $this->_tpl_vars['ensen']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
								<div>
									<select name="searchEnsen[<?php echo $this->_tpl_vars['key']; ?>
]" title="<?php echo $this->_tpl_vars['key']; ?>
" class="searchEnsen">
										<?php $_from = $this->_tpl_vars['transport']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['val2']):
?>
										<option value="<?php echo $this->_tpl_vars['key2']; ?>
"<?php if ($this->_tpl_vars['key2'] == $this->_tpl_vars['val']['ensen']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['val2']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
									</select>&nbsp;<select name="searchStation[<?php echo $this->_tpl_vars['key']; ?>
]">
										<?php $_from = $this->_tpl_vars['transport_station'][$this->_tpl_vars['val']['ensen']]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['val2']):
?>
											<option value="<?php echo $this->_tpl_vars['val2']; ?>
"<?php if ($this->_tpl_vars['val2'] == $this->_tpl_vars['val']['station']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['station'][$this->_tpl_vars['val2']]; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
									</select>
								</div>
								<?php endforeach; endif; unset($_from); ?>
								<?php else: ?>
								<div>
									<select name="searchEnsen[0]" title="0" class="searchEnsen">
										<?php $_from = $this->_tpl_vars['transport']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key2'] => $this->_tpl_vars['val2']):
?>
										<option value="<?php echo $this->_tpl_vars['key2']; ?>
"><?php echo $this->_tpl_vars['val2']; ?>
</option>
										<?php endforeach; endif; unset($_from); ?>
									</select>
									<select name="searchStation[0]">
										<option value=""></option>
									</select>
								</div>
								<?php endif; ?>
							</div>
							<div><span class="clickable have_effect"><img src="img/btn_04.png" id="ensenAddBtn" alt="沿線を増やす" style="position:absolute;top:0px;right:0;" /></span></div>
						</div>
					</td>
				</tr>
				<tr>
					<th>駅からの距離</th>
					<td>
						<div>徒歩
							<select name="searchDistance" id="searchDistance">
								<option value="">指定なし</option>
								<option value="1">1分以内</option>
								<option value="3">3分以内</option>
								<option value="5">5分以内</option>
								<option value="10">10分以内</option>
								<option value="15">15分以内</option>
								<option value="20">20分以内</option>
							</select>
							<script type="text/javascript">
							$(function(){
								$("#searchDistance").val("<?php echo ((is_array($_tmp=$this->_tpl_vars['formData']['searchDistance'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
");
							});
							</script>
						</div>
					</td>
				</tr>
				<tr>
					<th>築年月(西暦)</th>
					<td>
						<label><input type="text" name="searchCompletionYear" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['formData']['searchCompletionYear'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" maxlength="4" size="8" /> 年</label>
						<select name="searchCompletionMonth">
							<option value="">月</option>
						<?php $this->assign('array_for_searchCompletionMonth', range(1, 12)); ?>
						<?php $_from = $this->_tpl_vars['array_for_searchCompletionMonth']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
							<option value="<?php echo $this->_tpl_vars['v']; ?>
"<?php if (isset ( $this->_tpl_vars['formData']['searchCompletionMonth'] ) && $this->_tpl_vars['formData']['searchCompletionMonth'] == $this->_tpl_vars['v']): ?> selected="selected"<?php endif; ?>><?php echo $this->_tpl_vars['v']; ?>
月</option>
						<?php endforeach; endif; unset($_from); ?>
						</select>
						<span>〜</span>
					</td>
				</tr>
				<tr>
					<th>フラグ</th>
					<td>
					<?php $_from = $this->_tpl_vars['flg']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
						<?php if (isset ( $this->_tpl_vars['formData']['searchFlg'][$this->_tpl_vars['key']] )): ?>
						<label class="item_a"><input type="checkbox" name="searchFlg[<?php echo $this->_tpl_vars['key']; ?>
]" value="1" checked="checked" />&nbsp;<?php echo $this->_tpl_vars['val']; ?>
&nbsp;</label>
						<?php else: ?>
						<label class="item_a"><input type="checkbox" name="searchFlg[<?php echo $this->_tpl_vars['key']; ?>
]" value="1" />&nbsp;<?php echo $this->_tpl_vars['val']; ?>
&nbsp;</label>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					</td>
				</tr>
				<tr>
					<th>特集フラグ</th>
					<td>
					<?php $_from = $this->_tpl_vars['feature']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['key'] => $this->_tpl_vars['val']):
?>
						<?php if (isset ( $this->_tpl_vars['formData']['searchFeatureFlg'][$this->_tpl_vars['key']] )): ?>
						<label class="item_a"><input type="checkbox" name="searchFeatureFlg[<?php echo $this->_tpl_vars['key']; ?>
]" value="<?php echo $this->_tpl_vars['key']; ?>
" checked="checked" />&nbsp;<?php echo $this->_tpl_vars['val']; ?>
&nbsp;</label>
						<?php else: ?>
						<label class="item_a"><input type="checkbox" name="searchFeatureFlg[<?php echo $this->_tpl_vars['key']; ?>
]" value="<?php echo $this->_tpl_vars['key']; ?>
" />&nbsp;<?php echo $this->_tpl_vars['val']; ?>
&nbsp;</label>
						<?php endif; ?>
					<?php endforeach; endif; unset($_from); ?>
					</td>
				</tr>
				<tr>
					<th>公開状況</th>
					<td>
						<label style="margin-right:16px;"><input type="radio" value="default" name="dispFlg" <?php if ($this->_tpl_vars['formData']['dispFlg'] == 'default' || ! isset ( $this->_tpl_vars['formData']['dispFlg'] )): ?>checked="checked"<?php endif; ?>/> 全て</label>
						<label style="margin-right:16px;"><input type="radio" value="empty" name="dispFlg" <?php if ($this->_tpl_vars['formData']['dispFlg'] == 'empty'): ?>checked="checked"<?php endif; ?>/> 空き有り</label>
						<label style="margin-right:16px;"><input type="radio" value="full" name="dispFlg" <?php if ($this->_tpl_vars['formData']['dispFlg'] == 'full'): ?>checked="checked"<?php endif; ?>/> 空きなし</label>
						<label style="margin-right:16px;"><input type="radio" value="checking" name="dispFlg" <?php if ($this->_tpl_vars['formData']['dispFlg'] == 'checking'): ?>checked="checked"<?php endif; ?>/> 確認中</label>
					</td>
				</tr>
			</table>
			<div class="center"><input type="image" src="img/building_list/btn_search.png" alt="物件を検索" class="have_effect" /></div>
		</div>
	</form>
</div><!-- #area_search -->



















