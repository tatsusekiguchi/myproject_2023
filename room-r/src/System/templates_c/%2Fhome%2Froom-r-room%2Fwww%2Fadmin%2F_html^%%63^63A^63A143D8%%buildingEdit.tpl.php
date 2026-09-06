<?php /* Smarty version 2.6.26, created on 2016-07-25 16:06:20
         compiled from buildingEdit.tpl */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<link href="css/fileuploader.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.11.0m.js"></script>
<script type="text/javascript" src="js/jquery.upload-1.0.2.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/buildingEdit.js"></script>
<script type="text/javascript">
$(function(){
	$("#7aeda81bed346dc").on('click', function(){
		var sub = window.open('img/ref_area.png', '', 'width=707,height=512,status=0,location=0,resizable=0,scrollbars=1,toolbar=0');
		sub.focus();
	});

	$("#id_transport1_c").on('change',function(){
		var no = $(this).val();
		if(no != ""){
			ajax = jQuery.ajax({
				url : '../ajax/ajaxStation.php',
				type: 'POST',
				data: {
					"no": no
					},
				success: function(data){
						$("#id_station1_c").html("");
						for(var i in data){
							$("#id_station1_c").append('<option value="'+data[i]["id"]+'">'+data[i]["val"]+'</option>');
						}
					},
				error: function(){
						alert("沿線データ取得に失敗しました");
					}
			});
		}else{
			$("#id_station1_c").html('<option value=""></option>');
		}
	});
	$("#id_transport2_c").on('change',function(){
		var no = $(this).val();
		if(no != ""){
			ajax = jQuery.ajax({
				url : '../ajax/ajaxStation.php',
				type: 'POST',
				data: {
					"no": no
					},
				success: function(data){
						$("#id_station2_c").html("");
						for(var i in data){
							$("#id_station2_c").append('<option value="'+data[i]["id"]+'">'+data[i]["val"]+'</option>');
						}
					},
				error: function(){
						alert("沿線データ取得に失敗しました");
					}
			});
		}else{
			$("#id_station2_c").html('<option value=""></option>');
		}
	});

	/* %%%%%%%%%%%%%%%% */

	$(".box_fileup .clickable").on('click', function(){
		$(this).nextAll('.hidden').find('input[type="file"]').click();
	});

	$('.box_fileup input[type="file"]').on('change', function(){
		var updated_file_path = $(this).val();
		var garbage = updated_file_path.split('\\');
		var updated_file = garbage[garbage.length-1];
		$(this).parents('.hidden').prevAll('.updated_filename').remove();
		$(this).parents('.hidden').prevAll('.clickable').after('<div class="updated_filename">'+updated_file+'</div>');
	});

	// imemode
	$("input").each(function(){
		style = String($(this).attr("style"));
		if(style.indexOf("ime-mode: disabled") != -1 || style.indexOf("ime-mode:disabled") != -1){
			// 適用
			txt  = $(this).val();
			han = txt.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){return String.fromCharCode(s.charCodeAt(0)-0xFEE0)});
			han = han.replace(/[^A-Za-z0-9\\\*\+\.\?\{\}\(\)\[\]\^\$\-\|\/]/g,'');
			if($(this).attr("maxlength") >= 1){
				if(han.length > parseInt($(this).attr("maxlength"))){
					han = han.substr(0,parseInt($(this).attr("maxlength")));
				}
			}
			$(this).val(han);

			$(this).bind("keyup",function(){
				txt  = $(this).val();
				han = txt.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){return String.fromCharCode(s.charCodeAt(0)-0xFEE0)});
				han = han.replace(/[^A-Za-z0-9\\\*\+\.\?\{\}\(\)\[\]\^\$\-\|\/]/g,'');
				if($(this).attr("maxlength") >= 1){
					if(han.length > parseInt($(this).attr("maxlength"))){
						han = han.substr(0,parseInt($(this).attr("maxlength")));
					}
				}
				if(han !== txt){
					$(this).val(han);
				}
			});
		}
	})
});
</script>
<title><?php if ($this->_tpl_vars['id'] > 0): ?>建物の編集<?php else: ?>建物の新規追加<?php endif; ?></title>
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
			<h1><?php if ($this->_tpl_vars['id'] > 0): ?>建物の編集<?php else: ?>建物の新規追加<?php endif; ?></h1>

			<?php if (! empty ( $this->_tpl_vars['result'] ) && is_array ( $this->_tpl_vars['result'] )): ?><div class="result<?php if ($this->_tpl_vars['result']['res']): ?> done<?php else: ?> error<?php endif; ?>"><?php echo $this->_tpl_vars['result']['mes']; ?>
