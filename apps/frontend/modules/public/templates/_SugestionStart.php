<div>

<br><br>

<?php // echo ( print_r($sf_data->getRaw('results_simple') ) ) ?>

<br><br>

<h4>Things that you are looking for</h4>
<p>Remove features that you don't want</p>
	
	<?php foreach($apfeatures as $apfeature): ?>
		<div class="sidebar_feature alert-success" id="<?php echo $apfeature['id'] ?>">
			<a class="close" data-dismiss="alert" href="#">×</a>
			<?php echo( $apfeature['name'] ) ?>
		</div>
	<?php  endforeach ?>

<script type="text/javascript">        
   $(document).ready(function() {
 	buildLink(arr,-1);
	});

 		var feature = $('.sidebar_feature');
 		var arr = $.makeArray(feature);
 		
 	function buildLink(array, id){

 		oldlink = $("#explore_link").attr("href");

		  for(var i=0; i<arr.length;i++ ){ 
			 
			 /* first time link build*/
			if(id == -1){
			     	var link = ('&' + arr[i]['id'] + '=t');
			     	$("#explore_link").attr("href", oldlink +  link );
			     	var oldlink = oldlink +  link;
				 }
			
			 /* set passed feature to False */
			 if(arr[i]['id']==id){
			  	var link = ('&' + ('_' + arr[i]['id'] ) + '=f');
			  	$("#explore_link").attr("href", oldlink +  link );
			  	arr.splice(i,1);
			  	break; /* bugovi */
			    	}
		 	} 

			// console.log('Features count: ', arr.length, ' Removed: ', id );

 		}
                      	
                								
                								<?php $num = 0; ?>
                      <?php foreach($apfeatures as $apfeature): ?>
                      		
                      		$('#<?php echo $apfeature['id'] ?>').bind('closed', function () {
                      			 buildLink(arr,<?php echo $apfeature['id'] ?>); 
			})
              								 <?php $num++; ?>
		<?php endforeach ?>
</script>

	<br>
	<a href="../explore?" id="explore_link">Find more</a> like this in <a href="#"><?php echo( $app->getCity() ) ?></a>

</div>