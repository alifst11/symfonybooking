
function show_map() {
  
    var map2 = new google.maps.Map(document.getElementById('map_home'),{

    mapTypeId: google.maps.MapTypeId.ROADMAP,
    center: new google.maps.LatLng(43.514697, 16.467133),
    zoom: 10

    });

var marker = new google.maps.Marker({
   position: new google.maps.LatLng(43.514697, 16.467133),
   map: map2,
   title: 'Apartman',
	  });


  var listener = google.maps.event.addListener(map2, "idle", function() { 
	   if (map2.getZoom() > 16) map2.setZoom(16); 
	      google.maps.event.removeListener(listener); 
	});


}


google.maps.event.addDomListener(window, 'load', show_map);

