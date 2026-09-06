<?php
/*
Template Name: wacca_recruit
*/
?>

<!DOCTYPE html>
<html lang="ja">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0">
	<meta name="format-detection" content="telephone=no">
	<meta name="description" content="名古屋、北区黒川にオープンする美容院wacca（ワッカ）は、ひとりひとりの髪質、ライフスタイルに寄り添いあなたの中に眠る“美しさ”に耳を傾けます。 接客術を丁寧に積み重ねお客様へ美しさを届ける。 そしてお客様の日常にお店が入ることで、 お店はスタッフに還元することができます。waccaはそんな思いを大切に“幸せの輪”を広げます。">
	<meta name="keywords" content="名古屋駅,名古屋,黒川,ヘアサロン,美容院,ワッカ,wacca,美容師,リクルート,求人">
	<!--OGP-->
	<meta property="og:title" content="美容を通じて広がる“幸せの輪”｜wacca" />
	<meta property="og:type" content="website" />
	<meta property="og:url" content="https://hair-eli.com/wacca_recruit/" />
	<meta property="og:image" content="<?php bloginfo('template_url'); ?>/wacca/ogp.png" />
	<meta property="og:site_name" content="美容を通じて広がる“幸せの輪”｜wacca" />
	<meta property="og:description" content=" 名古屋、北区黒川にオープンする美容院wacca（ワッカ）は、ひとりひとりの髪質、ライフスタイルに寄り添いあなたの中に眠る“美しさ”に耳を傾けます。 接客術を丁寧に積み重ねお客様へ美しさを届ける。 そしてお客様の日常にお店が入ることで、 お店はスタッフに還元することができます。waccaはそんな思いを大切に“幸せの輪”を広げます。" />
	<!-- css-->
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/wacca/css/reset.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/wacca/css/slick.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/wacca/css/slick-theme.css">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/wacca/css/common.css?202308022100">
	<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/wacca/css/layout.css?202308022100">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/wacca/css/common_sp.css?202308022100">
	<link rel="stylesheet" media="screen and (max-width: 1024px)" type="text/css" href="<?php bloginfo('template_url'); ?>/wacca/css/layout_sp.css?202308022100">
	<!-- js-->
	<script src="<?php bloginfo('template_url'); ?>/wacca/js/jquery-1.11.3.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/wacca/js/slick.min.js"></script>
	<script src="<?php bloginfo('template_url'); ?>/wacca/js/common.js?202307041300"></script>
	<!-- title-->
	<title><?php wp_title(''); ?></title>
	<?php wp_head(); ?>
</head>

