<?php

/**
 * Girl form base class.
 *
 * @method Girl getObject() Returns the current form's model object
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGirlForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'city_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => true)),
      'name'     => new sfWidgetFormInputText(),
      'content'  => new sfWidgetFormTextarea(),
      'img'      => new sfWidgetFormInputText(),
      'public'   => new sfWidgetFormInputCheckbox(),
      'position' => new sfWidgetFormInputText(),
      'slug'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'city_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 255)),
      'content'  => new sfValidatorString(array('max_length' => 2147483647)),
      'img'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'public'   => new sfValidatorBoolean(array('required' => false)),
      'position' => new sfValidatorInteger(array('required' => false)),
      'slug'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Girl', 'column' => array('position', 'city_id'))),
        new sfValidatorDoctrineUnique(array('model' => 'Girl', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('girl[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Girl';
  }

}
