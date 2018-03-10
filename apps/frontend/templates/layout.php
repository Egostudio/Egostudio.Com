<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
<link href="https://fonts.googleapis.com/css?family=Josefin+Sans:100,100i,300,300i,400,400i,600,600i,700,700i" rel="stylesheet">    
    <?php include_stylesheets() ?>
<!--[if lt IE 9]> <script type="text/javascript" src="/js/modernizr.custom.js"></script> <![endif]-->



  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <link rel="stylesheet" href="/dist/css/bootstrap-select.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="/dist/js/bootstrap-select.js"></script>

  </head>
  <body>
<div class="makeup_fl_wrapper_all">
    <div class="makeup_fl_content">
    	<div class="container">
<?php include_partial('global/vertical_menu');?>
    			<div class="makeup_fl_content_in sticky_sidebar">
    				<div class="makeup_fl_content_in_qq">
<?php include_partial('global/header');?>
						<div class="makeup_fl_content_wrap">
    <?php echo $sf_content ?>
						</div>
<?php include_partial('global/footer');?>
					</div>
    			</div>
    	</div>
    </div>
</div>
    <?php include_javascripts() ?>    
  </body>
</html>
