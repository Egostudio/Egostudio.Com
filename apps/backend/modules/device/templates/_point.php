<?php echo $device->lat;?>
<br />
<?php echo $device->lon;?>
<br />
<br />
<a href="http://maps.googleapis.com/maps/api/geocode/json?latlng=<?php echo $device->lat;?>,<?php echo $device->lon;?>&sensor=false&language=en" target="_blank">test &rarr;</a>
<br />
<a href="http://maps.google.com/maps?q=<?php echo $device->lat;?>,<?php echo $device->lon;?>" target="_blank">map &rarr;</a>
