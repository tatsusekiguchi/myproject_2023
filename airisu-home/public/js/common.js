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

  //スクロール位置に応じてナビ固定
  setHeaderFixed();

  // 各スライダーに対してアニメーション関数を実行
  animateImages(".slideImages01");
  animateImages(".slideImages02");

  if ($(".caseSliderPanel")) {
    $(".caseSlider").on(
      "init reInit afterChange",
      function (event, slick, currentSlide, nextSlide) {
        var i = (currentSlide ? currentSlide : 0) + 1;
        $(".slick-num").text(i);
      }
    );
    $(".caseSlider").slick({
      slidesToShow: 3,
      slidesToScroll: 3,
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
      centerPadding: "5%",
      responsive: [
        {
          breakpoint: 1050,
          settings: {
            slidesToShow: 1,
            slidesToScroll: 1,
            centerPadding: "5%",
          },
        },
        // {
        //   breakpoint: 800,
        //   settings: {
        //     centerMode: false,
        //     arrows: true,
        //     centerPadding: "0",
        //   },
        // },
      ],
    });
    const $slider01 = $(".caseSlider");
    $slider01.on("beforeChange", (event, slick, currentSlide, nextSlide) => {
      $slider01.find(".slick-slide").each((index, el) => {
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
  if ($(".lineUpSliderPanel")) {
    $(".lineUpSlider").on(
      "init reInit afterChange",
      function (event, slick, currentSlide, nextSlide) {
        var i = (currentSlide ? currentSlide : 0) + 1;
        $(".slick-num").text(i);
      }
    );
    $(".lineUpSlider").slick({
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
    const $slider02 = $(".lineUpSlider");
    $slider02.on("beforeChange", (event, slick, currentSlide, nextSlide) => {
      $slider02.find(".slick-slide").each((index, el) => {
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

  $(".webgene-pagination .prev a").addClass("js-hover-r");
  $(".webgene-pagination .next a").addClass("js-hover");
  $(".webgene-pagination .prev a").html('<div class="arrows"><</div>');
  $(".webgene-pagination .next a").html('<div class="arrows">></div>');
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
    $(".subNavigationContainer").fadeToggle();
    $(".header, .subNavigationContainer__wrap").toggleClass("active");
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
// animateImages( )
// 機能  ：トップスライダーのアニメーション関数
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function animateImages(sliderClass) {
  // 画像を取得
  var images = $(sliderClass + " .slideImages__image");
  // 次に表示する画像のインデックス
  var index = 0;

  // 画像の初期位置を設定
  images.each(function (i, image) {
    // 表示する画像は右端（left: 0）に、それ以外の画像は画面左外側（left: "-100%"）に配置
    $(image).css({
      left: i === index ? 0 : "-100%",
      zIndex: i === index ? 1 : 2,
    });
  });

  // 画像のアニメーション関数
  function animate() {
    // 次に表示する画像のインデックスを更新
    index = (index + 1) % images.length;

    // すべての画像のz-indexをリセットし、新しい画像のz-indexを2に設定
    images.css({ zIndex: 1 }).eq(index).css({ zIndex: 2 });

    // 次の画像を左からスライドインさせる
    images
      .eq(index)
      .css({ left: "-100%" })
      .animate({ left: 0 }, 1000, function () {
        // 新しい画像がスライドインしたら、古い画像を左にスライドアウトさせる
        images
          .not(":eq(" + index + ")")
          .css({ left: 0 })
          .animate({ left: "-100%" }, 1000);
      });
  }

  // 一定間隔でアニメーション関数を実行
  setInterval(animate, 5000); // ここで設定する時間が画像間の遅延を決定
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
