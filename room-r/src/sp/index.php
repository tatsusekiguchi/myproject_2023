<?php
	require_once(dirname(__FILE__).'/common/php/init.php');
	require_once(dirname(__FILE__).'/../info/wp-load.php');

	define("NUM_IN_A_PAGE", 12);// 新着物件表示件数
	error_reporting(E_ERROR | E_WARNING | E_PARSE);// PC版でNoticeが出るため
	list($bukken, $cnt_bukken, $params, $url_param, $result_text) = $PC->get_bukken();
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>名古屋のデザイナーズマンションの賃貸物件情報｜roomRroom</title>
<meta name="description" content="名古屋に特化したデザイナーズマンションの賃貸情報を豊富に掲載中！「新築物件」「高級賃貸」「女性向け物件」「ペット可物件」など、名古屋で人気のデザイナーズ賃貸を特集中。roomRroom(ルームRルーム)のスタッフが「新しいあなたが始まる部屋探し」をサポートいたします。" />
<meta name="keywords" content="デザイナーズマンション,デザイナーズ賃貸,名古屋,物件情報,roomRroom" />
<?php include_template_part("common_head"); ?>
<link rel="stylesheet" href="css/local.css" />
<script src="<?php echo HU; ?>/common/js/jquery.slider.js"></script>
<script src="js/local.js"></script>
<?php include_template_part("additional_head"); ?>
</head>
<body>
<div id="wrapper">
<?php include_template_part("header"); ?>

	<div id="main">
		<div class="tac" style="background:#f5f2dd none;"><img src="img/01.jpg" alt="新しい部屋は、新しい私の始まりだと思う。名古屋のデザイナーズ賃貸で今日から始めるお部屋探し。" height="402" /></div>

		<ul class="w300 mt15 mra mla ovh">
			<li class="fll"><a href="search/area/"><img src="img/b_01.png" alt="エリア検索" height="140" /></a></li>
			<li class="flr"><a href="search"><img src="img/b_02.png" alt="条件検索" height="140" /></a></li>
		</ul>

		<div class="lcl-slide mt15">
			<div class="lcl-slide__slides">
				<div class="lcl-slide__slides-item"><a href="search/feature/?f=7"><img src="img/slide/02.jpg" alt="" height="120" /></a></div>
				<div class="lcl-slide__slides-item"><a href="search/feature/?f=3"><img src="img/slide/01.jpg" alt="" height="120" /></a></div>
				<div class="lcl-slide__slides-item"><a href="search/feature/?f=0"><img src="img/slide/03.jpg" alt="" height="120" /></a></div>
				<div class="lcl-slide__slides-item"><a href="search/feature/?f=2"><img src="img/slide/04.jpg" alt="" height="120" /></a></div>
			</div>
			<ul class="lcl-slide__controllers">
				<li class="lcl-slide__controllers-prev"><a href="javascript:void(0);"><img src="img/slide/controller_prev.png" alt="PREV" height="16" /></a></li>
				<li class="lcl-slide__controllers-next"><a href="javascript:void(0);"><img src="img/slide/controller_next.png" alt="NEXT" height="16" /></a></li>
			</ul>
		</div>

		<h2 class="h-01">新着情報</h2>
<?php echo_list_articles($PC, $bukken); ?>

		<ul class="lcl-btns">
			<li class="lcl-btns__item"><a href="search/area/" style="background-image:url(common/img/i_01.png);">エリア検索</a></li>
			<li class="lcl-btns__item"><a href="search" style="background-image:url(common/img/i_02.png);">条件検索</a></li>
		</ul><!-- .lcl-btns -->

		<h2 class="h-02 mt20">新着ニュース</h2>
		<ul class="list-news">
<?php
	$args = array("post_type" => "post", "posts_per_page" => 6);
	$the_query = new WP_Query($args);
	while( $the_query->have_posts() ):
		$the_query->the_post();
		$cats = get_the_terms(get_the_ID(), "category");
?>
			<li class="list__item">
				<a href="<?php echo HU; ?>/news/detail/?id=<?php echo the_ID(); ?>">
					<div class="list__item-img"><?php the_post_thumbnail(array(114, 9999)); ?></div>
					<div class="list__item-data">
						<div class="list__item-data-cat <?php echo "bg-news-cat-".h($cats[0]->slug); ?>"><?php echo h($cats[0]->name); ?></div>
						<div class="list__item-data-date mt5"><?php the_time("Y.n.j"); ?></div>
						<div class="list__item-data-title"><?php the_title(); ?></div>
					</div>
				</a>
			</li>
<?php endwhile; ?>
		</ul>
		<div><a href="news/" class="lcl-btn lcl-btn-01">新着ニュース一覧を見る</a></div>
	</div><!-- #main -->

<?php include_template_part("footer"); ?>
</div><!-- #wrapper -->
</body>
</html>
