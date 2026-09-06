$(function(){
	$(".lcl-js-open-conditions").on("click", function(){
		$(".lcl-js-conditions").stop(true, false).slideToggle(320);
		$(this).toggleClass("lcl-btn-01--on");
	});
});
