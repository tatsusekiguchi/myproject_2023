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
		query_posts(sprintf('category_name=faq_other,faq_about,faq_shorui,faq_application&post_status=publish&posts_per_page=%d&order=desc', 99999));

		//	投稿を先頭に戻す。
		rewind_posts();

		//	投稿を走査する。
		while (have_posts())
		{
			//	投稿情報を取得する。
			the_post();

			//	投稿IDを取得する。
			$postid = get_the_id();

			//	記事のカテゴリを取得する。
			$cat = $cat = get_the_category();

			//	記事のカテゴリ名を取得する。
			$cname = urldecode($cat[0]->category_nicename);

			//	タイトルを取得する。
			$title = get_the_title();

			//	本文を取得する。
			$content = get_the_content();
			$content = CommonEncodeText($content);

			//	登録されているPDFを取得する。
			[ $pdfs, $pcomms ] = CommonGetAttFiles($postid, 'PDF', 'PCOMM', ATTACH_PDF_NUMBERS);

			//	レコードを出力する。
			$format = [];
			$format[] = '%d';		//	投稿ID
			$format[] = '%s';		//	カテゴリ
			$format[] = '%s';		//	タイトル
			$format[] = '%s';		//	本文
			$format[] = '%s';		//	PDF(1)
			$format[] = '%s';		//	PDF(2)
			$format[] = '%s';		//	PDF(3)
			$format[] = '%s';		//	PDF名(1)
			$format[] = '%s';		//	PDF名(2)
			$format[] = '%s';		//	PDF名(3)
			print sprintf
			(
				  implode("\t", $format)
				, $postid
				, $cname
				, $title
				, $content
				, $pdfs[0]
				, $pdfs[1]
				, $pdfs[2]
				, $pcomms[0]
				, $pcomms[1]
				, $pcomms[2]
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
