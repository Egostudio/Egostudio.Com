<?php

/**
 * Social form base class.
 *
 * @method Social getObject() Returns the current form's model object
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSocialForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'        => new sfWidgetFormInputHidden(),
      'city_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => true)),
      'twitter'   => new sfWidgetFormInputText(),
      'instagram' => new sfWidgetFormInputText(),
      'facebook'  => new sfWidgetFormInputText(),
      'vk'        => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'        => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'city_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'required' => false)),
      'twitter'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'instagram' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'facebook'  => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'vk'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('social[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Social';
  }

}
