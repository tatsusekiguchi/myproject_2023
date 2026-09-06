<!--{include file='header_subpage.tpl'}-->
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	
function initialize(){
	// 所在地
	var mapOptions = {
		center: new google.maps.LatLng(<!--{$bukken.latitude_c}-->, <!--{$bukken.longitude_c}-->),
		zoom: 17,
		//styles: styles,
		scaleControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	mapObj = new google.maps.Map(document.getElementById("map"), mapOptions);
	marker_l = new google.maps.Marker({
		position: new google.maps.LatLng(<!--{$bukken.latitude_c}-->, <!--{$bukken.longitude_c}-->),
		map: mapObj
	});
}
$(function(){
	initialize();
});
</script>

	<div id="main">
		<div id="box01">
			<div class="box01_01 ovh">
				<div class="icon_station flr">
					<dl class="station ovh flr">
						<dt>●最寄駅：</dt>
						<dd>
						<!--{if $bukken.transport1_c != "0"}-->
							<!--{$cnf.transport[$bukken.transport1_c]}-->
							<!--{$cnf.station[$bukken.station1_c]}-->駅&nbsp;徒歩
							<!--{$bukken.distance1_c}-->分
							<br />
						<!--{/if}-->
						<!--{if !empty($bukken.transport3_c)}-->
							<!--{$bukken.transport3_c}-->
							<!--{assign var=o_flg value="1"}-->
						<!--{/if}-->
						<!--{if !empty($bukken.station3_c)}-->
							<!--{$bukken.station3_c}-->駅
							<!--{assign var=o_flg value="1"}-->
						<!--{/if}-->
						<!--{if !empty($bukken.distance3_c)}-->
						徒歩<!--{$bukken.distance3_c}-->分
							<!--{assign var=o_flg value="1"}-->
						<!--{/if}-->
						<!--{if $o_flg == "1"}-->
							<br />
						<!--{/if}-->
						<!--{if $bukken.transport2_c != "0"}-->
							<!--{$cnf.transport[$bukken.transport2_c]}-->
							<!--{if $bukken.station2_c != ""}-->
								<!--{$cnf.station[$bukken.station2_c]}-->駅
							<!--{/if}-->
							<!--{if $bukken.distance2_c != ""}-->
								徒歩<!--{$bukken.distance2_c}-->分
							<!--{/if}-->
						<!--{/if}--></dd>
						<dt>●エリア：</dt>
						<dd>
							<ul>
							<!--{foreach from=$bukken.area_txt item=v key=k}--><li class="dib"><!--{$v}-->&nbsp;</li><!--{/foreach}-->
							</ul>
						</dd>
					</dl>
					<ul class="icon flr ovh">
						<!--{if $bukken.feature_c|strstr:"0" !== false}-->
						<!-- ペット -->
						<li class="flr"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/ico_pet.png" alt=""></li>
						<!--{/if}-->
						<!--{if $bukken.feature_c|strstr:"2" !== false}-->
						<!-- 新築 -->
						<li class="flr"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/ico_shinchiku.png" alt=""></li>
						<!--{/if}-->
						<!--{if $bukken.feature_c|strstr:"4" !== false}-->
						<!-- リノベーション -->
						<li class="flr"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/ico_renovation.png" alt=""></li>
						<!--{/if}-->
					</ul>
				</div><!-- .icon_station -->
				<h2 class="name"><!--{$bukken.building_name_c|escape}--></h2>
				<p class="catch"><!--{$bukken.catch_c|escape}--></p>
			</div><!-- .box01_01 -->
			<div class="box01_02 ovh mt20">
				<div id="bukken_img">
					<div class="display">
						<!--{if empty($bukken.b_photo1_c)}-->
						<img src="<!--{$smarty.const.WEB_ROOT}-->/dummy_b.jpg" alt="" />
						<!--{else}-->
						<img src="<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$bukken.b_photo1_c}-->" alt="" />
						<!--{/if}-->
					</div>
					<div class="navigation tac">
						<div class="prev"><a href="javascript: void(0);" class="disabled"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/btn_prev.png" alt="前へ" class="fade_on_hover"></a></div>
						<div id="bukken_slide" class="slide">
							<!--{section name=hoge loop=9 start=1}-->
							<!--{assign var=s value=`$smarty.section.hoge.index+10`}-->
							<!--{assign var=colname value="b_photo`$smarty.section.hoge.index`_c"}-->
							<!--{assign var=s_colname value="b_photo`$s`_c"}-->
							<!--{if $bukken.$s_colname != ""}-->
							<div class="item"><a href="<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$bukken.$colname}-->" style="background-image: url(<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$bukken.$s_colname}-->);" class="fade_on_hover" data-target="#bukken_img .display"><!--{$s-10}--></a></div>
							<!--{/if}-->
							<!--{/section}-->
						</div>
						<div class="next"><a href="javascript: void(0);" class="disabled"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/btn_next.png" alt="次へ" class="fade_on_hover"></a></div>
					</div>
				</div>

				<div id="house_list_img" class="flr">
					<!--{if $cnf.login_flg}-->
					<p class="fz10 mb5 tar"><span style="color: #88e;">●</span>・・・空きあり　<span style="color: #888;">●</span>・・・空きなし　<span style="color: #8e8;">●</span>・・・確認中</p>
					<!--{/if}-->
					<ul class="house_list">
						<!--{foreach from=$houseList item=v key=k}-->
						<li<!--{if $v.house_id_c == $house.house_id_c}--> class="on"<!--{/if}-->>
							<a href="detail.html?b=<!--{$bukken.building_id_c}-->&h=<!--{$v.house_id_c}--><!--{$query}-->">
								<div class="type">
									<!--{$v.house_no_c|escape}-->
<!--{if $cnf.login_flg}-->
<!--{php}-->
$house = $this->get_template_vars('v');
$date = 0;
$style = '';
switch ($house["status_c"]) {
	case "1":
		$style = ' style="color: #88e;"';
		break;
	case "2":
		$style = ' style="color: #888;"';
		break;
	case "3":
		$style = ' style="color: #8e8;"';
		break;
	default:
		break;
}
echo '<span'.$style.' class="fz10">●</span>';

<!--{/php}-->
<!--{/if}-->
								</div>
								<div class="room">
									<!--{$cnf.layout_regist[$v.layout_c]}-->
								</div>
							</a>
						</li>
						<!--{/foreach}-->
					</ul>
					<div id="price_area">
						<ul class="info">
							<!--{if !is_null($house.divide_money_02_c)}-->
							<li>
								<strong>●<!--{if $house.divide_money_02_c == 0}-->敷　金<!--{else}-->保証金<!--{/if}-->：</strong>
								<!--{if !empty($house.money_02_c)}-->
									<!--{$house.money_02_c|number_format}-->
									<!--{if $house.money_02_type_c == 0}-->ヶ月<!--{/if}-->
									<!--{if $house.money_02_type_c == 1}-->%<!--{/if}-->
									<!--{if $house.money_02_type_c == 2}-->円<!--{/if}-->
								<!--{else}-->
								-
								<!--{/if}-->
							</li>
							<!--{/if}-->
							<!--{if !is_null($house.divide_money_04_c)}-->
							<li>
								<strong>●<!--{if $house.divide_money_04_c == 0}-->礼　金<!--{else}-->権利金<!--{/if}-->：</strong>
								<!--{if !empty($house.money_04_c)}-->
									<!--{$house.money_04_c|number_format}-->
									<!--{if $house.money_04_type_c == 0}-->ヶ月<!--{/if}-->
									<!--{if $house.money_04_type_c == 1}-->%<!--{/if}-->
									<!--{if $house.money_04_type_c == 2}-->円<!--{/if}-->
								<!--{else}-->
								-
								<!--{/if}-->
							</li>
							<!--{/if}-->
							<!--{if !empty($house.money_01_c)}-->
							<li>
								<strong>●共益費：</strong>
								<!--{$house.money_01_c|number_format}-->円
							</li>
							<!--{/if}-->
						</ul>
						<dl class="price_room">
							<dt>賃　料</dt>
							<dd><!--{$house.rental_price_c|number_format}-->円〜</dd>
							<dt>間取り</dt>
							<dd><!--{$cnf.layout_regist[$house.layout_c]}--><span class="fz14 fwn">（<!--{$house.space_c|number_format}-->m&sup2;）</span></dd>
						</dl>
					</div><!-- .price_area -->
					<div id="house_img">
						<div class="display">
						<!--{if empty($house.r_photo1_c)}-->
							<img src="<!--{$smarty.const.WEB_ROOT}-->/dummy_r.jpg" alt="" />
						<!--{else}-->
							<img src="<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$house.r_photo1_c}-->" alt="" />
						<!--{/if}-->
						</div>
						<div class="navigation tac">
							<div class="prev"><a href="javascript: void(0);" class="disabled"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/btn_prev.png" alt="前へ" class="fade_on_hover"></a></div>
							<div id="house_slide" class="slide">
								<!--{section name=hoge loop=11 start=1}-->
								<!--{assign var=s value=`$smarty.section.hoge.index+20`}-->
								<!--{assign var=colname value="r_photo`$smarty.section.hoge.index`_c"}-->
								<!--{assign var=s_colname value="r_photo`$s`_c"}-->
								<!--{if $house.$s_colname != ""}-->
								<div class="item"><a href="<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$house.$colname}-->" style="background-image: url(<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$house.$s_colname}-->);" class="fade_on_hover" data-target="#house_img .display"><!--{$s-10}--></a></div>
								<!--{/if}-->
								<!--{/section}-->
							</div>
							<div class="next"><a href="javascript: void(0);" class="disabled"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/btn_next.png" alt="次へ" class="fade_on_hover"></a></div>
						</div>
					</div><!-- #house_img -->
				</div>
			</div>
		</div><!-- .box01 -->
		<div id="box02">
			<div class="inner ovh">
				<div class="fll">
					<dl class="address ovh">
						<dt>●所在地：</dt>
						<dd class="fz20 fwb"><!--{$bukken.pref_c}-->名古屋市<!--{$cnf.ku_nagoya[$bukken.ku_c]}--><!--{$bukken.address_c}--></dd>
						<dt>●最寄駅：</dt>
						<dd class="fz14 ovh" style="height: 50px;">
							
								<!--{if $bukken.transport1_c != "0"}-->
									<!--{$cnf.transport[$bukken.transport1_c]}-->
									<!--{$cnf.station[$bukken.station1_c]}-->駅&nbsp;徒歩
									<!--{$bukken.distance1_c}-->分
								<!--{/if}-->
								<!--{if !empty($bukken.transport3_c)}-->
									／<!--{$bukken.transport3_c}-->
									<!--{assign var=o_flg value="1"}-->
								<!--{/if}-->
								<!--{if !empty($bukken.station3_c)}-->
									<!--{$bukken.station3_c}-->駅
									<!--{assign var=o_flg value="1"}-->
								<!--{/if}-->
								<!--{if !empty($bukken.distance3_c)}-->
								徒歩<!--{$bukken.distance3_c}-->分
									<!--{assign var=o_flg value="1"}-->
								<!--{/if}-->
								<!--{if $o_flg == "1"}-->
									<br />
								<!--{/if}-->
								<!--{if $bukken.transport2_c != ""}-->
									<!--{$cnf.transport[$bukken.transport2_c]}-->
									<!--{if $bukken.station2_c != ""}-->
										<!--{$cnf.station[$bukken.station2_c]}-->駅
									<!--{/if}-->
									<!--{if $bukken.distance2_c != ""}-->
										徒歩<!--{$bukken.distance2_c}-->分
									<!--{/if}-->
								<!--{/if}-->
						</dd>
					</dl>
					<div class="detail ovh">
						<table class="fll">
							<tr>
								<th>
									<!--{if $house.divide_money_03_c == 0}-->償却<!--{/if}-->
									<!--{if  $house.divide_money_03_c == 1}-->敷引<!--{/if}-->
									<!--{if $house.divide_money_03_c == 2}-->解約金<!--{/if}-->
								</th>
								<td>
									<!--{if !empty($house.money_03_c)}-->
									<!--{$house.money_03_c|number_format}-->
									<!--{if $house.money_03_type_c == 0}-->ヶ月<!--{/if}-->
									<!--{if $house.money_03_type_c == 1}-->%<!--{/if}-->
									<!--{if $house.money_03_type_c == 2}-->円<!--{/if}-->
									<!--{else}-->
									-
									<!--{/if}-->
								</td>
							</tr>
							<tr>
								<th>駐車場</th>
								<td>
									<!--{if $bukken.parking_c == 1}-->
										<!--{foreach from=$bukken.parking_txt item=v key=k}-->
										<!--{$v}-->&nbsp;
										<!--{/foreach}-->

										<!--{if $bukken.parking_tax_c != 2}-->
											<!--{$bukken.parking_charge_c|number_format}-->円
											<!--{if $bukken.parking_tax_c == 0}-->（税別）<!--{/if}-->
											<!--{if $bukken.parking_tax_c == 1}-->（税込み）<!--{/if}-->
										<!--{else}-->
										要確認
										<!--{/if}-->
									<!--{elseif $bukken.parking_c == 2}-->
									要確認
									<!--{else}-->
									-
									<!--{/if}-->
								</td>
							</tr>
							<tr>
								<th>構造</th>
								<td><!--{$cnf.structure[$bukken.structure_c]}--></td>
							</tr>
							<tr>
								<th>築年月</th>
								<td>
									<!--{$bukken.completion_year_c}-->年<!--{$bukken.completion_month_c}-->月
								</td>
							</tr>
							<tr>
								<th>階数/総戸数</th>
								<td><!--{if !empty($bukken.floor_c)}--><!--{$bukken.floor_c}-->階<!--{else}-->-<!--{/if}-->/<!--{if !empty($bukken.house_c)}--><!--{$bukken.house_c}-->戸<!--{else}-->-<!--{/if}--></td>
							</tr>
							<tr>
								<th>部屋向き</th>
								<td>
									<!--{if !empty($house.direction_c)}-->
									<!--{$cnf.direction[$house.direction_c]}-->
									<!--{else}-->
									-
									<!--{/if}-->
								</td>
							</tr>
							<tr>
								<th>ペット</th>
								<td>
									<!--{if !empty($bukken.pet_c)}-->
									<!--{assign var="pet_array" value=","|explode:$bukken.pet_c}-->

									<!--{foreach from=$cnf.pet item=p key=pk}-->
										<!--{if in_array($pk,$pet_array)}-->
											<!--{$p}-->&nbsp;
										<!--{/if}-->
									<!--{/foreach}-->
									 <!--{$bukken.petfree_c}-->
									<!--{else}-->
									-
									<!--{/if}-->
								</td>
							</tr>
							<tr>
								<th>火災保険</th>
								<td>
									<!--{if $bukken.fire_flg_c == 1}-->
									<!--{$bukken.fire_c|number_format}-->円
									<!--{elseif $bukken.fire_flg_c == 0}-->
									無し
									<!--{elseif $bukken.fire_flg_c == 2}-->
									要確認
									<!--{/if}-->
								</td>
							</tr>
							<tr>
								<th>更新料</th>
								<td>
									<!--{if !empty($house.money_05_c)}-->
									<!--{$house.money_05_c|number_format}-->円&nbsp;
									<!--{if !empty($house.money_05_zimu_c)}-->
									更新事務手数料<!--{$house.money_05_zimu_c|number_format}-->円&nbsp;
									<!--{/if}-->
									<!--{else}-->
									-
									<!--{/if}-->
								</td>
							</tr>
							<tr>
								<th>保証会社</th>
								<td>
									<!--{if $bukken.hoshou_availability_c == 0}-->
									利用可
									<!--{elseif $bukken.hoshou_availability_c == 1}-->
									必須
									<!--{elseif $bukken.hoshou_availability_c == 2}-->
									なし
									<!--{elseif $bukken.hoshou_availability_c == 3}-->
									要確認
									<!--{else}-->
									-
									<!--{/if}-->
								</td>
							</tr>
							<tr>
								<th>初期費用</th>
								<td>
									<!--{php}-->
										$house_zappi = $this->get_template_vars('house_zappi');
										foreach($house_zappi as $z){
											if($z['type_c'] == 0 && !empty($z['amount_c'])){
												
												$out = "{$z['name_c']}: ";
												$out .= number_format($z['amount_c']);
												$out .= "円";
												if($z['amount_taxin_c'] == 1) $out .= "（税込み）";
												if($z['amount_taxin_c'] == 0) $out .= "（税別）";
												if( !empty($z['required_c']) ) $out .= " [必須]";
												echo "{$out}<br />";
											}
										}
									<!--{/php}-->
								</td>
							</tr>
							<tr>
								<th>月額費用</th>
								<td>
									<!--{php}-->
										$house_zappi = $this->get_template_vars('house_zappi');
										foreach($house_zappi as $z){
											if($z['type_c'] == 1 && !empty($z['amount_c'])){
												
												$out = "{$z['name_c']}: ";
												$out .= number_format($z['amount_c']);
												$out .= "円";
												if($z['amount_taxin_c'] == 1) $out .= "（税込み）";
												if($z['amount_taxin_c'] == 0) $out .= "（税別）";
												if( !empty($z['required_c']) ) $out .= " [必須]";
												echo "{$out}<br />";
											}
										}
									<!--{/php}-->
								</td>
							</tr>
							<tr>
								<th>町費用</th>
								<td>
									<!--{if !empty($house.chouhi_c)}-->
									<!--{if $house.chouhi_type_c == 0}-->初期費用：<!--{/if}-->
									<!--{if $house.chouhi_type_c == 1}-->月額費用：<!--{/if}-->
									<!--{if $house.chouhi_type_c == 2}-->年額費用：<!--{/if}-->
									<!--{$house.chouhi_c|number_format}-->円
									<!--{if $house.tax_chouhi_c == 0}-->（税別）<!--{/if}-->
									<!--{if $house.tax_chouhi_c == 1}-->（税込み）<!--{/if}-->
									<!--{else}-->
									-
									<!--{/if}-->
								</td>
							</tr>
							<tr>
								<th>備考</th>
								<td>
									<!--{$house.other_c}-->
								</td>
							</tr>
						</table>
						<ul class="flg">
							<li><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/icon/ico_shinchiku<!--{if $bukken.feature_c|strstr:'2'}-->_on<!--{/if}-->.png" alt=""></li>
							<!--{foreach from=$house.flg_disp item=v key=k}-->
							<li><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/icon/ico_<!--{$k}--><!--{if $v == 1}-->_on<!--{/if}-->.png" alt=""></li>
							<!--{/foreach}-->
						</ul>
					</div><!-- .detail -->
				</div><!-- .fll -->
				<div class="flr">
					<div class="h">部屋タイプ<strong><!--{$house.house_no_c}--></strong></div>
					<ul class="layout_price">
						<li class="fll" style="width: 185px"><!--{$cnf.layout_regist[$house.layout_c]}--><span class="fz11 fwn">（<!--{$house.space_c|number_format}-->m&sup2;）</span></li>
						<li class="flr" style="width: 184px"><!--{$house.rental_price_c|number_format}-->円〜</li>
					</ul>
					<div class="madori">
						<!--{if empty($house.r_photo0_c)}-->
						<img src="<!--{$smarty.const.WEB_ROOT}-->/dummy_m.jpg" alt="" />
						<!--{else}-->
						<img src="<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$house.r_photo0_c}-->" alt="" />
						<!--{/if}-->
					</div>
				</div>
				<div class="clb pt50 ovh">
					<div id="map_area">
						<div id="map"></div>
						<p class="tar mt15"><a href="https://www.google.co.jp/maps/?q=<!--{$bukken.latitude_c}-->,<!--{$bukken.longitude_c}-->" target="_blank"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/btn_map.png" alt="大きな地図で見る" class="fade_on_hover"></a></p>
					</div>
					<div class="point">
						<div class="inner">
							<table>
								<tr>
									<th>
										<img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/h_02.png" alt="ポイント" />
									</th>
									<td>
										<!--{$bukken.comment1_c|escape|nl2br}-->
									</td>
								</tr>
							</table>
						</div>
						<div class="mt30 tac"><a href="?b=<!--{$bukken.building_id_c}-->&amp;h=<!--{$house.house_id_c}-->&amp;print=1" target="_blank"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/btn_print.png" alt="印刷する" class="fade_on_hover"></a></div>
					</div>
				</div>
			</div><!-- .inner -->
		</div><!-- #box02 -->
		<div id="box03">
			<div class="contact_area">
				<img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/bg_contact.png" alt="この物件の見学予約・空室確認をする">
				<a href="<!--{$smarty.const.WEB_ROOT}-->/contact.html?h=<!--{$house.house_id_c}-->"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/btn_contact.png" alt="お問合せ" class="fade_on_hover"></a>
			</div>
		</div><!-- #box03 -->
		<div id="recommend">
			<h3 class="tac pt70"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/detail/h_recommend.png" alt="関連物件"></h3>
			<ul class="list-bukkens">
<!--{foreach from=$recommend item=v key=k}-->
				<li>
					<a href="detail.html?b=<!--{$v.building_id_c}--><!--{$ref_param}-->" target="_blank" class="dib fade_on_hover">
						<ul class="labels">
							<!--{if $v.feature_c|strstr:'0'}-->
							<li class="pet">ペット可</li>
							<!--{/if}-->
							<!--{if $v.feature_c|strstr:'2'}-->
							<li class="shinchiku">新築</li>
							<!--{/if}-->
							<!--{if $v.feature_c|strstr:'4'}-->
							<li class="renovation">リノベーション</li>
							<!--{/if}-->
						</ul>
						<div class="image mt5">
							<!--{if empty($v.b_photo0_c)}-->
							<img src="<!--{$smarty.const.WEB_ROOT}-->/dummy_t.jpg" alt="" />
							<!--{else}-->
							<img src="<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$v.b_photo0_c}-->" alt="" />
							<!--{/if}-->
						</div>
						<div class="fz14 fwb mt5"><!--{$v.building_name_c}--></div>
						<ul class="data fz12 mt5">
							<li>金額：
								<!--{$v.price_min_c|number_format}-->円〜
								<!--{if $v.price_min_c < $v.price_max_c}--><!--{$v.price_max_c|number_format}-->円<!--{/if}-->
							</li>
							<li>間取り：<!--{$v.layout_disp}--></li>
							<li>
								<!--{if $v.transport1_c != "0"}-->
									<!--{$cnf.transport[$v.transport1_c]}-->「<!--{$cnf.station[$v.station1_c]}-->駅」徒歩<!--{$v.distance1_c}-->分
								<!--{/if}-->
								<!--{if !empty($v.transport3_c)}-->
									<!--{$v.transport3_c}-->
								<!--{/if}-->
								<!--{if !empty($v.station3_c)}-->
									「<!--{$v.station3_c}-->駅」
								<!--{/if}-->
								<!--{if !empty($v.distance3_c)}-->
								徒歩<!--{$v.distance3_c}-->分
								<!--{/if}-->
							</li>
						</ul>
					</a>
				</li>
<!--{/foreach}-->
			</ul>
		</div>

	</div><!-- #main -->

<!--{include file='footer.tpl'}-->
