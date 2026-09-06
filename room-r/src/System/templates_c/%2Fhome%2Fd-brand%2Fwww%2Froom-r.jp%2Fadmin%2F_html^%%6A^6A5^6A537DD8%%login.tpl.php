<?php /* Smarty version 2.6.26, created on 2018-01-28 18:18:02
         compiled from login.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/login.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.11.0m.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<title>管理画面ログイン</title>
</head>
<body>
<div id="wrapper">
	<div id="header">
		<div class="inner sd01 clearfix">
			<div id="logo"><a href="./" class="have_effect"><img src="img/logo.png" alt="ONE's NAGOYA ORIGINAL WEB SYSTEM" /></a></div>
		</div><!-- .inner -->
	</div><!-- #header -->

	<div id="main" class="sd01">
		<div class="inner">
			<h1>管理画面ログイン</h1>

			<div id="area_login_form">
				<form action="<?php echo WEB_ROOT; ?>/admin/" method="post">
					<?php if (! empty ( $this->_tpl_vars['error'] )): ?><div class="mb15"><?php echo $this->_tpl_vars['error']; ?>
</div><?php endif; ?>
					<dl>
						<dt>ユーザー名</dt>
						<dd><input type="text" name="user" value="" /></dd>
						<dt>パスワード</dt>
						<dd><input type="password" name="passwd" value="" /></dd>
					</dl>
					<div><input type="submit" value="ログイン" class="have_effect" /></div>
				</form>
			</div><!-- #area_login_form -->
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>













