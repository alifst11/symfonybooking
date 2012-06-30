<div class="row">
	<div class="span3">
		<h4 align="middle"><?php echo ($apartment->getName()) ?> <?php echo __('is avalible from') ?> <?php echo($booking->getDateFrom()) ?> <?php echo __('till') ?> <?php echo($booking->getDateTo()) ?>.  </h4>
	        <table class="table">
		 <tbody>
			<tr>
			      <td><?php echo __('Apartment') ?></td>
			      <td><?php echo($apartment->getName()) ?></td>
			</tr>
			<tr>
			      <td><?php echo __('Date from') ?></td>
			      <td><?php echo($booking->getDateFrom()) ?></td>
			</tr>
			<tr>
			      <td><?php echo __('Date to') ?></td>
			      <td><?php echo($booking->getDateTo()) ?></td>
			</tr>
			<tr>
			      <td><?php echo __('Persons') ?></td>
			      <td><?php echo($pax) ?></td>
			</tr>
			<tr>
			      <td><strong><?php echo __('Total price') ?></strong></td>
			      <td><strong><?php echo($price) ?></strong> €</td>
			</tr>
	 	 </tbody>
	         </table>

	         	<div id="form_content_payment">
			<form action="#" id="payment_form" class="well" >
				<?php echo $form->renderHiddenFields(true) ?>

					<h4><?php echo __('Payment option') ?> </h4> <?php echo $form['option']; ?> <br>
					<br>

					<div id="card_no_div">
					   <h4><?php echo __('Card number') ?> </h4> <?php echo $form['card_no']; ?> <br>
					</div>
					<br>

				<input type="button" id="btn_payment_form"  value="<?php echo __('Confirm reservation') ?>" class="btn btn-small" />
			</form>
		</div>
		
	</div>
</div>


<style type="text/css">
#card_no_div {display: none; }
</style>

<script type="text/javascript">

function showCardInput(newValue){
	if (newValue == 2) {
		$("#card_no_div").css('display', 'inline');
		$("#card_no").css('display', 'inline');
	} else {
		$("#card_no_div").css('display', 'none');
		$("#card_no").css('display', 'none');
	}
}

var url = '<?php echo url_for( @booking_submit_create);?>';

$(document).ready(function(){

    $('#ajxloader').hide();

	$('#btn_payment_form').click(function(){

	          $('#ajxloader').show();

	          $('#book_form_content').load(url, {

			date_from: '<?php echo($booking->getDateFrom()) ?>',
          			date_to: '<?php echo($booking->getDateTo()) ?>',
          			pax: '<?php echo($pax) ?>',
         		 	apid: '<?php echo $apartment->getId() ?>'
       		});

	 });
		
		//$("#book_form_content").empty();

});
</script>

