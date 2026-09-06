<!--{* formタグ内にインクルードしてください *}-->
<div class="search_by_area_map_form_inner w980 mra mla posr">
	<div class="h"><img src="src/img/search_by_area_map/h_01.png" alt="名古屋エリア検索" /></div>
	<div class="map posr">
		<div><img src="src/img/search_by_area_map/map.png" alt="" /></div>
		<ul class="btns">
			<!--{foreach from=$cnf.area item=v key=k}-->
			<li class="<!--{$v.slug}--><!--{if count($params.area) > 0 && $k|in_array:$params.area}--> on<!--{/if}-->"><a href="javascript:void(0);"><!--{$v.name}--></a><input type="checkbox" name="a[]" value="<!--{$k}-->" class="dn"<!--{if count($params.area) > 0 &&  $k|in_array:$params.area}--> checked="checked"<!--{/if}--> /></li>
			<!--{/foreach}-->
		</ul>
	</div>
	<div class="tac mt15"><input type="image" src="src/img/search_by_area_map/b_search.png" class="fade_on_hover" alt="検索する" /></div>
	<script>
	$(function(){
		$("#main .search_by_area_map_form_inner .btns li > a").on("click", function(){
			var li = $(this).parent();
			var cbox = li.find('input[type="checkbox"]');
			var cbox_val = cbox.prop("checked");
			if( cbox_val ){
				li.removeClass("on");
			} else {
				li.addClass("on");
			}
			cbox.prop("checked", !cbox_val);
		});
	});
	</script>
</div><!-- .search_by_area_map_form_inner -->
