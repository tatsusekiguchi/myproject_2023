/* Javascript */

/* 切り替え幅 */
var replaceWidth = 1025;

//pc、sp判定
function reseHeaderMenu() {
  if (parseInt($(window).width()) >= replaceWidth) {
    $("body").removeClass("sp");
    $("body").addClass("pc");
    $("header .menuBtn").removeClass("open");
    $("header nav").attr("style", "");
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

  //スクロール位置に応じてヘッダー固定
  setHeaderFixed();

  //スマホメニュー、カレンダーの表示
  dispObj();

  //アコーディオン
  setAccord();

  //telリンクをスマートフォン端末以外では無効にする
  setTelLink();

  //ページトップへなめらかスクロール
  setPageTop();

  //ページ内リンクのスクロールアニメーション
  scrollAnim();

  //モーダルウインドウ表示・非表示
  modalAction();

  //フォーム送信完了時
  if ($(".wpcf7-mail-sent-ok")[0]) {
    $(".wpcf7-mail-sent-ok").prev("#btnSubmit").hide();
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
    pcName = "/pc",
    spName = "/sp",
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
// setHeaderFixed( )
// 機能  ：ページスクロール時の処理。ヘッダー固定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setHeaderFixed() {
  var scroll, winTop;

  $(window).on("load resize", function () {
    //スクロールするたびに実行
    $(window).scroll(function () {
      // scroll = $('#kv,.kv').offset().top + $('#kv,.kv').outerHeight();
      scroll = $("header").outerHeight();
      winTop = $(this).scrollTop();
      //スクロール位置がnavの位置より下だったらクラスfixedを追加
      if (winTop > scroll) {
        $("header").addClass("fixed");
      } else if (winTop < scroll) {
        $("header").removeClass("fixed");
      }
    });
  });
}

//======================================================================================================
// dispObj( )
// 機能  ：スマホメニュー
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function dispObj() {
  $("#spMenuBtn").click(function () {
    $("nav").animate({ top: "60px", left: "0" }, { duration: 400 });
  });
  $("#navClose").click(function () {
    $("nav").animate({ top: "60px", left: "-100%" }, { duration: 400 });
  });
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

  $("#top .introList li").click(function () {
    $("#top .introList li").removeClass("act");
    $("#top .courseList").hide();
    $(this).addClass("act");

    if ($("#introBtn01").hasClass("act")) {
      $("#top #course01").show();
    }
    if ($("#introBtn02").hasClass("act")) {
      $("#top #course02").show();
    }
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
// setPageTop( )
// 機能  ：ページトップへの動作設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setPageTop() {
  var topBtn = $("#pagetop");
  topBtn.hide();

  //スクロールが100に達したらボタン表示
  $(window).scroll(function () {
    if ($(this).scrollTop() > 100) {
      topBtn.fadeIn();
    } else {
      topBtn.fadeOut();
    }
  });

  //クリックしたらスクロールしてページトップへ
  topBtn.click(function () {
    $("body,html").animate(
      {
        scrollTop: 0,
      },
      500
    );
    return false;
  });
}

//======================================================================================================
// scrollAnim( )
// 機能  ：ページ内リンクのスクロールアニメーション
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function scrollAnim(elem) {
  var speed = 1000;
  var NAV_ELEM = $("header");

  $(".pageLink a").click(function () {
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

    $("html, body").animate({ scrollTop: position }, speed, "swing");
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
// modalAction( )
// 機能  ：モーダルウインドウ表示・非表示
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function modalAction() {
  $("body").append('<span class="modalOverlay"></span>');

  var Window = $(window),
    hb = $("html, body"),
    body = $("body"),
    mw = $(".modalContent"),
    overlay = $(".modalOverlay"),
    scrollY;
  // 開く
  $(".modalOpen").on("click", function () {
    $("header").addClass("mdHeaderFixed");
    scrollY = Window.scrollTop();
    var modal = "#" + $(this).attr("data-target");

    overlay.fadeIn();
    $(modal).fadeIn();
    $("body").css({ overflow: "hidden", height: "100%", position: "fixed" });
    $("html").css({ overflow: "hidden", height: "100%" });
    hb.prop({ scrollTop: scrollY });
    return false;
  });

  // 閉じる
  $(".modalOverlay, .modalClose").click(function () {
    hb.attr("style", "");
    hb.prop({ scrollTop: scrollY });
    overlay.fadeOut();
    mw.fadeOut();
    $("header").removeClass("mdHeaderFixed");
  });

  // Esc キーで閉じる
  Window.keydown(function (e) {
    if (e.keyCode == 27) {
      body.attr("style", "");
      hb.prop({ scrollTop: scrollY });
      overlay.removeClass("block");
      mw.removeClass("block");
    }
  });
}
