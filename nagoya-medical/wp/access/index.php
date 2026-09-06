<?php
/*
Template Name: 交通のご案内
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="main" id="access">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<h1>交通のご案内</h1>
			</div>
		</div>
		<div class="mainContainer">
			<div class="secWrap01">
				<div class="pageSecTtl">
					<p class="secTtl">交通のご案内</p>
					<p class="futura">Access</p>
				</div>
				<div class="topSection">
					<div class="topTitle gothic">
						<h2>名古屋メディカルクリニック</h2>
					</div>
					<div class="secBox">
						<div class="mapBox"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3262.5433339382544!2d136.898658!3d35.143068!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x600377520f4b045d%3A0x93c4eb131fb30dbe!2z5YaF6Jek44Oh44OH44Kj44Kr44Or44Kv44Oq44OL44OD44Kv!5e0!3m2!1sja!2sus!4v1675515549500!5m2!1sja!2sus" allow="fullscreen"></iframe></div>
						<div class="txtBox">
							<div class="pageSecTtlSub gothic">
								<h3>フロアマップ</h3>
							</div>
							<div class="imgMap"><img src="<?php bloginfo('template_url'); ?>/image/access/floor_map.png" alt=""></div>
							<div class="txt">
								<p>〒460-0024<br>愛知県名古屋市中区正木4-8-7 れんが橋ビル5階</p>
							</div>
						</div>
					</div>
				</div>
				<div class="secListContainer">
					<div class="linkList">
						<ul>
							<li data-target="sec01"><span>電車・タクシーを<br>ご利用の場合</span></li>
							<li data-target="sec02"><span>飛行機を<br>ご利用の場合</span></li>
							<li data-target="sec03"><span>車を<br>ご利用の場合</span></li>
						</ul>
					</div>
					<div class="sec01 section">
						<div class="secTtl gothic">
							<h3>電車・タクシーをご利用の場合</h3>
						</div>
						<div class="secBox">
							<div class="map"><img src="<?php bloginfo('template_url'); ?>/image/access/access_map_01.png" alt=""></div>
							<div class="txtBox">
								<div class="txt">
									<p>●電車をご利用の場合<br>名古屋駅からＪＲ中央線・ＪＲ東海道線または名鉄に乗り換えて頂き、 金山駅で下車、南口から徒歩で３分。</p>
									<p>●タクシーをご利用の場合<br>名古屋駅からタクシーにて約１０分～１５分。</p>
								</div>
							</div>
						</div>
					</div>
					<div class="sec02 section">
						<div class="secTtl gothic">
							<h3>飛行機をご利用の場合</h3>
						</div>
						<div class="secBox">
							<div class="map"><img src="<?php bloginfo('template_url'); ?>/image/access/access_map_02.png" alt=""></div>
							<div class="txtBox">
								<div class="txt">
									<p>●中部国際空港をご利用の場合<br>1.名鉄常滑・空港線にて中部国際空港から金山駅へ。<br>2.金山駅より徒歩3分で名古屋メディカルクリニックへ到着いたします。<br>最寄りの高速道路出口からの道順をご案内いたします。<br>詳細は各PDFにてご確認いただけます。<br>当院に専用の駐車場はございません。近くの時間貸駐車場をご利用下さい。</p>
									<p>●県営名古屋空港をご利用の場合<br>1.あおい交通バスにて県営名古屋空港から名古屋駅へ。<br>2.名古屋駅からタクシーで15分です。<br>3.電車をご利用の際は、JRもしくは名鉄にて名古屋駅より金山駅へお越しください。<br>4.金山駅より徒歩3分で名古屋メディカルクリニックへ到着いたします。</p>
								</div>
							</div>
						</div>
					</div>
					<div class="sec03 section">
						<div class="secTtl gothic">
							<h3>車をご利用の場合</h3>
						</div>
						<div class="txt">
							<p>最寄りの高速道路出口からの道順をご案内いたします。<br>詳細は各PDFにてご確認いただけます。</p>
						</div>
						<div class="pdfList">
							<ul class="gothic">
								<li><a href="../image/access/map_higashibetsuin.pdf" target="_blank" rel="noopener">東別院出口からルート：PDF</a></li>
								<li><a href="../image/access/map_shirakawa.pdf" target="_blank" rel="noopener">白川出口からからルート：PDF</a></li>
								<li><a href="../image/access/map_yobitsugi.pdf" target="_blank" rel="noopener">呼続出口から：PDF</a></li>
							</ul>
						</div>
					</div>
					<div class="sec04 section">
						<div class="secTtl gothic">
							<h3>当院周辺のコインパーキング</h3>
						</div>
						<div class="txt">
							<p>当院に専用の駐車場はございません。近くの時間貸駐車場をご利用下さい。</p>
						</div>
						<div class="parking"><img src="<?php bloginfo('template_url'); ?>/image/access/parking_map.png" alt=""></div>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>