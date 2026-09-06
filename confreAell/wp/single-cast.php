<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="pageMain" id="castMain">
		<div class="pageKvContainer">
			<div class="kvLogo"><a href="<?php echo home_url(); ?>"><img src="<?php bloginfo('template_url'); ?>/image/common/top_shop_logo.png" alt="confreAell"></a></div>
			<div class="pageKvPanel">
				<div class="castRecommend">
					<h1><?php the_title(); ?>のおすすめ</h1>
				</div>
			</div>
		</div>
		<div class="sec01 detailSection">
			<div class="secWrap01 fadein">
				<div class="mvPanel"><?php the_post_thumbnail('full'); ?></div>
				<div class="detailContainer">
					<div class="detailWrap">
						<div class="messagePanel">
							<div class="title">
								<h2><?php echo cfs()->get('cast_greeting_title'); ?></h2>
							</div>
							<div class="txt">
								<?php echo cfs()->get('cast_greeting_txt'); ?>
							</div>
						</div>
						<div class="infoPanel">
							<div class="infoList">
								<div class="infoBox">
									<dl>
										<dt><span>キャスト名</span></dt>
										<dd><?php the_title(); ?></dd>
									</dl>
								</div>
								<div class="infoBox">
									<dl>
										<dt><span>出勤スケジュール</span></dt>
										<dd>
											<div class="icon"><a href="<?php echo cfs()->get('cast_x_link'); ?>" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/sns_x.png" alt=""></a></div>
										</dd>
									</dl>
								</div>
								<div class="infoBox">
									<dl>
										<dt>おすすめ<br>メニュー</dt>
										<dd><?php echo cfs()->get('cast_recommend'); ?></dd>
									</dl>
								</div>
								<div class="infoBox">
									<dl>
										<dt>メッセージ</dt>
										<dd><?php echo cfs()->get('cast_message'); ?></dd>
									</dl>
								</div>
							</div>
						</div>
						<div class="snsPanel">
							<div class="title"><img src="<?php bloginfo('template_url'); ?>/image/cast/title_sns.png" alt=""></div>
							<div class="sns">
								<ul>
									<li><a href="<?php echo cfs()->get('cast_x_link'); ?>" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/sns_x.png" alt=""></a></li>
									<li><a href="<?php echo cfs()->get('cast_tiktok_link'); ?>" target="_blank" rel="noopener"><img src="<?php bloginfo('template_url'); ?>/image/common/sns_tiktok.png" alt=""></a></li>
								</ul>
							</div>
						</div>
						<div class="innerSection">
							<div class="title">
								<h3><?php echo cfs()->get('cast_free_title'); ?></h3>
							</div>
							<div class="contentBox">
								<?php while (have_posts()) : the_post(); ?>
									<?php the_content(); ?>
								<?php endwhile; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="btnMore purple back"><a href="<?php echo home_url(); ?>/castlist/">Back</a></div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>