<div>

	<h4><?php echo __('Things that you are looking for') ?></h4>
	<p><?php echo __('Remove features that you dont want') ?></p>
	
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
	<a href="../explore?" id="explore_link"><?php echo __('Explore by features') ?></a> <?php echo __('like this') ?>.
	<hr>
	<?php echo __('Browse apartments in ') ?> <?php echo(link_to( $app->getCity(), @apartments_city, array('id'=> $app->getCityId()) )) ?>

</div>