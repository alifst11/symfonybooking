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
		$this->errors 	 = $errors;	

			if ( count($errors) == 0 ) {
				
				$this->city = Doctrine_Core::getTable('City')->FindByNameLike($request->getParameter('city'));

			}

		$this->features = $request->getParameter('features');

	
		$this->apids = Doctrine_Core::getTable('ApartmentComparation')->getAppIdsByAllFeatures( $request->getParameter('features') );
		$this->apps = Doctrine_Core::getTable('Apartment')->getApartmentsByFeatures( $request->getParameter('features') );
		
	}

}
