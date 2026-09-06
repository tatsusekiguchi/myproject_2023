<?php /* Smarty version 2.6.26, created on 2016-07-24 11:22:49
         compiled from houseEdit.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'houseEdit.tpl', 17, false),)), $this); ?>
<?php echo '<?xml'; ?>
 version="1.0" encoding="utf-8" <?php echo '?>'; ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="ja">
<head>
<meta name="robots" content="noindex,nofollow" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta http-equiv="Content-Style-Type" content="text/css" />
<meta http-equiv="Content-Script-Type" content="text/javascript" />
<link href="css/reset.css" rel="stylesheet" type="text/css" />
<link href="css/admin.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="js/jquery1.11.0m.js"></script>
<script type="text/javascript" src="js/jquery.upload-1.0.2.js"></script>
<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/houseEdit.js"></script>
<title><?php if ($this->_tpl_vars['hid'] > 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['building']['building_name_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
部屋編集<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['building']['building_name_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
部屋新規登録<?php endif; ?></title>
<script type="text/javascript">
$(function(){
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
<style type="text/css">
<?php if ($this->_tpl_vars['form_state'] == 2): ?>
#main .ifs{
	display: none;
}
<?php endif; ?>
</style>
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
			<h1><?php if ($this->_tpl_vars['hid'] > 0): ?><?php echo ((is_array($_tmp=$this->_tpl_vars['building']['building_name_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
部屋編集<?php else: ?><?php echo ((is_array($_tmp=$this->_tpl_vars['building']['building_name_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
お部屋の新規追加<?php endif; ?></h1>

			<?php if (! empty ( $this->_tpl_vars['result'] ) && is_array ( $this->_tpl_vars['result'] )): ?><div class="result<?php if ($this->_tpl_vars['result']['res']): ?> done<?php else: ?> error<?php endif; ?>"><?php echo $this->_tpl_vars['result']['mes']; ?>
</div><?php endif; ?>

			<div id="area_building_edit">
				<div class="right small mb5"><span style="color:#ae151d;">※</span>は必須項目です</div>
				<form<?php echo $this->_tpl_vars['form']['attributes']; ?>
>
				<input type="hidden" name="mode" value="edit" />
				<?php if (! empty ( $this->_tpl_vars['bid'] )): ?><input type="hidden" name="bid" value="<?php echo $this->_tpl_vars['bid']; ?>
" /><?php endif; ?>
				<?php if (! empty ( $this->_tpl_vars['hid'] )): ?><input type="hidden" name="hid" value="<?php echo $this->_tpl_vars['hid']; ?>
" /><?php endif; ?>

				<h2 class="h2a">お部屋情報</h2>
				<table class="style_e">
					<tr>
						<th class="required">建物名</th>
						<td>
							<?php echo ((is_array($_tmp=$this->_tpl_vars['building']['building_name_c'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

						</td>
					</tr>
					<tr>
						<th class="required">タイプ名<span class="red">※</span></th>
						<td>
							タイプ <?php echo $this->_tpl_vars['form']['house_no_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['house_no_c']['error']; ?>

							<span class="pad">&nbsp;&nbsp;</span>
							号室 <?php echo $this->_tpl_vars['form']['house_no_note_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['house_no_note_c']['error']; ?>

						</td>
					</tr>
						<th class="required">表示順</th>
						<td>
							<?php echo $this->_tpl_vars['form']['sort_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['sort_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th class="required">公開状況<span class="red">※</span></th>
						<td>
							<?php echo $this->_tpl_vars['form']['statusGrp']['html']; ?>
<?php echo $this->_tpl_vars['form']['statusGrp']['error']; ?>

						</td>
					</tr>
					<tr>
						<th class="required">間取り<span class="red">※</span></th>
						<td>
							<?php echo $this->_tpl_vars['form']['layoutGrp']['html']; ?>
<br /><?php echo $this->_tpl_vars['form']['layoutGrp']['error']; ?>

						</td>
					</tr>
					<tr>
						<th class="required">面積<span class="red">※</span></th>
						<td>
							<?php echo $this->_tpl_vars['form']['space_c']['html']; ?>
 m<sup style="vertical-align:top;">2</sup><?php echo $this->_tpl_vars['form']['space_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th>部屋向き</th>
						<td>
							<?php echo $this->_tpl_vars['form']['direction_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['direction_c']['error']; ?>

						</td>
					</tr>
				</table>

				<h2 class="h2a">賃 料</h2>
				<table class="style_e">
					<tr>
						<th class="required">賃料<span class="red">※</span></th>
						<td>
							<span class="tax_excluded"><?php echo $this->_tpl_vars['form']['rental_price_c']['html']; ?>
</span> 円〜<?php echo $this->_tpl_vars['form']['rental_price_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th>共益費</th>
						<td class="tax_scope">
							<span class="tax_excluded"><?php echo $this->_tpl_vars['form']['money_01_c']['html']; ?>
</span> 円<?php echo $this->_tpl_vars['form']['money_01_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th>敷金／保証金</th>
						<td>
							<?php echo $this->_tpl_vars['form']['divide_money_02_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['divide_money_02_c']['error']; ?>
<br />
							<?php echo $this->_tpl_vars['form']['money_02_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['money_02_c']['error']; ?>
　　
							<?php echo $this->_tpl_vars['form']['money_02_type_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['money_02_type_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th>償却／敷引／<br />解約引</th>
						<td>
							<?php echo $this->_tpl_vars['form']['divide_money_03_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['divide_money_03_c']['error']; ?>
<br />
							<?php echo $this->_tpl_vars['form']['money_03_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['money_03_c']['error']; ?>
　　
							<?php echo $this->_tpl_vars['form']['money_03_type_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['money_03_type_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th>礼金／権利金</th>
						<td>
							<?php echo $this->_tpl_vars['form']['divide_money_04_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['divide_money_04_c']['error']; ?>
<br />
							<?php echo $this->_tpl_vars['form']['money_04_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['money_04_c']['error']; ?>
　　
							<?php echo $this->_tpl_vars['form']['money_04_type_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['money_04_type_c']['error']; ?>

						</td>
					</tr>
					<tr>
						<th>更新料</th>
						<td>
							<div class="tax_scope">
								<span class="tax_excluded"><?php echo $this->_tpl_vars['form']['money_05_c']['html']; ?>
</span> 円<?php echo $this->_tpl_vars['form']['money_05_c']['error']; ?>

							</div>
							<div class="tax_scope mt5">
								更新事務手数料 <span class="tax_excluded"><?php echo $this->_tpl_vars['form']['money_05_zimu_c']['html']; ?>
</span> 円<?php echo $this->_tpl_vars['form']['money_05_zimu_c']['error']; ?>

							</div>
						</td>
					</tr>
					<tr>
						<th>雑費</th>
						<td style="padding:0;">
							<table style="width:100%;">
								<tr>
									<th rowspan="2" style="width:100px;">初期費用</th>
									<td class="tax_scope" style="border-right:none;">
										<?php echo $this->_tpl_vars['form']['zappi_01_required_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_01_required_c']['error']; ?>

										<?php echo $this->_tpl_vars['form']['zappi_01_name_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_01_name_c']['error']; ?>

										<span class="tax_excluded"><?php echo $this->_tpl_vars['form']['zappi_01_amount_c']['html']; ?>
</span> 円<?php echo $this->_tpl_vars['form']['zappi_01_amount_c']['error']; ?>

										<?php echo $this->_tpl_vars['form']['zappi_01_amount_taxin_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_01_amount_taxin_c']['error']; ?>

									</td>
								</tr>
								<tr>
									<td class="tax_scope" style="border-right:none;">
										<?php echo $this->_tpl_vars['form']['zappi_02_required_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_02_required_c']['error']; ?>

										<?php echo $this->_tpl_vars['form']['zappi_02_name_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_02_name_c']['error']; ?>

										<span class="tax_excluded"><?php echo $this->_tpl_vars['form']['zappi_02_amount_c']['html']; ?>
</span> 円<?php echo $this->_tpl_vars['form']['zappi_02_amount_c']['error']; ?>

										<?php echo $this->_tpl_vars['form']['zappi_02_amount_taxin_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_02_amount_taxin_c']['error']; ?>

									</td>
								</tr>
								<tr>
									<th rowspan="2" style="width:100px;border-bottom:none;">月額費用</th>
									<td class="tax_scope" style="border-right:none;">
										<?php echo $this->_tpl_vars['form']['zappi_11_required_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_11_required_c']['error']; ?>

										<?php echo $this->_tpl_vars['form']['zappi_11_name_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_11_name_c']['error']; ?>

										<span class="tax_excluded"><?php echo $this->_tpl_vars['form']['zappi_11_amount_c']['html']; ?>
</span> 円<?php echo $this->_tpl_vars['form']['zappi_11_amount_c']['error']; ?>

										<?php echo $this->_tpl_vars['form']['zappi_11_amount_taxin_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_11_amount_taxin_c']['error']; ?>

									</td>
								</tr>
								<tr>
									<td class="tax_scope" style="border-right:none;">
										<?php echo $this->_tpl_vars['form']['zappi_12_required_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_12_required_c']['error']; ?>

										<?php echo $this->_tpl_vars['form']['zappi_12_name_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_12_name_c']['error']; ?>

										<span class="tax_excluded"><?php echo $this->_tpl_vars['form']['zappi_12_amount_c']['html']; ?>
</span> 円<?php echo $this->_tpl_vars['form']['zappi_12_amount_c']['error']; ?>

										<?php echo $this->_tpl_vars['form']['zappi_12_amount_taxin_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['zappi_12_amount_taxin_c']['error']; ?>

									</td>
								</tr>
							</table>
						</td>
					</tr>
					<tr>
						<th>町費</th>
						<td>
							<?php echo $this->_tpl_vars['form']['chouhi_type_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['chouhi_type_c']['error']; ?>

							　<?php echo $this->_tpl_vars['form']['chouhi_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['chouhi_c']['error']; ?>

							　<?php echo $this->_tpl_vars['form']['tax_chouhi_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['tax_chouhi_c']['error']; ?>

						</td>
					</tr>
				</table>

				<h2 class="h2a">設 備</h2>
				<table class="style_e">
										<tr>
						<th>フラグ</th>
						<td><?php echo $this->_tpl_vars['form']['FlgGrp']['html']; ?>
</td>
					</tr>
					<tr>
						<th>備考</th>
						<td>
							<?php echo $this->_tpl_vars['form']['other_c']['html']; ?>
<?php echo $this->_tpl_vars['form']['other_c']['error']; ?>

						</td>
					</tr>
				</table>

				<h2 class="h2a">画 像</h2>
				<table class="style_e">
					<tr>
						<th>間取り図</th>
						<td>
							<div class="box_fileup">
								<?php if ($this->_tpl_vars['form_state'] != 2): ?>
								<div class="column1-4">
									<span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span>
									<div class="hidden"><input name="name_r_photo0_c" type="file" class="class_photo" title="r_photo0" /></div>
									<?php if (! empty ( $this->_tpl_vars['r_photo0_err'] )): ?><div><?php echo $this->_tpl_vars['r_photo0_err']; ?>
</div><?php endif; ?>
								</div>
								<?php endif; ?>
								<div id="text_r_photo0_c" class="column1-4">
									<div>横580px × 縦751px</div>
									<?php if ($this->_tpl_vars['photo']['r_photo0_c'] != ''): ?>
										<br /><span class="confirm0"><a href="showImage.php?dir=uploads&file=<?php echo $this->_tpl_vars['photo']['r_photo0_c']; ?>
&bg=FFF" target="_blank"><img src="../uploads/<?php echo $this->_tpl_vars['photo']['r_photo0_c']; ?>
" style="width: 100px;" /></a></span><br />
										<?php echo $this->_tpl_vars['form']['chk_r_photo0_c']['html']; ?>

										<?php if ($this->_tpl_vars['form_state'] != 2): ?>
										<br /><span class="confirm0"><input type="button" class="del_photo" id="<?php echo $this->_tpl_vars['hid']; ?>
" value="今すぐ削除" title="0" /></span>
										<?php endif; ?>
									<?php endif; ?>
								</div>
							</div>
						</td>
					</tr>
					<?php unset($this->_sections['hoge']);
$this->_sections['hoge']['name'] = 'hoge';
$this->_sections['hoge']['loop'] = is_array($_loop=11) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
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
					<?php echo ''; ?><?php $this->assign('s', ($this->_sections['hoge']['index']+20)); ?><?php echo ''; ?><?php $this->assign('colname', "r_photo".($this->_sections['hoge']['index'])."_c"); ?><?php echo ''; ?><?php $this->assign('s_colname', "r_photo".($this->_tpl_vars['s'])."_c"); ?><?php echo ''; ?><?php $this->assign('chk', "chk_".($this->_tpl_vars['colname'])); ?><?php echo ''; ?><?php $this->assign('s_chk', "chk_".($this->_tpl_vars['s_colname'])); ?><?php echo '<tr><th>内観'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '</th><td><div class="box_fileup">'; ?><?php if ($this->_tpl_vars['form_state'] != 2): ?><?php echo '<div class="column1-4"><span class="clickable have_effect"><img src="img/sign_up/btn_upload.png" alt="アップロード" /></span><div class="hidden"><input name="name_r_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '_c" type="file" class="class_photo" title="r_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '" /></div>'; ?><?php if ($this->_sections['hoge']['first'] && ! empty ( $this->_tpl_vars['r_photo1_err'] )): ?><?php echo '<div>'; ?><?php echo $this->_tpl_vars['r_photo1_err']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo '</div>'; ?><?php endif; ?><?php echo '<div id="text_r_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '_c" class="column1-4"><div>横582px × 縦388px</div>'; ?><?php if ($this->_tpl_vars['photo'][$this->_tpl_vars['colname']] != ''): ?><?php echo '<br /><span class="confirm'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '"><a href="showImage.php?dir=uploads&file='; ?><?php echo $this->_tpl_vars['photo'][$this->_tpl_vars['colname']]; ?><?php echo '&bg=FFF" target="_blank"><img src="../uploads/'; ?><?php echo $this->_tpl_vars['photo'][$this->_tpl_vars['colname']]; ?><?php echo '" style="width: 100px;" /></a></span><br />'; ?><?php echo $this->_tpl_vars['form'][$this->_tpl_vars['chk']]['html']; ?><?php echo ''; ?><?php if ($this->_tpl_vars['form_state'] != 2): ?><?php echo '<br /><span class="confirm'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '"><input type="button" class="del_photo" id="'; ?><?php echo $this->_tpl_vars['hid']; ?><?php echo '" value="今すぐ削除" title="'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '" /></span>'; ?><?php endif; ?><?php echo ''; ?><?php endif; ?><?php echo '</div>'; ?><?php if ($this->_tpl_vars['form_state'] != 2): ?><?php echo '<div class="column1-4"><span class="clickable have_effect"><img src="img/sign_up/btn_upload_thumb.png" alt="サムネイルアップロード" /></span><div class="hidden"><input name="name_r_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '_c" type="file" class="class_photo_thumb" title="r_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '" /></div>'; ?><?php if (true == $this->_sections['hoge']['first'] && $this->_tpl_vars['r_photo1_err'] != ''): ?><?php echo '<div>'; ?><?php echo $this->_tpl_vars['r_photo1_err']; ?><?php echo '</div>'; ?><?php endif; ?><?php echo '</div>'; ?><?php endif; ?><?php echo '<div id="text_r_photo'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '_c_thumb" class="column1-4"><div>サムネイル'; ?><?php if ($this->_tpl_vars['form_state'] != 2): ?><?php echo 'を変更する場合'; ?><?php endif; ?><?php echo '<br />横80px × 縦80px</div>'; ?><?php if ($this->_tpl_vars['photo'][$this->_tpl_vars['colname']] != ''): ?><?php echo '<br /><span class="confirm'; ?><?php echo $this->_sections['hoge']['index']; ?><?php echo '"><a href="showImage.php?dir=uploads&file='; ?><?php echo $this->_tpl_vars['photo'][$this->_tpl_vars['s_colname']]; ?><?php echo '&bg=FFF&thumbFlg=true&width=80px" target="_blank"><img src="../uploads/'; ?><?php echo $this->_tpl_vars['photo'][$this->_tpl_vars['s_colname']]; ?><?php echo '" style="width: 100px;" /></a></span><br />'; ?><?php endif; ?><?php echo '</div></div></td></tr>'; ?>

					<?php endfor; endif; ?>
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
