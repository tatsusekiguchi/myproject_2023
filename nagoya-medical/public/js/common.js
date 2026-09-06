/* Javascript */

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

  ///キービジュアルのスライダー設定
  keyvSlider();

  if ($("#request").length > 0) {
    // 郵便番号
    $(".zip1 .wpcf7-text").jpostal({
      postcode: [
        ".zip1 .wpcf7-text", //郵便番号上3ケタ
        ".zip2 .wpcf7-text", //郵便番号下4ケタ
      ],
      address: {
        // "#pref": "%3", //都道府県
        // "#city": "%4%5", //市区町村 町域
        ".address .wpcf7-text": "%3%4%5",
      },
    });
    $("input[type=submit]").prop("disabled", true);
    $(".agreeCheck input").on("change", function (e) {
      if ($(this).prop("checked") == true) {
        $("input[type=submit]").prop("disabled", false);
      } else {
        $("input[type=submit]").prop("disabled", true);
      }
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
    // $(".subNavigation").fadeToggle();
    $(".subNavigation").toggleClass("active");
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
  $(".accord dt").click(function () {
    $(this).toggleClass("active");

    $(this).next("dd").slideToggle();
  });
}

//======================================================================================================
// pageScroll( )
// 機能  ：ページ内リンクのスクロール設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function pageScroll() {
  $(".linkList li[data-target],.linkBtn[data-target]").on(
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
// keyvSlider( )
// 機能  ：キービジュアルのスライダー設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function keyvSlider() {
  if ($(".topKv").length) {
    var HEADER_ELEM = $(".topKv");
    var FADE_SPEED = 2500;
    var SWITCH_DELAY = 8000;

    // 要素作成
    if (!HEADER_ELEM.children().hasClass("kvBox")) {
      var keyBoxElem = "";
      keyBoxElem += '<div class="kvBox">';
      keyBoxElem += '<div class="kvBg kv01"></div>';
      keyBoxElem += '<div class="kvBg kv02"></div>';
      keyBoxElem += '<div class="kvBg kv03"></div>';
      keyBoxElem += "</div>";
      HEADER_ELEM.append(keyBoxElem);
    }

    var keyBox = ".kvBox";
    $(keyBox + " .kvBg").css({ opacity: "0" });
    $(keyBox + " .kvBg:first")
      .stop()
      .animate({ opacity: "1" }, FADE_SPEED);
    setInterval(function () {
      $(keyBox + " .kvBg:first")
        .animate({ opacity: "0" }, FADE_SPEED)
        .nextAll(".kvBg:first")
        .animate({ opacity: "1" }, FADE_SPEED)
        .end()
        .appendTo(keyBox);
    }, SWITCH_DELAY);
  }
}
