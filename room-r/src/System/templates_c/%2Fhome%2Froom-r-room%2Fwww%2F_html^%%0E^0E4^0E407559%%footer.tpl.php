<?php /* Smarty version 2.6.26, created on 2016-07-01 10:41:35
         compiled from footer.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'date_format', 'footer.tpl', 87, false),)), $this); ?>
	<div id="footer">
		<div class="inner w980 mra mla">
			<div class="contact">
				<p>空室状況など、お気軽にお問合せください。</p>
				<div class="mt15"><img src="<?php echo @WEB_ROOT; ?>
/src/img/footer/tel.png" alt="TEL 0120-99-7376" /></div>
				<p class="mt15 fz12">10:00-19:00／定休日：毎週水曜日</p>
				<div class="b"><a href="<?php echo @WEB_ROOT; ?>
/contact.html" class="fade_on_hover"><img src="<?php echo @WEB_ROOT; ?>
/src/img/footer/b_01.png" alt="ご予約・お問合せ" /></a></div>
			</div>
			<div class="pagetop"><a href="#wrapper" class="fade_on_hover"><img src="<?php echo @WEB_ROOT; ?>
/src/img/footer/pagetop.png" alt="このページの先頭へ" /></a></div>
			<ul class="nav mt70">
				<li><a href="<?php echo @WEB_ROOT; ?>
/area.html" class="tdu">エリア検索</a></li>
				<li><a href="<?php echo @WEB_ROOT; ?>
/search.html" class="tdu">条件検索</a></li>
				<?php if ($this->_tpl_vars['cnf']['login_flg']): ?>
				<li><a href="<?php echo @WEB_ROOT; ?>
/line.html" class="tdu">沿線検索</a></li>
				<?php endif; ?>
				<li><a href="<?php echo @WEB_ROOT; ?>
/store.html" class="tdu">店舗紹介</a></li>
				<li><a href="<?php echo @WEB_ROOT; ?>
/info/" class="tdu">新着ニュース</a></li>
			</ul>
			<p class="mt30 fz12 lh200">

				<?php 
				$location = $this->get_template_vars("location");
				switch ($location) {
					case 'area':
				 ?>愛知県名古屋市の人気エリアから、お気に入りのデザイナーズ賃貸マンションを検索しよう！デザイナーズマンションを専門に扱うroomRroom(ルームRルーム)は、名古屋駅前・大曽根・栄・大須・金山・鶴舞・千種・覚王山・高岳・車道など、住みたい場所から、選りすぐりの賃貸情報を探すことができます。交通の便が良いエリア、買い物が便利なエリア、閑静な住宅街エリア、治安のよいエリアなど、理想の暮らしに一番近いエリアをご紹介しますので、理想の住環境がございましたら、お問い合わせフォームかお電話で名古屋のroomRroom(ルームRルーム)にお問い合わせください。住みたいエリアが定まっていない方でも、お問合せいただければ、希望のあなたにピッタリのエリアの物件情報をご紹介いたします。
				<?php 
						break;
					case 'search':
				 ?>愛知県名古屋市内のデザイナーズマンションの賃貸情報を、家賃は5万円台の手の届きやすい物件から30万円台～の高級賃貸物件まで、間取りは一人暮らし向けの1R・1K・1DK・1LDKから二人暮らし向けの2LDKやファミリー向けの3LDKまで、エリアは、名古屋市内の人気エリアを中心に、条件を絞って希望に合ったデザイナーズ物件情報をお探しいただけます。条件検索でお気に入りの物件を発見したら、お問い合わせフォームかお電話でお問い合わせください。サイトに掲載していない物件からも、スタッフが条件に沿った物件をお探しいたします。もちろん、roomRroom(ルームRルーム)の店舗でもお待ちしておりますので、名古屋でデザイナーズ賃貸を探している方は、お気軽にお越しください。
				<?php 
						break;
					case 'store':
				 ?>愛知県名古屋市内のデザイナーズマンションの賃貸を専門に、賃貸物件情報をお届けするroomRroom(ルームRルーム)のスタッフが、名古屋で一人暮らしを始めたいあなたをサポートします。「ペットと暮らしたい」「安心して住みたい」「おしゃれに暮らしたい」など、お客様一人ひとりの理想のお部屋を叶えられるよう、選りすぐりのデザイナーズマンションをご紹介いたします。転勤や就職で名古屋に引っ越してきたばかりで、名古屋の賃貸事情が分からない方でも、名古屋の賃貸事情に精通したスタッフが新しい暮らしをサポートいたします。ぜひ名古屋市・丸の内駅近くのアットホームな店舗にお越しください。
				<?php 
						break;
					case 'info':
				 ?>名古屋のデザイナーズ賃貸専門のroomRroom(ルームRルーム)のスタッフが、新着ニュースをお届けします。名古屋市内で暮らす方にオススメのお食事どころ、スタッフオススメのデザイナーズ賃貸マンション、空室情報、お部屋探しのお役立ち情報など、耳より情報が満載です。アットホームなroomRroom(ルームRルーム)スタッフの日常ものぞき見できちゃいます。名古屋暮らしの情報やroomRroom(ルームRルーム)の最新ニュースはこちらをご確認ください。
				<?php 
						break;
					case 'feature':
						if(isset($_GET["f"])){
							switch ($_GET["f"]) {
								case 7:
							 ?>名古屋のデザイナーズ賃貸マンション専門のroomRroom(ルームRルーム)では、ワンランク上の上質な暮らしを叶える高級賃貸物件を特集しております。ワンランク上の居住空間は、住む人に、優雅さや快適さだけでなく、自信を与えてくれます。立地条件や設備が優れたデザイナーズマンションの賃貸情報の中から、選りすぐりのハイグレードな賃貸マンションをご案内させていただきます。間取り・家賃・最寄り駅などの条件から、理想のお部屋をお探しいただけます。ハイレベルな暮らしを叶えるなら、名古屋のroomRroom(ルームRルーム)にお任せください。
							<?php 
									break;
								case 3:
							 ?>名古屋のデザイナーズマンションの賃貸を専門とするroomRroom(ルームRルーム)では、女性が安心して暮らすことができる、駅近の女性向けデザイナーズ賃貸マンションをご紹介いたします。オートロック、インターホン、独立洗面台など、女性にうれしいお部屋条件がそろった賃貸情報をピックアップしております。間取り・家賃・最寄り駅などから条件を絞って、理想のお部屋をお探しいただけます。女性のお部屋探しでは、「キッチンが広い物件」「収納スペースが広い物件」「TVインターホンが備わった物件」など、女性ならではのこだわりが付きものです。希望の条件や気になる物件については、電話かメールでもお問い合わせ可能ですので、名古屋のroomRroom（ルームRルーム）へお気軽にご相談ください。
							<?php 
									break;
								case 0:
							 ?>名古屋のデザイナーズマンションの賃貸を専門とするroomRroom(ルームRルーム)では、「ペットを飼いたい！」「大好きなペットと暮らしたい！」という願いを叶える名古屋のペット可物件を特集します。「実家でペットを飼えなかったから」「一人暮らしが寂しいから」「帰宅した時に癒されたいから」など、賃貸物件でペットを飼うことを希望する人は多いですが、ペットOKな賃貸は限られています。ペット可物件特集では、ペットOKの物件の中から、間取り・家賃・立地を絞ってお探しいただけます。気になる物件がございましたら、お気軽に名古屋のroomRroom(ルームRルーム)にお問い合わせください。
							<?php 
									break;
								case 2:
							 ?>名古屋のデザイナーズマンションの賃貸を専門とするroomRroom(ルームRルーム)では、早いもの勝ちの新築デザイナーズマンションの賃貸情報を特集しております。築1年未満・未入居のキレイな物件で、理想の暮らしを叶えましょう！新築物件では、一番最初の入居者になれるというメリットだけでなく、最新の時代のニーズを取り込んでいるため、最近人気の設備が備わっていることが多いというメリットもあります。新築物件特集では、間取り・家賃・立地などの条件から、希望の新築物件をお探しいただけます。気になる物件がございましたら、お気軽に名古屋のroomRroomにお問い合わせください。
							<?php 
									break;
							}
						}
						break;
					case 'company':
				 ?>名古屋でデザイナーズマンション・アパートを探すなら、roomRroom(ルームRルーム)の会社概要はこちらをご覧ください。愛知県丸の内を中心にマンションの売買・新築中古戸建ての売買および仲介など不動産事業を行うHOMEmadeHOME株式会社は、デザイナーズ賃貸のマンション専門に扱うroomRroom(ルームRルーム)を運営しております。
				<?php 
						break;
					case 'contact':
				 ?>名古屋でデザイナーズマンションをお探しの方は、デザイナーズマンションの賃貸を専門とするroomRroom(ルームRルーム)にお気軽にお問い合わせください。気になる物件の空室状況やお部屋情報から、住みたいエリアのオススメの物件まで、名古屋エリアに精通したスタッフがお答えいたします。サイトに載っていない物件情報もございますので、条件をお伝えいただければ、スタッフが選りすぐりの物件の中から、理想を叶えるお部屋をお探しいたします。roomRroom(ルームRルーム)のスタッフ一同、みなさまのお問い合わせを心よりお待ちしております！
				<?php 
						break;
					case 'privacy':
				 ?>名古屋のデザイナーズマンションの賃貸を専門とするroomRroom(ルームRルーム)では、プライバシーポリシーに基づき、お客様の大切な個人情報の保護に努めます。名古屋でデザイナーズ賃貸マンション・アパートを探すならroomRroom（ルームRルーム)へお気軽にご相談ください。
				<?php 
						break;
					default:
				 ?>
				名古屋でデザイナーズ賃貸マンション・アパートを探すならroomRroom（ルームRルーム）。デザイナーズマンションの豊富な物件情報の中から、住みたい賃貸や路線・駅・通勤時間・間取り・家賃・ペット可など様々な条件を絞込み、あなたにピッタリの理想のお部屋をお届けします。女性に安心・安全なおすすめの物件をスピーディで簡単に探せる賃貸情報サイトです。大須・栄・金山・大曾根・千種・覚王山など、名古屋市内の人気エリアを中心に最新の物件情報を掲載しております。気になるデザイナーズマンションの賃貸情報については、電話かメールでもお問い合わせ可能ですので、roomRroom（ルームRルーム）へお気軽にご相談ください。サイトに掲載されている賃貸情報の他にも、ご紹介できるマンションの情報がございますので、希望の条件の物件がなかなか見つからない方も、名古屋のデザイナーズマンション事情に精通したスタッフにお任せください。後悔のないお部屋探しをサポートします。
				<?php 
						break;
				}
				 ?>
			</p>
			<div class="ovh mt40">
				<ul class="fll fz12">
					<li class="dib" style="padding-right:15px;"><a href="<?php echo @WEB_ROOT; ?>
/company.html" class="tdu">会社概要</a></li>
					<li class="dib" style="padding-right:15px;"><a href="<?php echo @WEB_ROOT; ?>
/privacy.html" class="tdu">プライバシーポリシー</a></li>
				</ul>
				<div class="fll fz13">Copyright &copy; <?php echo ((is_array($_tmp=time())) ? $this->_run_mod_handler('date_format', true, $_tmp, '%Y') : smarty_modifier_date_format($_tmp, '%Y')); ?>
 roomRroom. All Rights Reserved.</div>
			</div>
		</div><!-- .inner -->
	</div><!-- #footer -->
	<div id="side_bnr"><a href="<?php echo @WEB_ROOT; ?>
/contact.html" class="fade_on_hover"><img src="<?php echo @WEB_ROOT; ?>
/src/img/contact.png" alt="掲載以外のHP非公開物件もご紹介可能！" /></a></div>
</div><!-- #wrapper -->
<!-- ▼YAHOO!TM▼ -->
<script type="text/javascript">
  (function () {
    var tagjs = document.createElement("script");
    var s = document.getElementsByTagName("script")[0];
    tagjs.async = true;
    tagjs.src = "//s.yjtag.jp/tag.js#site=eeiUMYN";
    s.parentNode.insertBefore(tagjs, s);
  }());
</script>
<noscript>
  <iframe src="//b.yjtag.jp/iframe?c=eeiUMYN" width="1" height="1" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
</noscript>

<!-- ▼Google Remarketing▼ -->
<script type="text/javascript">
/* <![CDATA[ */
var google_conversion_id = 938392328;
var google_custom_params = window.google_tag_params;
var google_remarketing_only = true;
/* ]]> */
</script>
<script type="text/javascript" src="//www.googleadservices.com/pagead/conversion.js">
</script>
<noscript>
<div style="display:inline;">
<img height="1" width="1" style="border-style:none;" alt="" src="//googleads.g.doubleclick.net/pagead/viewthroughconversion/938392328/?value=0&amp;guid=ON&amp;script=0"/>
</div>
</noscript>

</body>
</html>