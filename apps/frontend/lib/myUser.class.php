<?php

require_once dirname('SF_ROOT_DIR').'/../lib/vendor/facebook-php-sdk/src/facebook.php';

class myUser extends sfGuardSecurityUser {


	protected static $facebook = null;


	/* Singleton returns Facebook instance */
	public static function getFacebook() {
			if (null === self::$facebook) {
				self::$facebook = new Facebook(array(
							 'appId'   => '232000500251089',
			'secret' => 'c2b3756172017ab8052d364b70e5babc'
						));
			}
			return self::$facebook;
	}


	public function isFirstRequest($boolean = null){
	  
	   if (is_null($boolean)){
		return $this->getAttribute('first_request', true);
		   }
	 
	  $this->setAttribute('first_request', $boolean);

	}


	public static function updateOrCreateFbUser($profile) {

		$sfGuardUser = Doctrine_Core::getTable('sfGuardUser')->findOneByFacebookId($profile['id']);

		if (!$sfGuardUser) {

			$sfGuardUser = new sfGuardUser();
			$sfGuardUser->setUsername('FB_' . $profile['id']);
			$sfGuardUser->facebook_id = $profile['id'];
			$sfGuardUser->first_name = $profile['first_name'];
			$sfGuardUser->last_name = $profile['last_name'];

			if (array_key_exists('email', $profile)) {
				 $sfGuardUser->email_address= $profile['email'];
			        } else {
				 $sfGuardUser->email_address= $profile['id'] .'@fb.com' ;
			 }

			$sfGuardUser->save();
		}

	   return $sfGuardUser;
	}


	/* Anytime we can have user id in cookie so we must check if we can fetch profile */

	public static function isFbUserAuthenticated() {

		/* We can have user ID in cookie but not acces token */
		$user = myUser::getFacebook()->getUser();
		$profile = null;
		
		if ( $user ){
				 
			try{
				 $profile = myUser::getFbUserProfile();
			 } catch (FacebookApiException $e) {
				 error_log($e);
				 $profile = null;
			} 
		} 

		if ( isset($profile) ) {
			return true;
		        } else {
			return false;
		 }
	}


	public static function getFbUserProfile() {
		$profile = myUser::getFacebook()->api('/me');
		return $profile;
	}

}
