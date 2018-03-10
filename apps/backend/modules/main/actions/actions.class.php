<?php

/**
 * main actions.
 *
 * @package    ksinfo1000
 * @subpackage main
 * @author     Ivan Savchuk
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class mainActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */
  

  public function executeCleare(sfWebRequest $request)
  {
    $this->_recursiveDelete($_SERVER['DOCUMENT_ROOT'].'/../cache/');
    $this->redirect('@homepage');
    return sfView::NONE;
  }
  public function _recursiveDelete($str){
    if(is_file($str)){
      return @unlink($str);
    }
    elseif(is_dir($str)){
      $scan = glob(rtrim($str,'/').'/*');
      if(is_array($scan)){
        foreach($scan as $index=>$path){
          $this->_recursiveDelete($path);
        }
      }
      return @rmdir($str);
    }
  } 


  public function executeIndex(sfWebRequest $request)
  {
  /*
$context  = stream_context_create(array('http' => array('header' => 'Accept: application/xml')));
$url = 'https://www.drv.gov.ua/apex/RDM$ADR.p_getDistrict?p_ID100=53&pKey=Wkdia2wwakpSZ2M4dS9LUEdFOHkyeFlTeGJtZ3dsQ0c0ZEhJRUJNcm5IZz0=';

$xml = file_get_contents($url, false, $context);
$xmls = simplexml_load_string($xml);
echo '<pre>';
foreach($xmls as $xml)
{
echo $xml['N100'] . $xml->N100;
echo '<br />';
echo $xml['N100'] . $xml->F5273;
echo '<br />';
echo '<br />';


//print_r($xml);

}
echo '</pre>';

exit;
*/
//  $this->getUser()->setCulture('ru_RU');
//  echo $this->getUser()->getCulture();

  }
  public function executeTest(sfWebRequest $request)
  {
  }
}
