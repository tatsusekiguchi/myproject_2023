<?php
/*
 Template Name: 採用情報/応募フォーム
 */
?>
<?php get_header(); ?>
<div class="entryMain main">
        <div class="kv">
            <div class="kvTtl">
                <h1 class="fg">ENTRY</h1>
                <div class="secTtl">
                    <p class="sub">採用情報/<br>
                        応募フォーム</p>
                </div>
            </div>
        </div>
        <div class="sec01 fadeUp">
            <div class="secWrap01">
                <div class="secTtlBox">
                    <h2 class="ttl em fg">応募の流れ</h2>
                </div>
                <div class="flowBox">
                    <div class="dl flBox">
                        <div class="dt">
                            <p class="em">ご応募</p>
                        </div>
                        <div class="dd">
                            <p>エントリーフォームもしくはお電話・公式LINEにてご応募ください。</p>
                        </div>
                    </div>
                    <div class="arrow"><img src="<?php echo home_url(); ?>/images/entry_arrow.png" alt=""></div>
                    <div class="dl flBox">
                        <div class="dt">
                            <p class="em">面接</p>
                        </div>
                        <div class="dd">
                            <p>WEB面接・出張面接にて行いますので直接お越しいただく必要はございません。</p>
                        </div>
                    </div>
                    <div class="arrow"><img src="<?php echo home_url(); ?>/images/entry_arrow.png" alt=""></div>
                    <div class="dl flBox">
                        <div class="dt">
                            <p class="em">お仕事依頼</p>
                        </div>
                        <div class="dd">
                            <p>専属のスタッフがあなたの経験・スキル・勤務条件にマッチした職種・企業をご紹介します。ご希望の条件等、どんどんご相談ください。</p>
                        </div>
                    </div>
                    <div class="arrow"><img src="<?php echo home_url(); ?>/images/entry_arrow.png" alt=""></div>
                    <div class="dl flBox">
                        <div class="dt">
                            <p class="em">就業</p>
                        </div>
                        <div class="dd">
                            <p>お仕事が決定しますと、弊社にて入社手続き後、派遣先企業での就業がスタートします。</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <div class="sec02 fadeUp">
            <div class="secWrap01">
                <div class="secTtlBox">
                    <h2 class="ttl em fg">募集要項</h2>
                </div>
                <div class="tabBox btnBox">
                    <p class="ttl em fg">今すぐ<span>募集要項</span>を見る</p>
                    <div class="ul flBox">
                    	<?php echo get_req_btn(1); ?>
                    	<?php echo get_req_btn(2); ?>
                    	<?php echo get_req_btn(3); ?>
                    	<?php echo get_req_btn(4); ?>
                    </div>
                </div>
                <div class="reqBox">
                	<?php echo get_req_list(1); ?>
                	<?php echo get_req_list(2); ?>
                	<?php echo get_req_list(3); ?>
                	<?php echo get_req_list(4); ?>
                </div>
                <div class="secTtlBox">
                    <h2 class="ttl em fg">エントリー</h2>
                </div>
                <div class="secTtlBox secTtlBoxMain">
                    <div class="secTtl">
                        <h2 class="">TEL/LINE</h2>
                        <p class="sub subm">電話・ライン</p>
                    </div>
                </div>
                <div class="bnrBox">
                    <div class="ul flBox">
                        <div class="li">
                            <div class="telBox"> <a href="tel:0568-44-1221">
                                <div class="fg">
                                    <p class="ttl em">電話でのお問い合わせ</p>
                                    <p class="tel em">tel.<span>0568-44-1221</span></p>
                                    <p class="txt"> 受付時間：8：30～17：30 （土・日・祝日休み） </p>
                                </div>
                                </a> </div>
                        </div>
                        <div class="li">
                            <div class="lineBox"> <a href="https://lin.ee/PkB26PD" target="_blank">
                                <div class="fg">
                                    <p class="ttl em">簡単LINEでお問い合わせ</p>
                                    <div class="flBox">
                                        <div class="lBox">
                                            <img src="<?php echo home_url(); ?>/images/line_qr.png">
                                        </div>
                                        <div class="rBox">
                                            <p>ビデオ通話もOK♪<br>お手軽LINEエントリー！</p>
                                            <p class="em">愛陸商事公式LINE</p>
                                        </div>
                                    </div>
                                </div>
                                </a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="sec03 fadeUp">
            <div class="secWrap01">

                <div class="secTtlBox secTtlBoxMain">
                    <div class="secTtl">
                        <h2 class="">ENTRY FORM</h2>
                        <p class="sub subm">エントリー<br>フォーム</p>
                    </div>
                </div>
                <div class="formBox">
                    <p>
                    必要事項を記入の上【入力内容の確認】ボタンをクリック下さい。<br>
