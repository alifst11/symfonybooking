<?php

class ActivityTracking extends sfWebRequest {

    /* @TODO: Add url variables in class   */


	/* User activity tracking in session.*/
	public function TrackVisitedApartments( $old_apids ){

	       	if ( $this->hasParameter('id') ) {
			
			(int)$id =  $this->getParameter('id'); 
			
			$new_ids = ActivityTracking::SetCookie($old_apids, $id);
			return $new_ids;
		 } 
	}


	public static function getCleanApids( $raw_apids ){

	 	$new_apids  = array();

	    	 for ($i=0; $i < count($raw_apids);  $i++) { 
		     $new_apids[$i] = $raw_apids[$i]['apid'];
			}

		return array_unique($new_apids);

	}


	/* Setting array for session */
	public static function SetCookie($old_apids=array(), $id) {

		$index = count($old_apids);

		$old_apids[$index]['apid'] = (int)$id;
		$old_apids[$index]['time'] = time();

		return $old_apids;
	}


}