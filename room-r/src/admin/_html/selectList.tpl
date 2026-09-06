<table border="1">
<tr>
    <th>物件番号</th>
    <th>物件名</th>
    <th>所在地</th>
    <th>選択</th>
</tr>
<!--{section name=b loop=$buildings}-->
<!--{assign var=structure_c value=`$buildings[b].structure_c`}-->
<!--{assign var=event_c value=`$buildings[b].event_c`}-->
<!--{assign var=status_c value=`$buildings[b].status_c`}-->
<!--{assign var=building_id_c value=`$buildings[b].building_id_c`}-->
<!--{assign var=area_array_c value=$buildings[b].area_array_c}-->
<tr>
<td><input type="hidden" name="bid[<!--{$smarty.section.b.index}-->]" id="bid_<!--{$smarty.section.b.index}-->" value="<!--{$buildings[b].building_id_c|escape}-->" /><span id="bno_<!--{$smarty.section.b.index}-->"><!--{$buildings[b].building_no_c|escape}--></span></td>
<td><span id="bname_<!--{$smarty.section.b.index}-->"><!--{$buildings[b].building_name_c|escape}--></span></td>
<td><span id="bplace_<!--{$smarty.section.b.index}-->"><!--{$buildings[b].pref_c|escape}--><!--{$buildings[b].address_c|escape}--></span></td>
<td><!--{$statuses.$status_c|escape}--></td>
<td><input type="button" name="btnSearch[<!--{$smarty.section.b.index}-->]" value="選択" onclick="javascript:notifyParent(<!--{$smarty.section.b.index}-->);" /></td>

</tr>
<!--{/section}-->
</table>
