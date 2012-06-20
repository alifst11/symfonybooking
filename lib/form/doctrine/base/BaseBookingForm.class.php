<?php

/**
 * Booking form base class.
 *
 * @method Booking getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBookingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'apartment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'), 'add_empty' => false)),
      'client_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => false)),
      'date_from'    => new sfWidgetFormDate(),
      'date_to'      => new sfWidgetFormDate(),
      'pax'          => new sfWidgetFormInputText(),
      'price'        => new sfWidgetFormInputText(),
      'valid'        => new sfWidgetFormInputCheckbox(),
      'canceled'     => new sfWidgetFormInputCheckbox(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'apartment_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'))),
      'client_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Client'))),
      'date_from'    => new sfValidatorDate(),
      'date_to'      => new sfValidatorDate(),
      'pax'          => new sfValidatorInteger(),
      'price'        => new sfValidatorNumber(),
      'valid'        => new sfValidatorBoolean(array('required' => false)),
      'canceled'     => new sfValidatorBoolean(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('booking[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Booking';
  }

}
