/* Javascript */
$(function () {
  $(".btnConfirm input[type=submit]").prop("disabled", true);
  $(".agreeCheck input").on("change", function (e) {
    if ($(this).prop("checked") == true) {
      $(".btnConfirm input[type=submit]").prop("disabled", false);
    } else {
      $(".btnConfirm input[type=submit]").prop("disabled", true);
    }
  });

  // 郵便番号
  $(".zip").jpostal({
    postcode: [
      ".zip",
      //".zip1", //郵便番号上3ケタ
      //".zip2", //郵便番号下4ケタ
    ],
    address: {
      // "#pref": "%3", //都道府県
      // "#city": "%4%5", //市区町村 町域
      ".address01": "%3%4%5",
    },
  });

  $(".inputFile01 input[type=file]").on("change", function () {
    var file = $(this).prop("files")[0];
    $(".inputFile01 + .fileName").text(file.name);
  });
  $(".inputFile02 input[type=file]").on("change", function () {
    var file = $(this).prop("files")[0];
    $(".inputFile02 + .fileName").text(file.name);
  });
  $(".inputFile03 input[type=file]").on("change", function () {
    var file = $(this).prop("files")[0];
    $(".inputFile03 + .fileName").text(file.name);
  });
  $(".inputFile04 input[type=file]").on("change", function () {
    var file = $(this).prop("files")[0];
    $(".inputFile04 + .fileName").text(file.name);
  });
  $(".inputFile05 input[type=file]").on("change", function () {
    var file = $(this).prop("files")[0];
    $(".inputFile05 + .fileName").text(file.name);
  });
});

$(window).on("load", function () {
  setTimeout(function () {
    var headerHeight = $("header").innerHeight();
    var scrollToForm = false;

    $(".error em").each(function () {
      if ($(this).text() !== "") {
        scrollToForm = true;
        return false; // ループを中断
      }
    });

    if (scrollToForm) {
      var targetOffset = $(".contactForm").offset().top - headerHeight;

      $("html, body").animate(
        {
          scrollTop: targetOffset,
        },
        1000
      );
    }
  }, 500);
});
