<?php
require_once(sfConfig::get('sf_plugins_dir').'/sfDoctrineGuardPlugin/modules/sfGuardAuth/lib/BasesfGuardAuthActions.class.php');

/**
 * sfGuardAuth actions.
 *
 * @package    Adriatic.hr tecaj projekt
 * @subpackage sfGuardAuth
 * @author     Tino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardAuthActions extends BasesfGuardAuthActions {


	/* Overrides default SF guard login action. Redirect with callback added */
	public function executeSignin($request) {
	   
		$user = $this->getUser();
		$cb 	 = $request->getPostParameter('signin[cb]');

		if ( $user->isAuthenticated() ) {
		  return $this->redirect('@homepage');
		  // Idiot
		}

		$class = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
		$this->form = new $class();
		$this->form->callbackForm($cb);

		if ( $request->isMethod('post') ) {
		  
			$this->form->bind($request->getParameter('signin'));
		  
				if ( $this->form->isValid() ) {
					
					$values = $this->form->getValues();

					$this->getUser()->signin($values['user'], array_key_exists('remember', $values) ? $values['remember'] : false);

					// always redirect to a URL set in app.yml
					// or to the referer
					// or to the homepage
					// If there parameter ?cb=xyz as CallBack redirect to that URL
					$signinUrl = sfConfig::get('app_sf_guard_plugin_success_signin_url', $user->getReferer($request->getReferer()));

					// If Callback parameter is longer than 5 characters ....
					if  ( strlen($cb) > 5 ) {
						return $this->redirect($cb);
					        } else {
						return $this->redirect('' != $signinUrl ? $signinUrl : '@homepage');
					 }
				 }

		       } else {
			 
				if ( $request->isXmlHttpRequest() ) {
			  
					$this->getResponse()->setHeaderOnly(true);
					$this->getResponse()->setStatusCode(401);

					return sfView::NONE;
				 }

				// if we have been forwarded, then the referer is the current URL
				// if not, this is the referer of the current request
				$user->setReferer($this->getContext()->getActionStack()->getSize() > 1 ? $request->getUri() : $request->getReferer());

				$module = sfConfig::get('sf_login_module');
		 
				if ($this->getModuleName() != $module) {
					return $this->redirect($module.'/'.sfConfig::get('sf_login_action'));
				 }
				
				$this->getResponse()->setStatusCode(401);	
			}
	}



	/* Facebook login button always returns to this action URL ! */
	public function executeFacebookCallback(sfWebRequest $request){
		
		$fb_user = myUser::getFacebook()->getUser(); 

		if ( $fb_user ) {
			$profile = myUser::getFbUserProfile();
			$user = myUser::updateOrCreateFbUser($profile);
			$this->context->getUser()->signIn($user);
			$this->getUser()->setFlash('notice', 'Welcome !');
			$this->redirect('@profile_home');
		      } else {	
			$this->getUser()->setFlash('notice', 'Some problems with Facebook connection... Please try later. ');
			$this->redirect('@homepage');
		}

		//$this->setTemplate(sfConfig::get('sf_app_module_dir') . '/' . 'sfGuardAuth/'. 'templates/'  .'index');
	}


}
