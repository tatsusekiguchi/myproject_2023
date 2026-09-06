<?php /* Smarty version 2.6.26, created on 2016-03-02 09:43:37
         compiled from header.tpl */ ?>
<!doctype html>
<html lang="ja">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header_head.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div id="wrapper">
	<div id="header">
		<div class="inner01">
			<div class="inner01_01 w980 mra mla">
				<div class="logo"><a href="<?php echo @WEB_ROOT; ?>
/"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header/logo.png" alt="room R room" /></a></div>
				<h1 class="description color03">名古屋のデザイナーズ賃貸はroomRroom（ルームRルーム）</h1>
				<div class="tel">
					<div><img src="<?php echo @WEB_ROOT; ?>
/src/img/header/tel.png" alt="TEL 0120-99-7376" /></div>
					<div class="fz11 mt5">10:00-19:00／定休日：毎週水曜日</div>
				</div>
				<div class="contact"><a href="<?php echo @WEB_ROOT; ?>
/contact.html" class="fade_on_hover"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header/b_06.png" alt="物件見学予約 お問合せ" /></a></div>
			</div>
		</div><!-- .inner -->
		<div class="inner02 w980 mra mla">
			<div class="nav">
				<ul class="search">
					<li><a href="<?php echo @WEB_ROOT; ?>
/area.html" class="fade_on_hover"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header/b_03.png" alt="エリア検索" /></a></li>
					<li><a href="<?php echo @WEB_ROOT; ?>
/search.html" class="fade_on_hover"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header/b_04.png" alt="条件検索" /></a></li>
					<?php if ($this->_tpl_vars['cnf']['login_flg']): ?>
					<li><a href="<?php echo @WEB_ROOT; ?>
/line.html" class="fade_on_hover"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header/b_05.png" alt="沿線検索" /></a></li>
					<?php endif; ?>
				</ul>
				<ul class="other">
					<li><a href="<?php echo @WEB_ROOT; ?>
/info/" class="fade_on_hover"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header/b_02.png" alt="新着ニュース" /></a></li>
					<li><a href="<?php echo @WEB_ROOT; ?>
/store.html" class="fade_on_hover"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header/b_01.png" alt="店舗紹介" /></a></li>
				</ul>
			</div><!-- .nav -->
		</div>
	</div><!-- #header -->