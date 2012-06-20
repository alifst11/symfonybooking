<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

/*
$browser->
  post('/booking/new')->

  with('request')->begin()->
    isParameter('module', 'booking')->
    isParameter('action', 'NewBooking')->
  end()->

  with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '!/This is a temporary page/')->
  end()
;
*/
