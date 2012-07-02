<?php

//  extends sfWebRequest ??

class LinkParser  {

	private $url;

	public function __construct($url) {
		$this->url = $url;
	}


	public function getLinkData() {
		return $this->ParseLink();
	}


	public static function ValidateSearchRequest( $request ) {

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

		return $errors;
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
						  
				 if ( $x[1] == "t"  ) {
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