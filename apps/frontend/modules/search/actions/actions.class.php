<?php

/**
 * search actions.
 *
 * @package    Adriatic.hr tecaj projekt
 * @subpackage search
 * @author     Tino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class searchActions extends sfActions {



	/* Search  */
	public function executeSearch(sfWebRequest $request) {

	 	$this->form = new ApartmentForm();
		$this->form->PublicSearch();

	}


	/* Search request  */
	public function executeSearchRequest(sfWebRequest $request) {

		$errors		 = LinkParser::ValidateSearchRequest($request);
			
			if ( count($errors) == 0 ) {
				
				$this->city = Doctrine_Core::getTable('City')->FindByNameLike($request->getParameter('city'));
			}
		
		$apartments = Doctrine_Core::getTable('Apartment')->getApartmentsByFeatures( $request->getParameter('features') );
		
		 if ($apartments === false) {
		 	array_push($errors, 'No results');
		      } else {
		      	$this->apps = $apartments;
		 }
		
		 $this->errors 	 = $errors;
		 $this->apids = Doctrine_Core::getTable('ApartmentComparation')->getAppIdsByAllFeatures( $request->getParameter('features') );
		// $this->features = $request->getParameter('features');
		 
		 $this->features = Doctrine_Core::getTable('Feature')
		 		   ->createQuery('f')
		 		   ->whereIn('f.id', $request->getParameter('features'))
		 		   ->execute();

			
	}

}
