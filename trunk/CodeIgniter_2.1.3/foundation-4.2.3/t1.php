<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Foundation 4</title>

  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="css/normalize.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="css/config_f_krd.css" />


  <script src="js/vendor/custom.modernizr.js"></script>

</head>
<body>

  <!-- body content here -->

  <script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  <script src="js/foundation/foundation.js"></script>
  <script src="js/foundation/foundation.alerts.js"></script>
  <script src="js/foundation/foundation.clearing.js"></script>
  <script src="js/foundation/foundation.cookie.js"></script>
  <script src="js/foundation/foundation.dropdown.js"></script>
  <script src="js/foundation/foundation.forms.js"></script>
  <script src="js/foundation/foundation.joyride.js"></script>
  <script src="js/foundation/foundation.magellan.js"></script>
  <script src="js/foundation/foundation.orbit.js"></script>
  <script src="js/foundation/foundation.placeholder.js"></script>
  <script src="js/foundation/foundation.reveal.js"></script>
  <script src="js/foundation/foundation.section.js"></script>
  <script src="js/foundation/foundation.tooltips.js"></script>
  <script src="js/foundation/foundation.topbar.js"></script>
  <script src="js/foundation/foundation.interchange.js"></script>
  <script>
    $(document).foundation();
  </script>
  
<!--:: Cuerpo del documento:::-->

<!-- Barra superior-->
<nav class = "top-bar">
	<ul class = "title-area">
		<li class = "name">
		<h1><a href="#">D'roche</a></h1>
		</li>
	
	</ul>

</nav>


<nav class="breadcrumbs">
  <a href="#">Home</a>
  <a href="#">Features</a>
  <a class="unavailable" href="#">Gene Splicing</a>
  <a class="current" href="#">Cloning</a>
</nav>


<div class="row">
  <div class="small-2 large-4 columns">
	<table width = "100%" border = "2">
		<tr>
			<td bgcolor = "green"> </td>
		</tr>
	</table>
	<?php
for ($i = 0; $i < 100; $i++)
{
	echo "msj <br>";
}

?>
  </div>
  <div class="small-4 large-4 columns">
	<table width = "100%" border = "2">
		<tr>
			<td bgcolor = "yellow"> </td>
		</tr>
	</table>
  </div>
  <div class="small-6 large-4 columns" >
	<table width = "100%" border = "2">
		<tr>
			<td bgcolor = "pink"> </td>
		</tr>
	</table>
  </div>
</div>
  
</body>
</html>
