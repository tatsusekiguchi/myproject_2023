<?php
	require_once(dirname(__FILE__).'/../common/php/init.php');
	require_once(dirname(__FILE__).'/../../info/wp-load.php');

	define('NUM_PER_PAGE', 10);// 1ページあたりの表示件数
	$categories = array("room", "food", "life", "join", "info");// 取り得るカテゴリー(slug)
	$cat = ( !empty($_GET["cat"]) && in_array($_GET["cat"], $categories, true) ) ? $_GET["cat"] : "";// 現在のカテゴリー
	$pn = ( !empty($_GET['pn']) && is_numeric($_GET['pn']) ) ? intval($_GET['pn']) : 1;// 現在のページ

	$args = array("post_type" => "post", "posts_per_page" => NUM_PER_PAGE, "paged" => $pn);
	if( !empty($cat) ) $args = array_merge($args, array("category_name" => $cat));
	$the_query = new WP_Query($args);
	$num_all = ( is_numeric($the_query->found_posts) ) ? intval($the_query->found_posts) : 0;
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>新着情報｜名古屋のデザイナーズマンション【roomRroom】</title>
<meta name="description" content="名古屋のデザイナーズ賃貸マンションを専門とする【roomRroom】から新着ニュースをお届けします！" />
<meta name="keywords" content="名古屋,デザイナーズマンション,デザイナーズ賃貸,新着ニュース,roomRroom" />
<?php include_template_part("common_head"); ?>
<link rel="stylesheet" href="css/local.css" />
<script src="js/local.js"></script>
<?php include_template_part("additional_head"); ?>
</head>
<body>
<div id="wrapper">
<?php include_template_part("header"); ?>

	<div id="main">
		<div class="lh100 mt15 tac"><img src="img/i_01.png" alt="" height="15" /></div>
		<h2 class="fz20 lts3 mt5 tac color-red01">新着ニュース</h2>

		<div class="mt10"><a href="javascript:void(0);" class="lcl-js-open-categories lcl-btn-01">カテゴリを選択</a></div>
		<div class="lcl-categories lcl-js-categories dn">
			<ul class="lcl-categories-list">
				<li><a class="lcl-categories-list__item lcl-categories-list__item--odd<?php if( $cat === "" ) echo " lcl-categories-list__item--current"; ?>" href="./">すべてを表示</a></li>
				<li><a class="lcl-categories-list__item lcl-categories-list__item--even<?php if( $cat === "room" ) echo " lcl-categories-list__item--current"; ?>" href="./?cat=room">Room</a></li>
				<li><a class="lcl-categories-list__item lcl-categories-list__item--odd<?php if( $cat === "food" ) echo " lcl-categories-list__item--current"; ?>" href="./?cat=food">Food</a></li>
				<li><a class="lcl-categories-list__item lcl-categories-list__item--even<?php if( $cat === "life" ) echo " lcl-categories-list__item--current"; ?>" href="./?cat=life">Life</a></li>
				<li><a class="lcl-categories-list__item lcl-categories-list__item--odd<?php if( $cat === "info" ) echo " lcl-categories-list__item--current"; ?>" href="./?cat=info">Info</a></li>
				<li class="lcl-categories-list__item lcl-categories-list__item--even">&nbsp;</li>
			</ul>
		</div>

<?php if( count($the_query->posts) > 0 ): ?>
		<div class="lcl-result">
			<div class="lcl-result-displaying"><?php echo number_format(($pn - 1) * NUM_PER_PAGE + 1); ?>〜<?php echo number_format(($pn - 1) * NUM_PER_PAGE + count($the_query->posts)); ?>件表示中</div>
		</div>
		<div class="lcl-page-nav mrl10 ovh">
<?php 	if( $pn - 1 > 0 ): ?>
			<div class="fll"><a class="lcl-page-nav__prev" href="./?pn=<?php echo $pn - 1; ?><?php echo $url_param; ?>">前へ</a></div>
<?php 	endif; ?>
<?php 	if( $pn < ceil($num_all / NUM_PER_PAGE) ): ?>
			<div class="flr"><a class="lcl-page-nav__next" href="./?pn=<?php echo $pn + 1; ?><?php echo $url_param; ?>">次へ</a></div>
<?php 	endif; ?>
		</div><!-- .lcl-page-nav -->

		<ul class="list-news">
<?php
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
<?php
		endwhile;
		wp_reset_postdata();
?>
		</ul>

		<div class="lcl-page-nav mrl10 ovh">
<?php 	if( $pn - 1 > 0 ): ?>
			<div class="fll"><a class="lcl-page-nav__prev" href="./?pn=<?php echo $pn - 1; ?><?php echo $url_param; ?>">前へ</a></div>
<?php 	endif; ?>
<?php 	if( $pn < ceil($num_all / NUM_PER_PAGE) ): ?>
			<div class="flr"><a class="lcl-page-nav__next" href="./?pn=<?php echo $pn + 1; ?><?php echo $url_param; ?>">次へ</a></div>
<?php 	endif; ?>
		</div><!-- .lcl-page-nav -->
<?php else: ?>
		<p class="mrl10 mt20">記事が見つかりません。</p>
<?php endif; ?>
	</div><!-- #main -->

<?php include_template_part("footer"); ?>
</div><!-- #wrapper -->
</body>
</html>
