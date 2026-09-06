/* Javascript */
window.onpageshow = function(event) {
    if (event.persisted) {
        window.location.reload();
    }
};

$(function() {
  // ハッシュリンク(#)と別ウィンドウでページを開く場合はスルー
  $('a:not([href^="#"]):not([target]):not([href^="tel:"]):not([href^="mailto:"])').on('click', function(e){
    e.preventDefault(); // ナビゲートをキャンセル
    url = $(this).attr('href'); // 遷移先のURLを取得
    if (url !== '') {
      $('body').addClass('fadeout');  // bodyに class="fadeout"を挿入
      setTimeout(function(){
        window.location = url;  // 0.8秒後に取得したURLに遷移
      }, 800);
    }
    return false;
  });
});

/* 切り替え幅 */
var replaceWidth = 1025;


//pc、sp判定
function reseHeaderMenu(){

    if(parseInt($(window).width()) >= replaceWidth) {

        $("body").removeClass("sp");
        $("body").addClass("pc");
        $("nav").attr("style","");

    } else {

        $("body").removeClass("pc");
        $("body").addClass("sp");

    }

}

//幅変更時pc、sp判定
$(window).resize(function(){reseHeaderMenu();});

//リサイズもしくはロードされた時にReLayout呼び出し
$(window).on("load resize", ReLayout);

function ReLayout() {
    var _width = $(window).width(); //画面サイズ取得

    if(_width >= 1025) {
        //幅に応じて読み込む画像を変更する
        changeImg('.switch');
    }

    else {
        changeImg('.switch');
    }
    var scrollpos = $(window).scrollTop();
    checkHeadClass(scrollpos);

}
$(function () {
    $(window).scroll(function () {
         if ($(this).scrollTop() >= 100) {
            $('.header').addClass('h_active');
        } else {
            if ($('body').hasClass('fixed')) {

            }else {
             $('.header').removeClass('h_active');
            }

        }

    });
});

function checkHeadClass(pos) {
       if (pos >= 100) {
            $('.header').addClass('h_active');
        } else {
            $('.header').removeClass('h_active');
        }
}

$(function () {
    var state = false;
    var scrollpos;
    $('.toggle').on('click', function () {
        if (state == false) {
            scrollpos = $(window).scrollTop();
            //console.log(scrollpos);
            $('body').addClass('fixed').css({'top': -scrollpos});
            $(".gnavBox").fadeToggle(500);
            //$(".gnav").fadeToggle(500);
            $('.toggle').addClass('active');
//          $('header').addClass('h_active');
            checkHeadClass(scrollpos);
            state = true;
        } else {
            $('body').removeClass('fixed').css({'top': 0});
            window.scrollTo( 0 , scrollpos );
            //console.log(scrollpos);
            $(".gnavBox").fadeToggle(500);
            //$(".gnav").fadeToggle(500);
            $('.toggle').removeClass('active');
//          $('header').removeClass('h_active');
            state = false;
            checkHeadClass(scrollpos);
        }
    });
    $('header .menu a,.gnav a,.gnav_overlay').click(function(){
        if(state == true) {
            $('.toggle').trigger("click");
        }
    });
});


$(document).ready(function(){

    //pc、sp判定
    reseHeaderMenu();

    //スマホメニュー
    dispObj();

    //telリンクをスマートフォン端末以外では無効にする
    setTelLink();

    //アコーディオン
    setAccord();

    //ページ内リンクのなめらかスクロール
    pageScroll();

    //キービジュアルのスライダー設定
   keyvSlider();

});

//======================================================================================================
// changeImg( )
// 機能  ：幅に応じて読み込む画像を変更する
// 引数  ：target→image
// 戻り値：なし
//======================================================================================================
function changeImg(target) {

    var $setElem = $(target),
    pcName = '_pc',
    spName = '_sp',
    replaceWidth = 1025;

    $setElem.each(function(){
        var $this = $(this);
        function imgSize(){
            var windowWidth = parseInt($(window).width());
            if(windowWidth >= replaceWidth) {
                $this.attr('src',$this.attr('src').replace(spName,pcName));
            } else if(windowWidth < replaceWidth) {
               $this.attr('src',$this.attr('src').replace(pcName,spName));
            }
        }
        $(window).resize(function(){imgSize();});
        imgSize();
    });
}

