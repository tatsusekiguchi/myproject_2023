<?php /* Smarty version 2.6.26, created on 2016-03-02 00:42:32
         compiled from header_head.tpl */ ?>
<head>
<meta charset="UTF-8" />
<title><?php echo $this->_tpl_vars['pagetitle']; ?>
</title>
<meta name="description" content="<?php echo $this->_tpl_vars['meta_description']; ?>
" />
<meta name="keywords" content="<?php echo $this->_tpl_vars['meta_keywords']; ?>
" />
<link rel="stylesheet" href="<?php echo @WEB_ROOT; ?>
/src/css/init.css" />
<link rel="stylesheet" href="<?php echo @WEB_ROOT; ?>
/src/css/basic.css" />
<?php if (is_array ( $this->_tpl_vars['css'] )): ?>
<?php $_from = $this->_tpl_vars['css']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
<link rel="stylesheet" href="<?php echo @WEB_ROOT; ?>
/src/css/<?php echo $this->_tpl_vars['i']; ?>
" />
<?php endforeach; endif; unset($_from); ?>
<?php elseif (is_string ( $this->_tpl_vars['css'] )): ?>
<link rel="stylesheet" href="<?php echo @WEB_ROOT; ?>
/src/css/<?php echo $this->_tpl_vars['css']; ?>
" />
<?php endif; ?>
<script src="<?php echo @WEB_ROOT; ?>
/src/js/jquery.js"></script>
<script src="<?php echo @WEB_ROOT; ?>
/src/js/jqueryautoheight.js"></script>
<script src="<?php echo @WEB_ROOT; ?>
/src/js/basic.js"></script>
<?php if (is_array ( $this->_tpl_vars['js'] )): ?>
<?php $_from = $this->_tpl_vars['js']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['i']):
?>
<script src="<?php echo @WEB_ROOT; ?>
/src/js/<?php echo $this->_tpl_vars['i']; ?>
"></script>
<?php endforeach; endif; unset($_from); ?>
<?php elseif (is_string ( $this->_tpl_vars['js'] )): ?>
<script src="<?php echo @WEB_ROOT; ?>
/src/js/<?php echo $this->_tpl_vars['js']; ?>
"></script>
<?php endif; ?>

<script>
 
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new
Date();a=s.createElement(o),
 
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a
,m)
 
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-71520991-1', 'auto');
  ga('send', 'pageview');

</script>
</head>