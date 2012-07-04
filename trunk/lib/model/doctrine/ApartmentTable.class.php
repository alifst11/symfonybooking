<?php

/**
 * ApartmentTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class ApartmentTable extends Doctrine_Table {
	

	/* Latest added apartments */
	public function LastAdded($limit=4) {

		$q = $this->createQuery('a')
			->limit($limit)
		        	->orderBy('a.created_at  DESC')
		        	->leftJoin('a.City');

		return $q->execute();
	}


	/* Returns Bookings in period */
	/* BUG: ako je period preko nekog bookinga !!! */
	
	public function BookingsInPeriod($app_id, $date_from, $date_to) {
		  
		 $q = Doctrine_Core::getTable('Booking')->createQuery('a')
				->where('apartment_id = ?', $app_id)
				->andwhere('? BETWEEN date_from AND date_to', $date_from)
				->orWhere('? BETWEEN date_from AND date_to', $date_to);

			return $q->execute();
	}


	/* Returns Bookings beetween two dates */
	public function BookingsBeetweenDates($app_id, $date_from, $date_to) {
		  
		 $q = Doctrine_Core::getTable('Booking')->createQuery('a')
				->where('apartment_id = ?', $app_id)
				->andwhere('? <= date_from', $date_from)
				->andWhere('? >= date_to', $date_to);

			return $q->execute();
	}


	/* Returns Bookings in City */
	public function InCity($city_id) {
		  
		$q = $this->createQuery('a')
			->where('a.city_id > ?', $city_id);
	 
		return $q->execute();

	}


	/* Return suggested apartments */
	public function getApartmentsByFeatures( $features = array(), $city_id = null ) {

		$apids = Doctrine_Core::getTable('ApartmentComparation')->getAppIdsByAllFeatures($features, $city_id);
		
		if ( count($apids) == 0 ){
			
			return false;
		     
		     } else {
			
			$q = $this->createQuery('a')
			                  ->whereIn('a.id', $apids);

			return  $q->execute();
		}
	}


	public function GetApartmentsByIds($apids){

		$q = $this->createQuery('a')
			   ->leftJoin('a.City')
			   ->whereIn('a.id', $apids);

		return  $q->execute();
	}


	/**
	 * Returns an instance of this class.
	 *
	 * @return object ApartmentTable
	 */
	public static function getInstance()
	{
		return Doctrine_Core::getTable('Apartment');
	}
	
}