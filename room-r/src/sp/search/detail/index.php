<?php
	require_once(dirname(__FILE__).'/../../common/php/init.php');

	error_reporting(E_ERROR | E_WARNING | E_PARSE);// PC版でNoticeが出るため

	$bid = ( isset($_REQUEST["b"]) && is_numeric($_REQUEST["b"]) ) ? intval($_REQUEST["b"]) : null;
	$hid = ( isset($_REQUEST["h"]) && is_numeric($_REQUEST["h"]) ) ? intval($_REQUEST["h"]) : null;
	if( !isset($bid) ){
		header("Location:".HU."/");
		exit;
	}

	list($bukken, $house, $houseList, $recommend) = pc_get_detail($bid, $hid);
	$house_zappi = pc_get_house_zappi($house["house_id_c"]);
?>
<!doctype html>
<html lang="ja">
<head>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width,initial-scale=1.0" />
<title><?php echo h($bukken["building_name_c"]); ?> - <?php echo SITE_NAME; ?></title>
<meta name="description" content="名古屋でデザイナーズ賃貸を探すならroomRroom（ルームRルーム）。物件の詳細ページです。" />
<meta name="keywords" content="物件詳細,roomRroom,ルームRルーム,ルームアールルーム,賃貸,デザイナーズ,ペット可,新築" />
<?php include_template_part("common_head"); ?>
<link rel="stylesheet" href="css/local.css" />
<script src="<?php echo HU; ?>/common/js/jquery.slider.js"></script>
<script src="js/local.js"></script>
<script src="http://maps.googleapis.com/maps/api/js?sensor=false"></script>
<script>
function initialize(){
	var mapOptions = {
		center: new google.maps.LatLng(<?php echo $bukken["latitude_c"]; ?>, <?php echo $bukken["longitude_c"]; ?>),
		zoom: 17,
		scaleControl: true,
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};
	mapObj = new google.maps.Map(document.getElementById("map"), mapOptions);
	marker_l = new google.maps.Marker({
		position: new google.maps.LatLng(<?php echo $bukken["latitude_c"]; ?>, <?php echo $bukken["longitude_c"]; ?>),
		map: mapObj
	});
}
$(function(){
	initialize();
});
</script>
<?php include_template_part("additional_head"); ?>
</head>
<body>
<div id="wrapper">
<?php include_template_part("header"); ?>

	<div id="main">
		<div class="lcl-title">
			<h2 class="lcl-title__h"><?php echo h($bukken["building_name_c"]); ?></h2>
			<div class="lcl-title__copy"><?php echo h($bukken["catch_c"]); ?></div>
		</div>

		<div class="w290 mra mla posr mt10">
			<dl class="lcl-data01">
				<dt class="lcl-data01__t">賃料</dt>
				<dd class="lcl-data01__d fz19"><?php echo h(number_format($house["rental_price_c"])); ?>円〜</dd>
			</dl>
			<dl class="lcl-data01 mt4">
				<dt class="lcl-data01__t">間取り</dt>
				<dd class="lcl-data01__d fz15"><?php echo $PC->conf["layout_regist"][$house["layout_c"]]; ?><span class="fz11">（<?php echo h(number_format($house["space_c"])); ?>m&sup2;）</span></dd>
			</dl>
			<div class="posa" style="top:0;right:0;">
<?php if( mb_strpos($bukken["feature_c"], "0") !== false ): ?>
				<img src="img/mark_pet.png" alt="ペット可" height="32" />
<?php elseif( mb_strpos($bukken["feature_c"], "2") !== false ): ?>
				<img src="img/mark_shinchiku.png" alt="新築" height="32" />
<?php elseif( mb_strpos($bukken["feature_c"], "4") !== false ): ?>
				<img src="img/mark_renovation.png" alt="リノベーション" height="32" />
<?php endif; ?>
			</div>
		</div>

		<div class="lcl-photos w290 mra mla mt8">
			<div class="lcl-photos__display">
				<?php if(empty($bukken["b_photo1_c"])): ?>
				<img src="<?php echo HU."/../dummy_b.jpg"; ?>" alt="" />
				<?php else: ?>
				<img src="<?php echo HU."/../uploads/".$bukken["b_photo1_c"]; ?>" alt="" />
				<?php endif; ?>
			</div>
			<div id="lcl-photos__thumbnails_wrapp">
				<ul class="lcl-photos__thumbnails">
