<?php foreach ($apartments as $apartment): ?>

	<h4><?php echo link_to( $apartment->getName(), @apartment_single, array('id' => $apartment -> id ) )?></h4>
	<?php echo __('City') ?>: <?php echo $apartment -> getCity(); ?><br>
	<?php echo __('Description') ?>: <?php echo $apartment -> getDescription(); ?>
	<br><br>
		
<?php endforeach; ?>