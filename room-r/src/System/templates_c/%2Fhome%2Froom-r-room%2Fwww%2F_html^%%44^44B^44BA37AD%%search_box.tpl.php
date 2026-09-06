<?php /* Smarty version 2.6.26, created on 2016-03-02 09:43:37
         compiled from search_box.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'search_box.tpl', 34, false),array('modifier', 'basename', 'search_box.tpl', 38, false),)), $this); ?>

<table>
	<tbody>
		<tr>
			<th><img src="src/img/search_box/t_01.png" alt="家賃" /></th>
			<td>
				<select name="min">
					<option value="">未選択</option>
					<option value="50000"<?php if ($this->_tpl_vars['params']['min'] == 50000): ?> selected="selected"<?php endif; ?>>5万円</option>
					<option value="70000"<?php if ($this->_tpl_vars['params']['min'] == 70000): ?> selected="selected"<?php endif; ?>>7万円</option>
					<option value="100000"<?php if ($this->_tpl_vars['params']['min'] == 100000): ?> selected="selected"<?php endif; ?>>10万円</option>
					<option value="120000"<?php if ($this->_tpl_vars['params']['min'] == 120000): ?> selected="selected"<?php endif; ?>>12万円</option>
					<option value="150000"<?php if ($this->_tpl_vars['params']['min'] == 150000): ?> selected="selected"<?php endif; ?>>15万円</option>
					<option value="200000"<?php if ($this->_tpl_vars['params']['min'] == 200000): ?> selected="selected"<?php endif; ?>>20万円</option>
					<option value="300000"<?php if ($this->_tpl_vars['params']['min'] == 300000): ?> selected="selected"<?php endif; ?>>30万円</option>
				</select>
				<span>〜</span>
				<select name="max">
					<option value="">未選択</option>
					<option value="50000"<?php if ($this->_tpl_vars['params']['max'] == 50000): ?> selected="selected"<?php endif; ?>>5万円</option>
					<option value="70000"<?php if ($this->_tpl_vars['params']['max'] == 70000): ?> selected="selected"<?php endif; ?>>7万円</option>
					<option value="100000"<?php if ($this->_tpl_vars['params']['max'] == 100000): ?> selected="selected"<?php endif; ?>>10万円</option>
					<option value="120000"<?php if ($this->_tpl_vars['params']['max'] == 120000): ?> selected="selected"<?php endif; ?>>12万円</option>
					<option value="150000"<?php if ($this->_tpl_vars['params']['max'] == 150000): ?> selected="selected"<?php endif; ?>>15万円</option>
					<option value="200000"<?php if ($this->_tpl_vars['params']['max'] == 200000): ?> selected="selected"<?php endif; ?>>20万円</option>
					<option value="300000"<?php if ($this->_tpl_vars['params']['max'] == 300000): ?> selected="selected"<?php endif; ?>>30万円</option>
				</select>
			</td>
		</tr>
		<tr>
			<th><img src="src/img/search_box/t_02.png" alt="間取り" /></th>
			<td>
				<?php $_from = $this->_tpl_vars['cnf']['layout']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<label class="dib w150"><input type="checkbox" name="l[]" value="<?php echo $this->_tpl_vars['k']; ?>
"<?php if (count ( $this->_tpl_vars['params']['layout'] ) > 0 && ((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['params']['layout']) : in_array($_tmp, $this->_tpl_vars['params']['layout']))): ?> checked="checked"<?php endif; ?> />&nbsp;<?php echo $this->_tpl_vars['v']; ?>
</label>
				<?php endforeach; endif; unset($_from); ?>
			</td>
		</tr>
<?php if ("area.php" != ((is_array($_tmp=$_SERVER['PHP_SELF'])) ? $this->_run_mod_handler('basename', true, $_tmp) : basename($_tmp)) && $this->_tpl_vars['location'] !== 'line'): ?>
		<tr class="area">
			<th><img src="src/img/search_box/t_03.png" alt="エリア" /></th>
			<td>
				<?php $_from = $this->_tpl_vars['cnf']['area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
				<label class="dib w150"><input type="checkbox" name="a[]" value="<?php echo $this->_tpl_vars['k']; ?>
"<?php if (count ( $this->_tpl_vars['params']['area'] ) > 0 && ((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['params']['area']) : in_array($_tmp, $this->_tpl_vars['params']['area']))): ?> checked="checked"<?php endif; ?> /> <?php echo $this->_tpl_vars['v']['name']; ?>
</label>
				<?php endforeach; endif; unset($_from); ?>
			</td>
		</tr>
<?php endif; ?>
<?php if ($this->_tpl_vars['location'] === 'line'): ?>
		<tr class="line line-higashiyama dn">
			<th><img src="src/img/search_box/l_higashiyama.png" alt="地下鉄 東山線" /></th>
			<td>
				<?php $_from = $this->_tpl_vars['cnf']['transport_station'][1]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<label class="dib mr30"><input type="checkbox" value="<?php echo $this->_tpl_vars['v']; ?>
" name="s[]"<?php if (( is_array ( $this->_tpl_vars['params']['station'] ) && in_array ( $this->_tpl_vars['v'] , $this->_tpl_vars['params']['station'] ) ) || in_array ( $this->_tpl_vars['v'] , $this->_tpl_vars['params']['active_stations'] )): ?> checked="checked"<?php endif; ?> class="input_st input_st<?php echo $this->_tpl_vars['v']; ?>
" /> <?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['v']]; ?>
</label>
				<?php endforeach; endif; unset($_from); ?>
			</td>
		</tr>
		<tr class="line line-sakuradori dn">
			<th><img src="src/img/search_box/l_sakuradori.png" alt="地下鉄 桜通線" /></th>
			<td>
				<?php $_from = $this->_tpl_vars['cnf']['transport_station'][4]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<label class="dib mr30"><input type="checkbox" value="<?php echo $this->_tpl_vars['v']; ?>
" name="s[]"<?php if (( is_array ( $this->_tpl_vars['params']['station'] ) && in_array ( $this->_tpl_vars['v'] , $this->_tpl_vars['params']['station'] ) ) || in_array ( $this->_tpl_vars['v'] , $this->_tpl_vars['params']['active_stations'] )): ?> checked="checked"<?php endif; ?> class="input_st input_st<?php echo $this->_tpl_vars['v']; ?>
" /> <?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['v']]; ?>
</label>
				<?php endforeach; endif; unset($_from); ?>
			</td>
		</tr>
		<tr class="line line-tsurumai dn">
			<th><img src="src/img/search_box/l_tsurumai.png" alt="地下鉄 鶴舞線" /></th>
			<td>
				<?php $_from = $this->_tpl_vars['cnf']['transport_station'][2]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<label class="dib mr30"><input type="checkbox" value="<?php echo $this->_tpl_vars['v']; ?>
" name="s[]"<?php if (( is_array ( $this->_tpl_vars['params']['station'] ) && in_array ( $this->_tpl_vars['v'] , $this->_tpl_vars['params']['station'] ) ) || in_array ( $this->_tpl_vars['v'] , $this->_tpl_vars['params']['active_stations'] )): ?> checked="checked"<?php endif; ?> class="input_st input_st<?php echo $this->_tpl_vars['v']; ?>
" /> <?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['v']]; ?>
</label>
				<?php endforeach; endif; unset($_from); ?>
			</td>
		</tr>
		<tr class="line line-meijo dn">
			<th><img src="src/img/search_box/l_meijo.png" alt="地下鉄 名城線" /></th>
			<td>
				<?php $_from = $this->_tpl_vars['cnf']['transport_station'][3]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<label class="dib mr30"><input type="checkbox" value="<?php echo $this->_tpl_vars['v']; ?>
" name="s[]"<?php if (( is_array ( $this->_tpl_vars['params']['station'] ) && in_array ( $this->_tpl_vars['v'] , $this->_tpl_vars['params']['station'] ) ) || in_array ( $this->_tpl_vars['v'] , $this->_tpl_vars['params']['active_stations'] )): ?> checked="checked"<?php endif; ?> class="input_st input_st<?php echo $this->_tpl_vars['v']; ?>
" /> <?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['v']]; ?>
</label>
				<?php endforeach; endif; unset($_from); ?>
			</td>
		</tr>
		<tr class="line line-jr dn">
			<th><img src="src/img/search_box/l_jr.png" alt="JR中央本線" /></th>
			<td>
				<?php $_from = $this->_tpl_vars['cnf']['transport_station'][5]; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<label class="dib mr30"><input type="checkbox" value="<?php echo $this->_tpl_vars['v']; ?>
" name="s[]"<?php if (( is_array ( $this->_tpl_vars['params']['station'] ) && in_array ( $this->_tpl_vars['v'] , $this->_tpl_vars['params']['station'] ) ) || in_array ( $this->_tpl_vars['v'] , $this->_tpl_vars['params']['active_stations'] )): ?> checked="checked"<?php endif; ?> class="input_st input_st<?php echo $this->_tpl_vars['v']; ?>
" /> <?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['v']]; ?>
</label>
				<?php endforeach; endif; unset($_from); ?>
			</td>
		</tr>
<?php endif; ?>
	</tbody>
</table>