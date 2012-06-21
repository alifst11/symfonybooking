

<hr>
<h4 align="right">Title</h4>
<br>
<br>

<?php if ($fb_user): ?>

	 Tra la la la la Facebook user...
	  ->photo gallery od bookinga
 	  ->frends
 	  ->...

	<?php else: ?>





<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>


<?php endif; ?>



<?php echo( var_dump($sf_data->getRaw('fb_user'))) ?>
