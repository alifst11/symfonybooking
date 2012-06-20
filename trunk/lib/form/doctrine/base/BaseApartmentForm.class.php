<?php

/**
 * Apartment form base class.
 *
 * @method Apartment getObject() Returns the current form's model object
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseApartmentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'           => new sfWidgetFormInputHidden(),
      'city_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => false)),
      'max_pax'      => new sfWidgetFormInputText(),
      'name'         => new sfWidgetFormInputText(),
      'description'  => new sfWidgetFormInputText(),
      'g_lat'        => new sfWidgetFormInputText(),
      'g_lon'        => new sfWidgetFormInputText(),
      'created_at'   => new sfWidgetFormDateTime(),
      'updated_at'   => new sfWidgetFormDateTime(),
      'feature_list' => new sfWidgetFormDoctrineChoice(array('multiple' => true, 'model' => 'Feature')),
    ));

    $this->setValidators(array(
      'id'           => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'city_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('City'))),
      'max_pax'      => new sfValidatorInteger(),
      'name'         => new sfValidatorString(array('max_length' => 255)),
      'description'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'g_lat'        => new sfValidatorNumber(array('required' => false)),
      'g_lon'        => new sfValidatorNumber(array('required' => false)),
      'created_at'   => new sfValidatorDateTime(),
      'updated_at'   => new sfValidatorDateTime(),
      'feature_list' => new sfValidatorDoctrineChoice(array('multiple' => true, 'model' => 'Feature', 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('apartment[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Apartment';
  }

  public function updateDefaultsFromObject()
  {
    parent::updateDefaultsFromObject();

    if (isset($this->widgetSchema['feature_list']))
    {
      $this->setDefault('feature_list', $this->object->Feature->getPrimaryKeys());
    }

  }

  protected function doSave($con = null)
  {
    $this->saveFeatureList($con);

    parent::doSave($con);
  }

  public function saveFeatureList($con = null)
  {
    if (!$this->isValid())
    {
      throw $this->getErrorSchema();
    }

    if (!isset($this->widgetSchema['feature_list']))
    {
      // somebody has unset this widget
      return;
    }

    if (null === $con)
    {
      $con = $this->getConnection();
    }

    $existing = $this->object->Feature->getPrimaryKeys();
    $values = $this->getValue('feature_list');
    if (!is_array($values))
    {
      $values = array();
    }

    $unlink = array_diff($existing, $values);
    if (count($unlink))
    {
      $this->object->unlink('Feature', array_values($unlink));
    }

    $link = array_diff($values, $existing);
    if (count($link))
    {
      $this->object->link('Feature', array_values($link));
    }
  }

}
