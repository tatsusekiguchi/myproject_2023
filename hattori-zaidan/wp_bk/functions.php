<?php

//
//	ヘッダ出力
//
//		(1).「Access-Control-Allow-Origin」を出力する。
//			JavaScriptから「wwwなし」でアクセスした場合に、自動的にWordPressが「wwwあり」に転送するため、
//			クロスサイトとなってしまい、ブラウザがアクセスを拒否してしまうので、ここで許可する。
//
add_action('send_headers', 'hz_send_header');
function hz_send_header()
{
	try
	{
		//	「Access-Control-Allow-Origin」を出力する。
		header('Access-Control-Allow-Origin: *');

		//	正常終了。
		return true;
	}

	catch (Exception $e)
	{
		//	異常終了。
		return false;
	}

	finally
	{
	}
}

?>
