<?php 

/* 

Get top 3 apartments from data in url 


*/


class SimpleComparator {

	private $data;

	public function __construct($input) {
		$this->data = $input;
          	}


	protected function analyze() {

		/* Yust pass variables in this case */
		return $this->data;
	}


	public function results() {

                  /*  $ids = $this->analyze();
                    $apids = ApartmentComparation::FindAppsByFeatures($ids); 
                    return $apids; */

                    // return $this->analyze();
                    return $this->analyze();
	}

 }