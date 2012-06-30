<?php

/**
 * Booking filter form base class.
 *
 * @package    Adriatic.hr tecaj projekt
 * @subpackage filter
 * @author     Tino
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseBookingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'apartment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'), 'add_empty' => true)),
      'client_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Client'), 'add_empty' => true)),
      'date_from'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'date_to'      => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'pax'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'price'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'valid'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'canceled'     => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'apartment_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Apartment'), 'column' => 'id')),
      'client_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Client'), 'column' => 'id')),
      'date_from'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'date_to'      => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'pax'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'price'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'valid'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'canceled'     => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('booking_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Booking';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'apartment_id' => 'ForeignKey',
      'client_id'    => 'ForeignKey',
      'date_from'    => 'Date',
      'date_to'      => 'Date',
      'pax'          => 'Number',
      'price'        => 'Number',
      'valid'        => 'Boolean',
      'canceled'     => 'Boolean',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
    );
  }
}
