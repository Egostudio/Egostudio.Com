<?php if($collection->getImg()): ?>
<?php echo image_tag(getThumbnailByWidth(($collection->getImg()),'collection',640),array('border'=>'0', 'alt'=>$collection->getName(),'width'=>320));?>
<?php endif;?>