<?php
	$cnt = 0;
	$roop_flg = false;
	for($i = 1; $i < 11; $i++):
		$o = $bukken["b_photo".$i."_c"];
		$t = $bukken["b_photo".($i + 10)."_c"];
		if( empty($o) ) continue;
		$roop_flg = true;
		//if( $cnt >= 4 ) break;
		$cnt++;
?>
					<li class="lcl-photos__thumbnails-item i<?php echo $i; ?>">
						<a href="javascript:void(0);" data-photo="<?php echo HU."/../uploads/".$o; ?>"><img src="<?php echo HU."/../uploads/".$t; ?>" alt="" /></a>
					</li>
<?php
endfor;
if(!$roop_flg){
?>
					<li class="lcl-photos__thumbnails-item i1">
						<a href="javascript:void(0);" data-photo="<?php echo HU."/../dummy_b.jpg"; ?>"><img src="<?php echo HU."/../dummy_b.jpg"; ?>" alt="" /></a>
					</li>
<?php
}
?>
				</ul>
			</div>
<?php
if($i > 3){
?>
			<a href="javascript:void(0);" class="prev"><img src="img/controller_b_prev.png" alt=""></a>
			<a href="javascript:void(0);" class="next"><img src="img/controller_b_next.png" alt=""></a>
<?php
}
?>
		</div>

		<ul class="lcl-room-types">
<?php
	$i = -1;
	foreach($houseList as $k => $v):
		$i++;
?>
			<li class="lcl-room-types__item<?php
				if( $i % 4 === 0 ) echo " lcl-room-types__item--left";
				if( $i - 1 % 4 === 0 ) echo " lcl-room-types__item--right";
				if( $v["house_id_c"] == $house["house_id_c"] ) echo " lcl-room-types__item--current";
			?>">
				<a href="./?b=<?php echo $bid; ?>&amp;h=<?php echo $v["house_id_c"]; ?>">
					<div class="fz20 fwb"><?php echo h($v["house_no_c"]); ?></div>
					<div class="fz11 fwb"><?php echo h($PC->conf["layout_regist"][$v["layout_c"]]); ?></div>
				</a>
			</li>
<?php endforeach; ?>
		</ul>

		<div class="w290 mra mla posr mt20">
			<dl class="lcl-data01">
				<dt class="lcl-data01__t">賃料</dt>
				<dd class="lcl-data01__d fz19"><?php echo h(number_format($house["rental_price_c"])); ?>円〜</dd>
			</dl>
			<dl class="lcl-data01 mt4">
				<dt class="lcl-data01__t">間取り</dt>
				<dd class="lcl-data01__d fz15"><?php echo $PC->conf["layout_regist"][$house["layout_c"]]; ?><span class="fz11">（<?php echo h(number_format($house["space_c"])); ?>m&sup2;）</span></dd>
			</dl>
			<ul class="lcl-data02 posa" style="top:-1px;right:0;">
				<?php if(!is_null($house["divide_money_02_c"])){ ?>
				<li class="lcl-data02__item"><span class="color-red01"><?php
					echo ( $house["divide_money_02_c"] == 0 ) ? "敷　金" : "保証金";
				?>：</span><?php
					if(!empty($house["money_02_c"])){
						echo h(number_format($house["money_02_c"]));
						switch($house["money_02_type_c"]){
							case 0: echo "ヶ月"; break;
							case 1: echo "%";  break;
							case 2: echo "円";  break;
						}
					}else{
						echo '-';
					}
				?></li>
				<?php } ?>
				<?php if(!is_null($house["divide_money_04_c"])){ ?>
				<li class="lcl-data02__item"><span class="color-red01"><?php
					echo ( $house["divide_money_04_c"] == 0 ) ? "礼　金" : "権利金";
				?>：</span><?php
					if(!empty($house["money_04_c"])){
						echo h(number_format($house["money_04_c"]));
						switch($house["money_04_type_c"]){
							case 0: echo "ヶ月"; break;
							case 1: echo "%";  break;
							case 2: echo "円";  break;
						}
					}else{
						echo '-';
					}
				?></li>
				<?php } ?>
				<?php if(!empty($house["money_01_c"])): ?><li class="lcl-data02__item"><span class="color-red01">共益費：</span><?php echo h(number_format($house["money_01_c"])); ?>円</li><?php endif; ?>
			</ul>
		</div>

		<div class="lcl-slide mt20">
			<div class="lcl-slide__slides">
