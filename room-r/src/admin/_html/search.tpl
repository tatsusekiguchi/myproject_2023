






使いません!








<div id="area_search">
	<form action="houseList.php" method="post">
		<div class="h">
			<div><img src="img/room_list/h_01.png" alt="部屋検索" /></div>
			<div class="btn"><span class="clickable have_effect"><img src="img/btn_03.png" alt="" /></span></div>
		</div>
		<table class="style_s">
			<tr>
				<th>物件名</th>
				<td><input type="text" name="BUKKENMEI" value="<!--{$formData.BUKKENMEI|escape}-->" id="idBUKKENMEI" style="width:406px;" /></td>
			</tr>
			<tr>
				<th>沿線</th>
				<td>
					<div style="position: relative">
						<div id="ensenBox">
							<!--{if isset($ensen[0].ensen) && $ensen[0].ensen != "0"}-->
							<!--{foreach from=$ensen item=val key=key}-->
							<div>
								<select name="searchEnsen[<!--{$key}-->]" title="<!--{$key}-->" class="searchEnsen">
									<!--{foreach from=$transport item=val2 key=key2}-->
									<option value="<!--{$key2}-->"<!--{if $key2 == $val.ensen}--> selected="selected"<!--{/if}-->><!--{$val2}--></option>
									<!--{/foreach}-->
								</select>&nbsp;<select name="searchStation[<!--{$key}-->]">
									<!--{foreach from=$transport_station[$val.ensen] item=val2 key=key2}-->
										<option value="<!--{$val2}-->"<!--{if $val2 == $val.station}--> selected="selected"<!--{/if}-->><!--{$station[$val2]}--></option>
									<!--{/foreach}-->
								</select>
							</div>
							<!--{/foreach}-->
							<!--{else}-->
							<div>
								<select name="searchEnsen[0]" title="0" class="searchEnsen">
									<!--{foreach from=$transport item=val2 key=key2}-->
									<option value="<!--{$key2}-->"><!--{$val2}--></option>
									<!--{/foreach}-->
								</select>&nbsp;<select name="searchStation[0]">
									<option value=""></option>
								</select>
							</div>
							<!--{/if}-->
						</div>
						<div><span class="clickable have_effect"><img src="img/btn_04.png" id="ensenAddBtn" alt="沿線を増やす" style="position:absolute;top:0px;right:0;" /></span></div>
					</div>
				</td>
			</tr>
			<tr>
				<th>駅からの距離</th>
				<td>
					<div>徒歩
						<select name="searchDistance" id="searchDistance">
							<option value="1">1分以内</option>
							<option value="3">3分以内</option>
							<option value="5">5分以内</option>
							<option value="10">10分以内</option>
							<option value="15">15分以内</option>
							<option value="20">20分以内</option>
						</select>
						<script type="text/javascript">
						$(function(){
							$("#searchDistance").val("<!--{$formData.searchPriceMin|escape}-->");
						});
						</script>
					</div>
				</td>
			</tr>
			<tr>
				<th>フラグ</th>
				<td>
				<!--{foreach from=$flg key=key item=val}-->
					<!--{if isset($formData.searchFlg[$key])}-->
					<label class="item_a"><input type="checkbox" name="searchFlg[<!--{$key}-->]" value="1" checked="checked" />&nbsp;<!--{$val}-->&nbsp;</label>
					<!--{else}-->
					<label class="item_a"><input type="checkbox" name="searchFlg[<!--{$key}-->]" value="1" />&nbsp;<!--{$val}-->&nbsp;</label>
					<!--{/if}-->
				<!--{/foreach}-->
				</td>
			</tr>
			<tr>
				<th>家賃</th>
				<td>
					<select name="searchPriceMin" id="searchPriceMin">
						<option value="">下限なし</option>
						<option value="20000">2万円</option>
						<option value="30000">3万円</option>
						<option value="40000">4万円</option>
						<option value="50000">5万円</option>
						<option value="60000">6万円</option>
						<option value="70000">7万円</option>
						<option value="80000">8万円</option>
						<option value="90000">9万円</option>
						<option value="100000">10万円</option>
						<option value="120000">12万円</option>
						<option value="140000">14万円</option>
						<option value="160000">16万円</option>
						<option value="180000">18万円</option>
						<option value="200000">20万円</option>
						<option value="250000">25万円</option>
						<option value="300000">30万円</option>
						<option value="400000">40万円</option>
						<option value="500000">50万円</option>
						<option value="600000">60万円</option>
						<option value="800000">80万円</option>
						<option value="1000000">100万円</option>
					</select>
					<span>　〜　</span>
					<select name="searchPriceMax" id="searchPriceMax">
						<option value="">上限なし</option>
						<option value="20000">2万円</option>
						<option value="30000">3万円</option>
						<option value="40000">4万円</option>
						<option value="50000">5万円</option>
						<option value="60000">6万円</option>
						<option value="70000">7万円</option>
						<option value="80000">8万円</option>
						<option value="90000">9万円</option>
						<option value="100000">10万円</option>
						<option value="120000">12万円</option>
						<option value="140000">14万円</option>
						<option value="160000">16万円</option>
						<option value="180000">18万円</option>
						<option value="200000">20万円</option>
						<option value="250000">25万円</option>
						<option value="300000">30万円</option>
						<option value="400000">40万円</option>
						<option value="500000">50万円</option>
						<option value="600000">60万円</option>
						<option value="800000">80万円</option>
						<option value="1000000">100万円</option>
					</select>
					<script type="text/javascript">
					$(function(){
						$("#searchPriceMin").val("<!--{$formData.searchPriceMin|escape}-->");
						$("#searchPriceMax").val("<!--{$formData.searchPriceMax|escape}-->");
					});
					</script>
				</td>
			</tr>
			<tr>
				<th>間取り</th>
				<td>
				<!--{foreach from=$layout key=key item=val}-->
					<!--{if isset($formData.searchLayout[$key])}-->
					<label class="item_a"><input type="checkbox" name="searchLayout[<!--{$key}-->]" checked="checked" />&nbsp;<!--{$val}-->&nbsp;</label>
					<!--{else}-->
					<label class="item_a"><input type="checkbox" name="searchLayout[<!--{$key}-->]" />&nbsp;<!--{$val}-->&nbsp;</label>
					<!--{/if}-->
				<!--{/foreach}-->
				</td>
			</tr>
			<tr>
				<th>特集</th>
				<td>
					<select name="searchFeature">
						<option value=""></option>
					<!--{foreach from=$features key=key item=val}-->
						<!--{if $formData.searchFeature == $val.feature_id_c}-->
						<option value="<!--{$val.feature_id_c}-->" selected="selected"><!--{$val.feature_name_c}--></option>
						<!--{else}-->
						<option value="<!--{$val.feature_id_c}-->"><!--{$val.feature_name_c}--></option>
						<!--{/if}-->
					<!--{/foreach}-->
					</select>
				</td>
			</tr>
			<tr>
				<th>公開状況</th>
				<td>
					<label style="margin-right:16px;"><input type="radio" value="default" name="dispFlg" <!--{if $formData.dispFlg == "default"}-->checked="checked"<!--{/if}-->/> 公開</label>
					<label style="margin-right:16px;"><input type="radio" value="hideonly" name="dispFlg" <!--{if $formData.dispFlg == "hideonly"}-->checked="checked"<!--{/if}-->/> 非公開</label>
					<label><input type="radio" value="hide" name="dispFlg" <!--{if $formData.dispFlg == "hide" || !isset($formData.dispFlg)}-->checked="checked"<!--{/if}-->/> 全て</label>
				</td>
			</tr>
		</table>
		<div class="center"><input type="image" src="img/room_list/btn_search.png" alt="物件を検索" class="have_effect" /></div>
	</form>
