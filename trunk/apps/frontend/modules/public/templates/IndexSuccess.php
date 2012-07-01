<div id="ajxloader"></div>

<div class="hero-unit">
	<h1> $this => return false;</h1>
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

	<div id="map-canvas" style="width:870px; height:300px"></div>

	<div id="infoPanel">
		<b>Status</b>
		<div id="markerStatus"><i>Click & drag marker to start your search</i></div>
		<b>Current position:</b>
		<div id="info"></div>
		<b>Closest matching address:</b>
		<div id="address"></div>
	</div>

</div>

<div id="results"></div>

<script type="text/javascript">

	var geocoder = new google.maps.Geocoder();


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
				    if (address_component.types[0] == "locality") // locality type ?!
				         console.log(address_component.long_name);   //  town name
				         AjaxSearch(address_component.long_name);
				        //return false; // break 
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
						title: 'Here you are'
					});

					// Add circle
					var circle = new google.maps.Circle({
								map: map,
								radius: 5000 // 4 km
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
					alert('There was some error.');
				}
				
				// Get first user location
				navigator.geolocation.getCurrentPosition(GeoSuccess, GeoFailure);
				
			}
			
		});
		
	});
	
</script>






































<script type="text/javascript">
/*
			$(document).ready(function() {

				if(!$('#cities_c').tagcanvas({
					textColour: '#ff0000',
					outlineColour: '#ffffff',
					reverse: true,
					textColour: null,
					zoomMax: 1.2,
					zoomMin: 0.8,
					depth: 0.9,
					maxSpeed: 0.03
				},'tags')) {
					// something went wrong, hide the canvas container
					$('#myCanvasContainer').hide();
				}
		 
			}); */
		</script>

 <!--<div id="myCanvasContainer">
			<canvas width="500" height="500" id="cities_c">
				<p>Anything in here will be replaced on browsers that support the canvas element</p>
			</canvas>
		</div>
		<div id="tags">
			<ul>
				<?php // foreach ($cities as $city): ?>
				<li><?php // echo(link_to($city->getName(), @apartments_city, array('id'=>$city->getId()), array('style'=>"font-size: 25.8ex") )) ?></li>
				<?php // endforeach; ?>
			</ul>
		</div> -->
