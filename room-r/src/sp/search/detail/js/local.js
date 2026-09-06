$(function(){
	$(".lcl-photos__thumbnails a").on("click", function(){
		$(".lcl-photos__display img").fadeTo(0, 0).attr("src", $(this).data("photo")).fadeTo(240, 1);
	});

	$(".lcl-slide").slider({
		"slides": ".lcl-slide__slides-item",
		"prev": ".lcl-slide__controllers-prev a",
		"next": ".lcl-slide__controllers-next a"
	});

	$(".lcl-js-btn-madori").on("click", function(){
		if( $(this).hasClass("lcl-js-btn-madori--on") ){
			$(this).removeClass("lcl-js-btn-madori--on").css("background-image", "url(" + $(this).data("off") + ")");
			$(".lcl-js-madori").stop(true, false).slideUp(320);
		}else{
			$(this).addClass("lcl-js-btn-madori--on").css("background-image", "url(" + $(this).data("on") + ")");
			$(".lcl-js-madori").stop(true, false).slideDown(320);
		}
	});

	// 物件スライド
	if($(".lcl-photos__thumbnails-item").length > 3){
		var current = 0;
		var ph = $(".lcl-photos__thumbnails-item").eq(0).outerHeight(true);
		var slide = $(".lcl-photos__thumbnails");
		var move_photo = function(d){
			direction = d;
			if(d < 0){
				// 上に動く
				slide.stop(true,false).animate({"top":-ph},250,function(){
					$("li:first-child",slide).remove().clone(true).appendTo(slide);
					slide.css({"top":0});
				});
			}else{
				// 下に動く
				$("li:last-child",slide).remove().clone(true).prependTo(slide);
				slide.css({"top":-ph});
				slide.stop(true,false).animate({"top":0},250);
			}
		}
		$(".lcl-photos .next").on("click",function(){
			move_photo(1);
		});
		$(".lcl-photos .prev").on("click",function(){
			move_photo(-1);
		});
	}
});
