/* Javascript */

$(window).on("load", function () {
  setTimeout(function () {
    // URLパラメータ文字列を取得する
    var param = location.search.substring(1);
    var headH, cls, pos;

    if (param) {
      headH = $(".header").innerHeight();
      cls = "#" + param;
      pos = $(cls).offset().top - headH;
      $("body,html").stop().animate(
        {
          scrollTop: pos,
        },
        100
      );
    }
  }, 100);
});
