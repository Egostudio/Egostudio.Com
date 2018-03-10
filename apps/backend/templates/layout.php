<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en" class="no-js" ng-app="App">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <link rel="shortcut icon" href="/favicon.ico" />
    <?php include_stylesheets() ?>

<link rel="stylesheet" type="text/css" media="screen" href="/assets/global/css/components.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/assets/global/css/plugins.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/assets/admin/layout2/css/layout.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/assets/admin/layout2/css/themes/grey.css" />
<link rel="stylesheet" type="text/css" media="screen" href="/assets/admin/layout2/css/custom.css" />

  </head>
<body class="page-boxed page-header-fixed page-sidebar-closed-hide-logo page-container-bg-solid page-sidebar-closed-hide-logo">
<?php include_partial('global/header');?>

<div class="clearfix"></div>

<div class="container">
	<div class="page-container">
<?php include_component('main','sidebar_menu');?>   
		<div class="page-content-wrapper">
			<div class="page-content">
<?php include_partial('global/modal');?>  
<?php //include_partial('global/theme_panel');?>  
<?php include_partial('global/title');?>   

    <?php echo $sf_content ?>
			</div>
<?php include_partial('global/quick_sidebar');?>
		</div>
	</div>
    <?php include_partial('global/footer');?>
</div>

    <?php include_javascripts() ?>

<script type="text/javascript" src="/assets/global/scripts/metronic.js"></script>
<script type="text/javascript" src="/assets/admin/layout2/scripts/layout.js"></script>
<script type="text/javascript" src="/assets/admin/layout2/scripts/quick-sidebar.js"></script>
<script type="text/javascript" src="/assets/admin/layout2/scripts/demo.js"></script>
<script type="text/javascript" src="/assets/admin/pages/scripts/index.js"></script>
<script type="text/javascript" src="/assets/admin/pages/scripts/tasks.js"></script>
<script type="text/javascript" src="/assets/admin/pages/scripts/components-pickers.js"></script>


<script>
jQuery(document).ready(function() {    
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
   Demo.init(); // init demo features 
   QuickSidebar.init(); // init quick sidebar
   Index.init();   
   Index.initDashboardDaterange();
   Index.initJQVMAP(); // init index page's custom scripts
   Index.initCalendar(); // init index page's custom scripts
   Index.initCharts(); // init index page's custom scripts
   Index.initChat();
   Index.initMiniCharts();
   Tasks.initDashboardWidget();
   ComponentsPickers.init();
});
</script>

<script src="/js/tinymce/tinymce.min.js"></script>
  <script>
tinymce.PluginManager.load('moxiecut', '/js/tinymce/plugins/moxiecut/plugin.min.js');
  tinymce.init({ selector:'.textarea',
  height: 500,
  menubar: false,
    relative_urls: false,
  plugins: [
    'advlist autolink lists link image charmap print preview anchor',
    'searchreplace visualblocks code fullscreen',
    'insertdatetime media table contextmenu paste code moxiecut imagetools'
  ],
  toolbar: 'undo redo | insert | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link insertfile image media code',});</script>
</body>

  
</html>
