<div id="ajxloader" ></div>

<div class="row">
	
	<div class="span4">
		<h1><?php echo $apartment -> getName(); ?></h1>
		<h4><?php echo __('City') ?>: <?php echo $apartment -> getCity(); ?></h4>
		<p><?php echo $apartment -> getDescription(); ?></p>

		<?php if( $images->count() >= 1 ): ?>
				
				    <?php foreach($images as $image):  ?>
					<td><?php echo $image -> getPath(); ?></td>
				    <?php endforeach; ?>
				 
			<?php else: ?>
				<p><?php echo( __('There are no pictures') )?></p>
		<?php endif; ?>

	</div>

	<div class="span4">
		<br>
		<div id ="book_form_content">
		    <?php include_partial('booking/booking_form', array('form' => $form, 'sign_in' => false)) ?>
		</div>
	</div>
	
</div>	

<hr>

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
		<?php include_partial( 'global/apartment_map', array( 'apartment' => $apartment, 'width'=>'370', 'height'=>'200' ) ) ?>
	</div>
	
	<div class="span4">
		<h4 align="middle"><?php echo( __('Prices') ) ?></h4><hr>
		
		<?php  if( $periods->count() >= 1 ): ?>
			<?php  include_partial( 'periods_table', array( 'periods' => $periods ) ) ?>
		      <?php else: ?>
			<h4 align="middle">There is no price list so you can't book :(</h4>
		<?php endif; ?>

	</div>
</div>

<?php slot('sidebar') ?>
  <?php  include_component('public', 'SugestionStart') ?>
  <br><br><br><br>
  <?php include_component('public', 'visitedapartments') ?>
<?php end_slot() ?>