$(function(){
	if($("#bukken_slide .item").length > 3){
		$("#bukken_img .navigation .prev a,#bukken_img .navigation .next a").removeClass("disabled");
		$("#bukken_img .navigation").slider({
			"slides": "#bukken_slide .item",
			"prev": ".prev a",
			"next": ".next a",
			"interval": 0,
			"shift": -88.5
		});
	}
	if($("#house_slide .item").length > 6 ){
		$("#house_img .navigation .prev a,#house_img .navigation .next a").removeClass("disabled");
		$("#house_img .navigation").slider({
			"slides": "#house_slide .item",
			"prev": ".prev a",
			"next": ".next a",
			"interval": 0,
			"shift": -224
		});
	}
	$(document).on("mouseenter", ".slide a", function(){
		$($(this).data("target")).children("img").attr("src",$(this).attr("href"));
	});
	$(document).on("click", ".slide a", function(){ return false; });

});