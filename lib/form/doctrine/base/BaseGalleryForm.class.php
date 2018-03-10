<?php

/**
 * Gallery form base class.
 *
 * @method Gallery getObject() Returns the current form's model object
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseGalleryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'name'     => new sfWidgetFormInputText(),
      'img'      => new sfWidgetFormInputText(),
      'public'   => new sfWidgetFormInputCheckbox(),
      'position' => new sfWidgetFormInputText(),
      'slug'     => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'     => new sfValidatorString(array('max_length' => 255)),
      'img'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'public'   => new sfValidatorBoolean(array('required' => false)),
      'position' => new sfValidatorInteger(array('required' => false)),
      'slug'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorAnd(array(
        new sfValidatorDoctrineUnique(array('model' => 'Gallery', 'column' => array('position'))),
        new sfValidatorDoctrineUnique(array('model' => 'Gallery', 'column' => array('slug'))),
      ))
    );

    $this->widgetSchema->setNameFormat('gallery[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Gallery';
  }

}
