<?php

function wpcf7_custom_item_error_position( $items, $result ) {
    $class = 'wpcf7-custom-item-error';
    $names = array('zip1','zip2');
    $processed_messeage = false;

    if ( isset( $items['invalid_fields'] ) ) {
        foreach ( $items['invalid_fields'] as $k => $v ) {
            $orig = $v['into'];
            $name = substr($orig, 0, strcspn($orig,':'));
            $name = substr( $name, strrpos($name, ".") + 1 );
            if ( in_array( $name, $names ) ) {
                if ($name == 'name' || $name == 'tel') {
                    if ($processed_messeage == true) {
                        unset($items['invalid_fields'][$k]);
                        continue;
                    } else {
                        $processed_messeage = true;
                    }
                }
                $items['invalid_fields'][$k]['into'] = ".{$class}.{$name}";
            }
        }
        $items['invalid_fields'] = array_values($items['invalid_fields']);
    }
    return $items;
}
add_filter( 'wpcf7_feedback_response', 'wpcf7_custom_item_error_position', 10, 2 );

function get_req_btn($type = null) {
    $html = '';
    $inner = (is_page('entry')) ? '' : home_url().'/entry';
    $args = array(
        'numberposts' => -1,
        'post_type' => 'req',
        'meta_key' => 'req_type',
        'meta_value' => $type,
        'order_by'  => 'menu_order',
    );
    $arr_posts = get_posts($args);
    if ($arr_posts) {
        foreach ($arr_posts as $k => $v) {
            $html .= '<div class="li">';
            $html .= '<div class="box">';
            $html .= '<a href="'.$inner.'#list'.$v->ID.'" class="more bold">';
            $html .= '<p>'.$v->post_title.'</p>';
            $html .= '</a> </div></div>';
        }
    }
    return $html;
}
function get_req_list($type = null) {
    $html = '';
    $args = array(
        'numberposts' => -1,
        'post_type' => 'req',
        'meta_key' => 'req_type',
        'meta_value' => $type,
        'order_by'  => 'menu_order',
    );
    $arr_posts = get_posts($args);
    if ($arr_posts) {
        foreach ($arr_posts as $k => $v) {
            $arr_list = get_field('arr_req', $v->ID);
            //var_dump($arr_list);
            if ($arr_list) {
                $html .= '<div class="box" id="list'.$v->ID.'">';
                $html .= '<h3 class="fg em">'.$v->post_title.'</h3>';
                $html .= '<div class="infoList">';
                foreach ($arr_list as $lk => $lv) {
                    $html .= '<div class="dl">';
                    $html .= '<div class="dt"><p>'.$lv['req_title'].'</p></div>';
                    $html .= '<div class="dd"><p>'.$lv['req_content'].'</p></div>';
                    $html .= '</div>';
                }
                $html .= '</div>';
                $html .= '</div>';
            }
        }
    }
    return $html;
}
add_action( 'template_redirect', 'is404_redirect' );
function is404_redirect() {
    if ( is_404() ) {
        wp_safe_redirect( home_url(), 301 );
        exit();
    }
}
function setHead() {
    $res = '';
    if (is_front_page() || is_home()) {
        $res .= '
<title>愛知県豊田市の派遣なら愛陸商事株式会社 | 物流会社から生まれた運送関連特化求人</title>
<meta name="keywords" content="豊田,愛知,派遣,求人,トヨタ,運送会社,事務,軽作業,正社員,物流,人材派遣,仕事,派遣会社,あいりく,愛陸商事,障害者,紹介予定派遣">
<meta name="description" content="物流会社から生まれた運送関連特化型総合人材派遣サービスの愛陸商事株式会社です。運送会社の事務、軽作業をはじめとした物流の派遣求人に強い会社です。トヨタ関連のお仕事がメインですので安定した業務内容でご紹介いたします。">
';
    } elseif (is_page('work')) {
        $res .= '
<title>仕事を知る |愛知県豊田市の派遣なら愛陸商事株式会社 | 物流会社から生まれた運送関連特化求人</title>
<meta name="keywords" content="作業,豊田,愛知,派遣,求人,トヨタ,運送会社,事務,軽作業,正社員,物流,人材派遣,仕事,派遣会社,あいりく,愛陸商事,障害者,紹介予定派遣">
<meta name="description" content="仕事は主に愛知陸運および協力会社等での勤務です。詳しい職種について紹介いたします。">
';
    } elseif (is_page('suport')) {
        $res .= '
<title>働く環境 |愛知県豊田市の派遣なら愛陸商事株式会社 | 物流会社から生まれた運送関連特化求人</title>
<meta name="keywords" content="環境,豊田,愛知,派遣,求人,トヨタ,運送会社,事務,軽作業,正社員,物流,人材派遣,仕事,派遣会社,あいりく,愛陸商事,障害者,紹介予定派遣">
<meta name="description" content="お仕事をしていただく環境について紹介いたします。また障害者の方も積極採用を行っております。">
';
    } elseif (is_page('company')) {
        $res .= '
<title>会社概要 |愛知県豊田市の派遣なら愛陸商事株式会社 | 物流会社から生まれた運送関連特化求人</title>
<meta name="keywords" content="会社概要,豊田,愛知,派遣,求人,トヨタ,運送会社,事務,軽作業,正社員,物流,人材派遣,仕事,派遣会社,あいりく,愛陸商事,障害者,紹介予定派遣">
<meta name="description" content="愛陸商事株式会社の会社概要を紹介いたします。">
';
    } elseif (is_page('entry')) {
        $res .= '
<title>採用情報応募 |愛知県豊田市の派遣なら愛陸商事株式会社 | 物流会社から生まれた運送関連特化求人</title>
<meta name="keywords" content="応募,お問い合わせ,豊田,愛知,派遣,求人,トヨタ,運送会社,事務,軽作業,正社員,物流,人材派遣,仕事,派遣会社,あいりく,愛陸商事,障害者,紹介予定派遣">
<meta name="description" content="愛陸商事株式会社への派遣のお仕事の応募はこちらからお願いいたします。">
';
    } else {
        $res .= '
<title>愛知県豊田市の派遣なら愛陸商事株式会社 | 物流会社から生まれた運送関連特化求人</title>
<meta name="keywords" content="豊田,愛知,派遣,求人,トヨタ,運送会社,事務,軽作業,正社員,物流,人材派遣,仕事,派遣会社,あいりく,愛陸商事,障害者,紹介予定派遣">
<meta name="description" content="物流会社から生まれた運送関連特化型総合人材派遣サービスの愛陸商事株式会社です。運送会社の事務、軽作業をはじめとした物流の派遣求人に強い会社です。トヨタ関連のお仕事がメインですので安定した業務内容でご紹介いたします。">
';
    }

    return $res;
}
remove_action( 'add_option_new_admin_email', 'update_option_new_admin_email' );
remove_action( 'update_option_new_admin_email', 'update_option_new_admin_email' );

/**
 * Disable the confirmation notices when an administrator
 * changes their email address.
 */
function wpdocs_update_option_new_admin_email( $old_value, $value ) {

    update_option( 'admin_email', $value );
}
add_action( 'add_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );
add_action( 'update_option_new_admin_email', 'wpdocs_update_option_new_admin_email', 10, 2 );