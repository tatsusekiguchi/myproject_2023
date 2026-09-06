<head>
<meta charset="UTF-8" />
<title><!--{$pagetitle}--></title>
<meta name="description" content="<!--{$meta_description}-->" />
<meta name="keywords" content="<!--{$meta_keywords}-->" />
<link rel="stylesheet" href="<!--{$smarty.const.WEB_ROOT}-->/src/css/init.css" />
<link rel="stylesheet" href="<!--{$smarty.const.WEB_ROOT}-->/src/css/basic.css" />
<!--{if is_array($css)}-->
<!--{foreach from=$css item=i}-->
<link rel="stylesheet" href="<!--{$smarty.const.WEB_ROOT}-->/src/css/<!--{$i}-->" />
<!--{/foreach}-->
<!--{elseif is_string($css)}-->
<link rel="stylesheet" href="<!--{$smarty.const.WEB_ROOT}-->/src/css/<!--{$css}-->" />
<!--{/if}-->
<script src="<!--{$smarty.const.WEB_ROOT}-->/src/js/jquery.js"></script>
<script src="<!--{$smarty.const.WEB_ROOT}-->/src/js/jqueryautoheight.js"></script>
<script src="<!--{$smarty.const.WEB_ROOT}-->/src/js/basic.js"></script>
<!--{if is_array($js)}-->
<!--{foreach from=$js item=i}-->
<script src="<!--{$smarty.const.WEB_ROOT}-->/src/js/<!--{$i}-->"></script>
<!--{/foreach}-->
<!--{elseif is_string($js)}-->
<script src="<!--{$smarty.const.WEB_ROOT}-->/src/js/<!--{$js}-->"></script>
<!--{/if}-->

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
