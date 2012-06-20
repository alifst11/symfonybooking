<?php

/**
 * Booking
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Booking extends BaseBooking {



/* If this function return booking object, proceed to payement */
public function StartBooking(Apartment $app, $pax) {

	   $valid = self::CheckBookingPossibility($app, $pax);

		  if ( $valid ) {
			return $this;
		     } else {
			return false;
		  }
}


/* Calculates price and save booking if booking is valid */
public function DoBooking( $client ) {
    
      if ( $this->CheckBookingPossibility($this->Apartment, $this->pax) ) {

            $this->price = Booking::CalculatePrice($this->Apartment, $this->getDateFrom(), $this->getDateTo());
            $this->Client = $client;
            $this->save();
            
            return $this;

         } else {

            return false;
      }

}


/* Returns booking object if booking is possibile else return false */
public function CheckBookingPossibility(Apartment $app, $pax) {

    /* Avalibility check. Expecting TRUE or FALSE  */
    $avalibility = $app->CheckBookingsInPeriod($this->date_from, $this->date_to);
    
    /* Are dates valid for individual apartment ? */
    $dates = true;

    /* Minimum or maximum pax for individual apartment or ... ? */
    $pax = true;
  // if ($pax > 1 && $pax < 20) {
  //        $pax = true;
  //  }

    if ( ($dates===true) && ($avalibility===false) && ($pax===true) ) {
            return $this;
         } else {
            return false;
       }

}


public static function CalculatePrice(Apartment $app, $date_from, $date_to) {

    $price = 0;
    $from  =  strtotime($date_from);
    $to      =  strtotime($date_to);
    $periods = $app->Period;

          $start_date = $from;

           while ( $start_date <= $to ) {
               
                    foreach ($periods as $period) {
                        
                            if ( in_array($start_date, $period->getDatesBetween()) ) {
                                        $price += ( $period->getPrice() );
                                }

                     } 

                    $start_date += 86400;
           }

      return $price;
}



}