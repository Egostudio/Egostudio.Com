<?php

class mainComponents extends sfComponents
{   
    public function executeTelephone(sfWebRequest $request)
    {
        $city_id = $this->getUser()->getAttribute('city_id');

        $this->telephone = Doctrine_Core::getTable('CitySetting')
            ->createQuery('s')        
            ->leftJoin('s.Cities c')
            ->where('c.id = ?',$city_id)
            ->fetchOne();
    }
    public function executeSocial(sfWebRequest $request)
    {
        $city_id = $this->getUser()->getAttribute('city_id');

        $this->items = Doctrine_Core::getTable('CitySetting')
            ->createQuery('s')        
            ->leftJoin('s.Cities c')
            ->where('c.id = ?',$city_id)
            ->fetchOne();
    }    
    public function executeModal(sfWebRequest $request)
    {
        $geo = sfConfig::get('geo');

        $this->city = $geo['city']['name_ru'];

        $this->city_id = sfConfig::get('city_id');

        $this->cities = Doctrine_Core::getTable('SxGeoCity')->getCityActive();
    }   
}

