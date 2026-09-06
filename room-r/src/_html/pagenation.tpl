
<ul class="pagination">

	<!--{if $page > 1}-->
	<li class="prev"><a href="?page=<!--{$page-1}--><!--{$url_param}--><!--{$op}-->#result">&lt;</a></li>
	<!--{/if}-->

	<!--{foreach from=$p.pagination item=v}-->
	<li<!--{if $page == $v}--> class="current"<!--{/if}-->><a href="?page=<!--{$v}--><!--{$url_param}--><!--{$op}-->#result"><!--{$v}--></a></li>
	<!--{/foreach}-->

	<!--{if $cnt_bukken > $page*$smarty.const.NUM_IN_A_PAGE}-->
	<li class="next"><a href="?page=<!--{$page+1}--><!--{$url_param}--><!--{$op}-->#result">&gt;</a></li>
	<!--{/if}-->
<!--
	<li class="prev"><a href="#">&lt;</a></li>
	<li class="current"><a href="#">1</a></li>
	<li><a href="#">2</a></li>
	<li><a href="#">3</a></li>
	<li><a href="#">4</a></li>
	<li><a href="#">5</a></li>
	<li class="next"><a href="#">&gt;</a></li>
-->
</ul><!-- .pagination -->