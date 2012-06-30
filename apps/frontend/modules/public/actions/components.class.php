<?php 

class publicComponents extends sfComponents  {


	/* Login module */
	public function executeAccountStatus(sfWebRequest $request) {
			 
		if ( $this->getUser()->isAuthenticated() ) {
			$this->user = $this->getUser()->getGuardUser();
		}

	}


	/* Visited apartments */
	public function executeVisitedapartments(sfWebRequest $request) {

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


}