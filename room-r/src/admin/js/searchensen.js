$(function(){
	// 沿線データ取得
	/*
	jQuery.ajax({
		url : '../ajax/ajaxEnsen.php',
		dataType : 'json',
		type: 'POST',
		success: function(data){
				$(".searchEnsen").html("");
				for(var i in data){
					$(".searchEnsen").append('<option value="'+i+'">'+data[i]+'</option>');
				}
			},
		error: function(){
				alert("沿線データ取得に失敗しました");
			}
	});*/

	// 沿線増やすよ
	var ensenNo = 0;
	$("#ensenAddBtn").on('click', function(){
		ensenNo = $(".searchEnsen:last").attr("title");
		// 沿線データ取得
		jQuery.ajax({
			url: '../ajax/ajaxEnsen.php',
			dataType: 'json',
			type: 'POST',
			success: function(data){
				ensenNo++;
				var optionData = "";
				for(var i in data){
					optionData += '<option value="'+i+'">'+data[i]+'</option>';
				}
				$("#ensenBox").append('<div><select name="searchEnsen['+ensenNo+']" title="'+ensenNo+'" class="searchEnsen">'+optionData+'</select>&nbsp;<select name="searchStation['+ensenNo+']"><option value=""></option></select></div>');
				/*$(".searchEnsen").html("");
				for(var i in data){
					$(".searchEnsen").append('<option value="'+i+'">'+data[i]+'</option>');
				}*/
			},
			error: function(){
				alert("沿線データ取得に失敗しました");
			}
		});
	});

	$("#ensenBox").on('change', '.searchEnsen', function(){
		var no = $(this).val();
		thisDom = $(this);
		if(no !== "" && no !== "0"){
			ajax = jQuery.ajax({
				url: '../ajax/ajaxStation.php',
				dataType: 'json',
				type: 'POST',
				data: {"no": no},
				success: function(data){
					$(thisDom).next().html("");
					for(var i in data){
						$(thisDom).next().append('<option value="'+data[i]["id"]+'">'+data[i]["val"]+'</option>');
					}
				},
				error: function(){
					alert("沿線データ取得に失敗しました");
				}
			});
		}else{
			$(thisDom).next().html('<option value=""></option>');
		}
	});

	// 検索表示非表示
	$("#searchShow").click(function(){
		if($("tr.hideSearchArea").css("display") != "none"){
			$("tr.hideSearchArea").hide();
			$(this).html("検索条件を表示");
		}else if($("tr.hideSearchArea").css("display") == "none"){
			$("tr.hideSearchArea").show();
			$(this).html("検索条件を隠す");
		}

	});
});
