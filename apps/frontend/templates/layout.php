<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <title>_/ \_</title>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php echo  stylesheet_tag('bootstrap') ?>
    <?php echo stylesheet_tag('bootstrap-responsive') ?>
    <?php // echo stylesheet_tag('http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/smoothness/jquery-ui.css') ?>
    <?php echo stylesheet_tag('jquery-ui-1.8.21.custom.css') ?>
    <?php echo javascript_include_tag('https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js') ?>
    <?php echo javascript_include_tag('https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.18/jquery-ui.min.js') ?>
    <?php echo javascript_include_tag('http://maps.googleapis.com/maps/api/js?sensor=false') ?>
    <?php echo javascript_include_tag('jquery.knob.js') ?>
    <?php echo javascript_include_tag('bootstrap.js') ?>
    <?php // echo javascript_include_tag('jquery.tagcanvas.js') ?>
    <?php include_javascripts() ?>
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '232000500251089', // App ID
    //  channelUrl : '//WWW.YOUR_DOMAIN.COM/channel.html', // Channel File
      status     : true, // check login status
      cookie     : true, // enable cookies to allow the server to access the session
      xfbml      : true  // parse XFBML
    });

        FB.Event.subscribe('auth.login', function(response) {
           login();
        });

        FB.Event.subscribe('auth.logout', function(response) {
           logout();
        });

        function login(){
            window.location= "http://localhost/symfonybooking/web/frontend_dev.php/fb_callback";
        }

        function logout(){
           window.location= "http://localhost/symfonybooking/web/frontend_dev.php/en/logout";
        }

    // Additional initialization code here
  };

  // Load the SDK Asynchronously
  (function(d){
     var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement('script'); js.id = id; js.async = true;
     js.src = "//connect.facebook.net/en_US/all.js";
     ref.parentNode.insertBefore(js, ref);
   }(document));
</script>
</head>
<body>
<div id="fb-root"></div>
<div class="navbar navbar-fixed-top">
  	<div class="navbar-inner">
    		<div class="container">
			<ul class="nav">
			  <li><?php echo link_to('Home', @homepage) ?></li>
			  <li><?php echo link_to('Search', @search_public) ?></li>
                       <li><?php echo link_to('My reservations', @profile_home) ?></li>
			</ul>
    		</div>
  	</div>
</div>
<div class="container">
      <div class="row"> 
          <div class="span9">
            <?php if ($sf_user->hasFlash('notice')): ?>
                        <div class="alert alert-error">
                            <?php echo $sf_user->getFlash('notice') ?>
                        </div>
                        <script type="text/javascript">
                            jQuery(document).ready(function($) {
                              $('.alert').fadeOut(7000);
                               });
                        </script>
            <?php endif; ?>
            <?php echo $sf_content ?>
          </div>
          <div class="span3">
              <div id="sidebar">
                    <?php if (has_slot('sidebar')): ?>
                        <?php include_slot('sidebar') ?>
                    <?php endif; ?>
                    <?php include_component('public', 'LanguageSelect') ?>
                        <br><br>
                    <?php include_component('public', 'AccountStatus') ?>
              </div>
          </div>
	</div>
</div>
</body>
</html>