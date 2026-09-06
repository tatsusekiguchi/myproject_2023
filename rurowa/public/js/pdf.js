$(function () {
  $(".pdfLink").each(function () {
    var pdfHref = $(this).attr("href");
    if (pdfHref == "") {
      $(".pdfArea").remove();
    }
  });
  if ($(".youtubeBox .videoBox:empty").length) {
    $(".youtubeBox").remove();
  }
});
