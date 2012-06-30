<?php

/**
 * BaseApartment
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $city_id
 * @property integer $max_pax
 * @property string $name
 * @property string $description
 * @property decimal $g_lat
 * @property decimal $g_lon
 * @property City $City
 * @property Doctrine_Collection $Period
 * @property Doctrine_Collection $Feature
 * @property Doctrine_Collection $Pictures
 * @property Doctrine_Collection $Apartment
 * 
 * @method integer             getCityId()           Returns the current record's "city_id" value
 * @method integer             getMaxPax()           Returns the current record's "max_pax" value
 * @method string              getName()             Returns the current record's "name" value
 * @method string              getDescription()      Returns the current record's "description" value
 * @method decimal             getGLat()             Returns the current record's "g_lat" value
 * @method decimal             getGLon()             Returns the current record's "g_lon" value
 * @method City                getCity()             Returns the current record's "City" value
 * @method Doctrine_Collection getPeriod()           Returns the current record's "Period" collection
 * @method Doctrine_Collection getFeature()          Returns the current record's "Feature" collection
 * @method Doctrine_Collection getPictures()         Returns the current record's "Pictures" collection
 * @method Doctrine_Collection getApartmentFeature() Returns the current record's "ApartmentFeature" collection
 * @method Doctrine_Collection getApartment()        Returns the current record's "Apartment" collection
 * @method Apartment           setCityId()           Sets the current record's "city_id" value
 * @method Apartment           setMaxPax()           Sets the current record's "max_pax" value
 * @method Apartment           setName()             Sets the current record's "name" value
 * @method Apartment           setDescription()      Sets the current record's "description" value
 * @method Apartment           setGLat()             Sets the current record's "g_lat" value
 * @method Apartment           setGLon()             Sets the current record's "g_lon" value
 * @method Apartment           setCity()             Sets the current record's "City" value
 * @method Apartment           setPeriod()           Sets the current record's "Period" collection
 * @method Apartment           setFeature()          Sets the current record's "Feature" collection
 * @method Apartment           setPictures()         Sets the current record's "Pictures" collection
 * @method Apartment           setApartmentFeature() Sets the current record's "ApartmentFeature" collection
 * @method Apartment           setApartment()        Sets the current record's "Apartment" collectionFeature
 * @property Doctrine_Collection $Apartment
 * 
 * @method integer             getCityId()           Returns the current record's "city_id" value
 * @method integer             getMaxPax()           Returns the current record's "max_pax" value
 * @method string              getName()             Returns the current record's "name" value
 * @method string              getDescription()      Returns the current record's "description" value
 * @method decimal             getGLat()             Returns the current record's "g_lat" value
 * @method decimal             getGLon()             Returns the current record's "g_lon" value
 * @method City                getCity()             Returns the current record's "City" value
 * @method Doctrine_Collection getPeriod()           Returns the current record's "Period" collection
 * @method Doctrine_Collection getFeature()          Returns the current record's "Feature" collection
 * @method Doctrine_Collection getPictures()         Returns the current record's "Pictures" collection
 * @method Doctrine_Collection getApartmentFeature() Returns the current record's "ApartmentFeature" collection
 * @method Doctrine_Collection getApartment()        Returns the current record's "Apartment" collection
 * @method Apartment           setCityId()           Sets the current record's "city_id" value
 * @method Apartment           setMaxPax()           Sets the current record's "max_pax" value
 * @method Apartment           setName()             Sets the current record's "name" value
 * @method Apartment           setDescription()      Sets the current record's "description" value
 * @method Apartment           setGLat()             Sets the current record's "g_lat" value
 * @method Apartment           setGLon()             Sets the current record's "g_lon" value
 * @method Apartment           setCity()             Sets the current record's "City" value
 * @method Apartment           setPeriod()           Sets the current record's "Period" collection
 * @method Apartment           setFeature()          Sets the current record's "Feature" collection
 * @method Apartment           setPictures()         Sets the current record's "Pictures" collection
 * @method Apartment           setApartmentFeature() Sets the current record's "ApartmentFeature" collection
 * @method Apartment           setApartment()        Sets the current record's "Apartment" collection
 * 
 * @package    Adriatic.hr tecaj projekt
 * @subpackage model
 * @author     Tino
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseApartment extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('apartment');
        $this->hasColumn('city_id', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('max_pax', 'integer', null, array(
             'type' => 'integer',
             'notnull' => true,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('description', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('g_lat', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 6,
             'length' => 10,
             ));
        $this->hasColumn('g_lon', 'decimal', 10, array(
             'type' => 'decimal',
             'scale' => 6,
             'length' => 10,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('City', array(
             'local' => 'city_id',
             'foreign' => 'id'));

        $this->hasMany('Period', array(
             'local' => 'id',
             'foreign' => 'apartment_id'));

        $this->hasMany('Feature', array(
             'refClass' => 'ApartmentFeature',
             'local' => 'apartment_id',
             'foreign' => 'feature_id'));

        $this->hasMany('Picture as Pictures', array(
             'local' => 'id',
             'foreign' => 'apartment_id'));

        $this->hasMany('ApartmentFeature', array(
             'local' => 'id',
             'foreign' => 'apartment_id'));

        $this->hasMany('Booking as Apartment', array(
             'local' => 'id',
             'foreign' => 'apartment_id'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}