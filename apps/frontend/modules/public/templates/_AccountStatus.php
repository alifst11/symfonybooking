<br>

<?php if (isset($user)): ?>
 Hello <?php echo($user->getName()) ?>. <br>
 <?php echo( link_to('Log-out', @sf_guard_signout)); ?>
<?php endif; ?>

<?php if (isset($user)===false): ?>
  <?php echo(link_to('Log-in', @sf_guard_signin )) ?> or <?php echo(link_to(' create account.', @new_profile )) ?> 
<?php endif; ?>

<br><br><br>

<fb:login-button autologoutlink="true"></fb:login-button>