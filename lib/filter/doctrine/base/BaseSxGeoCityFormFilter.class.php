<?php

/**
 * SxGeoCity filter form base class.
 *
 * @package    erotic-massage-egostudio
 * @subpackage filter
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSxGeoCityFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'region_id'     => new sfWidgetFormFilterInput(),
      'area_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Area'), 'add_empty' => true)),
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_en'       => new sfWidgetFormFilterInput(),
      'address'       => new sfWidgetFormFilterInput(),
      'lat'           => new sfWidgetFormFilterInput(),
      'lon'           => new sfWidgetFormFilterInput(),
      'okato'         => new sfWidgetFormFilterInput(),
      'public'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'public_active' => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'region_id'     => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'area_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Area'), 'column' => 'id')),
      'name'          => new sfValidatorPass(array('required' => false)),
      'name_en'       => new sfValidatorPass(array('required' => false)),
      'address'       => new sfValidatorPass(array('required' => false)),
      'lat'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'lon'           => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'okato'         => new sfValidatorPass(array('required' => false)),
      'public'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'public_active' => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('sx_geo_city_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'SxGeoCity';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'region_id'     => 'Number',
      'area_id'       => 'ForeignKey',
      'name'          => 'Text',
      'name_en'       => 'Text',
      'address'       => 'Text',
      'lat'           => 'Number',
      'lon'           => 'Number',
      'okato'         => 'Text',
      'public'        => 'Boolean',
      'public_active' => 'Boolean',
    );
  }
}
