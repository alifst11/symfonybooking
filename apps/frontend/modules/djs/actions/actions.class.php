<?php

/**
 * djs actions.
 *
 * @package    Adriatic.hr tecaj projekt
 * @subpackage djs
 * @author     Tino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class djsActions extends sfActions{

	public function executeLoad(sfWebRequest $request){

		$this->setLayout(false);
			 
			$this->getResponse()->setHttpHeader('Content-Type', 'text/javascript');
			 
			switch ($request->getParameter('type')){
				 case 'global':
					$this->setTemplate($request->getParameter('filename'), dirname('SF_ROOT_DIR') . '/../' );
					break;
				default:
					$this->setTemplate($request->getParameter('filename'),  $request->getParameter('type') );
					break;    
			  }
			 
		return ".js";
	}


	public function executeChangeCulture(sfWebRequest $request){

		$oldCulture = $this->getUser()->getCulture();
		$newCulture = $request->getParameter("language");
		$this->getUser()->setCulture($newCulture);
		return $this->redirect(str_replace('/' . $oldCulture, '/' . $newCulture, $request->getParameter("redirect")));
	}


}
