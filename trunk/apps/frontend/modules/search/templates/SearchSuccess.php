<div id="ajxloader"></div>

<?php echo form_tag_for($form, '#',  array( 'id' => 'search_ac' ) ) ?>
	
	<?php echo $form->renderHiddenFields(true) ?>

		<div class="row">

			<div class="span8">
				<br>
				<h1 align="middle">1. <?php echo('Chose your destination') ?></h1><br>
				<div align="middle"><?php echo $form['city']; ?> </div>

				<h2 align="middle">2. <?php echo('Add all features that you want in your apartment') ?></h2><br>
			 	<div id="f_wants" class="">  
			 		
			 		<div id="results"></div>
			 		<br><br>
			 		<div style="float:left"><?php echo $form['f_want']; ?></div>
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
				</div>
			<button type="button" id="search_submit">Search</button>
			</div>
			
		</div>
</form> 

<hr>

<div id="results_ajx">
<p align="middle">Result will show here ...</p>
</div>

<?php  use_javascript('/frontend_dev.php/djs/global/search_js.js') ?>