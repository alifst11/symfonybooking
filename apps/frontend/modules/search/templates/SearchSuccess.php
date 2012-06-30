<div id="ajxloader"></div>

<?php echo form_tag_for($form, '#',  array( 'id' => 'search_ac' ) ) ?>
	
	<?php echo $form->renderHiddenFields(true) ?>

		<div class="row">

			<div class="span3">
				<h4>When and where</h4><br>

				<label>Date from</label>
				<?php echo $form['date_from']; ?><br>
				
				<label>Date to</label>
				<?php echo $form['date_to']; ?><br>
				
				<label>City</label>
				<?php echo $form['city']; ?> 

			</div>

			<div class="span3">
			
				<label>Features you want</label><hr>
			 	<div id="f_wants" class="">  
			 		
			 		<div id="results"></div>
			 		<br><br><br><br><br>

					<?php echo $form['f_want']; ?>
					<br>

				</div>
				<br>
				<button type="button" id="search_submit">Search</button>  
			</div>
		</div>
</form> 

<hr>

<div id="results_ajx">
Result will show here ...
</div>

<?php  use_javascript('/frontend_dev.php/djs/global/search_js.js') ?>