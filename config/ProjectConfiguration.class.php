<?php

require_once dirname(__FILE__).'/../vendor/symfony/lib/autoload/sfCoreAutoload.class.php';
sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
  public function setup()
  {
    $this->enablePlugins(
		    'sfDoctrinePlugin',
		    'sfDoctrineGuardPlugin',
		    'svAdminBoardPlugin',
		    //'sfDoctrineActAsMetaTaggablePlugin',
		    'csDoctrineActAsSortablePlugin',
		    'eCropPlugin',
		    'sfImageTransformPlugin'
		    //'sfJqueryReloadedPlugin',
		    //'isicsWidgetFormTinyMCEPlugin',
		    //'sfCaptchaGDPlugin'
		    );
    $this->setWebDir($this->getRootDir().'/'.'public_html');
  }
}
