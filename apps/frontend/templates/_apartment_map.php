
<div id="map_over">
	<div id="map_canvas" style="width:<?php echo($width) ?>px; height:<?php echo($height) ?>px"></div>
</div>

<script type="text/javascript">

	function show_map() {
	  
		var map = new google.maps.Map(document.getElementById('map_canvas'),{
			mapTypeId: google.maps.MapTypeId.ROADMAP,
			center: new google.maps.LatLng(<?php echo($apartment->getGLat()) ?>, <?php echo($apartment->getGLon()) ?>),
			zoom: 10
		});

		var marker = new google.maps.Marker({
			position: new google.maps.LatLng(<?php echo($apartment->getGLat()) ?>, <?php echo($apartment->getGLon()) ?>),
			map: map,
			title: '<?php echo($apartment->getName()) ?>',
		});

		var listener = google.maps.event.addListener(map, "idle", function() { 
			if (map.getZoom() > 16) map.setZoom(16); 
			google.maps.event.removeListener(listener); 
		});

	}

	google.maps.event.addDomListener(window, 'load', show_map);

</script>


<?php // use_javascript('/frontend_dev.php/djs/global/g_map_single.js') ?>