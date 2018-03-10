<?php

/**
 * Device form base class.
 *
 * @method Device getObject() Returns the current form's model object
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseDeviceForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'name'       => new sfWidgetFormInputText(),
      'type'       => new sfWidgetFormInputText(),
      'device'     => new sfWidgetFormInputText(),
      'lat'        => new sfWidgetFormInputText(),
      'lon'        => new sfWidgetFormInputText(),
      'city_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => true)),
      'created_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'name'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'type'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'device'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lat'        => new sfValidatorNumber(array('required' => false)),
      'lon'        => new sfValidatorNumber(array('required' => false)),
      'city_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'required' => false)),
      'created_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('device[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Device';
  }

}
