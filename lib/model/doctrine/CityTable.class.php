<?php

/**
 * CityTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class CityTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object CityTable
     */
	public static function getInstance() {
		return Doctrine_Core::getTable('City');
	}


	public function FindByNameLike($name) {
	      
		 $q = $this->createQuery('c')
			->where('name LIKE ?', $name);

		 return $q->fetchOne();
	}


}