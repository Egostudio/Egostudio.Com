<?php

/**
 * Collection form.
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CollectionForm extends BaseCollectionForm
{
  public function configure()
  {
    unset(
    	$this['slug'],
    	$this['position']
    );

    sfContext::getInstance()->getConfiguration()->loadHelpers(array('Thumbnail','Asset'));    

    $this->widgetSchema['name']->setAttributes(array(
        'class'=>'form-control input-inline ',
        'style'=>'width:500px;',
        'placeholder'=>'Введите наименование')
    );

    $this->widgetSchema['img'] = new sfWidgetFormInputFileEditableProject(array(
      'file_src'  => getThumbnailByWidth($this->getObject()->getImg(),'collection',640),
      'is_image'  => true,
//      'edit_mode' => !$this->isNew(),
      'with_delete' => true, 
      'delete_label'=> 'Удалить фото',      
      'template'  => '<div style="padding-bottom: 5px;"><table cellspacing="0" cellspacing="0" border=0>'
      .($this->getObject()->getImg()?'<tr><td ><a href="/uploads/collection/'. $this->getObject()->getImg().'" target="_blank">
      <div>%file%</a><br />1020-550</div></td></tr>':'')
      .(!$this->isNew() ? '<tr><td>'.$this->getObject()->getImg().'</td></tr>':'')
      .($this->getObject()->getImg()?'<tr><td> 
									    <div class="form-group form-md-checkboxes has-error" style="margin:10px;">
									    	<div class="md-checkbox-inline">
										    	<div class="md-checkbox has-error">
											        %delete% <span style="margin-left: 25px;">- удалить фото</span>
											    	<label for="collection_img_delete">
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
      'path' =>  sfConfig::get('app_upload_dir') . '/collection/',
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
}
