<h4><?php echo __('Apartments in  ') ?> <?php echo($city->getName() )  ?></h4>
<p><?php echo($city->getDescription() )  ?></p>
<hr>

<?php include_partial('public/apartment_list', array('apartments' => $apartments)) ?>