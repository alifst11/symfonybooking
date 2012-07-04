



<?php if( isset($errors) ): ?> 
	
	<div class="alert alert-error">	
		<?php foreach($errors as $error => $value): ?>
			<?php echo($value) ?><br>
		<?php endforeach; ?>
	</div>

    <?php else:  ?>



    		<?php if( isset($by_period) ): ?>
    		Apartments avalible in searched period...
    	 	<?php else: ?>
    	 	Narrow you search with period
    		<?php endif; ?>

	<div class="row">

		<div class="span8">
			<?php echo include_partial('public/apartment_results',array('apps'=>$apps, 'params'=>array() )); ?>
		</div>

		<div class="span1">

			<?php if( $features): ?>
				
				<b>Features</b><br><br>
				<?php foreach ($features as $feature): ?>
					<span class="sidebar_feature label label-success">
					<?php echo ($feature->getName()  )?>
					</span>
				<?php endforeach; ?>

			      <?php else: ?>
			      	  Apartments in <strong><?php echo($city->getName()) ?></strong>
			      	<p><?php echo( __('Chose some features to narrow your serach') ) ?></p>	
			<?php endif;  ?>

		</div>

	</div>


<?php endif; ?>


<script type="text/javascript">$(document).ready( function() { $("#ajxloader").hide(); });</script>