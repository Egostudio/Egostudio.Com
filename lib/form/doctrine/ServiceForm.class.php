<?php

/**
 * Service form.
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ServiceForm extends BaseServiceForm
{
  public function configure()
  {

    unset(
    	$this['slug'],
    	$this['position']
    );
  
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

    $this->widgetSchema['name']->setAttributes(array(
        'class'=>'form-control input-inline ',
        'style'=>'width:500px;',
        'placeholder'=>'Введите наименование')
    );
    $this->widgetSchema->setHelp('name','Наименование для сайта и приложений Android');   
    
    $this->widgetSchema['name_short']->setAttributes(array(
        'class'=>'form-control input-inline ',
        'style'=>'width:500px;',
        'placeholder'=>'Введите наименование')
    );    
    $this->widgetSchema->setHelp('name_short','Наименование для приложений iOS');   


    $this->widgetSchema['content']->setAttributes(array('class' => 'textarea'));
    $this->widgetSchema->setHelp('content','Описание для сайта и приложений Android');   
    $this->widgetSchema['content_short']->setAttributes(array('rows'=>8,'cols'=>48));
    $this->widgetSchema->setHelp('content_short','Описание для приложений iOS');   


    $this->widgetSchema['price']->setAttributes(array(
        'class'=>'form-control input-inline ',
        'style'=>'width:200px;',
        'placeholder'=>'Введите цену')
    );
    $this->widgetSchema->setHelp('price','Цена указывается в гривнах (гр.)');   
    
    $this->widgetSchema['duration']->setAttributes(array(
        'class'=>'form-control input-inline ',
        'style'=>'width:400px;',
        'placeholder'=>'Введите продолжительность')
    );
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('Thumbnail','Asset'));    
  

    $this->widgetSchema['img'] = new sfWidgetFormInputFileEditableProject(array(
      'file_src'  => getThumbnail($this->getObject()->getImg(),'service',640,400),
      'is_image'  => true,
//      'edit_mode' => !$this->isNew(),
      'with_delete' => true, 
      'delete_label'=> 'Удалить фото',      
      'template'  => '<div style="padding-bottom: 5px;"><table cellspacing="0" cellspacing="0" border=0>'
      .($this->getObject()->getImg()?'<tr><td ><a href="/uploads/service/'. $this->getObject()->getImg().'" target="_blank">
      <div>%file%</a><br />1020-550</div></td></tr>':'')
      .(!$this->isNew() ? '<tr><td>'.$this->getObject()->getImg().'</td></tr>':'')
      .($this->getObject()->getImg()?'<tr><td> 
									    <div class="form-group form-md-checkboxes has-error" style="margin:10px;">
									    	<div class="md-checkbox-inline">
										    	<div class="md-checkbox has-error">
											        %delete% <span style="margin-left: 25px;">- удалить фото</span>
											    	<label for="service_img_delete">
											    	<span class="inc"></span>
											    	<span class="check"></span>
											    	<span class="box"></span>
											    	</label>
											    </div>
										    </div>
									    </div>      
                                    </td></tr>':'')
      .'<tr><td>
												<div class="fileinput fileinput-new" data-provides="fileinput">
													<div class="input-group input-large">
														<div class="form-control uneditable-input input-fixed input-medium" data-trigger="fileinput">
															<i class="fa fa-file fileinput-exists"></i>&nbsp; <span class="fileinput-filename">
															</span>
														</div>
														<span class="input-group-addon btn default btn-file">
														<span class="fileinput-new">
														Выбрать фото </span>
														<span class="fileinput-exists">
														Изменить </span>
														%input%
														</span>
														<a href="javascript:;" class="input-group-addon btn red fileinput-exists" data-dismiss="fileinput">
														Сбросить </a>
													</div>
												</div>
      </td></tr>'
      .'</table></div>'
    ));

    $this->validatorSchema['img'] = new sfValidatorFile(array(
      'path' =>  sfConfig::get('app_upload_dir') . '/service/',
      'mime_types' => 'web_images',
      'max_size' => 1024 * 1024,       
      //'validated_file_class' => 'sfValidatedFileProject',
      'validated_file_class' => 'sfValidatedFileOriginalName',
      'required'=> false
    ));
    $this->validatorSchema['img_delete'] = new sfValidatorBoolean();
    $this->widgetSchema['img']->setAttributes(array('class'=>'file'));  
    $this->widgetSchema->setHelp('img','Горизонтальное изображение размером не более 1 мегабайт');   
    
  }
  public function updateObject($values=null)
  {
    if (!$this->getObject()->isNew())
    {
      $values = $this->values;
      if ($this->getObject()->city_id  != $values['city_id']) 
      {
        $class = get_class($this->getObject());

        $q = Doctrine_Core::getTable($class)->createQuery()
          ->select('position')
          ->orderBy('position desc')
          ->addWhere('city_id = ?', $values['city_id']);
        $last = $q->limit(1)->fetchOne();
        $finalPosition = $last ? $last->getPosition() : 0;

        $values['position'] = $finalPosition + 1;

        $this->values = $values;
      }
    }

    parent::updateObject($values);
  }  
}
