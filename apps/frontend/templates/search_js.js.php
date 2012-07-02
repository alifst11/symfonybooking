var cities = [
		"Split",
		"Omis",
		"Zagreb",
		"Zadar",
		"Dubrovnik",
		"Makarska"
	];

<?php $features = sfConfig::get('app_features_data_all'); ?>

var features = [
	 
	<?php for ($i=1; $i < count( $features  ); $i++):  ?>
	{ "value" : "<?php echo($features[$i]) ?>" , "id" : "<?php echo($i) ?>" },
	<?php endfor; ?>
	
	];
	

function scanResults(){
	
	var f_wants =  new Array();

	$("#results span").each(function () {
			
		f_wants.push($(this).find("a").val());
			
	 });

	return jQuery.unique( f_wants );	
}


$(document).ready(function() {

	$("#ajxloader").hide();

	$( "#city" ).autocomplete({ 
		source: cities
	});

    	// Datepickers
	$("#date_from, #date_to").datepicker({
    	
		dateFormat: "yy-mm-dd",
		minDate: "-1D", maxDate: "+11M",
		changeMonth: true

	 });


	// Ajax handler
	$('#search_submit').click(function(){
		     	 
		$("#ajxloader").show();
				
		$('#results_ajx').load('<?php echo url_for(@search_request); ?>', {
				date_from: 	$("#date_from").val(),
		          		date_to: 	$("#date_to").val(),
		          		city: 		$("#city").val(),
		          		features: 	scanResults()
		});
	 });


	// Autocomplete 
	$( "#f_want" ).autocomplete({
			
		source: features,
			
		//select handler
		select: function(e, ui) {

			//create formatted feature
			var feature = ui.item.value,
				
			span = $("<span>").text(feature).attr('id', 'src_chose'),
			 a = $("<a>").addClass("remove").attr({
					href: "javascript:",
					value: ui.item.id,
					title: "<?php echo('Remove') ?> " + feature
				}).text(" x ").appendTo(span);

			span.appendTo("#results");	 
		 	},

		 // Empty text box
		close: function() { 
			$("#f_want").val(null);
			scanResults();
		},
	});


	// Focus 'f_want' field
	$("#f_wants").click(function(){
		 $("#f_want").focus();
	 });


	//add handler for clicks on remove links
	$(".remove", document.getElementById("results")).live("click", function(){

		//remove clicked 
		$(this).parent().remove();

	 });

}); // DocReady End
