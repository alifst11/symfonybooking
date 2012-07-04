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

		$query = $request->getParameter('city_name');
		$this->query = $query;

		if ( is_object( $city = Doctrine_Core::getTable('City')->FindByNameLike($query)) ) {
			$this->city = $city;
		    } else {
		    	$this->city = null; 
		 }

		if ( $this->city != null ) {
			$this->apartments = $this->city->Apartments;
		    } else {
		    	$this->apartments = null;
		 }
		

	}


	/* Search request  */
	public function executeSearchRequest(sfWebRequest $request) {

		if ( LinkParser::FilterByPeriod($request) ) {
			
			$errors = LinkParser::ValidateSearchRequest($request, true);
		     	$this->by_period = true;
		      	$this->DoSearch($errors, $request, true);

		       } else {

			$errors = LinkParser::ValidateSearchRequest($request);
			$this->DoSearch($errors, $request);
		}
	}


	/*  Execute search and check errors */
	protected function DoSearch($errors, sfWebRequest $request, $by_period=false){
		
		if ( count($errors) == 0 && $by_period === false ) {
		     	
		     	$this->FetchResults($request);
		     
		       } elseif (count($errors) == 0 && $by_period) {
			
			$this->FetchResults($request, true);

		       } else {

			$this->errors = $errors; 
		}
	}


	/* Fetch results for search parameters in $request */
	protected function FetchResults(sfWebRequest $request, $by_period = false){

		$this->city 	= Doctrine_Core::getTable('City')->FindByNameLike($request->getParameter('city'));
		$this->features 	= Doctrine_Core::getTable('Feature')->GetByIds( $request->getParameter('features') );
		
		if ($by_period) {
			
			$apps 		= Doctrine_Core::getTable('Apartment')->getApartmentsByFeatures( $request->getParameter('features'), $this->city->getId() );	
			$this->apps 	= Apartment::AvalibilityInPeriod($apps, $request->getParameter('date_from'), $request->getParameter('date_to'));
		     
		      } else {
			$this->apps 	= Doctrine_Core::getTable('Apartment')->getApartmentsByFeatures( $request->getParameter('features'), $this->city->getId() );	
		}
		
	}


}
