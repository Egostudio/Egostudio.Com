<?php

class sfWidgetFormDatePickers extends sfWidgetForm
{
  protected function configure($options = array(), $attributes = array())
  {
    $this->addRequiredOption('type');

    // to maintain BC with symfony 1.2
    $this->setOption('type', 'text');
  }

  public function render($name, $value = null, $attributes = array(), $errors = array())
  {
    $attributes = array(
            'class'=>'form-control form-control-inline input-medium date-picker', 
            'data-date-start-date'=>'-3d', 
            'data-date-format'=>'yyyy-mm-dd',
            'data-date-language'=>'en'
            );
    
    return $this->renderTag('input', array_merge(array('type' => $this->getOption('type'), 'name' => $name, 'value' => $value), $attributes));
  }

  public function getStylesheets()
  {
    return array('/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css'=>'screen');
  }
  public function getJavascripts()
  {
    return array(
        '/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js',
//        '/assets/global/plugins/bootstrap-datepicker/js/locales/bootstrap-datepicker.ru.min.js',
        );
  }
  
}

//    use_stylesheet('/assets/global/plugins/clockface/css/clockface.css','last');
//    use_stylesheet('/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css','last');
//    use_stylesheet('/assets/global/plugins/bootstrap-timepicker/css/bootstrap-timepicker.min.css','last');
//    use_stylesheet('/assets/global/plugins/bootstrap-colorpicker/css/colorpicker.css','last');
//    use_stylesheet('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css','last');
//    use_stylesheet('/assets/global/plugins/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css','last');

//    use_javascript('/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js','last');
//    use_javascript('/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js','last');
//    use_javascript('/assets/global/plugins/clockface/js/clockface.js','last');
//    use_javascript('/assets/global/plugins/bootstrap-daterangepicker/moment.min.js','last');
//    use_javascript('/assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js','last');
//    use_javascript('/assets/global/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js','last');
//    use_javascript('/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js','last');
