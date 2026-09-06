// JavaScript Document

/*===================================================
    スクロールアニメーション用 JS
    一定のコンテンツまでスクロールしたら、
    animate.cssを使用してアニメーション表示
===================================================*/

/*////////////////////////////////////////////////////////////
    TOP
/////////////////////////////////////////////////////////////*/
$(function(){

    if($('.topMain').length > 0) {
        $('.fadeUp').css('opacity','0');
        $(window).on('load scroll',function (){
            $('.fadeUp').each(function(){
                var imgPos = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();
                if (scroll > imgPos - windowHeight + windowHeight/3){
                    $(this).addClass('animated fadeInUp');
                }
            });
        });
    }

    if($('.main').length > 0) {
        $('.fadeUp').css('opacity','0');
        $(window).on('load scroll',function () {
            $('.fadeUp').each(function(){
                var imgPos = $(this).offset().top;
                var scroll = $(window).scrollTop();
                var windowHeight = $(window).height();
                if (scroll > imgPos - windowHeight + windowHeight/3){
                    $(this).addClass('animated fadeInUp');
                }
            });
        });
    }

});