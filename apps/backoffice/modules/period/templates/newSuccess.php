<?php use_helper('I18N', 'Date') ?>
<?php include_partial('period/assets') ?>

<script type="text/javascript">
jQuery(document).ready(function($) {

$('#results').load( "<?php echo url_for('ajx/periods') ?>" + "/" + $("#period_apartment_id").val() );
$("#ajxloader").show();


  $('#period_apartment_id').change(function() {
     $("#ajxloader").show();
     $('#results').load( "<?php echo url_for('ajx/periods') ?>" + "/" + $("#period_apartment_id").val() );
  });


});
</script>

<div id="ajxloader"></div>

<script type="text/javascript">

jQuery(document).ready(function($) {

      $( "#dp_from" ).datepicker({
       // beforeShowDay: SetDatepicker,
        inline: true,
        minDate: "-1D", maxDate: "+11M",
        numberOfMonths: 1,
        dateFormat: "yy-mm-dd",
        firstDay: 1,
        altField: "#date_from",
        
            onSelect: function(date, inst) { 
                $( "#period_date_from_year" ).val( $("#dp_from").datepicker( 'getDate' ).getFullYear() );
                $( "#period_date_from_month" ).val( $("#dp_from").datepicker( 'getDate' ).getMonth() );
                $( "#period_date_from_day" ).val( $("#dp_from").datepicker( 'getDate' ).getDate() );
              }

      });

      $( "#dp_to" ).datepicker({
       // beforeShowDay: SetDatepicker,
        inline: true,
        minDate: "-1D", maxDate: "+11M",
        numberOfMonths: 1,
        dateFormat: "yy-mm-dd",
        firstDay: 1,
        altField: "#date_to",

            onSelect: function(date, inst) { 
                $( "#period_date_to_year" ).val( $("#dp_to").datepicker( 'getDate' ).getFullYear() );
                $( "#period_date_to_month" ).val( $("#dp_to").datepicker( 'getDate' ).getMonth() );
                $( "#period_date_to_day" ).val( $("#dp_to").datepicker( 'getDate' ).getDate() );
              }

        });

  });
</script>

<div id="sf_admin_container">
  <h1><?php echo __('New Period', array(), 'messages') ?></h1>

  <?php include_partial('period/flashes') ?>

<div class="row">

  <div class="span4">
    <h4 align="middle">Date From </h4>
      <div id="dp_from"></div>
  </div>

  <div class="span4">
    <h4 align="middle">Date To </h4>
      <div id="dp_to"></div>
  </div>

</div>
<br>

  <div id="sf_admin_header">
      <?php include_partial('period/form_header', array('period' => $period, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_bar">
     <div id="results">
        <?php // echo include_partial('period/ajax_period_results', array()); ?>
      </div>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('period/form', array('period' => $period, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('period/form_footer', array('period' => $period, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
