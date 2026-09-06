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
var replaceWidth = 1140;

//pc、sp判定
function reseHeaderMenu() {
  if (parseInt($(window).width()) >= replaceWidth) {
    $("body").removeClass("sp");
    $("body").addClass("pc");
    $("nav, .hamburger img").attr("style", "");
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

  if (_width >= 1140) {
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

  //ページ内リンクのスクロールアニメーション
  scrollAnim(
    ".logo a, .navList a, .footNav a, .btnEntry a, .btnAbout a, .kvBnr a, .orientationContainer__bnr a"
  );

  $(".header a").click(function () {
    if ($(".hamburger").hasClass("is-open")) {
      $(".hamburger").click();
    }
  });

  $(".kvClose").on("click", function () {
    $(".kvBnr").hide();
  });

  if ($("#section__interview").length > 0) {
    $(".interviewSlider").slick({
      // autoplay: true,
      infinite: true, //スライドをループさせるかどうか。初期値はtrue。
      fade: false, //フェードの有効化
      slidesToShow: 3,
      slidesToScroll: 1,
      arrows: true,
      centerMode: true,
      centerPadding: "150px",
      responsive: [
        {
          breakpoint: 1139,
          settings: {
            slidesToShow: 2,
            dots: true,
            centerPadding: "100px",
          },
        },
        {
          breakpoint: 680,
          settings: {
            slidesToShow: 1,
            dots: true,
            centerPadding: "50px",
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            dots: true,
            centerPadding: "30px",
          },
        },
      ],
    });
  }

  if ($("#section__office").length > 0) {
    $(".officeSlider").slick({
      // autoplay: true,
      infinite: true, //スライドをループさせるかどうか。初期値はtrue。
      fade: false, //フェードの有効化
      slidesToShow: 2,
      slidesToScroll: 1,
      arrows: true,
      centerMode: true,
      centerPadding: "150px",
      responsive: [
        {
          breakpoint: 1139,
          settings: {
            slidesToShow: 1,
            arrows: true,
            centerPadding: "100px",
          },
        },
        {
          breakpoint: 768,
          settings: {
            slidesToShow: 1,
            arrows: true,
            centerPadding: "20px",
          },
        },
        {
          breakpoint: 480,
          settings: {
            slidesToShow: 1,
            arrows: true,
            centerPadding: "20px",
          },
        },
      ],
    });
  }

  $(".interviewModalOpen").on("click", function () {
    const modalId = $(this).data("modal-id");
    const targetModal = $(`.interviewItemModal[data-modal="${modalId}"]`);
    targetModal.css("display", "flex");
    if ($("body").hasClass("sp")) {
      targetModal.find(".modalScroll").fadeIn();
    }
    $(".interviewItemOverlay").show();
  });

  $(".interviewItemModal .modalClose, .interviewItemOverlay").on(
    "click",
    function () {
      $(".interviewItemModal").hide();
      $(".interviewItemOverlay").hide();
    }
  );

  $(".interviewItemModal .modalBoxInner").on("scroll", function () {
    $(".interviewItemModal").each(function () {
      var $modal = $(this);
      if ($modal.css("display") === "flex") {
        $modal.find(".modalScroll").fadeOut();
      }
    });
  });

  $(".voiceModalOpen").on("click", function () {
    const modalId = $(this).data("modal-id");
    const targetModal = $(`.voiceItemModal[data-modal="${modalId}"]`);
    targetModal.css("display", "flex");
    if ($("body").hasClass("sp")) {
      targetModal.find(".modalScroll").fadeIn();
    }
    $(".voiceItemOverlay").show();
  });

  $(".voiceItemModal .modalClose, .voiceItemOverlay").on("click", function () {
    $(".voiceItemModal").hide();
    $(".voiceItemOverlay").hide();
  });

  $(".voiceItemModal .modalBoxInner").on("scroll", function () {
    $(".voiceItemModal").each(function () {
      var $modal = $(this);
      if ($modal.css("display") === "flex") {
        $modal.find(".modalScroll").fadeOut();
      }
    });
  });

  // $(".count em").each(function () {
  //   var $this = $(this);
  //   var digitLength = $this.text().length;
  //   var time;
  //   console.log(digitLength);
  //   switch (digitLength) {
  //     case 1: // 1桁の場合
  //       time = 1000;
  //       break;
  //     case 2: // 2桁の場合
  //       time = 3000;
  //       break;
  //     case 3: // 3桁の場合
  //       time = 1000;
  //       break;
  //     // ... 他の桁数の場合も追加可能
  //     default: // 上記のいずれの条件にも当てはまらない場合のデフォルト値
  //       time = 6000;
  //   }

  //   $this.counterUp({
  //     delay: 10,
  //     time: time,
  //   });
  // });

  $("#top input[type=submit]").prop("disabled", true);
  $(".agreeCheck input").on("change", function (e) {
    if ($(this).prop("checked") == true) {
      $("input[type=submit]").prop("disabled", false);
    } else {
      $("input[type=submit]").prop("disabled", true);
    }
  });

  // 初期状態の値を設定する関数
  function setInitialValue(selectName) {
    var initialValue = $('select[name="' + selectName + '"]').val();
    $('input[name="selected_' + selectName + '"]').val(initialValue);
  }

  // selectボックスの値が変更されたときのイベントハンドラを設定する関数
  function bindChangeEvent(selectName) {
    $('select[name="' + selectName + '"]').on("change", function () {
      var selectedValue = $(this).val();
      $('input[name="selected_' + selectName + '"]').val(selectedValue);
    });
  }

  // 各selectボックスに対して上記の関数を適用
  var selectNames = ["content", "date", "job"];
  for (var i = 0; i < selectNames.length; i++) {
    setInitialValue(selectNames[i]);
    bindChangeEvent(selectNames[i]);
  }

  if ($("#contactConfirm").length > 0) {
    // contentのvalueをselected_contentにコピー
    var contentValue = $('input[name="content"]').val();
    $('input[name="selected_content"]').val(contentValue);

    // dateのvalueをselected_dateにコピー
    var dateValue = $('input[name="date"]').val();
    $('input[name="selected_date"]').val(dateValue);

    // jobのvalueをselected_jobにコピー
    var jobValue = $('input[name="job"]').val();
    $('input[name="selected_job"]').val(jobValue);
  }

  // 1.関数の定義
  function setHeight() {
    let vh = window.innerHeight * 0.01;
    document.documentElement.style.setProperty("--vh", `${vh}px`);
  }

  // 2.初期化
  setHeight();

  // 3.ブラウザのサイズが変更された時・画面の向きを変えた時に再計算する
  window.addEventListener("resize", setHeight);
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
    replaceWidth = 1140;

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
    $(".header .navBox").fadeToggle();
    $(".menu-open, .menu-close").toggle();
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
  $(window).on("load resize", function () {
    //スクロールするたびに実行
    $(window).scroll(function () {
      //scroll = $(".headBox").offset().top + $(".headBox").outerHeight();
      scroll = $(".headBox").innerHeight();
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
// scrollAnim( )
// 機能  ：ページ内リンクのスクロールアニメーション
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function scrollAnim(elem) {
  var speed = 1000;

  $(elem).click(function () {
    var href = "";
    var NAV_ELEM =
      $(window).width() < replaceWidth ? $(".header") : $(".headBox");
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
    var NAV_ELEM =
      $(window).width() < replaceWidth ? $(".header") : $(".headBox");
    var navHeight = NAV_ELEM.innerHeight();
    position = position - navHeight;

    $("body,html").stop().animate({ scrollTop: position }, 1000);
  }
}
