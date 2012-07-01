<?php

class ComparationSyncTask extends sfBaseTask {
	
	protected function configure() {
		
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
		Call it with:[php symfony ComparationSync|INFO]
EOF;
	}


	protected static function CheckFeatures($app_id){

		$aq = Doctrine::getTable('ApartmentFeature')->createQuery('af')
				->select( 'af.feature_id' )->where( 'af.apartment_id = ?', $app_id );
		$features = $aq->execute();

 		$qr  = Doctrine_Query::create()
				->from('ApartmentComparation ac')
				->where('ac.apartment_id = ?', $app_id);
		$record = $qr->fetchOne();

				foreach ($features as $feature) {
					
					$tmp_feature = 'feature_' . $feature['feature_id'];
													
							if ( $record-> $tmp_feature  == '1' ) {
									echo("Feature: "  . $feature['feature_id'] . " exist in index. \n ");
								    } else {
									$record-> $tmp_feature  = '1';
									$record->save();
									echo('Feature: ' . $feature['feature_id'] .  " added to index. \n");
							}
				}
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

				$this->logBlock( "\n" , 'INFO');
				$this->logBlock('-> Checking apartment: ' . $apartment['id'] . ' - ' . $apartment['name'] , 'INFO');

				$aq = Doctrine::getTable('ApartmentFeature')->createQuery('af')
						->select( 'af.feature_id' )->where( 'af.apartment_id = ?', $apartment['id'] );
				$features = $aq->execute();
							 
				$q = Doctrine::getTable('ApartmentComparation')->createQuery('ac')
						->select( 'ac.id' )->where('ac.apartment_id = ?',  $apartment['id'])
						->setHydrationMode(Doctrine_Core::HYDRATE_SINGLE_SCALAR);
				$result = $q->execute();

					// Is there index table for apartment ?
					if ( empty($result) === false ) {

						ComparationSyncTask::CheckFeatures($apartment['id']);

						    } else {

							$this->logBlock( '  There is no index record for apartment. Creating & checking features ... ', 'INFO');

							$index = new ApartmentComparation();
							$index->Apartment = $apartment;
							$index -> save();

							// Check features
							ComparationSyncTask::CheckFeatures($apartment['id']);
					}
			}
	}
}