※印は、求人募集に必要な事項となります。<br>
※3 営業日以内に返信がない場合はお電話下さい。
                    </p>
                    <div class="form fg">

                    <?php echo do_shortcode('[contact-form-7 id="23" title="エントリーフォーム"]'); ?>
                    <!--
                        <div class="dl">
                            <div class="dt">希望職種※</div>
                            <div class="dd"><input class="m" type="text" placeholder="ピッキング" name=""></div>
                        </div>
                        <div class="dl">
                            <div class="dt">お名前※</div>
                            <div class="dd"><input type="text" placeholder="愛陸　太郎" name=""></div>
                        </div>
                        <div class="dl">
                            <div class="dt">ふりがな※</div>
                            <div class="dd"><input type="text" placeholder="あいりく　たろう" name=""></div>
                        </div>
                        <div class="dl">
                            <div class="dt">郵便番号※</div>
                            <div class="dd">
                                <input class="s" type="text" name="">　-　<input class="s" type="text" name="">
                            </div>
                        </div>
                        <div class="dl">
                            <div class="dt">住所</div>
                            <div class="dd"><input class="" type="text" placeholder="" name=""></div>
                        </div>
                        <div class="dl">
                            <div class="dt">電話番号※</div>
                            <div class="dd"><input class="m" type="text" placeholder="09012345678" name=""></div>
                        </div>
                        <div class="dl">
                            <div class="dt">メールアドレス※</div>
                            <div class="dd"><input class="m" type="text" placeholder="info@example.com" name=""></div>
                        </div>
                        <div class="dl">
                            <div class="dt">年齢</div>
                            <div class="dd"><input class="s" type="text" placeholder="" name=""></div>
                        </div>
                        <div class="dl">
                            <div class="dt">お問い合わせ内容</div>
                            <div class="dd"><textarea class="m" placeholder="" name=""></textarea></div>
                        </div>

                        <div class="privacy">
                             <div class="agreeBox">
                                 <p class="">個人情報の取り扱いについて</p>
                                 <p class="">愛陸商事株式会社では個人情報を適切に管理運用するための基本的事項を定めています。<br>
                                     ・個人情報の利用目的<br>
                                     個人情報は当社から連絡する目的のためのみに取得し、取得した個人情報については不正利用・紛失・破壊・改ざん、および漏えいに対し適切な予防ならびに是正に関する措置を適切に講じます。<br>
                                     ・個人情報の第三者への開示・提供の禁止<br>
                                     お客様の個人情報について、お客様の承諾が無い限り第三者に開示、提供を一切いたしません。ご提供いただいた個人情報を取り扱うにあたり管理責任者を置き、適切な管理を行っております。<br>
                                     ・ご本人の照会<br>
                                     個人情報の照会・修正・削除などを希望される場合には、ご本人であることを確認の上対応させていただきます。<br>
                                     ・法令、規範の遵守と見直し<br>
                                     保有する個人情報について日本の法令その他規範を遵守するとともに、本規約の内容を適宜見直しその改善に努めます。</p>
                                 <p class="">本ポリシーに関するお問い合わせは，下記の窓口までお願いいたします。</p>
                                 <p class="">会社名：愛陸商事株式会社</p>
                                 <p>住所：〒485－0074　愛知県小牧市新小木3-20</p>
                                 <div class="tel">
                                     <p class="">電話番号：<a href="tel:0568-44-1221">0568-44-1221</a></p>
                                 </div>
                             </div>
                         </div>
                          -->

                    </div>
                </div>
            </div>
        </div>




    </div>
<?php get_footer(); ?>