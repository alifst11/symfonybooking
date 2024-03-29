<?php

/**
 * Period
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @package    sf_sandbox
 * @subpackage model
 * @author     Your name here
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
class Period extends BasePeriod {


	public function getDatesBetween(){

		$from 	= strtotime($this->date_from);
		$to 	= strtotime($this->date_to);
		$dates 	= array();

			while ( $from <= $to) {
				 array_push($dates, $from);
				 $from += 86400;
			}

		return $dates;
	}


}
