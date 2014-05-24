 var styles = [[{
  url: '../images/people35.png',
  width: 35,
  height: 35,
  textColor: '#ff00ff',
  textSize: 10
}, {
  url: '../images/people45.png',
  width: 45,
  height: 45,
  textColor: '#ff0000',
  textSize: 11
}, {
  url: '../images/people55.png',
  width: 55,
  height: 55,
  textColor: '#ffffff',
  textSize: 12
}], [{
  url: '../images/conv30.png',
  width: 30,
  height: 27,
  anchorText: [-3, 0],
  anchorIcon: [27, 28],
  textColor: '#ff00ff',
  textSize: 10
}, {
  url: '../images/conv40.png',
  width: 40,
  height: 36,
  anchorText: [-4, 0],
  anchorIcon: [36, 37],
  textColor: '#ff0000',
  textSize: 11
}, {
  url: '../images/conv50.png',
  width: 50,
  height: 45,
  anchorText: [-5, 0],
  anchorIcon: [45, 46],
  textColor: '#0000ff',
  textSize: 12
}], [{
  url: '../images/heart30.png',
  width: 30,
  height: 26,
  anchorIcon: [26, 15],
  textColor: '#ff00ff',
  textSize: 10
}, {
  url: '../images/heart40.png',
  width: 40,
  height: 35,
  anchorIcon: [35, 20],
  textColor: '#ff0000',
  textSize: 11
}, {
  url: '../images/heart50.png',
  width: 50,
  height: 44,
  anchorIcon: [44, 25],
  textSize: 12
}]];

var markerClusterer = null;
var map = null;
var markers = [];
var imageUrl = 'http://chart.apis.google.com/chart?cht=mm&chs=24x32&' +
'chco=FFFFFF,008CFF,000000&ext=.png';

google.maps.event.addDomListener(window, 'load', initialize);

function refreshMap() {

  var response = $.ajax({

    type: 'GET',
    url: '/builders/load'

  });

  response.success(function(resp) {

    doMap(resp);

  });        

}

function doMap(resp)
{

    $.each(markers, function(index, value) {

      value.setMap(null);

    });

    markers.length = 0;
    
    var myJson = JSON.parse(resp);

    var infowindow = new InfoBox();

    var markerImage = new google.maps.MarkerImage(imageUrl,
      new google.maps.Size(24, 32));

    for (var i = 0; i < myJson.count; ++i) {

      if (typeof myJson.builders[i] !== 'undefined') 
      {
        var latLng = new google.maps.LatLng(myJson.builders[i].neighborhood.latitude,
          myJson.builders[i].neighborhood.longitude);

        var marker = new google.maps.Marker({
         position: latLng,
         icon: markerImage,
         nid: myJson.builders[i].neighborhood.id
       });

        google.maps.event.addListener(marker, 'click', function(event) {
          var lat = this.position.lat();
          var lng = this.position.lng();

          infowindow.setPosition(this.position);
          infowindow.close();

          var response = $.ajax({

            type: 'GET',
            url: '/neighborhood/getBuilders?id=' + this['nid']
          });

          response.success(function(resp) {
            infowindow.setOptions({ disableAutoPan: true });
            infowindow.setContent(resp);
            infowindow.open(map);
          });

        });                  

        markers.push(marker);
        marker.setMap(map);
      }
    }  
}

function initialize() {
  map = new google.maps.Map(document.getElementById('map'), {
    zoom: 10,
    zoomControl: true,
    scaleControl: true,
    scrollwheel: false,
    disableDoubleClickZoom: true,
    center: new google.maps.LatLng(30.267580077052116, -97.74299494922161),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });

  refreshMap();
}

function clearClusters(e) {
  e.preventDefault();
  e.stopPropagation();
  markerClusterer.clearMarkers();
}