<?php

/**
 * Social filter form base class.
 *
 * @package    erotic-massage-egostudio
 * @subpackage filter
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSocialFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'city_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => true)),
      'twitter'   => new sfWidgetFormFilterInput(),
      'instagram' => new sfWidgetFormFilterInput(),
      'facebook'  => new sfWidgetFormFilterInput(),
      'vk'        => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'city_id'   => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('City'), 'column' => 'id')),
      'twitter'   => new sfValidatorPass(array('required' => false)),
      'instagram' => new sfValidatorPass(array('required' => false)),
      'facebook'  => new sfValidatorPass(array('required' => false)),
      'vk'        => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('social_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Social';
  }

  public function getFields()
  {
    return array(
      'id'        => 'Number',
      'city_id'   => 'ForeignKey',
      'twitter'   => 'Text',
      'instagram' => 'Text',
      'facebook'  => 'Text',
      'vk'        => 'Text',
    );
  }
}
