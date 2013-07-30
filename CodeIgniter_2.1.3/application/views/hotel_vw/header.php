<!DOCTYPE html>
<!--[if IE 8]>         <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
	
	
	<?php
	//Para otros en vez de ciuc es localhost
	echo '<base href = "http://localhost/131_6krd/trunk/CodeIgniter_2.1.3/">';
	?>
	
	<!-- Cambiar por:  -->
	<?php
	//~ echo '<base href = "http://krd-daweb.dyndns.biz/CodeIgniter_2.1.3/">';
	?>	
	
	

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
<!--   CSS del DataTable --> 
  <link rel="stylesheet" href="application/views/hotel_vw/config/DataTables-1.9.4/media/css/jquery.dataTables.css">
  <link rel="stylesheet" href="application/views/hotel_vw/config/DataTables-1.9.4/examples/examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css">
  <link rel="stylesheet" href="application/views/hotel_vw/config/DataTables-1.9.4/media/css/jquery.dataTables_themeroller.css">
  
  <!-- If you are using CSS version, only link these 2 files, you may add app.css to use for your overrides if you like. -->
  <link rel="stylesheet" href="application/views/hotel_vw/config/css/normalize.css" />
  <link rel="stylesheet" href="application/views/hotel_vw/config/css/config_f_krd.css" />
  <link rel="stylesheet" href="application/views/hotel_vw/config/css/foundation.css" />
  <link rel="stylesheet" href="application/views/hotel_vw/config/css/orbit.css">
  

  <!--  <link rel="stylesheet" href="application/views/hotel_vw/config/DataTables-1.9.4/media/css/demo_table.css">-->
  <!--<link rel="stylesheet" href="application/views/hotel_vw/config/DataTables-1.9.4/media/css/demo_table_jui.css">-->
  <!--<link rel="stylesheet" href="application/views/hotel_vw/config/DataTables-1.9.4/extras/TableTools/media/css/TableTools_JUI.css"> -->
  <!-- Fin de DateTable - CSS-->

<!-- JavaScript-->
<script>
  document.write('<script src=' +
  ('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
  '.js><\/script>')
  </script>
  
  
  
 	<script src="application/views/hotel_vw/config/js/jquery-1.9.1.js" type="text/javascript"></script> 
 	
 	<!-- DateTable-->
        <script src="application/views/hotel_vw/config/DataTables-1.9.4/media/js/jquery.dataTables.js"></script>
        <script src="application/views/hotel_vw/config/DataTables-1.9.4/media/js/jquery.dataTables.min.js"></script>
        <!--<script src="application/views/hotel_vw/config/DataTables-1.9.4/media/js/jquery.js"></script>-->
        
        <!--<script src="application/views/hotel_vw/config/DataTables-1.9.4/extras/TableTools/media/js/TableTools.js"></script>
        <script src="application/views/hotel_vw/config/DataTables-1.9.4/extras/TableTools/media/js/ZeroClipboard.js"></script>-->
        
        <!-- Fin de DateTable-->
        
	<link rel="stylesheet" href="application/views/hotel_vw/config/css/ui-lightness/jquery-ui.custom.css" />
	<script src="application/views/hotel_vw/config/js/jquery-ui-1.10.3.custom.js"></script>
	<script src="application/views/hotel_vw/config/js/jquery-ui-1.10.3.custom.min.js"></script>
	
        
        
	<script src="application/views/hotel_vw/config/js/app.js" type="text/javascript"></script>
	
  <link rel="icon"   type="image/x-icon"  
	href="application/views/hotel_vw/config/img/favicon.ico" /> 
  
  
  	<title>
	<?php printf("%s </title>",$title);?>
  
</head>


<body>

	
<!-- Barra superior-->
<div class="contain-to-grid sticky"> 
	<nav class = "top-bar">   

		
		<section class="top-bar-section">
			<ul class="left">
				<li class="divider"></li>
				<li><a href="index.php/hotel/hotel/"> Hotel D'roche </a></li>
				<li class="divider"></li>
			</ul>			
		</section>
		

		
	<ul class="right">
		
		<section class="top-bar-section">
			<ul class="right">
				<li class="divider"></li>
				<li class="active"><a href="index.php/hotel/hotel/"> Inicio </a></li>
				<li class="divider"></li>
				<li><a href="index.php/hotel/registro_usuario/"> Registrarse </a></li>
				<li class="divider"></li>
					<li><a href="#" data-dropdown="drop2" >Iniciar Sesion</a>
					
					<ul id="drop2" class="f-dropdown content" data-dropdown-content>
					<form>
						<label for="Correo_sesion"> <h6> Correo </h6> </label>
							<div class="row">						
							<div class="large-12 columns ">				
								<input id="Correo_sesion" type="text" placeholder="">
							</div></div>	
								
						  <br>			
						  <label for="Contraseña_sesion"> <h6> Contraseña </h6> </label>
							<div class="row">						
								<div class="large-12 columns ">
									<input id="Contraseña_sesion" type="text" placeholder="">
							</div></div>	
								
							<div class="row">
							<div class="large-12 columns" style="text-align:center;">
								<br> <a href="#" id="botones" class="button"> Entrar</a>
							</div></div>
																
					</form>
					</ul>
					</li>				
				<li class="divider"></li>
				
	
			</ul>
		</section>
			    
	</ul>
	
</nav>	
</div>
	
	<!-- Panel con logo y nombre -->
	<br>
	<div class="row" style="" align = "center">
	<div class="panel radius" style="marigin:0px;width:840px; height:120px; background-color:white;
	 border-color:#A52A2A; border-width:3px; ">		
		<div class="large-2 columns ">
			<img style="margin-left:45px; width:180px; height:94px;" src="application/views/hotel_vw/config/img/Logo2.jpg">
			
		</div>
		
		<div class="large-10 columns  ">
			<img style="margin-left:15px; margin-top:0px;width:600px; height:75px;" src="application/views/hotel_vw/config/img/letralogo2.jpg">

		</div>				
	</div>		
	</div>	
