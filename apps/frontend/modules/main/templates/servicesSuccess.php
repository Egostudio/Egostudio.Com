							<div class="makeup_fl_title_holder">
								<div class="line"></div>
								<span>Массаж</span>
							</div>
							<div class="clearfix"></div>
							
							<div class="makeup_fl_services makeup_fl_masonry">
<?php foreach($services as $service):?>
								<div class="service makeup_fl_masonry_in">
									<div class="srv_img">
										<img src="/img/services/1.jpg" alt="" />
										<a href="service_single.html"><div class="overlay"></div></a>
										<?php if($service->price):?><div class="price"><span><?php echo $service->price;?> грн.</span></div><?php endif;?>
									</div>
									<div class="title_holder">
										<h3><a href="service_single.html"><?php echo $service->name;?></a></h3>
<span><?php if($service->duration):?>Продолжительность : <?php echo $service->duration;?><?php else:?>&nbsp;<?php endif;?></span>
									</div>
								</div>
<?php endforeach?>
							</div>
