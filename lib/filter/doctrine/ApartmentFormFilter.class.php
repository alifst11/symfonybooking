<?php

/**
 * Apartment filter form.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ApartmentFormFilter extends BaseApartmentFormFilter
{
  public function configure()
  {
  	unset( $this['description'], $this['g_lat'], $this['g_lon'] );

  }
}
