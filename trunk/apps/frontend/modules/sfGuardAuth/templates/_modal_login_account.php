<?php use_helper('I18N') ?>

<div class="modal hide" id="myModal">
			
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h3 align="middle"><?php echo __('Sign-in') ?></h3>
			</div>
			
			<div class="modal-body">
				<p align="middle"><?php echo __('You have to login or create account to continiue.')?></p>
				<?php include_partial( 'sfGuardAuth/signin_form', array('form' => $form) ) ?>	 
				<br>
				<div class="fb-login-button" data-show-faces="true" data-width="200" data-max-rows="1"></div>
			</div>

			<div class="modal-footer">
				<a href="#" class="btn" data-dismiss="modal"><?php echo __('Cancel')?></a>
			</div>

</div>

<script type="text/javascript">
			$('#myModal').modal('show');
			$("#ajxloader").hide();
</script>