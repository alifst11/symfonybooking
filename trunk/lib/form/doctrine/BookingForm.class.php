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

		$d_keys 	= range(1, 15);
		$d_values 	= range(1, 15);
		$dates 		= array_combine($d_keys, $d_values);

		$p_keys	= range(1, $apartment->getMaxPax());
		$p_values	= range(1, $apartment->getMaxPax());
		$pax 		= array_combine($p_keys, $p_values);
		
		# @TODO: Start date when ?
		$this-> setWidgets(array(
			'start_date'	   => new sfWidgetFormInput(array(), array('readonly'=>'readonly', 'class'=>'span2', 'value' => date( 'Y-m-d' , time() ) )),
			'pax' 		   => new sfWidgetFormSelect( array('choices'  => $pax ), array('class'=>'span1') ),
			'days' 		   => new sfWidgetFormSelect( array( 'choices' => $dates ), array('class'=>'span1') ),
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
			'option' 	   	   => new sfWidgetFormSelect( array('choices' => array('1'=>'Cash', '2' => 'Credit card')), array('class'=>'span2', 'onchange' =>  'showCardInput(this.value)' ) ),
			'card_no' 	   => new sfWidgetFormInput(array(), array('class'=>'span2')),
			
		));
	}

}
