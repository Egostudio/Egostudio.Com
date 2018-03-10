<?php

class sfWidgetFormTimePickers extends sfWidgetForm
{
  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption('type');

    // to maintain BC with symfony 1.2
    $this->setOption('type', 'text');
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $attributes = array('class'=>'form-control timepicker timepicker-24');
    
    return $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes));
  }

  public function getStylesheets()
  {
    return array('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css'=>'screen');
  }
  public function getJavascripts()
  {
    return array('/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js');
  }
  
}
