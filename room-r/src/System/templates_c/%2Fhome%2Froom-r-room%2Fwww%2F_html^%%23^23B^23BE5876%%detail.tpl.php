<?php /* Smarty version 2.6.26, created on 2016-07-29 14:16:33
         compiled from detail.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'strstr', 'detail.tpl', 70, false),array('modifier', 'escape', 'detail.tpl', 84, false),array('modifier', 'number_format', 'detail.tpl', 158, false),array('modifier', 'explode', 'detail.tpl', 329, false),array('modifier', 'nl2br', 'detail.tpl', 480, false),)), $this); ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header_subpage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	
function initialize(){
	// 所在地
	var mapOptions = {
		center: new google.maps.LatLng(<?php echo $this->_tpl_vars['bukken']['latitude_c']; ?>
, <?php echo $this->_tpl_vars['bukken']['longitude_c']; ?>
),
		zoom: 17,
		//styles: styles,
		scaleControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	mapObj = new google.maps.Map(document.getElementById("map"), mapOptions);
	marker_l = new google.maps.Marker({
		position: new google.maps.LatLng(<?php echo $this->_tpl_vars['bukken']['latitude_c']; ?>
, <?php echo $this->_tpl_vars['bukken']['longitude_c']; ?>
),
		map: mapObj
	});
}
$(function(){
	initialize();
});
</script>

	<div id="main">
		<div id="box01">
			<div class="box01_01 ovh">
				<div class="icon_station flr">
					<dl class="station ovh flr">
						<dt>●最寄駅：</dt>
						<dd>
						<?php if ($this->_tpl_vars['bukken']['transport1_c'] != '0'): ?>
							<?php echo $this->_tpl_vars['cnf']['transport'][$this->_tpl_vars['bukken']['transport1_c']]; ?>

							<?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['bukken']['station1_c']]; ?>
駅&nbsp;徒歩
							<?php echo $this->_tpl_vars['bukken']['distance1_c']; ?>
分
							<br />
						<?php endif; ?>
						<?php if (! empty ( $this->_tpl_vars['bukken']['transport3_c'] )): ?>
							<?php echo $this->_tpl_vars['bukken']['transport3_c']; ?>

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
						<?php if ($this->_tpl_vars['bukken']['transport2_c'] != '0'): ?>
							<?php echo $this->_tpl_vars['cnf']['transport'][$this->_tpl_vars['bukken']['transport2_c']]; ?>

							<?php if ($this->_tpl_vars['bukken']['station2_c'] != ""): ?>
								<?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['bukken']['station2_c']]; ?>
駅
							<?php endif; ?>
							<?php if ($this->_tpl_vars['bukken']['distance2_c'] != ""): ?>
								徒歩<?php echo $this->_tpl_vars['bukken']['distance2_c']; ?>
分
							<?php endif; ?>
						<?php endif; ?></dd>
						<dt>●エリア：</dt>
						<dd>
							<ul>
							<?php $_from = $this->_tpl_vars['bukken']['area_txt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?><li class="dib"><?php echo $this->_tpl_vars['v']; ?>
&nbsp;</li><?php endforeach; endif; unset($_from); ?>
							</ul>
						</dd>
					</dl>
					<ul class="icon flr ovh">
						<?php if (((is_array($_tmp=$this->_tpl_vars['bukken']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '0') : strstr($_tmp, '0')) !== false): ?>
						<!-- ペット -->
						<li class="flr"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/ico_pet.png" alt=""></li>
						<?php endif; ?>
						<?php if (((is_array($_tmp=$this->_tpl_vars['bukken']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '2') : strstr($_tmp, '2')) !== false): ?>
						<!-- 新築 -->
						<li class="flr"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/ico_shinchiku.png" alt=""></li>
						<?php endif; ?>
						<?php if (((is_array($_tmp=$this->_tpl_vars['bukken']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '4') : strstr($_tmp, '4')) !== false): ?>
						<!-- リノベーション -->
						<li class="flr"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/ico_renovation.png" alt=""></li>
						<?php endif; ?>
					</ul>
				</div><!-- .icon_station -->
				<h2 class="name"><?php echo ((is_array($_tmp=$this->_tpl_vars['bukken']['building_name_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</h2>
				<p class="catch"><?php echo ((is_array($_tmp=$this->_tpl_vars['bukken']['catch_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</p>
			</div><!-- .box01_01 -->
			<div class="box01_02 ovh mt20">
				<div id="bukken_img">
					<div class="display">
						<?php if (empty ( $this->_tpl_vars['bukken']['b_photo1_c'] )): ?>
						<img src="<?php echo @WEB_ROOT; ?>
/dummy_b.jpg" alt="" />
						<?php else: ?>
						<img src="<?php echo @WEB_ROOT; ?>
/uploads/<?php echo $this->_tpl_vars['bukken']['b_photo1_c']; ?>
" alt="" />
						<?php endif; ?>
					</div>
					<div class="navigation tac">
						<div class="prev"><a href="javascript: void(0);" class="disabled"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/btn_prev.png" alt="前へ" class="fade_on_hover"></a></div>
						<div id="bukken_slide" class="slide">
							<?php unset($this->_sections['hoge']);
$this->_sections['hoge']['name'] = 'hoge';
$this->_sections['hoge']['loop'] = is_array($_loop=9) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
							<div class="item"><a href="<?php echo @WEB_ROOT; ?>
/uploads/<?php echo $this->_tpl_vars['bukken'][$this->_tpl_vars['colname']]; ?>
" style="background-image: url(<?php echo @WEB_ROOT; ?>
/uploads/<?php echo $this->_tpl_vars['bukken'][$this->_tpl_vars['s_colname']]; ?>
);" class="fade_on_hover" data-target="#bukken_img .display"><?php echo $this->_tpl_vars['s']-10; ?>
</a></div>
							<?php endif; ?>
							<?php endfor; endif; ?>
						</div>
						<div class="next"><a href="javascript: void(0);" class="disabled"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/btn_next.png" alt="次へ" class="fade_on_hover"></a></div>
					</div>
				</div>

				<div id="house_list_img" class="flr">
					<?php if ($this->_tpl_vars['cnf']['login_flg']): ?>
					<p class="fz10 mb5 tar"><span style="color: #88e;">●</span>・・・空きあり　<span style="color: #888;">●</span>・・・空きなし　<span style="color: #8e8;">●</span>・・・確認中</p>
					<?php endif; ?>
					<ul class="house_list">
						<?php $_from = $this->_tpl_vars['houseList']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
						<li<?php if ($this->_tpl_vars['v']['house_id_c'] == $this->_tpl_vars['house']['house_id_c']): ?> class="on"<?php endif; ?>>
							<a href="detail.html?b=<?php echo $this->_tpl_vars['bukken']['building_id_c']; ?>
&h=<?php echo $this->_tpl_vars['v']['house_id_c']; ?>
<?php echo $this->_tpl_vars['query']; ?>
">
								<div class="type">
									<?php echo ((is_array($_tmp=$this->_tpl_vars['v']['house_no_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

<?php if ($this->_tpl_vars['cnf']['login_flg']): ?>
<?php 
$house = $this->get_template_vars('v');
$date = 0;
$style = '';
switch ($house["status_c"]) {
	case "1":
		$style = ' style="color: #88e;"';
		break;
	case "2":
		$style = ' style="color: #888;"';
		break;
	case "3":
		$style = ' style="color: #8e8;"';
		break;
	default:
		break;
}
echo '<span'.$style.' class="fz10">●</span>';

 ?>
<?php endif; ?>
								</div>
								<div class="room">
									<?php echo $this->_tpl_vars['cnf']['layout_regist'][$this->_tpl_vars['v']['layout_c']]; ?>

								</div>
							</a>
						</li>
						<?php endforeach; endif; unset($_from); ?>
					</ul>
					<div id="price_area">
						<ul class="info">
							<?php if (! is_null ( $this->_tpl_vars['house']['divide_money_02_c'] )): ?>
							<li>
								<strong>●<?php if ($this->_tpl_vars['house']['divide_money_02_c'] == 0): ?>敷　金<?php else: ?>保証金<?php endif; ?>：</strong>
								<?php if (! empty ( $this->_tpl_vars['house']['money_02_c'] )): ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['money_02_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

									<?php if ($this->_tpl_vars['house']['money_02_type_c'] == 0): ?>ヶ月<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['money_02_type_c'] == 1): ?>%<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['money_02_type_c'] == 2): ?>円<?php endif; ?>
								<?php else: ?>
								-
								<?php endif; ?>
							</li>
							<?php endif; ?>
							<?php if (! is_null ( $this->_tpl_vars['house']['divide_money_04_c'] )): ?>
							<li>
								<strong>●<?php if ($this->_tpl_vars['house']['divide_money_04_c'] == 0): ?>礼　金<?php else: ?>権利金<?php endif; ?>：</strong>
								<?php if (! empty ( $this->_tpl_vars['house']['money_04_c'] )): ?>
									<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['money_04_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>

									<?php if ($this->_tpl_vars['house']['money_04_type_c'] == 0): ?>ヶ月<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['money_04_type_c'] == 1): ?>%<?php endif; ?>
									<?php if ($this->_tpl_vars['house']['money_04_type_c'] == 2): ?>円<?php endif; ?>
								<?php else: ?>
								-
								<?php endif; ?>
							</li>
							<?php endif; ?>
							<?php if (! empty ( $this->_tpl_vars['house']['money_01_c'] )): ?>
							<li>
								<strong>●共益費：</strong>
								<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['money_01_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円
							</li>
							<?php endif; ?>
						</ul>
						<dl class="price_room">
							<dt>賃　料</dt>
							<dd><?php echo ((is_array($_tmp=$this->_tpl_vars['house']['rental_price_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円〜</dd>
							<dt>間取り</dt>
							<dd><?php echo $this->_tpl_vars['cnf']['layout_regist'][$this->_tpl_vars['house']['layout_c']]; ?>
<span class="fz14 fwn">（<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['space_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
m&sup2;）</span></dd>
						</dl>
					</div><!-- .price_area -->
					<div id="house_img">
						<div class="display">
						<?php if (empty ( $this->_tpl_vars['house']['r_photo1_c'] )): ?>
							<img src="<?php echo @WEB_ROOT; ?>
/dummy_r.jpg" alt="" />
						<?php else: ?>
							<img src="<?php echo @WEB_ROOT; ?>
/uploads/<?php echo $this->_tpl_vars['house']['r_photo1_c']; ?>
" alt="" />
						<?php endif; ?>
						</div>
						<div class="navigation tac">
							<div class="prev"><a href="javascript: void(0);" class="disabled"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/btn_prev.png" alt="前へ" class="fade_on_hover"></a></div>
							<div id="house_slide" class="slide">
								<?php unset($this->_sections['hoge']);
$this->_sections['hoge']['name'] = 'hoge';
$this->_sections['hoge']['loop'] = is_array($_loop=11) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
								<div class="item"><a href="<?php echo @WEB_ROOT; ?>
/uploads/<?php echo $this->_tpl_vars['house'][$this->_tpl_vars['colname']]; ?>
" style="background-image: url(<?php echo @WEB_ROOT; ?>
/uploads/<?php echo $this->_tpl_vars['house'][$this->_tpl_vars['s_colname']]; ?>
);" class="fade_on_hover" data-target="#house_img .display"><?php echo $this->_tpl_vars['s']-10; ?>
</a></div>
								<?php endif; ?>
								<?php endfor; endif; ?>
							</div>
							<div class="next"><a href="javascript: void(0);" class="disabled"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/btn_next.png" alt="次へ" class="fade_on_hover"></a></div>
						</div>
					</div><!-- #house_img -->
				</div>
			</div>
		</div><!-- .box01 -->
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
									<?php if ($this->_tpl_vars['bukken']['parking_c'] == 1): ?>
										<?php $_from = $this->_tpl_vars['bukken']['parking_txt']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
										<?php echo $this->_tpl_vars['v']; ?>
&nbsp;
										<?php endforeach; endif; unset($_from); ?>

										<?php if ($this->_tpl_vars['bukken']['parking_tax_c'] != 2): ?>
											<?php echo ((is_array($_tmp=$this->_tpl_vars['bukken']['parking_charge_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円
											<?php if ($this->_tpl_vars['bukken']['parking_tax_c'] == 0): ?>（税別）<?php endif; ?>
											<?php if ($this->_tpl_vars['bukken']['parking_tax_c'] == 1): ?>（税込み）<?php endif; ?>
										<?php else: ?>
										要確認
										<?php endif; ?>
									<?php elseif ($this->_tpl_vars['bukken']['parking_c'] == 2): ?>
									要確認
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
									<?php if (! empty ( $this->_tpl_vars['bukken']['pet_c'] )): ?>
									<?php $this->assign('pet_array', ((is_array($_tmp=",")) ? $this->_run_mod_handler('explode', true, $_tmp, $this->_tpl_vars['bukken']['pet_c']) : explode($_tmp, $this->_tpl_vars['bukken']['pet_c']))); ?>

									<?php $_from = $this->_tpl_vars['cnf']['pet']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['pk'] => $this->_tpl_vars['p']):
?>
										<?php if (in_array ( $this->_tpl_vars['pk'] , $this->_tpl_vars['pet_array'] )): ?>
											<?php echo $this->_tpl_vars['p']; ?>
&nbsp;
										<?php endif; ?>
									<?php endforeach; endif; unset($_from); ?>
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
									<?php elseif ($this->_tpl_vars['bukken']['fire_flg_c'] == 0): ?>
									無し
									<?php elseif ($this->_tpl_vars['bukken']['fire_flg_c'] == 2): ?>
									要確認
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
									<?php elseif ($this->_tpl_vars['bukken']['hoshou_availability_c'] == 3): ?>
									要確認
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
					<div class="h">部屋タイプ<strong><?php echo $this->_tpl_vars['house']['house_no_c']; ?>
</strong></div>
					<ul class="layout_price">
						<li class="fll" style="width: 185px"><?php echo $this->_tpl_vars['cnf']['layout_regist'][$this->_tpl_vars['house']['layout_c']]; ?>
<span class="fz11 fwn">（<?php echo ((is_array($_tmp=$this->_tpl_vars['house']['space_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
m&sup2;）</span></li>
						<li class="flr" style="width: 184px"><?php echo ((is_array($_tmp=$this->_tpl_vars['house']['rental_price_c'])) ? $this->_run_mod_handler('number_format', true, $_tmp) : number_format($_tmp)); ?>
円〜</li>
					</ul>
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
				<div class="clb pt50 ovh">
					<div id="map_area">
						<div id="map"></div>
						<p class="tar mt15"><a href="https://www.google.co.jp/maps/?q=<?php echo $this->_tpl_vars['bukken']['latitude_c']; ?>
,<?php echo $this->_tpl_vars['bukken']['longitude_c']; ?>
" target="_blank"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/btn_map.png" alt="大きな地図で見る" class="fade_on_hover"></a></p>
					</div>
					<div class="point">
						<div class="inner">
							<table>
								<tr>
									<th>
										<img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/h_02.png" alt="ポイント" />
									</th>
									<td>
										<?php echo ((is_array($_tmp=((is_array($_tmp=$this->_tpl_vars['bukken']['comment1_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)))) ? $this->_run_mod_handler('nl2br', true, $_tmp) : smarty_modifier_nl2br($_tmp)); ?>

									</td>
								</tr>
							</table>
						</div>
						<div class="mt30 tac"><a href="?b=<?php echo $this->_tpl_vars['bukken']['building_id_c']; ?>
&amp;h=<?php echo $this->_tpl_vars['house']['house_id_c']; ?>
&amp;print=1" target="_blank"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/btn_print.png" alt="印刷する" class="fade_on_hover"></a></div>
					</div>
				</div>
			</div><!-- .inner -->
		</div><!-- #box02 -->
		<div id="box03">
			<div class="contact_area">
				<img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/bg_contact.png" alt="この物件の見学予約・空室確認をする">
				<a href="<?php echo @WEB_ROOT; ?>
/contact.html?h=<?php echo $this->_tpl_vars['house']['house_id_c']; ?>
"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/btn_contact.png" alt="お問合せ" class="fade_on_hover"></a>
			</div>
		</div><!-- #box03 -->
		<div id="recommend">
			<h3 class="tac pt70"><img src="<?php echo @WEB_ROOT; ?>
/src/img/detail/h_recommend.png" alt="関連物件"></h3>
			<ul class="list-bukkens">
<?php $_from = $this->_tpl_vars['recommend']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<li>
					<a href="detail.html?b=<?php echo $this->_tpl_vars['v']['building_id_c']; ?>
<?php echo $this->_tpl_vars['ref_param']; ?>
" target="_blank" class="dib fade_on_hover">
						<ul class="labels">
							<?php if (((is_array($_tmp=$this->_tpl_vars['v']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '0') : strstr($_tmp, '0'))): ?>
							<li class="pet">ペット可</li>
							<?php endif; ?>
							<?php if (((is_array($_tmp=$this->_tpl_vars['v']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '2') : strstr($_tmp, '2'))): ?>
							<li class="shinchiku">新築</li>
							<?php endif; ?>
							<?php if (((is_array($_tmp=$this->_tpl_vars['v']['feature_c'])) ? $this->_run_mod_handler('strstr', true, $_tmp, '4') : strstr($_tmp, '4'))): ?>
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
						<div class="fz14 fwb mt5"><?php echo $this->_tpl_vars['v']['building_name_c']; ?>
</div>
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
		</div>

	</div><!-- #main -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>