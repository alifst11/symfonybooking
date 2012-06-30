<table class="table">
	<thead>
		<tr>
			<th><?php echo __('No.') ?></th>
			<th><?php echo __('Date from') ?></th>
			<th><?php echo __('Date to') ?></th>
			<th><?php echo __('Apartment') ?></th>
			<th><?php echo __('Persons') ?></th>
			<th><?php echo __('Price') ?></th>
			<th><?php echo __('Status') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php $count = 1 ;?>
		<?php  foreach($bookings as $booking): ?>
			<tr>	
				<td><?php echo($count ) ?></td>
				<td><?php echo($booking->getDateFrom() ) ?></td>
				<td><?php echo($booking->getDateTo() ) ?></td>
				<td><?php echo( link_to( $booking->getApartment(), @apartment_single, array('id'=> $booking->getApartmentId() ))) ?></td>
				<td><?php echo($booking->getPax() ) ?></td>
				<td><?php echo($booking->getPrice() ) ?></td>
				<td>
					<?php if($booking->getValid() === true): ?>
						<?php echo __('Confirmed') ?>
						<?php else: ?>
						<?php echo __('Not confirmed') ?>
					<?php endif; ?>
				</td>
			</tr>
		<?php $count++; ?>
		<?php  endforeach; ?>
	 </tbody>
</table>