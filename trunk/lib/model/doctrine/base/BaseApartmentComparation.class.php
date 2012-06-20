<?php 


//include_once '/vendor/symfony/lib/plugins/sfDoctrinePlugin/lib/record/sfDoctrineRecord.class.php';
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

   for ($i=1; $i < 50; $i++) { 

       $this->hasColumn('feature_' . $i, 'boolean', '', array() );
	
	}
         


}


  public function setUp() {
       
        parent::setUp();

        $this->hasOne('Apartment', array(
             'local' => 'apartment_id',
             'foreign' => 'id'));

    }



}