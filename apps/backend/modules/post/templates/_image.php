<?php if($post->getImg()): ?>
<?php echo image_tag(getThumbnail(($post->getImg()),'post',240,150),array('border'=>'0', 'alt'=>$post->getName()));?>
<?php endif;?>
