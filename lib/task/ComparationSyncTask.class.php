<?php

class ComparationSyncTask extends sfBaseTask
{
  protected function configure()
  {
    // // add your own arguments here
    // $this->addArguments(array(
    //   new sfCommandArgument('my_arg', sfCommandArgument::REQUIRED, 'My argument'),
    // ));

    $this->addOptions(array(
      new sfCommandOption('application', null, sfCommandOption::PARAMETER_REQUIRED, 'The application name'),
      new sfCommandOption('env', null, sfCommandOption::PARAMETER_REQUIRED, 'The environment', 'dev'),
      new sfCommandOption('connection', null, sfCommandOption::PARAMETER_REQUIRED, 'The connection name', 'doctrine'),
      // add your own options here
    ));

    $this->namespace        = '';
    $this->name             = 'ComparationSync';
    $this->briefDescription = '';
    $this->detailedDescription = <<<EOF
The [ComparationSync|INFO] task does things.
Call it with:

  [php symfony ComparationSync|INFO]
EOF;
  }

protected function execute( $arguments = array(), $options = array() )  {

       /* $q->setHydrationMode(Doctrine_Core::HYDRATE_SINGLE_SCALAR); */

      $databaseManager = new sfDatabaseManager($this->configuration);
      $connection = $databaseManager->getDatabase($options['connection'])->getConnection();
    $this->logBlock("Connected to database. \n ", 'INFO');

    /* Get all feature ID */
    $q = Doctrine::getTable('Feature')->createQuery('a')->select('a.id, a.name');
    $features = $q->execute();

    /* Get all apartments */
    $app_q = Doctrine::getTable('Apartment')->createQuery('a')->select('a.id, a.name');
    $apartments = $app_q->execute();

    /* Get index data */
    $table = Doctrine::getTable('ApartmentComparation');
    $columns = $table ->getColumns();




$this->logBlock(" \n Checking apartments... \n ", 'INFO');


foreach ($apartments as $apartment) {


        $this->logBlock( '-> Checking apartment: ' . $apartment['id'] . ' - ' . $apartment['name'] , 'INFO');

        $aq = Doctrine::getTable('ApartmentFeature')->createQuery('a')
               ->select( 'a.feature_id' )->where( 'a.apartment_id = ?', $apartment['id'] );
        $features = $aq->execute();
         
         $q = Doctrine::getTable('ApartmentComparation')->createQuery('a')
              ->select( 'a.id' )->where('a.apartment_id = ?',  $apartment['id'])
              ->setHydrationMode(Doctrine_Core::HYDRATE_SINGLE_SCALAR);
         $result = $q->execute();
              
            if ( empty($result) === false ) {

                   $this->logBlock( '  Index table exist. Checking features... ', 'INFO');
                   
                   $qr =  $q = Doctrine_Query::create()
                                    ->from('ApartmentComparation a')
                                    ->where('a.apartment_id = ?', $apartment['id']);
                   $record = $qr->fetchOne();
                  
                   foreach ($features as $feature) {

                        $tmp_feature = 'feature_' . $feature['feature_id'];
                        
                        if ( $record-> $tmp_feature  == '1' ) {
                            $this->logBlock( '     Feature: ' . $feature['feature_id'] . ' exist in index.' , 'INFO');
                        } else {
                                $record-> $tmp_feature  = '1';
                                $record->save();
                                $this->logBlock( '     Feature: ' . $feature['feature_id'] . ' added to index.' , 'INFO');
                        }
                         

                        
                      
                       }


                } else {

                    $this->logBlock( '  There is no index table for apartment. Will be created ! ', 'INFO');

                    $index = new ApartmentComparation();
                    $index->Apartment = $apartment;
                    $index -> save();
                }



          


}




/*
    $this->logBlock('Listing all features ... ', 'INFO');
   

    

    $this->logBlock( "\n" , 'INFO');


    

    $this->logBlock('Listing all columns ... ', 'INFO');
    
    foreach ($columns as $column => $name) {
      $this->log( 'Column name: '.  $column );
    }

     */






/*
    $answer = $this->ask('Would you like to sync columns ?');
    if ($answer === "y") {
          $this->log( 'Nice  '.  $answer );
        } else {
          $this->log( 'Nevermind ...  ' );
    }
  */        

  }





}
