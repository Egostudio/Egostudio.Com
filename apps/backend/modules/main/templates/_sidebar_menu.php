		<div class="page-sidebar-wrapper">
			<div class="page-sidebar navbar-collapse collapse">
				<ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
					<li class="start <?php echo $currentModule == 'main' ? $active : '' ;?>">
						<a href="<?php echo url_for('@homepage');?>">
						<i class="icon-home"></i>
						<span class="title">Главная</span>
						<span class="selected"></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo url_for('@homepage');?>">
								<i class="icon-paper-plane"></i>
								Главная</a>
							</li>                        
							<li>
								<a href="http://erotic-massage-egostudio.com" target="_blank">
								<i class="icon-paper-plane"></i>
								Перейти на сайт</a>
							</li>
							<li>
								<a href="<?php echo url_for('@cleare_cache');?>" >
								<i class="icon-paper-plane"></i>
								Очистить кеш</a>
							</li>	
						</ul>
					</li>                

					<li class="<?php echo (
                        $currentModule == 'service'
                        ||  $currentModule == 'collection'                          
                        ||  $currentModule == 'girl' 
                        ||  $currentModule == 'settng_city'                                           
                        ) ? $active : '' ;?>">
						<a href="javascript:;">
						<i class="icon-docs"></i>
						<span class="title"> Управление</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">
							<li>
								<a href="<?php echo url_for('@service');?>">
								<i class="icon-eye"></i>
								Виды массажа</a>
							</li>      
							<li>
								<a href="<?php echo url_for('@girl');?>">
								<i class="icon-eye"></i>
								Девушки</a>
							</li>                            
							<li>
								<a href="<?php echo url_for('@gallery');?>">
								<i class="icon-eye"></i>
								Галлерея на главной</a>
							</li>  
							<li>
								<a href="<?php echo url_for('@collection');?>">
								<i class="icon-eye"></i>
								Галлерея</a>
							</li>  
							<li>
								<a href="<?php echo url_for('@sx_geo_city_settng_city'); ?>">
								<i class="icon-paper-plane"></i>
								 Настройки по городам</a>
							</li>                            
						</ul>
					</li>
					<li class="<?php echo (
                        $currentModule == 'post' 
                        ||  $currentModule == 'post'                
                        ) ? $active : '' ;?>">
						<a href="<?php echo url_for('@post'); ?>">
						<i class="fa fa-list"></i>
						<span class="title">Статьи</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">					
							<li>
								<a href="<?php echo url_for('@post'); ?>">
								<i class="fa fa-list"></i>
								 Статьи</a>
							</li>						
							<li>
								<a href="<?php echo url_for('@post'); ?>/new">
								<i class="fa fa-plus"></i>
								 Добавить статью</a>
							</li>                   
						</ul>
					</li>
					<li class="<?php echo (
                        $currentModule == 'City' 
                        ||  $currentModule == 'settings'                   
                        ||  $currentModule == 'device'                   
                        ||  $currentModule == 'area'                   
                        ) ? $active : '' ;?>">
						<a href="javascript:;">
						<i class="icon-docs"></i>
						<span class="title">Настройки</span>
						<span class="arrow "></span>
						</a>
						<ul class="sub-menu">									
							<li>
								<a href="<?php echo url_for('@sx_geo_city'); ?>">
								<i class="icon-paper-plane"></i>
								 Города</a>
							</li>	
							<li>
								<a href="<?php echo url_for('@area'); ?>">
								<i class="icon-paper-plane"></i>
								 Области</a>
							</li>                            
							<li>
								<a href="<?php echo url_for('@settings');?>/1/edit">
								<i class="icon-paper-plane"></i>
								Настройки проекта</a>
							</li>                      
							<li>
								<a href="<?php echo url_for('@device');?>">
								<i class="icon-paper-plane"></i>
								Device</a>
							</li>    
						</ul>
					</li>
					<li><a href="javascript:;"></a></li>
					<li><a href="javascript:;"></a></li>
                 
				</ul>
			</div>
		</div>
