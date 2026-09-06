<?php
/*
Template Name: 資料請求フォーム
*/
?>
<?php get_header(); ?>
	<!-- ▽メイン▽-->
	<main class="main" id="request">
		<div class="pageKvPanel">
			<div class="pageKvTitle">
				<h1>資料請求</h1>
			</div>
		</div>
		<div class="mainContainer">
			<div class="secWrap01">
				<div class="pageSecTtl">
					<p class="secTtl">資料請求</p>
					<p class="futura">Request Documents</p>
				</div>
				<div class="sec01">
					<div class="pageSecTtlSub gothic">
						<h2>パンフレット（無料）にて送付いたします。</h2>
					</div>
					<div class="txt">
						<p>ご希望の方へ当院のパンフレットを無料にて送付させていただきます。<br>※日本国内の方にのみ発送させて頂いております。<br>海外在住の方につきましては、日本国内在住の友人や知人、ご家族の方から資料請求くださいますようお願い致します。</p>
					</div>
				</div>
				<div class="sec02">
					<div class="secContainer">
						<div class="pageSecTtlSub gothic">
							<h2>電話でのお問い合わせ</h2>
						</div>
						<div class="txt">
							<p>パンフレット送付をご希望の方はお電話にて承ります。お気軽にお問い合わせ下さい。<br>受付時間にどうしてもお電話ができない場合は下記メールフォームよりお問い合わせください。</p>
						</div>
						<div class="telBox">
							<dl>
								<dt>電話でのお問合わせ</dt>
								<dd>
									<div class="tel futura"><a href="tel:0120681731">
											<p>0120-681-731</p>
										</a></div>
									<div class="attention gothic">
										<p>受付時間：8：15 ～16：00　休診日：日祝日<br>※土曜は12：00迄となります。</p>
									</div>
								</dd>
							</dl>
						</div>
					</div>
				</div>
				<div class="sec03">
					<div class="pageSecTtlSub gothic">
						<h2>メールでのお問い合わせ</h2>
					</div>
					<div class="topTxt">
						<div class="txt">
							<p>お使いの端末の利用環境等によってフォームから送信できない場合については、お手数ですが当院までお電話頂ますようお願い致します。<br>現在できる限りお電話での資料請求をお願いしております。お電話でのご請求にご協力ください。</p>
						</div>
					</div>
					<div class="formBox">
						<?php echo do_shortcode( '[contact-form-7 id="36" title="お問い合わせフォーム"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</main>
	<!-- △メイン△-->
<?php get_footer(); ?>