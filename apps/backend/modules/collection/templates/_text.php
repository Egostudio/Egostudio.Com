<b><?php echo link_to($girl->getName(), 'girl_edit', $girl) ?></b>
<br />
<small><b>Город:</b> <span style="color:red;"><?php echo $girl->getCity();?></span></small>
<br />
Описание: <?php if($girl->content):?><?php echo $girl->content;?><?php endif;?>
