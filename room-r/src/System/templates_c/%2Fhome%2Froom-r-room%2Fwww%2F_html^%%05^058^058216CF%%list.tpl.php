<?php /* Smarty version 2.6.26, created on 2016-07-25 18:01:49
         compiled from list.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strstr', 'list.tpl', 7, false),array('modifier', 'number_format', 'list.tpl', 28, false),)), $this); ?>

					<ul class="list-bukkens">
<?php $_from = $this->_tpl_vars['bukken']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
						<li>
							<a href="detail.html?b=<?php echo $this->_tpl_vars['v']['building_id_c']; ?>
<?php echo $this->_tpl_vars['ref_param']; ?>
" target="_blank" class="dib fade_on_hover">
								<ul class="labels">
									<?php if (((is_array($_tmp=$this->_tpl_vars['v']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '0') : strstr($_tmp, '0')) !== false): ?>
									<li class="pet">ペット可</li>
									<?php endif; ?>
									<?php if (((is_array($_tmp=$this->_tpl_vars['v']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '2') : strstr($_tmp, '2')) !== false): ?>
									<li class="shinchiku">新築</li>
									<?php endif; ?>
									<?php if (((is_array($_tmp=$this->_tpl_vars['v']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '4') : strstr($_tmp, '4')) !== false): ?>
									<li class="renovation">リノベーション</li>
									<?php endif; ?>
								</ul>
								<div class="image mt5">
									<?php if (empty ( $this->_tpl_vars['v']['b_photo0_c'] )): ?>
									<img src="<?php echo @WEB_ROOT; ?>
/dummy_t.jpg" alt="" />
									<?php else: ?>
									<img src="<?php echo @WEB_ROOT; ?>
/uploads/<?php echo $this->_tpl_vars['v']['b_photo0_c']; ?>
" alt="" />
									<?php endif; ?>
								</div>
								<div class="fz14 fwb mt5 mb5"><?php echo $this->_tpl_vars['v']['building_name_c']; ?>
</div>
								<?php if (! empty ( $this->_tpl_vars['v']['catch_c'] )): ?><p class="copy"><?php echo $this->_tpl_vars['v']['catch_c']; ?>
</p><?php endif; ?>
								<ul class="data fz12 mt5">
									<li>金額：
										<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['price_min_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円〜
										<?php if ($this->_tpl_vars['v']['price_min_c'] < $this->_tpl_vars['v']['price_max_c']): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['v']['price_max_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円<?php endif; ?>
									</li>
									<li>間取り：<?php echo $this->_tpl_vars['v']['layout_disp']; ?>
</li>
									<li>
										<?php if ($this->_tpl_vars['v']['transport1_c'] != '0'): ?>
											<?php echo $this->_tpl_vars['cnf']['transport'][$this->_tpl_vars['v']['transport1_c']]; ?>
「<?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['v']['station1_c']]; ?>
駅」徒歩<?php echo $this->_tpl_vars['v']['distance1_c']; ?>
分
										<?php endif; ?>
										<?php if (! empty ( $this->_tpl_vars['v']['transport3_c'] )): ?>
											<?php echo $this->_tpl_vars['v']['transport3_c']; ?>

										<?php endif; ?>
										<?php if (! empty ( $this->_tpl_vars['v']['station3_c'] )): ?>
											「<?php echo $this->_tpl_vars['v']['station3_c']; ?>
駅」
										<?php endif; ?>
										<?php if (! empty ( $this->_tpl_vars['v']['distance3_c'] )): ?>
										徒歩<?php echo $this->_tpl_vars['v']['distance3_c']; ?>
分
										<?php endif; ?>
									</li>
								</ul>
							</a>
						</li>
<?php endforeach; endif; unset($_from); ?>
					</ul>