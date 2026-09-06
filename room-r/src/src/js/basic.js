$(function(){
	$("a[href^=#]").on("click", function(){
		$("html, body").stop(true, false).animate({scrollTop: $($(this).attr("href")).offset().top}, 480, "swing");
		return false;
	});

	$(".has_on").on({"mouseenter": function(){
		var src = $(this).attr("src");
		src = src.replace('.png', '_on.png');
		src = src.replace('.jpg', '_on.jpg');
		src = src.replace('.gif', '_on.gif');
		$(this).attr("src", src);
	}, "mouseleave": function(){
		var src = $(this).attr("src");
		src = src.replace(/_on/g, '');
		$(this).attr("src", src);
	}});

	$(".fade_on_hover").on({"mouseenter": function(){
		if(!$(this).parent().hasClass("disabled")){
			$(this).stop(true, false).animate({'opacity':'0.5'}, 160, "swing");
		}
	}, "mouseleave": function(){
		if(!$(this).parent().hasClass("disabled")){
			$(this).stop(true, false).animate({'opacity':'1'}, 160, "swing");
		}
	}});
	$(window).on("scroll",function(){
		var st = $(window).scrollTop();
		if(st > 200){
			if(parseInt($("#side_bnr").css("right")) == -80){
				$("#side_bnr").stop(true,false).animate({"right":0},250);
			}
		}else{
			if(parseInt($("#side_bnr").css("right")) == 0){
				$("#side_bnr").stop(true,false).animate({"right":-80},250);
			}
		}
	});
	$(".list-bukkens > li").autoHeight({column:4});
});
