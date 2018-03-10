<?php

/**
 * CitySetting form base class.
 *
 * @method CitySetting getObject() Returns the current form's model object
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCitySettingForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'setting_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cities'), 'add_empty' => true)),
      'telephone'  => new sfWidgetFormInputText(),
      'telephone2' => new sfWidgetFormInputText(),
      'twitter'    => new sfWidgetFormInputText(),
      'instagram'  => new sfWidgetFormInputText(),
      'facebook'   => new sfWidgetFormInputText(),
      'vk'         => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'setting_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Cities'), 'required' => false)),
      'telephone'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'telephone2' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'twitter'    => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'instagram'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'facebook'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'vk'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('city_setting[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CitySetting';
  }

}
