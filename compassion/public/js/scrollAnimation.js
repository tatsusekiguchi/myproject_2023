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

    $('.pageKv').addClass('load');
    $('.fadeUp').css('opacity','0');
    $('.fadeLeft').css('opacity','0');
    $('.fadeRight').css('opacity','0');

    $('.topKv .fadeUp, .pageKv .fadeUp').addClass('animated fadeInUp').css('animation-delay','.8s');

    $(window).on('load scroll',function (){
        $('.fadeUp').each(function(){
            var imgPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > imgPos - windowHeight + windowHeight/3){
                $(this).addClass('animated fadeInUp');
            }
        });
        $('.fadeLeft').each(function(){
            var imgPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > imgPos - windowHeight + windowHeight/3){
                $(this).addClass('animated fadeInLeft');
            }
        });
        $('.fadeRight').each(function(){
            var imgPos = $(this).offset().top;
            var scroll = $(window).scrollTop();
            var windowHeight = $(window).height();
            if (scroll > imgPos - windowHeight + windowHeight/3){
                $(this).addClass('animated fadeInRight');
            }
        });
    });
    
});