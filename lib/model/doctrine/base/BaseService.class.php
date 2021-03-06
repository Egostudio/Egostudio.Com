<?php

/**
 * BaseService
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $city_id
 * @property string $name
 * @property string $name_short
 * @property string $content
 * @property string $content_short
 * @property string $duration
 * @property string $img
 * @property integer $price
 * @property boolean $public
 * @property SxGeoCity $City
 * 
 * @method integer   getCityId()        Returns the current record's "city_id" value
 * @method string    getName()          Returns the current record's "name" value
 * @method string    getNameShort()     Returns the current record's "name_short" value
 * @method string    getContent()       Returns the current record's "content" value
 * @method string    getContentShort()  Returns the current record's "content_short" value
 * @method string    getDuration()      Returns the current record's "duration" value
 * @method string    getImg()           Returns the current record's "img" value
 * @method integer   getPrice()         Returns the current record's "price" value
 * @method boolean   getPublic()        Returns the current record's "public" value
 * @method SxGeoCity getCity()          Returns the current record's "City" value
 * @method Service   setCityId()        Sets the current record's "city_id" value
 * @method Service   setName()          Sets the current record's "name" value
 * @method Service   setNameShort()     Sets the current record's "name_short" value
 * @method Service   setContent()       Sets the current record's "content" value
 * @method Service   setContentShort()  Sets the current record's "content_short" value
 * @method Service   setDuration()      Sets the current record's "duration" value
 * @method Service   setImg()           Sets the current record's "img" value
 * @method Service   setPrice()         Sets the current record's "price" value
 * @method Service   setPublic()        Sets the current record's "public" value
 * @method Service   setCity()          Sets the current record's "City" value
 * 
 * @package    erotic-massage-egostudio
 * @subpackage model
 * @author     Vasilisa the Wise
 * @version    SVN: $Id: Builder.php 7490 2010-03-29 19:53:27Z jwage $
 */
abstract class BaseService extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('service');
        $this->hasColumn('city_id', 'integer', 11, array(
             'type' => 'integer',
             'length' => 11,
             ));
        $this->hasColumn('name', 'string', 255, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 255,
             ));
        $this->hasColumn('name_short', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('content', 'string', 2147483647, array(
             'type' => 'string',
             'notnull' => true,
             'length' => 2147483647,
             ));
        $this->hasColumn('content_short', 'string', 2147483647, array(
             'type' => 'string',
             'length' => 2147483647,
             ));
        $this->hasColumn('duration', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('img', 'string', 255, array(
             'type' => 'string',
             'length' => 255,
             ));
        $this->hasColumn('price', 'integer', 5, array(
             'type' => 'integer',
             'length' => 5,
             ));
        $this->hasColumn('public', 'boolean', null, array(
             'type' => 'boolean',
             'default' => true,
             ));
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('SxGeoCity as City', array(
             'local' => 'city_id',
             'foreign' => 'id',
             'onDelete' => 'SET NULL'));

        $sortable0 = new Doctrine_Template_Sortable(array(
             'uniqueBy' => 
             array(
              0 => 'city_id',
             ),
             ));
        $sluggable0 = new Doctrine_Template_Sluggable(array(
             'unique' => true,
             'fields' => 
             array(
              0 => 'name',
             ),
             'canUpdate' => true,
             'builder' => 
             array(
              0 => 'SlugifyClass',
              1 => 'Slugify',
             ),
             ));
        $this->actAs($sortable0);
        $this->actAs($sluggable0);
    }
}