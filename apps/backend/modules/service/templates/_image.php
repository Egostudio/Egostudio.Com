<?php if($service->getImg()): ?>
<?php echo image_tag(getThumbnail(($service->getImg()),'service',240,150),array('border'=>'0', 'alt'=>$service->getName()));?>
<?php endif;?>
