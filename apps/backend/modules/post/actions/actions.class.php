<?php

require_once dirname(__FILE__).'/../lib/postGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/postGeneratorHelper.class.php';

/**
 * post actions.
 *
 * @package    erotic-massage-egostudio
 * @subpackage post
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class postActions extends autoPostActions
{
  public function executeDelete(sfWebRequest $request)
  {
      if($img = $this->getRoute()->getObject()->getImg())
        myImage::deleteImgAndThumb($img,'post');

      return parent::executeDelete($request);
  }
  public function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');		
    foreach ($ids as $id) 
    {
      $slide = Doctrine::getTable('Post')->find($id);	

      if ($slide->getImg())
        myImage::deleteImgAndThumb($slide->getImg(),'post');
    }
    return parent::executeBatchDelete($request);
  }  
}
