<?php

class AddSearchIndex extends Doctrine_Migration_Base {
  
public function up() {

   $this->createTable('apartment_comparation', array(
            
             'id' =>  array(
	              'type' => 'integer',
	              'length' => 8,
	              'autoincrement' => true,
	              'primary' => true,
             ),

             'apartment_id' => array(
              'type' => 'integer',
              'notnull' => true,
              'length' => 8,
             ),

         )
      );

      for ($i=1; $i < 50 ; $i++) { 
	  $this->addColumn( 'apartment_comparation', 'feature_' . $i, 'boolean', ' ', array( 'default' => '0' ) );
	}
 }


  public function down() {
  	$this->dropTable('apartment_comparation');
  }


}
