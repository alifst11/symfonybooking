<?php

/**
 * booking actions.
 *
 * @package    sf_sandbox
 * @subpackage booking
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bookingActions extends sfActions {


	/* New booking action & form */

	public function executeNewBooking(sfWebRequest $request) {

		$app_id		= $request->getParameter('apid');
		$date_from	= $request->getParameter('start_date');
		$days		= $request->getParameter('days');
		$pax		= $request->getParameter('pax');
		
		$date_to 	= date("Y-m-d", (strtotime($date_from) + (86400 * $days) ));
		$app 		= Doctrine_Core::getTable('Apartment')->find($app_id);
		
		$form = new BookingForm();
		$form->PublicBookingForm( $app );

		$booking = new Booking();
		$booking->date_from = $date_from;
		$booking->date_to = $date_to;

		if ( $this->getUser()->isAuthenticated()  ) {
			
			if ( $booking->StartBooking($app, $pax) ) {
				/* @TODO: 1. Save request. Set comfirmed -> FALSE
				   	       2. Get reservation ID ??	  */
				   $this->apartment 	= $app;
				   $this->booking 	= $booking;
				   $this->price 		= Booking::CalculatePrice($app, $date_from, $date_to);
				   $this->pax 		= $pax;

				   $this->form = new BookingForm();
				   $this->form->PublicPaymentForm($app->id, $booking->date_from, $booking->date_to, $pax );

			        } else {

				/*  Not avalible, return form and error */
				$callback_url = 'http://localhost/symfonybooking/web/frontend_dev.php/en/apartment/' . $app->getId();
	  	   		return $this->renderPartial('booking/booking_form', array('form' =>$form, 'sign_in' => false, 'callback' => $callback_url, 'error' => 'Something is wrong, please check once more ...' ) );
			 }

		       } else {
		   	 /*  User in not singed in */
			return $this->renderPartial('booking/booking_form', array('form' =>$form, 'sign_in' => true, 'callback' => $callback_url ) );
		}

	}


	/* Ajax acton to check booking possibility */

	public function executeAjxCheckBooking(sfWebRequest $request) {

		// To use url_for() helper ... 
		// $this->getContext()->getConfiguration()->loadHelpers('Url'); 

		$app = Doctrine_Core::getTable('Apartment')->find($request->getPostParameter('apid'));

		$booking = new Booking();
		$booking->date_from 	= $request->getPostParameter('start_date');
		$booking->date_to 	= date("Y-m-d", (strtotime($request->getPostParameter('start_date')) + (86400 * ($request->getParameter('days') + 1) ) ));
		$booking->CheckBookingPossibility($app, $request->getPostParameter('pax'));

		if ( $request->isXmlHttpRequest() ){

			if ( $this->getUser()->isAuthenticated() && is_object($booking) ) {
				
				/* Forward to action */
				$this->forward('booking', 'NewBooking');
	  	   	    	
	  	   	      } else {

	  	   	      	$form = new BookingForm();
				$form->PublicBookingForm( $app );
				$callback_url = 'http://localhost/symfonybooking/web/frontend_dev.php/en/apartment/' . $app->getId();
	  	   		return $this->renderPartial('booking/booking_form', array('form' =>$form, 'sign_in' => true, 'callback' => $callback_url ) );
	  	   	}	

	  	      } else {
	  		return sfView::NONE;
	  		/* Log this !*/
	  	}

	}


	/* Ajax create booking request */

	public function executeCreateBooking(sfWebRequest $request) {

		if ( $this->getUser()->isAuthenticated() ) {
			
			$app 		= Doctrine_Core::getTable('Apartment')->find($request->getPostParameter('apid'));
			$date_from 	= $request->getPostParameter('date_from');
			$date_to 	= $request->getPostParameter('date_to');
			$pax 		= $request->getPostParameter('pax');

			$booking = new Booking();
			$booking->Apartment 	= $app;
			$booking->pax 		= $pax;
			$booking->date_from 	= $date_from;
			$booking->date_to 	= $date_to;

			$booking->DoBooking( $this->getUser()->getGuardUser() );
			$this->success = true;

		       } else {
	  		return sfView::NONE;
	  		/* Log this !*/
		}

	}

}
