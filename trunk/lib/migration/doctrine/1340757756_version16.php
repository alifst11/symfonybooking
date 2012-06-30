<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version16 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->createForeignKey('picture', 'picture_apartment_id_apartment_id', array(
             'name' => 'picture_apartment_id_apartment_id',
             'local' => 'apartment_id',
             'foreign' => 'id',
             'foreignTable' => 'apartment',
             ));
        $this->addIndex('picture', 'picture_apartment_id', array(
             'fields' => 
             array(
              0 => 'apartment_id',
             ),
             ));
    }

    public function down()
    {
        $this->dropForeignKey('picture', 'picture_apartment_id_apartment_id');
        $this->removeIndex('picture', 'picture_apartment_id', array(
             'fields' => 
             array(
              0 => 'apartment_id',
             ),
             ));
    }
}