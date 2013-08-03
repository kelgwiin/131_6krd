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

<!-- Avisos de Foundation -->
<div id="aviso_inicio_sesion" class="reveal-modal small">
  
   
  <p>
	  <img src = "application/views/hotel_vw/config/img/aviso.png" width = "50px">
	Usted ha iniciado sesión exitosamente.</p>
	<a class="close-reveal-modal">&#215;</a>
</div>

<div id="aviso_sesion_cerrada" class="reveal-modal small">
  <p>
	<img src = "application/views/hotel_vw/config/img/aviso.png" width = "50px">
	Usted ha cerrado sesión exitosamente.
  </p>
<a class="close-reveal-modal">&#215;</a>
</div>


<!-- Barra superior-->
<div class="contain-to-grid sticky"> 
	<nav class = "top-bar">   

		
		<section class="top-bar-section">
			<ul class="left">
				<li class="divider"></li>
				<li><a href="index.php/hotel/"> Hotel D'roche </a></li>
				<li class="divider"></li>
			</ul>			
		</section>
		

		
	<ul class="right">
		
		<section class="top-bar-section">
			<ul class="right">
				
				<!------------------------->
				<!--Home-->
				<!------------------------->
				<li class="divider" id = "home_div"></li>
				<li class="active" id  = "home">
					<a href="index.php/hotel/">
					<img alt = "icono usuario"src="application/views/hotel_vw/config/img/home_w.png" width="30px">
					Inicio </a>
				</li>
				<!------------------------->
				<!-- Registrarse-->
				<!------------------------->
				<li class="divider"  id = "registrarse_div"></li>
				<li id = "registrarse">
					<a href="index.php/hotel/registro_usuario/">
						<img alt = "icono usuario"src="application/views/hotel_vw/config/img/vcard_add.png" width="30px">
						Registrarse
					</a>
				</li>
				
				<li class="divider" id = "inicio_sesion_div"></li>
				<!------------------------->
				<!-- Inicio de Sesión -->
				<!------------------------->
					<li id = "inicio_sesion"style = ""><a  data-dropdown="drop2" >
						<img alt = "icono usuario"src="application/views/hotel_vw/config/img/sesion.png" width="30px">
						Iniciar Sesión</a>
					
					<ul id="drop2" class="f-dropdown content" data-dropdown-content>
					<form >
						<label for="usuario"> <h6> Usuario </h6> </label>
							<div class="row">
							<div class="large-12 columns ">
								<input id="usuario" type="text" placeholder="">
							</div></div>	
								
						  <br>			
						  <label for="clave"> <h6> Contraseña </h6> </label>
							<div class="row">
								<div class="large-12 columns ">
									<input id="clave" type="password" placeholder="">
									
							</div></div>	
								
							<div class="row">
							<div class="large-12 columns" style="text-align:center;">
								<br> <a  id="boton_inicio_sesion" class="button"> Entrar</a>
							
																
					</form>
							<!-- Mensaje de error, inicio sesión-->
							<div id = "error_inicio_sesion" style = "display:none">
							<br>
							<span class="alert label">Clave o usuario incorrecto</span>
							</div>
					</ul>
					</li> 
				<!----------------------------->
				<!-- Sesión Iniciada (oculta)-->
				<!----------------------------->
				<li id = "sesion_iniciada" style = "display:none">
					<a  data-dropdown="drop3" >
					<img alt = "icono usuario"src="application/views/hotel_vw/config/img/sesion.png" width="30px">
					<span id = "nombre_usuario">Nombre usuario</span>
					</a>
				</li>
				
				<!----------------------------->
				<!-- Ocupar reservas(oculta) -->
				<!----------------------------->
				<li class="divider" id = "ocupar_reservas_div" style = "display:none"></li>
				
					<li id = "ocupar_reservas" style = "display:none">
						<a   title = "Ocupar reservas"><img alt = "cerrar sesión"src="application/views/hotel_vw/config/img/reserva.png" width="30px">Ocupar reservas</a>
					</li>
				
				<!--------------------------->
				<!-- Cerrar sesión (oculta)-->
				<!--------------------------->
				<li class="divider" id = "cerrar_sesion_div" style = "display:none"></li>
				
				<li id = "cerrar_sesion" style = "display:none">
						<a id = "boton_cerrar_sesion" 
						title =	"Cerrar sesión"><img src="application/views/hotel_vw/config/img/salir.png" width="30px"></a>
				</li>
				<li class="divider" id = "fin"></li>
			</ul>
		</section>
			    
	</ul>
	
</nav>	
</div>
	
	<!-- Panel con logo y nombre -->
	<br>
	<div class="row" style="" align = "center">
	<div class="panel radius" style="marigin:0px;width:840px; height:120px; background-color:white;
	 border-color:#A52A2A; border-width:0px; ">		
		<div class="large-2 columns ">
			<img style="margin-left:45px; width:180px; height:94px;" src="application/views/hotel_vw/config/img/Logo2.jpg">
			
		</div>
		
		<div class="large-10 columns  ">
			<img style="margin-left:15px; margin-top:0px;width:600px; height:75px;" src="application/views/hotel_vw/config/img/letralogo2.jpg">

		</div>				
	</div>		
	</div>	
