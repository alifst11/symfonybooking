<?php


class ApartmentComparationTable extends Doctrine_Table {
    

public function GetAppIdsByFeature( $id, $limit=5 ) {

    $q = $this->createQuery('ac')
         ->select('ac.apartment_id')
         ->where('ac.feature_' . $id . ' = ?', 1)
         ->limit($limit)
         ->setHydrationMode(Doctrine_Core::HYDRATE_SINGLE_SCALAR);

    return  $q->execute();
}







    /**
     * Returns an instance of this class.
     *
     * @return object ApartmentFeatureTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('ApartmentComparation');
    }


    
}