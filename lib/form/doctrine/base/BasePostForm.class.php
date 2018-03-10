<?php

/**
 * Post form base class.
 *
 * @method Post getObject() Returns the current form's model object
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BasePostForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'anonce'     => new sfWidgetFormTextarea(),
      'text'       => new sfWidgetFormTextarea(),
      'img'        => new sfWidgetFormInputText(),
      'title'      => new sfWidgetFormInputText(),
      'keywords'   => new sfWidgetFormInputText(),
      'metadesc'   => new sfWidgetFormTextarea(),
      'public'     => new sfWidgetFormInputCheckbox(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
      'slug'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255)),
      'anonce'     => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'text'       => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'img'        => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'title'      => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'keywords'   => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'metadesc'   => new sfValidatorString(array('max_length' => 2147483647, 'required' => false)),
      'public'     => new sfValidatorBoolean(array('required' => false)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
      'slug'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
    ));

    $this->validatorSchema->setPostValidator(
      new sfValidatorDoctrineUnique(array('model' => 'Post', 'column' => array('slug')))
    );

    $this->widgetSchema->setNameFormat('post[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Post';
  }

}
