$(function(){
	$(".lcl-js-check-area").on("change", function(){
		var cbox_val = $(this).prop("checked");
		var parent = $(this).parents(".lcl-search-area-list__item-label");
		if( !cbox_val ){
			parent.removeClass("lcl-search-area-list__item-label--on");
		}else{
			parent.addClass("lcl-search-area-list__item-label--on");
		}
	});
});
