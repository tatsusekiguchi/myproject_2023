<?php /* Smarty version 2.6.26, created on 2018-02-08 14:54:49
         compiled from search_found.tpl */ ?>

<div class="header ovh">
	<div class="found">
    <div style="margin-bottom:15px; background: linear-gradient(transparent 60%, #ff0 0%); font-size:18px; width:29em; font-weight:bold;">roomRroom取り扱い総物件数<span style="font-size:30px;"> 521</span>棟<span style="font-size:30px;">1825</span>タイプ</div>
		<div class="count color03"><?php if ($this->_tpl_vars['cnt_bukken'] < 1): ?>物件が見つかりませんでした<?php else: ?><span class="num"><?php echo $this->_tpl_vars['cnt_bukken']; ?>
</span>件の物件が見つかりました<?php endif; ?></div>
		<?php if ($this->_tpl_vars['cnt_bukken'] > 0): ?>
		<div class="display">[ <?php echo $this->_tpl_vars['p']['cnt_start']; ?>
-<?php if ($this->_tpl_vars['cnt_bukken'] < $this->_tpl_vars['p']['cnt_end']): ?><?php echo $this->_tpl_vars['cnt_bukken']; ?>
<?php else: ?><?php echo $this->_tpl_vars['p']['cnt_end']; ?>
<?php endif; ?>件表示中 ]</div>
		<?php endif; ?>
		<div class="conditions color04">
			<?php $_from = $this->_tpl_vars['result_text']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
			<div class="dib"><?php echo $this->_tpl_vars['v']; ?>
　</div>
			<?php endforeach; endif; unset($_from); ?>
			<?php if (count ( $this->_tpl_vars['result_text'] ) == 0): ?>
			すべて表示
			<?php endif; ?>
			<!--名古屋駅前エリア　50,000〜70,000円　1R・1K-->
		</div>
	</div><!-- .found -->
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'pagenation.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
</div><!-- .header -->