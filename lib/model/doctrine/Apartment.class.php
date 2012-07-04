<?php

class Apartment extends BaseApartment {

	
	/* Is there booking in period for Apartment. Return true:false
	 * With Doctrine
	 */
	public function CheckBookingsInPeriod($date_from, $date_to) {

		$app 	= Doctrine_Core::getTable('Apartment');
		
		$count 	= $app->BookingsInPeriod($this->getId(), $date_from, $date_to)->count();

			if ($count == 0) {
				return false;
			       } else {
				return true;
			}
	}


	public function GetRawFeatureIds() {

		$features = $this->Feature;
		$ids = array();

		foreach ($features as $feature) {
			
			array_push($ids, $feature->getId());
		}
		return $ids;
	}

	public function BookedDates($date_from, $date_to) {

		$app = Doctrine_Core::getTable('Apartment');
		$bookings = $app->BookingsBeetweenDates(self::getId(),  '2011-01-01', '2013-01-01' );	

		$dates = array();

			for ($i=0; $i < count($bookings); $i++) { 
				
				$dates[$i]['f'] = $bookings[$i]['date_from'];
				$dates[$i]['t'] = $bookings[$i]['date_to'];	
			}
			
		return $dates;
	}

	
	/* Is there booking in period for Apartment. Return true:false
	 * Via Bookings
	 */
	public function AvalibleInPeriod($date_from, $date_to){

		$bookings = $this->Bookings;
		$avalible = true;
			
		foreach ($bookings as $booking) {

			$df = strtotime($booking->getDateFrom());
			$dt = strtotime($booking->getDateTo());

			for ($i=$df; $i < $dt; $i+= 86400) { 
				
				if (  $i == strtotime($date_from) || $i == strtotime($date_to) )  {
					return false;
				}
				
			}
		}

		return $avalible;	
	}



	public static function AvalibilityInPeriod($apartments, $date_from, $date_to) {

		$index = 0;

		foreach ($apartments as $app ) {
		
			if ( $app->AvalibleInPeriod($date_from, $date_to) === false  ) {
				unset($apartments[$index]);
			}

			$index++;
		}
		
		return $apartments;

	}


	public function getPeriodBetweenDates($date_from, $date_to){

	 	return $this->Period;
	}




}