$(document).ready(function () {

    var regexp = /^[-a-z0-9~!$%^&*_=+}{\'?]+(\.[-a-z0-9~!$%^&*_=+}{\'?]+)*@([a-zA-Z0-9_-])+\.([a-zA-Z0-9\._-]+)+$/;

    $(document).on('keydown', 'input[name="tel"]', function(e){
        let k = e.keyCode;
        let str = String.fromCharCode(k);
        if(!(str.match(/[0-9]/) || (37 <= k && k <= 40) || k === 8 || k === 46)){
          return false;
        }
    });
    $(document).on('keyup', 'input[name="tel"]', function(e){
        this.value = this.value.replace(/[^0-9]+/i,'');
    });
    
    $(document).on('blur', 'input[name="tel"]',function(){
        this.value = this.value.replace(/[^0-9]+/i,'');
    });

    $(document).on("keyup", 'input[name="mail"],input[name="mailConfirm"]', function(){
        let str = $(this).val()
        str = str.replace( /[^!-~]/g , "" );
        $(this).val(str);
    });

    $(document).on("blur", 'input[name="mail"],input[name="mailConfirm"]', function(){
        let str = $(this).val()
        str = str.replace( /[^!-~]/g , "" );
        $(this).val(str);
    });

    // 郵便番号
    $('.zip1').jpostal({
        postcode : [
            '.zip1', //郵便番号上3ケタ
            '.zip2'  //郵便番号下4ケタ
        ],
        address : {
            // '#pref'  : '%3', //都道府県
            // '#city'  : '%4%5' //市区町村 町域
            '.address01'  : '%3%4%5'
        }
    });

    $('button[type=submit]').prop('disabled',true);

    $('.agreeCheck input').on('change', function (e) { 
        if ($(this).prop("checked") == true) {
            $('button[type=submit]').prop('disabled',false);
        }
        else {
            $('button[type=submit]').prop('disabled',true);
        }
    });

    $('form').on('submit', function (e) {
        e.preventDefault();
    });

    $('button[type=submit]').on('click', function (e) {
        e.preventDefault();
        var email = $('input[name="mail"]').val();
        var formDataArr = $('form').serializeArray();
        var formData = new FormData();
        formData.append('formtype', $('form').data('formtype') ? $('form').data('formtype') : "")
        if (formDataArr.length > 0) {
            formDataArr.map(function (item) {
                formData.append(item.name, item.value)
                if ($("[name='" + item.name + "']").data('displaynameattr')) {
                    formData.append('display_name__' + item.name, $("[name='" + item.name + "']").data('displaynameattr'))
                }
            })

            if(!$('input[name="name"]').val()) {
                alert('お名前を入力してください');
                return false;
            }
            if(!$('input[name="kana"]').val()) {
                alert('ふりがなを入力してください');
                return false;
            }
            if(!$('input[name="company"]').val()) {
                alert('会社名・団体名を入力してください');
                return false;
            }
            if(!$('input[name="postal_01"]').val()) {
                alert('郵便番号を入力してください');
                return false;
            }
            if(!$('input[name="postal_02"]').val()) {
                alert('郵便番号を入力してください');
                return false;
            }
            if(!$('input[name="address01"]').val()) {
                alert('住所を入力してください');
                return false;
            }
            if(!$('input[name="tel"]').val()) {
                alert('お電話番号を入力してください');
                return false;
            }
            if(!$('input[name="mail"]').val()) {
                alert('メールアドレスを入力してください');
                return false;
            }
            if(!regexp.test(email)) {
                alert('正しいメールアドレスではないようです。再度ご入力ください。');
                return false;
            }
            if(!$('input[name="mailConfirm"]').val()) {
                alert('メールアドレス（確認用）を入力してください');
                return false;
            }
            if($('input[name="mail"]').val() != $('input[name="mailConfirm"]').val()) {
                alert('入力したメールアドレスが一致しません');
                return false;
            }
            
            $.ajax({
                type: 'POST',
                url: '/ajax/contact',
                data: formData,
                timeout: 15000, // タイムアウト：15秒
                dataType: 'json',
                processData: false,
                contentType: false
            }).done(function (res) {
                $('.form')[0].reset();
                //alert("送信完了しました。");
                window.location.href = "contactComplete";
            }).fail(function () {
                alert("エラーが発生しました。");
            });

        } else {
            alert("送信に失敗しました");
        }
    })
})