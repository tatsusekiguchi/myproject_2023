$(function () {
  $(".pdfLink").each(function () {
    var pdfHref = $(this).attr("href");
    if (pdfHref == "") {
      $(".pdfArea").remove();
    }
  });
});
