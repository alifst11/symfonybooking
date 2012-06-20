<div id="ajxloader"></div>

<div class="row">
     
     <div class="span2">

	<h4>Things you want</h4><br>
	<div id="results" style="display:none;">
		<?php $i = 0; ?>
		<?php foreach ($goods as $good): ?>
			  <div id="<?php echo $i ?>">
				  <div class="sidebar_feature alert-success">
				  	<a class="close" data-dismiss="alert" href="#">×</a>
				  	<?php echo($good->name) ?> <br>
				  </div>
			  </div>
		<?php $i++ ; ?>
		<?php endforeach  ?>
          <br><br>
	       <?php if(isset($bads)): ?>
		<h4>Things you don't need</h4><br>
			<?php $i = 0; ?>
			<?php foreach ($bads as $bad): ?>
				  <div id="<?php echo $i ?>">
					  <div class="sidebar_feature alert-success">
					  	<a class="close" data-dismiss="alert" href="#">×</a>
					  	<?php echo($bad->name) ?> <br>
					  </div>
				  </div>
			<?php $i++ ; ?>
			<?php endforeach  ?>
	       <?php endif; ?>
    	</div>
   </div>


  <div class="span5">
    
    <div class="row">
	
	<div class="span1">&nbsp;
	</div>

	<div class="span1">
		<p>&nbsp;&nbsp;&nbsp;Budget</p>
		<input id="budget" data-fgColor="#158" data-width="70"  type="text" value="55" class="dial">
	</div>

	<div class="span1">
		<p>&nbsp;Adventure</p>
		<input id="avanturistic" data-fgColor="#158" data-width="70"  type="text" value="75" class="dial">
	</div>

	<div class="span1">
		<p>&nbsp;&nbsp;&nbsp;&nbsp;Luxury</p>
		<input id="luxury" data-fgColor="#158" data-width="70"  type="text" value="90" class="dial">
	</div>

	<div class="span1">
		<div class="percentage">
			%
		</div>
	</div>
    </div>


	<br><br><br><br><br><strong>Primary only TRUE</strong><br>
	<?php  echo print_r( $sf_data->getRaw('analyze') ) ?>
	
	<br><br><br><strong>All link params</strong><br>
	<?php print_r($sf_data->getRaw('parse'))  ?>
	<br><br><br><br><br>
	
	<div id="apps_results">
	  <?php echo include_partial('public/apartment_results',array('apps'=>$apps, 'params'=>array())); ?>
	</div>

    </div>

</div>

<?php use_javascript('/frontend_dev.php/djs/public/build_link.js') ?>