<?php
require_once dirname('SF_ROOT_DIR').'/../lib/vendor/facebook-php-sdk/src/facebook.php';
/**
 * profile actions.
 *
 * @package    sf_sandbox
 * @subpackage profile
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class profileActions extends sfActions {


	/* Check if user is logged */
	public function preExecute(){

		$sf_guard_user = $this->getUser()->isAuthenticated();
		$fbuser = myUser::isFbUserAuthenticated();

		if ( $sf_guard_user === false ) {

		   //	$this->getUser()->setFlash('notice', 'Log-in or register or connect with Facebook ...');
			$this->form = new sfGuardUserForm();
			$this->form->PublicForm();

			$sing_in = sfConfig::get('app_sf_guard_plugin_signin_form', 'sfGuardFormSignin'); 
			$this->form_2 = new $sing_in();
			$this->form_2->callbackForm('a');

			$this->setTemplate(sfConfig::get('sf_app_module_dir') . '/' . 'public/'. 'templates/'  .'NewProfile');
				
			// $this->redirect('@homepage');
		} 

	}


	 /* Profile home  */
	public function executeIndex(sfWebRequest $request){

		$this->fb_user = myUser::isFbUserAuthenticated();
	            
	            	$user = $this->getUser()->getGuardUser();
		$this->user = $user;
	            
		if ( $user ){
			$this->bookings = $user->Bookings;
		 }

	}

}
