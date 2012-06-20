<?php

require_once dirname(__FILE__).'/../lib/periodGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/periodGeneratorHelper.class.php';

/**
 * period actions.
 *
 * @package    sf_sandbox
 * @subpackage period
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class periodActions extends autoPeriodActions {



public function executeNew(sfWebRequest $request){
    
    $this->form = $this->configuration->getForm();
   // $this->form->JqueryDatePickerForm();
    $this->period = $this->form->getObject();

    $this->form = new PeriodForm();
}













/* Ajax action for period results */ 
public function executeAjxGetPeriods(sfWebRequest $request) {

	 $periods = Doctrine_Core::getTable('Apartment')
		    ->find( $request->getParameter('id') )->Period;

              $count = Doctrine_Core::getTable('Apartment')
		    ->find( $request->getParameter('id') )->Period->count();

	if ( $request->isXmlHttpRequest() ){
    		return $this->renderPartial('period/ajax_period_results', array('periods' => $periods, 'count' => $count ) );
  	    } else {
  		$this->redirect('@homepage');
  		return sfView::NONE;
  		/* Log this !*/
  	}
}


	
}
