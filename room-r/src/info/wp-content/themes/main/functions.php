<?php
	remove_filter('wp_head', 'wp_generator');
	remove_filter('the_content', 'wptexturize');

	/* the_excerpt()の[…]を変更 */
	function new_excerpt_more($more){ return '...';}
	add_filter('excerpt_more', 'new_excerpt_more');


	// アイキャッチ
	add_theme_support('post-thumbnails');

	if( is_admin() ){
		add_filter('pre_site_transient_update_core', '__return_zero');// バージョン更新を非表示
	
		function my_admin_footer_text(){ echo get_bloginfo('name');}
		function my_in_admin_footer(){}
		add_filter('admin_footer_text', 'my_admin_footer_text');
		add_filter('in_admin_footer', 'my_in_admin_footer');

		/* サイドのバー */
		function remove_menus() {
			if( !current_user_can('level_10') ){
				remove_menu_page('index.php');// ダッシュボード
				remove_menu_page('separator1');// セパレータ1
				// remove_menu_page('edit.php');// 投稿
				// remove_menu_page('upload.php');// メディア
				remove_menu_page('link-manager.php');// リンク
				remove_menu_page('edit.php?post_type=page');// 固定ページ
				remove_menu_page('edit-comments.php');// コメント
				remove_menu_page('separator2');// セパレータ1
				remove_menu_page('themes.php');// 外観
				remove_menu_page('plugins.php');// プラグイン
				remove_menu_page('users.php');// ユーザー
				remove_menu_page('tools.php');// ツール
				remove_menu_page('options-general.php');// 設定
				remove_menu_page('profile.php');// プロフィール(管理者以外のユーザー用)
				remove_submenu_page('edit.php','edit-tags.php?taxonomy=category');// カテゴリ
				remove_submenu_page('edit.php','edit-tags.php?taxonomy=post_tag');// タグ
			}
		}
		add_action('admin_menu', 'remove_menus');

		if( !current_user_can('level_10') ){
	
			/* トップのバー */
			function remove_bar_menus( $wp_admin_bar ) {
				$wp_admin_bar->remove_menu('wp-logo');// ロゴ
				// $wp_admin_bar->remove_menu('site-name');// サイト名
				// $wp_admin_bar->remove_menu('view-site');// サイト名 -> サイトを表示
				$wp_admin_bar->remove_menu('comments');// コメント
				$wp_admin_bar->remove_menu('new-content');// 新規
				$wp_admin_bar->remove_menu('new-post');// 新規 -> 投稿
				$wp_admin_bar->remove_menu('new-media');// 新規 -> メディア
				$wp_admin_bar->remove_menu('new-link');// 新規 -> リンク
				$wp_admin_bar->remove_menu('new-page');// 新規 -> 固定ページ
				$wp_admin_bar->remove_menu('new-user');// 新規 -> ユーザー
				$wp_admin_bar->remove_menu('updates');// 更新
				$wp_admin_bar->remove_menu('my-account');// マイアカウント
				$wp_admin_bar->remove_menu('user-info');// マイアカウント -> プロフィール
				$wp_admin_bar->remove_menu('edit-profile');// マイアカウント -> プロフィール編集
				$wp_admin_bar->remove_menu('logout');// マイアカウント -> ログアウト
			}
			add_action('admin_bar_menu', 'remove_bar_menus', 201);
		
			/* トップのバーにオリジナルの項目を追加 */
			function add_new_item_in_admin_bar() {
				global $wp_admin_bar;
				$wp_admin_bar->add_menu(array('id'=>'new_item_in_admin_bar1', 'title'=>'管理画面トップ', 'href'=>home_url().'/wp-admin/'));
				$wp_admin_bar->add_menu(array('id'=>'new_item_in_admin_bar2', 'title'=>'個人設定', 'href'=>home_url().'/wp-admin/profile.php'));
				$wp_admin_bar->add_menu(array('id'=>'new_item_in_admin_bar3', 'title'=>'ログアウト', 'href'=>wp_logout_url()));
			}
			add_action('wp_before_admin_bar_render', 'add_new_item_in_admin_bar');
	
			/* ダッシュボードのようこそ */
			remove_action('welcome_panel', 'wp_welcome_panel');
	
			/* ダッシュボード */
			function example_remove_dashboard_widgets() {
				global $wp_meta_boxes;
				unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);// 現在の状況
				unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);// 最近のコメント
				unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);// 被リンク
				unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);// プラグイン
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);// WordPressブログ
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);// WordPressフォーラム
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);// クイック投稿
				unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);// 最近の下書き
			}
			add_action('wp_dashboard_setup', 'example_remove_dashboard_widgets');
		}
	}
	function my_print_footer_scripts() {
echo '<script type="text/javascript">
  //<![CDATA[
  jQuery(document).ready(function($){
    $(".categorychecklist input[type=checkbox]").each(function(){
      $check = $(this);
      var checked = $check.attr("checked") ? \' checked="checked"\' : \'\';
      $(\'<input type="radio" id="\' + $check.attr("id")
        + \'" name="\' + $check.attr("name") + \'"\'
  	+ checked
	+ \' value="\' + $check.val()
	+ \'"/>\'
      ).insertBefore($check);
      $check.remove();
    });
  });
  //]]>
  </script>';
}
add_action('admin_print_footer_scripts', 'my_print_footer_scripts', 21);

	// 投稿ページCSS
	if(!current_user_can('manage_options')){
		// 固定ページにスタイルシート追加
		add_action('admin_head', 'admin_head_html');
		function admin_head_html(){
			echo <<< CONTCONT
<style type="text/css">
#category-adder{display:none;} /* カテゴリーよく使うもの削除 */
#category-tabs li.hide-if-no-js{display:none;} /* カテゴリーよく使うもの削除 */
</style>
CONTCONT;
		}

	}

		function custom_editor_settings( $initArray ){
		    // WordPress3くらい
		    //$initArray['theme_advanced_blockformats'] = 'p,address,pre,code,h3,h4,h5,h6';
		    // WordPress4から
		    $initArray['block_formats'] = "見出し=h3; 段落=p; グループ=div;";
		    return $initArray;
		}
		add_filter( 'tiny_mce_before_init', 'custom_editor_settings' );
