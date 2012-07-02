<div id="ajxloader"></div>

<div class="hero-unit">
	<h1> $this => booking != false;</h1>
	<p>Yet another web site about rentals booking ...</p>
	<p>
		<a href="#" class="btn btn-primary" id="find_location">
			<?php echo('Find my location & search') ?>
		</a>
		<a class="btn" id="show_text">
			<?php echo('Reset') ?>
		</a>
	</p>
</div>


<div class="row" id="home_content">
	
	<div class="span3">
		 <h4><?php echo( __('Top cities by Apartments') ) ?></h4><hr>
		 <?php foreach ($cities as $city): ?>
		 	<h1><?php  echo($city->count ) ?> <?php  echo(link_to($city->getName(), @apartments_city, array('id'=>$city->getId()), array() )) ?></h1>
		<?php endforeach; ?>
	</div>

	<div class="span5">
		<h4><?php echo( __('Latest added') ) ?></h4><hr>
		<?php  include_partial('public/apartment_list', array('apartments' => $apartments, 'show_city' => true)) ?>
	</div>
</div>

<div id="map_stuff">
	<div id="map_over">
		<div id="map-canvas" style="width:870px; height:300px"></div>
	</div>
	<div class="row">
		<br>
		<div class="span6">
			<div id="results"></div>
		</div>
		<div class="span3">
			<div id="infoPanel">
				<b>Status:</b><div id="markerStatus" style="float:right;">Drag magnifier to start your search</div> <hr>
				<b>Cordinates to here:</b> <div id="info"></div> <hr>
				<b>Closest matching address is:</b><div id="address" style="float:right;"></div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">

	var geocoder = new google.maps.Geocoder();
	var icon = 'http://cdn1.iconfinder.com/data/icons/pleasant/Search.png';

	function AjaxSearch(city_name){

		$("#ajxloader").show();

		$('#results').load('<?php echo url_for(@search_apartments); ?>', {
			city_name: city_name
       		});
	}

	// Update HTML field with formatted adress & call AJAX search with city name value as string.
	function geocodePosition(pos) {

		geocoder.geocode({

			latLng: pos

		      }, function(responses) {
			
			if (responses && responses.length > 0) {
			 	
			 	 // Updates HTML
			 	 updateMarkerAddress(responses[0].formatted_address);

			 	 // Gets the adress
				$.each(responses[0].address_components, function (i, address_component) {
				    
					if (address_component.types[0] == "locality") {
						// console.log(address_component['short_name']);   //  town name
						// console.log(address_component.short_name);
					         AjaxSearch(address_component.short_name);
						//  return false; // break 
				  	}

				    });

			} else {

			  updateMarkerAddress('Location cannot be found');
			}
		  });

	}

	function updateMarkerStatus(str) {
	  document.getElementById('markerStatus').innerHTML = str;
	}

	function updateMarkerPosition(latLng) {
	  document.getElementById('info').innerHTML = [
		latLng.lat(),
		latLng.lng()
	  ].join(', ');
	}

	function updateMarkerAddress(str) {
	  document.getElementById('address').innerHTML = str;
	}


	$(document).ready(function() {
		
		$('#map_stuff').hide();
		$("#ajxloader").hide();

		$('#show_text').click(function() {
			$('#home_content').fadeIn(600);
		});


		$('#find_location').click(function() { 
			
			// Is geolocation supported?
			if(navigator.geolocation) {
				
				// geolocation is successful ...
				function GeoSuccess(position) {
					
					var LatLng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
					
					var map = new google.maps.Map(
						document.getElementById('map-canvas'), {
							zoom: 10,
							center: LatLng,
							mapTypeId: google.maps.MapTypeId.ROADMAP
						}
					);
					
					var marker = new google.maps.Marker({
						map: map,
						position: LatLng,
						draggable: true,
						icon: icon,
						title: 'Drag to search'
					});

					// Add circle
					var circle = new google.maps.Circle({
								map: map,
								radius: 6500 // 4 km
						 });
					circle.bindTo('center', marker, 'position');
					
					  // Update position info.
					  updateMarkerPosition(LatLng);
					  geocodePosition(LatLng);

					  // Add listeners
					  google.maps.event.addListener(marker, 'dragstart', function() {
						updateMarkerAddress('Waiting for location chose');
					  });
					  
					  google.maps.event.addListener(marker, 'drag', function() {
						updateMarkerStatus('Waiting for location chose');
						updateMarkerPosition(marker.getPosition());
					  });
					  
					  google.maps.event.addListener(marker, 'dragend', function() {
						updateMarkerStatus('Showing results');
						geocodePosition(marker.getPosition());
					  });

					$('#home_content').fadeOut(400);
					$('#map_stuff').fadeIn(1000);
					
				}
				
				// geolocation fails
				function GeoFailure() {
					alert('There was some epic error.');
				}
				
				// Get first user location
				navigator.geolocation.getCurrentPosition(GeoSuccess, GeoFailure);
				
			}
			
		});
		
	});
	
</script>