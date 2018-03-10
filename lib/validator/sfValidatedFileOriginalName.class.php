<?php

/**
 * Custom stuff!
 * By Federico Capoano
 * federico *at* nemesisdesign *dot* com
 */

class sfValidatedFileOriginalName extends sfValidatedFile
{

  /**
   * Return a proper, human understable file name.
   *
   * @return string A random name to represent the current file
   */
  public function generateFilename()
  {
    //	  $var =  sfContext::getInstance()->getRequest()->getParameter('perfect_girls');
    //	  $name = $var['name'] . '-' .  $var['surname'];
    //	  $name = SlugifyClass::Slugify($name);
    //    substr($filename, strlen($filename)-3, 3);

    //    $filename = str_replace(" ", "_", strtolower($this->getOriginalName()));

    $filename = $this->getOriginalName();
    $name = substr($filename, 0, -4);
    $name = SlugifyClass::Slugify($name);

	  $extension = $this->getExtension($this->getOriginalExtension());

	  $filename = ($name . $extension);


	  if(!file_exists($this->getPath().$filename))
	  {
		  return $filename;
	  }
	  else
	  {
		  $extension = $this->getExtension($this->getOriginalExtension());
		  $filename = str_replace($extension, '', $filename) . '_';

		  $i = 2;

		  while(true)
		  {
			  if(file_exists($this->getPath().$filename.$i.$extension))
			  {
				  $i++;
				  continue;
			  }
			  break;
		  }

		  return $filename.$i.$extension;
	  }

  }
  public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777)
  {	   
	  $fileName = parent::save($file, $fileMode, $create, $dirMode); 
	  return $fileName;	  
  }

/* 
  public function save($file = null, $fileMode = 0666, $create = true, $dirMode = 0777)
  {	 

	  $maxWidth  = sfConfig::get('app_image_max_width');	  
	  $maxHeight = sfConfig::get('app_image_max_height');	  

	  $fileName = parent::save($file, $fileMode, $create, $dirMode);	  

	  sfFileImage::getImageLoadMin($file,$fileName,$this->getPath(),$maxWidth,$maxHeight);	  

	  return $fileName;	  
  }
*/
}
