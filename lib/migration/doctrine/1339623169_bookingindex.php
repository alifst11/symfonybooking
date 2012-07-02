<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class AddBookingIndexes extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('booking', 'booking_client_id_sf_guard_user_id', array(
             'name' => 'booking_client_id_sf_guard_user_id',
             'local' => 'client_id',
             'foreign' => 'id',
             'foreignTable' => 'sf_guard_user',
             ));
        $this->addIndex('booking', 'booking_client_id', array(
             'fields' => 
             array(
              0 => 'client_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('booking', 'booking_client_id_sf_guard_user_id');
        $this->removeIndex('booking', 'booking_client_id', array(
             'fields' => 
             array(
              0 => 'client_id',
             ),
             ));
    }
}