<?php
	$roop_flg = false;
	for($i = 1; $i < 12; $i++):
		$o = $house["r_photo".$i."_c"];
		if( empty($o) ) continue;
			$roop_flg = true;
?>
				<div class="lcl-slide__slides-item"><a href="javascript:void(0);"><img src="<?php echo HU."/../uploads/".$o; ?>" alt="" /></a></div>
<?php
endfor;
if(!$roop_flg){
?>
	<div class="lcl-slide__slides-item"><a href="javascript:void(0);"><img src="<?php echo HU."/../dummy_r.jpg"; ?>" /></a></div>
<?php
}
?>
			</div>
			<ul class="lcl-slide__controllers">
				<li class="lcl-slide__controllers-prev"><a href="javascript:void(0);"><img src="img/slide/controller_prev.png" alt="PREV" height="85" /></a></li>
				<li class="lcl-slide__controllers-next"><a href="javascript:void(0);"><img src="img/slide/controller_next.png" alt="NEXT" height="85" /></a></li>
			</ul>
		</div>

		<div class="w290 mra mla mt20">
			<a href="javascript:void(0);" class="lcl-btn01 lcl-js-btn-madori" data-on="img/bg_01_rev.png" data-off="img/bg_01.png">間取りを見る</a>
			<div class="lcl-madori lcl-js-madori">
				<div>

					<?php if(empty($house["r_photo0_c"])): ?>
					<img src="<?php echo HU."/../"; ?>/dummy_m.jpg" alt="" class="lcl-madori-img" />
					<?php else: ?>
					<img src="<?php echo HU."/../"; ?>/uploads/<?php echo $house["r_photo0_c"]; ?>" alt="" class="lcl-madori-img" />
					<?php endif; ?>
				</div>
			</div>
		</div>

		<table class="lcl-table01 mt25">
			<tbody>
				<tr>
					<th class="lcl-table01__h">所在地</th>
					<td class="lcl-table01__d">愛知県名古屋市<?php echo h($PC->conf["ku_nagoya"][$bukken["ku_c"]].$bukken["address_c"]); ?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h">最寄り駅</th>
					<td class="lcl-table01__d"><?php
						if( $bukken["transport1_c"] != "0" ){
							echo "●{$PC->conf['transport'][$bukken['transport1_c']]} ";
							echo "{$PC->conf['station'][$bukken['station1_c']]}駅 徒歩 ";
							echo "{$bukken['distance1_c']}分";
						}
						if( !empty($bukken["transport3_c"]) ){
							echo "／{$bukken['transport3_c']} ";
							$o_flg = 1;
						}
						if( !empty($bukken["station3_c"]) ){
							echo "{$bukken['station3_c']}駅 ";
							$o_flg = 1;
						}
						if( !empty($bukken["distance3_c"]) ){
							echo "徒歩{$bukken['distance3_c']}分";
							$o_flg = 1;
						}
						if( $bukken["transport2_c"] != "0" ){
							if( $o_flg == "1" ) echo "<br />";
							echo "●{$PC->conf['transport'][$bukken['transport2_c']]} ";
							if( $bukken["station2_c"] != "" ){
								echo "{$PC->conf['station'][$bukken['station2_c']]}駅 ";
							}
							if( $bukken['distance2_c'] != "" ){
								echo "徒歩 {$bukken['distance2_c']}分";
							}
						}
						unset($o_flg);
					?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h"><?php
						switch($house["divide_money_03_c"]){
							case 0: echo "償却"; break;
							case 1: echo "敷引"; break;
							case 2: echo "解約金"; break;
						}
					?></th>
					<td class="lcl-table01__d"><?php
						if( !empty($house["money_03_c"]) ){
							echo number_format($house["money_03_c"]);
							switch($house["money_03_type_c"]){
								case 0: echo "ヶ月"; break;
								case 1: echo "%"; break;
								case 2: echo "円"; break;
							}
						}else{
							echo "-";
						}
					?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h">駐車場</th>
					<td class="lcl-table01__d"><?php
						if( !empty($bukken["parking_c"]) ){
							foreach($bukken["parking_txt"] as $v){ echo $v." ";}
							echo number_format($bukken["parking_charge_c"])."円";
							switch($bukken["parking_tax_c"]){
								case 0: echo "（税別）"; break;
								case 1: echo "（税込み）"; break;
							}
						}else{
							echo "-";
						}
					?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h">構造</th>
					<td class="lcl-table01__d"><?php echo $PC->conf["structure"][$bukken["structure_c"]]; ?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h">築年数</th>
					<td class="lcl-table01__d"><?php echo "{$bukken['completion_year_c']}年{$bukken['completion_month_c']}月"; ?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h">階数/総戸数</th>
					<td class="lcl-table01__d"><?php
						if( !empty($bukken["floor_c"]) ){
							echo "{$bukken['floor_c']}階";
						}else{
							echo "-";
						}
						echo "/";
						if( !empty($bukken["house_c"]) ){
							echo "{$bukken['house_c']}戸";
						}else{
							echo "-";
						}
					?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h">部屋向き</th>
					<td class="lcl-table01__d"><?php
						if( !empty($house["direction_c"]) ){
							echo $PC->conf["direction"][$house["direction_c"]];
						}else{
							echo "-";
						}
					?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h">ペット</th>
					<td class="lcl-table01__d"><?php
						if( !empty($bukken["pet_c"]) ){
							$g = explode(",", $bukken["pet_c"]);
							foreach ($PC->conf["pet"] as $key => $value) {
								if(in_array($key, $g)) echo $value."&nbsp;";
							}
							echo $bukken["petfree_c"];
						}else{
							echo "-";
						}
					?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h">火災保険</th>
					<td class="lcl-table01__d"><?php
						if( $bukken["fire_flg_c"] == 1 ){
							echo number_format($bukken["fire_c"])."円";
						}else if( $bukken["fire_flg_c"] == 0 ){
							echo "無し";
						}
					?>&nbsp;</td>
				</tr>
				<tr>
					<th class="lcl-table01__h">更新料</th>
					<td class="lcl-table01__d"><?php
						if( !empty($house["money_05_c"]) ){
							echo number_format($house["money_05_c"])."円 ";
							if( !empty($house["money_05_zimu_c"]) ){
								echo "更新事務手数料".number_format($house["money_05_zimu_c"])."円";
							}
						}else{
							echo "-";
						}
					?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h">保証会社</th>
					<td class="lcl-table01__d">
						<?php
						switch ($bukken["hoshou_availability_c"]) {
							case 0:
								echo '利用可';
								break;
							case 1:
								echo '必須';
								break;
							case 2:
								echo 'なし';
								break;
							default:
								echo '-';
								break;
						}
						?>
					</td>
				</tr>
				<tr>
					<th class="lcl-table01__h">初期費用</th>
					<td class="lcl-table01__d"><?php
						$i = 0;
						foreach($house_zappi as $z){
							if( $z["type_c"] == 0 && !empty($z["amount_c"]) ){
								$out = ( $i > 0 ) ? "<br />" : "";
								$out .= "{$z["name_c"]}: ";
								$out .= number_format($z["amount_c"]);
								$out .= "円";
								if( $z["amount_taxin_c"] == 1 ){
									$out .= "（税込み）";
								}else if( $z["amount_taxin_c"] == 0 ){
									$out .= "（税別）";
								}
								if( !empty($z["required_c"]) ) $out .= " [必須]";
								echo $out;
								$i++;
							}
						}
					?>&nbsp;</td>
				</tr>
				<tr>
					<th class="lcl-table01__h">月額費用</th>
					<td class="lcl-table01__d"><?php
						$i = 0;
						foreach($house_zappi as $z){
							if( $z["type_c"] == 1 && !empty($z["amount_c"]) ){
								$out = ( $i > 0 ) ? "<br />" : "";
								$out .= "{$z["name_c"]}: ";
								$out .= number_format($z["amount_c"]);
								$out .= "円";
								if( $z["amount_taxin_c"] == 1 ){
									$out .= "（税込み）";
								}else if( $z["amount_taxin_c"] == 0 ){
									$out .= "（税別）";
								}
								if( !empty($z["required_c"]) ) $out .= " [必須]";
								echo $out;
								$i++;
							}
						}
					?>&nbsp;</td>
				</tr>
				<tr>
					<th class="lcl-table01__h">町費用</th>
					<td class="lcl-table01__d"><?php
						if( !empty($house["chouhi_c"]) ){
							if( $house["chouhi_type_c"] == 0 ){
								echo "初期費用：";
							}else if( $house["chouhi_type_c"] == 1 ){
								echo "月額費用：";
							}else if( $house["chouhi_type_c"] == 2 ){
								echo "年額費用：";
							}
							echo number_format($house["chouhi_c"])."円";
							if( $house["tax_chouhi_c"] == 0 ){
								echo "（税別）";
							}else if( $house["tax_chouhi_c"] == 1 ){
								echo "（税込み）";
							}
						}else{
							echo "-";
						}
					?></td>
				</tr>
				<tr>
					<th class="lcl-table01__h">備考</th>
					<td class="lcl-table01__d"><?php echo h($house["other_c"]); ?>&nbsp;</td>
				</tr>
			</tbody>
		</table>

		<div class="mrl15 mt15 fz11"><?php
			$out = "";
			if( mb_strpos($bukken["feature_c"], "2") !== false ) $out = "新築";
			foreach($house["flg_disp"] as $k => $v){
				if( intval($v) === 0 ) continue;
				if( !empty($out) ) $out .= "／";
				$out .= $PC->conf["flg"][$k];
			}
			echo $out;
		?></div>

		<div class="lcl-point mrl15 mt15">
			<h3 class="lcl-point__h">ポイント</h3>
			<p class="lcl-point__d"><?php echo nl2br(h($bukken["comment1_c"])); ?></p>
		</div>

		<div class="w290 mra mla mt20">
			<div id="map" style="width:290px;height:186px;"></div>
		</div>

		<div class="tac mt10"><a href="https://www.google.co.jp/maps/?q=<?php echo $bukken["latitude_c"]; ?>,<?php echo $bukken["longitude_c"]; ?>" class="btn btn--01">大きな地図で見る</a></div>

		<h3 class="h-01 fz15 lts0 mt25">この物件の見学予約・空室確認をする</h3>
		<div class="mt20 tac"><a href="tel:0529907400"><img src="img/b_tel.png" alt="タップして電話をかける" height="100" /></a></div>
		<div class="mt15 tac"><a href="<?php echo HU."/contact/?h=".$house["house_id_c"]; ?>"><img src="img/b_mail.png" alt="メールからお問合せ" height="60" /></a></div>

		<ul class="detail-footer-nav mt30">
			<li class="detail-footer-nav__item detail-footer-nav__item--left"><a href="../../shop/#about">roomRroom<br />とは</a></li>
			<li class="detail-footer-nav__item detail-footer-nav__item--right detail-footer-nav__item--single-line"><a href="../../news/">新着ニュース</a></li>
			<li class="detail-footer-nav__item detail-footer-nav__item--left detail-footer-nav__item--single-line"><a href="../../shop/">店舗紹介</a></li>
			<li class="detail-footer-nav__item detail-footer-nav__item--right detail-footer-nav__item--single-line"><a href="../../shop/#access">アクセス</a></li>
		</ul>

		<div class="mt15 tac"><img src="img/logo.png" alt="" height="75" /></div>
	</div><!-- #main -->
