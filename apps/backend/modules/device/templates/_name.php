<?php echo $device->name;?>
<br />
<?php echo $device->type;?>
<br />
<span style="font-size: 8px;"><?php echo $device->device;?></span>
<br />
<br />
<?php if($device->city_id):?>
<?php echo $device->getCity();?>
<br />
<span style="font-size: 10px;"><?php echo $device->getCity()->address;?></span>
<br />
<span style="font-size: 10px;"><?php echo $device->getCity()->lat;?></span>
<br />
<span style="font-size: 10px;"><?php echo $device->getCity()->lon;?></span>
<br />
<span style="font-size: 10px;"><a href="https://www.google.com.ua/maps/dir/<?php echo $device->lat;?>,<?php echo $device->lon;?>/<?php echo $device->getCity()->lat;?>,<?php echo $device->getCity()->lon;?>" target="_blank">Маршрут &rarr;</a></span>
<?php endif;?>
