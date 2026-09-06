<?php /* Smarty version 2.6.26, created on 2016-03-02 09:43:37
         compiled from search_by_area_map_form_inner.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'in_array', 'search_by_area_map_form_inner.tpl', 8, false),)), $this); ?>
<div class="search_by_area_map_form_inner w980 mra mla posr">
	<div class="h"><img src="src/img/search_by_area_map/h_01.png" alt="名古屋エリア検索" /></div>
	<div class="map posr">
		<div><img src="src/img/search_by_area_map/map.png" alt="" /></div>
		<ul class="btns">
			<?php $_from = $this->_tpl_vars['cnf']['area']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['k'] => $this->_tpl_vars['v']):
?>
			<li class="<?php echo $this->_tpl_vars['v']['slug']; ?>
<?php if (count ( $this->_tpl_vars['params']['area'] ) > 0 && ((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['params']['area']) : in_array($_tmp, $this->_tpl_vars['params']['area']))): ?> on<?php endif; ?>"><a href="javascript:void(0);"><?php echo $this->_tpl_vars['v']['name']; ?>
</a><input type="checkbox" name="a[]" value="<?php echo $this->_tpl_vars['k']; ?>
" class="dn"<?php if (count ( $this->_tpl_vars['params']['area'] ) > 0 && ((is_array($_tmp=$this->_tpl_vars['k'])) ? $this->_run_mod_handler('in_array', true, $_tmp, $this->_tpl_vars['params']['area']) : in_array($_tmp, $this->_tpl_vars['params']['area']))): ?> checked="checked"<?php endif; ?> /></li>
			<?php endforeach; endif; unset($_from); ?>
		</ul>
	</div>
	<div class="tac mt15"><input type="image" src="src/img/search_by_area_map/b_search.png" class="fade_on_hover" alt="検索する" /></div>
	<script>
	$(function(){
		$("#main .search_by_area_map_form_inner .btns li > a").on("click", function(){
			var li = $(this).parent();
			var cbox = li.find('input[type="checkbox"]');
			var cbox_val = cbox.prop("checked");
			if( cbox_val ){
				li.removeClass("on");
			} else {
				li.addClass("on");
			}
			cbox.prop("checked", !cbox_val);
		});
	});
	</script>
</div><!-- .search_by_area_map_form_inner -->