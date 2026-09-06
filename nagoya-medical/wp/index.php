<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="main" id="top">
		<div class="topKvPanel">
			<div class="topKv">
				<div class="kvTitle">
					<h1>免疫力で<br>がんを<br>治療する</h1>
				</div>
			</div>
		</div>
		<div class="newsSection">
			<div class="secWrap02">
				<div class="newsPanel fadein">
					<div class="pageSecTtl left">
						<h2>最新情報</h2>
						<p class="futura">NEWS</p>
					</div>
					<div class="newsList">
						<ul>
							<?php
								$free_item = SCF::get('gr_news', 38);
								$i = 1;
								foreach ($free_item as $fields) {
							?>
								<li>
									<div class="time futura">
										<p><?php echo $fields['news_date']; ?></p>
									</div>
									<div class="ttl">
										<?php echo nl2br($fields['news_text']); ?>
									</div>
								</li>
							<?php $i++; } ?>
						</ul>
					</div>
				</div>
				<div class="newsPanel fadein">
					<div class="pageSecTtl left">
						<h2>クリニックからのお知らせ</h2>
						<p class="futura">INFORMATION</p>
					</div>
					<div class="newsList">
						<ul>
							<?php
								$free_item = SCF::get('gr_info', 40);
								$i = 1;
								foreach ($free_item as $fields) {
							?>
								<li>
									<div class="time futura">
										<p><?php echo $fields['info_date']; ?></p>
									</div>
									<div class="ttl">
										<?php echo nl2br($fields['info_text']); ?>
									</div>
								</li>
							<?php $i++; } ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="courseSection">
			<div class="secWrap01">
				<div class="pageSecTtl fadein">
					<h2>診療内容</h2>
					<p class="futura">MEDICAL COURSE</p>
				</div>
				<div class="courseContainer">
					<div class="coursePanel01 coursePanel fadein">
						<div class="panelWrap">
							<div class="title gothic">
								<h3>副作用の少ない免疫療法でがん治療を行っております。</h3>
							</div>
							<div class="txt">
								<p>当院の免疫療法は、患者さんから頂いた血液を用いて行う副作用の少ないがん治療で、ほとんどのがんで治療が可能です。<br>がん予防でされる方も多いです。</p>
							</div>
							<div class="linkList">
								<ul>
									<li>
										<div class="btnLink"><a href="<?php echo home_url(); ?>/nk/">活性NK細胞療法</a></div>
									</li>
									<li>
										<div class="btnLink"><a href="<?php echo home_url(); ?>/vitamin/">高密度ビタミンC点滴療法</a></div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="coursePanel02 coursePanel fadein">
						<div class="panelWrap">
							<div class="title gothic">
								<h3>当院の免疫細胞培養センター</h3>
							</div>
							<div class="txt">
								<p>培養センターを併設する事により、検体（血液）の速やかな処理、即時に培養を行う事が可能です。クリニック部門と培養部門が連携し徹底した管理下で行っています。</p>
							</div>
							<div class="secBox">
								<div class="txtBox">
									<div class="txt">
										<p>がんは長い年月をかけて成長するものです。1cmのがんであっても、がん細胞の数は数億から数十億とも言われています。このがん細胞を攻撃するにはリンパ球の数も大量に増やす必要があります。そこで当院の活性NK細胞療法では専用の無菌細胞培養施設（培養センター）にて、患者さんから頂いた血液を分離してNK細胞を取り出し、NK細胞の数を通常の20倍から60倍（個人差があります）にまで増殖して、細胞を活性化させて患者さんへ投与します。</p>
										<p>一つの治療だけでなく複数の療法を行う事で免疫細胞のバランスがとれ、より良い治療効果が望める可能性もあります。<br>当院では患者さんのメンタル面のケアも施しています。がんは免疫の病気とも言われています。その為、がんを克服しようとする患者さん自身の力ががん治療にはプラスの治療効果を発揮する事となります。</p>
									</div>
									<div class="btnLink"><a href="<?php echo home_url(); ?>/results/">免疫療法の来院患者数<span>治療実績・改善症例をみる</span></a></div>
								</div>
								<div class="itemBox">
									<div class="videoBox"><iframe src="https://www.youtube.com/embed/6S0YNm6yRdQ" allow="fullscreen"></iframe></div>
									<div class="chart"><img src="<?php bloginfo('template_url'); ?>/image/top/top_course_chart.png" alt=""></div>
								</div>
							</div>
						</div>
					</div>
					<div class="linkPanel fadein">
						<ul>
							<li><a href="<?php echo home_url(); ?>/flow/">
									<dl>
										<dt class="futura">FLOW</dt>
										<dd>がん治療<br>開始までの流れ</dd>
									</dl>
								</a></li>
							<li><a href="<?php echo home_url(); ?>/results/">
									<dl>
										<dt class="futura">RESULTS</dt>
										<dd>がん治療<br>実績と症例</dd>
									</dl>
								</a></li>
							<li><a href="<?php echo home_url(); ?>/schedule/">
									<dl>
										<dt class="futura">SCHEDULE</dt>
										<dd>治療<br>スケジュール</dd>
									</dl>
								</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>