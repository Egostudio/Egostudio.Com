Наименование: <b><?php echo link_to($service->getName(), 'service_edit', $service) ?></b>
<br />
Короткое наим: <b><?php echo $service->getNameShort() ? link_to($service->getNameShort(), 'service_edit', $service) : ''; ?></b>
<br />
<br />
<small><b>Город:</b> <span style="color:red;"><?php echo $service->getCity();?></span></small>
<br />
Цена: <?php if($service->price):?><?php echo $service->price;?> грн.<?php endif;?>
<br />
Продолжительность: <?php if($service->duration):?><?php echo $service->duration;?><?php endif;?>
<br /><br />
<u>Описание:</u> <?php if($service->getContent()):?><?php echo truncate_text($service->getContent(),40);?><?php endif;?>
<br />
<u>Короткое описание:</u> <?php if($service->getContentShort()):?><?php echo truncate_text($service->getContentShort(),40);?><?php endif;?>
