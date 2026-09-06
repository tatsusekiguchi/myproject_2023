/* Javascript */

$(function () {
  $(".fullpage").fullpage({
    navigation: true,
    scrollOverflow: true,
  });

  $(".pagetop").click(function () {
    $.fn.fullpage.moveTo(1);
  });

  //キービジュアルのスライダー設定
  keyvSlider();
});

//======================================================================================================
// keyvSlider( )
// 機能  ：キービジュアルのスライダー設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function keyvSlider() {
  if ($(".topKv").length) {
    var HEADER_ELEM = $(".topKv");
    var FADE_SPEED = 1500;
    var SWITCH_DELAY = 5000;

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
  } else {
    var HEADER_ELEM = $(".topKv");

    // 要素作成
    if (!HEADER_ELEM.children().hasClass("kvBox")) {
      var keyBoxElem = "";
      keyBoxElem += '<div class="kvBox">';
      keyBoxElem += '<div class="kvBg kv01"></div>';
      keyBoxElem += "</div>";
      HEADER_ELEM.append(keyBoxElem);
    }
  }
}

// addClass時にイベントを起こす
(function () {
  // 元のmethodを保存
  var originalAddClassMethod = jQuery.fn.addClass;

  jQuery.fn.addClass = function () {
    // 元のmethodを実行
    var result = originalAddClassMethod.apply(this, arguments);

    // カスタムイベントを発火
    jQuery(this).trigger("cssClassAdd");

    return result;
  };
})();
