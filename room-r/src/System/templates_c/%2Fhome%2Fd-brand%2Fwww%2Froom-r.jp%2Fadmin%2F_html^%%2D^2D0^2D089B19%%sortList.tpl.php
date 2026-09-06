<?php /* Smarty version 2.6.26, created on 2018-12-09 14:38:47
         compiled from sortList.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.11.0m.js"></script>
<script type="text/javascript" src="js/jquery.upload-1.0.2.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<title>順位付け一覧</title>
<?php echo '
<script type="text/javascript">
$(function(){
	$("#menu_top > li").eq(1).addClass("on");
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
			<h1>表示順位設定</h1>

			<div class="center mb80">
								<div class="mt15"><a href="sortEdit.php?area=1" class="have_effect"><img src="img/order/btn_02.png" alt="「マップから探す」の順位を設定する" /></a></div>
				<div class="mt15"><a href="sortEdit.php?ensen=1" class="have_effect"><img src="img/order/btn_03.png" alt="「沿線から探す」の順位を設定する" /></a></div>
			</div>
			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>

















