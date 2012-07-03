<h3>Suggested apartments</h3>
Apartments that have all features that you are looking on this apartment.
<hr>
<br>

<?php if($over_15): ?>

		There are over 15 results, so we will show you first 15 results .... <br><br>
		<?php foreach ($apartments as $apartment): ?>
			</b>
			<b><?php echo link_to( $apartment->getName(), @apartment_single, array('id' => $apartment -> id ) )?></b>
			in <?php echo $apartment -> getCity(); ?>.<br>
		<?php endforeach; ?>

	<?php else: ?>

		<?php foreach ($apartments as $apartment): ?>
			
			<b><?php echo link_to( $apartment->getName(), @apartment_single, array('id' => $apartment -> id ) )?></b>
			in <?php echo $apartment -> getCity(); ?>.<br>
		<?php endforeach; ?>

<?php endif; ?>


