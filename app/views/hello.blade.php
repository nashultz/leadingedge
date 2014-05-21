<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>
	<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAEBmha5MZ-DEIYcTpyNmdPi5fbQZIyJBU&sensor=true">
    </script>

    <script type="text/javascript" src="{{ URL::to('markerclusterer.js') }}">

    </script>

<script>

function initialize() {
  var mapOptions = {
    zoom: 8,
    center: new google.maps.LatLng(30.448016,-97.756992)
  };

  var map = new google.maps.Map(document.getElementById('map-canvas'),
      mapOptions);

  var marker1 = new google.maps.Marker({
    position: new google.maps.LatLng(30.448016,-97.756992),
    title:"Hello World!",
    animation: google.maps.Animation.DROP,
	});

    var marker2 = new google.maps.Marker({
    position: new google.maps.LatLng(30.548016,-97.756992),
    title:"Hello World!",
    animation: google.maps.Animation.DROP,
	});

	var markers = [ marker1, marker2 ];

var mcOptions = {gridSize: 50, maxZoom: 15};
var mc = new MarkerClusterer(map, markers, mcOptions);
}

</script>

</head>
<body onload="initialize()">
	<div id="map-canvas" style="width: 500px; height: 500px; margin: 0 auto;"></div>
</body>



</html>
