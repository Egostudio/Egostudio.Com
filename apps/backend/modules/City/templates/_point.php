<?php echo $sx_geo_city->lat;?>
<br />
<?php echo $sx_geo_city->lon;?>
<br />
<br />
<a href="http://maps.googleapis.com/maps/api/geocode/json?latlng=<?php echo $sx_geo_city->lat;?>,<?php echo $sx_geo_city->lon;?>&sensor=false&language=en" target="_blank">test &rarr;</a>
