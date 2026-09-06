<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="top">
		<div class="topKvPanel">
			<div class="topKv"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_kv_pc.png" alt=""></div>
			<div class="topKvWrap">
				<div class="kvTitleBox">
					<div class="mainTitle">
						<p>OPEN<br>HOUSE</p>
					</div>
					<h1>完成見学会</h1>
					<p>愛知県<br>知立市屋敷町</p>
				</div>
			</div>
		</div>
		<div class="infoPanel">
			<p>2023年2月11日（土）〜　<br class="spBreak">モデルルーム見学会スタート<span class="spHidden">／</span> <br class="spBreak">会場：知立市山屋敷町</p>
		</div>
		<div class="section__concept" id="concept">
			<div class="section__concept__wrap">
				<h2 class="fadeUp">設計士が住みたいと思う家が<br>知立に建ちました。</h2>
				<p class="fadeUp">家づくりの経験から、<br class="spBreak">「こんな家を建ててみたい」と<br>日ごろから考えていたアイデアや思いをカタチにした、<br class="spBreak">Lagomオリジナルの規格住宅です。<br>「設計」「デザイン」「性能」「自然素材」が<br class="spBreak">すべて揃った居心地の良い空間を堪能ください。</p>
				<div class="section__concept__container">
					<div class="section__concept__box">
						<div class="photo fadeUp"><img src="<?php bloginfo('template_url'); ?>/image/top/top_concept_img_01_pc.png" alt=""></div>
						<div class="txtBox fadeUp">
							<p>それは多すぎず、少なすぎず、ちょうど良い。<br>バランスよく毎日の暮らしを心地よく過ごす。<br>導線が整った住みやすい環境、<br>家族がゆったりと暮らすことのできる家です。</p>
						</div>
					</div>
					<div class="section__concept__box">
						<div class="photo fadeUp"><img src="<?php bloginfo('template_url'); ?>/image/top/top_concept_img_02_pc.png" alt=""></div>
						<div class="txtBox fadeUp">
							<p>デザイン性の高い規格住宅。<br>自由設計でもなく、建売でもない、<br>ちょうど良いプランオーダー住宅<br>そんな思いから「Lagom」は生まれました。</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="section__event" id="event">
			<div class="section__event__wrap">
				<div class="section__event__container">
					<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_event_img.png" alt=""></div>
					<div class="section__event__titleContainer">
						<div class="section__event__title">
							<h2>イベント情報</h2>
						</div>
					</div>
					<div class="txtBox">
						<div class="ttlBox fadeUp">
							<p>OPEN HOUSE</p>
							<h3>完成見学会</h3>
						</div>
						<div class="txt fadeUp">
							<p>愛知県<br>知立市屋敷町</p>
						</div>
						<div class="infoBox fadeUp">
							<dl>
								<dt>DATE</dt>
								<dd><?php echo html_entity_decode(get_field('tour_date',56));?></dd>
							</dl>
							<dl class="place">
								<dt>PLACE</dt>
								<dd>
									<p><?php echo html_entity_decode(get_field('tour_place',56));?></p><a href="<?php echo html_entity_decode(get_field('tour_place_url',56));?>" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/top/top_event_pin.png" alt=""></a>
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
					</div>
				</div>
				<div class="section__event__map">
					<div class="mapBox"><iframe src="<?php echo html_entity_decode(get_field('tour_map',56));?>" allow="fullscreen"></iframe></div>
					<p>スマホのMAPアプリで住所を検索をくだくとスムーズに来場いただけます。<br>近くなりましたらお電話いただければご案内いたします。</p>
				</div>
			</div>
		</div>
		<div class="section__news" id="news">
			<div class="section__news__wrap">
				<div class="section__header_title fadeUp">
					<p>NEWS&amp;EVENT</p>
					<h2>ニュース＆イベント</h2>
				</div>
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
								<div class="photoBox">
									<div class="photo"><?php the_post_thumbnail('full'); ?></div>
								</div>
								<div class="txtBox">
									<div class="info">
										<div class="time">
											<p><?php the_time("Y.m.d") ?></p>
										</div>
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
				<div class="section__news__btn fadeUp"><a href="<?php echo home_url(); ?>/eventlist">イベント一覧</a></div>
			</div>
		</div>
		<div class="bnr__entry fadeUp">
			<div class="photoBox">
				<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_bnr_entry_img_pc.png" alt=""></div>
			</div>
			<div class="txtBox">
				<div class="inner">
					<div class="logo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_bnr_entry_logo.png" alt=""></div>
					<dl>
						<dt>イベント・内覧会の予約はこちら</dt>
						<dd>内覧会は水曜日を除く10：00〜17：00に常時行っております。<br>完全ご予約のため、ゆったりとLagomの家を見ていただけます。</dd>
					</dl>
					<div class="btn"><a href="#contact">CLICK</a></div>
				</div>
			</div>
		</div>
		<div class="section__point" id="point">
			<div class="section__point__top">
				<div class="section__point__wrap">
					<div class="section__header_title fadeUp">
						<p>Lagom’s Point</p>
						<h2>ラーゴムのポイント</h2>
					</div>
					<div class="txt01 fadeUp">
						<p>多すぎず、少なすぎず<br>ちょうどいいってこういうことなんだ。</p>
					</div>
					<div class="mv fadeUp"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_mv.png" alt=""></div>
					<div class="txt02 fadeUp">
						<p>Lagomの家を体感してみませんか？<br>こだわりの空間が家族を包み込みます。</p>
					</div>
				</div>
			</div>
			<div class="section__point__list list01">
				<div class="section__point__wrap">
					<ol>
						<li class="fadeUp">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_list_01.png" alt=""></div>
							<div class="txtBox">
								<dl>
									<dt><span>Point 01</span><em>整いやすいから</em></dt>
									<dd>忙しくて家がごちゃごちゃ…なんてことはない、Lagom。<br>整えやすい設計に加え、標準装備の食洗機や防汚性に優れた浴室など<br>調和の取れたデザイン・仕様・家具のおかげできれいに見えます。<br>ちょっと散らかっていても様になる…そこも魅力です。</dd>
								</dl>
							</div>
						</li>
						<li class="fadeUp">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_list_02.png" alt=""></div>
							<div class="txtBox">
								<dl>
									<dt><span>Point 02</span><em>居心地の良さを支える素材</em></dt>
									<dd>気づけばいつも体のどこかが素材に触れている…<br>住まいの居心地の良さを支えているのは、素材。<br>無垢材やこだわりの素材を使用しているため、<br>経年変化による表情が楽しめ、馴染みやすく愛着が湧いてくるのが魅力です。</dd>
								</dl>
							</div>
						</li>
						<li class="fadeUp">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_list_03.png" alt=""></div>
							<div class="txtBox">
								<dl>
									<dt><span>Point 03</span><em>ゲストも落ち着く空間</em></dt>
									<dd>素敵な家には、人が集まります。そんな集まりのおもてなしは、食事です。<br>アイランドまたはペニンシュラのキッチンなら、<br>料理がしたくなり振る舞いたくなる。リビングが見渡せる。<br>子どもたちを見届けたくなる。もう一品つくりたくなる場所です。</dd>
								</dl>
							</div>
						</li>
						<li class="fadeUp">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_list_04.png" alt=""></div>
							<div class="txtBox">
								<dl>
									<dt><span>Point 04</span><em>光や風と暮らす家</em></dt>
									<dd>住まいは、穏やかで落ち着いた空間が理想だと考え、自然との調和を大切に。<br>普遍的で良質な素材をベースにサンルームや吹き抜け、窓の位置で<br>光や風を取り入れ、自然を最大限に活用しています。<br>季節を感じながらずっと使い続けていきたい、Lagomの住まい。</dd>
								</dl>
							</div>
						</li>
					</ol>
				</div>
			</div>
			<div class="section__point__panel">
				<div class="txtBox">
					<div class="ttl fadeUp">
						<p>守りたいのは<br>家族の暮らし。</p>
					</div>
				</div>
				<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_point_panel_img_pc.png" alt=""></div>
			</div>
			<div class="section__point__list list02">
				<div class="section__point__wrap">
					<ol>
						<li class="fadeUp">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_list_05.png" alt=""></div>
							<div class="txtBox">
								<dl>
									<dt><span>Point 05</span><em>安心の耐震構造</em></dt>
									<dd>土地に合った調査と解析により強固な地盤と基礎を作る建物の一体設計により、耐震基準をクリアしています。</dd>
								</dl>
							</div>
						</li>
						<li class="fadeUp">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_list_06.png" alt=""></div>
							<div class="txtBox">
								<dl>
									<dt><span>Point 06</span><em>お財布にやさしい省エネ</em></dt>
									<dd>国の設定する断熱基準をしっかりとクリア。とことん突き詰めた偏った<br class="pcBreak">性能でなく、バランスを考えています。</dd>
								</dl>
							</div>
						</li>
						<li class="fadeUp">
							<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_list_07.png" alt=""></div>
							<div class="txtBox">
								<dl>
									<dt><span>Point 07</span><em>確かな技術</em></dt>
									<dd>仕事に誇りとプライドを持った職人を揃えています。<br>高い技術に裏打ちされた経験を存分に家づくりに反映しています。</dd>
								</dl>
							</div>
						</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="section__story" id="story">
			<div class="section__story__top">
				<div class="section__story__wrap fadeUp">
					<h2>Story of Lagom</h2>
					<p>素敵な理想〈デザイン性〉と<br class="spBreak">暮らしの現実〈生活・家事動線〉<br>どちらも兼ね備えた住まいを探している人に向けた<br>ちょうど良い規格住宅をつくりたい。<br>多すぎず少なすぎず。すっと、ずっと。それが「Lagom」。</p>
				</div>
			</div>
			<div class="section__story__container">
				<div class="section__story__mv">
					<div class="nameBox">
						<div class="box fadeUp">
							<dl>
								<dt>Produce</dt>
								<dd>Marukyo</dd>
							</dl>
							<div class="iconBox">
								<div class="icon"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_story_cross_pc.png" alt=""></div>
							</div>
							<dl>
								<dt>Design</dt>
								<dd>YLANG YLANG</dd>
							</dl>
						</div>
					</div>
				</div>
				<div class="section__story__list fadeUp">
					<div class="section__story__wrap">
						<ul>
							<li>
								<dl>
									<dt>株式会社 丸協</dt>
									<dd>木と響きあっておよそ70年、製材会社として1951年に創業した私たち丸協。木の良さを知り抜き、木の良さにこだわった家づくりを行う住宅会社として多くのお客様の住まいに携わってきています。現在では、保育園や高齢者住宅も手掛け、大型施設も建築しています。幅広い年齢層に提供してきた2,000棟以上の施工実績が、誇りです。私たち丸協を形成する腕の良い職人、家づくりが好きな人材、家づくりを行う座組、それらがそのまま質の高い住まいへつながっていると信じています。</dd>
								</dl>
							</li>
							<li>
								<dl>
									<dt>イランイラン</dt>
									<dd>YLANG YLANGは、東海地方を中心に住宅設計・店舗設計を行っている設計デザイン事務所です。単に形を造るのではなく、「それを使う人であったり、時間の空気やシーンであったりをイメージして創造していく」がコンセプト。見た目だけの華美な装飾よりも、ずっと寄り添っていられるデザインを細部まで美しく、丁寧に落とし込むことを大切にしています。木のぬくもりや自然素材の持つ素材感、目に見えない存在感を活かした設計デザインに反映し、木の良さを感じていただきたいです。</dd>
								</dl>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="bnr__entry fadeUp">
			<div class="photoBox">
				<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_bnr_entry_img_pc.png" alt=""></div>
			</div>
			<div class="txtBox">
				<div class="inner">
					<div class="logo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_bnr_entry_logo.png" alt=""></div>
					<dl>
						<dt>イベント・内覧会の予約はこちら</dt>
						<dd>内覧会は水曜日を除く10：00〜17：00に常時行っております。<br>完全ご予約のため、ゆったりとLagomの家を見ていただけます。</dd>
					</dl>
					<div class="btn"><a href="#contact">CLICK</a></div>
				</div>
			</div>
		</div>
		<div class="section__faq" id="faq">
			<div class="section__faq__wrap">
				<div class="section__header_title fadeUp">
					<p>FAQ</p>
					<h2>よくある質問</h2>
				</div>
				<div class="section__faq__box fadeUp">
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
		<div class="section__flow" id="flow">
			<div class="section__flow__wrap">
				<div class="section__header_title fadeUp">
					<p>Flow</p>
					<h2>家が建つまで</h2>
				</div>
				<div class="section__flow__list">
					<ol>
						<li class="fadeUp">
							<dl>
								<dt><span>01</span><em>お問い合わせ</em></dt>
								<dd>
									<p>まずはお気軽にお問い合わせください。こちらのパンフレットやWebにて知っていただき、ありがとうございます。Lagomをもっともっと知っていただきたいです。</p>
								</dd>
							</dl>
						</li>
						<li class="fadeUp">
							<dl>
								<dt><span>02</span><em>ご来場</em></dt>
								<dd>
									<p>Lagomの世界観や示したい暮らし方・過ごし方を表現したモデルハウスへお越しください。<br>規格住宅の良さとLagomが提案する間と余白を感じてください。</p>
								</dd>
							</dl>
						</li>
						<li class="fadeUp">
							<dl>
								<dt><span>03</span><em>資金計画・ご相談</em></dt>
								<dd>
									<p>土地と建物と予算のバランスをしっかりと見定め、無理のない資金計画と人生設計に合ったプランが大切です。ローンのご相談やシミュレーションもおまかせください。</p>
								</dd>
							</dl>
						</li>
						<li class="fadeUp">
							<dl>
								<dt><span>04</span><em>土地探し</em></dt>
								<dd>
									<p>土地をご用意してからでも、土地探しをおまかせいただいても構いません。いずれにしても、立地・環境・価格・条件を整理して、先々を見据えることが大切です。</p>
								</dd>
							</dl>
						</li>
						<li class="fadeUp">
							<dl>
								<dt><span>05</span><em>プラン提案</em></dt>
								<dd>
									<p>Lagomは規格住宅です。思い通りの設計を行う注文住宅や決まりきった建売とは異なり、コンセプトに沿ったプランを選択していただき、理想の家を絞っていきます。</p>
								</dd>
							</dl>
						</li>
						<li class="fadeUp">
							<dl>
								<dt><span>06</span><em>ご契約</em></dt>
								<dd>
									<p>しっかりとヒアリングを行い、お客様の希望するプランを担当者がご提案いたします。必要な場合は調整や要望の反映を行った後、ご納得の上、契約を締結いたします。</p>
								</dd>
							</dl>
						</li>
						<li class="fadeUp">
							<dl>
								<dt><span>07</span><em>工事開始</em></dt>
								<dd>
									<p>地盤・基礎・建物の一体設計をしっかりと行い、近隣挨拶・地鎮祭・基礎…と家づくりがスタートしていきます。計画に基づいた工事工程に沿って作業を進めていきます。</p>
								</dd>
							</dl>
						</li>
						<li class="fadeUp">
							<dl>
								<dt><span>08</span><em>お引き渡し</em></dt>
								<dd>
									<p>いよいよお引渡しです。工事保証書の発行・メンテナンス・定期点検などのご案内をさせていただきます。何かお気づきのことがございましたら、いつでもお気軽にご相談ください。</p>
								</dd>
							</dl>
						</li>
					</ol>
				</div>
			</div>
		</div>
		<div class="section__contact" id="contact">
			<div class="section__contact__wrap">
				<div class="section__contact__top">
					<div class="section__header_title fadeUp">
						<p>Contact</p>
						<h2>お問い合わせ</h2>
					</div>
					<div class="section__contact__top__box">
						<dl class="line">
							<dt>公式LINEでのお問い合わせ</dt>
							<dd>
								<p>お友達追加をしていただくと見学会予約や<br class="spBreak">イベント情報などがご覧になれます。</p>
								<div class="btn line"><a href="https://lin.ee/Ttwnr1l" target="_blank" rel="noopener"><span>公式LINE</span></a></div>
							</dd>
						</dl>
						<dl class="tel">
							<dt>お電話でのお問い合わせ</dt>
							<dd>
								<p>お電話でのお問い合わせをご希望の方は、<br class="spBreak">こちらからご連絡ください。</p>
								<div class="btn tel"><a href="tel:0522287770"><span>052-228-7770</span></a></div>
							</dd>
						</dl>
						<dl>
							<dt>メールでのお問い合わせ</dt>
							<dd>
								<p>完成住宅見学会に是非お越しください。<br>見学会の参加希望、お問合せ、ご質問などは<br class="spBreak">下記コンタクトフォームよりお問い合わせください。<br>担当者より折り返しご連絡させていただきます。</p>
							</dd>
						</dl>
					</div>
					<div class="section__contact__top__photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_contact_top_img.png" alt=""></div>
				</div>
				<div class="formBox">
					<?php echo do_shortcode('[mwform_formkey key="26"]'); ?>
				</div>
			</div>
		</div>
		<div class="section__company" id="company">
			<div class="section__company__wrap">
				<div class="section__header_title fadeUp">
					<p>Company</p>
					<h2>会社概要</h2>
				</div>
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
							<p>住宅建設工事 建設業者登録番号 愛知県知事許可（特-28）第1689号<br>不動産売買及び仲介 宅地建物取引業登録番号 愛知県知事（11）第10837号<br>住宅資材販売 木材業者登録番号 木第6117号</p>
						</dd>
					</dl>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>