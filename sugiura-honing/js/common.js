/* Javascript */

$(document).ready(function(){

	//画像の表示切り替え
	switchImg();

	//キービジュアルのスライダー設定
    keyvSlider();


    //スクロールアニメーション
    setScroll();

    //telリンクをスマートフォン端末以外では無効にする
    setTelLink();

    //ページトップへなめらかスクロール
    setPageTop();

    if($("#top").length){
    	$('#top #secBox01 .imgBox').slick({
		    arrows: false,
		    autoplay: true,
		    /* ポイントここから～ */
		    autoplaySpeed: 0,
		    cssEase: 'linear',
		    speed: 5000,
		    /* ～ここまで */
		    slidesToShow: 4,
		    slidesToScroll: 1,
		    infinite:true,
		    responsive: [ {
                breakpoint: 769,
                settings: 'unslick'
            } ]
		});

    	$(window).on('resize orientationchange', function() {
            $('#top #secBox01 .imgBox').slick('resize');
        });
		
    }

    //同意チェック
    $('#contact .checkPrivasy input').click(function(){
    if($("#contact .checkPrivasy input").prop('checked')) {
            $("#contact .btnConfirm input").prop('disabled', false);
        }
        else {
            $("#contact .btnConfirm input").prop('disabled', true);
        }
    });

});

//======================================================================================================
// switchImg( )
// 機能  ：画像の表示切り替え
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function switchImg() {
	$(window).on('load resize', function(){

		var w = $(window).width();
		var x = 769; //画像を差し替えを実行するウィンドウサイズ
		if (w <= x) {
			var before = '_pc',
			after = '_sp';
			replaceImg();
		} else {
			var before = '_sp',
			after = '_pc';
			replaceImg();
		}

		function replaceImg(){
			$('img[src*=_pc],img[src*=_sp]').each(function(){
				var img = $(this).attr('src').replace(before, after);
				if( $(this).attr('src').match(before) ) {
					$(this).attr('src', img);
				}
			});
		}

	});
}

//======================================================================================================
// keyvSlider( )
// 機能  ：キービジュアルのスライダー設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function keyvSlider(){
    if($(".kvWrap").length){

    var HEADER_ELEM = $('.kvWrap');
    var FADE_SPEED = 1500;
    var SWITCH_DELAY = 4000;

    // 要素作成
    if(!HEADER_ELEM.children().hasClass('kvBox')){
        var keyBoxElem = '';
        keyBoxElem += '<div class="kvBox">';
        keyBoxElem += '<div class="kvBg kv01"></div>';
        keyBoxElem += '<div class="kvBg kv02"></div>';
        keyBoxElem += '<div class="kvBg kv03"></div>';
		keyBoxElem += '<div class="kvBg kv04"></div>';
        keyBoxElem += '</div>';
        HEADER_ELEM.append(keyBoxElem);
    }

    var keyBox = '.kvBox';
    $(keyBox + ' .kvBg').css({opacity:'0'});
    $(keyBox + ' .kvBg:first').stop().animate({opacity: '1'}, FADE_SPEED);
    setInterval(function(){
        $(keyBox + ' .kvBg:first').animate({opacity: '0'}, FADE_SPEED).nextAll('.kvBg:first').animate({opacity: '1'}, FADE_SPEED).end().appendTo(keyBox);
    }, SWITCH_DELAY);
    }
}


//======================================================================================================
// setScroll( )
// 機能  ：スクロールアニメーション
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setScroll() {

	// スクロールのオフセット値
	var offsetY = -60;
	// スクロールにかかる時間
	var time = 500;
	// 切り替え幅
	var replaceWidth = 768;

	// ページ内リンクのみを取得
	$('.pageLink').click(function() {
		// 移動先となる要素を取得
		var target = $(this.hash);
		if (!target.length) return ;

		// 移動先となる値
		if(parseInt($(window).width()) >= replaceWidth) {
			var targetY = target.offset().top+offsetY;
		} else {
			var targetY = target.offset().top;
		}
		
		// スクロールアニメーション
		$('html,body').animate({scrollTop: targetY}, time, 'swing');
		// ハッシュ書き換えとく
		window.history.pushState(null, null, this.hash);
		// デフォルトの処理はキャンセル
		return false;
	});

}

//======================================================================================================
// setTelLink( )
// 機能  ：telリンクをスマートフォン端末以外では無効にする
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setTelLink() {
    var ua = navigator.userAgent.toLowerCase();
    var isMobile = /iphone/.test(ua)||/android(.+)?mobile/.test(ua);

    if (!isMobile) {
        $('a[href^="tel:"]').on('click', function(e) {
            e.preventDefault();
        });
    }
}

//======================================================================================================
// setPageTop( )
// 機能  ：ページトップへの動作設定
// 引数  ：なし
// 戻り値：なし
//======================================================================================================
function setPageTop() {

    var topBtn = $('#pagetop');
    topBtn.hide();

    //スクロールが100に達したらボタン表示
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            topBtn.fadeIn();
        } else {
            topBtn.fadeOut();
        }
    });

    //クリックしたらスクロールしてページトップへ
    topBtn.click(function () {
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });

}

