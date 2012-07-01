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



	/* Search start  */
	public function executeSearch(sfWebRequest $request) {

	 	$this->form = new ApartmentForm();
		$this->form->PublicSearch();

	}


	public function executeSearchApartmentsByCity(sfWebRequest $request){


	}



	/* Search request  */
	public function executeSearchRequest(sfWebRequest $request) {

		$errors		 = LinkParser::ValidateSearchRequest($request);
			
			if ( count($errors) == 0 ) {
				
				$this->city = Doctrine_Core::getTable('City')->FindByNameLike($request->getParameter('city'));
				$this->features = Doctrine_Core::getTable('Feature')->GetByIds( $request->getParameter('features') );
		 		
			}
		
		$apartments = Doctrine_Core::getTable('Apartment')->getApartmentsByFeatures( $request->getParameter('features') );
		
		 if ($apartments === false) {
		 	array_push($errors, 'No results');
		      } else {
		      	$this->apps = $apartments;
		 }
		
		 $this->errors 	 = $errors; 
		 
		 

		// $this->apids = Doctrine_Core::getTable('ApartmentComparation')->getAppIdsByAllFeatures( $request->getParameter('features') );
		// $this->features = $request->getParameter('features');
	}

}
