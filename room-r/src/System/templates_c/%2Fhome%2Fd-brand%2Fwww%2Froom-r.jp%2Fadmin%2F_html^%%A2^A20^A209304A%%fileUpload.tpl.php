<?php /* Smarty version 2.6.26, created on 2020-03-13 14:47:45
         compiled from fileUpload.tpl */ ?>
<?php if ($this->_tpl_vars['upload'] == 'fail'): ?>ファイルのアップロードに失敗しました<br /><?php endif; ?>
<?php if ($this->_tpl_vars['file'] != ''): ?><br /><span class="confirm<?php echo $this->_tpl_vars['num']; ?>
"><a href="showImage.php?dir=<?php echo $this->_tpl_vars['imgdir']; ?>
&file=<?php echo $this->_tpl_vars['file']; ?>
&bg=<?php echo $this->_tpl_vars['bg']; ?>
" target="_blank"><img src="../uploads/<?php echo $this->_tpl_vars['file']; ?>
" style="width: 100px;" /></a></span>
<br />
<?php if ($this->_tpl_vars['name'] != 'r_photo0' && $this->_tpl_vars['name'] != 'r_photo1' && $this->_tpl_vars['name'] != 'b_photo0' && $this->_tpl_vars['name'] != 'b_photo1'): ?>
<input type="checkbox" name="chk_<?php echo $this->_tpl_vars['name']; ?>
_c" id="id_chk_<?php echo $this->_tpl_vars['name']; ?>
_c" value="1"><label for="id_chk_<?php echo $this->_tpl_vars['name']; ?>
_c">削除</label><br />
	<br />
<?php endif; ?>
<span class="confirm<?php echo $this->_tpl_vars['num']; ?>
"><input type="button" class="del_photo" id="<?php echo $this->_tpl_vars['id']; ?>
" value="今すぐ削除" title="<?php echo $this->_tpl_vars['num']; ?>
" /></span>
<?php endif; ?>