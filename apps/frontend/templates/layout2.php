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

<script type="text/javascript">
 

function setText(val, e) {
    document.getElementById(e).value = val;
}
 

function insertText(val, e) {
    document.getElementById(e).value += val;
}
 

var nav = null;
 

function requestPosition() {
  if (nav == null) {
      nav = window.navigator;
  }
  if (nav != null) {
      var geoloc = nav.geolocation;
      if (geoloc != null) {
          geoloc.getCurrentPosition(successCallback);
      }
      else {
          alert("geolocation not supported");
      }
  }
  else {
      alert("Navigator not found");
  }
}
 

 

 

function successCallback(position)
{
   setText(position.coords.latitude, "latitude");
   setText(position.coords.longitude, "longitude");
}
 

 

 

</script>



  </head>
  <body>

<label for="latitude">Latitude: </label><input id="latitude" /> <br />
<label for="longitude">Longitude: </label><input id="longitude" /> <br />
<input type="button" onclick="requestPosition()" value="Get Latitude and Longitude"  />


<script type="text/javascript" src="https://maps.google.com/maps/api/js?sensor=false"></script>
    <article>
      <p>Finding your location: <span id="status">checking...</span></p>
    </article>
<script>
function success(position) {
  var s = document.querySelector('#status');

  if (s.className == 'success') {
    // not sure why we're hitting this twice in FF, I think it's to do with a cached result coming back
    return;
  }

  s.innerHTML = "found you!";
  s.className = 'success';

  var mapcanvas = document.createElement('div');
  mapcanvas.id = 'mapcanvas';
  mapcanvas.style.height = '400px';
  mapcanvas.style.width = '560px';

  document.querySelector('article').appendChild(mapcanvas);

  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  var myOptions = {
    zoom: 15,
    center: latlng,
    mapTypeControl: false,
    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("mapcanvas"), myOptions);

  var marker = new google.maps.Marker({
      position: latlng,
      map: map,
      title:"You are here! (at least within a "+position.coords.accuracy+" meter radius)"
  });
}

function error(msg) {
  var s = document.querySelector('#status');
  s.innerHTML = typeof msg == 'string' ? msg : "failed";
  s.className = 'fail';

  // console.log(arguments);
}

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success, error);
} else {
  error('not supported');
}

</script>

<script type="text/javascript">
if(navigator.geolocation) {
navigator.geolocation.getCurrentPosition(function(position) {
            var latitude = position.coords.latitude;
            var longitude = position.coords.longitude;
			alert(latitude+' '+longitude);
});
 
} else {
    alert("Geolocation API не поддерживается в вашем браузере");
}
</script>


  <script>
function geoFindMe() {
  var output = document.getElementById("out");

  if (!navigator.geolocation){
    output.innerHTML = "<p>Geolocation is not supported by your browser</p>";
    return;
  }

  function success(position) {
    var latitude  = position.coords.latitude;
    var longitude = position.coords.longitude;

    output.innerHTML = '<p>Latitude is ' + latitude + '° <br>Longitude is ' + longitude + '°</p>';

    var img = new Image();
    img.src = "http://maps.googleapis.com/maps/api/staticmap?center=" + latitude + "," + longitude + "&zoom=13&size=300x300&sensor=false";

    output.appendChild(img);
  };

  function error() {
    output.innerHTML = "Unable to retrieve your location";
  };

  output.innerHTML = "<p>Locating…</p>";

  navigator.geolocation.getCurrentPosition(success, error);
}

</script>

<p><button onclick="geoFindMe()">Show my location</button></p>
<div id="out"></div>

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
