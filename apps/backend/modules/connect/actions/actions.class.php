<?php

class connectActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function preExecute()
  {   
    //sfContext::getInstance()->getConfiguration()->loadHelpers(array('Thumbnail'));  
    $this->domain = "http://erotic-massage-egostudio.com";
  }




/**
 * Settings
 * http://erotic-massage-egostudio.com/backend.php/connect/settings?lat=48.419669827846&lon=35.0667624280426
 * http://erotic-massage-egostudio.com/backend.php/connect/settings?lat=50.4577422&lon=30.5868279 - Киев
 */ 
  public function executeSettings_test(sfWebRequest $request)
  {
    $lat = $request->getParameter('lat','');
    $lon = $request->getParameter('lon','');
    $name = $request->getParameter('name','');
    $type = $request->getParameter('type','');

    $device_id = $request->getParameter('device_id');

    $details_url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lon."&sensor=false&language=en";

    $city2 = '';
    $item = '';
    $city_id = '';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $details_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $geoloc = json_decode(curl_exec($ch), true);

    $address_components = $geoloc['results'][0]['address_components'];
    $area = '';
    foreach($address_components as $k=>$item_adress){
    $area =  $item_adress['long_name'];
	if($item_adress['types'][0] == 'administrative_area_level_1') break;
      }
    if($area){
      $cities = Doctrine_Core::getTable('SxGeoCity')->createQuery('c')
        ->select('c.*,s.telephone telephone1,s.telephone2 telephone2')
        ->leftJoin('c.Area a')
        ->leftJoin('c.Cities s')        
        ->where('a.name_en like ?', '%'.$area.'%')
	->orWhere('a.name like ?', '%'.$area.'%')
        ->addWhere('c.public_active = 1')
        ->addWhere('c.public = 1')
        ->execute();

      $city1 = array();
      foreach($cities as $city){
        $lat2 = $city->lat;
        $lon2 = $city->lon;
        $details_url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat.",".$lon."&destinations=".$lat2.",".$lon2."&mode=walking&sensor=true";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $geoloc = json_decode(curl_exec($ch), true);
        $distance =  $geoloc['rows'][0]['elements'][0]['distance']['value'];

        $city1[$distance]['id'] = $city->id;
        $city1[$distance]['name'] = $city->name;
        $city1[$distance]['telephone1'] = $city->telephone1;
        $city1[$distance]['telephone2'] = $city->telephone2;
      }

//Address Definition
      $item_adress1 = '';
      foreach($address_components as $k=>$item_adress){
        $item_adress1 .= $item_adress['long_name'] . ',';
        if($k+6>count($address_components)) break;
      }

      if(count($city1)>0){
        ksort($city1);
        $city2 = array_shift($city1);
        $city_id = $city2['id'];
        $item['city_id'] = $city_id;
        $item['city_name'] = $city2['name'];
        $item['telephone1'] = $city2['telephone1'] ? $city2['telephone1'] : "";
        $item['telephone2'] = $city2['telephone2'] ? $city2['telephone2'] : "";
        $item['address'] = $item_adress1;
      }   

      if($lat && $lon) {
        $device = new Device();
        $device->name = $name ? $name : 'Name';
        $device->type = $type ? $type : 'Type';
        $device->device = $device_id ? $device_id : 'Device';
        $device->lat = $lat;
        $device->lon = $lon;
        $device->city_id = $city_id;
        $device->save();        
      }
    }

    //echo $city2;
    $items[0] = $item;
    $result = array('settings'=>$item);

    header("Content-Type: application/json;charset=utf-8");
    echo json_encode($result);

    return sfView::NONE;
  }
























