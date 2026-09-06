<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main id="top">
		<div class="topKvContainer">
			<div class="topKvPanel">
				<div class="topKv"></div>
				<div class="kvTitleBox fadeUp">
					<div class="kvTitleBox__inner">
						<p>白髪へのアプローチの新常識。</p>
						<h1><span>自分の髪を活かした</span><em><span>”ミッドグレース”を提案するサロン</span></em></h1>
						<p>白髪は隠すもの。そんなことはありません。</p>
					</div>
				</div>
			</div>
			<div class="topSubKvPanel">
				<div class="topSubKv"></div>
			</div>
			<div class="topTitlePanel">
				<div class="kvLogo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_kv_logo.png" alt="SantaFe"></div>
				<div class="itemBox">
					<!--アカウントできるまで一旦非表示<div class="instagram"><a href="https://www.instagram.com/iwa.hikaru.www/" target="_blank" rel="noopener noreferrer"><img src="<?php bloginfo('template_url'); ?>/image/top/top_kv_insta.png" alt=""></a></div>-->
					<dl>
						<dt>NEW OPEN<br>岐阜柳津店</dt>
						<dd>2023.09.30</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="section__concept">
			<div class="photoPanel">
				<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_concept_img_01.png" alt=""></div>
				<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_concept_img_02.png" alt=""></div>
				<div class="ttl">
					<p>Concept</p>
				</div>
			</div>
			<div class="secWrap01">
				<div class="secBox">
					<div class="title fadeUp"><img src="<?php bloginfo('template_url'); ?>/image/top/top_concept_title.png" alt=""></div>
					<div class="txt fadeUp">
						<p>白髪＝隠すもの、カバーするもの。<br>そんな常識や後ろ向きな考えはもう古い。</p>
						<p>もっと”自由”</p>
						<p>わたしの髪質で<br>わたしだけの色で<br>髪が”わたし”を解放させる、もっと自分を好きになる。</p>
						<p>自分をときめかせ、楽しませ、<br class="spBreak">幸せにできる力を髪は持っている。</p>
						<p>いつだって自分らしく<br>わたしのオシャレをもっと”自由”にしてくれる。</p>
						<p>さあ、明日はどこにお出かけしよう。</p>
					</div>
				</div>
			</div>
		</div>
		<div class="section__beforeAfter">
			<div class="secWrap01">
				<div class="section__title fadeUp">
					<p>BEFORE&amp;AFTER</p>
					<h2>施術後の様子</h2>
				</div>
				<div class="topTxt fadeUp">
					<div class="txt">
						<p>お客様に合わせたコンサルメニューで圧倒的な仕上がりを。</p>
					</div>
				</div>
				<div class="beforeAfterSlider">
					<?php
						$field = SCF::get('beforeAfter', 5);
						foreach ($field as $fields) {
							$image01 = wp_get_attachment_image_src($fields['beforeAfter_before'] , 'full');
							$image02 = wp_get_attachment_image_src($fields['beforeAfter_after'] , 'full');
					?>
					<div class="slider">
						<ul>
							<li>
								<p>Before</p>
								<div class="photo"><img src="<?php echo $image01[0]; ?>" alt=""></div>
							</li>
							<li>
								<p>After</p>
								<div class="photo"><img src="<?php echo $image02[0]; ?>" alt=""></div>
							</li>
						</ul>
						<p><?php echo $fields['beforeAfter_title']; ?></p>
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
		<div class="section__thoughts">
			<div class="mv"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_thoughts_mv_pc.png" alt=""></div>
			<div class="secPanel">
				<div class="secBox01 secBox">
					<dl>
						<dt class="fadeUp"><span>Do you have these thoughts?</span><em>こんな思いはありませんか？</em></dt>
						<dd class="fadeUp">
							<ul>
								<li>全体的に白髪が増えた</li>
								<li>生え際がすぐ白くなる</li>
							</ul>
							<ul>
								<li>髪の毛がゴワゴワする</li>
								<li>白髪染めで髪色がくすむ</li>
							</ul>
						</dd>
					</dl>
					<div class="photoBox">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_thoughts_img_01.png" alt=""></div>
					</div>
				</div>
				<div class="secBox02 secBox">
					<div class="photoBox">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_thoughts_img_02.png" alt=""></div>
					</div>
					<dl>
						<dt class="fadeUp"><span>頻繁に自分で染めるのは大変だし、<br class="spBreak">髪への負担も気になる・・・</span><em>従来の白髪への<br>アプローチは”隠すもの”</em></dt>
						<dd class="fadeUp">
							<ul>
								<li>暗い色しかない白髪染め</li>
								<li>髪色がすんでいく</li>
							</ul>
							<ul>
								<li>月に何度も染めるヘアマニキュア</li>
								<li>赤みが強くなるヘナ</li>
							</ul>
						</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="section__point">
			<div class="section__point__title">
				<p class="fadeUp">新常識</p>
				<h2 class="fadeUp"><em><span>”ミッドグレース”なら</span></em><em><span>透明感や艶のある髪へ。</span></em></h2>
			</div>
			<div class="section__point__container">
				<div class="section__point__panel section__point__panel--01">
					<div class="secWrap01">
						<div class="photoBox01 photoBox">
							<p class="fadeUp">POINT.01</p>
							<div class="photo spBreak"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_img_01_sp.png" alt=""></div>
						</div>
						<dl class="fadeUp">
							<dt>好きな髪色にできる</dt>
							<dd>
								<div class="txt">
									<p>黒色や焦茶色の色味だけではなく、白髪と黒髪の配合に合わせたベース作りをすることで、好きな色を入れることができます。</p>
								</div>
							</dd>
						</dl>
					</div>
				</div>
				<div class="section__point__panel section__point__panel--02">
					<div class="secWrap01">
						<div class="photoBox02 photoBox">
							<p class="fadeUp">POINT.02</p>
							<div class="photo spBreak"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_img_02_sp.png" alt=""></div>
						</div>
						<dl class="fadeUp">
							<dt>髪に透明感が出る</dt>
							<dd>
								<div class="txt">
									<p>暗い色を入れるだけの白髪染めと違い、白髪の度合いや髪質に合わせたカラーと髪質改善で、艶と透明感を生み出します。</p>
								</div>
							</dd>
						</dl>
					</div>
				</div>
				<div class="section__point__panel section__point__panel--03">
					<div class="secWrap01">
						<div class="photoBox03 photoBox">
							<p class="fadeUp">POINT.03</p>
							<div class="photo spBreak"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_img_03_sp.png" alt=""></div>
						</div>
						<dl class="fadeUp">
							<dt>頭皮への負担が少ない</dt>
							<dd>
								<div class="txt">
									<p>サンタフェオリジナルのカラー剤や、限りなく優しいブリーチ剤を使用することで、髪や頭皮へのダメージを減らします。</p>
								</div>
							</dd>
						</dl>
					</div>
				</div>
				<div class="section__point__panel section__point__panel--04">
					<div class="secWrap01">
						<div class="photoBox04 photoBox">
							<p class="fadeUp">POINT.04</p>
							<div class="photo spBreak"><img src="<?php bloginfo('template_url'); ?>/image/top/top_point_img_04_sp.png" alt=""></div>
						</div>
						<dl class="fadeUp">
							<dt>生え際が馴染む</dt>
							<dd>
								<div class="txt">
									<p>白髪をできるだけ活かしながらブリーチすることで、新しく生えてきた白髪と染めた髪の毛の境目を馴染ませます。</p>
								</div>
							</dd>
						</dl>
					</div>
				</div>
			</div>
		</div>
		<div class="section__about">
			<div class="secWrap01">
				<div class="section__title fadeUp">
					<p>ABOUT</p>
					<h2>ミッドグレースとは？</h2>
				</div>
				<div class="introPanel">
					<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_about_intro_img.png" alt=""></div>
					<div class="txtBox">
						<p class="fadeUp">New common sense</p>
						<h3 class="fadeUp">じぶんの髪を、今よりもっと好きになる。<br>大人女子のための新しいスタイル<br>「MidGlace - ミッドグレース - 」</h3>
						<div class="txt fadeUp">
							<p>＜Mid Grace＞は、<br>ミドル世代（Middle）を優雅（Grace）に彩る<br class="spBreak">新しいスタイル。</p>
							<p>サンタフェでは白髪を黒く染めてしまうのではなく、活かしながら、<br>今をいちばん輝かせるスタイルをご提案しています。</p>
							<p>＜Mid Grace＞に必要なのは、３つの美。<br>ヘアカラーによって表現する「色彩美」<br>髪質改善によって取り戻す髪本来の「素材美」<br>そして、カットによってつくる<br class="spBreak">シルエットやスタイルの「造形美」</p>
							<p>お客さま一人ひとりの髪質や個性を活かしながら、<br>この３つの美を整え、髪が持つポテンシャルを極限まで引き出します。<br>＜Mid Grace＞ならきっと、<br>すべてのお客さまがじぶんの髪をもっと好きになれるはずです。</p>
						</div>
					</div>
				</div>
				<div class="stepPanel">
					<div class="photoContainer">
						<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_about_step_img.png" alt=""></div>
					</div>
					<div class="titleContainer">
						<h3 class="fadeUp">白髪染めを使わない白髪染め<br>”ミッドグレース”を提案するサロン</h3>
						<p class="fadeUp">綺麗なヘアになるまで３ステップ</p>
					</div>
					<div class="stepContainer">
						<div class="stepList">
							<ol>
								<li>
									<div class="num01 num">
										<p>01</p>
									</div>
									<dl>
										<dt><em>カウンセリング</em><span>（初回30分）</span></dt>
										<dd>
											<div class="txt">
												<p>ライフスタイルや美容院に通える周期、現状の髪や頭皮の状態、白髪の度合い、髪の履歴などを丁寧に伺い、お客様のなりたいヘアスタイル、髪への負担が少ないメニュー提案をいたします。</p>
											</div>
										</dd>
									</dl>
									<div class="progress0 progress">
										<p>START</p>
									</div>
								</li>
								<li>
									<div class="num02 num">
										<p>02</p>
									</div>
									<dl>
										<dt><em>ベース作り</em><span>施術1〜2回（2時間）</span></dt>
										<dd>
											<div class="txt">
												<p>初めは月１回のペースで1〜2回お越しいただいています。白髪の度合いによって行う施術が変わります。白髪染めをしていた方は色を落とすために、ブリーチやダブルカラーでの脱染を行いベースを作ります。必ずお客様の髪質を見ながらカラーやブリーチを行い、できる限り髪に優しいオリジナル配合の施術を行なっていきますのでご安心ください。</p>
											</div>
										</dd>
									</dl>
									<div class="progress1 progress">
										<p>1ヶ月目</p>
									</div>
									<div class="progress2 progress">
										<p>2ヶ月目</p>
									</div>
								</li>
								<li>
									<div class="num03 num">
										<p>03</p>
									</div>
									<dl>
										<dt><em>好きなカラーへ</em><span>施術1〜2回（2時間）</span></dt>
										<dd>
											<div class="txt">
												<p>ベースができれば２〜3ヶ月に１回の施術になります。今後どのようなカラーを楽しみ、髪質改善をするのか一緒に考えながらあなたの髪を育てていきます。</p>
											</div>
										</dd>
									</dl>
									<div class="progress3 progress">
										<p>3ヶ月目〜</p>
									</div>
								</li>
							</ol>
						</div>
						<div class="stepProgress"><img src="<?php bloginfo('template_url'); ?>/image/top/top_about_step_progress.png" alt=""></div>
					</div>
				</div>
			</div>
		</div>
		<div class="section__best">
			<div class="titleBox">
				<h2 class="fadeUp">ご来店時にお客様のお悩みはもちろん<br>“なりたい理想”をお伺いしています。</h2>
				<p class="fadeUp">なりたい自分をイメージしてみてください。<br>その先に見えるものは何ですか？</p>
			</div>
			<div class="photoListPanel">
				<div class="photoTitle">
					<div class="title fadeUp"><img src="<?php bloginfo('template_url'); ?>/image/top/top_best_title.png" alt=""></div>
				</div>
				<div class="photoList">
					<div class="list"><img src="<?php bloginfo('template_url'); ?>/image/top/top_best_photo_left_pc.png" alt=""></div>
					<div class="list center"><img src="<?php bloginfo('template_url'); ?>/image/top/top_best_photo_center.png" alt=""></div>
					<div class="list"><img src="<?php bloginfo('template_url'); ?>/image/top/top_best_photo_right_pc.png" alt=""></div>
				</div>
				<div class="listImg"><img src="<?php bloginfo('template_url'); ?>/image/top/top_best_photo_list.png" alt=""></div>
			</div>
			<div class="checkContainer">
				<div class="checkTxt">
					<dl class="fadeUp">
						<dt>サンタフェは<br>あなたの”なりたい”を叶えます。</dt>
						<dd>なりたい自分をイメージしてみてください。<br>その先に見えるものは何ですか？</dd>
					</dl>
				</div>
				<div class="checkPanel">
					<dl>
						<dt class="fadeUp">サンタフェはあなたの”なりたい”を叶えます。</dt>
						<dd class="fadeUp">
							<ul>
								<li>ファッションやメイクを楽しむ</li>
								<li>後ろ姿から美しい</li>
								<li>自信を持つ</li>
							</ul>
							<ul>
								<li>堂々と笑顔でいられる</li>
								<li>若々しくいる</li>
								<li>写真に写りたくなる</li>
							</ul>
						</dd>
					</dl>
				</div>
			</div>
		</div>
		<div class="section__mv">
			<div class="secWrap">
				<div class="section__mv__title fadeUp"><img src="<?php bloginfo('template_url'); ?>/image/top/top_sec_mv_title.png" alt=""></div>
			</div>
		</div>
		<div class="section__menu">
			<div class="secWrap">
				<div class="section__menu__container">
					<div class="section__title fadeUp">
						<p>MENU</p>
						<h2>メニュー</h2>
					</div>
					<div class="topTxt">
						<div class="txt fadeUp">
							<p>ご来店時にお客様の“なりたい理想の髪”や悩みや<br class="spBreak">ライフスタイルを伺い<br>丁寧にカウンセリングいたします。<br>髪質によって色の入りやすさや<br class="spBreak">抜きやすさが異なります。</p>
							<p>サンタフェでは様々なメニューから<br>”あなたらしさ”を活かすご提案いたします。</p>
						</div>
					</div>
					<div class="menuSlider">
						<?php
							$field = SCF::get('menu', 11);
							$i = 1;
							foreach ($field as $fields) {
								$image = wp_get_attachment_image_src($fields['menu_image'] , 'full');
						?>
						<div class="slider">
							<div class="slider__inner">
								<div class="photo"><img src="<?php echo $image[0]; ?>" alt=""></div>
								<div class="txtBox">
									<div class="num">
										<p><?php echo sprintf('%02d', $i); ?></p>
									</div>
									<dl>
										<dt><?php echo $fields['menu_title']; ?></dt>
										<dd>
											<div class="txt">
												<?php echo nl2br($fields['menu_text']); ?>
											</div>
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<?php $i++; } ?>
					</div>
				</div>
			</div>
		</div>
		<div class="section__guarantee">
			<div class="secWrap02">
				<div class="section__guarantee__container">
					<div class="txtBox">
						<div class="section__guarantee__title fadeUp">
							<p>Technical guarantee</p>
							<h2><em><span>安心の技術保障</span></em><em><span>お直し2週間以内無料</span></em></h2>
						</div>
						<div class="txt fadeUp">
							<p>お客様に安心して通い続けて頂く為に２週間の技術保証を行なっております。</p>
						</div>
						<div class="checkArea fadeUp">
							<ul>
								<li>もう少し切りたい</li>
								<li>カラーが早く色落ちした</li>
							</ul>
						</div>
						<div class="txt fadeUp">
							<p>等を無料にてお直しさせて頂きます、遠慮なくご相談くださいませ。</p>
						</div>
					</div>
					<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/top/top_guarantee_img_pc.png" alt=""></div>
				</div>
			</div>
		</div>
		<div class="section__instagram">
			<div class="secWrap01">
				<div class="section__title fadeUp">
					<p>INSTAGRAM</p>
					<h2>インスタグラム</h2>
				</div>
				<?php
					$field = SCF::get('instagram', 24);
					foreach ($field as $fields) {
					$image = wp_get_attachment_image_src($fields['instagram_image'] , 'full');
				?>
					<div class="instagramFeedPanel">
						<div class="instaHeader">
							<a href="<?php echo $fields['instagram_url']; ?>" target="_blank" rel="noopener">
								<div class="img"><img src="<?php echo $image[0]; ?>" alt=""></div>
								<p><?php echo $fields['instagram_user']; ?></p>
							</a>
						</div>
						<?php echo do_shortcode( $fields['instagram_feed'] ); ?>
					</div>
				<?php  } ?>
			</div>
		</div>
		<div class="section__faq">
			<div class="photoBox01 photoBox">
				<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_faq_img_01_pc.png" alt=""></div>
			</div>
			<div class="sectionContainer">
				<div class="secWrap">
					<div class="secPanel">
						<div class="section__title fadeUp">
							<p>Q&amp;A</p>
							<h2>よくある質問</h2>
						</div>
						<div class="txtBox">
							<?php
								$field = SCF::get('faq', 20);
								foreach ($field as $fields) {
							?>
							<dl class="fadeUp">
								<dt><?php echo $fields['faq_title']; ?></dt>
								<dd><?php echo nl2br($fields['faq_text']); ?></dd>
							</dl>
							<?php  } ?>
						</div>
					</div>
				</div>
			</div>
			<div class="photoBox02 photoBox">
				<div class="photo"><img src="<?php bloginfo('template_url'); ?>/image/top/top_faq_img_02_pc.png" alt=""></div>
			</div>
		</div>
		<?php
			$field = SCF::get('shop', 22);
			$count = 0;
			foreach ($field as $fields) {
				$count++;
		?>
		<div class="section__info">
			<div class="secWrap">
				<div class="infoPanel">
					<?php if ($count == 1) { ?>
					<div class="section__title fadeUp">
						<p>SALON INFO</p>
						<h2>店舗情報</h2>
					</div>
					<?php } ?>
					<div class="infoBox fadeUp">
						<dl>
							<dt>サロン名</dt>
							<dd><?php echo $fields['shop_name']; ?>&nbsp;<?php echo $fields['shop_branch']; ?></dd>
						</dl>
						<dl>
							<dt>所在地</dt>
							<dd><?php echo nl2br($fields['shop_place']); ?></dd>
						</dl>
						<dl>
							<dt>アクセス</dt>
							<dd><?php echo nl2br($fields['shop_access']); ?></dd>
						</dl>
					</div>
					<div class="btnMapBox fadeUp">
						<div class="btnReserve"><a href="<?php echo $fields['shop_reserve']; ?>" target="_blank" rel="noopener">予約はこちら</a></div>
						<div class="btnMap"><a href="<?php echo $fields['shop_map_url']; ?>" target="_blank" rel="noopener"><span>Google map</span></a></div>
					</div>
				</div>
			</div>
			<div class="mapPanel">
				<div class="mapBox">
					<?php echo $fields['shop_map_iframe']; ?>
				</div>
				<div class="btnMapBox fadeUp">
					<div class="btnReserve"><a href="<?php echo $fields['shop_reserve']; ?>" target="_blank" rel="noopener">予約はこちら</a></div>
						<div class="btnMap"><a href="<?php echo $fields['shop_map_url']; ?>" target="_blank" rel="noopener"><span>Google map</span></a></div>
				</div>
			</div>
		</div>
		<?php  } ?>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>