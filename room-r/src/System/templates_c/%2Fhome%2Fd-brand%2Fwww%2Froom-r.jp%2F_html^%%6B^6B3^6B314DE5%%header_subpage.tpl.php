<?php /* Smarty version 2.6.26, created on 2018-02-08 16:58:14
         compiled from header_subpage.tpl */ ?>
<!doctype html>
<html lang="ja">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header_head.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
<body>
<div id="wrapper">
	<div id="header_subpage">
		<div class="inner w980 mra mla">
			<div class="logo"><a href="<?php echo @WEB_ROOT; ?>
/"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header_subpage/logo.png" alt="room R room" /></a></div>
			<h1 class="description color03">
				<?php 
				$location = $this->get_template_vars("location");
				switch ($location) {
					case 'area':
						echo '名古屋のデザイナーズ賃貸をエリアで検索。';
						break;
					case 'search':
						echo '名古屋のデザイナーズ賃貸を条件で検索。';
						break;
					case 'store':
						echo '名古屋でデザイナーズ賃貸を専門とする<br>roomRroom(ルームRルーム)の店舗をご紹介。';
						break;
					case 'info':
						echo '名古屋でデザイナーズ賃貸を専門とする<br>roomRroom(ルームRルーム)から新着ニュースをお届け。';
						break;
					case 'feature':
						if(isset($_GET["f"])){
							switch ($_GET["f"]) {
								case 7:
									echo '名古屋でワンランク上のデザイナーズマンションの<br>高級賃貸を特集中。';
									break;
								case 3:
									echo '名古屋で女性向けのデザイナーズマンションの<br>賃貸物件を特集中。';
									break;
								case 0:
									echo '名古屋でペット可のデザイナーズマンションの<br>賃貸物件を特集中。';
									break;
								case 2:
									echo '名古屋のデザイナーズマンションの<br>新築賃貸物件を特集中。';
									break;
							}
						}
						break;
					case 'company':
						echo '名古屋のデザイナーズマンションを専門とする<br>roomRroomの会社概要。';
						break;
					case 'contact':
						echo '名古屋でデザイナーズマンションをお探しなら、<br>roomRroomにお気軽にお問い合わせください。';
						break;
					case 'privacy':
						echo 'roomRroom(ルームRルーム)のプライバシーポリシーです。';
						break;
					default:
						echo '名古屋のデザイナーズ賃貸はroomRroom（ルームRルーム）'; 
						break;
				}
				 ?>
			</h1>
			<div class="tel">
				<div class="num"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header_subpage/tel.png" alt="TEL 0120-99-7376" /></div>
				<div class="hours">10:00-19:00<br />定休日：毎週水曜日</div>
			</div>
			<div class="contact"><a href="<?php echo @WEB_ROOT; ?>
/contact.html" class="fade_on_hover"><img src="<?php echo @WEB_ROOT; ?>
/src/img/header_subpage/b_01.png" alt="お問合せ" /></a></div>
			<ul class="nav">
				<li class="i01"><a href="<?php echo @WEB_ROOT; ?>
/area.html" class="<?php if ($this->_tpl_vars['location'] === 'area'): ?>current<?php endif; ?>">エリア検索</a></li>
				<li class="i02"><a href="<?php echo @WEB_ROOT; ?>
/search.html" class="<?php if ($this->_tpl_vars['location'] === 'search'): ?>current<?php endif; ?>">条件検索</a></li>
				<li class="i04"><a href="<?php echo @WEB_ROOT; ?>
/store.html" class="<?php if ($this->_tpl_vars['location'] === 'store'): ?>current<?php endif; ?>">店舗紹介</a></li>
				<li class="i05"><a href="<?php echo @WEB_ROOT; ?>
/info/" class="<?php if ($this->_tpl_vars['location'] === 'info'): ?>current<?php endif; ?>">新着ニュース</a></li>
			</ul><!-- .nav -->
		</div><!-- .inner -->
	</div><!-- #header_subpage -->