<body>
	<!-- ▽header▽-->
	<header class="header">
		<div class="headBox">
			<div class="instagram"><a href="https://www.instagram.com/hair.wacca/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/wacca/image/common/header_insta.png" alt=""></a></div>
			<div class="logo"><a href="<?php echo home_url(); ?>/wacca_recruit/"><img src="<?php bloginfo('template_url'); ?>/wacca/image/common/header_logo.png" alt="wacca"></a></div>
			<div class="items">
				<div class="btnEntry"><a href="#section__entry">Entry</a></div>
				<div class="hamburgerBox">
					<div class="hamburger"><span></span><span></span><span></span></div>
				</div>
			</div>
		</div>
		<div class="subNavigationContainer">
			<div class="subNavigationContainer__wrap">
				<div class="subNavigation">
					<div class="menuPanel">
						<div class="subNavigation__title">
							<p>MENU</p>
						</div>
						<div class="subNavigation__list">
							<ol>
								<li><a href="#section__concept">コンセプト</a></li>
								<li><a href="#section__curriculum">カリキュラム</a></li>
								<li><a href="#section__work">働き方</a></li>
								<li><a href="#section__owner">オーナー挨拶</a></li>
								<li><a href="#section__flow">採用フロー</a></li>
								<li><a href="#section__job">募集要項</a></li>
								<li><a href="#section__salon">会社概要</a></li>
							</ol>
						</div>
						<div class="subNavigation__items">
							<dl>
								<dt>- LOOK ME</dt>
								<dd>
									<ul>
										<li><a href="https://beauty.hotpepper.jp/slnH000645376/" target="_blank" rel="noopener">＋ HOT PEPPER</a></li>
										<li><a href="https://www.instagram.com/hair.wacca/" target="_blank" rel="noopener">＋ INSTAGRAM</a></li>
									</ul>
								</dd>
							</dl>
						</div>
					</div>
					<div class="photoPanel">
						<ul>
							<li>
								<div class="photo">
									<?php
										$image = SCF::get('shop_photo');
										echo wp_get_attachment_image($image, 'full');
									?>
								</div>
							</li>
							<li>
								<div class="photo"><img src="<?php bloginfo('template_url'); ?>/wacca/image/common/header_nav_img_02_pc.png" alt=""></div>
							</li>
						</ul>
						<div class="infoBox">
							<div class="inner">
								<p><?php echo nl2br(SCF::get('shop_address')); ?></p>
								<dl>
									<dt>OPEN</dt>
									<dd><?php echo SCF::get('shop_open'); ?></dd>
								</dl>
								<dl>
									<dt>CLOSE</dt>
									<dd><?php echo SCF::get('shop_close'); ?></dd>
								</dl>
							</div>
						</div>
					</div>
				</div>
				<div class="imgSp"><img src="<?php bloginfo('template_url'); ?>/wacca/image/common/header_nav_img_bg_sp.png" alt=""></div>
			</div>
		</div>
	</header>
	<!-- △header△-->
	<!-- ▽メイン▽-->
	<main id="top">
		<div class="topKvPanel">
			<div class="kvWrap">
				<div class="slideImages">
					<div class="slideImages__container">
						<?php
							$field = SCF::get('top_slider');
							foreach ($field as $fields) {
								$imagePC = wp_get_attachment_image_src($fields['top_slider_pc'] , 'full');
								$imageSP = wp_get_attachment_image_src($fields['top_slider_sp'] , 'full');
						?>
						<div class="slideImages__image">
							<img class="slideImages__image--pc" src="<?php echo $imagePC[0]; ?>" alt="">
							<img class="slideImages__image--sp" src="<?php echo $imageSP[0]; ?>" alt="">
						</div>
						<?php } ?>
					</div>
				</div>
				<div class="kvFixed">
					<?php
						$image = SCF::get('top_fixed_imge');
						echo wp_get_attachment_image($image, 'full');
					?>
				</div>
				<div class="spKvTitle">
					<p>Seek beauty deeply.<br>To you in the future.</p>
				</div>
			</div>
			<div class="kvTitleBox">
				<h1>SEEK BEAUTY DEEPLY.<br>TO YOU IN THE FUTURE.</h1>
				<p>美しさを深く求める。これからのあなたへ。</p>
			</div>
			<div class="kvContainer">
				<div class="kvInsta"><a href="https://www.instagram.com/hair.wacca/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/wacca/image/common/header_insta.png" alt=""></a></div>
				<div class="kvScrollBox">
					<p>SCROLL TO DISCOVER</p><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/top_kv_scroll.png" alt="">
				</div>
				<div class="kvSub"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/top_kv_sub.png" alt=""></div>
			</div>
		</div>
		<div class="topNavigation">
			<ol>
				<li><a href="#section__concept">01｜コンセプト</a></li>
				<li><a href="#section__curriculum">02｜カリキュラム</a></li>
				<li><a href="#section__work">03｜働き方</a></li>
				<li><a href="#section__owner">04｜オーナー挨拶</a></li>
			</ol>
			<ol>
				<li><a href="#section__flow">05｜採用フロー</a></li>
				<li><a href="#section__job">06｜募集要項</a></li>
				<li><a href="#section__salon">07｜会社概要</a></li>
			</ol>
		</div>
		<div id="section__concept">
			<div class="secWrap01">
				<div class="secContainer">
					<div class="secBox">
						<div class="logo"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/concept_logo.png" alt=""></div>
						<div class="txtBox">
							<div class="secTitleBox">
								<p>Concept</p>
								<h2>美しさを深く求める。<br>これからのあなたへ。</h2>
							</div>
							<div class="txt">
								<p>時と共に変化するのは髪も同じ。<br>ひとりひとりの髪質、ライフスタイルに寄り添い<br>あなたの中に眠る“美しさ”に耳を傾けます。<br>あなたの「なりたい」に深く向き合い<br>ダメージを受けない美しい髪へ。</p>
								<p>“これからの私”と出会う場所。<br>それがwaccaです。</p>
							</div>
						</div>
					</div>
					<div class="photo photo--pc">
						<?php
							$image = SCF::get('concept_imgae_pc');
							echo wp_get_attachment_image($image, 'full');
						?>
					</div>
					<div class="photo photo--sp">
						<?php
							$image = SCF::get('concept_imgae_sp');
							echo wp_get_attachment_image($image, 'full');
						?>
					</div>
				</div>
			</div>
		</div>
		<div id="section__message">
			<div class="secWrap01">
				<div class="secBox">
					<div class="photo">
						<div class="img"><img class="switch" src="<?php bloginfo('template_url'); ?>/wacca/image/top/message_img_pc.png" alt=""></div>
					</div>
					<div class="txtBox">
						<div class="secTitleBox">
							<p>Message</p>
							<h2>美容を通じて広がる“幸せの輪”</h2>
						</div>
						<div class="txt">
							<p>“スタッフ” “お客様” “お店” この三つは<br>“幸せの輪”の循環に欠けてはならないものとwaccaは考えます。<br>ひとつひとつの接客術丁寧に積み重ねお客様へ美しさを届ける。<br>そしてお客様の日常にお店が入ることで、<br>お店はスタッフに還元することができます。<br>ひとりひとりが年輪のように輪が積み重なり広がりつづけること<br>今後の美容業界の中心となるひとが育つ環境をつくること。<br>waccaはそんな思いを大切に“幸せの輪”を広げます。</p>
						</div>
						<div class="chart"><img class="switch" src="<?php bloginfo('template_url'); ?>/wacca/image/top/message_chart_pc.png" alt=""></div>
					</div>
				</div>
			</div>
		</div>
		<div id="section__curriculum">
			<div class="topContainer">
				<div class="topContainer__inner">
					<div class="secWrap01">
						<div class="secTitleBox">
							<p>curriculum</p>
							<h2>カリキュラム</h2>
						</div>
						<div class="secBox">
							<div class="chart"><img class="switch" src="<?php bloginfo('template_url'); ?>/wacca/image/top/curriculum_top_chart_pc.png" alt=""></div>
							<div class="txtBox">
								<h3>楽しく広がる“成長の輪”</h3>
								<div class="txt">
									<p>waccaでは2~3年でスタイリストデビューを目指します。<br class="pcBreak">一通り全て学び得意なことから苦手なことまでの基礎を整えていけるカリキュラムとなっています。各項目毎に2段階に分けて技術テストを行うことで技術のレベルを高め、早い段階から自信を持ってお客様と接することができます。</p>
								</div>
								<div class="stepBox">
									<dl>
										<dt><em>First</em><span>基礎演習</span></dt>
										<dd>
											<p>各項目を学び練習を重ね、基礎をしっかりと整えて、<br class="pcBreak">営業時間内にウィッグで反復練習</p>
										</dd>
									</dl>
									<dl>
										<dt><em>Second</em><span>基礎+応用</span></dt>
										<dd>
											<p>入客テストを受け合格ができれば、<br class="pcBreak">実際にスタイリストのアシスタントとして入客</p>
										</dd>
									</dl>
									<dl>
										<dt><em>Third</em><span>基礎+応用＋強み</span></dt>
										<dd>
											<p>技術を高めて最終のテストに合格ができれば、<br class="pcBreak">その項目の施術をひとりで入客</p>
										</dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="curriculumPanel">
							<div class="curriculumTable">
								<table>
									<thead>
										<tr>
											<th>&nbsp;</th>
											<th>１年目</th>
											<th>２年目</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<th>
												<div class="num">
													<p>4</p>
												</div>
												<div class="month">
													<p><span>月</span><em>April</em></p>
												</div>
											</th>
											<td>カラー</td>
											<td>ロングカット</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>5</p>
												</div>
												<div class="month">
													<p><span>月</span><em>May</em></p>
												</div>
											</th>
											<td>シャンプー</td>
											<td>ロングカットモデル</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>6</p>
												</div>
												<div class="month">
													<p><span>月</span><em>June</em></p>
												</div>
											</th>
											<td>ハンドブロー</td>
											<td>ミディアムカット</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>7</p>
												</div>
												<div class="month">
													<p><span>月</span><em>July</em></p>
												</div>
											</th>
											<td>ヘッドスパ</td>
											<td>ミディアムカットモデル</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>8</p>
												</div>
												<div class="month">
													<p><span>月</span><em>August</em></p>
												</div>
											</th>
											<td>&nbsp;</td>
											<td>ボブカット</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>9</p>
												</div>
												<div class="month">
													<p><span>月</span><em>September</em></p>
												</div>
											</th>
											<td>カラー</td>
											<td>ボブカットモデル</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>10</p>
												</div>
												<div class="month">
													<p><span>月</span><em>October</em></p>
												</div>
											</th>
											<td>ストレート</td>
											<td>ショートカット</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>11</p>
												</div>
												<div class="month">
													<p><span>月</span><em>November</em></p>
												</div>
											</th>
											<td>&nbsp;</td>
											<td>ショートカットモデル</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>12</p>
												</div>
												<div class="month">
													<p><span>月</span><em>December</em></p>
												</div>
											</th>
											<td>ブロー</td>
											<td>メンズカット</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>1</p>
												</div>
												<div class="month">
													<p><span>月</span><em>January</em></p>
												</div>
											</th>
											<td>&nbsp;</td>
											<td>メンズカットモデル</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>2</p>
												</div>
												<div class="month">
													<p><span>月</span><em>February</em></p>
												</div>
											</th>
											<td>パーマ</td>
											<td>モデルカット</td>
										</tr>
										<tr>
											<th>
												<div class="num">
													<p>3</p>
												</div>
												<div class="month">
													<p><span>月</span><em>March</em></p>
												</div>
											</th>
											<td>&nbsp;</td>
											<td>スタイリストデビュー</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="technicalCheckPanel">
							<div class="secTitleBox">
								<p>Technical check</p>
								<h2>技術試験</h2>
							</div>
							<div class="topTxt">
								<div class="txt">
									<p>waccaでは各項目毎に「入客テスト」と「最終テスト」の2段階に分けて技術テストを行い入客回数も増やしながら自信を持ってスタイリストデビューができる仕組みです。カリキュラムをベースに個々に合わせたペースで取り組み、自身の得意不得に向き合いながら、一緒に成長していくことができます。</p>
								</div>
							</div>
							<div class="stepBoxList">
								<div class="stepBox">
									<div class="ttlBox">
										<div class="ttl">
											<p>01｜入客テスト</p>
										</div>
									</div>
									<div class="txtBox">
										<p>入客テストでは、実際のお客様に対し時間を要しても快適に過ごしていただける接客や施術ができるかどうかを見ます。</p>
									</div>
								</div>
								<div class="stepBox">
									<div class="ttlBox">
										<div class="ttl">
											<p>02｜実践入客</p>
										</div>
									</div>
									<div class="txtBox">
										<p>合格後は、実際にスタイリストと一緒に現場へ入ります。必ずスタイリストがフォローに入るので、お客様にも安心感を持ってもらえます。</p>
									</div>
								</div>
								<div class="stepBox">
									<div class="ttlBox">
										<div class="ttl">
											<p>03｜最終テスト</p>
										</div>
									</div>
									<div class="txtBox">
										<p>最終テストは、ウィッグでのテストです。色々なパターンを学んで一つの施術を一人で任せられるレベルになったかどうかを確認します。</p>
									</div>
								</div>
								<div class="stepBox">
									<div class="ttlBox">
										<div class="ttl">
											<p>04｜項目合格</p>
										</div>
									</div>
									<div class="txtBox">
										<p>項目合格後は、その項目を1人で入客することができるようになります。入客を増やすことは技術向上だけではなく、自身の売上にもつながります。</p>
									</div>
								</div>
							</div>
							<div class="ownerPanel">
								<div class="photoBox">
									<div class="photo"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/curriculum_owner.png" alt=""></div>
									<div class="name">
										<p><span>代表取締役</span><em>安井 隆一</em></p>
									</div>
								</div>
								<div class="txtBox">
									<div class="ttl">
										<p>楽しく広がる“成長の輪”</p>
									</div>
									<div class="txt">
										<p>この2段階テストの仕組みを導入しているのは、営業後のトレーニング時間を短縮し、少しでも早い時期から多くのお客様の髪質やスタイルに触れることで、それに合わせたテクニックを習得することができるからです。<br>また、1年目の最初のトレーニングがカラーなのもシャンプーは一人で行う施術ですが、カラーはスタイリストが横でフォローしながらできるからです。少しでも多く入客してお客様と接する時間を作り、自分が塗ったカラーでお客様に喜んでいただけることの喜びを感じてもらいたいという思いからこの順番となっています！</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="modelCutContainer">
				<div class="modelCutPanel">
					<div class="photo"><img class="switch" src="<?php bloginfo('template_url'); ?>/wacca/image/top/curriculum_model_cut_img_pc.png" alt=""></div>
					<div class="txtBox">
						<div class="inner">
							<div class="ttl">
								<p>model cut</p>
							</div>
							<dl>
								<dt>モデル料はウィッグ購入や材料費、<br>講習費としてスタッフに還元</dt>
								<dd>
									<div class="txt">
										<p>モデルに関しては営業中にモデルを入れ、頂いたモデル料はウィッグ購入や材料費、講習費としてスタッフに還元します。 <br>考え方はアシスタントトレーニングと同じで、ウィッグの反復練習も大事ですが、ウィッグ代もかかり時間を使うよりもモデルで実践的に練習しモデルさんから頂いたモデル代でウィッグに還元することでお給料の中からウィッグ代を捻出することをなるべく抑える工夫をしています。</p>
									</div>
								</dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="section__work">
			<div class="mvPanel">
				<div class="secWrap">
					<div class="secTitleBox">
						<p>How we work</p>
						<h2>働く環境を見る</h2>
					</div>
				</div>
				<div class="mv">
					<?php
						$image = SCF::get('work_main_image');
						echo wp_get_attachment_image($image, 'full');
					?>
				</div>
			</div>
			<div class="listContainer">
				<?php
					$field = SCF::get('work_contents');
					$i = 1;
					foreach ($field as $fields) {
						$image = wp_get_attachment_image_src($fields['work_contents_image'] , 'full');
				?>
				<div class="listPanel">
					<div class="txtArea">
						<div class="titleLabel">
							<div class="ttl">
								<p>How we work</p>
							</div>
							<div class="num">
								<p><?php echo sprintf('%02d', $i); ?></p>
							</div>
						</div>
						<div class="inner">
							<h3><?php echo nl2br($fields['work_contents_title']); ?></h3>
							<div class="txt">
								<?php echo nl2br($fields['work_contents_text']); ?>
							</div>
						</div>
					</div>
					<div class="photoArea">
						<img src="<?php echo $image[0]; ?>" alt="">
					</div>
				</div>
				<?php $i++; } ?>
			</div>
		</div>
		<div id="section__number">
			<div class="secWrap01">
				<div class="secTitleBox">
					<p>How we work</p>
					<h2>数字で見るサロン</h2>
				</div>
				<div class="numberList">
					<ol>
						<li class="listContainer01 listContainer">
							<div class="listPanel01 listPanel">
								<dl>
									<dt>セット面</dt>
									<dd>
										<p><em>5</em><span>席</span></p>
									</dd>
								</dl>
								<div class="iconChair"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_chair.png" alt=""></div>
								<div class="iconPlus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_plus.png" alt=""></div>
							</div>
							<div class="activePanel">
								<dl>
									<dt><span>MORE</span><em>セット面</em></dt>
									<dd>
										<div class="spDisplay">
											<div class="iconChair"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_chair_white.png" alt=""></div>
										</div>
										<div class="txt">
											<?php echo nl2br(SCF::get('number_list_detail_01')); ?>
										</div>
									</dd>
								</dl>
								<div class="iconMinus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_minus.png" alt=""></div>
								<p class="backTxt">もどる</p>
							</div>
						</li>
						<li class="listContainer02 listContainer">
							<div class="listPanel01 listPanel">
								<dl>
									<dt>黒川駅から</dt>
									<dd>
										<p><span class="vertical">徒歩</span><em>1</em><span>分</span></p>
									</dd>
								</dl>
								<div class="iconClock"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_clock.png" alt=""></div>
								<div class="iconPlus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_plus.png" alt=""></div>
							</div>
							<div class="activePanel">
								<dl>
									<dt><span>MORE</span><em>黒川駅から</em></dt>
									<dd>
										<div class="spDisplay">
											<div class="iconClock"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_clock_white.png" alt=""></div>
										</div>
										<div class="txt">
											<?php echo nl2br(SCF::get('number_list_detail_02')); ?>
										</div>
									</dd>
								</dl>
								<div class="iconMinus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_minus.png" alt=""></div>
								<p class="backTxt">もどる</p>
							</div>
						</li>
						<li class="listContainer03 listContainer">
							<div class="listPanel01 listPanel">
								<dl>
									<dt>定休日</dt>
									<dd>
										<p><em class="day">月</em><em class="day">火</em></p>
									</dd>
								</dl>
								<div class="iconCut"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_cut.png" alt=""></div>
								<div class="iconPlus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_plus.png" alt=""></div>
							</div>
							<div class="activePanel">
								<dl>
									<dt><span>MORE</span><em>定休日</em></dt>
									<dd>
										<div class="spDisplay">
											<div class="iconCut"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_cut_white.png" alt=""></div>
										</div>
										<div class="txt">
											<?php echo nl2br(SCF::get('number_list_detail_03')); ?>
										</div>
									</dd>
								</dl>
								<div class="iconMinus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_minus.png" alt=""></div>
								<p class="backTxt">もどる</p>
							</div>
						</li>
						<li class="listContainer04 listContainer">
							<div class="listPanel01 listPanel">
								<dl>
									<dt>勤務時間</dt>
									<dd>
										<p><span class="vertical">START</span><em>10</em><span>時</span></p>
										<p><span class="vertical">CLOSE</span><em>19</em><span>時</span></p>
									</dd>
								</dl>
								<div class="iconPlus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_plus.png" alt=""></div>
							</div>
							<div class="activePanel">
								<dl>
									<dt><span>MORE</span><em>勤務時間</em></dt>
									<dd>
										<div class="spDisplay spDisplay--time">
											<p><span class="vertical">START</span><em>10</em><span>時</span></p>
											<p><span class="vertical">CLOSE</span><em>19</em><span>時</span></p>
										</div>
										<div class="txt">
											<?php echo nl2br(SCF::get('number_list_detail_04')); ?>
										</div>
									</dd>
								</dl>
								<div class="iconMinus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_minus.png" alt=""></div>
								<p class="backTxt">もどる</p>
							</div>
						</li>
						<li class="listContainer05 listContainer">
							<div class="listPanel01 listPanel">
								<dl>
									<dt>土日有給</dt>
									<dd>
										<p><span class="vertical">年間</span><em>2</em><span>回</span></p>
									</dd>
								</dl>
								<div class="iconCamp"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_camp.png" alt=""></div>
								<div class="iconPlus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_plus.png" alt=""></div>
							</div>
							<div class="activePanel">
								<dl>
									<dt><span>MORE</span><em>土日有給</em></dt>
									<dd>
										<div class="spDisplay">
											<div class="iconCamp"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_camp_white.png" alt=""></div>
										</div>
										<div class="txt">
											<?php echo nl2br(SCF::get('number_list_detail_05')); ?>
										</div>
									</dd>
								</dl>
								<div class="iconMinus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_minus.png" alt=""></div>
								<p class="backTxt">もどる</p>
							</div>
						</li>
						<li class="listContainer06 listContainer">
							<div class="listPanel01 listPanel">
								<dl>
									<dt>社会保険</dt>
									<dd>
										<p><em class="insurance">あり</em></p>
									</dd>
								</dl>
								<div class="iconHeart"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_heart.png" alt=""></div>
								<div class="iconPlus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_plus.png" alt=""></div>
							</div>
							<div class="activePanel">
								<dl>
									<dt><span>MORE</span><em>社会保険</em></dt>
									<dd>
										<div class="spDisplay">
											<div class="iconHeart"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_heart_white.png" alt=""></div>
										</div>
										<div class="txt">
											<?php echo nl2br(SCF::get('number_list_detail_06')); ?>
										</div>
									</dd>
								</dl>
								<div class="iconMinus"><img src="<?php bloginfo('template_url'); ?>/wacca/image/top/number_icon_minus.png" alt=""></div>
								<p class="backTxt">もどる</p>
							</div>
						</li>
					</ol>
				</div>
			</div>
			<div class="numberItemOverlay"></div>
		</div>
		<div id="section__owner">
			<div class="secWrap01">
				<div class="secTitleBox">
					<p>Owner message</p>
					<h2>オーナーの思い</h2>
				</div>
				<div class="ownerContainer">
					<div class="ownerPanel">
						<div class="txtBox">
							<div class="title">
								<p><?php echo nl2br(SCF::get('owner_title')); ?></p>
							</div>
							<div class="photo">
								<?php
									$image = SCF::get('owner_image');
									echo wp_get_attachment_image($image, 'full');
								?>
							</div>
							<div class="name">
								<p>代表取締役</p>
								<p><em>安井 隆一</em><span>YASUI RYUICHI</span></p>
							</div>
							<div class="txt">
								<?php echo nl2br(SCF::get('owner_message')); ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="section__flow">
			<div class="flowWrap">
				<div class="secWrap01">
					<div class="flowContainer">
						<div class="secTitleBox">
							<p>Flow</p>
							<h2>採用の流れを見る</h2>
						</div>
						<div class="flowPanel">
							<ol>
								<li>
									<div class="ttlHead">
										<div class="num">
											<p>01</p>
										</div>
										<div class="ttl">
											<p><em>エントリーフォーム記入・送信</em></p>
										</div>
									</div>
									<div class="cntBody">
										<div class="txt">
											<?php echo nl2br(SCF::get('flow_detail_01')); ?>
										</div>
									</div>
								</li>
								<li>
									<div class="ttlHead">
										<div class="num">
											<p>02</p>
										</div>
										<div class="ttl">
											<p><em>サロン見学</em><span>※希望制</span></p>
										</div>
									</div>
									<div class="cntBody">
										<div class="txt">
											<?php echo nl2br(SCF::get('flow_detail_02')); ?>
										</div>
									</div>
								</li>
								<li>
									<div class="ttlHead">
										<div class="num">
											<p>03</p>
										</div>
										<div class="ttl">
											<p><em>サロンにて面接</em></p>
										</div>
									</div>
									<div class="cntBody">
										<div class="txt">
											<?php echo nl2br(SCF::get('flow_detail_03')); ?>
										</div>
									</div>
								</li>
								<li>
									<div class="ttlHead">
										<div class="num">
											<p>04</p>
										</div>
										<div class="ttl">
											<p><em>採用</em></p>
										</div>
									</div>
									<div class="cntBody">
										<div class="txt">
											<?php echo nl2br(SCF::get('flow_detail_04')); ?>
										</div>
									</div>
								</li>
							</ol>
							<div class="btnEntry"><a href="#section__entry">応募する</a></div>
						</div>
					</div>
				</div>
			</div>
			<div class="flowPhoto"><img class="switch" src="<?php bloginfo('template_url'); ?>/wacca/image/top/flow_photo_pc.png" alt=""></div>
		</div>
		<div id="section__job">
			<div class="descriptionContainer">
				<div class="descriptionContainer__inner">
					<div class="secTitleBox">
						<p>Job description</p>
						<h2>募集要項を見る</h2>
					</div>
					<div class="radioPanel">
						<ul class="radioList"></ul>
					</div>
					<div class="tabContainer">
						<?php
							$field = SCF::get('job_description');
							foreach ($field as $fields) {
						?>
						<div class="tabPanel">
							<div class="jobTitle">
								<p><?php echo nl2br($fields['job_description_text_01']); ?></p>
							</div>
							<div class="infoBox">
								<dl>
									<dt>募集職種</dt>
									<dd><?php echo nl2br($fields['job_description_text_01']); ?></dd>
								</dl>
								<dl>
									<dt>雇用形態</dt>
									<dd><?php echo nl2br($fields['job_description_text_02']); ?></dd>
								</dl>
								<dl>
									<dt>応募対象</dt>
									<dd><?php echo nl2br($fields['job_description_text_03']); ?></dd>
								</dl>
								<dl>
									<dt>勤務地</dt>
									<dd><?php echo nl2br($fields['job_description_text_04']); ?></dd>
								</dl>
								<dl>
									<dt>勤務時間</dt>
									<dd><?php echo nl2br($fields['job_description_text_05']); ?></dd>
								</dl>
								<dl>
									<dt>休日休暇</dt>
									<dd><?php echo nl2br($fields['job_description_text_06']); ?></dd>
								</dl>
								<dl>
									<dt>給与</dt>
									<dd><?php echo nl2br($fields['job_description_text_07']); ?></dd>
								</dl>
								<dl>
									<dt>福利厚生</dt>
									<dd><?php echo nl2br($fields['job_description_text_08']); ?></dd>
								</dl>
							</div>
						</div>
						<?php } ?>
					</div>
				</div>
			</div>
		</div>
		<div id="section__salon">
			<div class="salonPhoto salonPhoto--pc">
				<?php
					$image = SCF::get('salon_info_image_pc');
					echo wp_get_attachment_image($image, 'full');
				?>
			</div>
			<div class="salonPhoto salonPhoto--sp">
				<?php
					$image = SCF::get('salon_info_image_sp');
					echo wp_get_attachment_image($image, 'full');
				?>
			</div>
			<div class="salonContainer">
				<div class="secWrap01">
					<div class="salonPanel">
						<div class="secTitleBox">
							<p>Salon info</p>
							<h2>会社概要</h2>
						</div>
						<div class="salonInfo">
							<dl>
								<dt>社名</dt>
								<dd><?php echo nl2br(SCF::get('salon_info_text_01')); ?></dd>
							</dl>
							<dl>
								<dt>所在地</dt>
								<dd><?php echo nl2br(SCF::get('salon_info_text_02')); ?></dd>
							</dl>
							<dl>
								<dt>設立</dt>
								<dd><?php echo nl2br(SCF::get('salon_info_text_03')); ?></dd>
							</dl>
							<dl>
								<dt>代表者</dt>
								<dd><?php echo nl2br(SCF::get('salon_info_text_04')); ?></dd>
							</dl>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="section__gallery">
			<div class="galleryContainer">
				<div class="photoPanel">
					<div class="photoBox01">
						<div class="title">
							<p>SEEK BEAUTY DEEPLY. <br>TO YOU IN THE FUTURE.</p>
						</div>
						<div class="photo01">
							<div class="img">
								<?php
									$image = SCF::get('gallery_image_01');
									echo wp_get_attachment_image($image, 'full');
								?>
							</div>
						</div>
					</div>
					<div class="photoBox02">
						<div class="photo02">
							<div class="img">
								<?php
									$image = SCF::get('gallery_image_02');
									echo wp_get_attachment_image($image, 'full');
								?>
							</div>
						</div>
						<div class="photo03">
							<div class="img">
								<?php
									$image = SCF::get('gallery_image_03');
									echo wp_get_attachment_image($image, 'full');
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="section__entry">
			<div class="secWrap01">
				<div class="entryContainer">
					<div class="secTitleBox">
						<p>Entry</p>
						<h2>応募してみる</h2>
					</div>
					<div class="topTxt">
						<div class="txt">
							<p>お問い合わせをいただいて<br class="spBreak">2～3営業日以内に内容の確認をさせていただき、<br>メールもしくは電話にて対応いたします。</p>
						</div>
					</div>
					<div class="formBox">
						<?php echo do_shortcode('[mwform_formkey key="137"]'); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
	<!-- ▽footer▽-->
	<footer class="footer">
		<div class="pagetop"><a href="#top">TOP</a></div>
		<div class="footContact">
			<div class="secWrap01">
				<div class="secTitleBox">
					<p>Contact</p>
					<h2>お問い合わせ</h2>
				</div>
				<p>お電話、ライン、インスタからも<br class="spBreak">お気軽にお問合せください。</p>
				<ul>
					<li><a href="tel:0529828758">＋TEL</a></li>
					<li><a href="mailto:hair.eli6976@gmail.com"> ＋MAIL</a></li>
					<li><a href="https://www.instagram.com/hair.wacca/" target="_blank" rel="noopener">＋ INSTAGRAM</a></li>
				</ul>
			</div>
		</div>
		<div class="footPanel">
			<div class="secWrap01">
				<div class="footBox">
					<div class="infoBox">
						<div class="logoBox">
							<div class="logo">
								<p>wacca</p>
							</div><a href="https://www.instagram.com/hair.wacca/" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/wacca/image/common/footer_insta.png" alt=""></a>
						</div>
						<div class="info">
							<p>〒462-0842<br>名古屋市北区志賀南通1-18 西脇ビル 2A</p>
							<dl>
								<dt>OPEN</dt>
								<dd>10:00-20:00</dd>
							</dl>
							<dl>
								<dt>CLOSE</dt>
								<dd>月曜日 火曜日</dd>
							</dl>
						</div>
					</div>
					<div class="footNav">
						<ul>
							<li><a href="#section__concept">コンセプト</a></li>
							<li><a href="#section__message">メッセージ</a></li>
							<li><a href="#section__curriculum">カリキュラム</a></li>
							<li><a href="#section__work">働き方</a></li>
							<li><a href="#section__owner">オーナー挨拶</a></li>
						</ul>
						<ul>
							<li><a href="#section__flow">採用フロー</a></li>
							<li><a href="#section__job">募集要項</a></li>
							<li><a href="#section__salon">会社概要</a></li>
						</ul>
					</div>
					<div class="footItem">
						<dl>
							<dt>- LOOK ME</dt>
							<dd>
								<ul>
									<li><a href="https://beauty.hotpepper.jp/slnH000645376/" target="_blank" rel="noopener">＋ HOT PEPPER</a></li>
									<li><a href="https://www.instagram.com/hair.wacca/" target="_blank" rel="noopener">＋ INSTAGRAM</a></li>
								</ul>
							</dd>
						</dl>
					</div>
					<div class="footLine">
						<dl>
							<dt>- LINEお友だち追加</dt>
							<dd>公式LINEでの応募も承っています。<br>お友だち追加後、メッセージを送信ください。</dd>
						</dl>
						<div class="qrBox"><a href="https://page.line.me/?accountId=510dvnfa" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/wacca/image/common/footer_qr_line.png?202005261030" alt=""></a></div>
						<div class="btnLine"><a href="https://page.line.me/?accountId=510dvnfa" target="_blank" rel="noopener">＋ LINE</a></div>
					</div>
					<div class="copy">
						<p>Copyright &copy; wacca All Rights Reserved.</p>
					</div>
				</div>
			</div>
		</div>
	</footer>
	<!-- △footer△-->
	<?php wp_footer(); ?>
</body>

</html>