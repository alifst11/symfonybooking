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

/* New booking */
public function executeNewBooking(sfWebRequest $request) {

	$app_id	 	= $request->getParameter('apid');
	$date_from	= $request->getParameter('start_date');
	$days		= $request->getParameter('days');
	$pax		= $request->getParameter('pax');
	
	$date_to = date("Y-m-d", (strtotime($date_from) + (86400 * ($days + 1) ) ));
	
	$app = Doctrine_Core::getTable('Apartment')->find($app_id);
	
	$booking = new Booking();
	$booking->date_from = $date_from;
	$booking->date_to = $date_to;

	if ( $this->getUser()->isAuthenticated() ) {
		
		if ( $booking->StartBooking($app, $pax) ) {
			/* To do: 1. Save request. Set comfirmed -> FALSE
			   	   2. Get reservation ID ??	  */
			   $this->apartment = $app;
			   $this->booking = $booking;
			   $this->price = Booking::CalculatePrice($app, $date_from, $date_to);
			   $this->pax = $pax;

			   $this->form = new BookingForm();
			   $this->form->PublicPaymentForm($app->id, $booking->date_from, $booking->date_to, $pax );

		      } else {
			/*  Not avalible, redirect to apartment */
			$this->getUser()->setFlash('notice', 'Booking is not possible.');
			$this->redirect( @apartment_single, array('id' => $app_id) );
		 }

	     } else {
	   	 /*  User in not singed in */
		$this->getUser()->setFlash('notice', 'You have to register to book.');
		$this->redirect( @new_profile );
	}

}


public function executeAjxCheckBooking(sfWebRequest $request) {

	// To use url_for() helper ... 
	// $this->getContext()->getConfiguration()->loadHelpers('Url'); 

	$app = Doctrine_Core::getTable('Apartment')->find($request->getPostParameter('apid'));

	$booking = new Booking();
	$booking->date_from = $request->getPostParameter('start_date');
	$booking->date_to = date("Y-m-d", (strtotime($request->getPostParameter('start_date')) + (86400 * ($request->getParameter('days') + 1) ) ));
	$booking->CheckBookingPossibility($app, $request->getPostParameter('pax'));


	if ( $request->isXmlHttpRequest() ){

		if ( $this->getUser()->isAuthenticated() && is_object($booking) ) {
			$this->getUser()->setFlash('notice', 'Please chose payment option ');
			$this->forward('booking', 'NewBooking');
  	   	    	
  	   	    } else {

			$form = new BookingForm();
			$form->PublicBookingForm( $app );
			$callback_url = 'http://localhost/projekt/web/frontend_dev.php/en/apartment/' . $app->getId();
  	   		return $this->renderPartial('booking/booking_form', array('form' =>$form, 'sign_in' => true, 'callback' => $callback_url ) );
  	   	}	

  	    } else {
  		$this->redirect('@homepage');
  		return sfView::NONE;
  		/* Log this !*/
  	}

}


public function executeCreateBooking(sfWebRequest $request) {

	if ( $this->getUser()->isAuthenticated() ) {
		
		$app 		= Doctrine_Core::getTable('Apartment')->find($request->getPostParameter('apid'));
		$date_from 	= $request->getPostParameter('date_from');
		$date_to 	= $request->getPostParameter('date_to');

		$booking = new Booking();
		$booking->Apartment 	= $app;
		$booking->date_from 	= $date_from;
		$booking->date_to 	= $date_to;

	//	$booking->DoBooking( $this->getUser()->getGuardUser() );
		
		$this->success = true;
		//$this->getResponse()->setHttpHeader('Content-type', 'application/json');
		//$content = '<script type="text/javascript">document.location.href="http://www.yahoo.com";  </script>';
		//$this->renderText('t');
		//return sfView::NONE;

	      } else {

		//$this->redirect('@homepage');
  		return sfView::NONE;
  		/* Log this !*/
	}

}




}
