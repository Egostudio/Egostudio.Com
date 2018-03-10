							<div class="makeup_fl_common">

								<div class="makeup_fl_title_holder">
									<div class="line"></div>
									<span>Галлерея девушек</span>
								</div>
								<div class="clearfix"></div>
								<ul class="makeup_fl_gallery_list gallery makeup_fl_masonry">
<?php foreach($items as $item):?>                                
									<li class="makeup_fl_masonry_in">
										<a href="/uploads/collection/<?php echo $item->img;?>">
											<img src="<?php echo getThumbnailByWidth(($item->img),'collection',640)?>" alt="" />	
										</a>
									</li>
<?php endforeach;?>
								</ul>
							</div>
