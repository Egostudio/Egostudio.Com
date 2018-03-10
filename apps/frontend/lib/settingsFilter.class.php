<?php
class settingsFilter extends sfFilter
{
  public function execute($filterChain)
  {
    $settings = Doctrine::getTable('Settings')->find(1)->toArray();
    sfConfig::set('settings',$settings);

    $IPaddress = '';
    foreach (array('HTTP_CLIENT_IP',
                   'HTTP_X_FORWARDED_FOR',
                   'HTTP_X_FORWARDED',
                   'HTTP_X_CLUSTER_CLIENT_IP',
                   'HTTP_FORWARDED_FOR',
                   'HTTP_FORWARDED',
                   'REMOTE_ADDR') as $key){
        if (array_key_exists($key, $_SERVER) === true){
            foreach (explode(',', $_SERVER[$key]) as $IPaddress){
                $IPaddress = trim($IPaddress); // Just to be safe
            }
        }
    }
    //echo $IPaddress;
    include("SxGeo.php");
    $SxGeo = new SxGeo('SxGeoCity.dat');
    $geo = $SxGeo->getCityFull($IPaddress);
    sfConfig::set('geo',$geo);
    unset($SxGeo);
    
    $city_id = !$geo['city']['id'] ? '709930' : $geo['city']['id'] ;

    $user = sfContext::getInstance()->getUser();

    $user_city_id = $user->getAttribute('city_id');

    if(!$user_city_id) 
    {
        $user->setAttribute('city_id', $city_id);
    }
    else
    {
        $city_id = $user_city_id ;
    }
    
    sfConfig::set('city_id',$city_id);


//echo $IPaddress;

/*
$is_bot = preg_match(
 "~(Google|Yahoo|Rambler|Bot|Yandex|Spider|Snoopy|Crawler|Finder|Mail|curl)~i", 
 $_SERVER['HTTP_USER_AGENT']
);
$geo = !$is_bot ? json_decode(file_get_contents('http://api.sypexgeo.net/rrWBi/json/'.$IPaddress), true) : [];
print_r($geo );
*/
/*
$is_bot = preg_match(
 "~(Google|Yahoo|Rambler|Bot|Yandex|Spider|Snoopy|Crawler|Finder|Mail|curl)~i", 
 $_SERVER['HTTP_USER_AGENT']
);
$geo = !$is_bot ? json_decode(file_get_contents('http://api.sypexgeo.net/rrWBi/json/'.$ip), true) : [];


//http://api.sypexgeo.net/rrWBi/json/91.243.199.130

print_r($geo);


unset($SxGeo);

exit;
*/

    $filterChain->execute($filterChain);
  }
  
}
