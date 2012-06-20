<?php 

class publicComponents extends sfComponents  {


/* Login module */
public function executeAccountStatus(sfWebRequest $request) {
      if ( $this->getUser()->isAuthenticated() ) {
          $this->user = $this->getUser()->getGuardUser();
      }
}


/* Visited apartments */
public function executeVisitedapartments(ComparationEngine $request) {

	$raw_apids = $this->getUser()->getAttribute('apids');
      $new_apids = 	$request->TrackVisitedApartments( $raw_apids );
      $apids          = array();

     for ($i=0; $i < count($new_apids);  $i++) { 
	     $apids[$i] = $new_apids[$i]['apid'];
		}

    $query = Doctrine::getTable('apartment')
               ->createQuery()
               ->whereIn('id',  array_unique($apids)) ;
    $this->apartments = $query->execute();

  $this->getUser()->setAttribute('apids', $request->TrackVisitedApartments( $raw_apids ) ) ;

}


/* Sugested appartments */
public function executeSugestionStart(sfWebRequest $request) {

    $apid = $this->getRequest()->getParameter('id');
    $ap = Doctrine_Core::getTable('Apartment')->find( $apid );
    $this->apfeatures = $ap->Feature;
    $this->app = $ap;

    $url = "http://localhost/symfony/web/frontend_dev.php/explore?&1=t&2=t&3=t&5=t&6=t&7=t&_3=f&_5=f";
    $this->results_simple = Comparator::parse_link($url ,'simple')->results();

}




}