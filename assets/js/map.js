var CortravelsMap = {

  theMap: null,
  openInfoWindow: null,

  initialize: function() {
    var _this = this;
    var prevLat = null;
    var prevLng = null;
    var prevFlightpath = null;
    var prevType = "";


    this.theMap = new google.maps.Map(document.getElementById('map-canvas'), this.myOptions);

    $.each(mapContent[0], function(index, value){
      
      if (value.flightpath != null) {
        // console.log(value.title, value.lat, value.lng, value.flightpath, value.map_icon);
        _this.drawLine(value.flightpath, value.lat, value.lng, value.map_icon);
        prevLat = value.flightpath[(value.flightpath.length)-2];
        prevLng = value.flightpath[(value.flightpath.length)-1];
      } else {
        if (prevLat != null && prevLng != null) {
          // console.log(prevLat, prevLng, [value.lat, value.lng]);
          _this.drawLine([prevLat, prevLng], value.lat, value.lng, value.map_icon);
          prevLat = value.lat;
          prevLng = value.lng;
        }
      }
      
      prevFlightpath = (value.flightpath != null) ? value.flightpath : null;
      // prevType = value.map_icon;

      _this.setMarker(value.lat, value.lng, value.map_icon, value.title, value.content);
      
    });

    $('#map-canvas').on('click', 'a.keep-reading', function(e) {
      e.preventDefault();
      _gaq.push(['_trackEvent', 'Map', 'Keep Reading Click', _this.openInfoWindow.title]);
    });

  },

  myOptions: {
    zoom: 2,
    center: new google.maps.LatLng(40.385873, 20.471471),
    mapTypeId: google.maps.MapTypeId.ROADMAP,
    disableDefaultUI: true,
    scaleControl: true,
    panControl: true,
    zoomControl: true,
    styles: [{
        "stylers":[
          {"visibility":"off"}
        ]
      },
      {
        "featureType":"water",
        "stylers":[
          {"visibility":"on"},
          {"color":"#82A692"}
        ]
      },
      {
        "featureType":"landscape",
        "elementType":"geometry",
        "stylers":[
          {"visibility":"on"},
          {"color":"#f6e3bb",}
        ]
      },
      {
        "featureType": "administrative.country",
        "elementType": "geometry.stroke",
        "stylers": [
          {"color": "#f0d18e"},
          {"visibility": "on"},
          {"weight":1.5}
        ]
      },
      {
        "featureType": "administrative.country",
        "elementType": "labels.text",
        "stylers": [
          {"hue": "#F0D18E"},
          {"saturation": 1},
          {"lightness": 20},
          {"visibility": "on"}
        ]
      }
    ]
  },

  setMarker: function(lat, lng, mapIcon, title, content) {

    var _this = this;
    var theMap = this.theMap;
    var latlng = new google.maps.LatLng(lat, lng);

    var infowindow = new google.maps.InfoWindow({
      content: '<h2 class="entry-title">'+title+'</h2>' + content,
      title: title
    });

    var marker = new google.maps.Marker({
      position: latlng,
      map: this.theMap,
      icon: templateUrl + "/assets/img/map-icons/icon-"+mapIcon+".png",
      title: title
    });
    
    google.maps.event.addListener(marker, 'click', function() {
      _gaq.push(['_trackEvent', 'Map', 'Pin Click', infowindow.title]);
      if (_this.openInfoWindow != null) {
        _this.openInfoWindow.close();
      }
      infowindow.open(theMap,marker);
      theMap.panTo(marker.getPosition());
      _this.openInfoWindow = infowindow;
    });

  },

  drawLine: function(latlngs, lat2, lng2, mapIcon) {
    var theMap = this.theMap;
    
    var path = [];

    // path.push(new google.maps.LatLng(latlngs[0], latlngs[1]));
    // path.push(new google.maps.LatLng(lat2, lng2));

    var flightLine = {
      path: path,
      geodesic: true,
      strokeColor: '#CC614F',
      strokeOpacity: 0,
      strokeWeight: 2,
      icons: [{
        icon: {
          path: 'M 0,-1 0,1',
          strokeOpacity: 1,
          strokeWeight: 1.5,
          scale: 1},
        offset: '0',
        repeat: '10px'
      }]
    };

    var travelLine = {
      path: path,
      geodesic: false,
      strokeColor: '#CC614F',
      strokeOpacity: 1,
      strokeWeight: 1
    };


    var travelPath;

    for (var i=0; i<latlngs.length; i+=2) {
      // console.log(latlngs);
      var latlng = new google.maps.LatLng(latlngs[i], latlngs[i+1]);
      path.push(latlng);
    }

    if (latlngs.length > 2) {
      travelPath = new google.maps.Polyline(
        flightLine
      );
    } else {
      path.push(new google.maps.LatLng(lat2, lng2));
      travelPath = new google.maps.Polyline(
        travelLine
      );
    }

    

    travelPath.setMap(theMap);


  }

};

$(document).ready(function() {
  // console.log('ready');
  CortravelsMap.initialize();
});
