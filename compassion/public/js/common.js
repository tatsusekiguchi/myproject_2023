/* Javascript */

/* 切り替え幅 */
var replaceWidth = 1025;

//pc、sp判定
function reseHeaderMenu(){

    if(parseInt($(window).width()) >= replaceWidth) {

        $("body").removeClass("sp");
        $("body").addClass("pc");
        $(".navBox").attr("style","");
        $(".menuBtn").removeClass("active");

    } else {

        $("body").removeClass("pc");
        $("body").addClass("sp");

    }

}

//幅変更時pc、sp判定
$(window).resize(function(){reseHeaderMenu();});

$(document).ready(function(){

    //pc、sp判定
    reseHeaderMenu();

    //スマホナビ
    setSpNav();

    //telリンクをスマートフォン端末以外では無効にする
    setTelLink();

    //モーダルウインドウ表示・非表示
    modalAction();

    //アコーディオン
    setAccord();

    //イベントスクロール
    eventScroll();

    if($('.topMain').length > 0) {
        $('.header').toggleClass('topHeader');
    }
    else {
        $('.header').toggleClass('pageHeader');
        //スクロール位置に応じてナビ固定
        setHeaderFixed();
    }

    if($('.staffMain .slideBox').length > 0) {
        //スクロールアニメーション
        $('.slideBox .ul').infiniteslide({
            speed: 35, //速さ　単位はpx/秒です。
            pauseonhover: false, //マウスオーバーでストップ
            responsive: true, //子要素の幅を%で指定しているとき
            clone: 2 //子要素の複製回数
        });

    }

});

//======================================================================================================
// setSpNav( )
// 機能  ：スマホナビ
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setSpNav() {

    $('.menuBtn').click(function() {
        $(this).toggleClass('active');
        $('.navBox').toggleClass('active');
        $('.navBox').slideToggle('middle');
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
// modalAction( )
// 機能  ：モーダルウインドウ表示・非表示
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function modalAction() {

    $("body").append('<span class="modalOverlay"></span>');
    $(".modalContent").hide();
    $(".modalOpen").each(function(i, elem) {
        i += 1;
        $(elem).attr('data-target','con' + i);
    });
    $(".modalContent").each(function(i, elem) {
        i += 1;
        $(elem).addClass('con' + i);
    });
    var Window = $(window),
        hb = $("html, body"),
        body = $("body"),
        mw = $(".modalContent"),
        overlay = $(".modalOverlay"),
        scrollY;
    // 開く
    $(".modalOpen").on('click', function() {
        scrollY = Window.scrollTop();
        var modal = '.' + $(this).attr('data-target');

        overlay.fadeIn();
        $(modal).fadeIn();
        $('body').css({
            "overflow": "hidden"
        });

        return false;
    });

    // 閉じる
    $(".modalOverlay, .modalClose").click(function() {
        body.attr("style", "");
        hb.prop({
            scrollTop: scrollY
        });
        overlay.fadeOut();
        mw.fadeOut();
    });

    // Esc キーで閉じる
    Window.keydown(function(e) {
        if (e.keyCode == 27) {
            body.attr("style", "");
            hb.prop({
                scrollTop: scrollY
            });
            overlay.removeClass("block");
            mw.removeClass("block");
        }
    });

}

//======================================================================================================
// pageScroll( )
// 機能  ：ページ内リンクのスクロール速度設定
// 引数  ：target→対象リンクオブジェクト
// 戻り値：なし
//======================================================================================================
function pageScroll(target) {

    $(target).click(function(){

        var speed = 1000;
        var href= $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top;
        if(href != "#") {
            position = position - 10;
        }
        
        $("html, body").animate({scrollTop:position}, speed, "swing");
        return false;

    });
}

//======================================================================================================
// setAccord( )
// 機能  ：アコーディオン
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setAccord() {

    $('.accord .dd').hide();
    
    $('.accord .dt').click(function(){

        $(this).toggleClass('active');

        $(this).next('.dd').slideToggle();

    });

}

//======================================================================================================
// eventScroll( )
// 機能  ：ページ内リンクのスクロール設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function eventScroll() {

    $(".eventListBox .linkList .li").each(function(i, elem) {
        i += 1;
        $(elem).attr('data-target','cntBox' + i);
    });

    $(".eventAccordBox").each(function(i, elem) {
        i += 1;
        $(elem).addClass('cntBox' + i);
    });

    $('.linkList .li[data-target],.linkBtn[data-target]').on('click',function(e){
        e.preventDefault();

        var cls = '.' + $(this).data('target');

        $.when(
            $('.accordTtl').removeClass('active'),
            $('.accordBody').hide(),
            // $(cls).find('.accordTtl').click()
            $(cls).find('.accordTtl').addClass('active'),
            $(cls).find('.accordBody').show()
        ).done(function() {
            var headH = $('.header').innerHeight();
            var pos = $(cls).offset().top - headH;
            $('body,html').stop().animate({
                scrollTop: pos
            }, 1000);
        }).fail(function() {
            // エラーが発生したときの処理
        });

    });

    $('.accordBody .more02.scroll').on('click',function(e){
        e.preventDefault();
        var headH = $('.header').innerHeight();
        var pos = $('.formSec').offset().top - headH;
        $('body,html').stop().animate({
            scrollTop: pos
        }, 1000);
    });

    $('.planIntroSec .more01.scroll').on('click',function(e){
        e.preventDefault();
        var headH = $('.header').innerHeight();
        var pos = $('.planSec').offset().top - headH;
        $('body,html').stop().animate({
            scrollTop: pos
        }, 1000);
    });

}

//======================================================================================================
// setHeaderFixed( )
// 機能  ：ページスクロール時の処理。ナビ固定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setHeaderFixed() {
        
    var scroll,
    winTop;

    //スクロールするたびに実行
    $(window).scroll(function () {
        scroll = $('.header').innerHeight();
        winTop = $(this).scrollTop();
        //スクロール位置がnavの位置より下だったらクラスfixedを追加
        if (winTop > scroll) {
            $('.header').addClass('fixed');
        }
        else if (winTop < scroll) {
            $('.header').removeClass('fixed');
        }
    });
    
}


