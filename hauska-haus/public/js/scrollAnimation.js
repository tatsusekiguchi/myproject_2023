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
  $(".listAnim .li").css("opacity", "0");
  $(".listAnim .last").css("opacity", "0");
  $(".randomScroll .li").css("opacity", "0");
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
          .find(".li:nth-of-type(1)")
          .addClass("animated fadeIn")
          .css("animation-delay", ".2s");
        $(this)
          .find(".li:nth-of-type(2)")
          .addClass("animated fadeIn")
          .css("animation-delay", ".6s");
        $(this)
          .find(".li:nth-of-type(3)")
          .addClass("animated fadeIn")
          .css("animation-delay", "1s");
        $(this)
          .find(".li:nth-of-type(4)")
          .addClass("animated fadeIn")
          .css("animation-delay", "1.4s");
        $(this)
          .find(".li:nth-of-type(5)")
          .addClass("animated fadeIn")
          .css("animation-delay", "1.8s");
        $(this)
          .find(".last")
          .addClass("blurAnime")
          .css("animation-delay", "2s");
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

// 動きのきっかけの起点となるアニメーションの名前を定義
function moveAnimation() {
  //読み込まれたらすぐにランダムに出現
  var randomElm = $(".randomBox"); //親要素取得
  var randomElmChild = $(randomElm).children(); //親の子要素を取得
  if (!$(randomElm).hasClass("play")) {
    //親要素にクラス名playが付いてなければ処理をおこなう
    randomAnime();
  }

  function randomAnime() {
    $(randomElm).addClass("play"); //親要素にplayクラスを付与
    var rnd = Math.floor(Math.random() * randomElmChild.length); //配列数からランダム数値を取得
    var moveData = "fadeUpRandom"; //アニメーション名＝CSSのクラス名を指定
    $(randomElmChild[rnd]).addClass(moveData); //アニメーションのクラスを追加
    randomElmChild.splice(rnd, 1); //アニメーション追加となった要素を配列から削除
    if (randomElmChild.length == 0) {
      //配列の残りがあるか確認
      $(randomElm).removeClass("play"); //なくなった場合は親要素のplayクラスを削除
    } else {
      setTimeout(function () {
        randomAnime();
      }, 500); //0.5秒間隔でアニメーションをスタートさせる。※ランダムのスピード調整はこの数字を変更させる
    }
  }

  //スクロールしたらランダムに出現
  var randomElm2 = $(".randomScroll"); //親要素取得
  var randomElm2Child = $(randomElm2).children(); //親の子要素を取得
  randomScrollAnime();
  function randomScrollAnime() {
    var elemPos = $(".randomScroll").offset().top - 50; //要素より、50px上まで来たら
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    if (scroll >= elemPos - windowHeight) {
      if (randomElm2Child.length > 0) {
        //配列数以上であれば処理をおこなう
        var rnd = Math.floor(Math.random() * randomElm2Child.length); //配列数から表示する数値をランダムで取得
        var moveData = "fadeUpRandom"; //アニメーション名＝CSSのクラス名を指定
        if (animeFlag) {
          //スクロールする度に動作するのでアニメーションが終わるまで処理をさせないようにする
          animeFlag = false; //アニメーション処理が終わるまで一時的にfalseにする
          $(randomElm2Child[rnd]).addClass(moveData); //アニメーションのクラスを追加
          setTimeout(function () {
            animeFlag = true; //次の処理をおこなうためにtrueに変更
            randomScrollAnime(); //自身の処理を繰り返す
          }, 500); //0.5秒間隔で。※ランダムのスピード調整はこの数字を変更させる
          randomElm2Child.splice(rnd, 1); //アニメーション追加となった要素を配列から削除
        }
      }
    } else {
      animeFlag = true;
    }
  }
}

var animeFlag = true; //スクロールする度に動作するのでアニメーションが終わるまで処理をさせないようにするための定義

// 画面をスクロールをしたら動かしたい場合の記述
$(window).scroll(function () {
  if ($(".randomScroll").length > 0) {
    moveAnimation(); /* アニメーション用の関数を呼ぶ*/
  }
}); // ここまで画面をスクロールをしたら動かしたい場合の記述

// 画面が読み込まれたらすぐに動かしたい場合の記述
$(window).on("load", function () {
  if ($(".randomBox").length > 0) {
    moveAnimation(); /* アニメーション用の関数を呼ぶ*/
  }
}); // ここまで画面が読み込まれたらすぐに動かしたい場合の記述
