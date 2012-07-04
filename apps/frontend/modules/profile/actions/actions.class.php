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


	 /* Profile home  */
	public function executeIndex(sfWebRequest $request){

		$this->fb_user = myUser::isFbUserAuthenticated();
		$this->user = $this->getUser()->getGuardUser();
		$this->bookings = $this->user->Bookings;

	}


}
