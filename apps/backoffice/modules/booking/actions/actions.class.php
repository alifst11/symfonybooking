<?php

require_once dirname(__FILE__).'/../lib/bookingGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/bookingGeneratorHelper.class.php';

/**
 * booking actions.
 *
 * @package    sf_sandbox
 * @subpackage booking
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class bookingActions extends autoBookingActions {




public function executeCreate(sfWebRequest $request){
    
    $this->form = $this->configuration->getForm();
    $this->booking = $this->form->getObject();    
  
    $this->processForm($request, $this->form);
    $this->setTemplate('new');

}


protected function processForm(sfWebRequest $request, sfForm $form) {
    
    $form->bind($request->getParameter( $form->getName() ));
    $params = $request->getParameter($this->form->getName());
    
    if ( $form->isValid() ){

      //	$notice = $form->getObject()->isNew() ? 'Booking was created successfully.' : 'Booking was updated successfully.';

	      try {    /* Start booking */
                    
                   $apartment = Doctrine_Core::getTable('Apartment')->find($params['apartment_id']);
                   $booking =  $form->getObject();

                   $from  = ( $params['date_from']['year'] . '-' . $params['date_from']['month'] . '-' . $params['date_from']['day']);
                   $to      = ( $params['date_to']['year'] . '-' . $params['date_to']['month'] . '-' . $params['date_to']['day']);
                   /* Smeće odi i gori i doli   */
                   $booking->date_from = $from;
                   $booking->date_to = $to;
                   

                               if ( $booking->StartBooking($apartment, $params['pax']) ) {
                
                                       $booking->Apartment  = $apartment;
                                       $booking->client_id     = $params['client_id'];
                                       $booking->pax            = $params['pax'];
                                       $booking->price          = Booking::CalculatePrice($apartment, $from, $to);
                                       $booking->save();
                                       
                                       
                                    //   return sfView::SUCCESS;
                                       $this->redirect(array('sf_route' => 'booking_edit','sf_subject' => $booking));
                                       $this->getUser()->setFlash('error', ' Booking successfully created. ', false);
                                  } else {
                                        
                                        $this->getUser()->setFlash('error', 'Apartment is unavalible for this dates !', false);
                                        return sfView::SUCCESS;
                               }
	           
	           } 

	 catch (Doctrine_Validator_Exception $e) {
	        $errorStack = $form->getObject()->getErrorStack();
	        $message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
	        
		        foreach ($errorStack as $field => $errors) {
		            $message .= "$field (" . implode(", ", $errors) . "), ";
		        	}
	        $message = trim($message, ', ');
	        $this->getUser()->setFlash('error', $message);
	        return sfView::SUCCESS;
	      }

      	 $this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $booking)));

		 /*   if ($request->hasParameter('_save_and_add')){
		        $this->getUser()->setFlash('notice', $notice.' You can add another one below.');
		        $this->redirect('@booking_new');
		       } else {
		        $this->getUser()->setFlash('notice', $notice);
		        $this->redirect(array('sf_route' => 'booking_edit', 'sf_subject' => $booking));
		      }  */

    	 } else {
    	    $this->getUser()->setFlash('error', 'There are some errors ...', false);
    	}

}



}
