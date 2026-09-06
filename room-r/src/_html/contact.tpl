<!--{include file='header_subpage.tpl'}-->
<script type="text/javascript" src="src/js/yubinbango.js"></script>
	<div id="main">
		<div class="inner">
			<div class="topicpath w980 mra mla">
				<span><a href="<!--{$smarty.const.WEB_ROOT}-->/">HOME</a></span>
				<span>＞ ご予約・お問合せ</span>
			</div><!-- .topicpath -->
			<h2 class="tac"><img src="src/img/contact/h_01.png" alt="ご予約・お問合せ" /></h2>
			<div class="form mt25">
				<form action="contact.html<!--{if !empty($hid)}-->?h=<!--{$hid}--><!--{/if}-->" method="post" class="h-adr">
					<div class="inner">
<!--{$form_content}-->
					</div><!-- .inner -->
				</form>
			</div><!-- .form -->
		</div><!-- .inner -->
	</div><!-- #main -->

<!--{include file='footer.tpl'}-->
