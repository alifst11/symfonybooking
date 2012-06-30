<table class="table table-condensed">
	<thead>
		<tr>
			<th><?php echo __('Date from') ?></th>
			<th><?php echo __('Date to') ?></th>
			<th><?php echo __('Price') ?></th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($periods as $period):  ?>
			<tr>	
				<td><?php echo $period -> date_from; ?></td>
				<td><?php echo $period -> date_to; ?></td>
				<td><?php echo $period -> price; ?></td>
			</tr>
		<?php  endforeach; ?>
	</tbody>
</table>