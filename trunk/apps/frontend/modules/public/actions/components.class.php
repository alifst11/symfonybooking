<?php 

class publicComponents extends sfComponents  {


	/* Login module */
	public function executeAccountStatus(sfWebRequest $request) {
			 
		if ( $this->getUser()->isAuthenticated() ) {
			$this->user = $this->getUser()->getGuardUser();
		}

	}


	/* Visited apartments */
	public function executeVisitedApartments(sfWebRequest $request) {

		$raw_apids  = $this->getUser()->getAttribute('apids');
		$new_apids = $request->TrackVisitedApartments( $raw_apids );
		$this->getUser()->setAttribute('apids', $new_apids ) ;


		$query = Doctrine::getTable('apartment')
				->createQuery()
				->whereIn('id',  ActivityTracking::getCleanApids($new_apids) ) ;
		$this->apartments = $query->execute();

	}


	/* Sugested appartments */
	public function executeSugestionStart(sfWebRequest $request) {

		$ap = Doctrine_Core::getTable('Apartment')->find( $request->getParameter('id') );
		$this->apfeatures = $ap->Feature;
		$this->app = $ap;

	}


	public function executeShowSugestedApartments(sfWebRequest $request){

		$ap = Doctrine_Core::getTable('Apartment')->find( $request->getParameter('id') );
		$this->over_15 = false;

		$ids = $ap->GetRawFeatureIds();
		$sugested_apids = Doctrine_Core::getTable('ApartmentComparation')
					->getAppIdsByAllFeatures( $ids, null );
		
		if ( count($sugested_apids) > 15 ) {
			
			array_splice($sugested_apids, 15);
			$this->over_15 = true;
		 } 

		$this->apartments = Doctrine_Core::getTable('Apartment')
					->GetApartmentsByIds($sugested_apids);

	}	




}