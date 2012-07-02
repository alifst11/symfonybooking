<?php

require_once dirname(__FILE__).'/../lib/pictureGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/pictureGeneratorHelper.class.php';

/**
 * picture actions.
 *
 * @package    Adriatic.hr tecaj projekt
 * @subpackage picture
 * @author     Tino
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class pictureActions extends autoPictureActions {



	public function executeNew(sfWebRequest $request) {
		$this->form = $this->configuration->getForm();
		$this->form->MultiplePictureForm();

		$this->picture = $this->form->getObject();
	}


	public function executeCreate(sfWebRequest $request) {
		$this->form = $this->configuration->getForm();
		$this->form->MultiplePictureForm();
		$this->form->bind($request->getParameter('picture'), $request->getFiles('picture'));
		$this->picture = $this->form->getObject();

		$this->processForm($request, $this->form);

		$this->setTemplate('new');
	}




	protected function processForm(sfWebRequest $request, sfForm $form) {

		$form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));
	
		if ( $form->isValid() ){
	  
			$file = $this->form->getValue('image');
	  		$notice = $form->getObject()->isNew() ? 'The item was created successfully.' : 'The item was updated successfully.';

		  		try {

		  			$filename 	= 'app_'  . sha1($file->getOriginalName() . rand(1,100) );
  					$extension 	= str_replace('.', '', $file->getOriginalExtension() );
  					$file->save(sfConfig::get('sf_upload_dir') . DIRECTORY_SEPARATOR . $filename . $extension);			
		  			
		  			$form->getObject()->path = $filename . '.' . $extension;
		  			$form->getObject()->type = $extension;
					
					$picture = $form->save();

		  		      } catch (Doctrine_Validator_Exception $e) {

					$errorStack = $form->getObject()->getErrorStack();
					$message = get_class($form->getObject()) . ' has ' . count($errorStack) . " field" . (count($errorStack) > 1 ?  's' : null) . " with validation errors: ";
						foreach ($errorStack as $field => $errors) {
							$message .= "$field (" . implode(", ", $errors) . "), ";
						}
					$message = trim($message, ', ');

					$this->getUser()->setFlash('error', $message);
					return sfView::SUCCESS;
		  		}

			$this->dispatcher->notify(new sfEvent($this, 'admin.save_object', array('object' => $picture)));

	
		     } else {
	  		$this->getUser()->setFlash('error', 'The item has not been saved due to some errors.', false);
		}
	}


}
