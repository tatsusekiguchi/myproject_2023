/* Javascript */

$(document).ready(function(){

    //スクロールアニメーション
    $('.slideList').infiniteslide({
        speed: 35, //速さ　単位はpx/秒です。
        pauseonhover: false, //マウスオーバーでストップ
        responsive: true, //子要素の幅を%で指定しているとき
        clone: 2 //子要素の複製回数
    });

});

