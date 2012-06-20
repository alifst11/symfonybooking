

function BuildLink(){
     var link = "?";
	$(".dial").each(function(){
		link = link + "&" + $(this).attr('id') + "=" + $(this).val();
	});
      return link;
}


$(document).ready(function(){
   // Build link & execute AJAX	
	$(".dial").knob({

                  'release':function(v,ipt) { 

                    	  $("#ajxloader").show();
                    	  $("#apps_results").hide();
                    	  $('#apps_results').load( "<?php echo url_for('@ajax_apartments')?>"+ BuildLink() );
                    	  $("#apps_results").show();
                       console.log("Change => " + ipt.attr('id') + " = " + v);
                    }

           });

  // Sidebar results show 
	$("#results").show();
	$("#results div").each(function (id){
		var time = 340 * parseInt(id);
	    	$(this).hide().fadeIn(time);
	 })

});
