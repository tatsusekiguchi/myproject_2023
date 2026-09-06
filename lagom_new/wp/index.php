<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="top">
		<div class="topKvPanel">
			<div class="topKv"></div>
		</div>
		<div class="topItemPanel">
			<div class="scroll"></div>
		</div>
		<div class="section__concept" id="concept">
			<div class="section__concept__wrap">
				<h1 class="fadeUp">すっと馴染んで、<br class="spBreak">ずっと飽きない。</h1>
				<div class="txt fadeUp">
					<p>すっとが、ずっとに。いつもが、いつまでもに。<br>そんな住まいをつくりました。<br>「見つかった」「探していた」と感じていただける<br>規格住宅が、Lagomです。</p>
				</div>
			</div>
		</div>
		<div class="section__features" id="features">
			<div class="section__features__wrap">
				<div class="section__features__intro">
					<div class="titleBox fadeUp">
						<h2>Features</h2>
					</div>
					<div class="txtBox">
						<dl class="fadeUp">
							<dt> 居心地の良さを支える素材</dt>
							<dd>住まいの居心地の良さを支えているのは素材。<br>経年変化によって表情が楽しめるフローリング、<br class="spBreak">深みのあるタイル、<br class="pcBreak">アースカラーの塗り壁が肌に馴染みます。</dd>
						</dl>
						<dl class="fadeUp">
							<dt>光や風と暮らす家</dt>
							<dd>普遍的な自然素材をベースにサンルームや吹き抜け、<br>窓の位置で光や風を取り入れる工夫をしています。<br>季節を感じながら住み続けることのできる<br class="spBreak">穏やかで飽きのこない空間です。</dd>
						</dl>
						<dl class="fadeUp">
							<dt>整いやすい</dt>
							<dd>大容量の海外製食洗機やお手入れしやすい浴室、<br class="spBreak">適材適所に設計された収納など、<br>デザイン性と機能性を両立させています。<br>整えることが日常化され、より愛着が深まります。</dd>
						</dl>
						<dl class="fadeUp">
							<dt>ゲストも落ち着く空間</dt>
							<dd>居心地の良い家には人が集まり、<br class="spBreak">つい長居をしたくなるものです。<br>開放的なLDKの中心にキッチンが配置され、<br>料理や会話が共有できます。<br>家族も友人もくつろぎながら楽しめる住まいです。</dd>
						</dl>
					</div>
				</div>
			</div>
			<div class="section__features__photo">
				<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_features_img_pc.png?202301241546" alt=""></div>
			</div>
		</div>
		<div class="section__openHouse" id="openHouse">
			<div class="section__openHouse__wrap">
				<div class="section__openHouse__container">
					<div class="titleBox fadeUp">
						<h2>OpenHouse</h2>
					</div>
					<div class="txtBox">
						<div class="photoList">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_openhouse_img_01.png?202302152100" alt=""></div>
							<!-- <div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_openhouse_img_02.png?202301241546" alt=""></div> -->
						</div>
						<div class="photoSlider">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_openhouse_img_01.png?202302152100" alt=""></div>
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_openhouse_img_02.png?202301241546" alt=""></div>
						</div>
						<div class="infoBox fadeUp">
							<dl>
								<dt>DATE</dt>
								<dd><?php echo html_entity_decode(get_field('tour_date',56));?></dd>
							</dl>
							<dl class="place">
								<dt>PLACE</dt>
								<dd>
									<p><?php echo html_entity_decode(get_field('tour_place',56));?></p><a href="<?php echo html_entity_decode(get_field('tour_place_url',56));?>" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/top/top_event_pin.png?202301241546" alt=""></a>
								</dd>
							</dl>
							<dl>
								<dt>TIME</dt>
								<dd><?php echo html_entity_decode(get_field('tour_time',56));?></dd>
							</dl>
							<dl>
								<dt>PARKING</dt>
								<dd><?php echo html_entity_decode(get_field('tour_parking',56));?></dd>
							</dl>
						</div>
						<p class="fadeUp">スマホのMAPアプリで住所を検索をくだくとスムーズに来場いただけます。<br>近くなりましたらお電話いただければご案内いたします。</p>
					</div>
				</div>
				<div class="section__openHouse__entry"><a class="fadeUp" href="#contact">オープンハウスのご予約はこちら</a></div>
			</div>
		</div>
		<div class="section__news" id="news">
			<div class="section__news__wrap">
				<div class="section__news__container">
					<div class="titleBox fadeUp">
						<h2>News and<br>Event</h2>
					</div>
					<div class="txtBox">
						<div class="section__news__list fadeUp">
							<ul>
							<?php
								$the_query = new WP_Query( array(
								'paged'       => get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1,
								'post_type'   => 'post',
								'posts_per_page' => 3,
								) ); ?>
							<?php if ( $the_query->have_posts() ) while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
								<li>
									<a href="<?php the_permalink() ?>">
										<div class="txtBox">
											<div class="info">
												<div class="cate">
													<?php
														$category = get_the_category();
														$cat_name = $category[0]->cat_name;
														$cat_slug = $category[0]->category_nicename;
													?>
													<p><?php echo $cat_name; ?></p>
												</div>
											</div>
											<div class="date">
												<p><?php the_field('event_date'); ?></p>
											</div>
											<div class="title">
												<p><?php the_title(); ?></p>
											</div>
										</div>
									</a>
								</li>
								<?php endwhile; ?>
							</ul>
						</div>
					</div>
				</div>
				<div class="section__news__entry"><a class="fadeUp" href="<?php echo home_url(); ?>/eventlist">VIEW MORE</a></div>
			</div>
		</div>
		<div class="section__faq" id="faq">
			<div class="section__faq__wrap">
				<div class="section__faq__container">
					<div class="titleBox fadeUp">
						<h2>Faq</h2>
					</div>
					<div class="txtBox fadeUp">
						<div class="section__faq__box">
							<?php
								$page_id = get_page_by_path('faq');
								$page_id = $page_id->ID;
							?>
							<?php if(have_rows('gr_faq', $page_id)): ?>
								<?php while(have_rows('gr_faq', $page_id)): the_row(); ?>
									<dl class="accord">
										<dt><span>Q</span><em><?php the_sub_field('faq_title'); ?></em></dt>
										<dd>
											<?php the_sub_field('faq_answer'); ?>
										</dd>
									</dl>
								<?php endwhile; ?>
							<?php endif; ?>
						</div>
					</div>
				</div>
			</div>
			<div class="section__faq__photo">
				<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_faq_img_pc.png?202302152100" alt=""></div>
			</div>
		</div>
		<div class="section__contact" id="contact">
			<div class="section__contact__wrap">
				<div class="section__contact__topBox">
					<h2 class="fadeUp">Contact</h2>
					<div class="txt fadeUp">
						<p>オープンハウス、イベントの参加希望、お問合せ、<br class="spBreak">ご質問などは公式ライン、お電話、<br class="spBreak">メールよりお問い合わせください。<br>担当者より折り返しご連絡させていただきます。</p>
					</div>
					<ul class="fadeUp">
						<li class="line"><a href="https://line.me/R/ti/p/@488gvbmr?oat__id=1806778"><img src="<?php bloginfo('template_url'); ?>/image/top/top_contact_line.png?202301232200" alt=""></a></li>
						<li class="tel"><a href="tel:0522287770"><img src="<?php bloginfo('template_url'); ?>/image/top/top_contact_tel.png?202301232200" alt=""></a></li>
					</ul>
				</div>
				<div class="formBox">
					<?php echo do_shortcode('[mwform_formkey key="26"]'); ?>
				</div>
			</div>
		</div>
		<div class="section__company" id="company">
			<div class="section__company__wrap">
				<h2 class="fadeUp">Company</h2>
				<div class="section__company__box fadeUp">
					<dl>
						<dt><span>社　名</span></dt>
						<dd>
							<p>株式会社 丸協</p>
						</dd>
					</dl>
					<dl>
						<dt><span>所在地</span></dt>
						<dd>
							<p>〒460-0012　名古屋市中区千代田三丁目22番8号</p>
						</dd>
					</dl>
					<dl>
						<dt><span>設立</span></dt>
						<dd>
							<p>昭和26年2月10日</p>
						</dd>
					</dl>
					<dl>
						<dt><span>TEL</span></dt>
						<dd><a href="tel:0523318001">052-331-8001</a></dd>
					</dl>
					<dl>
						<dt><span>FAX</span></dt>
						<dd><a href="javascript:void(0)">052-331-5061</a></dd>
					</dl>
					<dl>
						<dt><span>登録番号</span></dt>
						<dd>
							<p>住宅建設工事 建設業者登録番号 愛知県知事許可（特-3）第1689号</p>
							<p>不動産売買及び仲介 宅地建物取引業登録番号 愛知県知事（11）第10837号</p>
							<p>住宅資材販売 木材業者登録番号 木第6117号</p>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>