$(document).ready(function(){

	$('#book_1').click(function(){
	     	 
	     	$("#ajxloader").show();

		var_form_data = $('#book_form').serialize();
		
		$('#book_form_content').load('<?php echo url_for(@ajax_booking_check); ?>', {
			start_date: $("#start_date").val(),
          			apid: $("#apid").val(),
          			pax: $("#pax").val(),
         		 	days: $("#days").val()
       		});
		
		$("#book_form_content").empty();
	});
});