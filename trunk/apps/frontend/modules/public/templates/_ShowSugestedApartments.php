<h3><?php echo __('Suggested apartments') ?></h3>
<?php echo __('Apartments that have all features that you are looking on this apartment.') ?>
<hr>

<?php if($over_15): ?>

		<?php echo __('There are over 15 results, so we show you first 15 results ....') ?><br><br>
		<?php foreach ($apartments as $apartment): ?>
			<b><?php echo link_to( $apartment->getName(), @apartment_single, array('id' => $apartment -> id ) )?></b>
			<?php echo __('in') ?> <?php echo $apartment -> getCity(); ?>.<br>
		<?php endforeach; ?>

	<?php else: ?>

		<?php foreach ($apartments as $apartment): ?>
			
			<b><?php echo link_to( $apartment->getName(), @apartment_single, array('id' => $apartment -> id ) )?></b>
			<?php echo __('in') ?> <?php echo $apartment -> getCity(); ?>.<br>
		<?php endforeach; ?>

<?php endif; ?>


