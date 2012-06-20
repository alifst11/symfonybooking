<?php

/**
 * Booking form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class BookingForm extends BaseBookingForm {
  
 
public function configure() {
	unset( $this['price']  );
}


  /* Public booking form */
public function PublicBookingForm( $apartment, $maxdays=14 ) {

	$this-> setWidgets(array(
		'start_date'	  => new sfWidgetFormInput(array(), array('readonly'=>'readonly', 'class'=>'span2')),
		'pax' 		   => new sfWidgetFormSelect( array('choices' => range(0, $apartment->max_pax, 1) ), array('class'=>'span1') ),
		'days' 		   => new sfWidgetFormSelect( array( 'choices' => range(1, $maxdays, 1) ), array('class'=>'span1') ),
		'apid'		   => new sfWidgetFormInputHidden( array(), array('value' => $apartment-> id) )
	));
}


  /* Public booking form */
public function PublicPaymentForm($apid, $date_from, $date_to, $pax) {

	$this-> setWidgets(array(
		'apid'		   => new sfWidgetFormInputHidden( array(), array('value' => $apid) ),
		'date_from'	   => new sfWidgetFormInputHidden( array(), array('value' => $date_from) ),
		'date_to'	   => new sfWidgetFormInputHidden( array(), array('value' => $date_to) ),
		'pax'		   => new sfWidgetFormInputHidden( array(), array('value' => $pax) ),
		'option' 	   => new sfWidgetFormSelect( array('choices' => array('1'=>'Cash', '2' => 'Credit card')), array('class'=>'span2', 'onchange' =>  'showCardInput(this.value)' ) ),
		'card_no' 	   => new sfWidgetFormInput(array(), array('class'=>'span2')),
		
	));
}



}
