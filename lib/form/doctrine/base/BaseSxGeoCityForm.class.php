<?php

/**
 * SxGeoCity form base class.
 *
 * @method SxGeoCity getObject() Returns the current form's model object
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseSxGeoCityForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'region_id'     => new sfWidgetFormInputText(),
      'area_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Area'), 'add_empty' => true)),
      'name'          => new sfWidgetFormInputText(),
      'name_en'       => new sfWidgetFormInputText(),
      'address'       => new sfWidgetFormInputText(),
      'lat'           => new sfWidgetFormInputText(),
      'lon'           => new sfWidgetFormInputText(),
      'okato'         => new sfWidgetFormInputText(),
      'public'        => new sfWidgetFormInputCheckbox(),
      'public_active' => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'region_id'     => new sfValidatorInteger(array('required' => false)),
      'area_id'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Area'), 'required' => false)),
      'name'          => new sfValidatorString(array('max_length' => 255)),
      'name_en'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'address'       => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'lat'           => new sfValidatorNumber(array('required' => false)),
      'lon'           => new sfValidatorNumber(array('required' => false)),
      'okato'         => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'public'        => new sfValidatorBoolean(array('required' => false)),
      'public_active' => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('sx_geo_city[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SxGeoCity';
  }

}
