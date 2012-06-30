<?php

/**
 * Booking form base class.
 *
 * @method Booking getObject() Returns the current form's model object
 *
 * @package    Adriatic.hr tecaj projekt
 * @subpackage form
 * @author     Tino
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseBookingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'apartment_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'), 'add_empty' => false)),
      'client_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => false)),
      'date_from'     => new sfWidgetFormDate(),
      'date_to'       => new sfWidgetFormDate(),
      'pax'           => new sfWidgetFormInputText(),
      'price'         => new sfWidgetFormInputText(),
      'valid'         => new sfWidgetFormInputCheckbox(),
      'canceled'      => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
      'bookings_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser')),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'apartment_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'))),
      'client_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Client'))),
      'date_from'     => new sfValidatorDate(),
      'date_to'       => new sfValidatorDate(),
      'pax'           => new sfValidatorInteger(),
      'price'         => new sfValidatorNumber(),
      'valid'         => new sfValidatorBoolean(array('required' => false)),
      'canceled'      => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
      'bookings_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'sfGuardUser', 'required' => false)),
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

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['bookings_list']))
    {
      $this->setDefault('bookings_list', $this->object->Bookings->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveBookingsList($con);

    parent::doSave($con);
  }

  public function saveBookingsList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['bookings_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Bookings->getPrimaryKeys();
    $values = $this->getValue('bookings_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Bookings', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Bookings', array_values($link));
    }
  }

}
