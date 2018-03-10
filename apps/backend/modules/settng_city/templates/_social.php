<?php $item = $sx_geo_city->getCities();?>
<?php $style = 'style="opacity: 0.1;"'; ?>
<ul class="social-icons">


				<li>
<?php if($item->twitter):?>                
					<a class="social-icon-color twitter" data-original-title="Twitter" href="<?php echo $item->twitter;?>" target="_blank"></a>
<?php else:?>
					<a class="social-icon-color twitter" data-original-title="Twitter" href="javascript:;" <?php echo $style;?>></a>
<?php endif;?>
				</li>  

				<li>
<?php if($item->instagram):?>                
					<a class="social-icon-color instagram" data-original-title="Instagram" href="<?php echo $item->instagram;?>" target="_blank"></a>
<?php else:?>
					<a class="social-icon-color instagram" data-original-title="Instagram" href="javascript:;" <?php echo $style;?>></a>
<?php endif;?>
				</li>  

				<li>
<?php if($item->facebook):?>                
					<a class="social-icon-color facebook" data-original-title="Facebook" href="<?php echo $item->facebook;?>" target="_blank"></a>
<?php else:?>
					<a class="social-icon-color facebook" data-original-title="Facebook" href="javascript:;" <?php echo $style;?>></a>
<?php endif;?>
				</li>  


				<li>
<?php if($item->vk):?>                
					<a class="social-icon-color vk" data-original-title="VK" href="<?php echo $item->vk;?>" target="_blank"></a>
<?php else:?>
					<a class="social-icon-color vk" data-original-title="VK" href="javascript:;" <?php echo $style;?>></a>
<?php endif;?>
				</li>  


			</ul>
