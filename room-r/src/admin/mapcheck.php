<?php

    $mode = "";
    
	$jusho = (isset($_GET['ju'])) ? $_GET['ju'] : '';
	if($jusho=="")
		$jusho = "愛知県名古屋市中区錦3";
    
    $lat = (isset($_GET['lat'])) ? $_GET['lat'] : '';
	if($lat==""){
		$lat = "35.169546";
		$mode = "geo";
	}

    $lng = (isset($_GET['lng'])) ? $_GET['lng'] : '';
	if($lng==""){
		$lng = "136.905279";
		$mode = "geo";
	}

?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no"/>
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<title></title>
<link href="http://code.google.com/apis/maps/documentation/javascript/examples/standard.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script type="text/javascript">
	var geocoder;
	var map;
	function initialize() {
		geocoder = new google.maps.Geocoder();
		var latlng = new google.maps.LatLng(<?php echo $lat;?>, <?php echo $lng;?>);
		var myOptions = {
		zoom: 16,
		center: latlng,
		mapTypeId: google.maps.MapTypeId.ROADMAP,
        streetViewControl: false
		}
		map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);

		var centerIcon = new google.maps.Marker({
			icon: image
		});
		var image = new google.maps.MarkerImage(
			'centerMark.gif'
			, new google.maps.Size(39, 39)
			, new google.maps.Point(0,0)
			, new google.maps.Point(19,19)
		);
		var centerIcon = new google.maps.Marker({
			position: latlng,
			icon: image,
			map: map
		});


		function drawMarker(centerLocation){
			centerIcon.setPosition(centerLocation);
		}

		var centerd = map.getCenter();
		document.frm.lat.value=centerd.lat().toFixed(6); 
		document.frm.lng.value=centerd.lng().toFixed(6); 

		google.maps.event.addListener(map, 'center_changed', function(event) {
			var center = map.getCenter();
			document.frm.lat.value=center.lat().toFixed(6); 
			document.frm.lng.value=center.lng().toFixed(6);
			document.frm.zoom.value=map.getZoom(); 
			drawMarker(map.getCenter());

		});
    
        google.maps.event.addListener(map, 'zoom_changed', function(event) {
            document.frm.zoom.value=map.getZoom(); 
        });

    
<?php 
		if($mode == "geo")
			echo 'codeAddress();';
?>

	}


	function codeAddress() {
		var address = document.getElementById("address").value;
		geocoder.geocode( { 'address': address}, function(results, status) {
			if (status == google.maps.GeocoderStatus.OK) {
				map.setCenter(results[0].geometry.location);
			} else {
				alert("Geocode was not successful for the following reason: " + status);
			}
		});
	}
</script>
</head>
<body onload="initialize()">
  <div>
	<form name="frm">
	<input id="address" type="text" size="30" value="<?php echo $jusho;?>">
	<input type="button" value="Geo" onclick="codeAddress()">

	緯度：<input type="text" name="lat" size="14">
	経度：<input type="text" name="lng" size="14">
    Zoom：<input type="text" name="zoom" size="8">
	<div style="padding: 1; display:none" id="msgPreview"> </div>
	</form>
  </div>
<div id="map_canvas" style="width:100%; height:95%; z-index:1"></div>
</body>
</html>

