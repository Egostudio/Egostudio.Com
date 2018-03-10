<?php

/**
 * Settings form.
 *
 * @package    erotic-massage-egostudio
 * @subpackage form
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class SettingsForm extends BaseSettingsForm
{
  public function configure()
  {
    $this->widgetSchema['project_name']->setAttributes(array(
        'class'=>'form-control input-inline ',
        'style'=>'width:550px;',
        'placeholder'=>'Введите наименование')
    );

    $this->widgetSchema['logo'] = new sfWidgetFormInputFileEditableProject(array(
      'file_src'  => '/uploads/'.$this->getObject()->getLogo(),
      'is_image'  => true,
//      'edit_mode' => !$this->isNew(),
      'with_delete' => true, 
      'delete_label'=> 'Удалить логотип',      
      'template'  => '<div style="padding-bottom: 5px;"><table cellspacing="0" cellspacing="0" border=0>'
      .(
      
      $this->getObject()->getLogo()?
      
      '<tr><td ><a href="/uploads/'. $this->getObject()->getLogo().'" target="_blank">%file%</a></td></tr>'
      
      :
      
      '')
      .(!$this->isNew() ? '<tr><td>'.$this->getObject()->getLogo().'</td></tr>':'')
      .($this->getObject()->getLogo()?'<tr><td> 
									    <div class="form-group form-md-checkboxes has-error" style="margin:10px;">
									    	<div class="md-checkbox-inline">
										    	<div class="md-checkbox has-error">
											        %delete% <span style="margin-left: 25px;">- удалить логотип</span>
											    	<label for="settings_logo_delete">
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
														Выбрать логотип </span>
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

    $this->validatorSchema['logo'] = new sfValidatorFile(array(
      'path' =>  sfConfig::get('app_upload_dir') . '/',
      'mime_types' => 'web_images',
      'max_size' => 1024 * 1024,       
      //'validated_file_class' => 'sfValidatedFileProject',
      'validated_file_class' => 'sfValidatedFileOriginalName',
      'required'=> false
    ));

    $this->validatorSchema['logo_delete'] = new sfValidatorBoolean();
    
  }
}
