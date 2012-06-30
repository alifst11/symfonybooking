<?php

/**
 * ApartmentFeature form base class.
 *
 * @method ApartmentFeature getObject() Returns the current form's model object
 *
 * @package    Adriatic.hr tecaj projekt
 * @subpackage form
 * @author     Tino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseApartmentFeatureForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'apartment_id' => new sfWidgetFormInputHidden(),
      'feature_id'   => new sfWidgetFormInputHidden(),
    ));

    $this->setValidators(array(
      'apartment_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('apartment_id')), 'empty_value' => $this->getObject()->get('apartment_id'), 'required' => false)),
      'feature_id'   => new sfValidatorChoice(array('choices' => array($this->getObject()->get('feature_id')), 'empty_value' => $this->getObject()->get('feature_id'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('apartment_feature[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ApartmentFeature';
  }

}
