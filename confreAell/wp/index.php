<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="topMain">
		<div class="topKvContainer">
			<div class="topKvPanel">
				<div class="kvLogo">
					<h1><img src="<?php bloginfo('template_url'); ?>/image/common/top_shop_logo.png" alt="confreAell"></h1>
				</div>
				<div class="kvTxt">
					<p>【営業時間 】 平日 17:00～24:00　土日祝日　12:00～24：00</p>
				</div>
			</div>
		</div>
		<div class="topSection">
			<div class="secWrap">
				<div class="secBox">
					<div class="txtBox fadein">
						<div class="title">
							<h2>みんな友達、仲良しがテーマの<br>アットホームなコンカフェです</h2>
						</div>
						<div class="txt">
							<p>私たちのコンセプトは、お客様がくつろぎ、笑顔になっていただける場所を提供すること。<br>「みんな友達」が合言葉であり、初めての方もリラックスしてお越しいただけるような、温かな雰囲気を大切にしています。<br>アットホームな女の子がお迎えし、常連の方も初めての方も気軽におしゃべりできるような雰囲気をつくっています。<br>私たちのコンカフェは、日常の喧騒から離れ、ほっと一息つける場所です。<br>「みんな友達、仲良しがテーマのアットホームなコンカフェ　コンフレアエル」にて心温まる時間を共に過ごしませんか？</p>
						</div>
						<div class="btnMoreBox">
							<div class="btnMore"><a href="<?php echo home_url(); ?>/concept/">Read More</a></div>
						</div>
					</div>
					<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_photo_pc.png" alt=""></div>
				</div>
			</div>
		</div>
		<div class="section" id="section__cast">
			<div class="secWrap01 fadein">
				<div class="secTtl">
					<h2><img src="<?php bloginfo('template_url'); ?>/image/top/title_cast.png" alt="キャスト"></h2>
				</div>
				<div class="listPanel pink">
					<ul>
						<?php
			                $the_query = new WP_Query( array(
			                  'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
			                  'post_type'   => 'cast',
			                  'posts_per_page' => 8,
			            	));
							$count = 1;
						?>
						<?php if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li>
							<a href="<?php the_permalink() ?>">
								<div class="photo"><?php the_post_thumbnail('full'); ?></div>
								<div class="nameBox">
									<p><?php the_title(); ?></p>
								</div>
							</a>
						</li>
						<?php $count++; endwhile; ?>
					</ul>
				</div>
				<div class="btnMore"><a href="<?php echo home_url(); ?>/castlist/">Read More</a></div>
			</div>
		</div>
		<!-- <div class="section" id="section__goods">
			<div class="secWrap01 fadein">
				<div class="secTtl">
					<h2><img src="<?php bloginfo('template_url'); ?>/image/top/title_goods.png" alt="グッズ"></h2>
				</div>
				<div class="txt">
					<p>ここでしか手に入らないお気に入りのキャストのグッズを日々更新中です♪</p>
				</div>
				<div class="listPanel purple">
					<ul>
						<li><a href="">
								<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/cast_img_01.png" alt=""></div>
								<div class="nameBox">
									<p>キャスト名が入りますキャスト名が入ります</p>
								</div>
							</a></li>
						<li><a href="">
								<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/cast_img_02.png" alt=""></div>
								<div class="nameBox">
									<p>キャスト名が入ります</p>
								</div>
							</a></li>
						<li><a href="">
								<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/cast_img_03.png" alt=""></div>
								<div class="nameBox">
									<p>キャスト名が入ります</p>
								</div>
							</a></li>
						<li><a href="">
								<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/cast_img_01.png" alt=""></div>
								<div class="nameBox">
									<p>キャスト名が入ります</p>
								</div>
							</a></li>
						<li><a href="">
								<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/cast_img_01.png" alt=""></div>
								<div class="nameBox">
									<p>キャスト名が入ります</p>
								</div>
							</a></li>
						<li><a href="">
								<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/cast_img_01.png" alt=""></div>
								<div class="nameBox">
									<p>キャスト名が入ります</p>
								</div>
							</a></li>
					</ul>
				</div>
				<div class="btnMore purple"><a href="#">Read More</a></div>
			</div>
		</div> -->
		<div class="section" id="section__news">
			<div class="secWrap01 fadein">
				<div class="secTtl">
					<h2><img src="<?php bloginfo('template_url'); ?>/image/top/title_news.png" alt="お知らせ・イベント"></h2>
				</div>
				<div class="listPanel pink">
					<ul>
						<?php
							$the_query = new WP_Query( array(
							'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
							'post_type'   => 'post',
							'posts_per_page' => 8,
						) ); ?>
						<?php if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
						<li>
							<a href="<?php the_permalink() ?>">
								<div class="photo"><?php the_post_thumbnail('full'); ?></div>
								<div class="nameBox">
									<p><?php the_title(); ?></p>
								</div>
							</a>
						</li>
						<?php endwhile; ?>
					</ul>
				</div>
				<div class="btnMore"><a href="<?php echo home_url(); ?>/newslist/">Read More</a></div>
			</div>
		</div>
		<div class="section" id="section__info">
			<div class="secWrap02 fadein">
				<div class="secTtl">
					<h2><img src="<?php bloginfo('template_url'); ?>/image/top/title_info.png" alt="店舗紹介"></h2>
				</div>
				<div class="infoBox">
					<dl>
						<dt>店舗名</dt>
						<dd>confre Aell（こんふれ　あえる）</dd>
					</dl>
					<dl>
						<dt>住所</dt>
						<dd>愛知県名古屋市中村区名駅4丁目25-16　ウインズ名駅5F</dd>
					</dl>
					<dl>
						<dt>営業時間</dt>
						<dd>平日 17:00～24:00<br>土日祝日　12:00～24：00</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="slidePanel">
			<div class="slideBox">
				<ul>
					<li><img src="<?php bloginfo('template_url'); ?>/image/top/top_slide_01.png" alt=""></li>
					<li><img src="<?php bloginfo('template_url'); ?>/image/top/top_slide_02.png" alt=""></li>
					<li><img src="<?php bloginfo('template_url'); ?>/image/top/top_slide_03.png" alt=""></li>
					<li><img src="<?php bloginfo('template_url'); ?>/image/top/top_slide_04.png" alt=""></li>
					<li><img src="<?php bloginfo('template_url'); ?>/image/top/top_slide_05.png" alt=""></li>
				</ul>
			</div>
		</div>
		<div class="mapBox"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13046.070940873587!2d136.8875012!3d35.1686464!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x6003772473ca9021%3A0xe8d384827ac0531f!2zQ29uZnJlIEFlbGwgKOOCs-ODs-OCq-ODleOCpyDlkI3lj6TlsYsp!5e0!3m2!1sja!2sjp!4v1695553001488!5m2!1sja!2sjp" allow="fullscreen"></iframe></div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>