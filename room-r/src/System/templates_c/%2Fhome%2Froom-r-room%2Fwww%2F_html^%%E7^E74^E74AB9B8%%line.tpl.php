<?php /* Smarty version 2.6.26, created on 2016-03-17 15:09:27
         compiled from line.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header_subpage.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="main">
		<div class="inner">
			<div class="topicpath w980 mra mla">
				<span><a href="<?php echo @WEB_ROOT; ?>
/">HOME</a></span>
				<span>＞ 沿線検索</span>
			</div><!-- .topicpath -->
			<h2 class="tac"><img src="src/img/line/h_01.png" alt="沿線検索" /></h2>
			<form action="./line.html#result" method="post">
				<div id="search-line" class="mt25">
					<div class="inner">
						<div class="h"><img src="src/img/line/h_03.png" alt="住みたい沿線・駅名を複数選択してください。" /></div>
						<div>
							<div class="bg-line bg-line-01 posa t0 l0"><img src="src/img/line/l_01.png" alt="" /></div>
							<div class="bg-line bg-line-02 posa t0 l0"><img src="src/img/line/l_02.png" alt="" /></div>
							<div class="bg-line bg-line-03 posa t0 l0"><img src="src/img/line/l_03.png" alt="" /></div>
							<div class="bg-line bg-line-04 posa t0 l0"><img src="src/img/line/l_04.png" alt="" /></div>
							<div class="bg-line bg-line-05 posa t0 l0"><img src="src/img/line/l_05.png" alt="" /></div>
						</div>
						<ul class="lines">
							<li class="<?php if (! empty ( $this->_tpl_vars['params']['line'] ) && in_array ( 1 , $this->_tpl_vars['params']['line'] )): ?>js-checked-onload<?php endif; ?>"><span class="clickable" style="background-image:url(src/img/line/b_01.png);">地下鉄 東山線</span><input type="checkbox" name="li[]" value="1" class="dn" id="input_line1" /></li>
							<li class="<?php if (! empty ( $this->_tpl_vars['params']['line'] ) && in_array ( 4 , $this->_tpl_vars['params']['line'] )): ?>js-checked-onload<?php endif; ?>"><span class="clickable" style="background-image:url(src/img/line/b_02.png);">地下鉄 桜通線</span><input type="checkbox" name="li[]" value="4" class="dn" id="input_line4" /></li>
							<li class="<?php if (! empty ( $this->_tpl_vars['params']['line'] ) && in_array ( 2 , $this->_tpl_vars['params']['line'] )): ?>js-checked-onload<?php endif; ?>"><span class="clickable" style="background-image:url(src/img/line/b_03.png);">地下鉄 鶴舞線</span><input type="checkbox" name="li[]" value="2" class="dn" id="input_line2" /></li>
							<li class="<?php if (! empty ( $this->_tpl_vars['params']['line'] ) && in_array ( 3 , $this->_tpl_vars['params']['line'] )): ?>js-checked-onload<?php endif; ?>"><span class="clickable" style="background-image:url(src/img/line/b_04.png);">地下鉄 名城線</span><input type="checkbox" name="li[]" value="3" class="dn" id="input_line3" /></li>
							<li class="<?php if (! empty ( $this->_tpl_vars['params']['line'] ) && in_array ( 5 , $this->_tpl_vars['params']['line'] )): ?>js-checked-onload<?php endif; ?>"><span class="clickable" style="background-image:url(src/img/line/b_05.png);">JR中央本線</span><input type="checkbox" name="li[]" value="5" class="dn" id="input_line5" /></li>
						</ul>
						<ul class="stations">
							
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 24 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 24 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-kokusaicenter li-02"><span class="clickable">国際センター</span><input type="checkbox" name="s[]" value="24" class="dn input_st input_st24" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 25 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 25 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-marunouchi li-02 li-03"><span class="clickable">丸の内</span><input type="checkbox" name="s[]" value="25" class="dn input_st input_st25" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 26 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 26 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-hisayaodori li-02 li-04"><span class="clickable">久屋大通</span><input type="checkbox" name="s[]" value="26" class="dn input_st input_st26" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 27 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 27 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-takaoka li-02"><span class="clickable">高岳</span><input type="checkbox" name="s[]" value="27" class="dn input_st input_st27" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 28 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 28 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-kurumamichi li-02"><span class="clickable">車道</span><input type="checkbox" name="s[]" value="28" class="dn input_st input_st28" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 65 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 65 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-ozone li-04 li-05"><span class="clickable">大曽根</span><input type="checkbox" name="s[]" value="65" class="dn input_st input_st65" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 1 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 1 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-nagoya li-01 li-02 li-05"><span class="clickable">名古屋</span><input type="checkbox" name="s[]" value="1" class="dn input_st input_st1" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 2 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 2 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-fushimi li-01 li-03"><span class="clickable">伏見</span><input type="checkbox" name="s[]" value="2" class="dn input_st input_st2" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 3 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 3 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-sakae li-01 li-04"><span class="clickable">栄</span><input type="checkbox" name="s[]" value="3" class="dn input_st input_st3" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 4 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 4 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-shinsakae li-01"><span class="clickable">新栄</span><input type="checkbox" name="s[]" value="4" class="dn input_st input_st4" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 5 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 5 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-chikusa li-01 li-05"><span class="clickable">千種</span><input type="checkbox" name="s[]" value="5" class="dn input_st input_st5" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 23 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 23 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-nakamurakuyakusho li-02"><span class="clickable">中村区役所</span><input type="checkbox" name="s[]" value="23" class="dn input_st input_st23" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 47 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 47 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-osukannon li-03"><span class="clickable">大須観音</span><input type="checkbox" name="s[]" value="47" class="dn input_st input_st47" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 48 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 48 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-kamimaezu li-03 li-04"><span class="clickable">上前津</span><input type="checkbox" name="s[]" value="48" class="dn input_st input_st48" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 49 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 49 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-tsurumai li-03 li-05"><span class="clickable">鶴舞</span><input type="checkbox" name="s[]" value="49" class="dn input_st input_st49" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 80 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 80 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-higashibetsuin li-04"><span class="clickable">東別院</span><input type="checkbox" name="s[]" value="80" class="dn input_st input_st80" /></li>
							<li class="<?php if (( ! empty ( $this->_tpl_vars['params']['station'] ) && in_array ( 79 , $this->_tpl_vars['params']['station'] ) ) || in_array ( 79 , $this->_tpl_vars['params']['active_stations'] )): ?>js-checked-onload <?php endif; ?>station-kanayama li-04 li-05"><span class="clickable">金山</span><input type="checkbox" name="s[]" value="79" class="dn input_st input_st79" /></li>
						</ul>
						<script>
						$(function(){
							// チェックボックスの操作
							$("#search-line .lines > li > .clickable, #search-line .stations > li > .clickable").on("click", function(){
								var cbox = $(this).parent().find('input[type="checkbox"]');
								var cbox_val = cbox.prop("checked");
								if( cbox_val ){
									$(this).removeClass("on");
								} else {
									$(this).addClass("on");
								}
								cbox.prop("checked", !cbox_val);
							});

							var stations = $("#search-line .stations > li");
							var lines = $("#search-line .bg-line");

							// 沿線ホバー
							$("#search-line .lines > li > .clickable").on({"mouseenter": function(){
								var i = $(this).parent().index() + 1;
								stations.addClass("ex____");
								$("#search-line .li-0" + i).removeClass("ex____");
								$("#search-line .bg-line-0" + i).siblings().stop(true, false).fadeTo(120, 0.2);
								$("#search-line .ex____").stop(true, false).fadeTo(120, 0.2).removeClass("ex____");
							}, "mouseleave": function(){
								stations.stop(true, false).fadeTo(120, 1);
								lines.stop(true, false).fadeTo(120, 1);
							}});

							// 駅ホバー
							$("#search-line .stations > li > .clickable").on({"mouseenter": function(){
								stations.addClass("ex____");
								var li = $(this).parent();
								for(var i = 1; i <= 5; i++){
									if( li.hasClass("li-0" + i) ){
										$("#search-line .li-0" + i).removeClass("ex____");
									} else {
										$("#search-line .bg-line-0" + i).stop(true, false).fadeTo(120, 0.2);
									}
								}
								$("#search-line .ex____").stop(true, false).fadeTo(120, 0.2).removeClass("ex____");
							}, "mouseleave": function(){
								stations.stop(true, false).fadeTo(120, 1);
								lines.stop(true, false).fadeTo(120, 1);
							}});

							$(window).on("load", function(){
								$("#search-line .js-checked-onload").removeClass("js-checked-onload").find(".clickable").trigger("click");

								// 駅クリック
								$(".stations .clickable,.input_st").on("click",function(){
									var target = $(this);
									if($(this).next("input").length > 0){
										target = $(this).next("input");
									}
									if(target.prop("checked")){
										$(".input_st"+target.val()).prop("checked",true);
										$(".input_st"+target.val()).prev(".clickable").addClass("on");
									}else{
										$(".input_st"+target.val()).prop("checked",false);
										$(".input_st"+target.val()).prev(".clickable").removeClass("on");
									}
								});

								// 沿線と駅設定
								var line_station = {
<?php $_from = $this->_tpl_vars['cnf']['transport_station']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
									<?php if ($this->_tpl_vars['k'] != 0): ?>,<?php endif; ?><?php echo $this->_tpl_vars['k']; ?>
:{
<?php $_from = $this->_tpl_vars['v']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k2'] => $this->_tpl_vars['v2']):
?>
										<?php if ($this->_tpl_vars['k2'] != 0): ?>,<?php endif; ?><?php echo $this->_tpl_vars['k2']; ?>
:<?php echo $this->_tpl_vars['v2']; ?>

<?php endforeach; endif; unset($_from); ?>
									}
<?php endforeach; endif; unset($_from); ?>
								}

								// 沿線クリック
								$(".lines .clickable").on("click",function(){
									var li = $(this).next().val();
									for(var i in line_station[li]){
										if($(this).next().prop("checked")){
											$(".input_st"+line_station[li][i]).prop("checked",true);
											$(".input_st"+line_station[li][i]).prev(".clickable").addClass("on");
										}else{
											$(".input_st"+line_station[li][i]).prop("checked",false);
											$(".input_st"+line_station[li][i]).prev(".clickable").removeClass("on");
										}
									}
								});
								// 駅が変更された時
								$(".stations .clickable,.input_st").on("click",function(){
									var target = $(this);
									if($(this).next("input").length > 0){
										target = $(this).next("input");
									}
									if(!target.prop("checked")){
										for(var i in line_station){
											// 沿線ボタン分回す
											if($("#input_line"+i).prop("checked")){
												// 沿線ボタンがアクティブなら
												var flg = false;
												for(var j in line_station[i]){
													if(j == target.val()){
														// クリックした駅が現在の沿線に属する駅なら
														flg = true;
													}
												}
												if(flg){
													// 沿線ボタンを非アクティブにする
													$("#input_line"+i).prop("checked",false);
													$("#input_line"+i).prev(".clickable").removeClass("on");
												}
											}
										}
									}
								});
							});
						});
						</script>
					</div><!-- .inner -->
					<div class="tac mt20"><input type="image" src="src/img/line/b_search.png" alt="検索する" class="fade_on_hover" /></div>
				</div><!-- #search-line -->
				<div id="search-cond">
						<h3 class="tac"><img src="src/img/line/h_02.png" alt="条件をつけて絞り込む" /></h3>
						<div class="w800 mra mla mt15">
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_box.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							<script>
							$(function(){
								<?php if (is_array ( $this->_tpl_vars['params']['line'] ) && in_array ( 1 , $this->_tpl_vars['params']['line'] )): ?>$("#search-cond .line-higashiyama").removeClass("dn");<?php endif; ?>
								<?php if (is_array ( $this->_tpl_vars['params']['line'] ) && in_array ( 4 , $this->_tpl_vars['params']['line'] )): ?>$("#search-cond .line-sakuradori").removeClass("dn");<?php endif; ?>
								<?php if (is_array ( $this->_tpl_vars['params']['line'] ) && in_array ( 2 , $this->_tpl_vars['params']['line'] )): ?>$("#search-cond .line-tsurumai").removeClass("dn");<?php endif; ?>
								<?php if (is_array ( $this->_tpl_vars['params']['line'] ) && in_array ( 3 , $this->_tpl_vars['params']['line'] )): ?>$("#search-cond .line-meijo").removeClass("dn");<?php endif; ?>
								<?php if (is_array ( $this->_tpl_vars['params']['line'] ) && in_array ( 5 , $this->_tpl_vars['params']['line'] )): ?>$("#search-cond .line-jr").removeClass("dn");<?php endif; ?>
								$('#search-cond .line.dn input[type="checkbox"]').each(function(){
									if( $(this).prop("checked") ) $(this).parents(".line.dn").removeClass("dn");
								});
							});
							</script>
						</div>
						<div class="tac mt20"><input type="image" src="src/img/line/b_search.png" alt="検索する" class="fade_on_hover" /></div>
				</div><!-- #search-cond -->
				<div id="result">
					<div class="w980 mra mla">
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_found.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						<div class="pagination-block">
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'pagenation.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
						</div><!-- .pagination-block -->
					</div>
				</div><!-- #result -->
			</form>
		</div><!-- .inner -->
	</div><!-- #main -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>