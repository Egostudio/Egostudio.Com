<?php

class sfValidatorTimePickers extends sfValidatorBase
{

  protected function configure($options = array(), $messages = array())
  {
    $this->addMessage('max_length', '"%value%" is too long (%max_length% characters max).');
    $this->addMessage('min_length', '"%value%" is too short (%min_length% characters min).');

    $this->addOption('max_length');
    $this->addOption('min_length');

    $this->setOption('empty_value', '');
  }

  protected function doClean($value)
  {
    $clean = (string) $value;

    $length = function_exists('mb_strlen') ? mb_strlen($clean, $this->getCharset()) : strlen($clean);

    if ($this->hasOption('max_length') && $length > $this->getOption('max_length'))
    {
      throw new sfValidatorError($this, 'max_length', array('value' => $value, 'max_length' => $this->getOption('max_length')));
    }

    if ($this->hasOption('min_length') && $length < $this->getOption('min_length'))
    {
      throw new sfValidatorError($this, 'min_length', array('value' => $value, 'min_length' => $this->getOption('min_length')));
    }

    return $clean;
  }

}
