<?php
/**
 * このファイルはsearch_functions.phpから読み込まれます。
 */
?>
		<form action="<?php echo HU; ?>/search/archive/" method="post">
			<dl class="search-table">
				<dt class="search-table__t">家 賃</dt>
				<dd class="search-table__d search-table__d--first">
					<select name="min">
						<option value="">未選択</option>
						<option value="50000"<?php if( $params["min"] == 50000 ) echo ' selected="selected"'; ?>>5万円</option>
						<option value="70000"<?php if( $params["min"] == 70000 ) echo ' selected="selected"'; ?>>7万円</option>
						<option value="100000"<?php if( $params["min"] == 100000 ) echo ' selected="selected"'; ?>>10万円</option>
						<option value="120000"<?php if( $params["min"] == 120000 ) echo ' selected="selected"'; ?>>12万円</option>
						<option value="150000"<?php if( $params["min"] == 150000 ) echo ' selected="selected"'; ?>>15万円</option>
						<option value="200000"<?php if( $params["min"] == 200000 ) echo ' selected="selected"'; ?>>20万円</option>
						<option value="300000"<?php if( $params["min"] == 300000 ) echo ' selected="selected"'; ?>>30万円</option>
					</select>
					<span>〜</span>
					<select name="max">
						<option value="">未選択</option>
						<option value="50000"<?php if( $params["max"] == 50000 ) echo ' selected="selected"'; ?>>5万円</option>
						<option value="70000"<?php if( $params["max"] == 70000 ) echo ' selected="selected"'; ?>>7万円</option>
						<option value="100000"<?php if( $params["max"] == 100000 ) echo ' selected="selected"'; ?>>10万円</option>
						<option value="120000"<?php if( $params["max"] == 120000 ) echo ' selected="selected"'; ?>>12万円</option>
						<option value="150000"<?php if( $params["max"] == 150000 ) echo ' selected="selected"'; ?>>15万円</option>
						<option value="200000"<?php if( $params["max"] == 200000 ) echo ' selected="selected"'; ?>>20万円</option>
						<option value="300000"<?php if( $params["max"] == 300000 ) echo ' selected="selected"'; ?>>30万円</option>
					</select>
				</dd>

				<dt class="search-table__t">間取り</dt>
				<dd class="search-table__d">
<?php
	$cnt = -1;
	foreach($PC->conf["layout"] as $k => $v):
		$cnt++;
?>
					<label class="w50p-block-label<?php if( !($cnt % 2) ) echo " w50p-block-label--odd"; ?>"><input type="checkbox" name="l[]" value="<?php echo $k; ?>"<?php
						if( count($params["layout"]) > 0 && in_array($k, $params["layout"]) ) echo ' checked="checked"';
					?> /> <?php echo h($v); ?></label>
<?php
	endforeach;
	if( !($cnt % 2) ):
?>
					<div class="w50p-block-label">&nbsp;</div>
<?php endif;; ?>
				</dd>

				<dt class="search-table__t search-table__area">エリア</dt>
				<dd class="search-table__d search-table__area">
<?php
	$cnt = -1;
	foreach($PC->conf["area"] as $k => $v):
		$cnt++;
?>
					<label class="w50p-block-label<?php if( !($cnt % 2) ) echo " w50p-block-label--odd"; ?>"><input type="checkbox" name="a[]" value="<?php echo $k; ?>"<?php
						if( count($params["area"]) > 0 && in_array($k, $params["area"]) ) echo ' checked="checked"';
					?> /> <?php echo h($v["name"]); ?></label>
<?php
	endforeach;
	if( !($cnt % 2) ):
?>
					<div class="w50p-block-label">&nbsp;</div>
<?php endif;; ?>
				</dd>
			</dl>
			<div class="mt25 tac"><input type="image" src="<?php echo HU; ?>/common/img/b_search.png" alt="検索する" height="60" /></div>
		</form>
