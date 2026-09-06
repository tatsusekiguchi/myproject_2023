$(function(){
	$("a[href^=#]").on("click", function(){
		$("html, body").stop(true, false).animate({scrollTop: $($(this).attr("href")).offset().top}, 480, "swing");
		return false;
	});

	$("#header .js-menu-open").on("click", function(){
		$("#global-menu").show();
	});

	$("#global-menu .js-menu-close").on("click", function(){
		$("#global-menu").hide();
	});
});
