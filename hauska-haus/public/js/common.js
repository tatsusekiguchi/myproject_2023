/* Javascript */

window.onpageshow = function (event) {
  if (event.persisted) {
    window.location.reload();
  }
};

$(function () {
  // ハッシュリンク(#)と別ウィンドウでページを開く場合はスルー
  $(
    'a:not([href^="#"]):not([target]):not([href^="tel:"]):not([href^="mailto:"]):not([data-lightbox]):not(.disabled):not(.lb-close)'
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
    $(".header").addClass("topHeader");
    //スクロール位置に応じてナビ固定
    setHeaderFixed();
    $(".topKvContainer").infiniteslide({
      speed: 35, //速さ　単位はpx/秒です。
      pauseonhover: false, //マウスオーバーでストップ
      responsive: true, //子要素の幅を%で指定しているとき
      clone: 2, //子要素の複製回数
    });
  } else {
    $(".header").addClass("pageHeader");
  }

  if ($(".serviceMain .exampleSlider").length > 0) {
    $(".exampleSlider").slick({
      arrows: true,
      dots: false,
    });
  }

  if ($(".blogMain .blogPanel--detail").length > 0) {
    $(".slider .li").each(function (index, element) {
      if (!$(element).find(".webgene-item-main-image").length) {
        $(element).remove();
      }
    });

    //上部画像の設定
    $(".thumb-item").slick({
      infinite: true, //スライドをループさせるかどうか。初期値はtrue。
      fade: false, //フェードの有効化
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      asNavFor: ".thumb-item-nav",
    });

    //選択画像の設定
    $(".thumb-item-nav").slick({
      infinite: true, //スライドをループさせるかどうか。初期値はtrue。
      slidesToShow: 4, //表示させるスライドの数
      focusOnSelect: true, //フォーカスの有効化
      slidesToScroll: 1,
      asNavFor: ".thumb-item", //連動させるスライドショーのクラス名
      arrows: false,
    });
  }

  if ($(".propertyMain .propertyDetail").length > 0) {
    $(".infoBox dl dd").each(function (index, element) {
      if ($.trim($(this).text()) == "") {
        $(this).parent("dl").remove();
      }
    });
  }

  slickResponsive(); // 初期ロード時に実行
  $(window).resize(function () {
    slickResponsive(); // ウィンドウリサイズ時に実行
  });

  $(".webgene-pagination .prev a").addClass("js-hover-r");
  $(".webgene-pagination .next a").addClass("js-hover");
  $(".webgene-pagination .prev a").html('<div class="arrows"><</div>');
  $(".webgene-pagination .next a").html('<div class="arrows">></div>');
});

// Slickを初期化する関数
function initSlick() {
  $(".propertyMain .propertySlider").slick({
    arrows: true,
    dots: false,
  });
}

// ウィンドウサイズに応じてSlickを制御する関数
function slickResponsive() {
  if ($(".propertyMain .propertySlider").length > 0) {
    if ($(window).width() < replaceWidth) {
      // ウィンドウサイズが1025px未満で、Slickが未初期化の場合
      if (!$(".propertyMain .propertySlider").hasClass("slick-initialized")) {
        initSlick();
      }
    } else {
      // ウィンドウサイズが1025px以上で、Slickが初期化されている場合
      if ($(".propertyMain .propertySlider").hasClass("slick-initialized")) {
        $(".propertyMain .propertySlider").slick("unslick");
      }
    }
  }
}

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
    $(".header .navBox").toggleClass("active");
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
