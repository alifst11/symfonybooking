<?php

/**
 * sfGuardUser filter form.
 *
 * @package    sf_sandbox
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrinePluginFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class sfGuardUserFormFilter extends PluginsfGuardUserFormFilter
{
  public function configure()
  {
  	unset( $this['last_login'], $this['username'], $this['algorithm'], $this['password'], $this['salt'] );
  }
}
