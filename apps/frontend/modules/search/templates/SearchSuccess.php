<div id="ajxloader"></div>

<?php echo form_tag_for($form, '#',  array( 'id' => 'search_ac' ) ) ?>
	
	<?php echo $form->renderHiddenFields(true) ?>

		<div class="row">

			<div class="span9">
				<br>
				<h1 align="middle">1. <?php echo('Chose your destination') ?></h1><br>
				<div align="middle"><?php echo $form['city']; ?> </div>
				<h2 align="middle">2. <?php echo('Add all features that you want in your apartment') ?></h2><br>
			 	
			 	<div id="f_wants" class="">  
			 		
			 		<br>
			 		<div class="row">
			 			<div class="span2">&nbsp;</div>
			 			<div class="span3">&nbsp;<div id="results"></div></div>
			 			<div class="span3">
			 				<br>
			 				<div style="float:left"><?php echo $form['f_want']; ?></div>
			 			</div>
			 			
			 		</div>
					<br><br>
				</div><br><br>

				<h3 align="middle">3. <?php echo('Planed dates (optionaly)') ?></h3>
				<div class="row">
					<div class="span1">&nbsp;</div>
					<div class="span2">
						<label>Date from</label>
						<?php echo $form['date_from']; ?>
					</div>
					<div class="span1">&nbsp;</div>
					<div class="span2">
						<label>Date to</label>
						<?php echo $form['date_to']; ?>
					</div>
					<div class="span1">&nbsp;</div>
					<div class="span1">
						<br>
						<a class="btn btn-primary btn-large" id="search_submit"><? echo( __('Search') )?></a>
					</div>
				</div>
				
			</div>
			
		</div>
</form> 

<hr>

<div id="results_ajx">
<p align="middle">Hit big blue button to start search ...</p>
</div>

<?php  use_javascript('/frontend_dev.php/djs/global/search_js.js') ?>