<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="robots" content="noindex,nofollow">
<title><!--{$pagetitle}--></title>
<link rel="stylesheet" href="<!--{$smarty.const.WEB_ROOT}-->/src/css/init.css" />
<link rel="stylesheet" href="<!--{$smarty.const.WEB_ROOT}-->/src/css/basic.css" />
<link rel="stylesheet" href="<!--{$smarty.const.WEB_ROOT}-->/src/css/print.css" />
<script>
</script>
</head>
<body onLoad="window.print();">
	<div id="wrapper">
		<div id="box01" class="ovh">
			<div id="logo" class="fll"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/header/logo.png" height="75" alt=""></div>
			<div id="name_area" class="ovh">
				<h1><!--{$bukken.building_name_c|escape}--><span><!--{$bukken.catch_c|escape}--></span></h1>
				<p class="fz15 mt5">
					賃料：<!--{$house.rental_price_c|number_format}-->円〜／
					
					<!--{$house.house_no_c}-->タイプ／
					
					<!--{$cnf.layout_regist[$house.layout_c]}-->（<!--{$house.space_c|number_format}-->m&sup2;）／
					
					<!--{if $house.divide_money_02_c == 0}-->敷金<!--{else}-->保証金<!--{/if}-->：
					<!--{$house.money_02_c|number_format}-->
					<!--{if $house.money_02_type_c == 0}-->ヶ月<!--{/if}-->
					<!--{if $house.money_02_type_c == 1}-->%<!--{/if}-->
					<!--{if $house.money_02_type_c == 2}-->円<!--{/if}-->／
				
					<!--{if $house.divide_money_04_c == 0}-->礼金<!--{else}-->権利金<!--{/if}-->：
					<!--{$house.money_04_c|number_format}-->
					<!--{if $house.money_04_type_c == 0}-->ヶ月<!--{/if}-->
					<!--{if $house.money_04_type_c == 1}-->%<!--{/if}-->
					<!--{if $house.money_04_type_c == 2}-->円<!--{/if}-->／

					共益費：<!--{$house.money_01_c|number_format}-->円


					<!--{if $bukken.feature_c|strstr:"0" || $bukken.feature_c == 0}-->
					<!-- ペット -->
					／ペット
					<!--{/if}-->
					<!--{if $bukken.feature_c|strstr:"2"}-->
					<!-- 新築 -->
					／新築
					<!--{/if}-->
					<!--{if $bukken.feature_c|strstr:"4"}-->
					<!-- リノベーション -->
					／リノベーション
					<!--{/if}-->
				</p>
			</div>
		</div><!-- #box01 -->
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
									<!--{if $bukken.parking_c}-->
									<!--{foreach from=$bukken.parking_txt item=v key=k}-->
									<!--{$v}-->&nbsp;
									<!--{/foreach}-->
									<!--{$bukken.parking_charge_c|number_format}-->円
									<!--{if $bukken.parking_tax_c == 0}-->（税別）<!--{/if}-->
									<!--{if $bukken.parking_tax_c == 1}-->（税込み）<!--{/if}-->
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
									<!--{if $bukken.pet_c != 0}-->
									<!--{$cnf.pet[$bukken.pet_c]}--> <!--{$bukken.petfree_c}-->
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
									<!--{if $bukken.fire_tax_c == 0}-->（税別）<!--{/if}-->
									<!--{if $bukken.fire_tax_c == 1}-->（税込み）<!--{/if}-->
									<!--{elseif $bukken.fire_flg_c == 0}-->
									無し
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
					<div class="madori">
						<!--{if empty($house.r_photo0_c)}-->
						<img src="<!--{$smarty.const.WEB_ROOT}-->/dummy_m.jpg" alt="" />
						<!--{else}-->
						<img src="<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$house.r_photo0_c}-->" alt="" />
						<!--{/if}-->
					</div>
				</div>
			</div><!-- .inner -->
		</div><!-- #box02 -->
		<div id="box03">
			<ul class="bukken">
				<!--{assign var=count value="0" }-->
				<!--{section name=hoge loop=5 start=1}-->
				<!--{assign var=s value=`$smarty.section.hoge.index+10`}-->
				<!--{assign var=colname value="b_photo`$smarty.section.hoge.index`_c"}-->
				<!--{assign var=s_colname value="b_photo`$s`_c"}-->
				<!--{if $bukken.$s_colname != ""}-->
				<!--{assign var=count value=$count+1 }-->
				<li class="item<!--{if $count == 3 ||$count == 4}--> small<!--{/if}-->"><img src="<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$bukken.$colname}-->" /></li>
				<!--{/if}-->
				<!--{/section}-->
			</ul>
			<ul class="house">
				<!--{section name=hoge loop=7 start=1}-->
				<!--{assign var=s value=`$smarty.section.hoge.index+20`}-->
				<!--{assign var=colname value="r_photo`$smarty.section.hoge.index`_c"}-->
				<!--{assign var=s_colname value="r_photo`$s`_c"}-->
				<!--{if $house.$s_colname != ""}-->
				<li class="item"><img src="<!--{$smarty.const.WEB_ROOT}-->/uploads/<!--{$house.$colname}-->" /></li>
				<!--{/if}-->
				<!--{/section}-->
			</ul>
		</div>
		<div id="print_footer">
			<div class="fll"><img src="<!--{$smarty.const.WEB_ROOT}-->/src/img/header/logo.png" height="75" alt=""></div>
			<p class="fll">〒460-0002　名古屋市中区丸の内3-10-29 LINC MARUNOUCHI 3F<br />TEL：0120-99-7376／FAX：052-959-5838（10：00〜19：00　定休日：年末年始 夏季休暇）</p>
		</div>
	</div><!-- #wrapper -->
</body>
</html>