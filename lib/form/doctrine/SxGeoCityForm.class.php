<?php

/**
 * SxGeoCity form.
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SxGeoCityForm extends BaseSxGeoCityForm
{
  public function configure()
  {
    //unset($this['region_id']);
    
    $this->widgetSchema['name']->setAttributes(array(
        'class'=>'form-control input-inline  ',
        'style'=>'width:450px; background-color: #FFFFF5;',
        'placeholder'=>'Введите наименование')
    );

    $this->widgetSchema['name_en']->setAttributes(array(
        'class'=>'form-control input-inline ',
        'style'=>'width:450px;',
        'placeholder'=>'Введите наименование')
    ); 
    $this->widgetSchema['address']->setAttributes(array('class'=>'form-control input-inline ','style'=>'width:500px;'));

  }
}
class SxGeoCityAdminForm extends SxGeoCityForm
{
  public function configure()
  {
    unset($this['public']);
  }
}


class SxGeoCitySettingsForm extends BaseSxGeoCityForm
{
  public function configure()
  {
    $this->useFields(array('id','public'));

    $object = Doctrine_Core::getTable('CitySetting')
        ->findOneBySettingId($this->getObject()->getId());
    $_CitySettingForm = new CitySettingForm($object);
    $this->mergeForm($_CitySettingForm);
  }

  public function save($conn=null)
  {
    $object = Doctrine::getTable('CitySetting')->createQuery('s')
        ->where('s.setting_id = ?',$this->getObject()->getId())
        ->fetchOne();

    if(count($object)==1){
        $citySettingObject = new CitySetting();
        $citySettingObject->setSettingId($this->getObject()->getId());
        $citySettingObject->setTelephone($this->getValue('telephone')); 
        $citySettingObject->setTelephone2($this->getValue('telephone2')); 

        $citySettingObject->setTwitter($this->getValue('twitter'));        
        $citySettingObject->setInstagram($this->getValue('instagram'));        
        $citySettingObject->setFacebook ($this->getValue('facebook'));        
        $citySettingObject->setVk($this->getValue('vk'));  
        
        $citySettingObject->save();
    }
    else
    {
        $object->setTelephone($this->getValue('telephone'));
        $object->setTelephone2($this->getValue('telephone2'));

        $object->setTwitter($this->getValue('twitter'));        
        $object->setInstagram($this->getValue('instagram'));        
        $object->setFacebook ($this->getValue('facebook'));        
        $object->setVk($this->getValue('vk'));  
        
        $object->save();
    }   
    
    return parent::save($conn);  
  }  
}
