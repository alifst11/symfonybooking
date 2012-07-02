<?php

/**
 * Picture form.
 *
 * @package    Adriatic.hr tecaj projekt
 * @subpackage form
 * @author     Tino
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PictureForm extends BasePictureForm {
  
	public function configure() {
	
	}

	public function MultiplePictureForm(){

		$this->setWidgets(array(
			'id'           	=> new sfWidgetFormInputHidden(),
			'apartment_id' 	=> new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'), 'add_empty' => false)),
			'image'    	=> new sfWidgetFormInputFileEditable(array(
							'edit_mode' => !$this->isNew(),
							'file_src' => sfConfig::get('sf_upload_dir')
						)),
			'name'         	=> new sfWidgetFormInputText(),
			'description'  	=> new sfWidgetFormInputText()
		));

		$this->setValidators(array(
			'id'           	=> new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
			'apartment_id' 	=> new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'))),
			'name'         	=> new sfValidatorString(array('max_length' => 255)),
			'description'  	=> new sfValidatorString(array('max_length' => 255, 'required' => false)),
			'image'    	=> new sfValidatorFile(array(
						'required' => true, 
                                                                          	'path'       => sfConfig::get('sf_upload_dir'),
                                                                          	'mime_types' => 'web_images', 
						)),
		));

		$this->widgetSchema->setNameFormat('picture[%s]');

		$this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

		$this->setupInheritance();
	}




}