</div><!-- #wrapper -->
</body>
</html>
<?php
/**
 * 物件情報などを取得(PC版からのコピー)
 *
 * @param integer $bid 物件ID
 * @param integer $hid 部屋ID
 * @return array
 */
function pc_get_detail($bid, $hid){
	global $PC;
	$bukken = array();
	$houseList = array();
	$house = array();
	$recommend = array();

	// 物件取得
	$status = " AND status_c > 0";
	if(!$PC->conf["login_flg"]){
		$status = "";
	}
	$sql = 'SELECT * FROM buildings_t WHERE building_id_c = '.intval($bid).$status;
	$result = $PC->MDB2->query($sql);
	if( PEAR::isError($result) ) die($result->getDebugInfo());
	while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){
		// エリアテキスト
		$row["area_txt"] = array();
		if(!empty($row["area_c"])){
			$area_garbage = explode(",", $row["area_c"]);
			foreach ($area_garbage as $key => $value) {
				$row["area_txt"][] = $PC->conf["area"][$value]["name"];
			}
		}
		// パーキング
		$row["parking_txt"] = array();
		if(!empty($row["parking_type_c"])){
			$parking_garbage = explode(",", $row["parking_type_c"]);
			foreach ($parking_garbage as $key => $value) {
				$row["parking_txt"][] = $PC->conf["parking_type"][$value];
			}
		}
		$bukken = $row;
	}

	// 部屋一覧取得
	$status = " AND status_c > 0";
	if(!$PC->conf["login_flg"]){
		$status = " AND (status_c = 1 OR status_c = 3)";
	}
	$sql = 'SELECT * FROM houses_t WHERE building_id_c = '.intval($bid).$status.' ORDER BY sort_c';

	$result = $PC->MDB2->query($sql);
	if( PEAR::isError($result) ) die($result->getDebugInfo());
	while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){

		$houseList[$row["house_id_c"]] = $row;
	}

	// 現在の部屋格納
	if($hid != 0){
		if(!isset($houseList[$hid])){ header("Location:".HU."/"); die(); }
		$house = $houseList[$hid];
	}else{
		$house = current($houseList);
	}
	if(!empty($house)){
		$house["flg_disp"] = str_split($house["flg_c"]);
	}

	// 物件がなければ
	if(empty($bukken)){ header("Location:".HU."/"); die(); }
	if(empty($houseList)){ header("Location:".HU."/"); die(); }

	// 関連物件
	$area_g = $bukken["area_c"];
	$area = explode(",", $area_g);
	foreach($area as $a){
		if( (!is_string($a) && !is_numeric($a)) || $a == "" ){ continue;}
		$garbage_where[] = "area_c LIKE ".$PC->MDB2->quote("%".addcslashes($a, '\_%')."%", 'text');
	}
	$sql = 'SELECT * FROM buildings_t WHERE status_c = 1 AND '."(".implode(' OR ', $garbage_where).") AND house_count_c > 0 ORDER BY RAND() LIMIT 4";
	$result = $PC->MDB2->query($sql);
	if( PEAR::isError($result) ) die($result->getDebugInfo());
	while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){
		// 間取一覧表示用
		$row["layout_disp"] = array();
		$layout_type = explode(',', $row["layout_type_c"]);
		if(count($layout_type) > 1){
			$row["layout_disp"] = $PC->conf["layout_regist"][min($layout_type)]."&nbsp;〜&nbsp;".$PC->conf["layout_regist"][max($layout_type)];
		}else if(count($layout_type) != 0){
			$row["layout_disp"] = $PC->conf["layout_regist"][min($layout_type)];
		}
		$recommend[] = $row;
	}

	return array($bukken, $house, $houseList, $recommend);
}

/**
 * 部屋の雑費を取得(PC版からのコピー)
 *
 * @param integer $id 部屋のID
 * @return array
 */
function pc_get_house_zappi($id){
	global $PC;
	$zappi = array();
	$sql = "SELECT * FROM house_zappi_t WHERE house_id_c = ".intval($id);
	$result = $PC->MDB2->query($sql);
	if( PEAR::isError($result) ) return array();
	while( $row = $result->fetchRow(MDB2_FETCHMODE_ASSOC) ){
		if( empty($row['amount_taxin_c']) && empty($row['amount_c']) ) continue;
		$zappi[] = $row;
	}
	return $zappi;
}
