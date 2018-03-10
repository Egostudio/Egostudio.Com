<?php

/**
 * Area filter form base class.
 *
 * @package    erotic-massage-egostudio
 * @subpackage filter
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseAreaFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'name'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_en' => new sfWidgetFormFilterInput(),
      'lat'     => new sfWidgetFormFilterInput(),
      'lon'     => new sfWidgetFormFilterInput(),
      'public'  => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'name'    => new sfValidatorPass(array('required' => false)),
      'name_en' => new sfValidatorPass(array('required' => false)),
      'lat'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lon'     => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'public'  => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('area_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Area';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'name'    => 'Text',
      'name_en' => 'Text',
      'lat'     => 'Number',
      'lon'     => 'Number',
      'public'  => 'Boolean',
    );
  }
}
