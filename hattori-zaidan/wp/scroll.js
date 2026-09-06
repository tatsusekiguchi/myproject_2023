jQuery(function ($) {
  if ($("#top").length > 0) {
    var posy = $(".mw_wp_form").offset().top;
    posy = posy + parseInt(mwform_scroll.offset);
    $(window).scrollTop(posy);
  }
});
