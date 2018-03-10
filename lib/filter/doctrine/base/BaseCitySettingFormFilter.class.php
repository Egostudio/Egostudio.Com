<?php

/**
 * CitySetting filter form base class.
 *
 * @package    erotic-massage-egostudio
 * @subpackage filter
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCitySettingFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'setting_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Cities'), 'add_empty' => true)),
      'telephone'  => new sfWidgetFormFilterInput(),
      'telephone2' => new sfWidgetFormFilterInput(),
      'twitter'    => new sfWidgetFormFilterInput(),
      'instagram'  => new sfWidgetFormFilterInput(),
      'facebook'   => new sfWidgetFormFilterInput(),
      'vk'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'setting_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Cities'), 'column' => 'id')),
      'telephone'  => new sfValidatorPass(array('required' => false)),
      'telephone2' => new sfValidatorPass(array('required' => false)),
      'twitter'    => new sfValidatorPass(array('required' => false)),
      'instagram'  => new sfValidatorPass(array('required' => false)),
      'facebook'   => new sfValidatorPass(array('required' => false)),
      'vk'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('city_setting_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CitySetting';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'setting_id' => 'ForeignKey',
      'telephone'  => 'Text',
      'telephone2' => 'Text',
      'twitter'    => 'Text',
      'instagram'  => 'Text',
      'facebook'   => 'Text',
      'vk'         => 'Text',
    );
  }
}
