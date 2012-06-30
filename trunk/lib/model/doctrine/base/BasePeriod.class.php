<?php

/**
 * BasePeriod
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $apartment_id
 * @property date $date_from
 * @property date $date_to
 * @property float $price
 * @property Apartment $Apartment
 * 
 * @method integer   getApartmentId()  Returns the current record's "apartment_id" value
 * @method date      getDateFrom()     Returns the current record's "date_from" value
 * @method date      getDateTo()       Returns the current record's "date_to" value
 * @method float     getPrice()        Returns the current record's "price" value
 * @method Apartment getApartment()    Returns the current record's "Apartment" value
 * @method Period    setApartmentId()  Sets the current record's "apartment_id" value
 * @method Period    setDateFrom()     Sets the current record's "date_from" value
 * @method Period    setDateTo()       Sets the current record's "date_to" value
 * @method Period    setPrice()        Sets the current record's "price" value
 * @method Period    setApartment()    Sets the current record's "Apartment" value
 * 
 * @package    Adriatic.hr tecaj projekt
 * @subpackage model
 * @author     Tino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BasePeriod extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('period');
        $this->hasColumn('apartment_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('date_from', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('date_to', 'date', null, array(
             'type' => 'date',
             'notnull' => true,
             ));
        $this->hasColumn('price', 'float', null, array(
             'type' => 'float',
             'notnull' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Apartment', array(
             'local' => 'apartment_id',
             'foreign' => 'id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}