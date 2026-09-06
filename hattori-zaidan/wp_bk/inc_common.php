<?php
//
//					[ common.php ]
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

//
//	添付ファイル群を取得する。
//
function CommonGetAttFiles($postid, $attname, $comname, $attmax)
{
	try
	{
		//	添付ファイルの一覧を初期化する。
		$atts = [];
		$coms = [];

		//	添付ファイル数を走査する。
		for ($att = 0; $att < $attmax; $att++)
		{
			//	添付ファイルのカスタムフィールド名を作成する。
			$attid = sprintf('%s%02d', $attname, $att);

			//	添付ファイルを取得する。
			$attmh = get_post_meta($postid, $attid, true);

			//	添付ファイルが登録されていない場合は次へ。
			if ($attmh == '')
				continue;

			//	添付ファイルのパスを取得する。
			$attmd = wp_get_attachment_url($attmh);

			//	添付ファイルのパスを登録する。
			$atts[] = $attmd;

			//	添付ファイルのコメントのカスタムフィールド名を作成する。
			$comid = sprintf('%s%02d', $comname, $att);

			//	添付ファイルのコメントを取得する。
			$commmh = get_post_meta($postid, $comid, true);

			//	添付ファイルのパスを登録する。
			$coms[] = $commmh;
		}

		//	登録可能な添付ファイル数分の要素を初期化する。
		for ($att = count($atts); $att < $attmax; $att++)
		{
			$atts[$att] = '';
			$coms[$att] = '';
		}

		//	取得した添付ファイルの一覧を返す。
		return [ $atts, $coms ];
	}

	catch (Exception $e)
	{
		//	正常終了。
		return [];
	}

	finally
	{
	}
}

//
//	テキストをエンコードする。
//
function CommonEncodeText($content)
{
	try
	{
		//	「\」をエンコードする。
		$content = preg_replace('/\\\\/', '\\', $content);

		//	「改行」をエンコードする。
		$content = preg_replace('/(\\r|\\n)/', '\\n', $content);

		//	取得した添付ファイルの一覧を返す。
		return $content;
	}

	catch (Exception $e)
	{
		//	正常終了。
		return '';
	}

	finally
	{
	}
}

?>
