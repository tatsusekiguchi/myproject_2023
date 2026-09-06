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

  //ページ内リンクのスクロールアニメーション
  scrollAnim(".pagerLink a");

  //キービジュアルのスライダー設定
  keyvSlider();

  if ($(".topMain").length > 0) {
    $(".webgene-blog").addClass("swiper-wrapper");
    var topWorksSlide = new Swiper(".swiperContainer", {
      direction: "horizontal",
      loop: false,
      spaceBetween: 30,
      mousewheel: {
        invert: false,
        releaseOnEdges: true,
      },
      // slidesPerView: 4.82,
      slidesPerView: 3.5,
      speed: 500,
      breakpoints: {
        1200: {
          slidesPerView: 3,
        },
        960: {
          slidesPerView: 2,
          spaceBetween: 25,
        },
        650: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        480: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
      },
      navigation: {
        nextEl: ".swiper-next",
        prevEl: ".swiper-prev",
      },
    });
  }

  if ($(".caseMain .blogPanel--detail").length > 0) {
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
      slidesToShow: 6, //表示させるスライドの数
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
// scrollAnim( )
// 機能  ：ページ内リンクのスクロールアニメーション
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function scrollAnim(elem) {
  var speed = 1000;
  var NAV_ELEM = $(".header");

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

// TextTypingというクラス名がついている子要素（span）を表示から非表示にする定義
function TextTypingAnime() {
  $(".TextTyping").each(function () {
    var elemPos = $(this).offset().top - 50;
    var scroll = $(window).scrollTop();
    var windowHeight = $(window).height();
    var thisChild = "";
    if (scroll >= elemPos - windowHeight) {
      thisChild = $(this).children(); //spanタグを取得
      //spanタグの要素の１つ１つ処理を追加
      thisChild.each(function (i) {
        var time = 100;
        //時差で表示する為にdelayを指定しその時間後にfadeInで表示させる
        $(this)
          .delay(time * i)
          .fadeIn(time);
      });
    } else {
      thisChild = $(this).children();
      thisChild.each(function () {
        $(this).stop(); //delay処理を止める
        $(this).css("display", "none"); //spanタグ非表示
      });
    }
  });
}
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
var animeFlag = true;
$(window).on("load", function () {
  if ($(".TextTyping").length > 0) {
    var element = $(".TextTyping");
    element.each(function () {
      var text = $(this).html();
      var textbox = "";
      text.split("").forEach(function (t) {
        if (t !== " ") {
          textbox += "<span>" + t + "</span>";
        } else {
          textbox += t;
        }
      });
      $(this).html(textbox);
    });
    TextTypingAnime();
  }
  if ($(".randomBox").length > 0) {
    moveAnimation();
  }
});
$(window).scroll(function () {
  if ($(".TextTyping").length > 0) {
    TextTypingAnime();
  }
  if ($(".randomScroll").length > 0) {
    moveAnimation();
  }
});
