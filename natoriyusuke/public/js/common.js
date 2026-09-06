/* Javascript */

window.onpageshow = function (event) {
  if (event.persisted) {
    window.location.reload();
  }
};

$(function () {
  // ハッシュリンク(#)と別ウィンドウでページを開く場合はスルー
  $(
    'a:not([href^="#"]):not([target]):not([href^="tel:"]):not([href^="mailto:"]):not(.disabled)'
  ).on("click", function (e) {
    e.preventDefault(); // ナビゲートをキャンセル
    url = $(this).attr("href"); // 遷移先のURLを取得
    if (url !== "") {
      $("body").addClass("fadeout"); // bodyに class="fadeout"を挿入
      setTimeout(function () {
        window.location = url; // 0.8秒後に取得したURLに遷移
      }, 800);
    }
    return false;
  });
});

/* 切り替え幅 */
var replaceWidth = 1025;

//pc、sp判定
function reseHeaderMenu() {
  if (parseInt($(window).width()) >= replaceWidth) {
    $("body").removeClass("sp");
    $("body").addClass("pc");
    $("nav").attr("style", "");
  } else {
    $("body").removeClass("pc");
    $("body").addClass("sp");
  }
}

//幅変更時pc、sp判定
$(window).resize(function () {
  reseHeaderMenu();
});

//リサイズもしくはロードされた時にReLayout呼び出し
$(window).on("load resize", ReLayout);

function ReLayout() {
  var _width = $(window).width(); //画面サイズ取得

  if (_width >= 1025) {
    //幅に応じて読み込む画像を変更する
    changeImg(".switch");
  } else {
    changeImg(".switch");
  }
}

$(document).ready(function () {
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

  if ($(".topMain").length > 0) {
    setHeaderFixed();
    $(".header").addClass("topHeader");
    $(window).on("scroll", function () {
      $(".scrollBgChange").each(function () {
        var scrollTop = $(window).scrollTop();
        var elementOffset = $(this).offset().top;
        var distance = elementOffset - scrollTop;
        var windowHeight = $(window).height();
        var opacity = 0;
        if (distance < windowHeight) {
          opacity = 1 - distance / windowHeight;
        }
        $(this).css({
          // "background-color": "#ece8da",
          opacity: opacity,
        });
      });
    });
  } else {
    $(".header").addClass("pageHeader");
  }
  if ($(".slidePanel").length > 0) {
    //スクロールアニメーション
    $(".slideBox .ul").infiniteslide({
      speed: 35, //速さ　単位はpx/秒です。
      pauseonhover: false, //マウスオーバーでストップ
      responsive: true, //子要素の幅を%で指定しているとき
      clone: 2, //子要素の複製回数
    });
  }
  if ($(".caseSliderPanel").length > 0) {
    $(".caseSlider").slick({
      slidesToShow: 1,
      slidesToScroll: 1,
      dots: false,
      fade: false,
      infinite: true,
      autoplay: true,
      cssEase: "ease-in-out",
      speed: 800,
      useCSS: true,
      arrows: false,
      focusOnSelect: true,
      autoplaySpeed: 3500,
      centerMode: true,
      centerPadding: "25%",
      responsive: [
        {
          breakpoint: 1050,
          settings: {
            slidesToShow: 1,
            centerPadding: "12%",
          },
        },
        {
          breakpoint: 800,
          settings: {
            centerMode: false,
            arrows: true,
            centerPadding: "0",
          },
        },
      ],
    });
    const $slider = $(".caseSlider");
    $slider.on("beforeChange", (event, slick, currentSlide, nextSlide) => {
      $slider.find(".slick-slide").each((index, el) => {
        const $this = $(el),
          slickindex = $this.attr("data-slick-index");
        if (nextSlide == slick.slideCount - 1 && currentSlide == 0) {
          // 現在のスライドが最初のスライドでそこから最後のスライドに戻る場合
          if (slickindex == "-1") {
            // 最後のスライドに対してクラスを付与
            $this.addClass("is-active-next");
          } else {
            // それ以外は削除
            $this.removeClass("is-active-next");
          }
        } else if (nextSlide == 0) {
          // 次のスライドが最初のスライドの場合
          if (slickindex == slick.slideCount) {
            // 最初のスライドに対してクラスを付与
            $this.addClass("is-active-next");
          } else {
            // それ以外は削除
            $this.removeClass("is-active-next");
          }
        } else {
          // それ以外は削除
          $this.removeClass("is-active-next");
        }
      });
    });
  }
});

//======================================================================================================
// changeImg( )
// 機能  ：幅に応じて読み込む画像を変更する
// 引数  ：target→image
// 戻り値：なし
//======================================================================================================
function changeImg(target) {
  var $setElem = $(target),
    pcName = "_pc",
    spName = "_sp",
    replaceWidth = 1025;

  $setElem.each(function () {
    var $this = $(this);
    function imgSize() {
      var windowWidth = parseInt($(window).width());
      if (windowWidth >= replaceWidth) {
        $this.attr("src", $this.attr("src").replace(spName, pcName));
      } else if (windowWidth < replaceWidth) {
        $this.attr("src", $this.attr("src").replace(pcName, spName));
      }
    }
    $(window).resize(function () {
      imgSize();
    });
    imgSize();
  });
}

//======================================================================================================
// dispObj( )
// 機能  ：スマホメニュー
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function dispObj() {
  $(".header .hamburger").click(function () {
    $(this).toggleClass("is-open");
    $(".header .subNavigation").toggleClass("active");
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
  var isMobile = /iphone/.test(ua) || /android(.+)?mobile/.test(ua);

  if (!isMobile) {
    $('a[href^="tel:"]').on("click", function (e) {
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
  $(".accord .dd").hide();
  $(".accord .dt").click(function () {
    $(this).toggleClass("active");

    $(this).next(".dd").slideToggle();
  });
}

//======================================================================================================
// pageScroll( )
// 機能  ：ページ内リンクのスクロール設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function pageScroll() {
  $(".linkList .li[data-target],.linkBtn[data-target]").on(
    "click",
    function (e) {
      e.preventDefault();
      var headH = $(".header").innerHeight();
      var cls = "." + $(this).data("target");
      var pos = $(cls).offset().top - headH;
      $("body,html").stop().animate(
        {
          scrollTop: pos,
        },
        1000
      );
    }
  );
}

//======================================================================================================
// setHeaderFixed( )
// 機能  ：ページスクロール時の処理。ナビ固定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setHeaderFixed() {
  var scroll, winTop;

  //スクロールするたびに実行
  $(window).scroll(function () {
    // scroll = $('.pageTtl').offset().top;
    scroll = $(".header").innerHeight();
    //scroll = window.innerHeight;
    winTop = $(this).scrollTop();
    //スクロール位置がnavの位置より下だったらクラスfixedを追加
    if (winTop > scroll) {
      $(".header").addClass("fixed");
    } else if (winTop < scroll) {
      $(".header").removeClass("fixed");
    }
  });
}
