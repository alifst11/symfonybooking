<div id="ajxloader" ></div>

<?php // use_javascript('/frontend_dev.php/djs/booking/booking_form.js') ?>

<div class="row">
	<div class="span4">
		<h3><?php echo $apartment -> getName(); ?></h3>
		<h4><?php echo __('City') ?> <?php echo $apartment -> getCity(); ?></h4>
		<p><?php echo $apartment -> getDescription(); ?></p>


		<?php if( $images->count() >= 1 ): ?>
				
				    <?php foreach($images as $image):  ?>
				   
					<td><?php echo $image -> getPath(); ?></td>
				
				    <?php  endforeach; ?>
				 
			<?php else: ?>

			<p><?php echo( __('There are no pictures') )?></p>
		
		<?php endif; ?>

	</div>
	<div class="span4">
		<div id ="book_form_content">
		    <?php include_partial('booking/booking_form', array('form' => $form, 'sign_in' => false)) ?>
		</div>
	</div>
</div>	

<br><hr>

<div class="row">
	<div class="span5">
		<?php include_partial('date_picker', array('apartment' => $apartment )) ?>
	</div>
	<div class="span3">
	</div>
</div>	

<hr>

<div class="row">
	<div class="span4">
		<h4><?php echo __('Map') ?></h4>
	</div>
	<div class="span4">
			
		<?php if( $periods->count() >= 1 ): ?>

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
		<?php else: ?>
		<h4>There is no price list so you can't book :(</h4>
	<?php endif; ?>
	</div>
</div>

<?php slot('sidebar') ?>
  <?php  include_component('public', 'SugestionStart') ?>
  <br><br><br><br>
  <?php include_component('public', 'visitedapartments') ?>
<?php end_slot() ?>