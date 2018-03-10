<?php

/**
 * Girl filter form.
 *
 * @package    erotic-massage-egostudio
 * @subpackage filter
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormFilterTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class GirlFormFilter extends BaseGirlFormFilter
{
  public function configure()
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('Asset'));
    use_stylesheet('/assets/global/plugins/bootstrap-select/bootstrap-select.min.css','last');
    use_stylesheet('/assets/global/plugins/select2/select2.css','last');
    use_stylesheet('/assets/global/plugins/jquery-multi-select/css/multi-select.css','last');
    use_javascript('/assets/global/plugins/bootstrap-select/bootstrap-select.min.js','last');
    use_javascript('/assets/global/plugins/select2/select2.min.js','last');
    use_javascript('/assets/global/plugins/jquery-multi-select/js/jquery.multi-select.js','last');
    use_javascript('/assets/admin/pages/scripts/components-dropdowns.js','last');
  
    $this->widgetSchema['city_id'] = new sfWidgetFormDoctrineChoice(
                array(
                    'model' => $this->getRelatedModelName('City'), 
                    'table_method' => 'getCityActive',
                    'add_empty' => true
                ),
                array(
                    'class'=>'form-control input-xlarge select2me',
                    'style'=>'width:300px;',
                    'placeholder'=>'Выбрать город...'
                )
            );
    $this->widgetSchema->setLabel('city_id', 'Города');
  
  }
}
