<!doctype html>
<html lang="ja">
<!--{include file='header_head.tpl'}-->
<body>
<div id="wrapper">
	<div id="header_subpage">
		<div class="inner w980 mra mla">
			<div class="logo"><a href="<!--{$smarty.const.WEB_ROOT}-->/"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/header_subpage/logo.png" alt="room R room" /></a></div>
			<h1 class="description color03">
				<!--{php}-->
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
				<!--{/php}-->
			</h1>
			<div class="tel">
				<div class="num"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/header_subpage/tel.png" alt="TEL 0120-99-7376" /></div>
				<div class="hours">10:00-19:00<br />定休日：毎週水曜日</div>
			</div>
			<div class="contact"><a href="<!--{$smarty.const.WEB_ROOT}-->/contact.html" class="fade_on_hover"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/header_subpage/b_01.png" alt="お問合せ" /></a></div>
			<ul class="nav">
				<li class="i01"><a href="<!--{$smarty.const.WEB_ROOT}-->/area.html" class="<!--{if $location === 'area' }-->current<!--{/if}-->">エリア検索</a></li>
				<li class="i02"><a href="<!--{$smarty.const.WEB_ROOT}-->/search.html" class="<!--{if $location === 'search' }-->current<!--{/if}-->">条件検索</a></li>
				<li class="i04"><a href="<!--{$smarty.const.WEB_ROOT}-->/store.html" class="<!--{if $location === 'store' }-->current<!--{/if}-->">店舗紹介</a></li>
				<li class="i05"><a href="<!--{$smarty.const.WEB_ROOT}-->/info/" class="<!--{if $location === 'info' }-->current<!--{/if}-->">新着ニュース</a></li>
			</ul><!-- .nav -->
		</div><!-- .inner -->
	</div><!-- #header_subpage -->
