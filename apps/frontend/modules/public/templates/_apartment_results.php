
	<?php // echo print_r($sf_data->getRaw('params'))?>


<div id="appresults" style="display:none;">
	<?php $i = 0; ?>
	<?php foreach ($apps as $app): ?>
	
	    <div class="row" id="<?php echo $i ?>">
	   	 <div class="span2">
	   	 	<h4><?php echo( link_to($app->getName(), @apartment_single, array('id'=>$app->getId())) ) ?></h4>
	   	 	<div class="progress">
  			  <div class="bar" style="width: <?php echo(rand(20,90)) ?>%;"></div>
			</div>
		</div>
	   	<div class="span3">
	   		<p>
	   			<strong><?php echo __('City') ?>: </strong><?php echo( $app->getCity() ) ?><br>
	   			<strong><?php echo __('Description') ?>: </strong><?php echo( $app->getDescription() ) ?>
	   		</p>
	   	</div>
   	    </div><hr>
   	<?php $i++ ; ?>
	<?php endforeach; ?>

</div>

<script type="text/javascript">
  $("#appresults").show();
  $("#appresults div").each(function (id){
	var time = 280 * parseInt(id);
	$(this).hide().fadeIn(time);
  })
  $("#ajxloader").hide();
</script>
