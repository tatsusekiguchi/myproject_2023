<?php
//
//					[ index.php ]
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

//	短縮タイトルの長さ
define('SHORT_TITLE_LENGTH', 20);

//	添付画像数
define('ATTACH_IMAGE_NUMBERS', 3);

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
		//	投稿IDを取得する。
		$pid = ((isset($_GET['pid'])) && (preg_match('/^\d+$/', $_GET['pid'])))
			? intval($_GET['pid'])
			: -1
			;

		//	検索条件を作成する。
		//	パラメータに投稿IDが指定されている場合は当該IDの記事のみを検索する。
		//	パラメータに投稿IDが指定されていない場合は全件を検索する。
		$cond =  ($pid >= 0)
			? sprintf('p=%d', $pid)
			: 'category_name=topics,important,newsrelease,2019年度,2020年度,2021年度,2022年度'
			;

		//	「News Release」を検索する。
		//	過去に作成された「2019年度」「2020年度」「2021年度」「2022年度」もまとめて検索する。
		//	ただし、年度は公開日をもとに計算で求める事とし、年度のカテゴリは使用しない。
		query_posts(sprintf('%s&post_status=publish&posts_per_page=%d&order=desc', $cond, 99999));

		//	現在時刻を取得する。
		$ntime = date_i18n('U');

		//	投稿を先頭に戻す。
		rewind_posts();

		//	投稿を走査する。
		while (have_posts())
		{
			//	投稿情報を取得する。
			the_post();

			//	投稿IDを取得する。
			$postid = get_the_id();

			//	更新日を取得する。
			$mdate = get_the_time('Y.m.d');

			//	「年度」を取得する。
			$fyear = GetFisicalYear(get_the_time('Y'), get_the_time('n'));

			//	記事のカテゴリを取得する。
			$cat = $cat = get_the_category();

			//	記事のカテゴリ名を取得する。
			$cname = urldecode($cat[0]->category_nicename);

			//	「ニュースの種類」オプションを取得する。
			$ntype = get_post_meta($postid, 'NEWSTYPE', true);

			//	「ニュースの種類」オプションの名称を取得する。
			$field = get_field_object( 'NEWSTYPE' );
			$nname = $field['choices'][$ntype];

			//	公開してからの日数を取得する。
			$ndays = GetPublicAfterDays($ntime, get_the_time('U'));

			//	タイトルを取得する。
			$title = get_the_title();

			//	短縮タイトルを作成する。
			$stitle = (mb_strlen($title) > SHORT_TITLE_LENGTH)
				? sprintf('%s...', mb_substr($title, 0, SHORT_TITLE_LENGTH))
				: $title
				;

			//	本文を取得する。
			$content = get_the_content();
			$content = CommonEncodeText($content);

			//	添付ファイルのパスを調整する。
			$content = preg_replace('/src="(http|https):\/\/hattori\-zaidan\.or\.jp\/wp\-content\/uploads\//i', 'src="/wp/wp-content/uploads/', $content);

			//	自サイトへのリンクを削除する。
			$content = preg_replace('/<a .*?href="(http|https):\/\/hattori\-zaidan\.or\.jp\/.+?>(.+?)<\/a>/i', '[$2]', $content);

			//	登録されている画像を取得する。
			[ $images, $icomms ] = CommonGetAttFiles($postid, 'IMAGE', 'ICOMM', ATTACH_IMAGE_NUMBERS);

			//	登録されているPDFを取得する。
			[ $pdfs, $pcomms ] = CommonGetAttFiles($postid, 'PDF', 'PCOMM', ATTACH_PDF_NUMBERS);

			//	レコードを出力する。
			$format = [];
			$format[] = '%d';		//	投稿ID
			$format[] = '%s';		//	公開日
			$format[] = '%d';		//	年度
			$format[] = '%s';		//	カテゴリ
			$format[] = '%s';		//	ニュースの種類
			$format[] = '%s';		//	ニュースの種類（名称）
			$format[] = '%d';		//	公開してからの日数
			$format[] = '%s';		//	タイトル
			$format[] = '%s';		//	短縮タイトル
			$format[] = '%s';		//	本文
			$format[] = '%s';		//	画像(1)
			$format[] = '%s';		//	画像(2)
			$format[] = '%s';		//	画像(3)
			$format[] = '%s';		//	画像コメント(1)
			$format[] = '%s';		//	画像コメント(2)
			$format[] = '%s';		//	画像コメント(3)
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
				, $mdate
				, $fyear
				, $cname
				, $ntype
				, $nname
				, $ndays
				, $title
				, $stitle
				, $content
				, $images[0]
				, $images[1]
				, $images[2]
				, $icomms[0]
				, $icomms[1]
				, $icomms[2]
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

//
//	「年度」を取得する。
//
function GetFisicalYear($year, $mon)
{
	try
	{
		//	「年」を数値化する。
		$year = intval($year);

		//	「月」を数値化する。
		$mon = intval($mon);

		//	1～3月は前年度とする。
		return ($mon <= 3)
			? $year -1
			: $year
			;
	}

	catch (Exception $e)
	{
		//	正常終了。
		return -1;
	}

	finally
	{
	}
}

//
//	公開してからの日数を取得する。
//
function GetPublicAfterDays($ntime, $mtime)
{
	try
	{
		//	公開してからの日数を計算する。
		$ndays = $ntime - $mtime;
		$ndays /= 60 * 60 * 24;
		$ndays = intval($ndays);

		return $ndays;
	}

	catch (Exception $e)
	{
		//	正常終了。
		return -1;
	}

	finally
	{
	}
}

?>
