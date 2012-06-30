<?php use_helper('I18N') ?>

<div class="row">

<div class="span4">
	<br><h4 align="middle"> <?php echo __('Registration') ?> </h4><br>
	<form action="<?php echo url_for('@profile_submit') ?>" method="post" name="new_user" class="well">
	  <table>
	    <?php echo $form; ?>
	    <tfoot>
	      <tr>
	        <td colspan="2">
	          <input class="btn" type="submit" name="register" value="<?php echo __('Register', null, 'sf_guard') ?>" />
	        </td>
	      </tr>
	    </tfoot>
	  </table>
	</form>
</div>

<div class="span4">
	<br><h4 align="middle"><?php echo __('Log-in') ?></h4><br>
	<form action="<?php echo url_for('@sf_guard_signin') ?>" method="post" class="well">
	  <table>
	    <?php echo $form_2; ?>
	    <tfoot>
	      <tr>
	        <td colspan="2">
	          <input class="btn" type="submit" name="login" value="<?php echo __('Log-in', null, 'sf_guard') ?>" />
	        </td>
	      </tr>
	    </tfoot>
	  </table>
	</form>
</div>

</div>





