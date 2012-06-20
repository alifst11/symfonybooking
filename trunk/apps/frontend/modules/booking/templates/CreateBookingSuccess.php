
<?php if (isset($success)): ?>

<h4>Your booking is succesfully placed, you will be redirected to your profile in 3 seconds...</h4>


<script type="text/javascript">

//alert('Booking uspio');

setTimeout(function() {
  window.location.href = "http://localhost/projekt/web/frontend_dev.php/en/profile";
}, 3000);

</script>

<?php endif; ?>