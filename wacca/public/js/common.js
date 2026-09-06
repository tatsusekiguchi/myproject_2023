/* Javascript */

/* 切り替え幅 */
var replaceWidth = 1025;

//pc、sp判定
function reseHeaderMenu() {
  if (parseInt($(window).width()) >= replaceWidth) {
    $("body").removeClass("sp");
    $("body").addClass("pc");
    $(".numberItemOverlay").attr("style", "");
    $(".activePanel").removeClass("numberItemModal");
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
  scrollAnim(
    ".subNavigation__list a, .footNav a, .pagetop a, .btnEntry a, .topNavigation a"
  );

  animateImages(".slideImages");

  $(".subNavigation a").click(function () {
    $(".hamburger").click();
  });

  $(".header .btnEntry a").click(function () {
    if ($(".hamburger").hasClass("is-open")) {
      $(".hamburger").click();
    }
  });

  if ($(".kvSlider").length > 0) {
    $(".kvSlider").slick({
      autoplay: true,
      infinite: true,
      fade: false,
      slidesToShow: 1,
      slidesToScroll: 1,
      arrows: false,
      dots: true,
      pauseOnFocus: false, //フォーカスで一時停止
      pauseOnHover: false, //マウスホバーで一時停止
    });
    $(".kvSlider").slick("resize");
  }
  $(".numberList .listPanel").on("click", function () {
    var activePanel = $(this).next(".activePanel");
    $(".numberItemOverlay").fadeIn();
    activePanel.addClass("numberItemModal").fadeIn();
  });

  $(".iconMinus").on("click", function () {
    $(".numberItemOverlay").fadeOut();
    $(".numberItemModal").fadeOut(function () {
      $(this).removeClass("numberItemModal");
    });
  });

  // 1. ラジオボタンの生成
  $(".tabPanel").each(function (index) {
    var jobTitle = $(this).find(".jobTitle p").text();
    var radioButton = $(
      '<li><input type="radio" id="radio' +
        index +
        '" name="job"><label for="radio' +
        index +
        '">' +
        jobTitle +
        "</label></li>"
    );
    $(".radioList").append(radioButton);
  });

  // 2. 初期表示
  $(".tabPanel").hide(); // 最初にすべてのタブを非表示にします
  $(".tabPanel").first().show(); // 最初のタブだけを表示します
  $(".radioList input").first().prop("checked", true); // 最初のラジオボタンを選択状態にします

  // 3. ラジオボタンクリックイベントの追加
  $('.radioList input[type="radio"]').click(function () {
    var index = $(this).parent().index(); // ラジオボタンのインデックスを取得します
    $(".tabPanel").hide(); // すべてのタブを非表示にします
    $(".tabPanel").eq(index).show(); // クリックしたラジオボタンに対応するタブを表示します
  });

  $("#top input[type=submit]").prop("disabled", true);
  $(".agreeCheck input").on("change", function (e) {
    if ($(this).prop("checked") == true) {
      $("input[type=submit]").prop("disabled", false);
    } else {
      $("input[type=submit]").prop("disabled", true);
    }
  });

  var headerHeight = $(".header").innerHeight();

  // $(window).scroll(function () {
  //   if ($(this).scrollTop() > headerHeight) {
  //     $(".pagetop").fadeIn();
  //   } else {
  //     $(".pagetop").fadeOut();
  //   }
  // });
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
// animateImages( )
// 機能  ：トップスライダーのアニメーション関数
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function animateImages(sliderClass) {
  var images = $(sliderClass + " .slideImages__image");
  var index = 0;

  var pager = $('<div class="pager"></div>');
  $(sliderClass).append(pager);

  images.each(function () {
    var dot = $('<div class="pager__dot"></div>');
    pager.append(dot);
  });

  var dots = $(sliderClass + " .pager__dot");

  function resetSlider() {
    images.each(function (i, image) {
      $(image).css({
        right: i === index ? 0 : "100%",
        zIndex: i === index ? 2 : 1,
      });
    });

    dots.each(function (i, dot) {
      $(dot).removeClass("current");
      if (i === index) {
        $(dot).addClass("current");
      }
    });
  }

  resetSlider();

  var interval = setInterval(animate, 5000);

  dots.on("click", function (e) {
    clearInterval(interval);
    images.stop(true, true); // Stop any ongoing animations

    var dotIndex = dots.index(e.target);

    images
      .eq(dotIndex)
      .css({ right: "-100%", zIndex: 2 })
      .animate({ right: 0 }, 1000);
    images
      .eq(index)
      .css({ right: 0, zIndex: 1 })
      .animate({ right: "100%" }, 1000);

    index = dotIndex;

    resetSlider();

    interval = setInterval(animate, 5000);
  });

  function animate() {
    images.stop(true, true); // Stop any ongoing animations

    var nextIndex = (index + 1) % images.length;

    images
      .eq(nextIndex)
      .css({ right: "-100%", zIndex: 2 })
      .animate({ right: 0 }, 1000);
    dots.eq(nextIndex).addClass("current");
    dots.not(":eq(" + nextIndex + ")").removeClass("current");

    images
      .eq(index)
      .css({ right: 0, zIndex: 1 })
      .animate({ right: "100%" }, 1000, function () {
        index = nextIndex;
      });
  }
}
