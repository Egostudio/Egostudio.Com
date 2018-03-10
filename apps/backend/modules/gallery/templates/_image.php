<?php if($gallery->getImg()): ?>
<?php echo image_tag(getThumbnail(($gallery->getImg()),'gallery',240,150),array('border'=>'0', 'alt'=>$gallery->getName()));?>
<?php endif;?>
