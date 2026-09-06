<?php
//
//					[ page-faq.php ]
//
//				Programmed by Yoshinori Shinoda
//				 Computer for WEB System
//				  Language of PHP
//
//													DATE: 2023/01/28
//
//	Copyright (C) 2023- Patentic Software Co.,Ltd All rights reserved.
?>

<?php

include(TEMPLATEPATH . '/inc_common.php');

//	表示件数
define('VIEW_NUMBERS_NOTE', 4);

//
//	定数定義
//

//	添付PDF数
define('ATTACH_PDF_NUMBERS', 3);

//
//	メイン実行
//
main();

//
//	メイン・ルーチン
//
function main()
{
	try
	{
		//	「FAQ」を検索する。
		query_posts(sprintf('category_name=note&post_status=publish&posts_per_page=%d&order=desc', VIEW_NUMBERS_NOTE));

		//	投稿を先頭に戻す。
		rewind_posts();

		//	投稿を走査する。
		while (have_posts())
		{
			//	投稿情報を取得する。
			the_post();

			//	投稿IDを取得する。
			$postid = get_the_id();

			//	登録されているPDFを取得する。
			$embcode = get_post_meta($postid, 'EMBDED_CODE', true);

			//	レコードを出力する。
			//	レコードを出力する。
			$format = [];
			$format[] = '%d';		//	投稿ID
			$format[] = '%s';		//	埋め込みコード
			print sprintf
			(
				  implode("\t", $format)
				, $postid
				, $embcode
			);
			print("\n");
		}

		//	正常終了。
		return true;
	}

	catch (Exception $e)
	{
		//	正常終了。
		return false;
	}

	finally
	{
	}
}

?>
