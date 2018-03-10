<?php
class settingsFilter extends sfFilter
{
  public function execute($filterChain)
  {
    $settings = Doctrine::getTable('Settings')->find(1)->toArray();
    sfConfig::set('settings',$settings);
    $filterChain->execute($filterChain);    
  }
}