//======================================================================================================
// dispObj( )
// 機能  ：スマホメニュー
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function dispObj(){

    $('.header .humberger').click(function() {
        $(this).toggleClass('is-open');
        $('.header .navBox').toggleClass('active');
        return false;
    });

}

//======================================================================================================
// setTelLink( )
// 機能  ：telリンクをスマートフォン端末以外では無効にする
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setTelLink() {
    var ua = navigator.userAgent.toLowerCase();
    var isMobile = /iphone/.test(ua)||/android(.+)?mobile/.test(ua);

    if (!isMobile) {
        $('a[href^="tel:"]').on('click', function(e) {
            e.preventDefault();
        });
    }
}

//======================================================================================================
// setAccord( )
// 機能  ：アコーディオン
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setAccord() {

    $('.accord .dt').click(function(){

        $(this).toggleClass('active');

        $(this).next('.dd').slideToggle();

    });

}

//======================================================================================================
// pageScroll( )
// 機能  ：ページ内リンクのスクロール設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function pageScroll() {

	var topBtn = $('#pageTop');
	topBtn.click(function () {
	$('body,html').animate({
		scrollTop: 0
		}, 1000);
		return false;
	});



}

//======================================================================================================
//keyvSlider( )
//機能  ：キービジュアルのスライダー設定
//引数  ：なし
//戻り値：なし
//======================================================================================================
function keyvSlider(){

if($(".topMain").length){

 var HEADER_ELEM = $('.topKv');
 var FADE_SPEED = 1500;
 var SWITCH_DELAY = 5000;

 // 要素作成
 if(!HEADER_ELEM.children().hasClass('kvBox')){
     var keyBoxElem = '';
     keyBoxElem += '<div class="kvBox">';
     keyBoxElem += '<div class="kvBg kv01"></div>';
     //keyBoxElem += '<div class="kvBg kv02"></div>';
     //keyBoxElem += '<div class="kvBg kv03"></div>';
     keyBoxElem += '</div>';
     HEADER_ELEM.append(keyBoxElem);
 }

 var keyBox = '.kvBox';
 $(keyBox + ' .kvBg').css({opacity:'0'});
 $(keyBox + ' .kvBg:first').stop().animate({opacity: '1'}, FADE_SPEED);

}
}


$(function () {
	var headerHeight = $('.header').outerHeight() + 100;
	var urlHash = location.hash;
	if (urlHash) {
		$('body,html').stop().scrollTop(0);
		setTimeout(function () {
			var target = $(urlHash);
			var position = target.offset().top - headerHeight;
			$('body,html').stop().animate({
				scrollTop: position
			}, 500);
		}, 100);
	}
});

$(function(){
	  $('a[href^="#"]').click(function(){
	    var adjust = -100;
	    var speed = 400;
	    var href= $(this).attr("href");
	    var target = $(href == "#" || href == "" ? 'html' : href);
	    var position = target.offset().top + adjust;
	    $('body,html').animate({scrollTop:position}, speed, 'swing');
	    return false;
	  });
	});


jQuery(function ($) {
  // Contact Form 7
  var wpcf7El = document.querySelector(".wpcf7")

  // エラーが発生した時
  wpcf7El.addEventListener("wpcf7invalid", function() {
    var speed = 1000; // スクロール速度
    var headerHeight = $(".header").innerHeight(); // ヘッダーの高さを取得
    setTimeout(function () {
      var firstErrorEl = $(".wpcf7-not-valid:first"); // エラーが発生した1番目の要素を取得
      var scrollAmount = firstErrorEl.offset().top - headerHeight - 100; // 要素までのスクロール距離を取得
      $("html, body").animate({ scrollTop: scrollAmount }, speed, "swing"); // 該当箇所までスクロール
    }, 500);
  },false );
});
$(function(){
	$('.wpcf7 input[type="submit"]').prop('disabled',true);

    $('.agreeCheck input').on('change', function (e) {
        if ($(this).prop("checked") == true) {
            $('.wpcf7 input[type="submit"]').prop('disabled',false);
        }
        else {
            $('.wpcf7 input[type="submit"]').prop('disabled',true);
        }
    });

    });