<?php  if ( isset($error) ): ?>
	<div class="alert alert-error">
		<?php echo $error ?>
	</div>
<?php endif; ?>

<?php  if ($sign_in === true): ?>

	<?php $sing_in = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); ?>
	<?php $form_sing_in = new $sing_in(); ?>
	<?php $form_sing_in->callbackForm($callback); ?>
	<?php include_partial('sfGuardAuth/modal_login_account', array('form' => $form_sing_in)) ?>

<?php endif; ?>


<?php echo form_tag_for($form, 'booking/new',  array('class'=>'well', 'id' => 'book_form') ) ?>
	<?php echo $form->renderHiddenFields(true) ?>
		<h4><?php echo __('From date') ?> </h4> <?php echo $form['start_date']; ?> <br>
		<h4><?php echo __('Persons') ?></h4> 
		<?php echo $form['pax']; ?> <?php echo __('will stay for') ?> <?php echo $form['days']; ?> <?php echo __('days') ?>.
		<br>
	<input type="button" id="book_1" value="<?php echo __('Book now') ?>" class="btn btn-small" />
</form>


<script type="text/javascript">

$("#ajxloader").hide();

$(document).ready(function(){

	$('#book_1').click(function(){
	     	 
	     	$("#ajxloader").show();

		var_form_data = $('#book_form').serialize();
		
		$('#book_form_content').load('<?php echo url_for(@ajax_booking_check); ?>', {
			start_date: $("#start_date").val(),
          			apid: $("#apid").val(),
          			pax: $("#pax").val(),
         		 	days: $("#days").val()
       		});
		
		$("#book_form_content").empty();
	});
});

</script>