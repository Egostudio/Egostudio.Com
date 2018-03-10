<?php if($girl->getImg()): ?>
<?php echo image_tag(getThumbnail(($girl->getImg()),'girl',240,150),array('border'=>'0', 'alt'=>$girl->getName()));?>
<?php endif;?>
