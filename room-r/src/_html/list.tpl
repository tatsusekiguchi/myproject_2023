
					<ul class="list-bukkens">
<!--{foreach from=$bukken item=v key=k}-->
						<li>
							<a href="detail.html?b=<!--{$v.building_id_c}--><!--{$ref_param}-->" target="_blank" class="dib fade_on_hover">
								<ul class="labels">
									<!--{if $v.feature_c|strstr:'0' !== false}-->
									<li class="pet">ペット可</li>
									<!--{/if}-->
									<!--{if $v.feature_c|strstr:'2' !== false}-->
									<li class="shinchiku">新築</li>
									<!--{/if}-->
									<!--{if $v.feature_c|strstr:'4' !== false}-->
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
								<div class="fz14 fwb mt5 mb5"><!--{$v.building_name_c}--></div>
								<!--{if !empty($v.catch_c)}--><p class="copy"><!--{$v.catch_c}--></p><!--{/if}-->
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