
<p>Results for <?php echo($query) ?></p>

<?php if( isset($apartments) ): ?>
	<?php  include_partial('public/apartment_list', array('apartments' => $apartments, 'show_city' => false)) ?>
<?php else: ?>
	<p>No apartments here :(</p>
<?php endif; ?>

<script type="text/javascript">$(document).ready( function() { $("#ajxloader").hide(); });</script>