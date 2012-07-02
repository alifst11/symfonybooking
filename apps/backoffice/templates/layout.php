<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
  <head>
    <?php include_stylesheets() ?>
    <?php echo stylesheet_tag('bootstrap') ?>
    <?php echo stylesheet_tag('jquery-ui-1.8.21.custom.css') ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js"></script>
     <?php echo javascript_include_tag('bootstrap.js') ?>
  </head>
  <body class="bck">
 <div class="container">
  <?php if ( $sf_user->isAuthenticated() ): ?> 
  <div id="top_menu">
        <?php echo link_to ( 'Users' , @sf_guard_user) ?> |
        <?php echo link_to ( 'Groups' , @sf_guard_group) ?> |
        <?php echo link_to ( 'Permisions' , @sf_guard_permission) ?> |
        <?php echo link_to ( 'Apartments' , @apartment) ?> | 
        <?php echo link_to ( 'Pictures' , @picture) ?> | 
        <?php echo link_to ( 'Periods' , @period) ?> | 
        <?php echo link_to ( 'Features' , @feature) ?> | 
        <?php echo link_to ( 'Bookings' , @booking) ?> | 
        <?php echo link_to ( 'Cities' , @city) ?>
    </div>
   <?php endif; ?>
   <?php echo $sf_content ?>
  </div>
  </body>  
<script type="text/javascript">
  jQuery(document).ready(function($) {
      $('.error').fadeOut(7500);
      $('.error_list').fadeOut(7500);
      });
</script>
</html>
