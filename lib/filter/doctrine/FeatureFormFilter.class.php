<?php

/**
 * Feature filter form.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class FeatureFormFilter extends BaseFeatureFormFilter
{
  public function configure()
  {
  	unset( $this['description'], $this['icon_path'], $this['features_list']  );
  }
}
