<?php 

abstract class BaseApartmentComparation extends sfDoctrineRecord {
    
public function setTableDefinition() {
        
        $this->setTableName('apartment_comparation');

        $this->hasColumn('id', 'integer', null, array(
                   'type' => 'integer',
                   'primary' => true,
                   ));

        $this->hasColumn('apartment_id', 'integer', null, array(
	             'type' => 'integer',
	             'notnull' => true,
             ));

       $this->hasColumn('city_id', 'integer', null, array(
               'type' => 'integer',
               'notnull' => true,
             ));

   for ($i=1; $i < 80; $i++) { 
       $this->hasColumn('feature_' . $i, 'boolean', '', array() );
    }
         


}


  public function setUp() {

        $this->hasOne('Apartment', array(
             'local' => 'apartment_id',
             'foreign' => 'id'));
    
        parent::setUp();
  }

}