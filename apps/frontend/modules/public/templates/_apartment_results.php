<div id="appresults" style="display:none;">
	<div class="row-fluid">
	<div class="span" style="display: none;"></div>

	<?php if ($apps === false ):?>
		
		<p>There are no results :( </p>
	    
	    <?php else: ?>

		<h4 align="middle">There are <?php echo($apps->count()) ?> results </h4><br>
		<?php foreach ($apps as $app): ?>
		
			   	 <div class="span4">
			   	 	<h5><?php echo( link_to($app->getName(), @apartment_single, array('id'=>$app->getId())) ) ?> in <?php echo( $app->getCity() ) ?></h5>
			   	 	<p>
						<b>Pax:</b> <?php echo( $app->getMaxPax() ) ?>
			   			<?php echo( $app->getDescription() ) ?>
			   	 	</p>	
			   	 	<div class="progress">
		  			 <!-- <div class="bar" style="width: <?php //echo(rand(20,90)) ?>%;"></div> -->
					</div>
				</div>
				<div class="span1"></div>

		<?php endforeach; ?>
	
	<?php endif;  ?>

	</div>
</div>

<script type="text/javascript">
  $("#appresults").show();
  $("#appresults div").each(function (id){
	var time = 120 * parseInt(id);
	$(this).hide().fadeIn(time);
  });
  $("#ajxloader").hide();
</script>
