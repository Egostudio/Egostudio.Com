<?php foreach($sf_data->getRaw('items') as $k=>$item):?>
<small><b><?php echo $item['types'][0];?></b>: <?php echo array_shift($item);?></small>
<br />
<?php endforeach;?>

