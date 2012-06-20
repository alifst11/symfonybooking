<?php 

/*    */

class SesionParserAndComparator {

	private $session;

	public function __construct($session) {
		$this->session = $session;
	}

	protected function analyze() {
		return "Analyze session data";
	}
	
	public function results() {
		return "Apartments as results SesionParserAndComparator rules";
	}

}