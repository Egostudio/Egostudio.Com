							<div class="makeup_fl_common">
								<div class="common_img">
									<img src="<?php echo getThumbnail($service->getImg(),'service',1020,550)?>" alt="<?php echo $service->getName();?>" />
									<div class="overlay"></div>
								</div>
								<div class="common_full_info">
									<div class="title_holder">
										<div class="common_name">
											<h3><?php echo $service->getName();?></h3>
											<span><?php if($service->duration):?>Продолжительность : <?php echo $service->duration;?><?php else:?>&nbsp;<?php endif;?></span>
										</div>
										<?php if($service->price):?><div class="common_price"><span><?php echo $service->price;?> грн.</span></div><?php endif;?>
                                        
									</div>
									<div class="common_info"><?php echo $service->getContent(ESC_RAW);?></div>
									<div class="makeup_fl_btn">
										<a href="/modal/booking.html" class="ajax-popup-link">Заказать</a>
									</div>
								</div>
							</div>
