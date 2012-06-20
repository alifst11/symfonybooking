<?php

class ComparationEngine extends sfWebRequest {


/* User activity tracking in session.*/
public function TrackVisitedApartments( $old_apids ){

       if ( $this->hasParameter('id') ) {
		
		(int)$id =  $this->getParameter('id'); 
		
		$new_ids = ComparationEngine::SetCookie($old_apids, $id);
		return $new_ids;
	} 


}


/* Returns param values for param names  */
public function GetParams( $params=array() ){

	$results = array();

	foreach ($params as $name => $value) {
		
		if ( $this->hasParameter($value) ) {

			array_push($results, array($value => $this->getParameter($value)) );
		}
	}

	return $results;
}


/* Setting array for session */
public static function SetCookie($old_apids=array(), $id) {

	$index = count($old_apids);

	$old_apids[$index]['apid'] = (int)$id;
	$old_apids[$index]['time'] = time();

	return $old_apids;
}


public static function GetFeatures($params){

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


public static function ParseLink($var){

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
	 if ( is_numeric($x[0]) ){
				  
		 if ( $x[1] == "t"  ) {
			$primary[$primary_counter] = $x[0];
			 $primary_counter ++;
		 }

	   } else {
			$indent = substr( $x[0], 0, 1 );		 /*  <= _X as indentifier and format   */
			$id = substr( $x[0], 1 );  		 /*  <= Remove indentifier */
			
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
}	
	/* Garbage collector :) */ 
	unset($val, $x, $var);   
   	return array_merge( array('primary'=>$primary), array('secondary'=>$secondary) );
}





}