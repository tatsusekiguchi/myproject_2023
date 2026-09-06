<?php /* Smarty version 2.6.26, created on 2016-05-19 15:28:13
         compiled from sortEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'sortEdit.tpl', 118, false),)), $this); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.11.0m.js"></script>
<script type="text/javascript" src="js/jquery.upload-1.0.2.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/searchensen.js"></script>
<script type="text/javascript">

/* Cookie への書き出し
引数 key　 : データキー （半角英数 _ のみ）
引数 value : データの値（日本語可）
引数 days  : データを保持する日数（ 0 の時は有効期限は省略）*/
function WriteCookie(key, value, days)
{
	var str = key + "=" + escape(value) + ";";	  // 書き出す値１ : key=value
	if (days != 0) {								/* 日数 0 の時は省略 */
		var dt = new Date();					   // 現在の日時
		dt.setDate(dt.getDate() + days);			// days日後の日時
		str += "expires=" + dt.toGMTString() + ";"; // 書き出す値２ : 有効期限
	}
	document.cookie = str;						  // Cookie に書き出し
}

/* Cookie の読み込み
引数 key : 求める値のキー
戻り値　 : 値（ない時は空文字""）*/
function ReadCookie(key) {
	var sCookie = document.cookie;	// Cookie文字列
	var aData = sCookie.split(";");	   // ";"で区切って"キー=値"の配列にする
	var oExp = new RegExp(" ", "g");   // すべての半角スペースを表す正規表現
	key = key.replace(oExp, "");		  // 引数keyから半角スペースを除去

	var i = 0;
	while (aData[i]) {						   /* 語句ごとの処理 : マッチする要素を探す */
		var aWord = aData[i].split("=");						 // さらに"="で区切る
		aWord[0] = aWord[0].replace(oExp, "");			  // 半角スペース除去
		if (key == aWord[0]) return unescape(aWord[1]); // マッチしたら値を返す
		if (++i >= aData.length) break;						  // 要素数を超えたら抜ける
	}
	return "";								   // 見つからない時は空文字を返す
}


function deleteAlert() {
	var con = confirm("削除します、よろしいですか？");
	return con;
}

$(function(){
	<?php if ($this->_tpl_vars['altFlg']): ?>
		alert("順位を更新しました");
	<?php endif; ?>
});

</script>
<title>順位変更</title>
<script type="text/javascript">
$(function(){
	$("#menu_top > li").eq(1).addClass("on");
});
</script>
</head>
<body>
<div id="wrapper">
	<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'menu.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="main" class="sd01">
		<div class="inner">
			<h1>順位変更</h1>
			<?php $this->assign('srch_form_target', "sortEdit.php?".($this->_tpl_vars['pageMode'])."=".($this->_tpl_vars['pageVal'])); ?>
			<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'searchBuilding.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

			<div id="area_list">
				<p>該当物件数：<strong style="font-size:20px; font-weight: bold;"><?php echo $this->_tpl_vars['p']['cnt_all']; ?>
</strong>件</p>
				<ul class="pagination">
					<?php if ($this->_tpl_vars['p']['page'] > 1): ?>
					<li class="prev"><a href="<?php echo $this->_tpl_vars['srch_form_target']; ?>
&page=<?php echo $this->_tpl_vars['p']['page']-1; ?>
<?php echo $this->_tpl_vars['urlp']; ?>
<?php echo $this->_tpl_vars['urlps']['sort']; ?>
<?php echo $this->_tpl_vars['op']; ?>
">前へ</a></li>
					<?php endif; ?>
				
					<?php $_from = $this->_tpl_vars['p']['pagination']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
					<li<?php if ($this->_tpl_vars['p']['page'] == $this->_tpl_vars['v']): ?> class="on"<?php endif; ?>><a href="<?php echo $this->_tpl_vars['srch_form_target']; ?>
&page=<?php echo $this->_tpl_vars['v']; ?>
<?php echo $this->_tpl_vars['urlp']; ?>
<?php echo $this->_tpl_vars['urlps']['sort']; ?>
<?php echo $this->_tpl_vars['op']; ?>
"><?php echo $this->_tpl_vars['v']; ?>
</a></li>
					<?php endforeach; endif; unset($_from); ?>
				
					<?php if ($this->_tpl_vars['p']['cnt_all'] > $this->_tpl_vars['p']['page']*@NUM_PAR_PAGE): ?>
					<li class="next"><a href="<?php echo $this->_tpl_vars['srch_form_target']; ?>
&page=<?php echo $this->_tpl_vars['p']['page']+1; ?>
<?php echo $this->_tpl_vars['urlp']; ?>
<?php echo $this->_tpl_vars['urlps']['sort']; ?>
<?php echo $this->_tpl_vars['op']; ?>
">次へ</a></li>
					<?php endif; ?>
				</ul>

				<form action="<?php echo $this->_tpl_vars['srch_form_target']; ?>
" method="post">
				<table class="style_l">
					<tr>
						<th class="first" style="width:95px;"><a href="sortEdit.php<?php echo $this->_tpl_vars['sort_link_param']['building_no_c']; ?>
&<?php echo $this->_tpl_vars['pageMode']; ?>
=<?php echo $this->_tpl_vars['pageVal']; ?>
<?php echo $this->_tpl_vars['urlp']; ?>
">物件番号</a></th>
						<th><a href="sortEdit.php<?php echo $this->_tpl_vars['sort_link_param']['building_name_c']; ?>
