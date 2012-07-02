<?php

/**
 * Period form.
 *
 * @package    sf_sandbox
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PeriodForm extends BasePeriodForm {
  
	 public function configure(){	
		$this->validatorSchema->setPostValidator(new sfValidatorCallback( array('callback' => array($this, 'CheckDates')) ));
	 }
 

	   /* Form with Jquery UI Date pickers  */
	public function JqueryDatePickerForm() {

		$this-> setWidgets(array(
			'id'                 => new sfWidgetFormInputHidden(),
			'apartment_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Apartment'), 'add_empty' => false), array( 'id'=>'apartment_id' )),
			'date_from'     => new sfWidgetFormInput(array(), array('readonly'=>'readonly')),
			'date_to'         => new sfWidgetFormInput(array(), array('readonly'=>'readonly')),
			'price'            => new sfWidgetFormInputText()
		));
	}


	public function CheckDates($validator, $values) {
		 // Additionaly validation
		 // Access to form items using  $values['value_name'];
		 $apartment = Doctrine_Core::getTable('Apartment')->find($values['apartment_id']);
		 $periods = $apartment->Period;

		 $error_schema = new sfValidatorErrorSchema($validator);

		 $history_period_error      = new sfValidatorError($validator, 'Dates are in past or invalid ! Date must be in future.' );
		 $period_difference_error = new sfValidatorError($validator, 'Period with this date is allready in use !' );

			  /* Dates are in past for date_from ?! */
			 if ( (strtotime($values['date_from']) < time()) ) {
					$error_schema->addError($history_period_error , 'date_from');
			 }

			  /* Dates are in past for date_to ?! */
			 if ( (strtotime($values['date_to']) < time()) ) {
					$error_schema->addError($history_period_error , 'date_to');
			 }

			 /* Is date_from already in use ?*/
			 foreach ($periods as $period) {
			   
				   if ( in_array(strtotime($values['date_from']), $period->getDatesBetween()) ) {
									  $error_schema->addError($period_difference_error, 'date_from');
									}   
			 }
			
			 /* Is date_to already in use ?*/
			foreach ($periods as $period) {
			   
				   if ( in_array(strtotime($values['date_to']), $period->getDatesBetween()) ) {
									  $error_schema->addError($period_difference_error, 'date_to');
									}   
			 }
		  
		 throw  $error_schema;
		 return $values;

	}



 
}
