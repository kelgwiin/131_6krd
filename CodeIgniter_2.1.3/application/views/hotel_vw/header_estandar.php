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
	href="application/views/hotel_vw/config/img/corona_.ico" /> 
  
  
  	<title>
	<?php printf("%s </title>",$title);?>
  
</head>


<body>

<!-- Para mostrar msj de -->
<?php 
	if($mostrar_mensaje){
		echo '<div id = "true" class = "mostrar_nuevo_usuario"></div>';
	}else{
		echo '<div id = "false" class = "mostrar_nuevo_usuario"></div>';
	}
?>


<!---------------------------------->
<!-- AVISOS de Foundation (reveal)-->
<!---------------------------------->
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
				<li id  = "home">
					<a id = "home" href="index.php/hotel/">
					<img alt = "icono usuario"src="application/views/hotel_vw/config/img/home_w.png" width="30px">
					Inicio </a>
				</li>
				
				
				
				<!---------------------------------->
				<!-- Disponibilidad Hab. 	      -->
				<!---------------------------------->
				<li class="divider" id = "disponibilidad_div"></li>
				
					<li id = "disponibilidad">
						<a  id = "disponibilidad" title = "Disponibilidad de habitaciones"
						href = "index.php/hotel/disponibilidad"
						><img alt = "disponibilidad de habitaciones"src="application/views/hotel_vw/config/img/casas.png" width="30px">Disponibilidad de Hab.</a>
					</li>
				
				<!-------------------------------->
				<!-- Reservas (ADMIN)  (oculta) -->
				<!-------------------------------->
				<li class="divider" id = "reservas_admin_div" style = "display:none"></li>
				
					<li id = "reservas_admin" style = "display:none">
						<a href = "index.php/hotel/ver_reservas" id= "reservas_admin" title = "Reservas"><img alt = "Reservas"src="application/views/hotel_vw/config/img/reserva.png" width="30px">Reservas (admin) </a>
					</li>
				
				<!-- ------------------- -->
				<!-- Reservas (estandar)-->
				<!-- ------------------- -->
				<li class="divider" id = "reservas_estandar_div"></li>
				
				<li id = "reservas_estandar" class = "has-dropdown">
					<a >
						<img alt = "reserva estándar"
						src="application/views/hotel_vw/config/img/reserva.png"
						width="30px">
						Reservas
					</a>
					
					<ul class = "dropdown">
						<li><a href= "index.php/hotel/mis_reservas">Mis reservas</a></li>
						<li><a href = "index.php/hotel/disponibilidad">Reservar</a></li>
					</ul>
				</li>
				
				<!------------------------->
				<!-- Registrarse (Oculta)-->
				<!------------------------->
				<li class="divider"  id = "registrarse_div" style = "display:none"></li>
				<li id = "registrarse" style = "display:none">
					<a id = "registrarse" href="index.php/hotel/registro_usuario/">
						<img alt = "icono usuario"src="application/views/hotel_vw/config/img/vcard_add.png" width="30px">
						Registrarse
					</a>
				</li>
				
				<!-- ------------------- ---------->
				<!-- Reportes (ADMIN - oculto)-->
				<!-- ------------------- ---------->
				<!--
				<li class="divider" id = "reportes_div" style="display:none"></li>
				
				<li id = "reportes" class = "has-dropdown" style="display:none">
					<a >
						<img alt = "reportes"
						src="application/views/hotel_vw/config/img/reportes.png"
						width="30px">
						Reportes
					</a>
					
					<ul class = "dropdown">
						<li><a>Reservas</a></li>
						<li><a>Usuario</a></li>
						<li><a>Habitaciones</a></li>
						<li><a>Llamadas</a></li>
					</ul>
				</li> -->
				
				<li class="divider" id = "inicio_sesion_div"></li>
				<!------------------------------->
				<!-- Inicio de Sesión (oculta)--->
				<!------------------------------->
					<li id = "inicio_sesion" style = "display:none">
						<a id = "inicio_sesion" data-dropdown="drop2" >
						<img alt = "icono usuario"
						src="application/views/hotel_vw/config/img/sesion.png" width="30px">
						Iniciar Sesion
						</a>
					
					<ul id="drop2" class="f-dropdown content" data-dropdown-content>
					
					<form class = "custom" data-abide id = "fr_inicio_sesion"
					method = "post" action = "index.php/hotel/ini_sesion" >
					 
						<div class="input-wrapper">
							<label for = "usuario"><h6>Usuario </h6></label>
							<input id = "usuario" name = "usuario" type="text" required>
							<small class="error">Ingrese el usuario</small>
						</div>
						
						<div class="input-wrapper">
							<label for = "clave"><h6>Contraseña </h6></label>
							<input id = "clave" name = "clave" type="password" pattern = "alpha_numeric" required>
							<small class="error">Ingrese la contraseña</small>
						</div>		
						  
						  
							<div class="row" align = "center">
							<div class="large-12 columns" style="text-align:center;">
								<button type = "submit" >Entrar</button>
							</div> </div>
																
					</form>
							<!-- Mensaje de error, inicio sesión-->
							<div id = "error_inicio_sesion" style = "display:none">
							<span class="alert label">Clave o usuario incorrecto</span>
							</div>
					</ul>
					</li> 
				<!------------------------->
				<!-- Sesión Iniciada-->
				<!------------------------->
				<li id = "sesion_iniciada" >
					<a  id= "sesion_iniciada" data-dropdown="drop3" >
					<img alt = "icono usuario"src="application/views/hotel_vw/config/img/sesion.png" width="30px">
					
					<span id = "nombre_usuario"
					value = <?php echo '"'.$usuario['nombre'].'"'; ?>
					>
						<?php echo $usuario['nombre']; ?>
					</span>
					</a>
				</li>
				
				
				
				<!------------------------->
				<!-- Cerrar sesión-->
				<!------------------------->
				<li class="divider" id = "cerrar_sesion_div"></li>
				
				<li id = "cerrar_sesion" >
						<a id = "boton_cerrar_sesion" title = "Cerrar sesión"><img src="application/views/hotel_vw/config/img/salir.png" width="30px"></a>
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

