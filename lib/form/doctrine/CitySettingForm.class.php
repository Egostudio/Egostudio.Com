<?php

/**
 * CitySetting form.
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CitySettingForm extends BaseCitySettingForm
{
  public function configure()
  {
    unset($this['setting_id'],$this['id']);

    $this->widgetSchema['telephone']->setAttributes(array('class'=>'form-control input-inline ','style'=>'width:500px;'));
    $this->widgetSchema['telephone2']->setAttributes(array('class'=>'form-control input-inline ','style'=>'width:500px;'));
    $this->widgetSchema['twitter']->setAttributes(array('class'=>'form-control input-inline ','style'=>'width:500px;'));
    $this->widgetSchema['instagram']->setAttributes(array('class'=>'form-control input-inline ','style'=>'width:500px;'));
    $this->widgetSchema['facebook']->setAttributes(array('class'=>'form-control input-inline ','style'=>'width:500px;'));
    $this->widgetSchema['vk']->setAttributes(array('class'=>'form-control input-inline ','style'=>'width:500px;'));
    
  }
}