</div><!-- #area_search -->




















<!--{*
<table border="1" id="searchTable">
<tr>
	<th class="required searchtitle">
		物件名
	</th>
	<td id="" valign="middle" style="vertical-align: middle;" colspan="3">
		<input type="text" name="BUKKENMEI" value="<!--{$formData.BUKKENMEI|escape}-->" id="idBUKKENMEI" />
	</td>
</tr>
<tr class="hideSearchArea">
	<th class="required searchtitle">
		沿線
	</th>
	<td id="ensenBox" colspan="3" class="clearfix">
		<div style="position: relative">
			<!--{if isset($ensen[0].ensen) && $ensen[0].ensen != "0"}-->
				<!--{foreach from=$ensen item=val key=key}-->
		<div>
			<select name="searchEnsen[<!--{$key}-->]" title="<!--{$key}-->" class="searchEnsen">
				<!--{foreach from=$transport item=val2 key=key2}-->
				<option value="<!--{$key2}-->"<!--{if $key2 == $val.ensen}--> selected="selected"<!--{/if}-->><!--{$val2}--></option>
				<!--{/foreach}-->
			</select>&nbsp;<select name="searchStation[<!--{$key}-->]">
				<!--{foreach from=$transport_station[$val.ensen] item=val2 key=key2}-->
					<option value="<!--{$val2}-->"<!--{if $val2 == $val.station}--> selected="selected"<!--{/if}-->><!--{$station[$val2]}--></option>
				<!--{/foreach}-->
			</select>
		</div>
				<!--{/foreach}-->
			<!--{else}-->
		<div>
			<select name="searchEnsen[0]" title="0" class="searchEnsen">
				<!--{foreach from=$transport item=val2 key=key2}-->
				<option value="<!--{$key2}-->"><!--{$val2}--></option>
				<!--{/foreach}-->
			</select>&nbsp;<select name="searchStation[0]">
				<option value=""></option>
			</select>
			<!--&nbsp;徒歩&nbsp;<input type="text" name="searchDistance[0]" class="searchDistance">&nbsp;分&nbsp;-->
		</div>
			<!--{/if}-->
		<input type="button" value="沿線を増やす" id="ensenAddBtn" style="position: absolute; top: 0px; right: 10px;" />
	</div>
	</td>
</tr>
<tr class="hideSearchArea">
	<th class="required searchtitle">
		駅からの距離
	</th>
	<td style="width: 260px">
		徒歩<input type="text" name="searchDistance" class="searchDistance" value="<!--{$formData.searchDistance|escape}-->" />分以内
	</td>
</tr>
<tr class="hideSearchArea">
	<th class="required searchtitle">
		フラグ
	</th>
	<td class="clearfix" colspan="3">
		<!--{foreach from=$flg key=key item=val}-->
			<!--{if isset($formData.searchFlg[$key])}-->
			<label style="float:left; display: block;"><input type="checkbox" name="searchFlg[<!--{$key}-->]" value="1" checked="checked" />&nbsp;<!--{$val}-->&nbsp;</label>
			<!--{else}-->
			<label style="float:left; display: block;"><input type="checkbox" name="searchFlg[<!--{$key}-->]" value="1" />&nbsp;<!--{$val}-->&nbsp;</label>
			<!--{/if}-->
		<!--{/foreach}-->
	</td>
</tr>
<tr class="hideSearchArea">
	<th class="required searchtitle">
		設備
	</th>
	<td class="clearfix" colspan="3">
		<!--{foreach from=$equipment key=key item=val}-->
			<!--{if isset($formData.searchEquipment[$key])}-->
			<label style="float:left; display: block;"><input type="checkbox" name="searchEquipment[<!--{$key}-->]" checked="checked" />&nbsp;<!--{$val}-->&nbsp;</label>
			<!--{else}-->
			<label style="float:left; display: block;"><input type="checkbox" name="searchEquipment[<!--{$key}-->]" />&nbsp;<!--{$val}-->&nbsp;</label>
			<!--{/if}-->
		<!--{/foreach}-->
	</td>

</tr>
<tr class="hideSearchArea">
	<th class="required searchtitle">
		賃料
	</th>
	<td class="clearfix" colspan="3">
		<input type="text" name="searchPriceMin" value="<!--{$formData.searchPriceMin|escape}-->" />円&nbsp;〜&nbsp;<input type="text" name="searchPriceMax" value="<!--{$formData.searchPriceMax|escape}-->" />円
	</td>
</tr>
<tr class="hideSearchArea">
	<th class="required searchtitle">
		間取り
	</th>
	<td class="clearfix" colspan="3">
		<!--{foreach from=$layout key=key item=val}-->
			<!--{if isset($formData.searchLayout[$key])}-->
			<label style="float:left; display: block;"><input type="checkbox" name="searchLayout[<!--{$key}-->]" checked="checked" />&nbsp;<!--{$val}-->&nbsp;</label>
			<!--{else}-->
			<label style="float:left; display: block;"><input type="checkbox" name="searchLayout[<!--{$key}-->]" />&nbsp;<!--{$val}-->&nbsp;</label>
			<!--{/if}-->
		<!--{/foreach}-->

	</td>
</tr>
<tr class="hideSearchArea">
	<th class="required searchtitle">
		特集
	</th>
	<td class="clearfix" colspan="3">
		<select name="searchFeature">
			<option value=""></option>
		<!--{foreach from=$features key=key item=val}-->
			<!--{if $formData.searchFeature == $val.feature_id_c}-->
			<option value="<!--{$val.feature_id_c}-->" selected="selected"><!--{$val.feature_name_c}--></option>
			<!--{else}-->
			<option value="<!--{$val.feature_id_c}-->"><!--{$val.feature_name_c}--></option>
			<!--{/if}-->
			<!--{@*<label style="float:left; display: block;"><input type="checkbox" name="searchLayout[<!--{$key}-->]" />&nbsp;<!--{$val}-->&nbsp;</label>*@}-->
		<!--{/foreach}-->
		</select>
	</td>
</tr>
<tr class="hideSearchArea">
	<th class="required searchtitle">
		公開/非公開
	</th>
	<td class="clearfix" colspan="3">
		<label><input type="radio" value="default" name="dispFlg" <!--{if $formData.dispFlg == "default"}-->checked="checked"<!--{/if}-->/>公開</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" value="hideonly" name="dispFlg" <!--{if $formData.dispFlg == "hideonly"}-->checked="checked"<!--{/if}-->/>非公開</label>&nbsp;&nbsp;&nbsp;&nbsp;
		<label><input type="radio" value="hide" name="dispFlg" <!--{if $formData.dispFlg == "hide" || !isset($formData.dispFlg)}-->checked="checked"<!--{/if}-->/>全て</label>
	</td>
</tr>
</table>
<a href="javascript: void(0)" id="searchShow">検索条件を隠す</a>
<div style="text-align: center;">
<input type="submit" name="search" value="検索" style="float: none; display: inline;" />
</div>
*}-->
