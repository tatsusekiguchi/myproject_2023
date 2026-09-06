// JavaScript Document

/*===================================================
    スクロールアニメーション用 JS
    一定のコンテンツまでスクロールしたら、
    animate.cssを使用してアニメーション表示
===================================================*/

/*////////////////////////////////////////////////////////////
    TOP
/////////////////////////////////////////////////////////////*/
$(function () {
  $("body").css("opacity", "1");
  $(".fadein").css("opacity", "0");
  $(".fadeUp").css("opacity", "0");
  $(".fadeLeft").css("opacity", "0");
  $(".fadeRight").css("opacity", "0");
  $(".listAnim .list").css("opacity", "0");
  $(window).on("load", function () {
    $("body").css("opacity", "1");
  });

  $(window).on("load scroll", function () {
    $(".listAnim").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(this)
          .find(".list:nth-of-type(1)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".3s");
        $(this)
          .find(".list:nth-of-type(2)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".6s");
        $(this)
          .find(".list:nth-of-type(3)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".9s");
        $(this)
          .find(".list:nth-of-type(4)")
          .addClass("animated fadeInUp")
          .css("animation-delay", "1.2s");
        $(this)
          .find(".list:nth-of-type(5)")
          .addClass("animated fadeInUp")
          .css("animation-delay", "1.5s");
        $(this)
          .find(".list:nth-of-type(6)")
          .addClass("animated fadeInUp")
          .css("animation-delay", "1.8s");
      }
    });
    $(".fadein").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(this).addClass("animated fadeIn");
      }
    });
    $(".fadeUp").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(this).addClass("animated fadeInUp");
      }
    });
    $(".fadeLeft").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(this).addClass("animated fadeInLeft");
      }
    });
    $(".fadeRight").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(this).addClass("animated fadeInRight");
      }
    });
    $(".modIconAnim .iconList .ul").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(".modIconAnim .iconList01 .ul .li:nth-of-type(1)")
          .addClass("animated fadeIn")
          .css("animation-delay", ".2s");
        $(".modIconAnim .iconList01 .ul .li:nth-of-type(2)")
          .addClass("animated fadeIn")
          .css("animation-delay", ".4s");
        $(".modIconAnim .iconList01 .ul .li:nth-of-type(3)")
          .addClass("animated fadeIn")
          .css("animation-delay", ".6s");
        $(".modIconAnim .iconList01 .ul .li:nth-of-type(4)")
          .addClass("animated fadeIn")
          .css("animation-delay", ".8s");
        $(".modIconAnim .iconList02 .ul .li:nth-of-type(1)")
          .addClass("animated fadeIn")
          .css("animation-delay", "1s");
        $(".modIconAnim .iconList02 .ul .li:nth-of-type(2)")
          .addClass("animated fadeIn")
          .css("animation-delay", "1.2s");
        $(".modIconAnim .iconList02 .ul .li:nth-of-type(3)")
          .addClass("animated fadeIn")
          .css("animation-delay", "1.6s");
      }
    });
    $(".modListAnim .ul").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(".modListAnim .ul .li:nth-of-type(1)")
          .addClass("animated fadeIn")
          .css("animation-delay", ".2s");
        $(".modListAnim .ul .li:nth-of-type(2)")
          .addClass("animated fadeIn")
          .css("animation-delay", ".4s");
        $(".modListAnim .ul .li:nth-of-type(3)")
          .addClass("animated fadeIn")
          .css("animation-delay", ".6s");
      }
    });
  });
});
