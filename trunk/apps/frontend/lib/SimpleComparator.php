<?php 

/*    */

class SimpleComparator {
                
	private $ur;

	public function __construct($url) {
		$this->url = $url;
          	}

	protected function analyze() {
		/* Geting all apartment ids from url */
		$ids = ComparationEngine::ParseLink($this->url);

		/* Returning only values in in format 3=t only true */
		return $ids['primary'];
	}

	public function results() {
                    $ids = $this->analyze();
                    $apids = ApartmentComparation::FindAppsByFeatures($ids); 
                    return $apids;
	}
	
 }