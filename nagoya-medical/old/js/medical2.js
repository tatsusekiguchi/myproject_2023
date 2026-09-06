<!--
	function resizeIframe(ID,NAME) {
		var app = navigator.appName.charAt(0);
		if(navigator.userAgent.indexOf('Safari') != -1) {
			document.getElementById(ID).height = parent.frames[NAME].document.body.scrollHeight;
		}else if (app == "N") {
			document.getElementById(ID).height = parent.frames[NAME].document.height +1 + "px";
		}
		else {
			document.getElementById(ID).height = parent.frames[NAME].document.body.scrollHeight + 1 + "px";
		}
	}
-->