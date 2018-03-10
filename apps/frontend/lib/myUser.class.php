<?php

class myUser extends sfGuardSecurityUser
{
  public function getGeo()
  {
    $CityMassage = unserialize($_COOKIE['CityMassage']);
    $cityMassage['name'] =  $CityMassage['name_ru'];
    $cityMassage['id'] =  $CityMassage['id'];
  
    return $cityMassage;
  }
}
