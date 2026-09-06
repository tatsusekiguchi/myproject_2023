/*
	※改変しました

	Slider v1.0.1

	Copyright (c) 2015 Hiroyuki Suzuki - http://a-hsm.com/

	Released under the MIT license - http://opensource.org/licenses/MIT
*/
(function($){
	$.fn.slider = function(options){
		if( this.length == 0 ){ return this;}
		if( this.length > 1 ){
			this.each(function(){
				$(this).slider(options);
			});
			return this;
		}

		var settings = $.extend({
			"start": 0,// 開始スライド
			"slides": "",// スライド要素
			"navs": null,// ナビゲーションボタン
			"prev": null,// 戻るボタン
			"next": null,// 進むボタン
			"speed": 320,// アニメーションのスピード
			"interval": 6400,// 自動再生の間隔
			"shift": 0// スライド位置のずらし幅(水平方向)
		}, options);

		var elm = this;
		var current = settings.start;
		var slides = this.find(settings.slides).wrapAll("<div></div>");
		var navs = ( settings.navs == null ) ? null : this.find(settings.navs);
		var prev = ( settings.prev == null ) ? null : this.find(settings.prev);
		var next = ( settings.next == null ) ? null : this.find(settings.next);
		var board = slides.eq(0).parent();
		var lock = {
			"nav": false,
			"animate": false,
			"touch": false
		};

		if( this.css("position") == "static" ){ this.css("position", "relative");}
		slides.css({"position": "absolute", "top": "0"});
		var slide_width = slides.eq(0).innerWidth();
		board.css({"position": "absolute", "left": "50%"});

		var animate = function(destination){
			if( destination == current ){ return false;}
			lock.animate = true;
			var distance = -1 * get_difference(destination, current) * slide_width;
			board.stop(true, false).animate({"margin-left": parseInt(board.css("margin-left")) + distance + "px"}, settings.speed, function(){
				lock.animate = false;
				set(destination);
			});
		}

		var set = function(index){
			board.empty();
			board.css({"margin-left": (slides.length * 2 + 1) * slide_width / -2 + "px"});
			slides.removeClass("current").eq(index).addClass("current");
			if( navs !== null ){ navs.removeClass("current").eq(index).addClass("current");}
			for(var i = index - slides.length; i <= index + slides.length; i++){
				slides.eq(get_index(i)).clone(true).appendTo(board).css({"left": (i - index + slides.length) * slide_width + settings.shift + "px"});
			}
			current = index;
		}

		var get_difference = function(destination, current){
			var result = destination - current;
			if( Math.abs(result) > Math.floor(slides.length / 2) ){
				result = result - (result / Math.abs(result) * slides.length);
			}
			return result;
		}

		var get_index = function(index){
			var result = index;
			while( result < 0 || result > slides.length - 1 ){
				result = result - (result / Math.abs(result) * slides.length);
			}
			return result;
		}

		set(current);

		if( navs !== null ){
			for(var i = 0; i < slides.length; i++){
				(function(i){
					navs.eq(i).on("click", function(){
						if( lock.animate ){ return false;}
						animate(i);
						lock.nav = true;
					});
				})(i);
			}
		}

		if( prev !== null && next !== null ){
			prev.on("click", function(){
				if( lock.animate ){ return false;}
				animate(get_index(current - 1));
				lock.nav = true;
			});

			next.on("click", function(){
				if( lock.animate ){ return false;}
				animate(get_index(current + 1));
				lock.nav = true;
			});
		}

		if( settings.interval ){
			setInterval(function(){
				if( lock.touch ){ return false;}
				if( !lock.nav && !lock.animate ){
					animate(get_index(current + 1));
				}
				lock.nav = false;
			}, settings.interval);
		}
/*
		var touch_start = 0;
		var board_left = 0;

		board.on({"touchstart mousedown": function(e){
			if( lock.animate ){ return false;}
			e.preventDefault();
			lock.touch = true;
			lock.nav = true;
			touch_start = ( typeof e.originalEvent.changedTouches != "undefined" ) ? e.originalEvent.changedTouches[0].pageX : e.pageX;
			board_left = $(this).parent().width() / 2;

		}, "touchmove mousemove": function(e){
			if( !lock.touch || lock.animate ){ return false;}
			e.preventDefault();
			var x = ( typeof e.originalEvent.changedTouches != "undefined" ) ? e.originalEvent.changedTouches[0].pageX : e.pageX;
			$(this).css("left", board_left + x - touch_start);

		}, "touchend mouseup": function(e){
			if( !lock.touch || lock.animate ){ return false;}
			e.preventDefault();
			var x = ( typeof e.originalEvent.changedTouches != "undefined" ) ? e.originalEvent.changedTouches[0].pageX : e.pageX;
			var difference = x - touch_start;
			var distance  = (slide_width - Math.abs(difference % slide_width));

			if( Math.abs(difference) < slide_width / 4 ){
				lock.animate = true;
				$(this).stop(true, false).animate({"left": board_left + "px"}, distance / slide_width * settings.speed, function(){
					lock.animate = false;
					lock.touch = false;
				});

			} else {
				lock.animate = true;
				var g = ( difference > 0 ) ? Math.ceil(difference / slide_width) : Math.floor(difference / slide_width);
				var destination = get_index(current - g);
				$(this).stop(true, false).animate({"left": board_left + difference + (distance * difference / Math.abs(difference)) + "px"}, distance / slide_width * settings.speed, function(){
					$(this).css("left", board_left + "px");
					set(destination);
					lock.animate = false;
					lock.touch = false;
				});
				if( navs !== null ){ navs.removeClass("on").eq(destination).addClass("on");}
				current = destination;
			}
		}});
*/
		return this;
	}
})(jQuery);
