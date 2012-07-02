<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AddSearchIndex extends Doctrine_Migration_Base
{
    public function up()
    {

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

            'city_id' => array(
              'type' => 'integer',
              'notnull' => true,
              'length' => 8,
             ),

         )
      );

      for ($i=1; $i < 80 ; $i++) { 
         $this->addColumn( 'apartment_comparation', 'feature_' . $i, 'boolean', ' ', array( 'default' => '0' ) );
             }

        $this->addIndex('apartment_comparation', 'apartment_comparation_apartment_id', array(
             'fields' => 
             array(
              0 => 'apartment_id',
             ),
             ));
        $this->addIndex('apartment_comparation', 'apartment_comparation_city_id', array(
             'fields' => 
             array(
              0 => 'city_id',
             ),
             ));

    }

    public function down()
    {
        $this->dropTable('apartment_comparation');
    }
}