<div id="ajxloader" ></div>

<?php // use_javascript('/frontend_dev.php/djs/booking/booking_form.js') ?>

<div class="row">
	<div class="span4">
		<h3><?php echo $apartment -> getName(); ?></h3>
		<h4>City: <?php echo $apartment -> getCity(); ?></h4>
		<p><?php echo $apartment -> getDescription(); ?></p>
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
		<h4>Map</h4>
	</div>
	<div class="span4">
		<h4>Price list</h4>
		<?php foreach($periods as $period):  ?>
		  <strong>From:</strong> <?php echo $period -> date_from; ?> <strong>To:</strong> <?php echo $period -> date_to; ?>
		  <strong>Price:</strong> <?php echo $period -> price; ?><br>
		<?php  endforeach; ?>
	</div>
</div>

<?php slot('sidebar') ?>
  <?php  include_component('public', 'SugestionStart') ?>
  <br><br><br><br>
  <?php include_component('public', 'visitedapartments') ?>
<?php end_slot() ?>