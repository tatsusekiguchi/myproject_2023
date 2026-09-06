<?php /* Smarty version 2.6.26, created on 2016-03-14 17:36:54
         compiled from mail_contact_sender.txt */ ?>
お問い合わせありがとうございます。
以下の情報でお問い合わせを受け付けました。
確認の上、担当者からご連絡差し上げます。

【お客様情報】
■お名前
<?php echo $this->_tpl_vars['v']['name']; ?>


■フリガナ
<?php echo $this->_tpl_vars['v']['furi']; ?>


■電話番号
<?php echo $this->_tpl_vars['v']['tel']; ?>


■ご連絡希望時間
<?php echo $this->_tpl_vars['v']['tel_time']; ?>


■ご希望家賃
<?php echo $this->_tpl_vars['v']['rent']; ?>


<?php if (! empty ( $this->_tpl_vars['v']['mail'] )): ?>
■メールアドレス
<?php echo $this->_tpl_vars['v']['mail']; ?>


<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['v']['address'] )): ?>
■現在お住まいのご住所
〒<?php echo $this->_tpl_vars['v']['zip']; ?>

<?php echo $this->_tpl_vars['v']['address']; ?>


<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['v']['gyoshu'] )): ?>
■職種
<?php echo $this->_tpl_vars['v']['gyoshu']; ?>


<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['v']['madori'] )): ?>
■間取り
<?php echo $this->_tpl_vars['v']['madori']; ?>


<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['v']['area'] )): ?>
■お探しのエリア
<?php echo $this->_tpl_vars['v']['area']; ?>

<?php echo $this->_tpl_vars['v']['area_othre']; ?>


<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['v']['date_m'] )): ?>
■ご案内希望日時
第1希望：<?php echo $this->_tpl_vars['v']['date_m']; ?>
月<?php if (! empty ( $this->_tpl_vars['v']['date_d'] )): ?> <?php echo $this->_tpl_vars['v']['date_d']; ?>
日<?php endif; ?> <?php if (! empty ( $this->_tpl_vars['v']['date_h'] )): ?><?php echo $this->_tpl_vars['v']['date_h']; ?>
<?php endif; ?>〜<?php if (! empty ( $this->_tpl_vars['v']['date_h_2'] )): ?><?php echo $this->_tpl_vars['v']['date_h_2']; ?>
頃<?php endif; ?>

第2希望：<?php echo $this->_tpl_vars['v']['date_m2']; ?>
月<?php if (! empty ( $this->_tpl_vars['v']['date_d2'] )): ?> <?php echo $this->_tpl_vars['v']['date_d2']; ?>
日<?php endif; ?> <?php if (! empty ( $this->_tpl_vars['v']['date_h2'] )): ?><?php echo $this->_tpl_vars['v']['date_h2']; ?>
<?php endif; ?>〜<?php if (! empty ( $this->_tpl_vars['v']['date_h2_2'] )): ?><?php echo $this->_tpl_vars['v']['date_h2_2']; ?>
頃<?php endif; ?>


<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['v']['other'] )): ?>
■その他条件・ご質問等
<?php echo $this->_tpl_vars['v']['other']; ?>


<?php endif; ?>
<?php if (! empty ( $this->_tpl_vars['h'] )): ?>
【お問い合わせ物件情報】
<?php $_from = $this->_tpl_vars['h']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['val']):
?>
---------------------------------------------------------
物件名　　　　　：<?php echo $this->_tpl_vars['val']['building']['building_name_c']; ?>

家賃　　　　　　：<?php if ($this->_tpl_vars['val']['house']['rental_price_c'] != ""): ?><?php echo $this->_tpl_vars['val']['house']['rental_price_c']; ?>
円<?php if ($this->_tpl_vars['val']['house']['more_price_flg_c'] == 1): ?>〜<?php endif; ?><?php else: ?>-<?php endif; ?>

共益費　　　　　：<?php echo $this->_tpl_vars['val']['house']['money_01_c']; ?>
円
タイプ　　　　　：<?php echo $this->_tpl_vars['val']['house']['house_no_c']; ?>
タイプ
間取り　　　　　：<?php if ($this->_tpl_vars['val']['house']['layout_c'] != ""): ?><?php echo $this->_tpl_vars['cnf']['layout_regist'][$this->_tpl_vars['val']['house']['layout_c']]; ?>
<?php if ($this->_tpl_vars['cnf']['layout_option'][$this->_tpl_vars['val']['house']['layout_option_c']] != ""): ?>＋<?php echo $this->_tpl_vars['cnf']['layout_option'][$this->_tpl_vars['val']['house']['layout_option_c']]; ?>
<?php endif; ?><?php endif; ?>

平米数　　　　　：<?php echo $this->_tpl_vars['val']['house']['space_c']; ?>
m2
交通　　　　　　：<?php echo $this->_tpl_vars['cnf']['transport'][$this->_tpl_vars['val']['building']['transport1_c']]; ?>

駅　　　　　　　：<?php echo $this->_tpl_vars['cnf']['station'][$this->_tpl_vars['val']['building']['station1_c']]; ?>
駅　徒歩<?php echo $this->_tpl_vars['val']['building']['distance1_c']; ?>
分
所在地　　　　　：愛知県名古屋市<?php echo $this->_tpl_vars['cnf']['ku_nagoya'][$this->_tpl_vars['val']['building']['ku_c']]; ?>
<?php echo $this->_tpl_vars['val']['building']['address_c']; ?>

向き　　　　　　：<?php echo $this->_tpl_vars['cnf']['direction'][$this->_tpl_vars['val']['house']['direction_c']]; ?>

築年　　　　　　：<?php if ($this->_tpl_vars['val']['building']['completion_year_c'] != ""): ?><?php echo $this->_tpl_vars['val']['building']['completion_year_c']; ?>
年<?php echo $this->_tpl_vars['val']['building']['completion_month_c']; ?>
月<?php endif; ?>

---------------------------------------------------------
この物件をWebサイトで見るにはこちらのアドレスからアクセスしてください。
<?php echo @WEB_ROOT; ?>
/detail.php?b=<?php echo $this->_tpl_vars['val']['building']['building_id_c']; ?>
&h=<?php echo $this->_tpl_vars['val']['house']['house_id_c']; ?>


<?php endforeach; endif; unset($_from); ?>
<?php endif; ?>
3日以内にこちらより連絡がない場合、システム上のトラブル等が発生している可能性がございます。
お手数ですがもう一度メール（もしくはお電話）にてお問い合わせください。

****************************************
room R room