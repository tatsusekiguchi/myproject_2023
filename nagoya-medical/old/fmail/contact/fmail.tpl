<!doctype html>
<html lang="ja">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<meta http-equiv="Content-Script-Type" content="text/javascript" />
		<meta http-equiv="Content-Style-Type" content="text/css" />
		<title>Fmail | <!--%%fmail-printable-area-title%%--></title>
		<meta name="revisit_after" content="7 days" />
		<meta name="robots" content="ALL" />
		<meta http-equiv="pragma" content="no-cache" />
		<link rel="index" href="index.html" />
		<meta name="Description" content="fmail <!--%%fmail-printable-area-ver%%-->" />
		
		<!-- [ Fmail Include Files ] -->
		<link rel="stylesheet" href="./commons/_include.css" type="text/css" />
		<link rel="stylesheet" href="./fmail.lib/fmail.css" type="text/css" />
		<link rel="stylesheet" href="./fmail.lib/smoothness/jquery-ui-1.10.1.custom.css" type="text/css">
		<script type="text/javascript" src="./fmail.lib/jquery_reader.js" charset="utf-8"></script>
		<script type="text/javascript" src="./fmail.lib/jquery-ui-1.10.1.custom.js" charset="utf-8"></script>
		<script type="text/javascript" src="./fmail.lib/jquery_autoKana.js" charset="utf-8"></script>
		<script type="text/javascript" src="./fmail.postcode.cgi?js" charset="utf-8"></script>
		<script type="text/javascript" src="./fmail.lib/fmail.js" charset="utf-8"></script>
		<script type="text/javascript" src="./fmail.lib/fmail.formlog.js" charset="utf-8"></script>
		<script type="text/javascript" src="./fmail.lib/gcalendar-holidays.js" charset="utf-8"></script>
		<script type="text/javascript" src="./fmail.lib/datepicker.js" charset="utf-8"></script>
<!--%%fmail-addcss%%-->
		<!-- [ Fmail Include Files EOF ] -->
		
		<script>
			$(document).ready(function(){
				$.fn.autoKana('#en1240790859', '#en1240790885', {katakana:true});
			});
		</script>
		
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-YQN83K9VQZ"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-YQN83K9VQZ');
</script>
</head>
	<body>
		<!--%%fmail-thanks-contents-start%%-->
			アフィリエイト用のタグ。不要な場合は削除してください
			$afiri1_tag
			$afiri2_tag
			$afiri3_tag
			$afiri4_tag
			$afiri5_tag
		<!--%%fmail-thanks-contents-end%%-->

		<div id="wrapper">
			<div id="header">
				<h1 id="title">タイトル</h1>
			</div>
			
			<div id="contents">
				<!--%%fmail-invisible-contents-start%%-->
					入力画面のみ出力
				<!--%%fmail-invisible-contents-end%%-->
				
				<h2><!--%%fmail-printable-area-title-body%%--></h2>
				<!--%%fmail-printable-area-error%%-->
				<!--%%fmail-printable-area-body%%-->
			</div>
			
			<div id="footer">
				<span>フッター</span>
			</div>
		</div>
		
		
		<!--%%fmail-invisible-contents-start%%-->
			入力画面のみ出力　不要なら削除
		<!--%%fmail-invisible-contents-end%%-->
		
		<!--%%fmail-error-contents-start%%-->
			エラー画面のみ出力　不要なら削除
		<!--%%fmail-error-contents-end%%-->
		
		<!--%%fmail-confirm-contents-start%%-->
			確認画面画面のみ出力　不要なら削除
		<!--%%fmail-confirm-contents-end%%-->
		
		<!--%%fmail-thanks-contents-start%%-->
			送信完了画面のみ出力　不要なら削除<br />
			値引継したい場合、<span class="fmail_caution">&lt;ID名&gt;</span>と記述。<br />
			分類→<en1248700237><br />
			<br />
			引継した値をURLエンコードする場合は、IDを&lt;<span class="fmail_caution">urlenc_</span>ID名&gt;と記述。<br />
			分類→<urlenc_en1248700237><br />
			<br />
			URLエンコードは例えば、GA解析の仮想URLなどで活用します。（送信完了画面で、ソースをご確認ください）<br />
			<span class="fmail_caution">設置事例ですので、本番実装時は、これらの記載は削除しておいてください。</span>
			
		<!--%%fmail-thanks-contents-end%%-->
		
	</body>
</html>