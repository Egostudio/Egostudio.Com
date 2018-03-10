<?php

/**
 * GalleryTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class GalleryTable extends Doctrine_Table
{
    /**
     * Returns an instance of this class.
     *
     * @return object GalleryTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('Gallery');
    }
    public static function getGalleries()
    {
      return  self::getInstance()->createQuery('p')
	      ->where('p.public = 1')           
	      ->orderBy('p.position')
	      ->execute();
    }
    
}
