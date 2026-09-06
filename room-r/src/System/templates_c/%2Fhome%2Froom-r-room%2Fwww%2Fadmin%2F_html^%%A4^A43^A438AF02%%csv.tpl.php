<?php /* Smarty version 2.6.26, created on 2016-07-22 23:19:19
         compiled from csv.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="css/csv.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.11.0m.js"></script>
<script type="text/javascript" src="js/jquery.upload-1.0.2.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<title>CSV</title>
<?php echo '
<script type="text/javascript">
$(function(){
	$("#menu_top > li").eq(2).addClass("on");
});
</script>
'; ?>

</head>
<body>
<div id="wrapper">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="main" class="sd01">
		<div class="inner">
			<form action="csv.php" method="post" enctype="multipart/form-data">
			<h1>CSV登録</h1>
			<h2>物件CSV</h2>
			<?php if (! empty ( $this->_tpl_vars['errorMsgBuilding'] )): ?>
			<div class="error">
				<div class="error_inner">
				<?php $_from = $this->_tpl_vars['errorMsgBuilding']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<p><?php echo $this->_tpl_vars['v']; ?>
</p>
				<?php endforeach; endif; unset($_from); ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if (! empty ( $this->_tpl_vars['resultMsgBuilding'] )): ?>
			<div class="result">
				<?php echo $this->_tpl_vars['resultMsgBuilding']; ?>

			</div>
			<?php endif; ?>
			<input type="file" name="building" class="fileupload" />
			<hr style="margin-top:25px;" />
			<h2 style="margin-top: 25px;">部屋CSV</h2>
			<?php if (! empty ( $this->_tpl_vars['errorMsgRoom'] )): ?>
			<div class="error">
				<div class="error_inner">
				<?php $_from = $this->_tpl_vars['errorMsgRoom']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
				<p><?php echo $this->_tpl_vars['v']; ?>
</p>
				<?php endforeach; endif; unset($_from); ?>
				</div>
			</div>
			<?php endif; ?>
			<?php if (! empty ( $this->_tpl_vars['resultMsgRoom'] )): ?>
			<div class="result">
				<?php echo $this->_tpl_vars['resultMsgRoom']; ?>

			</div>
			<?php endif; ?>
			<input type="file" name="room" class="fileupload" />
			<div class="btn_submit">
				<input type="submit" value="登録" />
			</div>
			<input type="hidden" value="1" name="register" />
			</form>
			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>