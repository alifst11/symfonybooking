<br>

<?php if (isset($user)): ?>
<?php echo __('Hello') ?> <?php echo($user->getName()) ?>. <br>
 <?php echo( link_to( __('Log-out'), @sf_guard_signout)); ?>
<?php endif; ?>

<?php if (isset($user)===false): ?>
  <?php echo(link_to( __('Log-in'), @sf_guard_signin )) ?> <?php echo __('or') ?> <?php echo(link_to( __('create account'), @new_profile )) ?> 
<?php endif; ?>

<br><br><br>

<fb:login-button autologoutlink="true"></fb:login-button>