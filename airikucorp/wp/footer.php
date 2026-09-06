<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage org
 * @since org 1.0
 */

?>
<div class="footer">

        <div class="footContact">
            <div class="contactBox">
                <div class="secWrap01">

                    <div class="secTtlBox flBox">
                        <div class="secTtl">
                            <h2 class="">ENTRY</h2>
                            <p class="sub">エントリー</p>
                        </div>
                        <div class="txtBox">
                            <h3 class="fg">出張面接・WEB面接対応OK！</h3>
                            <p class="pcBreak">愛陸商事株式会社リクルートのエントリーはこちら。</p>
                        </div>
                    </div>

                    <div class="btnBox">
                       <div class="ul flBox">

                           <div class="li">
                               <div class="telBox">
                                   <a href="tel:0568-44-1221">
                                       <div>
                                          <p class="tel fg em">tel.<span>0568-44-1221</span></p>
                                          <p class="txt fg">
                                          受付時間：8：30～17：30 （土・日・祝日休み）
                                          </p>
                                       </div>
                                   </a>
                               </div>
                           </div>

                           <div class="li">
                               <div class="entryBox">
                                   <a href="<?php echo home_url(); ?>/entry">
                                       <div>
                                          <p class="fg em">ENTRY 応募フォーム</p>
                                       </div>
                                   </a>
                               </div>
                           </div>

                       </div>
                        <p class="spBreak">愛陸商事株式会社リクルートのエントリーはこちら。</p>
                    </div>
                </div>
            </div>
        </div>

        <div id="pageTop">
            <p><span><img src="<?php echo home_url(); ?>/images/icon_pagetop.png" alt=""></span>PAGE TOP</p>
        </div>



        <div class="footBox">
            <div class="footWrap">
                <div class="logoBox flBox">
                    <div class="logo"><img src="<?php echo home_url(); ?>/images/footer_logo.png" alt="愛陸商事株式会社"></div>
                    <div class="addrBox">
                        <p>〒485-0074　愛知県小牧市新小木3-20</p>
                        <p><a href="tel:0568-41-1221">電話：0568-44-1221</a></p>
                        <p>FAX：0568-41-1500</p>
                    </div>
                </div>
                <div class="bnrBox">
                    <div class="ul flBox">
                        <div class="li">
                            <a href="https://my.ms-ins.com/page/?x=0000415525&n=airikushouji&m=3" target="_blank">
                                <div><img src="<?php echo home_url(); ?>/images/footer_bnr_01.png" alt=""></div>
                            </a>
                        </div>
                       <!-- <div class="li">
                            <a href="https://my.ms-ins.com/page/?x=0000415525&n=airikushouji&m=3" target="_blank">
                                <div><img src="<?php echo home_url(); ?>/images/footer_bnr_02.png" alt=""></div>
                            </a>
                        </div>-->
                    </div>
                </div>
                <div class="navBox spHidden">
                    <div class="ul flBox">
                        <div class="li">
                            <a href="<?php echo home_url(); ?>">
                                <div class="">
                                    <p>TOP</p>
                                </div>
                            </a>
                        </div>
                        <div class="li">
                            <a href="<?php echo home_url(); ?>/work">
                                <div class="">
                                    <p>仕事を知る</p>
                                </div>
                            </a>
                        </div>

                        <div class="li">
                            <a href="<?php echo home_url(); ?>/support">
                                <div class="">
                                    <p>働く環境</p>
                                </div>
                            </a>
                        </div>
                        <div class="li">
                            <a href="<?php echo home_url(); ?>/company">
                                <div class="">
                                    <p>会社概要</p>
                                </div>
                            </a>
                        </div>
                        <div class="li">
                            <a href="<?php echo home_url(); ?>/entry">
                                <div class="">
                                    <p>採用情報/応募フォーム</p>
                                </div>
                            </a>
                        </div>

                    </div>


                </div>
            </div>
        </div>

        <div class="entryBnr">
			<a href="<?php echo home_url(); ?>/insurance/"><img src="<?php echo home_url(); ?>/images/footer_bnr_entry.png" alt=""></a>
		</div>

        <p class="copy">© 2022 愛陸商事株式会社.</p>
    </div>

</div>
<script src="<?php echo home_url(); ?>/js/jquery.min.js"></script>
<script src="<?php echo home_url(); ?>/js/common.js"></script>
<script src="<?php echo home_url(); ?>/js/scrollAnimation.js"></script>

		<?php wp_footer(); ?>

	</body>
</html>
