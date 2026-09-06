/*
 * jquery.Pc2Sp.js ver1.00
 * Copyright Kazuma Nishihata
 * MIT license
 */
;(function($){
	
	$.switchPc2Sp = function(options){
		
		options = $.extend({
			mode : "sp" , //sp or pc
			spLinkBlockInPc : "#spLinkBlockInPc" , 
			anchorToPcInSp : "#anchorToPcInSp" ,
			anchorToSpInPc : "#anchorToSpInPc" 
		},options);
		
		if(!localStorage)return this;
		
		$(function(){
			if( options.mode=="sp" 
				&& localStorage.getItem("pc_flag")=="true"
				&& /(Android|iPhone|iPod)/.test(navigator.userAgent)){
				
				location.href = $(options.anchorToPcInSp).attr("href");
				
			}else if( options.mode=="pc" 
				&& localStorage.getItem("pc_flag")!="true"
				&& /(Android|iPhone|iPod)/.test(navigator.userAgent)){
				
				location.href = $(options.anchorToSpInPc).attr("href");
				
			}else if( options.mode=="sp" 
				&& !/(Android|iPhone|iPod)/.test(navigator.userAgent)){
				
				location.href = $(options.anchorToPcInSp).attr("href");
				
			}else if( options.mode=="pc" 
				&& localStorage.getItem("pc_flag")=="true"
				&& /Android|iPhone|iPod/.test(navigator.userAgent)){
				
				$(spLinkBlockInPc).show();
				
			}
			
			if( options.mode=="sp"){
				
				$(options.anchorToPcInSp).click(function(){
					localStorage.setItem("pc_flag","true")
				});
				
			}else if( options.mode=="pc" && /Android|iPhone|iPod/.test(navigator.userAgent)){
				
				$(options.anchorToSpInPc).click(function(){
					localStorage.setItem("pc_flag","false")
				});
				
			}
		});
		
		return this;
	}
	
})(jQuery);