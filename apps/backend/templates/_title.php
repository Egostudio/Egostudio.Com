				<h3 class="page-title">Административная панель</h3>
				<div class="page-bar">
					<ul class="page-breadcrumb">
						<li>
							<i class="fa fa-home"></i>
							<a href="<?php echo url_for('@homepage');?>">Главная</a>
							<i class="fa fa-angle-right"></i>
						</li>
                        <?php include_component_slot('breadcrumb');?>
					</ul>
					<div class="page-toolbar">
						<div id="dashboard-report-range" class="tooltips btn btn-fit-height btn-sm green-haze btn-dashboard-daterange" data-container="body" data-placement="left" data-original-title="Change dashboard date range">
							<i class="icon-calendar"></i>
							&nbsp;&nbsp; <i class="fa fa-angle-down"></i>
							<!-- uncomment this to display selected daterange in the button 
&nbsp; <span class="thin uppercase visible-lg-inline-block"></span>&nbsp;
<i class="fa fa-angle-down"></i>
 -->
						</div>
					</div>
				</div>
