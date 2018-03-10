<?php

/**
 * Service filter form base class.
 *
 * @package    erotic-massage-egostudio
 * @subpackage filter
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseServiceFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'city_id'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('City'), 'add_empty' => true)),
      'name'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'name_short'    => new sfWidgetFormFilterInput(),
      'content'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'content_short' => new sfWidgetFormFilterInput(),
      'duration'      => new sfWidgetFormFilterInput(),
      'img'           => new sfWidgetFormFilterInput(),
      'price'         => new sfWidgetFormFilterInput(),
      'public'        => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'position'      => new sfWidgetFormFilterInput(),
      'slug'          => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'city_id'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('City'), 'column' => 'id')),
      'name'          => new sfValidatorPass(array('required' => false)),
      'name_short'    => new sfValidatorPass(array('required' => false)),
      'content'       => new sfValidatorPass(array('required' => false)),
      'content_short' => new sfValidatorPass(array('required' => false)),
      'duration'      => new sfValidatorPass(array('required' => false)),
      'img'           => new sfValidatorPass(array('required' => false)),
      'price'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'public'        => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'position'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'slug'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('service_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Service';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'city_id'       => 'ForeignKey',
      'name'          => 'Text',
      'name_short'    => 'Text',
      'content'       => 'Text',
      'content_short' => 'Text',
      'duration'      => 'Text',
      'img'           => 'Text',
      'price'         => 'Number',
      'public'        => 'Boolean',
      'position'      => 'Number',
      'slug'          => 'Text',
    );
  }
}
