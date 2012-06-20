<?php

/**
 * ApartmentComparation form base class.
 *
 * @method ApartmentComparation getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseApartmentComparationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'apartment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'), 'add_empty' => false)),
      'feature_1'    => new sfWidgetFormInputCheckbox(),
      'feature_2'    => new sfWidgetFormInputCheckbox(),
      'feature_3'    => new sfWidgetFormInputCheckbox(),
      'feature_4'    => new sfWidgetFormInputCheckbox(),
      'feature_5'    => new sfWidgetFormInputCheckbox(),
      'feature_6'    => new sfWidgetFormInputCheckbox(),
      'feature_7'    => new sfWidgetFormInputCheckbox(),
      'feature_8'    => new sfWidgetFormInputCheckbox(),
      'feature_9'    => new sfWidgetFormInputCheckbox(),
      'feature_10'   => new sfWidgetFormInputCheckbox(),
      'feature_11'   => new sfWidgetFormInputCheckbox(),
      'feature_12'   => new sfWidgetFormInputCheckbox(),
      'feature_13'   => new sfWidgetFormInputCheckbox(),
      'feature_14'   => new sfWidgetFormInputCheckbox(),
      'feature_15'   => new sfWidgetFormInputCheckbox(),
      'feature_16'   => new sfWidgetFormInputCheckbox(),
      'feature_17'   => new sfWidgetFormInputCheckbox(),
      'feature_18'   => new sfWidgetFormInputCheckbox(),
      'feature_19'   => new sfWidgetFormInputCheckbox(),
      'feature_20'   => new sfWidgetFormInputCheckbox(),
      'feature_21'   => new sfWidgetFormInputCheckbox(),
      'feature_22'   => new sfWidgetFormInputCheckbox(),
      'feature_23'   => new sfWidgetFormInputCheckbox(),
      'feature_24'   => new sfWidgetFormInputCheckbox(),
      'feature_25'   => new sfWidgetFormInputCheckbox(),
      'feature_26'   => new sfWidgetFormInputCheckbox(),
      'feature_27'   => new sfWidgetFormInputCheckbox(),
      'feature_28'   => new sfWidgetFormInputCheckbox(),
      'feature_29'   => new sfWidgetFormInputCheckbox(),
      'feature_30'   => new sfWidgetFormInputCheckbox(),
      'feature_31'   => new sfWidgetFormInputCheckbox(),
      'feature_32'   => new sfWidgetFormInputCheckbox(),
      'feature_33'   => new sfWidgetFormInputCheckbox(),
      'feature_34'   => new sfWidgetFormInputCheckbox(),
      'feature_35'   => new sfWidgetFormInputCheckbox(),
      'feature_36'   => new sfWidgetFormInputCheckbox(),
      'feature_37'   => new sfWidgetFormInputCheckbox(),
      'feature_38'   => new sfWidgetFormInputCheckbox(),
      'feature_39'   => new sfWidgetFormInputCheckbox(),
      'feature_40'   => new sfWidgetFormInputCheckbox(),
      'feature_41'   => new sfWidgetFormInputCheckbox(),
      'feature_42'   => new sfWidgetFormInputCheckbox(),
      'feature_43'   => new sfWidgetFormInputCheckbox(),
      'feature_44'   => new sfWidgetFormInputCheckbox(),
      'feature_45'   => new sfWidgetFormInputCheckbox(),
      'feature_46'   => new sfWidgetFormInputCheckbox(),
      'feature_47'   => new sfWidgetFormInputCheckbox(),
      'feature_48'   => new sfWidgetFormInputCheckbox(),
      'feature_49'   => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'apartment_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'))),
      'feature_1'    => new sfValidatorBoolean(array('required' => false)),
      'feature_2'    => new sfValidatorBoolean(array('required' => false)),
      'feature_3'    => new sfValidatorBoolean(array('required' => false)),
      'feature_4'    => new sfValidatorBoolean(array('required' => false)),
      'feature_5'    => new sfValidatorBoolean(array('required' => false)),
      'feature_6'    => new sfValidatorBoolean(array('required' => false)),
      'feature_7'    => new sfValidatorBoolean(array('required' => false)),
      'feature_8'    => new sfValidatorBoolean(array('required' => false)),
      'feature_9'    => new sfValidatorBoolean(array('required' => false)),
      'feature_10'   => new sfValidatorBoolean(array('required' => false)),
      'feature_11'   => new sfValidatorBoolean(array('required' => false)),
      'feature_12'   => new sfValidatorBoolean(array('required' => false)),
      'feature_13'   => new sfValidatorBoolean(array('required' => false)),
      'feature_14'   => new sfValidatorBoolean(array('required' => false)),
      'feature_15'   => new sfValidatorBoolean(array('required' => false)),
      'feature_16'   => new sfValidatorBoolean(array('required' => false)),
      'feature_17'   => new sfValidatorBoolean(array('required' => false)),
      'feature_18'   => new sfValidatorBoolean(array('required' => false)),
      'feature_19'   => new sfValidatorBoolean(array('required' => false)),
      'feature_20'   => new sfValidatorBoolean(array('required' => false)),
      'feature_21'   => new sfValidatorBoolean(array('required' => false)),
      'feature_22'   => new sfValidatorBoolean(array('required' => false)),
      'feature_23'   => new sfValidatorBoolean(array('required' => false)),
      'feature_24'   => new sfValidatorBoolean(array('required' => false)),
      'feature_25'   => new sfValidatorBoolean(array('required' => false)),
      'feature_26'   => new sfValidatorBoolean(array('required' => false)),
      'feature_27'   => new sfValidatorBoolean(array('required' => false)),
      'feature_28'   => new sfValidatorBoolean(array('required' => false)),
      'feature_29'   => new sfValidatorBoolean(array('required' => false)),
      'feature_30'   => new sfValidatorBoolean(array('required' => false)),
      'feature_31'   => new sfValidatorBoolean(array('required' => false)),
      'feature_32'   => new sfValidatorBoolean(array('required' => false)),
      'feature_33'   => new sfValidatorBoolean(array('required' => false)),
      'feature_34'   => new sfValidatorBoolean(array('required' => false)),
      'feature_35'   => new sfValidatorBoolean(array('required' => false)),
      'feature_36'   => new sfValidatorBoolean(array('required' => false)),
      'feature_37'   => new sfValidatorBoolean(array('required' => false)),
      'feature_38'   => new sfValidatorBoolean(array('required' => false)),
      'feature_39'   => new sfValidatorBoolean(array('required' => false)),
      'feature_40'   => new sfValidatorBoolean(array('required' => false)),
      'feature_41'   => new sfValidatorBoolean(array('required' => false)),
      'feature_42'   => new sfValidatorBoolean(array('required' => false)),
      'feature_43'   => new sfValidatorBoolean(array('required' => false)),
      'feature_44'   => new sfValidatorBoolean(array('required' => false)),
      'feature_45'   => new sfValidatorBoolean(array('required' => false)),
      'feature_46'   => new sfValidatorBoolean(array('required' => false)),
      'feature_47'   => new sfValidatorBoolean(array('required' => false)),
      'feature_48'   => new sfValidatorBoolean(array('required' => false)),
      'feature_49'   => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('apartment_comparation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ApartmentComparation';
  }

}
