<?php /* Smarty version 2.6.26, created on 2018-02-08 14:54:49
         compiled from area.tpl */ ?>
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
				<span>＞ エリア検索</span>
			</div><!-- .topicpath -->
			<h2 class="tac"><img src="src/img/area/h_01.png" alt="エリア検索" /></h2>
			<form action="./area.html#result" method="post">
				<div id="search-area" class="mt25">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_by_area_map_form_inner.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div><!-- #search-area -->
				<div id="search-cond">
					<h3 class="tac"><img src="src/img/area/h_02.png" alt="条件をつけて絞り込む" /></h3>
					<div class="w800 mra mla mt15">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_box.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</div>
					<div class="tac mt20"><input type="image" src="src/img/area/b_search.png" alt="検索する" class="fade_on_hover" /></div>
				</div><!-- #search-cond -->
			</form>
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