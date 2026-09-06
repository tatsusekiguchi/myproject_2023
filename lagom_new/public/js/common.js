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

  //ページ内リンクのスクロールアニメーション
  scrollAnim(".header a, .footer__items a, #top .section__openHouse__entry a");

  //スクロール位置に応じてナビ固定
  setHeaderFixed();

  //キービジュアルのスライダー設定
  keyvSlider();

  $(".subNavigation a").click(function () {
    $(".hamburger").click();
  });

  if ($("#top").length > 0) {
    $("header").addClass("topHeader");
    $("input[type=submit]").prop("disabled", true);
    $(".agreeCheck input").on("change", function (e) {
      if ($(this).prop("checked") == true) {
        $("input[type=submit]").prop("disabled", false);
      } else {
        $("input[type=submit]").prop("disabled", true);
      }
    });
    $(".photoSlider").slick({
      autoplay: true,
      autoplaySpeed: 3000,
      infinite: true,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: false,
    });
    const inputText = $(".inputTime input");
    const placeholder = $(".placeholder");
    inputText.on("keyup change", function () {
      // inputTextの文字を数える
      let letterLength = $(this).val().length;
      if (letterLength !== 0) {
        $(this).parents(".inputBox").find(placeholder).addClass("none");
      } else {
        $(this).parents(".inputBox").find(placeholder).removeClass("none");
      }
    });
  } else {
    $("header").addClass("pageHeader");
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
    $(".subNavigationContainer").fadeToggle();
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
// scrollAnim( )
// 機能  ：ページ内リンクのスクロールアニメーション
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function scrollAnim(elem) {
  var speed = 1000;
  var NAV_ELEM = $(".headBox");

  $(elem).click(function () {
    var href = "";
    if ($(this).attr("href")) {
      href = $(this).attr("href");
    }
    var target = $("html");
    if (href == "") {
      target = $("article");
    } else if (href == "#") {
      target = $("html");
    } else {
      target = $(href);
    }
    var position = target.offset().top;

    // position - (ナビゲーション高さ)
    var navHeight = NAV_ELEM.innerHeight();
    position = position - navHeight;

    $("html, body").stop().animate({ scrollTop: position }, speed, "swing");
    return false;
  });

  //URLのハッシュ値を取得
  var urlHash = location.hash;
  //ハッシュ値があればページ内スクロール
  if (urlHash) {
    //スクロールを0に戻す
    $("body,html").animate({ scrollTop: 0 }, 10);
    setTimeout(function () {
      //ロード時の処理を待ち、時間差でスクロール実行
      scrollToAnker(urlHash);
    }, 100);
  }

  // 指定したアンカー(#ID)へアニメーションでスクロール
  function scrollToAnker(hash) {
    var target = $(hash);
    var position = target.offset().top;
    // position - (ナビゲーション高さ)
    var navHeight = NAV_ELEM.innerHeight();
    position = position - navHeight;

    $("body,html").stop().animate({ scrollTop: position }, 1000);
  }
}

//======================================================================================================
// setHeaderFixed( )
// 機能  ：ページスクロール時の処理。ナビ固定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setHeaderFixed() {
  var scroll, winTop;
  $(window).on("load resize", function () {
    //スクロールするたびに実行
    $(window).scroll(function () {
      scroll = $(".topKv").offset().top + $(".topKv").outerHeight();
      //scroll = $(".header").innerHeight();
      winTop = $(this).scrollTop();
      //スクロール位置がheaderの位置より下だったらクラスfixedを追加
      if (winTop > scroll) {
        $("header").addClass("fixed");
      } else if (winTop < scroll) {
        $("header").removeClass("fixed");
      }
    });
  });
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
