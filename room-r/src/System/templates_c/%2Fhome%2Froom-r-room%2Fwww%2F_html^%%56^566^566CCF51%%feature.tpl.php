<?php /* Smarty version 2.6.26, created on 2016-03-02 15:14:01
         compiled from feature.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header_subpage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="main">
		<div class="inner">
			<div class="topicpath w980 mra mla">
				<span><a href="<?php echo @WEB_ROOT; ?>
/">HOME</a></span>
				<span>＞ <?php echo $this->_tpl_vars['f_title']; ?>
</span>
			</div><!-- .topicpath -->
			<h2 class="tac"><img src="src/img/feature/h_01.png" alt="こだわりの特集物件" /></h2>
			<h3 class="tac mt25"><img src="<?php echo @WEB_ROOT; ?>
/src/img/feature/main_<?php echo $this->_tpl_vars['f']; ?>
.png" alt="<?php echo $this->_tpl_vars['f_title']; ?>
"></h3>
			<div id="result">
				<div class="w980 mra mla">
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_found.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					<div class="pagination-block">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'pagenation.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div><!-- .pagination-block -->
				</div>
			</div><!-- #result -->
		</div><!-- .inner -->
	</div><!-- #main -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>