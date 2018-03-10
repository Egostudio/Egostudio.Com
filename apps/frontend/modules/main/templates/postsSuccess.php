							<div class="makeup_fl_common">
<?php foreach($pager as $post):?>
								<div class="makeup_fl_blog_list">
									<div class="common_img">
										<img src="<?php echo getThumbnail($post->getImg(),'post',1020,550)?>" alt="<?php echo $post->name; ?>" />
										<a href="<?php echo url_for('post',$post);?>"><div class="overlay"></div></a>
									</div>
									<div class="common_full_info">
										<div class="title_holder">
											<h3><a href="<?php echo url_for('post',$post);?>"><?php echo $post->name; ?></a></h3>
											<span><a href="<?php echo url_for('post',$post);?>">EgoStudio</a> / <a href="<?php echo url_for('post',$post);?>"><?php echo format_date_project($post->getCreatedAt());?></a></span>
										</div>
										<div class="common_info">
                                            <?php echo $post->getAnonce(ESC_RAW); ?>
										</div>
										<div class="makeup_fl_btn">
											<a href="<?php echo url_for('post',$post);?>">Подробней...</a>
										</div>
									</div>
								</div>
<?php endforeach;?>
							</div>
<?php if ($pager->haveToPaginate()): ?>                            
							<div class="makeup_fl_pagination">
								<div class="makeup_fl_pagination_in">
									<div class="pg_number">
										<ul>
<?php if($pager->getPage() != $pager->getFirstPage()):?>
											<li><a href="<?php echo url_for('@posts');?>?page=<?php echo $pager->getPreviousPage() ?>"><i class="xcon-angle-left"></i></a></li>
<?php endif; ?>                             
 <?php foreach ($pager->getLinks() as $page): ?> 
											<li><a href="<?php echo url_for('@posts');?>?page=<?php echo $page; ?>" <?php echo $page == $pager->getPage() ? 'class="active"' : '' ;?>><?php echo $page ?></a></li> 
<?php endforeach;?>
<?php if($pager->getPage() != $pager->getLastPage()):?>
											<li><a href="<?php echo url_for('@posts');?>?page=<?php echo $pager->getNextPage() ?>"><i class="xcon-angle-right"></i></a></li>
<?php endif; ?>
										</ul>
									</div>
									<div class="pages">
										<span>Показано <?php echo $pager->getPage(); ?> из <?php echo $pager->getLastPage();?></span>
									</div>
								</div>
							</div>
<?php endif; ?>
