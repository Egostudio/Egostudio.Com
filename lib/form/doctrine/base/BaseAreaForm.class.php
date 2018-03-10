<?php

/**
 * Area form base class.
 *
 * @method Area getObject() Returns the current form's model object
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAreaForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'name'    => new sfWidgetFormInputText(),
      'name_en' => new sfWidgetFormInputText(),
      'lat'     => new sfWidgetFormInputText(),
      'lon'     => new sfWidgetFormInputText(),
      'public'  => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'    => new sfValidatorString(array('max_length' => 255)),
      'name_en' => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lat'     => new sfValidatorNumber(array('required' => false)),
      'lon'     => new sfValidatorNumber(array('required' => false)),
      'public'  => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('area[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Area';
  }

}
