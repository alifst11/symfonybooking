<?php

require_once dirname(__FILE__).'/../lib/apartmentGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/apartmentGeneratorHelper.class.php';

/**
 * apartment actions.
 *
 * @package    sf_sandbox
 * @subpackage apartment
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class apartmentActions extends autoApartmentActions
{
	
	public function executeAddperiod(){
		 $this->form = new periodForm();

	}

}
