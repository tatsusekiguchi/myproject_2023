$(function(){
	$(".lcl-js-open-categories").on("click", function(){
		$(".lcl-js-categories").stop(true, false).slideToggle(320);
		$(this).toggleClass("lcl-btn-01--on");
	});
});
