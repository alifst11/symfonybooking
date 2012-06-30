<?php

/**
 * Apartment form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ApartmentForm extends BaseApartmentForm
{
  public function configure()
  {
  }


public function PublicSearch(){

  $this-> setWidgets(array(
    'date_from'                 => new sfWidgetFormInput(array(), array('class'=>'span2') ),
    'date_to' 		=> new sfWidgetFormInput(array(), array('class'=>'span2') ),
    'city'     		=> new sfWidgetFormInput(array(), array('class'=>'span2') ),
    'f_want'         		=> new sfWidgetFormInput(array(), array() ),
    'f_dont'            	=> new sfWidgetFormInput(array(), array() ),
  ));


}



}
