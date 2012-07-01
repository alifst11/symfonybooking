<div class="row-fluid">
<div class="span" style="display: none;"></div>
<?php foreach ($apartments as $apartment): ?>
	<div class="span3">
	<h5><?php echo link_to( $apartment->getName(), @apartment_single, array('id' => $apartment -> id ) )?></h5>
		<?php if ($show_city === true): ?>
			<?php echo __('City') ?>: <?php echo $apartment -> getCity(); ?><br>
		<?php endif; ?>
	<?php echo __('Persons') ?>: <?php echo $apartment -> getMaxPax(); ?><br>
	<?php // echo __('Description') ?> <?php // echo $apartment -> getDescription(); ?><br>
	</div>	
<?php endforeach; ?>
</div>