<?php

class backendConfiguration extends sfApplicationConfiguration
{
  public function configure()
  {
  }
  public function setup()
  {
    parent::setup();
    //$this->enablePlugins('isicsWidgetFormTinyMCEPlugin');	
    sfValidatorBase::setDefaultMessage('required', 'Не заполнено поле');
  }  
  
}
