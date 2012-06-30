<?php

//include_once '/base/BaseApartmentComparation.class.php';

class ApartmentComparation extends BaseApartmentComparation {


	public static function FindAppsByFeatures( $features=array() ) {

		$results = array();

	  	for ($i=0; $i <count($features) ; $i++) {

			if ( isset($features[$i]) ){
	     	    		 $apids= Doctrine_Core::getTable('ApartmentComparation')
	              	  		->GetAppIdsByFeature( $features[$i] );

	    		   	$results[$i][ $features[$i] ] = $apids;
	      			}
	  	}

	  return $results;

	}


}
