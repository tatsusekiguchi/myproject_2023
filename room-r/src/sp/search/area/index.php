<?php
	require_once(dirname(__FILE__).'/../../common/php/init.php');
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title>エリア検索|名古屋のデザイナーズマンション【roomRroom】</title>
<meta name="description" content="名古屋の人気エリアから、理想のデザイナーズマンションの賃貸物件検索しよう！名古屋駅・大須・栄・金山・鶴舞・千種・大曽根・覚王山など、住みたい場所で理想の一人暮らしを実現しよう。" />
<meta name="keywords" content="デザイナーズマンション,デザイナーズ賃貸,名古屋,部屋探し,エリア検索" />
<?php include_template_part("common_head"); ?>
<link rel="stylesheet" href="css/local.css" />
<script src="js/local.js"></script>
<?php include_template_part("additional_head"); ?>
</head>
<body>
<div id="wrapper">
<?php include_template_part("header"); ?>

	<div id="main">
		<div class="lh100 mt15 tac"><img src="img/i_01.png" alt="" height="16" /></div>
		<h2 class="fz20 lts3 mt5 tac color-red01">エリア検索</h2>
		<div class="h-01 fz15 lts0 mt10">住みたいエリアを複数選択してください</div>
		<form action="<?php echo HU; ?>/search/archive/" method="post">
			<ul class="lcl-search-area-list">
<?php foreach($PC->conf["area"] as $k => $v): ?>
				<li class="lcl-search-area-list__item">
					<label class="lcl-search-area-list__item-label">
						<div><?php echo h($v["name"]); ?></div>
						<div class="dn"><input class="lcl-js-check-area" type="checkbox" name="a[]" value="<?php echo $k; ?>" /></div>
					</label>
				</li>
<?php endforeach; ?>
			</ul>
			<div class="mt20 tac"><input type="image" src="<?php echo HU; ?>/common/img/b_search.png" alt="検索する" height="60" /></div>
			<h3 class="lcl-h-01 mt30">条件をつけて絞り込む</h3>
			<dl class="search-table">
				<dt class="search-table__t">家 賃</dt>
				<dd class="search-table__d search-table__d--first">
					<select name="min">
						<option value="">未選択</option>
						<option value="50000">5万円</option>
						<option value="70000">7万円</option>
						<option value="100000">10万円</option>
						<option value="120000">12万円</option>
						<option value="150000">15万円</option>
						<option value="200000">20万円</option>
						<option value="300000">30万円</option>
					</select>
					<span>〜</span>
					<select name="max">
						<option value="">未選択</option>
						<option value="50000">5万円</option>
						<option value="70000">7万円</option>
						<option value="100000">10万円</option>
						<option value="120000">12万円</option>
						<option value="150000">15万円</option>
						<option value="200000">20万円</option>
						<option value="300000">30万円</option>
					</select>
				</dd>

				<dt class="search-table__t">間取り</dt>
				<dd class="search-table__d">
<?php
	$cnt = -1;
	foreach($PC->conf["layout"] as $k => $v):
		$cnt++;
?>
					<label class="w50p-block-label<?php if( !($cnt % 2) ) echo " w50p-block-label--odd"; ?>"><input type="checkbox" name="l[]" value="<?php echo $k; ?>" /> <?php echo h($v); ?></label>
<?php
	endforeach;
	if( !($cnt % 2) ):
?>
					<div class="w50p-block-label">&nbsp;</div>
<?php endif;; ?>
				</dd>
			</dl>
			<div class="mt20 tac"><input type="image" src="<?php echo HU; ?>/common/img/b_search.png" alt="検索する" height="60" /></div>
		</form>
	</div><!-- #main -->

<?php include_template_part("footer"); ?>
</div><!-- #wrapper -->
</body>
</html>
