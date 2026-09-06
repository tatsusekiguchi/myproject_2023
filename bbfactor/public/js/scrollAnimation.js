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
  $(".fadeDown").css("opacity", "0");
  $(".listAnim li").css("opacity", "0");
  $(".itemAnim li").css("opacity", "0");
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
          .find("li:nth-child(1)")
          .addClass("animated fadeInUp")
          .css("opacity", "1");
        $(this)
          .find("li:nth-child(2)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".2s");
        $(this)
          .find("li:nth-child(3)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".4s");
        $(this)
          .find("li:nth-child(4)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".6s");
      }
    });
    $(".itemAnim").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(this)
          .find("li:nth-child(1)")
          .addClass("animated fadeInDown")
          .css("opacity", "1");
        $(this)
          .find("li:nth-child(2)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".2s");
        $(this)
          .find("li:nth-child(3)")
          .addClass("animated fadeInDown")
          .css("animation-delay", ".4s");
        $(this)
          .find("li:nth-child(4)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".6s");
        $(this)
          .find("li:nth-child(5)")
          .addClass("animated fadeInDown")
          .css("animation-delay", ".8s");
        $(this)
          .find("li:nth-child(6)")
          .addClass("animated fadeInUp")
          .css("animation-delay", "1s");
        $(this)
          .find("li:nth-child(7)")
          .addClass("animated fadeInDown")
          .css("animation-delay", "1.2s");
        $(this)
          .find("li:nth-child(8)")
          .addClass("animated fadeInUp")
          .css("animation-delay", "1.4s");
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
    $(".fadeDown").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(this).addClass("animated fadeInDown");
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
    $(".topSecTitle").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(this).addClass("active");
      }
    });
  });
});
