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
  $(".fadeinKvTxt").css("opacity", "0");
  $(".fadeinKvTxt").addClass("animated fadeIn");
  $(window).on("load", function () {
    $("body").css("opacity", "1");
  });

  $(window).on("load scroll", function () {
    $(".bgBoxAnim").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      var count = $(".bgBoxAnim .ul .li").length;
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(".bgBoxAnim .ul .li .borders").addClass("animated");
        $(".bgBoxAnim .ul .li:nth-of-type(1) .fadein")
          .addClass("animated fadeIn")
          .css("animation-delay", ".3s");
        $(".bgBoxAnim .ul .li:nth-of-type(2) .fadein")
          .addClass("animated fadeIn")
          .css("animation-delay", ".6s");
        $(".bgBoxAnim .ul .li:nth-of-type(3) .fadein")
          .addClass("animated fadeIn")
          .css("animation-delay", ".9s");
        $(".bgBoxAnim .ul .li:nth-of-type(4) .fadein")
          .addClass("animated fadeIn")
          .css("animation-delay", "1.2s");
        $(".bgBoxAnim .ul .li:nth-of-type(5) .fadein")
          .addClass("animated fadeIn")
          .css("animation-delay", "1.5s");
        $(".bgBoxAnim .ul .li:nth-of-type(6) .fadein")
          .addClass("animated fadeIn")
          .css("animation-delay", "1.8s");
        $(".bgBoxAnim .ul .li:nth-of-type(n + 7) .fadein")
          .removeClass("fadein")
          .css("opacity", "1");
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
      }
    });
    // $(".topMain .sec02 .ul").each(function () {
    //   var imgPos = $(this).offset().top;
    //   var scroll = $(window).scrollTop();
    //   var windowHeight = $(window).height();
    //   if (scroll > imgPos - windowHeight + windowHeight / 3) {
    //     $(".topMain .sec02 .ul .li:nth-of-type(1)")
    //       .addClass("animated fadeInUp")
    //       .css("animation-delay", ".2s");
    //     $(".topMain .sec02 .ul .li:nth-of-type(2)")
    //       .addClass("animated fadeInUp")
    //       .css("animation-delay", ".4s");
    //     $(".topMain .sec02 .ul .li:nth-of-type(3)")
    //       .addClass("animated fadeInUp")
    //       .css("animation-delay", ".6s");
    //   }
    // });
    // $(".topMain .sec03").each(function () {
    //   var imgPos = $(this).offset().top;
    //   var scroll = $(window).scrollTop();
    //   var windowHeight = $(window).height();
    //   if (scroll > imgPos - windowHeight + windowHeight / 3) {
    //     $(".topMain .sec03 .secTtlBox")
    //       .addClass("animated fadeInUp")
    //       .css("animation-delay", ".2s");
    //     $(".topMain .sec03 .ul .li:nth-of-type(1)")
    //       .addClass("animated fadeInUp")
    //       .css("animation-delay", ".4s");
    //     $(".topMain .sec03 .ul .li:nth-of-type(2)")
    //       .addClass("animated fadeInUp")
    //       .css("animation-delay", ".6s");
    //     $(".topMain .sec03 .ul .li:nth-of-type(3)")
    //       .addClass("animated fadeInUp")
    //       .css("animation-delay", ".8s");
    //   }
    // });
    $(".topMain .sec04").each(function () {
      var imgPos = $(this).offset().top;
      var scroll = $(window).scrollTop();
      var windowHeight = $(window).height();
      if (scroll > imgPos - windowHeight + windowHeight / 3) {
        $(".topMain .sec04 .secTtlBox")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".2s");
        $(".topMain .sec04 .ul .li:nth-of-type(1)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".4s");
        $(".topMain .sec04 .ul .li:nth-of-type(2)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".6s");
        $(".topMain .sec04 .ul .li:nth-of-type(3)")
          .addClass("animated fadeInUp")
          .css("animation-delay", ".8s");
      }
    });
  });
});