&<?php echo $this->_tpl_vars['pageMode']; ?>
=<?php echo $this->_tpl_vars['pageVal']; ?>
<?php echo $this->_tpl_vars['urlp']; ?>
">物件名</a></th>
						<th>沿線</th>
						<th style="width:85px;">公開状況</th>
						<th class="last" style="width:85px;">表示順位</th>
					</tr>
					<?php unset($this->_sections['b']);
$this->_sections['b']['name'] = 'b';
$this->_sections['b']['loop'] = is_array($_loop=$this->_tpl_vars['buildings']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['b']['show'] = true;
$this->_sections['b']['max'] = $this->_sections['b']['loop'];
$this->_sections['b']['step'] = 1;
$this->_sections['b']['start'] = $this->_sections['b']['step'] > 0 ? 0 : $this->_sections['b']['loop']-1;
if ($this->_sections['b']['show']) {
    $this->_sections['b']['total'] = $this->_sections['b']['loop'];
    if ($this->_sections['b']['total'] == 0)
        $this->_sections['b']['show'] = false;
} else
    $this->_sections['b']['total'] = 0;
if ($this->_sections['b']['show']):

            for ($this->_sections['b']['index'] = $this->_sections['b']['start'], $this->_sections['b']['iteration'] = 1;
                 $this->_sections['b']['iteration'] <= $this->_sections['b']['total'];
                 $this->_sections['b']['index'] += $this->_sections['b']['step'], $this->_sections['b']['iteration']++):
$this->_sections['b']['rownum'] = $this->_sections['b']['iteration'];
$this->_sections['b']['index_prev'] = $this->_sections['b']['index'] - $this->_sections['b']['step'];
$this->_sections['b']['index_next'] = $this->_sections['b']['index'] + $this->_sections['b']['step'];
$this->_sections['b']['first']      = ($this->_sections['b']['iteration'] == 1);
$this->_sections['b']['last']       = ($this->_sections['b']['iteration'] == $this->_sections['b']['total']);
?>
					<?php $this->assign('event_c', ($this->_tpl_vars['buildings'][$this->_sections['b']['index']]['event_c'])); ?>
					<?php $this->assign('status_c', ($this->_tpl_vars['buildings'][$this->_sections['b']['index']]['status_c'])); ?>
					<?php $this->assign('building_id_c', ($this->_tpl_vars['buildings'][$this->_sections['b']['index']]['building_id_c'])); ?>
					
					<?php $this->assign('layout_c', $this->_tpl_vars['buildings'][$this->_sections['b']['index']]['layout_c']); ?>
					<?php $this->assign('transport1_c', $this->_tpl_vars['buildings'][$this->_sections['b']['index']]['transport1_c']); ?>
					<?php $this->assign('transport2_c', $this->_tpl_vars['buildings'][$this->_sections['b']['index']]['transport2_c']); ?>
					<?php $this->assign('station1_c', $this->_tpl_vars['buildings'][$this->_sections['b']['index']]['station1_c']); ?>
					<?php $this->assign('station2_c', $this->_tpl_vars['buildings'][$this->_sections['b']['index']]['station2_c']); ?>
					<tr class="no_menu">
						<td class="first">
							<div class="num">
								<div><?php echo ((is_array($_tmp=$this->_tpl_vars['buildings'][$this->_sections['b']['index']]['building_no_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</div>
							</div>
						</td>
						<td><?php echo ((is_array($_tmp=$this->_tpl_vars['buildings'][$this->_sections['b']['index']]['building_name_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
						<td><?php echo $this->_tpl_vars['transport'][$this->_tpl_vars['transport1_c']]; ?>
<?php echo $this->_tpl_vars['station'][$this->_tpl_vars['station1_c']]; ?>
駅&nbsp;徒歩<?php echo ((is_array($_tmp=$this->_tpl_vars['buildings'][$this->_sections['b']['index']]['distance1_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
分</td>
						<td class="last"><?php echo ((is_array($_tmp=$this->_tpl_vars['statuses'][$this->_tpl_vars['status_c']])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>
						<td style="width: 60px; text-align: center;">
							<?php if ($this->_tpl_vars['pageMode'] == 'sincyaku'): ?><?php $this->assign('sort_val', $this->_tpl_vars['buildings'][$this->_sections['b']['index']]['sort_sincyaku_c']); ?><?php endif; ?>
							<?php if ($this->_tpl_vars['pageMode'] == 'area'): ?><?php $this->assign('sort_val', $this->_tpl_vars['buildings'][$this->_sections['b']['index']]['sort_area_c']); ?><?php endif; ?>
							<?php if ($this->_tpl_vars['pageMode'] == 'ensen'): ?><?php $this->assign('sort_val', $this->_tpl_vars['buildings'][$this->_sections['b']['index']]['sort_ensen_c']); ?><?php endif; ?>
							<?php if ($this->_tpl_vars['pageMode'] == 'fid'): ?><?php $this->assign('sort_val', $this->_tpl_vars['buildings'][$this->_sections['b']['index']]['sort_c']); ?><?php endif; ?>
							<input type="text" size="2" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['sort_val'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" name="sort[<?php echo $this->_tpl_vars['buildings'][$this->_sections['b']['index']]['building_id_c']; ?>
]">
						</td>
					</tr>
					<?php endfor; endif; ?>
				</table>
				<div class="right mt20"><input type="submit" name="renewSort" value="順位を更新" /></div>
				</form>
			</div>

			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>