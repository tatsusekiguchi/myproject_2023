
<table>
	<tbody>
		<tr>
			<th><img src="src/img/search_box/t_01.png" alt="家賃" /></th>
			<td>
				<select name="min">
					<option value="">未選択</option>
					<option value="50000"<!--{if $params.min == 50000}--> selected="selected"<!--{/if}-->>5万円</option>
					<option value="70000"<!--{if $params.min == 70000}--> selected="selected"<!--{/if}-->>7万円</option>
					<option value="100000"<!--{if $params.min == 100000}--> selected="selected"<!--{/if}-->>10万円</option>
					<option value="120000"<!--{if $params.min == 120000}--> selected="selected"<!--{/if}-->>12万円</option>
					<option value="150000"<!--{if $params.min == 150000}--> selected="selected"<!--{/if}-->>15万円</option>
					<option value="200000"<!--{if $params.min == 200000}--> selected="selected"<!--{/if}-->>20万円</option>
					<option value="300000"<!--{if $params.min == 300000}--> selected="selected"<!--{/if}-->>30万円</option>
				</select>
				<span>〜</span>
				<select name="max">
					<option value="">未選択</option>
					<option value="50000"<!--{if $params.max == 50000}--> selected="selected"<!--{/if}-->>5万円</option>
					<option value="70000"<!--{if $params.max == 70000}--> selected="selected"<!--{/if}-->>7万円</option>
					<option value="100000"<!--{if $params.max == 100000}--> selected="selected"<!--{/if}-->>10万円</option>
					<option value="120000"<!--{if $params.max == 120000}--> selected="selected"<!--{/if}-->>12万円</option>
					<option value="150000"<!--{if $params.max == 150000}--> selected="selected"<!--{/if}-->>15万円</option>
					<option value="200000"<!--{if $params.max == 200000}--> selected="selected"<!--{/if}-->>20万円</option>
					<option value="300000"<!--{if $params.max == 300000}--> selected="selected"<!--{/if}-->>30万円</option>
				</select>
			</td>
		</tr>
		<tr>
			<th><img src="src/img/search_box/t_02.png" alt="間取り" /></th>
			<td>
				<!--{foreach from=$cnf.layout item=v key=k}-->
				<label class="dib w150"><input type="checkbox" name="l[]" value="<!--{$k}-->"<!--{if count($params.layout) > 0 && $k|in_array:$params.layout}--> checked="checked"<!--{/if}--> />&nbsp;<!--{$v}--></label>
				<!--{/foreach}-->
			</td>
		</tr>
<!--{if "area.php" != $smarty.server.PHP_SELF|basename && $location !== "line"}-->
		<tr class="area">
			<th><img src="src/img/search_box/t_03.png" alt="エリア" /></th>
			<td>
				<!--{foreach from=$cnf.area item=v key=k}-->
				<label class="dib w150"><input type="checkbox" name="a[]" value="<!--{$k}-->"<!--{if count($params.area) > 0 && $k|in_array:$params.area}--> checked="checked"<!--{/if}--> /> <!--{$v.name}--></label>
				<!--{/foreach}-->
			</td>
		</tr>
<!--{/if}-->
<!--{if $location === "line"}-->
		<tr class="line line-higashiyama dn">
			<th><img src="src/img/search_box/l_higashiyama.png" alt="地下鉄 東山線" /></th>
			<td>
				<!--{foreach from=$cnf.transport_station[1] item=v}-->
				<label class="dib mr30"><input type="checkbox" value="<!--{$v}-->" name="s[]"<!--{if (is_array($params.station) && in_array($v, $params.station)) || in_array($v,$params.active_stations)}--> checked="checked"<!--{/if}--> class="input_st input_st<!--{$v}-->" /> <!--{$cnf.station[$v]}--></label>
				<!--{/foreach}-->
			</td>
		</tr>
		<tr class="line line-sakuradori dn">
			<th><img src="src/img/search_box/l_sakuradori.png" alt="地下鉄 桜通線" /></th>
			<td>
				<!--{foreach from=$cnf.transport_station[4] item=v}-->
				<label class="dib mr30"><input type="checkbox" value="<!--{$v}-->" name="s[]"<!--{if (is_array($params.station) && in_array($v, $params.station)) || in_array($v,$params.active_stations)}--> checked="checked"<!--{/if}--> class="input_st input_st<!--{$v}-->" /> <!--{$cnf.station[$v]}--></label>
				<!--{/foreach}-->
			</td>
		</tr>
		<tr class="line line-tsurumai dn">
			<th><img src="src/img/search_box/l_tsurumai.png" alt="地下鉄 鶴舞線" /></th>
			<td>
				<!--{foreach from=$cnf.transport_station[2] item=v}-->
				<label class="dib mr30"><input type="checkbox" value="<!--{$v}-->" name="s[]"<!--{if (is_array($params.station) && in_array($v, $params.station)) || in_array($v,$params.active_stations)}--> checked="checked"<!--{/if}--> class="input_st input_st<!--{$v}-->" /> <!--{$cnf.station[$v]}--></label>
				<!--{/foreach}-->
			</td>
		</tr>
		<tr class="line line-meijo dn">
			<th><img src="src/img/search_box/l_meijo.png" alt="地下鉄 名城線" /></th>
			<td>
				<!--{foreach from=$cnf.transport_station[3] item=v}-->
				<label class="dib mr30"><input type="checkbox" value="<!--{$v}-->" name="s[]"<!--{if (is_array($params.station) && in_array($v, $params.station)) || in_array($v,$params.active_stations)}--> checked="checked"<!--{/if}--> class="input_st input_st<!--{$v}-->" /> <!--{$cnf.station[$v]}--></label>
				<!--{/foreach}-->
			</td>
		</tr>
		<tr class="line line-jr dn">
			<th><img src="src/img/search_box/l_jr.png" alt="JR中央本線" /></th>
			<td>
				<!--{foreach from=$cnf.transport_station[5] item=v}-->
				<label class="dib mr30"><input type="checkbox" value="<!--{$v}-->" name="s[]"<!--{if (is_array($params.station) && in_array($v, $params.station)) || in_array($v,$params.active_stations)}--> checked="checked"<!--{/if}--> class="input_st input_st<!--{$v}-->" /> <!--{$cnf.station[$v]}--></label>
				<!--{/foreach}-->
			</td>
		</tr>
<!--{/if}-->
	</tbody>
</table>
