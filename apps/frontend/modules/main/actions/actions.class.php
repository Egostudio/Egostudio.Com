<?php

/**
 * main actions.
 *
 * @package    erotic-massage-egostudio
 * @subpackage main
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  public function preExecute()
  {   
    sfContext::getInstance()->getConfiguration()->loadHelpers(array('Partial')); 
    $this->geo = sfConfig::get('geo');    
  }
 

  public function executeAjaxCity(sfWebRequest $request)
  {
    $this->forward404Unless($request->isXmlHttpRequest());
    $this->forward404Unless($city_id = $request->getParameter('id'));
  
    $this->getUser()->setAttribute('city_id', $city_id);
    
    exit;    
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->galleries = Doctrine_core::getTable('Gallery')->getGalleries();
  }

  public function executeGallery(sfWebRequest $request)
  {
    $this->items = Doctrine_core::getTable('Collection')->getCollections();
  }

  public function executePosts(sfWebRequest $request)
  {
    $q = Doctrine_Core::getTable('Post')->getPostsItem();
    $this->pager = new sfDoctrinePager('Post',3);
    $this->pager->setQuery($q);
    $this->pager->setPage($request->getParameter('page', 1));
    $this->pager->init();
    
  }

  public function executePost(sfWebRequest $request)
  {
    $this->post = $this->getRoute()->getObject();
    $this->forward404Unless($this->post);
    $response = sfContext::getInstance()->getResponse();
    $response->setTitle($this->post->getTitle(), false); 
    $response->addMeta('keywords', $this->post->getKeywords());
    $response->addMeta('description', $this->post->getMetadesc());
    $settings = sfConfig::get('settings');  
  }


  public function executeGirl(sfWebRequest $request)
  {
  
    $city_id = $this->getUser()->getAttribute('city_id');
    $this->items = Doctrine_Core::getTable('Girl')->getGirlsByCityAndUser($city_id);
  }


  public function executeMassages(sfWebRequest $request)
  {
    $city_id = $this->getUser()->getAttribute('city_id');
    $this->services = Doctrine_Core::getTable('Service')->getServicesByCityAndUser($city_id);
  }
  public function executeMassage(sfWebRequest $request)
  {
    $this->service = $this->getRoute()->getObject();  
  }
  
  public function executeModal(sfWebRequest $request)
  {
    $this->cityes = Doctrine_Core::getTable('SxGeoCity')->getCityActive();
  }

}
