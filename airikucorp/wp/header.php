<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage org
 * @since org 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<?php echo setHead(); ?>
		<link rel="profile" href="https://gmpg.org/xfn/11">
		<link rel="stylesheet" href="<?php echo home_url(); ?>/css/reset.css">
        <link rel="stylesheet" href="<?php echo home_url(); ?>/css/common.css">
        <link rel="stylesheet" href="<?php echo home_url(); ?>/css/commonSp.css">
        <link rel="stylesheet" href="<?php echo home_url(); ?>/css/layout.css">
        <link rel="stylesheet" href="<?php echo home_url(); ?>/css/layoutSp.css">
        <link rel="stylesheet" href="<?php echo home_url(); ?>/css/animate.css">

		<?php wp_head(); ?>

	</head>

	<body>
    	<div id="root">
        	<div class="header">
        		<div class="headWrap">
        		    <p class="desc spHidden">ピッキング・事務・ドライバーの人材派遣は愛陸商事株式会社へ</p>
        			<div class="logo">
        				<a href="<?php echo home_url(); ?>">
        					<div><img src="<?php echo home_url(); ?>/images/header_logo.png" alt="愛陸商事株式会社"></div>
        				</a>
        			</div>

        			<div class="menu">
        			    <p class="entry"> <a href="<?php echo home_url(); ?>/entry/" class="en fade">ENTRY</a> </p>
        			    <p class="toggle fade"> <span></span> <span></span> <span></span> </p>
        			</div>

        		</div>

        		<nav>
        	        <div class="gnav_overlay">
        	            <div class="gnavBox">
        	                <ul class="gnav">
        	                    <li><a href="<?php echo home_url(); ?>" class="fade">TOP</a></li>
        	                    <li><a href="<?php echo home_url(); ?>/work/" class="fade">仕事を知る</a></li>
        	                    <li><a href="<?php echo home_url(); ?>/support/" class="fade">働く環境</a></li>
        	                    <li><a href="<?php echo home_url(); ?>/company/" class="fade">会社概要</a></li>
        	                    <li><a href="<?php echo home_url(); ?>/entry/" class="fade">採用情報/応募フォーム</a></li>
								<li><a href="<?php echo home_url(); ?>/insurance/" class="fade">団体扱自動車保険<br>インターネット手続きについて</a></li>
        	                </ul>
        	                <div class="gnavBottom">
        	                    <p>-&nbsp;&nbsp;便利な３つのエントリー&nbsp;&nbsp;-</p>
        	                   <div class="ul flBox">
        	                       <div class="li">
        	                           <a href="tel:0568-41-1221">
        	                               <img src="<?php echo home_url(); ?>/images/btn_nav_tel.png" alt="電話">
        	                           </a>
        	                       </div>
        	                          <div class="li">
        	                              <a href="https://lin.ee/PkB26PD" target="_blank">
        	                                  <img src="<?php echo home_url(); ?>/images/btn_nav_line.png" alt="公式LINE">
        	                              </a>
        	                          </div>
        	                          <div class="li">
        	                              <a href="<?php echo home_url(); ?>/entry/">
        	                                  <img src="<?php echo home_url(); ?>/images/btn_nav_mail.png" alt="メール">
        	                              </a>
        	                          </div>
        	                   </div>
        	                </div>
        	            </div>
        	        </div>
        	    </nav>
        	</div>


