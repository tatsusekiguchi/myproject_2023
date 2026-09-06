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

// メールフォームのセレクトボックスに選択肢を入れる
function mw_wp_form_choices( $choices, $name ) {
    // 現在の投稿IDを取得
    $post_id = get_the_ID();

    // content の選択肢を設定
    if (isset($name['name']) && $name['name'] === 'content') {
        $group_values = SCF::get('gr_entry_form_content', $post_id);
        foreach ($group_values as $group_value) {
            if (isset($group_value['entry_form_content'])) {
                $choices[$group_value['entry_form_content']] = $group_value['entry_form_content'];
            }
        }
    }

    // date の選択肢を設定
    if (isset($name['name']) && $name['name'] === 'date') {
        $group_values = SCF::get('gr_entry_form_date', $post_id);
        foreach ($group_values as $group_value) {
            if (isset($group_value['entry_form_date'])) {
                $choices[$group_value['entry_form_date']] = $group_value['entry_form_date'];
            }
        }
    }

    // job の選択肢を設定
    if (isset($name['name']) && $name['name'] === 'job') {
        $group_values = SCF::get('gr_entry_form_job', $post_id);
        foreach ($group_values as $group_value) {
            if (isset($group_value['entry_form_job'])) {
                $choices[$group_value['entry_form_job']] = $group_value['entry_form_job'];
            }
        }
    }

    return $choices;
}
add_filter( 'mwform_choices_mw-wp-form-6057', 'mw_wp_form_choices', 10, 2 );

?>
