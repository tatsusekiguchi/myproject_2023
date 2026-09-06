<?php /* Smarty version 2.6.26, created on 2016-03-02 10:43:14
         compiled from contact.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header_subpage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<script type="text/javascript" src="src/js/yubinbango.js"></script>
	<div id="main">
		<div class="inner">
			<div class="topicpath w980 mra mla">
				<span><a href="<?php echo @WEB_ROOT; ?>
/">HOME</a></span>
				<span>＞ ご予約・お問合せ</span>
			</div><!-- .topicpath -->
			<h2 class="tac"><img src="src/img/contact/h_01.png" alt="ご予約・お問合せ" /></h2>
			<div class="form mt25">
				<form action="contact.html<?php if (! empty ( $this->_tpl_vars['hid'] )): ?>?h=<?php echo $this->_tpl_vars['hid']; ?>
<?php endif; ?>" method="post" class="h-adr">
					<div class="inner">
<?php echo $this->_tpl_vars['form_content']; ?>

					</div><!-- .inner -->
				</form>
			</div><!-- .form -->
		</div><!-- .inner -->
	</div><!-- #main -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>