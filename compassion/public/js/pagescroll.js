/* Javascript */

$(window).on('load',function() {

    setTimeout(function(){
        // URLパラメータ文字列を取得する
        var param = location.search.substring(1);
        var headH,
            cls,
            pos;

        if(param == 'wallSec') {
            $('.sliderNav .li:nth-child(1)').trigger('click');
            return
        }

        if(param == 'roofSec') {
            $('.sliderNav .li:nth-child(2)').trigger('click');
            return
        }

        if(param == 'flowSec') {
            $('.sliderNav .li:nth-child(3)').trigger('click');
            return
        }

        if(param) {
            headH = $('.header').innerHeight();
            cls = '.' + param;
            pos = $(cls).offset().top - headH;
            $('body,html').stop().animate({
                scrollTop: pos
            }, 100);
        }
    },10);
    

});