<?php

require_once dirname(__FILE__).'/../lib/deviceGeneratorConfiguration.class.php';
require_once dirname(__FILE__).'/../lib/deviceGeneratorHelper.class.php';

/**
 * device actions.
 *
 * @package    erotic-massage-egostudio
 * @subpackage device
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class deviceActions extends autoDeviceActions
{
  public function executeList_clear(sfWebRequest $request)
  {

    $q = Doctrine_Query::create()
            ->delete('Device')
            ->execute();

    $this->getUser()->setFlash('notice', 'База запросов очищена');
    sfAction::redirect('@device');	    
  }

}
