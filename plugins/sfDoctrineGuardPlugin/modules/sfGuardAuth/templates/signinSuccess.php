<?php use_helper('I18N') ?>


<div class="row">

<div class="span3">
&nbsp;
</div>
<div class="span5">
	<br><br>
	<h3 align="middle"><?php echo __('Log-in', null, 'sf_guard') ?></h3>
  	<?php echo get_partial('sfGuardAuth/signin_form', array('form' => $form)) ?>
</div>
<div class="span3">
&nbsp;
</div>

</div>


