

<hr>
<p>Title</p>
<br>


<?php echo($sf_data->getRaw('sf_user') ) ?>



<?php if ($fb_user): ?>

	 Tra la la la la Facebook user...
	  ->photo gallery od bookinga
 	  ->frends
 	  ->...

	<?php else: ?>


          <h4> </h4> <br />


<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>


<?php endif; ?>





<?php // echo( var_dump($sf_data->getRaw('fb_user'))) ?>
