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

  if ($(".topMain .sliderPanel").length > 0) {
    $(".sliderPanel").slick({
      autoplay: true,
      autoplaySpeed: 4000,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      centerMode: true,
      arrows: false,
      responsive: [
        {
          breakpoint: replaceWidth,
          settings: {
            centerMode: false,
          },
        },
      ],
    });
  }

  if ($(".newsMain .postDetailPanel").length > 0) {
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
      slidesToShow: 5, //表示させるスライドの数
      focusOnSelect: true, //フォーカスの有効化
      slidesToScroll: 1,
      asNavFor: ".thumb-item", //連動させるスライドショーのクラス名
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
  $(".header .headMenu").click(function () {
    $(".header .navBox").fadeIn();
  });
  $(".header .closeMenu").click(function () {
    $(".header .navBox").fadeOut();
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
