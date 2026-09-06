$(function(){
	$("#slide_nav").slider({
		"slides": ".slides .item",
		"prev": ".nav .prev a",
		"next": ".nav .next a",
		"interval": 6400,
		"shift": -115
	});

	$("#area_tab .tabs li > a").on("click", function(){
		var li = $(this).parent();
		li.toggleClass("on").siblings().removeClass("on");
		$("#area_tab .content_tab").addClass("dn").eq(li.index()).removeClass("dn");
	});

	$(window).on("scroll load",function(){
		if($(window).scrollTop() > 100){
			$(".inner01").stop(true,false).animate({"height":80});
			$(".inner01 .logo img").stop(true,false).animate({"height":50});
		}else{
			$(".inner01").stop(true,false).animate({"height":120});
			$(".inner01 .logo img").stop(true,false).animate({"height":97});
		}
	});
});
