
<?php if( count($errors) > 0 ): ?> 
	
	<div class="alert alert-error">	
		<?php foreach($errors as $error => $value): ?>
			<?php echo($value) ?><br>
		<?php endforeach; ?>
	</div>


    <?php else:  ?>


	<?php // echo($city->getName()) ?>
	<strong>Selected features:</strong>
	<?php echo(print_r($sf_data->getRaw('features'))) ?>
	<hr>
	<strong>Apids:</strong>
	<?php echo(print_r($sf_data->getRaw('apids'))) ?>
	<hr>
	<strong>Apartments:</strong>

	<?php echo include_partial('public/apartment_results',array('apps'=>$apps, 'params'=>array() )); ?>

	<?php //echo(print_r($sf_data->getRaw('apps'))) ?>
<?php endif; ?>


<script type="text/javascript">$(document).ready( function() { $("#ajxloader").hide(); });</script>