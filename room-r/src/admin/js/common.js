function coloring_row(){
	$("#area_list .style_l tr:nth-child(even), .area_list .style_l tr:nth-child(even)").addClass('bg');
}

$(function(){
	$("a[href^=#]").on("click", function(){
		$("html,body").stop(true, false).animate({scrollTop: $($(this).attr("href")).offset().top}, 480, "swing");
		return false;
	});

	$(".have_on").on({"mouseenter": function(){
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

	$(".have_effect").on({"mouseenter": function(){
		$(this).stop(true, false).animate({'opacity':'0.5'}, 160, "swing");
	}, "mouseleave": function(){
		$(this).stop(true, false).animate({'opacity':'1'}, 160, "swing");
	}});

	coloring_row();

	/** /
	$("#area_list .style_l tr:not(.no_menu), .area_list .style_l tr:not(.no_menu)").on({'mouseenter': function(){
		var td_height = $(this).height();
		$(this).find('.num').stop(true, false).height(td_height).animate({'padding-bottom':'44px'}, 160, "swing", function(){
			$(this).find('.hidden').stop(true, false).fadeIn(160);
		});
	}, 'mouseleave': function(){
		var num_height = $(this).find('.num > div:first-child').height();
		$(this).find('.num .hidden').stop(true, false).fadeOut(160, function(){
			$(this).parent('.num').stop(true, false).height(num_height).animate({'padding-bottom':'0'}, 160, "swing");
		});
	}});
	/*/
	$("#area_list .style_l tr:not(.no_menu) td, .area_list .style_l tr:not(.no_menu) td").addClass("clickable").on('click', function(e){
		if( e.target.tagName=='DIV' || e.target.tagName=='TD' ){
			if( $(this).hasClass("clickable") ){
				$(this).parents('tr').find('td').removeClass('clickable');
				var td_height = $(this).height();
				$(this).parent('tr').find('.num').height(td_height).stop(true, false).animate({'padding-bottom':'44px'}, 160, "swing", function(){
					$(this).find('.hidden').stop(true, false).fadeIn(160);
				});
			}
		}
	});

	$("#area_list .style_l tr:not(.no_menu) .btn_slideup, .area_list .style_l tr:not(.no_menu) .btn_slideup").on('click', function(){
		var num_height = $(this).find('.num > div:first-child').height();
		$(this).parents("tr").find('.num .hidden').stop(true, false).fadeOut(160, function(){
			$(this).parent('.num').stop(true, false).height(num_height).animate({'padding-bottom':'0'}, 160, "swing", function(){
				$(this).parents('tr').find('td').addClass('clickable');
			});
		});
	});
	//*/
});