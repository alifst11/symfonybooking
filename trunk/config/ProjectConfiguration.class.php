<?php

require_once dirname(__FILE__).'/../lib/vendor/symfony/lib/autoload/sfCoreAutoload.class.php';

 sfCoreAutoload::register();

 class ProjectConfiguration extends sfProjectConfiguration {
  
  public function setup() {
    $this->enablePlugins('sfDoctrinePlugin');
    $this->enablePlugins('sfDoctrineGuardPlugin');
    $this->enablePlugins('sfImageTransformPlugin');
  }

 public function configureDoctrine(Doctrine_Manager $manager) {
    $manager->setAttribute(Doctrine_Core::ATTR_RESULT_CACHE, new Doctrine_Cache_Array());
  }
  
}
