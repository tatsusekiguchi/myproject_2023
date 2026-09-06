<?php /* Smarty version 2.6.26, created on 2016-04-13 20:19:30
         compiled from index.tpl */ ?>
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'header.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>

	<div id="main">
		<div class="inner">
			<div style="background-color:#f5f2dd;">
				<div class="w980 mra mla">
					<div style="margin-left:-160px;"><img src="src/img/index/01.jpg" alt="新しい部屋は、新しい私の始まりだと思う。" /></div>
				</div>
			</div>

			<div id="slide_nav">
				<div class="slides">
					<div class="item"><a href="feature.html?f=3" class="fade_on_hover"><img src="src/img/index/b_03.jpg" alt="女性にオススメ" /></a></div>
					<div class="item"><a href="feature.html?f=0" class="fade_on_hover"><img src="src/img/index/b_04.jpg" alt="ペット可物件" /></a></div>
					<div class="item"><a href="feature.html?f=2" class="fade_on_hover"><img src="src/img/index/b_05.jpg" alt="空き物件" /></a></div>
					<div class="item"><a href="feature.html?f=7" class="fade_on_hover"><img src="src/img/index/b_06.jpg" alt="高級物件" /></a></div>
				</div><!-- .slides -->
				<ul class="nav">
					<li class="prev"><a href="javascript:void(0);">前へ</a></li>
					<li class="next"><a href="javascript:void(0);">次へ</a></li>
				</ul><!-- .nav -->
			</div><!-- #slide_nav -->

			<div id="area_tab">
				<ul class="tabs">
					<li class="i01 on"><a href="javascript:void(0);">エリア検索</a></li>
					<li class="i02"><a href="javascript:void(0);">条件検索</a></li>
				</ul><!-- .tabs -->
				<div id="search-area" class="content_tab">
					<form action="area.html" method="post">
<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_by_area_map_form_inner.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
					</form>
				</div><!-- #search-area -->
				<div id="search-cond" class="content_tab dn">
					<form action="search.html" method="post">
						<div class="w980 mra mla posr">
							<p class="w800 mra mla"><img src="src/img/index/t_01.png" alt="ご希望の条件を選択して検索してください。" /></p>
							<div class="w800 mra mla mt15">
							<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'search_box.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
							</div>
							<div class="tac mt30"><input type="image" src="src/img/index/b_search.png" alt="検索する" class="fade_on_hover" /></a></div>
						</div>
					</form>
				</div><!-- #search-cond -->
			</div><!-- #area_tab -->
			<div id="area_bukken">
				<div class="w980 mra mla">
					<h2 class="h"><img src="src/img/index/h_02.png" alt="新着物件" /></h2>
					<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'list.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>
				</div>
			</div><!-- #area_bukken -->
			<div id="area_news">
				<div class="w980 mra mla ovh">
					<div class="flr"><a href="<?php echo @WEB_ROOT; ?>
/info/" class="fade_on_hover"><img src="src/img/index/b_list.png" alt="一覧を見る" /></a></div>
					<h2 class="h mt5"><img src="src/img/index/h_03.png" alt="新着ニュース" /></h2>
					<ul class="articles">
<?php 
require_once(dirname(__FILE__).'/../../info/wp-load.php');
$args = array('post_type' => 'post', 'posts_per_page' => 5);
$the_query = new WP_Query($args);
while($the_query->have_posts()){
	$the_query->the_post();
	echo '<li>';
	echo '<a href="'.get_permalink().'" class="fade_on_hover dib">';
	
	$cats = get_the_terms(get_the_ID(), 'category');

	echo '<div class="cat cat-'.$cats[0]->slug.'">'.$cats[0]->name.'</div>';
	echo '<div class="image">';
	the_post_thumbnail(array(160, 106));
	echo '</div>';
	echo '<div class="date mt10">'.get_the_time('Y.m.d').'</div>';
	echo '<div class="title">'.get_the_title().'</div>';
	echo '</a>';
	echo '</li>';

}
 ?>
					</ul>
				</div>
			</div><!-- #area_news -->
		</div><!-- .inner -->
	</div><!-- #main -->

<?php $_smarty_tpl_vars = $this->_tpl_vars;
$this->_smarty_include(array('smarty_include_tpl_file' => 'footer.tpl', 'smarty_include_vars' => array()));
$this->_tpl_vars = $_smarty_tpl_vars;
unset($_smarty_tpl_vars);
 ?>