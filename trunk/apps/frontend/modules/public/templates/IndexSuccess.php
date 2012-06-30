


<div class="hero-unit">
  <h1> $this => return break;</h1>
  <p>Yet another web site about rentals booking ...</p>
  <p>
    <a href="http://google.com" class="btn btn-primary">
      <?php echo('Get me out of here') ?>
    </a>
    <a class="btn">
      <?php echo('Stay here') ?>
    </a>
  </p>
</div>

<div class="span4">
   <h4><?php echo( __('Browse by city') ) ?></h4><hr>
 <?php foreach ($cities as $city): ?>
       <h5><?php echo(link_to($city->getName(), @apartments_city, array('id'=>$city->getId()), array() )) ?></h5>
       <p><?php echo($city->getDescription() ) ?></p>
<?php endforeach; ?>

</div>

<div class="span4">
  <h4><?php echo( __('Latest in offer') ) ?></h4><hr>
  <?php include_partial('public/apartment_list', array('apartments' => $apartments)) ?>
</div>



<!-- <div id="map_home" style="width: 600px; height: 300px"></div> -->

<?php // use_javascript('/frontend_dev.php/djs/global/g_map_single.js') ?>

<script type="text/javascript">
      $(document).ready(function() {

        if(!$('#cities_c').tagcanvas({
          textColour: '#ff0000',
          outlineColour: '#ffffff',
          reverse: true,
          textColour: null,
          zoomMax: 1.2,
          zoomMin: 0.8,
          depth: 0.9,
          maxSpeed: 0.03
        },'tags')) {
          // something went wrong, hide the canvas container
          $('#myCanvasContainer').hide();
        }
     
      });
    </script>

 <!--<div id="myCanvasContainer">
      <canvas width="500" height="500" id="cities_c">
        <p>Anything in here will be replaced on browsers that support the canvas element</p>
      </canvas>
    </div>
    <div id="tags">
      <ul>
        <?php // foreach ($cities as $city): ?>
        <li><?php // echo(link_to($city->getName(), @apartments_city, array('id'=>$city->getId()), array('style'=>"font-size: 25.8ex") )) ?></li>
        <?php // endforeach; ?>
      </ul>
    </div> -->
