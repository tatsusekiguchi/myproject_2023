<?php /* Smarty version 2.6.26, created on 2018-02-08 18:14:38
         compiled from print.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'print.tpl', 18, false),array('modifier', 'number_format', 'print.tpl', 20, false),array('modifier', 'strstr', 'print.tpl', 41, false),)), $this); ?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="robots" content="noindex,nofollow">
<title><?php echo $this->_tpl_vars['pagetitle']; ?>
</title>
<link rel="stylesheet" href="<?php echo @WEB_ROOT; ?>
/src/css/init.css" />
<link rel="stylesheet" href="<?php echo @WEB_ROOT; ?>
/src/css/basic.css" />
<link rel="stylesheet" href="<?php echo @WEB_ROOT; ?>
/src/css/print.css" />
<script>
</script>
</head>
<body onLoad="window.print();">
	<div id="wrapper">
		<div id="box01" class="ovh">
			<div id="logo" class="fll"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header/logo.png" height="75" alt=""></div>
			<div id="name_area" class="ovh">
				<h1><?php echo ((is_array($_tmp=$this->_tpl_vars['bukken']['building_name_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
<span><?php echo ((is_array($_tmp=$this->_tpl_vars['bukken']['catch_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</span></h1>
				<p class="fz15 mt5">
					賃料：<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['rental_price_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円〜／
					
					<?php echo $this->_tpl_vars['house']['house_no_c']; ?>
タイプ／
					
					<?php echo $this->_tpl_vars['cnf']['layout_regist'][$this->_tpl_vars['house']['layout_c']]; ?>
（<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['space_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
m&sup2;）／
					
					<?php if ($this->_tpl_vars['house']['divide_money_02_c'] == 0): ?>敷金<?php else: ?>保証金<?php endif; ?>：
					<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['money_02_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

					<?php if ($this->_tpl_vars['house']['money_02_type_c'] == 0): ?>ヶ月<?php endif; ?>
					<?php if ($this->_tpl_vars['house']['money_02_type_c'] == 1): ?>%<?php endif; ?>
					<?php if ($this->_tpl_vars['house']['money_02_type_c'] == 2): ?>円<?php endif; ?>／
				
					<?php if ($this->_tpl_vars['house']['divide_money_04_c'] == 0): ?>礼金<?php else: ?>権利金<?php endif; ?>：
					<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['money_04_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

					<?php if ($this->_tpl_vars['house']['money_04_type_c'] == 0): ?>ヶ月<?php endif; ?>
					<?php if ($this->_tpl_vars['house']['money_04_type_c'] == 1): ?>%<?php endif; ?>
					<?php if ($this->_tpl_vars['house']['money_04_type_c'] == 2): ?>円<?php endif; ?>／

					共益費：<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['money_01_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円


					<?php if (((is_array($_tmp=$this->_tpl_vars['bukken']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '0') : strstr($_tmp, '0')) || $this->_tpl_vars['bukken']['feature_c'] == 0): ?>
					<!-- ペット -->
					／ペット
					<?php endif; ?>
					<?php if (((is_array($_tmp=$this->_tpl_vars['bukken']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '2') : strstr($_tmp, '2'))): ?>
					<!-- 新築 -->
					／新築
					<?php endif; ?>
					<?php if (((is_array($_tmp=$this->_tpl_vars['bukken']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '4') : strstr($_tmp, '4'))): ?>
					<!-- リノベーション -->
					／リノベーション
					<?php endif; ?>
				</p>
			</div>
		</div><!-- #box01 -->
		<div id="box02">
			<div class="inner ovh">
				<div class="fll">
					<dl class="address ovh">
						<dt>●所在地：</dt>
						<dd class="fz20 fwb"><?php echo $this->_tpl_vars['bukken']['pref_c']; ?>
名古屋市<?php echo $this->_tpl_vars['cnf']['ku_nagoya'][$this->_tpl_vars['bukken']['ku_c']]; ?>
<?php echo $this->_tpl_vars['bukken']['address_c']; ?>
</dd>
						<dt>●最寄駅：</dt>
						<dd class="fz14 ovh" style="height: 50px;">
							
								<?php if ($this->_tpl_vars['bukken']['transport1_c'] != '0'): ?>
									<?php echo $this->_tpl_vars['cnf']['transport'][$this->_tpl_vars['bukken']['transport1_c']]; ?>

									<?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['bukken']['station1_c']]; ?>
駅&nbsp;徒歩
									<?php echo $this->_tpl_vars['bukken']['distance1_c']; ?>
分
								<?php endif; ?>
								<?php if (! empty ( $this->_tpl_vars['bukken']['transport3_c'] )): ?>
									／<?php echo $this->_tpl_vars['bukken']['transport3_c']; ?>

									<?php $this->assign('o_flg', '1'); ?>
								<?php endif; ?>
								<?php if (! empty ( $this->_tpl_vars['bukken']['station3_c'] )): ?>
									<?php echo $this->_tpl_vars['bukken']['station3_c']; ?>
駅
									<?php $this->assign('o_flg', '1'); ?>
								<?php endif; ?>
								<?php if (! empty ( $this->_tpl_vars['bukken']['distance3_c'] )): ?>
								徒歩<?php echo $this->_tpl_vars['bukken']['distance3_c']; ?>
分
									<?php $this->assign('o_flg', '1'); ?>
								<?php endif; ?>
								<?php if ($this->_tpl_vars['o_flg'] == '1'): ?>
									<br />
								<?php endif; ?>
								<?php if ($this->_tpl_vars['bukken']['transport2_c'] != ""): ?>
									<?php echo $this->_tpl_vars['cnf']['transport'][$this->_tpl_vars['bukken']['transport2_c']]; ?>

									<?php if ($this->_tpl_vars['bukken']['station2_c'] != ""): ?>
										<?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['bukken']['station2_c']]; ?>
駅
									<?php endif; ?>
									<?php if ($this->_tpl_vars['bukken']['distance2_c'] != ""): ?>
										徒歩<?php echo $this->_tpl_vars['bukken']['distance2_c']; ?>
分
									<?php endif; ?>
								<?php endif; ?>
						</dd>
					</dl>
					<div class="detail ovh">
						<table class="fll">
							<tr>
								<th>
									<?php if ($this->_tpl_vars['house']['divide_money_03_c'] == 0): ?>償却<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['divide_money_03_c'] == 1): ?>敷引<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['divide_money_03_c'] == 2): ?>解約金<?php endif; ?>
								</th>
								<td>
									<?php if (! empty ( $this->_tpl_vars['house']['money_03_c'] )): ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['money_03_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

									<?php if ($this->_tpl_vars['house']['money_03_type_c'] == 0): ?>ヶ月<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['money_03_type_c'] == 1): ?>%<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['money_03_type_c'] == 2): ?>円<?php endif; ?>
									<?php else: ?>
									-
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<th>駐車場</th>
								<td>
									<?php if ($this->_tpl_vars['bukken']['parking_c']): ?>
									<?php $_from = $this->_tpl_vars['bukken']['parking_txt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
									<?php echo $this->_tpl_vars['v']; ?>
&nbsp;
									<?php endforeach; endif; unset($_from); ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['bukken']['parking_charge_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円
									<?php if ($this->_tpl_vars['bukken']['parking_tax_c'] == 0): ?>（税別）<?php endif; ?>
									<?php if ($this->_tpl_vars['bukken']['parking_tax_c'] == 1): ?>（税込み）<?php endif; ?>
									<?php else: ?>
									-
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<th>構造</th>
								<td><?php echo $this->_tpl_vars['cnf']['structure'][$this->_tpl_vars['bukken']['structure_c']]; ?>
</td>
							</tr>
							<tr>
								<th>築年月</th>
								<td>
									<?php echo $this->_tpl_vars['bukken']['completion_year_c']; ?>
年<?php echo $this->_tpl_vars['bukken']['completion_month_c']; ?>
月
								</td>
							</tr>
							<tr>
								<th>階数/総戸数</th>
								<td><?php if (! empty ( $this->_tpl_vars['bukken']['floor_c'] )): ?><?php echo $this->_tpl_vars['bukken']['floor_c']; ?>
階<?php else: ?>-<?php endif; ?>/<?php if (! empty ( $this->_tpl_vars['bukken']['house_c'] )): ?><?php echo $this->_tpl_vars['bukken']['house_c']; ?>
戸<?php else: ?>-<?php endif; ?></td>
							</tr>
							<tr>
								<th>部屋向き</th>
								<td>
									<?php if (! empty ( $this->_tpl_vars['house']['direction_c'] )): ?>
									<?php echo $this->_tpl_vars['cnf']['direction'][$this->_tpl_vars['house']['direction_c']]; ?>

									<?php else: ?>
									-
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<th>ペット</th>
								<td>
									<?php if ($this->_tpl_vars['bukken']['pet_c'] != 0): ?>
									<?php echo $this->_tpl_vars['cnf']['pet'][$this->_tpl_vars['bukken']['pet_c']]; ?>
 <?php echo $this->_tpl_vars['bukken']['petfree_c']; ?>

									<?php else: ?>
									-
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<th>火災保険</th>
								<td>
									<?php if ($this->_tpl_vars['bukken']['fire_flg_c'] == 1): ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['bukken']['fire_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円
									<?php if ($this->_tpl_vars['bukken']['fire_tax_c'] == 0): ?>（税別）<?php endif; ?>
									<?php if ($this->_tpl_vars['bukken']['fire_tax_c'] == 1): ?>（税込み）<?php endif; ?>
									<?php elseif ($this->_tpl_vars['bukken']['fire_flg_c'] == 0): ?>
									無し
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<th>更新料</th>
								<td>
									<?php if (! empty ( $this->_tpl_vars['house']['money_05_c'] )): ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['money_05_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円&nbsp;
									<?php if (! empty ( $this->_tpl_vars['house']['money_05_zimu_c'] )): ?>
									更新事務手数料<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['money_05_zimu_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円&nbsp;
									<?php endif; ?>
									<?php else: ?>
									-
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<th>保証会社</th>
								<td>
									<?php if ($this->_tpl_vars['bukken']['hoshou_availability_c'] == 0): ?>
									利用可
									<?php elseif ($this->_tpl_vars['bukken']['hoshou_availability_c'] == 1): ?>
									必須
									<?php elseif ($this->_tpl_vars['bukken']['hoshou_availability_c'] == 2): ?>
									なし
									<?php else: ?>
									-
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<th>初期費用</th>
								<td>
									<?php 
										$house_zappi = $this->get_template_vars('house_zappi');
										foreach($house_zappi as $z){
											if($z['type_c'] == 0 && !empty($z['amount_c'])){
												
												$out = "{$z['name_c']}: ";
												$out .= number_format($z['amount_c']);
												$out .= "円";
												if($z['amount_taxin_c'] == 1) $out .= "（税込み）";
												if($z['amount_taxin_c'] == 0) $out .= "（税別）";
												if( !empty($z['required_c']) ) $out .= " [必須]";
												echo "{$out}<br />";
											}
										}
									 ?>
								</td>
							</tr>
							<tr>
								<th>月額費用</th>
								<td>
									<?php 
										$house_zappi = $this->get_template_vars('house_zappi');
										foreach($house_zappi as $z){
											if($z['type_c'] == 1 && !empty($z['amount_c'])){
												
												$out = "{$z['name_c']}: ";
												$out .= number_format($z['amount_c']);
												$out .= "円";
												if($z['amount_taxin_c'] == 1) $out .= "（税込み）";
												if($z['amount_taxin_c'] == 0) $out .= "（税別）";
												if( !empty($z['required_c']) ) $out .= " [必須]";
												echo "{$out}<br />";
											}
										}
									 ?>
								</td>
							</tr>
							<tr>
								<th>町費用</th>
								<td>
									<?php if (! empty ( $this->_tpl_vars['house']['chouhi_c'] )): ?>
									<?php if ($this->_tpl_vars['house']['chouhi_type_c'] == 0): ?>初期費用：<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['chouhi_type_c'] == 1): ?>月額費用：<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['chouhi_type_c'] == 2): ?>年額費用：<?php endif; ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['chouhi_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円
									<?php if ($this->_tpl_vars['house']['tax_chouhi_c'] == 0): ?>（税別）<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['tax_chouhi_c'] == 1): ?>（税込み）<?php endif; ?>
									<?php else: ?>
									-
									<?php endif; ?>
								</td>
							</tr>
							<tr>
								<th>備考</th>
								<td>
									<?php echo $this->_tpl_vars['house']['other_c']; ?>

								</td>
							</tr>
						</table>
						<ul class="flg">
							<li><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/icon/ico_shinchiku<?php if (((is_array($_tmp=$this->_tpl_vars['bukken']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '2') : strstr($_tmp, '2'))): ?>_on<?php endif; ?>.png" alt=""></li>
							<?php $_from = $this->_tpl_vars['house']['flg_disp']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
							<li><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/icon/ico_<?php echo $this->_tpl_vars['k']; ?>
<?php if ($this->_tpl_vars['v'] == 1): ?>_on<?php endif; ?>.png" alt=""></li>
							<?php endforeach; endif; unset($_from); ?>
						</ul>
					</div><!-- .detail -->
				</div><!-- .fll -->
				<div class="flr">
					<div class="madori">
						<?php if (empty ( $this->_tpl_vars['house']['r_photo0_c'] )): ?>
						<img src="<?php echo @WEB_ROOT; ?>
/dummy_m.jpg" alt="" />
						<?php else: ?>
						<img src="<?php echo @WEB_ROOT; ?>
/uploads/<?php echo $this->_tpl_vars['house']['r_photo0_c']; ?>
" alt="" />
						<?php endif; ?>
					</div>
				</div>
			</div><!-- .inner -->
		</div><!-- #box02 -->
		<div id="box03">
			<ul class="bukken">
				<?php $this->assign('count', '0'); ?>
				<?php unset($this->_sections['hoge']);
$this->_sections['hoge']['name'] = 'hoge';
$this->_sections['hoge']['loop'] = is_array($_loop=5) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hoge']['start'] = (int)1;
$this->_sections['hoge']['show'] = true;
$this->_sections['hoge']['max'] = $this->_sections['hoge']['loop'];
$this->_sections['hoge']['step'] = 1;
if ($this->_sections['hoge']['start'] < 0)
    $this->_sections['hoge']['start'] = max($this->_sections['hoge']['step'] > 0 ? 0 : -1, $this->_sections['hoge']['loop'] + $this->_sections['hoge']['start']);
else
    $this->_sections['hoge']['start'] = min($this->_sections['hoge']['start'], $this->_sections['hoge']['step'] > 0 ? $this->_sections['hoge']['loop'] : $this->_sections['hoge']['loop']-1);
if ($this->_sections['hoge']['show']) {
    $this->_sections['hoge']['total'] = min(ceil(($this->_sections['hoge']['step'] > 0 ? $this->_sections['hoge']['loop'] - $this->_sections['hoge']['start'] : $this->_sections['hoge']['start']+1)/abs($this->_sections['hoge']['step'])), $this->_sections['hoge']['max']);
    if ($this->_sections['hoge']['total'] == 0)
        $this->_sections['hoge']['show'] = false;
} else
    $this->_sections['hoge']['total'] = 0;
if ($this->_sections['hoge']['show']):

            for ($this->_sections['hoge']['index'] = $this->_sections['hoge']['start'], $this->_sections['hoge']['iteration'] = 1;
                 $this->_sections['hoge']['iteration'] <= $this->_sections['hoge']['total'];
                 $this->_sections['hoge']['index'] += $this->_sections['hoge']['step'], $this->_sections['hoge']['iteration']++):
$this->_sections['hoge']['rownum'] = $this->_sections['hoge']['iteration'];
$this->_sections['hoge']['index_prev'] = $this->_sections['hoge']['index'] - $this->_sections['hoge']['step'];
$this->_sections['hoge']['index_next'] = $this->_sections['hoge']['index'] + $this->_sections['hoge']['step'];
$this->_sections['hoge']['first']      = ($this->_sections['hoge']['iteration'] == 1);
$this->_sections['hoge']['last']       = ($this->_sections['hoge']['iteration'] == $this->_sections['hoge']['total']);
?>
				<?php $this->assign('s', ($this->_sections['hoge']['index']+10)); ?>
				<?php $this->assign('colname', "b_photo".($this->_sections['hoge']['index'])."_c"); ?>
				<?php $this->assign('s_colname', "b_photo".($this->_tpl_vars['s'])."_c"); ?>
				<?php if ($this->_tpl_vars['bukken'][$this->_tpl_vars['s_colname']] != ""): ?>
				<?php $this->assign('count', $this->_tpl_vars['count']+1); ?>
				<li class="item<?php if ($this->_tpl_vars['count'] == 3 || $this->_tpl_vars['count'] == 4): ?> small<?php endif; ?>"><img src="<?php echo @WEB_ROOT; ?>
/uploads/<?php echo $this->_tpl_vars['bukken'][$this->_tpl_vars['colname']]; ?>
" /></li>
				<?php endif; ?>
				<?php endfor; endif; ?>
			</ul>
			<ul class="house">
				<?php unset($this->_sections['hoge']);
$this->_sections['hoge']['name'] = 'hoge';
$this->_sections['hoge']['loop'] = is_array($_loop=7) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hoge']['start'] = (int)1;
$this->_sections['hoge']['show'] = true;
$this->_sections['hoge']['max'] = $this->_sections['hoge']['loop'];
$this->_sections['hoge']['step'] = 1;
if ($this->_sections['hoge']['start'] < 0)
    $this->_sections['hoge']['start'] = max($this->_sections['hoge']['step'] > 0 ? 0 : -1, $this->_sections['hoge']['loop'] + $this->_sections['hoge']['start']);
else
    $this->_sections['hoge']['start'] = min($this->_sections['hoge']['start'], $this->_sections['hoge']['step'] > 0 ? $this->_sections['hoge']['loop'] : $this->_sections['hoge']['loop']-1);
if ($this->_sections['hoge']['show']) {
    $this->_sections['hoge']['total'] = min(ceil(($this->_sections['hoge']['step'] > 0 ? $this->_sections['hoge']['loop'] - $this->_sections['hoge']['start'] : $this->_sections['hoge']['start']+1)/abs($this->_sections['hoge']['step'])), $this->_sections['hoge']['max']);
    if ($this->_sections['hoge']['total'] == 0)
        $this->_sections['hoge']['show'] = false;
} else
    $this->_sections['hoge']['total'] = 0;
if ($this->_sections['hoge']['show']):

            for ($this->_sections['hoge']['index'] = $this->_sections['hoge']['start'], $this->_sections['hoge']['iteration'] = 1;
                 $this->_sections['hoge']['iteration'] <= $this->_sections['hoge']['total'];
                 $this->_sections['hoge']['index'] += $this->_sections['hoge']['step'], $this->_sections['hoge']['iteration']++):
$this->_sections['hoge']['rownum'] = $this->_sections['hoge']['iteration'];
$this->_sections['hoge']['index_prev'] = $this->_sections['hoge']['index'] - $this->_sections['hoge']['step'];
$this->_sections['hoge']['index_next'] = $this->_sections['hoge']['index'] + $this->_sections['hoge']['step'];
$this->_sections['hoge']['first']      = ($this->_sections['hoge']['iteration'] == 1);
$this->_sections['hoge']['last']       = ($this->_sections['hoge']['iteration'] == $this->_sections['hoge']['total']);
?>
				<?php $this->assign('s', ($this->_sections['hoge']['index']+20)); ?>
				<?php $this->assign('colname', "r_photo".($this->_sections['hoge']['index'])."_c"); ?>
				<?php $this->assign('s_colname', "r_photo".($this->_tpl_vars['s'])."_c"); ?>
				<?php if ($this->_tpl_vars['house'][$this->_tpl_vars['s_colname']] != ""): ?>
				<li class="item"><img src="<?php echo @WEB_ROOT; ?>
/uploads/<?php echo $this->_tpl_vars['house'][$this->_tpl_vars['colname']]; ?>
" /></li>
				<?php endif; ?>
				<?php endfor; endif; ?>
			</ul>
		</div>
		<div id="print_footer">
			<div class="fll"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header/logo.png" height="75" alt=""></div>
			<p class="fll">〒460-0002　名古屋市中区丸の内3-10-29 LINC MARUNOUCHI 3F<br />TEL：0120-99-7376／FAX：052-959-5838（10：00〜19：00　定休日：年末年始 夏季休暇）</p>
		</div>
	</div><!-- #wrapper -->
</body>
</html>