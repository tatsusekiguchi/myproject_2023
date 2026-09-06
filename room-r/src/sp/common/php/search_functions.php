<?php
/**
 * 物件検索関連の関数
 */

/**
 * 検索条件の入力テーブルを出力します
 * @param object $PC
 * @param array $params
 */
function echo_search_table($PC, $params){
	include(dirname(__FILE__)."/tpl/search_table.php");
}

/**
 * 検索結果のラインを出力します
 * @param object $PC
 * @param array $bukken
 */
function echo_list_articles($PC, $bukken){
	include(dirname(__FILE__)."/tpl/list_articles.php");
}
