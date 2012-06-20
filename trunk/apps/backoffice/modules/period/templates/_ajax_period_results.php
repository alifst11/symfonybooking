<?php  if (isset($periods)): ?>

	<?php foreach ($periods as $period): ?>

		<span class="label label-success">From:  <?php echo $period->getDateFrom() ?> </span><br>
		<span class="label label-important">To: <?php echo $period->getDateTo() ?></span><br>
		Price: <?php echo $period->getPrice() ?><hr>

	<?php endforeach; ?>

<?php endif; ?>

<?php  if (isset($count)): ?>
	
	<?php  if ( $count < 1 ): ?>
		There is no periods !   <br>
	<?php endif; ?>

<?php endif; ?>

<script type="text/javascript">
$("#ajxloader").hide();
</script>