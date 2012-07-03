<?php

class Apartment extends BaseApartment {

	
	/* Is there booking in period for Apartment. Return true:false */
	public function CheckBookingsInPeriod($date_from, $date_to) {

		$app = Doctrine_Core::getTable('Apartment');
		$count = $app->BookingsInPeriod(self::getId(), $date_from, $date_to)->count();

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


	public function getPeriodBetweenDates($date_from, $date_to){

	 	return $this->Period;
	}




}