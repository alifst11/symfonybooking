<?php

/**
 * ApartmentComparation filter form base class.
 *
 * @package    Adriatic.hr tecaj projekt
 * @subpackage filter
 * @author     Tino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseApartmentComparationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'apartment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'), 'add_empty' => true)),
      'feature_1'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_2'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_3'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_4'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_5'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_6'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_7'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_8'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_9'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_10'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_11'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_12'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_13'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_14'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_15'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_16'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_17'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_18'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_19'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_20'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_21'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_22'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_23'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_24'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_25'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_26'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_27'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_28'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_29'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_30'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_31'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_32'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_33'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_34'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_35'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_36'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_37'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_38'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_39'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_40'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_41'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_42'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_43'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_44'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_45'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_46'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_47'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_48'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'feature_49'   => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'apartment_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Apartment'), 'column' => 'id')),
      'feature_1'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_2'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_3'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_4'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_5'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_6'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_7'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_8'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_9'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_10'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_11'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_12'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_13'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_14'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_15'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_16'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_17'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_18'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_19'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_20'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_21'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_22'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_23'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_24'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_25'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_26'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_27'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_28'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_29'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_30'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_31'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_32'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_33'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_34'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_35'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_36'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_37'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_38'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_39'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_40'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_41'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_42'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_43'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_44'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_45'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_46'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_47'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_48'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'feature_49'   => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('apartment_comparation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ApartmentComparation';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'apartment_id' => 'ForeignKey',
      'feature_1'    => 'Boolean',
      'feature_2'    => 'Boolean',
      'feature_3'    => 'Boolean',
      'feature_4'    => 'Boolean',
      'feature_5'    => 'Boolean',
      'feature_6'    => 'Boolean',
      'feature_7'    => 'Boolean',
      'feature_8'    => 'Boolean',
      'feature_9'    => 'Boolean',
      'feature_10'   => 'Boolean',
      'feature_11'   => 'Boolean',
      'feature_12'   => 'Boolean',
      'feature_13'   => 'Boolean',
      'feature_14'   => 'Boolean',
      'feature_15'   => 'Boolean',
      'feature_16'   => 'Boolean',
      'feature_17'   => 'Boolean',
      'feature_18'   => 'Boolean',
      'feature_19'   => 'Boolean',
      'feature_20'   => 'Boolean',
      'feature_21'   => 'Boolean',
      'feature_22'   => 'Boolean',
      'feature_23'   => 'Boolean',
      'feature_24'   => 'Boolean',
      'feature_25'   => 'Boolean',
      'feature_26'   => 'Boolean',
      'feature_27'   => 'Boolean',
      'feature_28'   => 'Boolean',
      'feature_29'   => 'Boolean',
      'feature_30'   => 'Boolean',
      'feature_31'   => 'Boolean',
      'feature_32'   => 'Boolean',
      'feature_33'   => 'Boolean',
      'feature_34'   => 'Boolean',
      'feature_35'   => 'Boolean',
      'feature_36'   => 'Boolean',
      'feature_37'   => 'Boolean',
      'feature_38'   => 'Boolean',
      'feature_39'   => 'Boolean',
      'feature_40'   => 'Boolean',
      'feature_41'   => 'Boolean',
      'feature_42'   => 'Boolean',
      'feature_43'   => 'Boolean',
      'feature_44'   => 'Boolean',
      'feature_45'   => 'Boolean',
      'feature_46'   => 'Boolean',
      'feature_47'   => 'Boolean',
      'feature_48'   => 'Boolean',
      'feature_49'   => 'Boolean',
    );
  }
}
