<?php

//  @TODO: extend sfWebRequest ??

class LinkParser  {

	private $url;

	public function __construct($url) {
		$this->url = $url;
	}


	public function getLinkData() {
		return $this->ParseLink();
	}

	/* Returns only array of errors if there are some errors */
	public static function ValidateSearchRequest( $request, $check_dates = false ) {

		$date_from	= $request->getParameter('date_from');
		$date_to 	= $request->getParameter('date_to');
		$city_name 	= $request->getParameter('city');
		$features 	= $request->getParameter('features');

		$errors = array();
		
		//  City______________ 

			$city = Doctrine_Core::getTable('City')->FindByNameLike($city_name);

			if ( is_object($city) === false ) {

				$error = 'City ' . $request->getParameter('city') . ' not found ... ';
				array_push($errors, $error);
			}
			
			$city_validator = new sfValidatorString(
				array('required' => true),
				array('required' => 'Please enter City to search')
			);
			
			try {
				$city_name = $city_validator->clean($city_name);
			} catch (sfValidatorError $e) {
				 array_push($errors, $e);
			}

		//  Dates______________ 

			if ($check_dates) {
				
				if ( (strlen($date_from) > 1) === false ) {
					array_push($errors, "Please enter date from.");
				}

				if ( (strlen($date_to) > 1) === false ) {
					array_push($errors, "Please enter date to.");
				}

				if ( strtotime($date_from) >= strtotime($date_to) ) {
					array_push($errors, "Bad date range.");
				}

				if ( LinkParser::CheckDate($date_from, '-', true) === false  ) {
					array_push($errors, "Invalid format for date from.");
				}

				if ( LinkParser::CheckDate($date_to, '-', true) === false  ) {
					array_push($errors, "Invalid format for date to.");
				}
			}

		return $errors;
	}



	/* Are there some parameters  in date_from OR date_to in request ? Returns TRUE:FALSE. Does NOT validates dates !! */
	public static function FilterByPeriod( $request ) {

		$date_from	= $request->getParameter('date_from');
		$date_to 	= $request->getParameter('date_to');

			if ( (strlen($date_from) > 1) || (strlen($date_to) > 1)  ) {	
					return true;
				} else {
					return false;
			}
	}




	/* Check is date entry valid for given string & parameters */
	public static function CheckDate($str, $devider, $accept_blank) {

		if ($accept_blank) {
			return true;
		}

		if (strlen($str) >= 1) {
			
			if (substr_count ($str,$devider ) == 3) {
				
				list( $d,$m,$y ) = explode( $devider,$str );
				if(($y >= 10 && $y <= 30) || ($y >= 2011 && $y <= 2020)) {
					return checkdate($m,$d,$y);
				}
			}

		      } else {

			return false;
		}	
	}



	/*
	Returns ()
	  - primary() 	-> only true numeric values
	  - secondary() 	-> true( params ) , false( params)
	
	*/

	private function ParseLink() {

		$var = $this->url;

		$var = parse_url($var, PHP_URL_QUERY);
		$var = html_entity_decode($var);
		$var = explode('&', $var);

		$primary = array();
		$secondary = array();

		$primary_counter = 0;
		$secondary_counter_t = 0;
		$secondary_counter_f = 0;
		$counter = 0;

		/* Parameter offset from start of param ( ? ) */
		$offset = 0;

	   foreach($var as $val ) {
			
		if ($counter > $offset){
				  
			  $x = explode('=', $val);
				  
			/*  Parameter value check */
			if ( is_numeric($x[0]) ) {
						  
					if( $x[1] == "t"  ) {
						$primary[$primary_counter] = $x[0];
						$primary_counter ++;
					 }

				       } else {
					
					$indent = substr( $x[0], 0, 1 );		 /*  <= _X as indentifier and format   */
					$id = substr( $x[0], 1 );  		 	/*   <= Remove indentifier */
					
						if ( is_numeric($id) && ( $indent == "_") ) {
								
							 /*  Is true or false   */
							 if ( $x[1] == "t" ) { 	 
								$secondary['true'][$secondary_counter_t] = $id;
								$secondary_counter_t ++;
							        } else {
								$secondary['false'][$secondary_counter_f] = $id;
								$secondary_counter_f ++;
							 }
						 }
			 }
		 }
		
		$counter++;
	  }	// <= end first ForEach
		
		/* Garbage collector ... */ 
		unset($val, $x, $var);   
		return array_merge( array('primary'=>$primary), array('secondary'=>$secondary) );
	}


}