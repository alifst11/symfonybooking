<?php 
require_once dirname(__FILE__).'/../bootstrap/unit.php';
 
$t = new lime_test(1);


$t->is(Booking::DoBooking('time',  3, 3, 3), false, 'Response ');


/* $t->pass('Info'); */