<?php


/**
 * Easily sort each record based on position
 *
 * @package     csDoctrineSortablePlugin
 * @subpackage  listener
 * @license     http://www.opensource.org/licenses/lgpl-license.php LGPL
 * @link        www.phpdoctrine.org
 * @since       1.0
 * @version     $Revision$
 * @author      Travis Black <tblack@centresource.com>
 */
class Doctrine_Template_Listener_Sortable extends Doctrine_Record_Listener
{
  /**
   * Array of sortable options
   *
   * @var array
   */
  protected $_options = array();


  /**
   * __construct
   *
   * @param array $options 
   * @return void
   */  
  public function __construct(array $options)
  {
    $this->_options = $options;
  }


  /**
   * Set the position value automatically when a new sortable object is created
   *
   * @param Doctrine_Event $event
   * @return void
   */
  public function preInsert(Doctrine_Event $event)
  {
    $fieldName = $this->_options['name'];
    $object = $event->getInvoker();
    $object->$fieldName = $object->getFinalPosition()+1;
  }

/*
  public function preUpdate(Doctrine_Event $event)
  {
    $this->getObject();
    if (count($uniqueBy = $this->_options['uniqueBy'])) 
    {
      $object = $event->getInvoker();
      $uniqueRequest =  $object->$uniqueBy[0];
      echo $object->$uniqueBy[0];
      $fieldName = $this->_options['name'];
      $object->$fieldName = $object->getFinalPosition()+1;
      $class = get_class($object);
      $finalPosition = $object->getFinalPosition()+1;
      $class = get_class($object);
      $finalPosition = $object->getFinalPosition()+1;
      $newObject = Doctrine::getTable($class)->find($object->id);
      $uniqueQuery = $newObject->sub_catalog_id;
      echo $uniqueRequest . $uniqueQuery;
      if ($uniqueRequest != $uniqueQuery) 
      {

      }
    }
  }
 */


  /**
   * When a sortable object is deleted, promote all objects positioned lower than itself
   *
   * @param string $Doctrine_Event 
   * @return void
   */  
  public function postDelete(Doctrine_Event $event)
  {
/*
    $fieldName = $this->_options['name'];
    $object = $event->getInvoker();
    $position = $object->$fieldName;

    $q = $object->getTable()->createQuery()
                            ->update(get_class($object))
                            ->set($fieldName, $fieldName . ' - ?', '1')
                            ->where($fieldName . ' > ?', $position)
                            ->orderBy($fieldName);

    foreach ($this->_options['uniqueBy'] as $field)
    {
      $q->addWhere($field . ' = ?', $object[$field]);
    }

    $q->execute();
*/
  }  
}
