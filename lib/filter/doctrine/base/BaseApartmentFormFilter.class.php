<?php

/**
 * Apartment filter form base class.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseApartmentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'city_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => true)),
      'max_pax'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'  => new sfWidgetFormFilterInput(),
      'g_lat'        => new sfWidgetFormFilterInput(),
      'g_lon'        => new sfWidgetFormFilterInput(),
      'created_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'feature_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Feature')),
    ));

    $this->setValidators(array(
      'city_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('City'), 'column' => 'id')),
      'max_pax'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'name'         => new sfValidatorPass(array('required' => false)),
      'description'  => new sfValidatorPass(array('required' => false)),
      'g_lat'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'g_lon'        => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'created_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'feature_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Feature', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('apartment_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function addFeatureListColumnQuery(Doctrine_Query $query, $field, $values)
  {
    if (!is_array($values))
    {
      $values = array($values);
    }

    if (!count($values))
    {
      return;
    }

    $query
      ->leftJoin($query->getRootAlias().'.ApartmentFeature ApartmentFeature')
      ->andWhereIn('ApartmentFeature.feature_id', $values)
    ;
  }

  public function getModelName()
  {
    return 'Apartment';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'city_id'      => 'ForeignKey',
      'max_pax'      => 'Number',
      'name'         => 'Text',
      'description'  => 'Text',
      'g_lat'        => 'Number',
      'g_lon'        => 'Number',
      'created_at'   => 'Date',
      'updated_at'   => 'Date',
      'feature_list' => 'ManyKey',
    );
  }
}
