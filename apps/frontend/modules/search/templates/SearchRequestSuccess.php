
<?php if( count($errors) > 0 ): ?> 
	
	<div class="alert alert-error">	
		<?php foreach($errors as $error => $value): ?>
			<?php echo($value) ?><br>
		<?php endforeach; ?>
	</div>


    <?php else:  ?>



	<div class="row">

		<div class="span4">

			<h4>Results </h4><br>
			<?php echo include_partial('public/apartment_results',array('apps'=>$apps, 'params'=>array() )); ?>

		</div>

		<div class="span3">


			Apartments in <strong><?php echo($city->getName()) ?></strong> with this features:

			<?php foreach ($features as $feature): ?>

				<?php echo ($feature->getName()  )?> <br>
		
			<?php endforeach; ?>

		</div>

	</div>


<?php endif; ?>


<script type="text/javascript">$(document).ready( function() { $("#ajxloader").hide(); });</script>