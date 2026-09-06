<?php
/**
 * このファイルはsearch_functions.phpから読み込まれます。
 */
?>
		<ul class="list-articles">
<?php for($i = 0; $i < count($bukken); $i++): ?>
			<li class="list__item<?php if( $i % 2 ) echo " list__item--odd"; ?>">
				<a href="<?php echo HU; ?>/search/detail/?b=<?php echo h($bukken[$i]["building_id_c"]); ?>">
					<div class="list__item-h"><?php echo h($bukken[$i]["building_name_c"]); ?></div>
					<p class="list__item-copy"><?php echo h($bukken[$i]["catch_c"]); ?></p>
					<div class="fll w120">
						<div class="list__item-img">
							<?php if(empty($bukken[$i]["b_photo0_c"])): ?>
							<img src="<?php echo HU; ?>/../dummy_t.jpg" alt="" height="79" />
							<?php else: ?>
							<img src="<?php echo HU; ?>/../uploads/<?php echo h($bukken[$i]["b_photo0_c"]); ?>" alt="" height="79" />
							<?php endif; ?>
						</div>
<?php if( mb_strpos($bukken[$i]["feature_c"], "0") !== false ): ?>
						<div class="list__item-cat bg-articles-cat-brown">ペット可</div>
<?php elseif( mb_strpos($bukken[$i]["feature_c"], "2") !== false ): ?>
						<div class="list__item-cat bg-articles-cat-blue">新築</div>
<?php elseif( mb_strpos($bukken[$i]["feature_c"], "4") !== false ): ?>
						<div class="list__item-cat bg-articles-cat-green">リノベーション</div>
<?php endif; ?>
					</div>
					<div class="list__item-data">
						<ul>
							<li>金額：<?php
								echo number_format($bukken[$i]["price_min_c"])."円〜";
								if( $bukken[$i]["price_min_c"] < $bukken[$i]["price_max_c"] ){
									echo number_format($bukken[$i]["price_max_c"])."円";
								}
							?></li>
							<li>間取り：<?php
								echo $bukken[$i]["layout_disp"];
							?></li>
							<li><?php
								if( $bukken[$i]["transport1_c"] != "0" )
									echo h("{$PC->conf['transport'][$bukken[$i]['transport1_c']]}「{$PC->conf['station'][$bukken[$i]['station1_c']]}駅」徒歩{$bukken[$i]['distance1_c']}分 ");
								if( !empty($bukken[$i]["transport3_c"]) )
									echo h("{$bukken[$i]['transport3_c']} ");
								if( !empty($bukken[$i]["station3_c"]) )
									echo h("「{$bukken[$i]['station3_c']}駅」 ");
								if( !empty($bukken[$i]["distance3_c"]) )
									echo h("徒歩{$bukken[$i]['distance3_c']}分");
							?></li>
						</ul>
					</div>
				</a>
			</li>
<?php endfor; ?>
		</ul>
