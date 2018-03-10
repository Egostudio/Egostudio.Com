<?php

/**
 * Settings filter form base class.
 *
 * @package    erotic-massage-egostudio
 * @subpackage filter
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseSettingsFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'project_name' => new sfWidgetFormFilterInput(),
      'email'        => new sfWidgetFormFilterInput(),
      'logo'         => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'project_name' => new sfValidatorPass(array('required' => false)),
      'email'        => new sfValidatorPass(array('required' => false)),
      'logo'         => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('settings_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Settings';
  }

  public function getFields()
  {
    return array(
      'id'           => 'Number',
      'project_name' => 'Text',
      'email'        => 'Text',
      'logo'         => 'Text',
    );
  }
}
