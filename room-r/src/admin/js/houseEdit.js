function submitNoFile() {
  $('.class_photo').attr("disabled","disabled");
}

$(function() {
	$(".fileupload").on("dragover", function(){
		$(this).css({"opacity":0.7});
	});
	$(".fileupload").on("dragleave", function(){
		$(this).css({"opacity":1});
	});
	$(".class_photo").on('change', function(){
		var furl = "fileUpload.php?name=" + $(this).attr("title");
		var targetDiv = "text_" + $(this).attr("title") + "_c";
		$(this).upload(furl, '', function(res) {
			document.getElementById(targetDiv).innerHTML = res;
		}, 'html');
	});
	$(".class_photo_thumb").on('change', function() {
		var furl = "fileUpload.php?name=" + $(this).attr("title") + "&thumbflg=true";
		var targetDiv = "text_" + $(this).attr("title") + "_c_thumb";

		$(this).upload(furl, '', function(res) {
			if(res != false){
				alert("サムネイル画像を変更しました。");
				document.getElementById(targetDiv).innerHTML = res;
			}else{
				alert("※拡大画像を先にアップロードしてください");
				document.getElementById(targetDiv).innerHTML = "拡大画像を先にアップロードしてください";
			}
		}, 'html');
	});
});


$(function(){
	$(document).on("click",".del_photo", function() {
		if(window.confirm("本当に削除しますか？")){
			var fileno = $(this).attr("title");
			var id = $(this).attr("id");
			$.ajax({
				url: 'ajaxPhotoDel.php',
				type: 'POST',
				data :{
					"sessname":"r_photo",
					"no":fileno,
					"id": id
				},
				success: function( data ) {
					if(data == 1){
						alert("画像を削除しました");
						$(".confirm"+fileno).html("");
					}else{
						alert("削除に失敗しました");
					}
				},
				error: function( data ) {
					alert("削除に失敗しました");
				}
			});
		}
	});
});
