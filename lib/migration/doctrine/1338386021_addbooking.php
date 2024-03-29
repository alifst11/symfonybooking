<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Addbooking extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createTable('booking', array(
             'id' => 
             array(
              'type' => 'integer',
              'length' => 8,
              'autoincrement' => true,
              'primary' => true,
             ),
             'apartment_id' => 
             array(
              'type' => 'integer',
              'notnull' => true,
              'length' => 8,
             ),
             'client_id' => 
             array(
              'type' => 'integer',
              'notnull' => true,
              'length' => 8,
             ),
             'date_from' => 
             array(
              'type' => 'date',
              'notnull' => true,
              'length' => 25,
             ),
             'date_to' => 
             array(
              'type' => 'date',
              'notnull' => true,
              'length' => 25,
             ),
             'price' => 
             array(
              'type' => 'float',
              'notnull' => true,
              'length' => NULL,
             ),
             'created_at' => 
             array(
              'notnull' => true,
              'type' => 'timestamp',
              'length' => 25,
             ),
             'updated_at' => 
             array(
              'notnull' => true,
              'type' => 'timestamp',
              'length' => 25,
             ),
             ), array(
             'indexes' => 
             array(
             ),
             'primary' => 
             array(
              0 => 'id',
             ),
             ));
    }

    public function down()
    {
        $this->dropTable('booking');
    }
}