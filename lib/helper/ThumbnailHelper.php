<?php
function getThumbnail($image,$subUploadDir,$width,$height, $scale = true, $inflate = true, $quality = 95)
{
  if( 
    $image == null || 
    !file_exists(sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$image) || 
    $width == null || 
    $height == null 
  )
    return false;

  $thumbnail_dir = $width . '-' . $height.'/';
  $image_file=basename($image);

  if (!is_dir(sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir))
  {
    mkdir (sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir,0777);
  }

  $l = sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$image;
  $s = sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir.$image_file;

  if (!file_exists($s))
  {
    $imagesy = getimagesize($l);
  
    $_x = $imagesy[1] * ($width/$height);
    $_y = $imagesy[0] / ($width/$height);

    if ( ($imagesy[0] > $width) || ($imagesy[1] > $height) ){

	    if(($imagesy[0]/$imagesy[1]) > ($width/$height))
	    {
        $config['x_axis'] = ($imagesy[0] - $_x)/2;
        $config['y_axis'] = 0;
        $imagesy[0] = $_x;		    
	    }
	    else
	    {
        $config['x_axis'] = 0;
        $config['y_axis'] = (($imagesy[1]) - $_y)/2;
        $imagesy[1] = $_y;
	    
	    }
      $c = new eCrop($l,$config['x_axis'], $config['y_axis'],$imagesy[0],$imagesy[1]);
      $c->setJpgQuality(100);
      $c->setThumbSize($width, $height); 
      $c->crop($s); 
    }
    else
    {
      copy($l,$s);
    }

  }
  return '/uploads'.'/'.$subUploadDir.'/'.$thumbnail_dir.$image_file;
}

function getThumbnailInvestBlank($image,$subUploadDir,$width,$height, $scale = true, $inflate = true, $quality = 100)
{

  if( 
    $image == null || 
    !file_exists(sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$image) || 
    $width == null || 
    $height == null 
  )
    return false;


  $thumbnail_dir = $width . '-' . $height.'/';
  $image_file=basename($image);

  if (!is_dir(sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir))
  {
    mkdir (sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir,0777);
  }

  $l = sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$image;
  $s = sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir.$image_file;

  if (!file_exists($s))
  {
    $imagesy = getimagesize($l);

    $img = new sfImage($l,$imagesy['mime']);
    $img->thumbnail($width,$height);
    $img->setQuality(100);
    $img->saveAs($s);
  }
  return '/uploads'.'/'.$subUploadDir.'/'.$thumbnail_dir.$image_file;
}

function getThumbnailInvest($image,$subUploadDir,$width,$height, $scale = true, $inflate = true, $quality = 100)
{

  if( 
    $image == null || 
    !file_exists(sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$image) || 
    $width == null || 
    $height == null 
  )
    return false;


  $thumbnail_dir = $width . '-' . $height.'/';
  $image_file=basename($image);

  if (!is_dir(sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir))
  {
    mkdir (sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir,0777);
  }

  $l = sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$image;
  $s = sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir.$image_file;
  $imagesy = getimagesize($l);
    
  if (!file_exists($s))
  {
    if ( ($imagesy[0] > $width) && ($imagesy[1] > $height) ){

    $thumbnail = new sfThumbnail($width, $height,$scale,$inflate,$quality);
    $thumbnail->loadFile($l);
    $thumbnail->save($s);
    }
    else
    {
      return '/uploads'.'/'.$subUploadDir.'/'.$image_file;    
    }
  }

  return '/uploads'.'/'.$subUploadDir.'/'.$thumbnail_dir.$image_file;
}

function getThumbnailByWidth($image,$subUploadDir,$width, $scale = true, $inflate = true, $quality = 95)
{
  if( 
    $image == null || 
    !file_exists(sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$image) || 
    $width == null  
    )
    return false;

  $thumbnail_dir = $width . '/';
  $image_file=basename($image);

  if (!is_dir(sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir))
  {
    mkdir (sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir,0777);
  }

  $l = sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$image;
  $s = sfConfig::get('sf_upload_dir').'/'.$subUploadDir.'/'.$thumbnail_dir.$image_file;

  if (!file_exists($s))
  {
    $imagesy = getimagesize($l);
  
  $proportion = $imagesy[0]/$imagesy[1];

    $_x = $imagesy[1] * $proportion;
    $_y = $imagesy[0] / $proportion;

    $height = floor($width/$proportion);

    if ( ($imagesy[0] > $width) || ($imagesy[1] > $height) ){

            $config['x_axis'] = ($imagesy[0] - $_x)/2;
            $config['y_axis'] = 0;
            $imagesy[0] = $_x;	


      $c = new eCrop($l,$config['x_axis'], $config['y_axis'],$imagesy[0],$imagesy[1]);
      $c->setJpgQuality(100);
      $c->setThumbSize($width, $height); 
      $c->crop($s); 
    }
    else
    {
      copy($l,$s);
    }

  }

  return '/uploads'.'/'.$subUploadDir.'/'.$thumbnail_dir.$image_file;
}
