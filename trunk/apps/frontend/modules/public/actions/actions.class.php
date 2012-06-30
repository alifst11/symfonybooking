<?php
/**
 * public actions.
 *
 * @package    sf_sandbox
 * @subpackage public
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class publicActions extends sfActions {
 

	/* Process new user form */
	protected function processForm(sfWebRequest $request, sfForm $form) {
	    
		$form->bind( $request->getParameter($form->getName()) );
	 
		 if ( $form->isValid() ){
		 	  $user = $this->form->save();
		 	  $this->context->getUser()->signIn($user);

		 	  $this->getUser()->setFlash('notice', 'You have sucessfuly registered ');
			  $this->redirect('@profile_home');
		   }
	}


	/* Creation of User for public */
	public function executeCreate(sfWebRequest $request){

		if ($this->getUser()->isAuthenticated()) {
		      $this->getUser()->setFlash('notice', 'Maybe You are an idiot and You forgot to log out to create multiple accounts');
		      $this->redirect('@profile_home');
		    }

		if ( $request->isMethod('post') === false ) {
			$this->getUser()->setFlash('notice', 'Maybe you think you are hacker ...');
			$this->redirect('@homepage');
		        } else {
			$this->form = new sfGuardUserForm();
			$this->form->PublicForm();
			
			$sing_in = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
			$this->form_2 = new $sing_in();

			$this->processForm($request, $this->form);
			$this->setTemplate('NewProfile');
		}
	}


	/* NEW PROFILE FORM */
	public function executeNewProfile(sfWebRequest $request) {

		$this->form = new sfGuardUserForm();
		$this->form->PublicForm();

		$sing_in = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
		$this->form_2 = new $sing_in();
	}


	/* HOMEPAGE  */
	public function executeIndex(sfWebRequest $request) {

		if (!$request->getParameter('sf_culture')) {
		    
			    if ( $this->getUser()->isFirstRequest() ) {
					$culture = $request->getPreferredCulture(array('en', 'hr'));
					$this->getUser()->setCulture($culture);
					$this->getUser()->isFirstRequest(false);
			   	 } else {
			      		$culture = $this->getUser()->getCulture();
			    }
		 
		    	$this->redirect('homepage');
		 }

		$this->cities = Doctrine_Core::getTable('city')
		        ->createQuery('c')
		        ->execute();
	    	$this->apartments = Doctrine_Core::getTable('apartment')
		        ->createQuery('a')
		        ->execute();
	}


	/* APARTMENT SINGLE  */
	public function executeShowApartment(sfWebRequest $request) {

		$this->forward404Unless($this->apartment = Doctrine_Core::getTable('apartment')->findOneById($request->getParameter('id')), sprintf('Object category does not exist (%s).', $request->getParameter('id')));
		$app = $this->apartment;

		$this->periods = $app->Period;
		$this->images = $app->Pictures;

		$this->form = new BookingForm();
		$this->form->PublicBookingForm( $app );
	}

 
	/* APARTMENTS BY CITY  */
	public function executeCityApartments(sfWebRequest $request) {

		$this->city 		= Doctrine_Core::getTable('City')->find( $request->getParameter('id') );
		$this->apartments 	= $this->city->Apartments ;

	}


	/* APARTMENT EXPLORE  */
	public function executeExplore(sfWebRequest $request) {

		$comparator 	= new Comparator( $request->getUri() );

		$this->simple 	= $comparator->analyze_link('simple')->results();
		$ids 		= $comparator->getOnlyTrueFeatures();

		$this->true 	= $ids;
		$this->url 	= $request->getUri();

		$this->goods = Doctrine_Core::getTable('Feature')->GetByIds( $ids  );
		
		  if ( isset($data['secondary']['false']) ) {
		      $this->bads   = Doctrine_Core::getTable('Feature')->GetByIds( $data['secondary']['false'] );
		       }

		/* First view only */
		$this->apps = Doctrine_Core::getTable('Apartment')->createQuery('a')->limit(2)->execute();
	}


	/* Bookings dates Ajax request*/
	public function executeAjaxDates(sfWebRequest $request) {

		$app = Doctrine_Core::getTable('Apartment')->find($request->getParameter('id'));
		$dates = $app->BookedDates('2010-01-01', '2013-01-01');

		$json = json_encode( $dates, true );
		$this->getResponse()->setHttpHeader('Content-type', 'application/json');
		$this->renderText($json);
		return sfView::NONE;
	}


	/* Apartments result Ajax request with template */
	public function executeSugestedApartments(sfWebRequest $request) {

		$apps = Doctrine_Core::getTable('Apartment')->createQuery('a')->execute();
		$params = $request->GetParams( array('budget', 'avanturistic', 'luxury') );

		if ( $request->isXmlHttpRequest() ){
	    		return $this->renderPartial('public/apartment_results', array('apps' => $apps, 'params' => $params));
	  	       } else {
	  		$this->redirect('@homepage');
	  		return sfView::NONE;
	  		/* Log this !*/
	  	}
	}


}
