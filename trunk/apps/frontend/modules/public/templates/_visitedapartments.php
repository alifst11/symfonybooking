<div>
	<h4><?php echo __('Visited apartments') ?></h4>
	<ul>
	<?php foreach($apartments as $apartment): ?>
		<li><?php echo link_to($apartment->name, @apartment_single, array('id'=>$apartment->id) ) ?></li>
	<?php endforeach ?>
  	</ul>
</div>