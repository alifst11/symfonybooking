<?php

/**
 * sfGuardUser form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserForm extends PluginsfGuardUserForm {
  
	public function configure(){
	}


	/* Public booking form */
	public function PublicForm() {
	  $this->useFields(array('username', 'password', 'email_address', 'first_name', 'last_name' ));
	}


}
