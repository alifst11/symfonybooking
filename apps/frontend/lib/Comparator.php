<?php 

/*	Comparator::parse_link('link_value','case_type')
		Returns apartments on -> results() in parent;

	Comparator::parse_session('session values')
		Returns apartments on -> results() in parent;

*/

class Comparator {

	public static function parse_link( $link=0, $link_type) {
		switch($link_type) {
			case "simple":
				return new SimpleComparator($link);
			case "expanded":
				return new BudgetAdventureLuxuryComparator($link);
			default:
				throw new Exception("Invalid comparation type");
		}
	}

	public static function parse_session($session) {
			return new SesionParserAndComparator($session);
	}

}