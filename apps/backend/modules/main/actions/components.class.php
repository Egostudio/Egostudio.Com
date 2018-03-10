<?php
class mainComponents extends sfComponents
{
  public function executeSidebar_menu(sfWebRequest $request)
  {
    $entry = $this->context->getController()->getActionStack()->getLastEntry();

    //$currentAction = $entry->getActionName();
    $this->currentModule = $entry->getModuleName();  
    $this->active = 'active';
  }

  public function executeBreadcrumb(sfWebRequest $request)
  {
  }
}

