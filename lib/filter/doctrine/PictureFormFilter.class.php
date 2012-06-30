<?php

/**
 * Picture filter form.
 *
 * @package    Adriatic.hr tecaj projekt
 * @subpackage filter
 * @author     Tino
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class PictureFormFilter extends BasePictureFormFilter
{
  public function configure()
  {
  	unset( $this['path'], $this['name'], $this['description'], $this['type'] );
  }
}
