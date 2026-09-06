##スクリプトのURL / ※基本的にここは変更しなくてOKです
$config{"url"} = 'http://' . $ENV{'SERVER_NAME'} . $ENV{'SCRIPT_NAME'};

##リファラードメインチェック / ドメインチェックをしない場合は行頭に半角＃を入れてください
$config{"domain"} = $ENV{'HTTP_HOST'};

##全文英語のスパム候補を除外(0:除外 / 1:除外しない)
$config{"english_spam"} = 0;

##リンク系スパム候補を除外(0:除外 / 1:除外しない)
$config{"link_spam"} = 0;

##sendmailのパス
$config{"sendmail"} = '/usr/sbin/sendmail';

##フォームからの送信先 設定したほうの先頭の#を削除してください
# ひとつの場合 
#@mailto = ('yoyaku_info@doctor-naito.com');
# 複数の場合 (シングルクォートでくくったメールアドレスをカンマで区切って指定)
@mailto = ('yoyaku_info@doctor-naito.com','naito-c@dolphin.ocn.ne.jp','doctor-kazu@joy.ocn.ne.jp');

##フォームからの差出人
$config{"mailfrom"} = $mailto[0];

##フォームの差出人名
$config{"fromname"} = '株式会社';

##サンクスページのURL
$config{"thanks_url"} = '../../thanks_two.html';

##サンクスページに通し番号を渡す(1:ON / 0:OFF)
$config{"thanks_serial"} = 1;

##入力時間の平均時間をHTMLに表示する場合の書式
$config{"input_time_format"} = '<p>このフォームの入力にはおおよそ <strong><avg></strong> 程度掛かります。</p>';

##自動返信メールに通し番号を付けるかどうか(1:つける / 0:つけない)
$config{"return_subject_serial"} = 1;

##通し番号に日付を付けるかどうか(1:つける / 0:つけない)
$config{"return_subject_serial_date"} = 1;

##ログファイルのパス
#$config{"log_file"} = 'postlog.cgi';

##ログファイルのパスワード
#$config{"password"} = 'password';

##送信有効期限 ※有効期限を設定する場合はエラーページを用意して下さい。
##期限の書式は YYYY-MM-DD HH:MM:SS です。
##受付開始日時
#$config{"expires_break"} = '2009-01-22 06:21:00';
##受付終了日時
#$config{"expires"} = '2009-03-22 06:30:00';

##送信有効期限をHTMLに表示する場合の書式
$config{"expires_time_format"} = '<p class="expires">このフォームは <strong><expires></strong> で締め切りとさせて頂きます。</p>';
$config{"expires_time_timeout"} = '<p class="expires">このフォームの送信は <expires> で既に締め切りました。</p>';
$config{"expires_time_break"} = '<p class="expires">このフォームからのご応募は <expires> から開始いたします。</p>';

##送信数制限 ※送信数制限を設定する場合はエラーページを用意して下さい。
#$config{"limit"} = 100;

##送信数制限をHTMLに表示する場合の書式
$config{"limit_format"} = '<p class="limit">残り応募数はあと <strong><limit></strong> 枠です。</p>';
$config{"limit_over"} = '<p class="limit"><strong>このフォームの応募数を超えました。</strong></p>';

##エラーページURL
#$config{"error_url"} = 'error.html';

##設置者に届くメールの件名
$config{"subject"} = '初診相談予約';

##設置者に届くメールの本文整形 / 自動生成の場合 NULL / 特殊整形文字 <resbody>:送信内容一式 / <date>:日付 / <serial>:通し番号 / <input_time>:入力秒
$config{"posted_body"} = <<'__posted_body__';
<date>
初診相談予約フォームより以下のメールを受付ました。
────────────────────────────────────
受付番号：<serial>
入力時間：<input_time>
　送信元：<http_referer>
<resbody>
────────────────────────────────────

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
　　内藤メディカルクリニック
　　愛知県名古屋市中区正木4丁目8番7号れんが橋ビル5階
　　TEL:052-681-1732  FAX:052-681-6760
　　E-mail: naito-c@dolphin.ocn.ne.jp
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
__posted_body__

##送信者に届く自動返信メールの件名
$config{"return_subject"} = '【内藤メディカルクリニック】お問い合わせありがとうございます。';

##送信者に届く自動返信メールの本文 / 特殊整形文字 <resbody>:送信内容一式 / <date>:日付 / <input_time>:入力秒
$config{"return_body"} = <<'__return_body__';
<お名前> 様
────────────────────────────────────

この度はお問い合わせいただきまして誠にありがとうございます。
内容を確認いたしまして、改めて担当者よりご連絡いたしますので、
今しばらくお待ち頂けますようお願いいたします。

─ご送信内容の確認───────────────────────────
<resbody>
────────────────────────────────────

お急ぎの場合は、大変お手数ですが下記連絡先まで
お電話にてご連絡下さいますようお願いいたします。

また、このメールに心当たりの無い場合は、このメールを破棄して
頂くとともにお手数ですが下記連絡先までお問い合わせ下さい。

この度はお問い合わせ重ねてお礼申し上げます。

━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
　　内藤メディカルクリニック
　　愛知県名古屋市中区正木4丁目8番7号れんが橋ビル5階
　　TEL:052-681-1732  FAX:052-681-6760
　　E-mail: naito-c@dolphin.ocn.ne.jp
　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　
━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━
__return_body__

##件名につける通し番号用ファイル
$config{"serial_file"} = 'serial.dat';

##入力時間の合計を記憶するファイル
$config{"input_time_file"} = 'time.dat';

##コンバージョンレート算出用ログファイル
$config{"conversion_file"} = 'unique.dat';

