<?php
class deviceComponents extends sfComponents
{
  public function executeBreadcrumb(sfWebRequest $request)
  {
  }
  public function executeTest(sfWebRequest $request)
  {
    $this->items = array();
  
    $lat = $this->device->getLat();
    $lon = $this->device->getLon();

    if($lat && $lon){
        $details_url = "http://maps.googleapis.com/maps/api/geocode/json?latlng=".$lat.",".$lon."&sensor=false&language=en";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $details_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $geoloc = json_decode(curl_exec($ch), true);

        $this->items =  $geoloc['results'][0]['address_components'];
    }
  }  
}

