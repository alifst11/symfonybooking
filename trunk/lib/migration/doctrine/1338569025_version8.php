<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class Version8 extends Doctrine_Migration_Base
{
    public function up()
    {
        $this->addColumn('apartment', 'g_lat', 'decimal', '10', array(
             'scale' => '6',
             ));
        $this->addColumn('apartment', 'g_lon', 'decimal', '10', array(
             'scale' => '6',
             ));
    }

    public function down()
    {

    }
}