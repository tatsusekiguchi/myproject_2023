<?php

// -------------------------------------------------------------------
// wp_head()で出力される内容を削除
// -------------------------------------------------------------------
remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
remove_action( 'wp_print_styles', 'print_emoji_styles', 10 );
remove_action('wp_head','rest_output_link_wp_head');
remove_action('wp_head','wp_oembed_add_discovery_links');
remove_action('wp_head','wp_oembed_add_host_js');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_shortlink_wp_head', 10, 0 );
remove_action('wp_head', 'feed_links_extra',3);

//固定ページでエディタを非表示にする
function post_output_css() {
    $pt = get_post_type();
    if ($pt == 'page') { //投稿の場合はpost
        $hide_postdiv_css = '<style type="text/css">#postdiv, #postdivrich { display: none; }</style>';
        echo $hide_postdiv_css;
    }
}
add_action('admin_head', 'post_output_css');

//「Gutenberg」で出力されるHTMLに対応したスタイルシートを無効化
function remove_block_library_style() {
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
}
//add_action( 'wp_enqueue_scripts', 'remove_block_library_style' );

// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

//--------------------------------------------------------------------
// アイキャッチ画像を有効にする
// -------------------------------------------------------------------
add_theme_support('post-thumbnails');

// -------------------------------------------------------------------
//  ページネーション
// -------------------------------------------------------------------
//レスポンシブなページネーションを作成する
function responsive_pagination($pages = '', $range = 4){
	$showitems = ($range * 2)+1;

	global $paged;
	if(empty($paged)) $paged = 1;

	//ページ情報の取得
	if($pages == '') {
		global $wp_query;
		$pages = $wp_query->max_num_pages;
		if(!$pages){
			$pages = 1;
		}
	}

	if(1 != $pages) {
		echo '<ul class="pagination" role="menubar" aria-label="Pagination">';
		//先頭へ
		echo '<li class="first"><a href="'.get_pagenum_link(1).'"><span>First</span></a></li>';
		//1つ戻る
		echo '<li class="previous"><a href="'.get_pagenum_link($paged - 1).'"><span>Previous</span></a></li>';
		//番号つきページ送りボタン
		for ($i=1; $i <= $pages; $i++)     {
		if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))       {
		echo ($paged == $i)? '<li class="current"><a>'.$i.'</a></li>':'<li><a href="'.get_pagenum_link($i).'" class="inactive" >'.$i.'</a></li>';
		}
		}
		//1つ進む
		echo '<li class="next"><a href="'.get_pagenum_link($paged + 1).'"><span>Next</span></a></li>';
		//最後尾へ
		echo '<li class="last"><a href="'.get_pagenum_link($pages).'"><span>Last</span></a></li>';
		echo '</ul>';
	}
}

function pagenation_func($r,$id,$p,$n) {

	global $paged;
	$pd=$paged;
	if($pd<1){$pd=1;}
	global $wp_query;
	$ps=$wp_query->max_num_pages;
	if(!$ps){$ps=1;}
	$l=($r*2)+1;
	if(!$id){$id="pagenation";}
	if(!$p){$p="<";}
	if(!$n){$n=">";}

	$r_l=$r_r=$r;
	if($pd<=$r){$r_r=$l-$pd;}
	if($pd>=$ps-$r){$r_l=$l-$ps+$pd-1;}
	$a1="\t<li><a class=\"";
	$a2="</a></li>\n";
	$s1="\t<li><span class=\"";
	$s2="</span></li>\n";

	if(1!=$ps){
		echo "\n<div id=\"".$id."\">\n";
		echo "\t<ul id=\"pagenation-list\">\n";
		if($pd>1){echo $a1."prev\" href=\"".get_pagenum_link($pd-1)."\">".$p.$a2;}
		$o=$pd-$r_l;
		if ($o>1){echo $a1."num\" href=\"".get_pagenum_link(1)."\">1".$a2;}
		if ($o>2){echo $s1."omit\">...".$s2;}
		for($i=1; $i<=$ps; $i++){
			if(1!=$ps &&(!($i>=$pd+$r_r+1||$i<=$pd-$r_l-1)||$ps<=$l )){
				if($pd==$i){echo $s1."current\">".$i."".$s2;}
				else{echo $a1."num\" href=\"".get_pagenum_link($i)."\">".$i."".$a2;}
			}
		}

		$o=$pd+$r_r+1;
		if($ps<$o){$o=$ps+1;}
		if($o<$ps){echo $s1."omit\">...".$s2;}
		if($o<=$ps){echo $a1."num\" href=\"".get_pagenum_link($ps)."\">".($i-1).$a2;}
		if($pd<$ps){echo $a1."next\"  href=\"".get_pagenum_link($pd+1)."\">".$n.$a2;}
		echo "\t</ul>\n</div>\n";
	}

}

// -------------------------------------------------------------------
//  アーカイブ一覧
// -------------------------------------------------------------------
// 指定年の投稿数を取得
function get_year_archives_num( $year ) {
	global $wpdb;
	$cnt = $wpdb->get_var(
	  "SELECT count(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND DATE_FORMAT(post_date, '%Y') = '".$year."';"
	);
	return $cnt;
  }
  // 指定年月の投稿数を取得
  function get_month_archives_num( $year, $month ) {
	global $wpdb;
	$cnt = $wpdb->get_var(
	  "SELECT count(*) FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' AND DATE_FORMAT(post_date, '%Y%m') = '".$year.str_pad($month, 2, 0, STR_PAD_LEFT)."';"
	);
	return $cnt;
  }
  // 一番古い記事の年を取得
  function get_oldest_year() {
	global $wpdb;
	$oldest_date = $wpdb->get_var(
	  "SELECT post_date FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date ASC LIMIT 1;"
	);
	return idate('Y', strtotime($oldest_date) ); //投稿日の年だけ数値で取得
  }

// -------------------------------------------------------------------
//  404エラー時トップへリダイレクト
// -------------------------------------------------------------------
add_action( 'template_redirect', 'is404_redirect_home' );
function is404_redirect_home() {
  if( is_404() ){
    wp_safe_redirect( home_url( '/' ) );
    exit();
  }
}

?>