</div><?php endif; ?>

			<div id="area_building_edit">
				<div class="right small mb5"><span style="color:#ae151d;">※</span>は必須項目です</div>
				<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
				<input type="hidden" name="mode" value="edit" />
				<table class="style_e">
					<tr>
						<th class="required">物件番号<span class="red">※</span></th>
						<td><?php echo $this->_tpl_vars['form']['building_no_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['building_no_c']['error']; ?>
</td>
					</tr>
					<tr>
						<th class="required">物件名<span class="red">※</span></th>
						<td>
							<div><label><?php echo $this->_tpl_vars['form']['building_name_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['building_name_c']['error']; ?>
</label></div>
							<div class="mt5"><label>フリガナ <?php echo $this->_tpl_vars['form']['building_furigana_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['building_furigana_c']['error']; ?>
</label></div>
						</td>
					</tr>
					<tr>
						<th class="required">所在地<span class="red">※</span></th>
						<td>
							<?php echo $this->_tpl_vars['form']['pref_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['pref_c']['error']; ?>

							<?php echo $this->_tpl_vars['form']['ku_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['ku_c']['error']; ?>

							<?php echo $this->_tpl_vars['form']['address_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['address_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th class="required">google座標<span class="red">※</span></th>
						<td>
							<label>緯度: <?php echo $this->_tpl_vars['form']['latitude_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['latitude_c']['error']; ?>
</label>
							<label>経度: <?php echo $this->_tpl_vars['form']['longitude_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['longitude_c']['error']; ?>
</label>
							<?php if ($this->_tpl_vars['form_state'] == 1): ?>
							<img class="middle have_effect" src="img/sign_up/btn_pos.png" alt="座標設定" onclick="javascript:openSubWindow('./GoogleMapsSimple.php');" />
							<?php endif; ?>
						</td>
					</tr>
					<tr>
						<th class="required">沿線1<span class="red">※</span></th>
						<td>
							<?php echo $this->_tpl_vars['form']['transport1_c']['html']; ?>

							<?php echo $this->_tpl_vars['form']['station1_c']['html']; ?>

							徒歩 <?php echo $this->_tpl_vars['form']['distance1_c']['html']; ?>
 分<br />
							<?php echo $this->_tpl_vars['form']['transport1_c']['error']; ?>

							<?php echo $this->_tpl_vars['form']['station1_c']['error']; ?>

							<?php echo $this->_tpl_vars['form']['distance1_c']['error']; ?>

							その他の沿線の場合は以下を入力してください<br />
							沿線名：<?php echo $this->_tpl_vars['form']['transport3_c']['html']; ?>

							駅名：<?php echo $this->_tpl_vars['form']['station3_c']['html']; ?>

							徒歩 <?php echo $this->_tpl_vars['form']['distance3_c']['html']; ?>
 分<br />
							<?php echo $this->_tpl_vars['form']['transport3_c']['error']; ?>

							<?php echo $this->_tpl_vars['form']['station3_c']['error']; ?>

							<?php echo $this->_tpl_vars['form']['distance3_c']['error']; ?>
<br />
						</td>
					</tr>
					<tr>
						<th>沿線2</th>
						<td>
							<?php echo $this->_tpl_vars['form']['transport2_c']['html']; ?>

							<?php echo $this->_tpl_vars['form']['station2_c']['html']; ?>

							徒歩 <?php echo $this->_tpl_vars['form']['distance2_c']['html']; ?>
 分
							<?php echo $this->_tpl_vars['form']['transport2_c']['error']; ?>

							<?php echo $this->_tpl_vars['form']['station2_c']['error']; ?>

							<?php echo $this->_tpl_vars['form']['distance2_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th class="required">エリア<span class="red">※</span></th>
						<td>
							<?php echo ''; ?><?php $this->assign('old', '01'); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['a'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['a']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['val']):
        $this->_foreach['a']['iteration']++;
?><?php echo ''; ?><?php if ($this->_tpl_vars['k'] != '9999'): ?><?php echo ''; ?><?php $this->assign('spacer', " , "); ?><?php echo ''; ?><?php if (($this->_foreach['a']['iteration'] <= 1) == true): ?><?php echo ''; ?><?php $this->assign('spacer', ""); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_tpl_vars['spacer']; ?><?php echo ''; ?><?php echo $this->_tpl_vars['form']['AreaGrp'][$this->_tpl_vars['k']]['html']; ?><?php echo ''; ?><?php $this->assign('old', $this->_tpl_vars['new']); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
<br />
							<!-- <span class="clickable have_effect" id="7aeda81bed346dc"><img src="img/btn_area.png" alt="図を表示する" /></span> -->
							<?php echo $this->_tpl_vars['form']['AreaGrp']['error']; ?>

						</td>
					</tr>
					<tr>
						<th class="required">構造<span class="red">※</span></th>
						<td><?php echo $this->_tpl_vars['form']['structure_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['structure_c']['error']; ?>
</td>
					</tr>
					<tr>
						<th>総戸数</th>
						<td><?php echo $this->_tpl_vars['form']['house_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['house_c']['error']; ?>
</td>
					</tr>
					<tr>
						<th>階数</th>
						<td>
							<?php echo $this->_tpl_vars['form']['floor_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['floor_c']['error']; ?>
 階建
						</td>
					</tr>
					<tr>
						<th class="required">築年月（西暦）<span class="red">※</span></th>
						<td><?php echo $this->_tpl_vars['form']['completion_year_c']['html']; ?>
 年 <?php echo $this->_tpl_vars['form']['completion_year_c']['error']; ?>
<?php echo $this->_tpl_vars['form']['completion_month_c']['html']; ?>
 月 <?php echo $this->_tpl_vars['form']['completion_month_c']['error']; ?>
</td>
					</tr>
					<tr>
						<th class="normal">特集フラグ</th>
						<td>
							<?php echo ''; ?><?php $this->assign('old', '01'); ?><?php echo ''; ?><?php $_from = $this->_tpl_vars['cnf']['feature']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }$this->_foreach['a'] = array('total' => count($_from), 'iteration' => 0);
if ($this->_foreach['a']['total'] > 0):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['val']):
        $this->_foreach['a']['iteration']++;
?><?php echo ''; ?><?php $this->assign('spacer', "&nbsp;&nbsp;"); ?><?php echo ''; ?><?php if (($this->_foreach['a']['iteration'] <= 1) == true): ?><?php echo ''; ?><?php $this->assign('spacer', ""); ?><?php echo ''; ?><?php endif; ?><?php echo ''; ?><?php echo $this->_tpl_vars['spacer']; ?><?php echo ''; ?><?php echo $this->_tpl_vars['form']['FeatureGrp'][$this->_tpl_vars['k']]['html']; ?><?php echo ''; ?><?php $this->assign('old', $this->_tpl_vars['new']); ?><?php echo ''; ?><?php endforeach; endif; unset($_from); ?><?php echo ''; ?>
<br />
							<?php echo $this->_tpl_vars['form']['FeatureGrp']['error']; ?>

						</td>
					</tr>
					<tr>
						<th class="normal">ペット</th>
						<td>
							<?php echo $this->_tpl_vars['form']['petGrp']['html']; ?>
<br /><?php echo $this->_tpl_vars['form']['petGrp']['error']; ?>

							<div>フリーワード：<?php echo $this->_tpl_vars['form']['petfree_c']['html']; ?>
</div>
							<?php echo $this->_tpl_vars['form']['petfree_c']['error']; ?>

						</dt>
					</tr>
					<tr>
						<th class="required">駐車場<span class="red">※</span></th>
						<td>
							<?php echo $this->_tpl_vars['form']['parking_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['parking_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th>駐車場タイプ</th>
						<td>
							<?php echo $this->_tpl_vars['form']['parking_type_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['parking_type_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th>駐車場料金</th>
						<td class="tax_scope">
							<span class="tax_excluded"><?php echo $this->_tpl_vars['form']['parking_charge_c']['html']; ?>
</span> 円 <?php echo $this->_tpl_vars['form']['parking_charge_c']['error']; ?>

							<?php echo $this->_tpl_vars['form']['parking_tax_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['parking_tax_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th>火災保険</th>
						<td class="tax_scope">
							<span class="tax_excluded"><?php echo $this->_tpl_vars['form']['fire_c']['html']; ?>
</span> 円<?php echo $this->_tpl_vars['form']['fire_c']['error']; ?>

							<?php echo $this->_tpl_vars['form']['fire_flg_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['fire_flg_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th>おすすめ<br />ポイント</th>
						<td><?php echo $this->_tpl_vars['form']['comment1_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['comment1_c']['error']; ?>
<?php if ($this->_tpl_vars['form_state'] == 1): ?> ※最大200文字<?php endif; ?></td>
					</tr>
					<tr>
						<th>キャッチコピー</th>
						<td><?php echo $this->_tpl_vars['form']['catch_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['catch_c']['error']; ?>
<?php if ($this->_tpl_vars['form_state'] == 1): ?> ※最大18文字<?php endif; ?></td>
					</tr>
					<tr>
						<th>管理会社情報</th>
						<td>
							<div><div class="leftside" style="width:60px;">名前</div><?php echo $this->_tpl_vars['form']['yanushi_name_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['yanushi_name_c']['error']; ?>
</div>
							<div class="mt5"><div class="leftside" style="width:60px;">電話1</div><?php echo $this->_tpl_vars['form']['yanushi_tel1_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['yanushi_tel1_c']['error']; ?>
</div>
							<div class="mt5"><div class="leftside" style="width:60px;">電話2</div><?php echo $this->_tpl_vars['form']['yanushi_tel2_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['yanushi_tel2_c']['error']; ?>
</div>
						</td>
					</tr>
					<tr>
						<th>保証会社</th>
						<td>
							<div><?php echo $this->_tpl_vars['form']['hoshou_availability_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['hoshou_availability_c']['error']; ?>
</div>
							<div class="mt5">
								<?php echo $this->_tpl_vars['form']['hoshou_company_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['hoshou_company_c']['error']; ?>

								<span class="pad">&nbsp;&nbsp;</span>
								保証料 <?php echo $this->_tpl_vars['form']['hoshou_charge_c']['html']; ?>
 円<?php echo $this->_tpl_vars['form']['hoshou_charge_c']['error']; ?>

							</div>
							<div class="mt5">
								更新料 <?php echo $this->_tpl_vars['form']['hoshou_charge2_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['hoshou_charge2_c']['error']; ?>

								<?php echo $this->_tpl_vars['form']['hoshou_charge2_type_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['hoshou_charge2_type_c']['error']; ?>

								<span>/</span>
								<?php echo $this->_tpl_vars['form']['hoshou_charge2_interval_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['hoshou_charge2_interval_c']['error']; ?>

							</div>
						</td>
					</tr>
					<tr>
						<th>一覧画像</th>
						<td>
							<div class="box_fileup">
								<?php if ($this->_tpl_vars['form_state'] != 2): ?>
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span>
									<div class="hidden"><input name="name_b_photo0_c" type="file" class="class_photo" title="b_photo0" /></div>
									<?php if ($this->_tpl_vars['b_photo0_err'] != ''): ?><div><?php echo $this->_tpl_vars['b_photo0_err']; ?>
</div><?php endif; ?>
								</div>
								<?php endif; ?>
								<div id="text_b_photo0_c" class="column1-4">
									<div>横240px × 縦160px</div>
									<?php if ($this->_tpl_vars['photo']['b_photo0_c'] != ''): ?>
									<br />
									<span class="confirm0"><a href="showImage.php?dir=uploads&file=<?php echo $this->_tpl_vars['photo']['b_photo0_c']; ?>
&bg=FFF" target="_blank" id=><img src="../uploads/<?php echo $this->_tpl_vars['photo']['b_photo0_c']; ?>
" style="width: 100px;" /></a></span>
									<br />
									<?php echo $this->_tpl_vars['form']['chk_b_photo0_c']['html']; ?>

									<?php if ($this->_tpl_vars['form_state'] != 2): ?>
									<br /><span class="confirm0"><input type="button" class="del_photo" id="<?php echo $this->_tpl_vars['id']; ?>
" value="今すぐ削除" title="0"  /></span>
									<?php endif; ?>
									<?php endif; ?>
								</div>
							</div>
						</td>
					</tr>
					<?php unset($this->_sections['hoge']);
$this->_sections['hoge']['name'] = 'hoge';
$this->_sections['hoge']['loop'] = is_array($_loop=9) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['hoge']['start'] = (int)1;
$this->_sections['hoge']['show'] = true;
$this->_sections['hoge']['max'] = $this->_sections['hoge']['loop'];
$this->_sections['hoge']['step'] = 1;
if ($this->_sections['hoge']['start'] < 0)
    $this->_sections['hoge']['start'] = max($this->_sections['hoge']['step'] > 0 ? 0 : -1, $this->_sections['hoge']['loop'] + $this->_sections['hoge']['start']);
else
    $this->_sections['hoge']['start'] = min($this->_sections['hoge']['start'], $this->_sections['hoge']['step'] > 0 ? $this->_sections['hoge']['loop'] : $this->_sections['hoge']['loop']-1);
if ($this->_sections['hoge']['show']) {
    $this->_sections['hoge']['total'] = min(ceil(($this->_sections['hoge']['step'] > 0 ? $this->_sections['hoge']['loop'] - $this->_sections['hoge']['start'] : $this->_sections['hoge']['start']+1)/abs($this->_sections['hoge']['step'])), $this->_sections['hoge']['max']);
    if ($this->_sections['hoge']['total'] == 0)
        $this->_sections['hoge']['show'] = false;
} else
    $this->_sections['hoge']['total'] = 0;
if ($this->_sections['hoge']['show']):

            for ($this->_sections['hoge']['index'] = $this->_sections['hoge']['start'], $this->_sections['hoge']['iteration'] = 1;
                 $this->_sections['hoge']['iteration'] <= $this->_sections['hoge']['total'];
                 $this->_sections['hoge']['index'] += $this->_sections['hoge']['step'], $this->_sections['hoge']['iteration']++):
$this->_sections['hoge']['rownum'] = $this->_sections['hoge']['iteration'];
$this->_sections['hoge']['index_prev'] = $this->_sections['hoge']['index'] - $this->_sections['hoge']['step'];
$this->_sections['hoge']['index_next'] = $this->_sections['hoge']['index'] + $this->_sections['hoge']['step'];
$this->_sections['hoge']['first']      = ($this->_sections['hoge']['iteration'] == 1);
$this->_sections['hoge']['last']       = ($this->_sections['hoge']['iteration'] == $this->_sections['hoge']['total']);
?>
					<?php echo ''; ?><?php $this->assign('s', ($this->_sections['hoge']['index']+10)); ?><?php echo ''; ?><?php $this->assign('colname', "b_photo".($this->_sections['hoge']['index'])."_c"); ?><?php echo ''; ?><?php $this->assign('s_colname', "b_photo".($this->_tpl_vars['s'])."_c"); ?><?php echo ''; ?><?php $this->assign('chk', "chk_".($this->_tpl_vars['colname'])); ?><?php echo ''; ?><?php $this->assign('s_chk', "chk_".($this->_tpl_vars['s_colname'])); ?><?php echo '<tr><th>外観'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '</th><td><div class="box_fileup">'; ?><?php if ($this->_tpl_vars['form_state'] != 2): ?><?php echo '<div class="column1-4"><span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span><div class="hidden"><input name="name_b_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '_c" type="file" class="class_photo" title="b_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '" /></div>'; ?><?php if (true == $this->_sections['hoge']['first'] && $this->_tpl_vars['b_photo1_err'] != ''): ?><?php echo '<div>'; ?><?php echo $this->_tpl_vars['b_photo1_err']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo '</div>'; ?><?php endif; ?><?php echo '<div id="text_b_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '_c" class="column1-4"><div>横430px × 縦645px</div>'; ?><?php if ($this->_tpl_vars['photo'][$this->_tpl_vars['colname']] != ''): ?><?php echo '<br /><span class="confirm'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '"><a href="showImage.php?dir=uploads&file='; ?><?php echo $this->_tpl_vars['photo'][$this->_tpl_vars['colname']]; ?><?php echo '&bg=FFF" target="_blank"><img src="../uploads/'; ?><?php echo $this->_tpl_vars['photo'][$this->_tpl_vars['colname']]; ?><?php echo '" style="width: 100px;" /></a></span><br />'; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['chk']]['html']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['form_state'] != 2): ?><?php echo '<br /><span class="confirm'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '"><input type="button" class="del_photo" id="'; ?><?php echo $this->_tpl_vars['id']; ?><?php echo '" value="今すぐ削除" title="'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '" /></span>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '</div>'; ?><?php if ($this->_tpl_vars['form_state'] != 2): ?><?php echo '<div class="column1-4"><span class="clickable have_effect"><img src="img/sign_up/btn_upload_thumb.png" alt="サムネイルアップロード" /></span><div class="hidden"><input name="name_b_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '_c" type="file" class="class_photo_thumb" title="b_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '" /></div>'; ?><?php if (true == $this->_sections['hoge']['first'] && $this->_tpl_vars['b_photo1_err'] != ''): ?><?php echo '<div>'; ?><?php echo $this->_tpl_vars['b_photo1_err']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo '</div>'; ?><?php endif; ?><?php echo '<div id="text_b_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '_c_thumb" class="column1-4"><div>サムネイル'; ?><?php if ($this->_tpl_vars['form_state'] != 2): ?><?php echo 'を変更する場合'; ?><?php endif; ?><?php echo '<br />横130px × 縦130px</div>'; ?><?php if ($this->_tpl_vars['photo'][$this->_tpl_vars['colname']] != ''): ?><?php echo '<br /><span class="confirm'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '"><a href="showImage.php?dir=uploads&file='; ?><?php echo $this->_tpl_vars['photo'][$this->_tpl_vars['s_colname']]; ?><?php echo '&bg=FFF&thumbFlg=true&width=130px" target="_blank"><img src="../uploads/'; ?><?php echo $this->_tpl_vars['photo'][$this->_tpl_vars['s_colname']]; ?><?php echo '" style="width: 100px;" /></a></span><br />'; ?><?php endif; ?><?php echo '</div></div></td></tr>'; ?>

					<?php endfor; endif; ?>
					<tr>
						<th>優先度</th>
						<td>
							<div class="mb5"><?php echo $this->_tpl_vars['form']['order_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['order_c']['error']; ?>
</div>
							<?php echo $this->_tpl_vars['form']['OrderGrp']['html']; ?>

							<div style="margin-left:10px;">（チェックを入れると、優先度に関係なく下位表示されます）</div>
						</td>
					</tr>
				</table>
				<div class="center mt30">
					<?php if ($this->_tpl_vars['form_state'] == 2): ?>
					<input type="image" name="back" src="img/btn_mod.png" alt="修正する" class="have_effect" />　
					<input type="image" name="send" src="img/btn_regist.png" alt="登録する" class="have_effect" />
					<?php else: ?>
					<input type="image" name="confirm" src="img/sign_up/btn_conf.png" alt="確認する" class="have_effect" />
					<?php endif; ?>
				</div>
				</form>
			</div>

			<div class="pagetop"><a href="#wrapper" class="have_effect"><img src="img/pagetop.png" alt="pagetop" /></a></div>
		</div><!-- .inner -->
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>














