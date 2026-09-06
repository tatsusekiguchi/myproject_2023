jQuery(function ($) {
    var $main = 0;
    $(".button").click(function () {
        if ($main == 0) {
            $(".menu").slideDown();
            $(".submenu").fadeOut();
            $text = $(".subbutton").html("▼");
            $(".subbutton").val($text);
            $(".submenulist").slideUp();
            $main = 1;
            $sub = 0;
        } else {
            $(".menu").slideUp();
            $(".submenu").fadeIn();
            $(".submenulist").slideUp();
            $main = 0;
            $sub = 0;
        }
    });
})

jQuery(function ($) {
    var $sub = 0;
    $(".subbutton").click(function () {
        if ($sub == 0) {
            $(".submenulist").slideDown();
            $text = $(this).html("▲");
            $(".subbutton").val($text);
            $sub = 1;
        } else {
            $(".submenulist").slideUp();
            $text = $(this).html("▼");
            $(".subbutton").val($text);
            $sub = 0;
        }
    });
})