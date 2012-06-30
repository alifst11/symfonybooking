
<?php if( ($bookings->count() ) == 0 ): ?>

		<h4 align="middle"> Booo :( You don't have any reservations... </h4>

	<?php else: ?>

		<br><h4 align="middle"> <?php echo __('Your reservations') ?></h4><hr>

		<?php echo include_partial('profile/reservations_table',array( 'bookings'=>$bookings )); ?>

		<br><hr>

<?php endif; ?>


<?php if ($fb_user): ?>

	 Tra la la la la Facebook user...
	  ->photo galleries from bookings ...
 	  ->frends ....
 	  ->...

	<?php else: ?>

         		<p><?php echo __('Hi ! Login with Facebook and share with friends ...') ?></p>
		<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>


<?php endif; ?>