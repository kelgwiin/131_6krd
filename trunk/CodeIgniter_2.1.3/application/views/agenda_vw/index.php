<?php

$c = "";
$tlf = "";
$dir = "";
	
	foreach($contactos as  $fila ){
		//contactos: 
		$c .= '<li><input type = "checkbox" name = "' .  $fila['cod_contacto'] .
		 '" class = "new"> &nbsp;&nbsp;&nbsp; <a class = "info_c" href = "index.php/agenda/info/'. 
		 $fila['cod_contacto'] .'" >' .
		 $fila['nombre'] .' ' . $fila['apellido'] . '</a></li> ';
	
		//telefonos: 
		$tlf .= '<li>' . $fila['telefono'].'</li> ';
		
		//direcciones
		$tmp = $fila['direccion'];
		
		if(!isset($tmp)){
			$tmp = "<small>&lt;vacío&gt;</small>";
		}
		$dir .= '<li>' . $tmp.'</li> ';
	}
?>
	
<!-- Inicio ContenedoSupremo -->
<div class="container_12" id="ContenedorSupremo"> 
	
	<!-- Inicio ContenedorSuperior -->
    <div class="grid_12" id="ContenedorSuperior">  
		<div id="LogoTeam" class="grid_4 alpha"
		 style="background-image:url(application/views/agenda_vw/config/Imagenes/logo.png);width:50px;height:50px;"></div>     
		<div class="grid_8 omega" id="barraSuperior">
		<br> <h1 style="font-size:50px;text-align:center;" >  Guía Telefónica </h1></div>  
	</div> <!-- Fin ContenedorSuperior -->
	<div class="clear"></div>
	
	
	<!-- Inicio ContenedorMedio -->
	<div class="grid_12" id="ContenedorMedio">
		<div class="grid_12" id="Alfabeto">
		<pre> <b> A  B  C  D  E  F  G  H  I  J  K  L  M  N  O  P  Q  R  S  T  U  V  W  X  Y  Z </pre>
		</div>
		<div class="clear"></div> <!-- Salto de linea dentro del mismo nivel -->
				
		
		<div class="grid_4 alpha"> 
		<h3 style="margin-top:10px;margin-left:70px;"># Nombre/Apellido </h3>
		 
		 <!-- Inicio Formulario -->
		<form name = "cb_eliminar" method = "post">
		
		<ul id = "contactos" style="font-size:12pt;margin-left:40px;" >
		  <?php
			//desplegando la lista que se llenó  previamente
			echo $c;
		  ?>
		</ul>
		
		</form> <!-- Cierre del Formulario de CheckBox para eliminar-->
		</div>
		
		<div class="grid_3">
		<h3 style="margin-top:10px;margin-left:30px;"># Teléfono. </h3>
		<ul id = "tlf" style="font-size:12pt;margin-left:0px;" >
		  <?php
			echo $tlf;
		  ?>
		</ul>
		</div>		
		
		
		<div class="grid_5 omega">
		<h3 style="margin-top:10px;margin-left:30px;"> Dirección </h3>
		<ul id = "dir"style="font-size:12pt;margin-left:0px;" >
		  <?php
			echo $dir;
		  ?>
		</ul>
		</div>
		
		<div class="clear"></div> 
		
		<!-- Inicio Seccion de botones -->
		
		<!-- Boton Eliminar-->
		<div align = "left" class = "grid_2 alpha"> 
			<button style="margin-top:10px;margin-left:10px;"
			 name="bt_delete" value="Eliminar" class="enviar" id = "bt_delete" />
			Eliminar
			</button>
						
		</div>
		
		
		
		<div class = "grid_2">
			<form action = "index.php/agenda/agregar" method = "post"> <!-- Inicio Formulario Agregar-->
				
				<!-- Boton Agregar-->
				<input style="margin-top:10px;margin-left:10px;" type = "submit" name = "bt_add" class = "enviar"
				 value = "Agregar contacto">
			</form> <!-- Cierre del Formulario del boton Agregar-->
		</div>
		
		<div class = "grid_8 omega"></div>
		<div class = "clear"></div>
	
	</div> <!-- Fin ContenedorMedio -->
    <div class="clear"></div>
    
    <!-- Inicio ContenedorFinal -->
	<div class="grid_12" id="ContenedorFinal">
		
    <div class="grid_4 alpha">
		<p style="font-size:15px;text-align:center;"> Esto es un derecho de autor lalala
		lalala lalala lal lal la </p>
    </div> 
    
     <div class="grid_2"> 
		<h3 style="font-size:35px;text-align:center;"> <b> Footer </h3>
    </div> 
    
    <div class="grid_4"> 
		<p style="font-size:15px;text-align:center;"> Esto es un derecho de autor lalala
		lalala lalala lal lal la </p>
    </div> 
    
    <div class="grid_2 omega"> <a href="about.php">
	<img src="application/views/agenda_vw/config/Imagenes/logo2.jpg" alt="Integrantes" width="64" height="64"></a>
    </div>
     
	</div>
    <div class="clear"></div>
    <br> <br>
    <!-- Fin ContenedorFinal -->
