
<div id="avalibility"></div>

<script type="text/javascript">

url = '<?php echo url_for( @json_dates, array('id'=>$apartment->getId()) );?>';

function GetDbDate(input) {
	var parts = input.split("-");
	return new Date(parts[0], parts[1]-1, parts[2]);
}

function DateForArray(date) {
	var y = date.getFullYear();
	var m = date.getMonth();
	var d = date.getDate();

    	return y + '-' + m + '-' + d;
}

var newdates = [];

function BuildDates(dates){
 	for(var i = 0; i < dates.length; i++){
		for(var j = GetDbDate( dates[i]['f'] ).getTime(); j <= GetDbDate( dates[i]['t'] ).getTime(); j += 86400000){ 
			dt = new Date(j);
			dt = DateForArray(dt);
			newdates.push(dt);
		}
 	}
}

function SetDatepicker(date){
  
  dmy = date.getFullYear()  + "-" + date.getMonth() + "-" + date.getDate();

   if ($.inArray(dmy, newdates) == -1) {
	return [true, ""];
	     } else {
	return [false,"unavailable","Unavailable"];
	}
}

function ShowDatepicker(){

     $( "#avalibility" ).datepicker({
	beforeShowDay: SetDatepicker,
	inline: true,
	minDate: "+1D", maxDate: "+4M",
	numberOfMonths: 2,
	dateFormat: "yy-mm-dd",
	firstDay: 1,
	altField: "#start_date"
	//showOtherMonths: true
     });

 $("#avalibility").show();
 $("#ajxloader").hide();

}

jQuery(document).ready(function($) {
  
  $.ajax({
    cache: false,
    url: url,
    dataType: 'json',
    success: function(data){
	BuildDates(data);
	ShowDatepicker();
	}
  });

});
</script>