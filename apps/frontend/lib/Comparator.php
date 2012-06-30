<?php 

/*	 Comparator::analyze_link('case_type')
		Returns apartments on -> results() in parent;

	 Comparator::analyze_session('session values')
		Returns apartments on -> results() in parent;

*/

class Comparator {

	private $url_data, $url;

	public function __construct( $url, $user = null ) {

		$this->url = $url;

		$results = new LinkParser($url);
		$this->url_data = $results->getLinkData();
	 }



	public function analyze_link($link_type) {
		
		switch($link_type) {

			case "simple":
				return new SimpleComparator( $this->getOnlyTrueFeatures() );
			case "expanded":
				return new BudgetAdventureLuxuryComparator( $this->url_data );
			default:
				throw new Exception("Invalid comparation type");
		}
	 }



	public static function analyze_session($session) {

		return new SesionParserAndComparator($session);
	
	 }



	public function getResults() {
		return $this->url_data;
	 }

	public function getUrl() {
		return $this->url;
	 }



	 /* Returns only true feature ids from link */
	public function getOnlyTrueFeatures() {

		$params = $this->url_data;

		$results = $params['primary'];
		$counter = 0;

		if ( isset($params['secondary']) ) {

			if ( isset($params['secondary']['true']) ) {
				for ($i=0; $i < count( $params['secondary']['true'] ) ; $i++) { 
					/* Add all secondary true values */
					if (  in_array($params['secondary']['true'][$i], $params['primary'] ) === false ) {	
						array_push($results, $params['secondary']['true'][$i]);
					}	
				}
			}
			
			if ( isset($params['secondary']['false'])  ) {
				for ($i=0; $i < count($results) ; $i++) { 
					/* Remove all secondary false values */
					if (  in_array($results[$i], $params['secondary']['false'] )  ) {	
						unset($results[$i]);
					}	
				}
			}
		}
		
		return $results ;
	 }
 




}