/**
 * Settings
 * http://erotic-massage-egostudio.com/backend.php/connect/settings?lat=48.419669827846&lon=35.0667624280426
 * http://erotic-massage-egostudio.com/backend.php/connect/settings?lat=50.4577422&lon=30.5868279 - Киев
 */ 
  public function executeSettings(sfWebRequest $request)
  {
    $lat = $request->getParameter('lat','');
    $lon = $request->getParameter('lon','');
    $name = $request->getParameter('name','');
    $type = $request->getParameter('type','');

    $device_id = $request->getParameter('device_id');

    $details_url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lon."&sensor=false&language=en";

    $city2 = '';
    $item = '';
    $city_id = '';

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $details_url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $geoloc = json_decode(curl_exec($ch), true);

    $address_components = $geoloc['results'][0]['address_components'];
    $area = '';
    foreach($address_components as $k=>$item_adress){
    $area =  $item_adress['long_name'];
	if($item_adress['types'][0] == 'administrative_area_level_1') break;
      }
    if($area){
      $cities = Doctrine_Core::getTable('SxGeoCity')->createQuery('c')
        ->select('c.*,s.telephone telephone1,s.telephone2 telephone2')
        ->leftJoin('c.Area a')
        ->leftJoin('c.Cities s')        
        ->where('a.name_en like ?', '%'.$area.'%')
	->orWhere('a.name like ?', '%'.$area.'%')
        ->addWhere('c.public_active = 1')
        ->addWhere('c.public = 1')
        ->execute();

//echo $area;exit;
      $city1 = array();
      foreach($cities as $city){
        $lat2 = $city->lat;
        $lon2 = $city->lon;
        $details_url = "https://maps.googleapis.com/maps/api/distancematrix/json?origins=".$lat.",".$lon."&destinations=".$lat2.",".$lon2."&mode=walking&sensor=true";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $geoloc = json_decode(curl_exec($ch), true);
        $distance =  $geoloc['rows'][0]['elements'][0]['distance']['value'];

        $city1[$distance]['id'] = $city->id;
        $city1[$distance]['name'] = $city->name;
        $city1[$distance]['telephone1'] = $city->telephone1;
        $city1[$distance]['telephone2'] = $city->telephone2;
      }

//Address Definition
      $item_adress1 = '';
      foreach($address_components as $k=>$item_adress){
        $item_adress1 .= $item_adress['long_name'] . ',';
        if($k+6>count($address_components)) break;
      }

      if(count($city1)>0){
        ksort($city1);
        $city2 = array_shift($city1);
        $city_id = $city2['id'];
        $item['city_id'] = $city_id;
        $item['city_name'] = $city2['name'];
        $item['telephone1'] = $city2['telephone1'] ? $city2['telephone1'] : "";
        $item['telephone2'] = $city2['telephone2'] ? $city2['telephone2'] : "";
        $item['address'] = $item_adress1;
      }   

      if($lat && $lon) {
        $device = new Device();
        $device->name = $name ? $name : 'Name';
        $device->type = $type ? $type : 'Type';
        $device->device = $device_id ? $device_id : 'Device';
        $device->lat = $lat;
        $device->lon = $lon;
        $device->city_id = $city_id;
        $device->save();        
      }
    }

    //echo $city2;
    $items[0] = $item;
    $result = array('settings'=>$item);

    header("Content-Type: application/json;charset=utf-8");
    echo json_encode($result);

    return sfView::NONE;


  }

/**
 * ListCities
 * http://erotic-massage-egostudio.com/backend.php/connect/cities
 */
  public function executeCities(sfWebRequest $request)
  {
    $cities = Doctrine_Core::getTable('SxGeoCity')->createQuery('c')
      ->select('c.*,s.telephone telephone1,s.telephone2 telephone2')    
      ->leftJoin('c.Cities s')    
      ->where('c.public_active = 1')
      ->addWhere('c.public = 1')
      ->orderBy('c.name')
      ->fetchArray();
    foreach($cities as $city){
      $item = array();
      $item['city_id'] =  $city['id'];
      $item['city_name'] =  $city['name'];
      $item['telephone1'] =  $city['telephone1'] ? $city['telephone1'] : "";
      $item['telephone2'] =  $city['telephone2'] ? $city['telephone2'] : "";
      $items[] = $item;
    }
    $result = array('cities'=>$items);
    header("Content-Type: application/json;charset=utf-8");    
    echo json_encode($result);

    return sfView::NONE;  
  }

/**
 * Data
 * http://erotic-massage-egostudio.com/backend.php/connect/data?os=ios&city_id=709930
 * http://erotic-massage-egostudio.com/backend.php/connect/data?os=android&city_id=709930 
 */
  public function executeData(sfWebRequest $request)
  {
    $result = array();
    
    //sfContext::getInstance()->getConfiguration()->loadHelpers(array('Thumbnail'));  
    
    $city_id = $request->getParameter('city_id');
    $os = $request->getParameter('os');

    if($city_id>0 && strlen($os)>0){
      $adress = $this->domain . '/uploads/service';
      $q = Doctrine_Core::getTable('Service')->createQuery('s')
        ->where('s.city_id = ?',$city_id)
        ->addWhere('s.public = 1');

      if($os=='ios'){
        $q->addWhere('LENGTH(s.name_short) > 0');
      }

      $datas = $q->execute();

      foreach($datas as $data){

        $item = array();
        
        $item['id'] =       $data->id;
        $item['price'] =    $data->price ? $data->price . " гр." : "" ;
        $item['img_full'] =     $data->getImg() ? $adress . '/' . '640-400' . '/' . $data->getImg() : '' ; //1020-550

        if($os=='android'){
            $item['name'] =     $data->name;
            $item['content'] =  $data->content ? self::strip_single_tag($data->content,"p") : "";
            $item['img2'] =     $data->getImg() ? $data->getImg() : '' ;
        }
        else{
            $item['name'] =     $data->name_short;
            $item['content'] =  $data->content_short ? self::strip_single_tag($data->content_short,"p") : "";
        }

        //$item['img']  =       $data->getImg() ? $adress . '/' . '640-400' . '/'.$post->getImg() : '' ;
        //$item['img_origin'] = $data->getImg() ? $adress . '/' . $data->getImg() : '' ;

        $items[] = $item;
      }   
      
      $result = array('data'=>$items);
    }
//    echo '<pre>'; print_r($result); echo '</pre>'; exit;
    
    header("Content-Type: application/json;charset=utf-8");    
    echo json_encode($result);

    return sfView::NONE;  
  }
  

function strip_single_tag($str,$tag){

    $str1=preg_replace('/<\/'.$tag.'>/i', '', $str);

    if($str1 != $str){

        $str2 = preg_replace('/<'.$tag.'[^>]*>/i', '', $str1);

// Turns all links into words, like "<a href="something">else</a>" to "else".
        $str = preg_replace('/<a[^>]*>(.*?)<\/a>/s', '\\1', $str2);
    }

    return $str;
}

}

