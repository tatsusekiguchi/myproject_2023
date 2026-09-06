<!--{if $upload == 'fail'}-->ファイルのアップロードに失敗しました<br /><!--{/if}-->
<!--{if $file != ''}--><br /><span class="confirm<!--{$num}-->"><a href="showImage.php?dir=<!--{$imgdir}-->&file=<!--{$file}-->&bg=<!--{$bg}-->" target="_blank"><img src="../uploads/<!--{$file}-->" style="width: 100px;" /></a></span>
<br />
<!--{if $name != "r_photo0" && $name != "r_photo1" && $name != "b_photo0" && $name != "b_photo1"}-->
<input type="checkbox" name="chk_<!--{$name}-->_c" id="id_chk_<!--{$name}-->_c" value="1"><label for="id_chk_<!--{$name}-->_c">削除</label><br />
	<br />
<!--{/if}-->
<span class="confirm<!--{$num}-->"><input type="button" class="del_photo" id="<!--{$id}-->" value="今すぐ削除" title="<!--{$num}-->" /></span>
<!--{/if}-->