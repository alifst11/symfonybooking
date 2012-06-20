<div>
  <h4>Visited apartments</h4>
  <ul>
  <?php foreach($apartments as $apartment): ?>
     <li><?php echo link_to($apartment->name, @apartment_single, array('id'=>$apartment->id) ) ?></li>
  <?php endforeach ?>
  </ul>
</div>

<?php  //  echo(print_r($sf_data->getRaw('apids'))) ?>