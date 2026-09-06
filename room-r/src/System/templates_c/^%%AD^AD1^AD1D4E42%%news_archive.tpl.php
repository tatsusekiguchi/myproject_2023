<?php /* Smarty version 2.6.26, created on 2016-03-02 04:46:10
         compiled from news_archive.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header_subpage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="main">
		<div class="inner">
			<div class="topicpath w980 mra mla">
				<span><a href="<?php echo @WEB_ROOT; ?>
/">HOME</a></span>
				<span>＞ 新着情報</span>
			</div><!-- .topicpath -->
			<h2 class="tac mb25"><img src="<?php echo @WEB_ROOT; ?>
/src/img/news/h_01.png" alt="新着情報" /></h2>
			<div id="news_list" class="pt20">
				<p class="fz14 tac">[ <?php 
					global $wp_query;
$paged = get_query_var( 'paged' ) - 1;
$ppp   = get_query_var( 'posts_per_page' );
$count = $total = $wp_query->post_count;
$from  = 0;
if ( 0 < $ppp ) {
  $total = $wp_query->found_posts;
  if ( 0 < $paged )
    $from  = $paged * $ppp;
}
echo 1 < $count ? ($from + 1 . '〜') : '';
echo ($from + $count );
 ?>
件 表示中 ]</p>
<?php 
$cat = get_term(get_query_var('cat'),"category");
 ?>
				<div class="category">
					<dl class="ovh">
						<dt>カテゴリ</dt>
						<dd><a href="<?php echo @WEB_ROOT; ?>
/info/"<?php if(isset($cat->errors)){ echo ' class="current"'; } ?>>すべて</a></dd>
						<dd class="ico_room"><a href="<?php echo @WEB_ROOT; ?>
/info/category/room/" class="<?php if(isset($cat->slug) && $cat->slug == "room"){ echo 'current'; } ?>">Room</a></dd>
						<dd class="ico_food"><a href="<?php echo @WEB_ROOT; ?>
/info/category/food/" class="<?php if(isset($cat->slug) && $cat->slug == "food"){ echo 'current'; } ?>">Food</a></dd>
						<dd class="ico_life"><a href="<?php echo @WEB_ROOT; ?>
/info/category/life/" class="<?php if(isset($cat->slug) && $cat->slug == "life"){ echo 'current'; } ?>">Life</a></dd>
						<dd class="ico_info"><a href="<?php echo @WEB_ROOT; ?>
/info/category/info/" class="<?php if(isset($cat->slug) && $cat->slug == "info"){ echo 'current'; } ?>">Info</a></dd>
					</dl>
				</div>
				<div class="article">
					<ul class="article_list">
<?php 
	while( have_posts() ):
		the_post();
		$cats = get_the_terms(get_the_ID(), 'category');
		$cats = get_the_terms(get_the_ID(), 'category');
		echo '<li>';
		echo '<a href="'.get_permalink().'" class="fade_on_hover dib">';
		echo '<div class="ico '.$cats[0]->slug.'">'.$cats[0]->name.'</div>';
		echo '<div class="image">';
		the_post_thumbnail(array(220, 146));
		echo '</div>';
		echo '<p class="date">'.get_the_time('Y.m.d').'</p>';
		echo '<p class="title">'.get_the_title().'</p>';
		echo '</a>';
		echo '</li>';
	endwhile;
 ?>
					</ul>
					<div class="pagination-block">
<?php 
get_pagination(7);

// ページネーションを出力
function get_pagination($len = 7){
	global $paged, $wp_query;
	$current = ( !empty($paged) ) ? intval($paged) : 1;// 現在のページ
	$num_pages = ( !empty($wp_query->max_num_pages) ) ? intval($wp_query->max_num_pages) : 1;// 総ページ数
	$nums = get_page_nums($num_pages, 1, $current, $len);

	$out = '<ul class="pagination tac">';
	if( $current !== 1 ) $out .= '<li class="prev"><a href="'.get_pagenum_link(1).'">&lt;</a></li>';
	foreach($nums as $n){
		if( $n == $current ){
			$out .= '<li class="current"><a href="'.get_pagenum_link($n).'">'.$n.'</a></li>';
		} else {
			$out .= '<li><a href="'.get_pagenum_link($n).'">'.$n.'</a></li>';
		}
	}
	if( $current !== $num_pages ) $out .= '<li class="next"><a href="'.get_pagenum_link($num_pages).'">&gt;</a></li>';
	$out .= '</ul>';
	echo $out;
}

// 最大長が$lengthのページ配列を取得
function get_page_nums($num_all, $num_per_page, $current_page = 1, $length = 7){
	$num_pages = ceil($num_all / $num_per_page);

	$append = 0;
	$start = $current_page - floor($length / 2);
	if( $start < 1 ){ $append = 1 - $start; $start = 1;}

	$prepend = 0;
	$end = $current_page + floor($length / 2);
	if( $end > $num_pages ){ $prepend = $end - $num_pages; $end = $num_pages;}

	$result = array();
	for($i = $start - $prepend; $i <= $end + $append; $i++){
		if( $i < 1 ) continue;
		if( $i > $num_pages ) break;
		$result[] = intval($i);
	}
	return $result;
}
 ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- #main -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>