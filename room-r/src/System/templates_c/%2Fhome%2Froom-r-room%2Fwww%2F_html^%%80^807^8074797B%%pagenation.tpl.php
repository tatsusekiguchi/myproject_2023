<?php /* Smarty version 2.6.26, created on 2016-03-02 10:24:40
         compiled from pagenation.tpl */ ?>

<ul class="pagination">

	<?php if ($this->_tpl_vars['page'] > 1): ?>
	<li class="prev"><a href="?page=<?php echo $this->_tpl_vars['page']-1; ?>
<?php echo $this->_tpl_vars['url_param']; ?>
<?php echo $this->_tpl_vars['op']; ?>
#result">&lt;</a></li>
	<?php endif; ?>

	<?php $_from = $this->_tpl_vars['p']['pagination']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['v']):
?>
	<li<?php if ($this->_tpl_vars['page'] == $this->_tpl_vars['v']): ?> class="current"<?php endif; ?>><a href="?page=<?php echo $this->_tpl_vars['v']; ?>
<?php echo $this->_tpl_vars['url_param']; ?>
<?php echo $this->_tpl_vars['op']; ?>
#result"><?php echo $this->_tpl_vars['v']; ?>
</a></li>
	<?php endforeach; endif; unset($_from); ?>

	<?php if ($this->_tpl_vars['cnt_bukken'] > $this->_tpl_vars['page']*@NUM_IN_A_PAGE): ?>
	<li class="next"><a href="?page=<?php echo $this->_tpl_vars['page']+1; ?>
<?php echo $this->_tpl_vars['url_param']; ?>
<?php echo $this->_tpl_vars['op']; ?>
#result">&gt;</a></li>
	<?php endif; ?>
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