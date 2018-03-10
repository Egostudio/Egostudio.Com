							<div class="makeup_fl_common">
								<div class="makeup_fl_blog_list">
									<div class="common_img">
										<img src="<?php echo getThumbnail($post->getImg(),'post',1020,550)?>" alt="<?php echo $post->name; ?>" />
										<div class="overlay"></div>
									</div>
									<div class="common_full_info">
										<div class="title_holder">
											<h3><?php echo $post->name; ?></h3>
											<span><a href="<?php echo url_for('post',$post);?>">EgoStudio</a> / <a href="<?php echo url_for('post',$post);?>"><?php echo format_date_project($post->getCreatedAt());?></a></span>
										</div>
										<div class="common_info">
											<?php echo $post->getText(ESC_RAW); ?>
                                        </div>
									</div>
								</div>
							</div>
