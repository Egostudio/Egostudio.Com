							<div class="makeup_fl_common">

								<div class="makeup_fl_title_holder">
									<div class="line"></div>
									<span>Девушки</span>
								</div>

                                
								<div class="makeup_fl_about_team">
									<div class="title_holder">
										<h3>Девушки EgoStudio</h3>
									</div>
									<div class="team_holder makeup_fl_masonry">

<?php foreach($items as $item):?>
										<div class="specialist makeup_fl_masonry_in">
											<div class="spc_img">
												<img src="<?php echo getThumbnail($item->getImg(),'girl',640,350)?>" alt="<?php echo $item->name;?>" />
												<div class="overlay"></div>
											</div>
											<div class="spc_name">
												<h3><?php echo $item->name;?></h3>
												<span><?php echo $item->content;?></span>
											</div>
											<div class="makeup_fl_social_icons">
<?php include_component('main','social');?>
											</div>
										</div>
<?php endforeach;?>										

									</div>
								</div>
							</div>
