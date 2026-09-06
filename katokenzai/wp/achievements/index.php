<?php
/*
Template Name: 施工実績
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="achievementsMain">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<p>Achievements</p>
				<h1>施工実績</h1>
			</div>
		</div>
		<div class="topTitlePanel">
			<div class="secWrap01">
				<h2>数字で見る！<br>カトー建材工業の<br class="spBreak">施工実績</h2>
				<div class="txt">
					<p>カトー建材工業は愛知県・岐阜県を中心に<br>600件以上の豊富な施工実績を誇っています。</p>
				</div>
				<div class="secBoxList">
					<div class="secBox">
						<div class="ttl"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/achievements/achievements_top_ttl_01_pc.png" alt=""></div>
						<div class="countList">
							<div class="countBox">
								<dl>
									<dt>愛知県</dt>
									<dd><em>500</em><span>件</span></dd>
								</dl>
							</div>
							<div class="countBox">
								<dl>
									<dt>岐阜県</dt>
									<dd><em>130</em><span>件</span></dd>
								</dl>
							</div>
						</div>
					</div>
					<div class="secBox">
						<div class="ttl"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/achievements/achievements_top_ttl_02_pc.png" alt=""></div>
						<div class="countList">
							<div class="countBox">
								<dl>
									<dt>官公庁</dt>
									<dd><em>240</em><span>件</span></dd>
								</dl>
							</div>
							<div class="countBox">
								<dl>
									<dt>企　業</dt>
									<dd><em>160</em><span>件</span></dd>
								</dl>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="mv"><img class="switch" src="<?php bloginfo('template_url'); ?>/image/achievements/achievements_mv_01_pc.png" alt=""></div>
		<div class="caseSection">
			<div class="secWrap01">
				<h2>施工事例</h2>
				<div class="caseTable">
					<table>
						<thead>
							<tr>
								<th>工事名</th>
								<th>受注先</th>
								<th>年月日</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$field = SCF::get('achievements');
								foreach ($field as $fields) {
							?>
							<tr>
								<td data-label="工事名">
									<p><?php echo $fields['achievements_name']; ?></p>
								</td>
								<td data-label="受注先">
									<p><?php echo $fields['achievements_order']; ?></p>
								</td>
								<td data-label="年月日">
									<p><?php echo $fields['achievements_date']; ?></p>
								</td>
							</tr>
							<?php  } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>