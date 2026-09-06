<?php
	require_once(dirname(__FILE__).'/../../common/php/init.php');
	require_once(dirname(__FILE__).'/../../../info/wp-load.php');

	$id = ( !empty($_GET['id']) && is_numeric($_GET['id']) ) ? intval($_GET['id']) : 0;// 投稿ID
	$args = array("post_type" => "post", "posts_per_page" => 1, "p" => $id);
	$the_query = new WP_Query($args);
	if( !$the_query->have_posts() ){
		header("Location: ".HU."/news/");
		exit;
	}
	$the_query->the_post();
	$cats = get_the_terms(get_the_ID(), "category");
	$post_prev = get_adjacent_post(false, "", true);
	$post_next = get_adjacent_post(false, "", false);
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>新着情報｜名古屋のデザイナーズマンション【roomRroom】</title>
<?php include_template_part("common_head"); ?>
<meta name="description" content="名古屋のデザイナーズ賃貸マンションを専門とする【roomRroom】から新着ニュースをお届けします！" />
<meta name="keywords" content="名古屋,デザイナーズマンション,デザイナーズ賃貸,新着ニュース,roomRroom" />
<link rel="stylesheet" href="css/local.css" />
<script src="js/local.js"></script>
<?php include_template_part("additional_head"); ?>
</head>
<body>
<div id="wrapper">
<?php include_template_part("header"); ?>

	<div id="main">
		<h2 class="fz13 tac color-red01 mt15">新着ニュース</h2>
		<div class="lcl-the-article mt15">
			<div class="lcl-the-article__header">
				<div class="lcl-the-article__header-date"><?php the_time("Y.n.j"); ?></div>
				<div class="lcl-the-article__header-cat <?php echo "bg-news-cat-".h($cats[0]->slug); ?>"><?php echo h($cats[0]->name); ?></div>
				<div class="lcl-the-article__header-title"><?php the_title(); ?></div>
			</div>
			<div class="lcl-the-article__body"><?php the_content(); ?></div>
		</div>
		<div class="lcl-page-nav ovh mt10 mrl10">
<?php if( !empty($post_prev) ): ?>
			<div class="fll"><a class="lcl-page-nav__prev" href="./?id=<?php echo $post_prev->ID; ?>">前へ</a></div>
<?php endif; ?>
<?php if( !empty($post_next) ): ?>
			<div class="flr"><a class="lcl-page-nav__next" href="./?id=<?php echo $post_next->ID; ?>">次へ</a></div>
<?php endif; ?>
		</div>
		<div class="mt10 mrl10"><a href="../" class="lcl-btn-back">記事一覧に戻る</a></div>
	</div><!-- #main -->

<?php include_template_part("footer"); ?>
</div><!-- #wrapper -->
</body>
</html>
