<?php

require_once dirname(__FILE__).'/../lib/serviceGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/serviceGeneratorHelper.class.php';

/**
 * service actions.
 *
 * @package    erotic-massage-egostudio
 * @subpackage service
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class serviceActions extends autoServiceActions
{

  public function executeDelete(sfWebRequest $request)
  {
      if($img = $this->getRoute()->getObject()->getImg())
        myImage::deleteImgAndThumb($img,'service');

      return parent::executeDelete($request);
  }
  public function executeBatchDelete(sfWebRequest $request)
  {
    $ids = $request->getParameter('ids');		
    foreach ($ids as $id) 
    {
      $slide = Doctrine::getTable('Service')->find($id);	

      if ($slide->getImg())
        myImage::deleteImgAndThumb($slide->getImg(),'service');
    }
    return parent::executeBatchDelete($request);
  }  
  
  public function executeFirst()
  {
    $object=Doctrine::getTable(get_class($this->getRoute()->getObject()))->findOneById($this->getRequestParameter('id')); 
    $object->moveToFirst();        
    $this->redirect(self::_get_route());
  }
  public function executeLast()
  {
    $object=Doctrine::getTable(get_class($this->getRoute()->getObject()))->findOneById($this->getRequestParameter('id'));
    $object->moveToLast();    
    $this->redirect(self::_get_route());
  }
  public function executePromote()
  {
    $object = Doctrine::getTable(get_class($this->getRoute()->getObject()))->findOneById($this->getRequestParameter('id'));
    $object->promote();    
    $this->redirect(self::_get_route());
  }
  public function executeDemote()
  {
    $object=Doctrine::getTable(get_class($this->getRoute()->getObject()))->findOneById($this->getRequestParameter('id'));
    $object->demote();    
    $this->redirect(self::_get_route());
  }
  protected function _get_route()
  {
    $route = sfContext::getInstance()->getRequest()->getParameterHolder()->get('module');
    return $route;
  }
}
