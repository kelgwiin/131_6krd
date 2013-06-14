<?php
	include('libreria_config.php');
	getHeader('Agregar - Guía Telefónica');
?>	
	
<!-- Inicio ContenedorSupremo -->
<div class="container_12" id="ContenedorSupremo"> 
	
	<!-- Inicio ContenedorSuperior -->
    <div class="grid_12" id="ContenedorSuperior">      
		<div id="LogoTeam" class="grid_4 alpha" style="background-image:url(Imagenes/logo.png);width:50px;height:50px;"></div>    
		<div class="grid_8 omega" id="barraSuperior">
		<br> <h1 style="font-size:50px;text-align:center;" >  Guía Telefónica </h1></div>  
	</div> <!-- Fin ContenedorSuperior -->
	<div class="clear"></div>
	
	<!-- Barra de navegación-->
	<div class = "grid_12">
		<a href = "index.php"> <img src = "Imagenes/Home.png" height = "30px"></a>
	</div> <!-- Fin Barra de navegación-->
	<div class = "clear"></div>
	
	
	<!-- Inicio ContenedorMedio -->
	<div class="grid_12" id="ContenedorMedio">
		
		<div class =  "grid_12">
			<h2>Agregando nuevo contacto</h2>
			<span id = "error_camposObligatorios">Error, los campos 
			marcados con asterisco (*) son obligarios <br /> </span>
		</div>
		<div class = "clear"></div>
		
		<!--  Inicio Formulario Agregar -->
		<form  name = "add_contacto">
			
			<div class = "grid_2 alpha">
				<!--Columna 0: etiquetas -->
				<label for = "nombre">(*) Nombre:</label> <br /><br />	
				<label for="e_civil">Estado civil: </label> <br /><br />
				<label for="country">País: </label> <br /> <br /> 
				<br />
				<label for="address">Dirección: </label>	
			</div>
			
			<div class="grid_3"> 
				<!-- Columna 1: Caja de texto-->
				<input id="nombre" class = "new" type = "text" name = "nombre"> <br />
				<input id="e_civil" class = "new" type = "text" name = "e_civil"> <br />
				<input id="pais" class = "new" type = "text" name = "country"> <br /> <br />
				<textarea  id = "new" name="address" rows="6" cols="40"></textarea>
			</div>		
			
			<div class = "grid_2">
				<!-- Columna: etiquetas 1 -->
				<label for = "lastname">(*) Apellido:</label> <br /><br />
				<label for = "tlf">(*) Teléfono: </label>
			</div>
			
			<div class = "grid_3">
				<!-- Columna 2: caja de texto 2 -->
				<input id="apellido" class = "new" type = "text" name = "lastname"> <br />
				<input id = "tlf" class = "new" type = "text" name = "tlf">
			</div>
			
			<div class = "grid_2 omega">
				
				<label  for = "sex">Sexo: </label>
				<select name = "sex" id = "sex">
					<option>F</option>
					<option>M</option>
				</select> <br />
			</div>	
			<div class = "clear"></div> <!-- Cambio Nivel -->
			
			
			</form>	<!--  Fin Formulario Agregar -->
			
			<div class = "grid_12">
				<button class="enviar" id = "bt_save">Guardar</button>
			</div>
			
		
		<br><br><br><br><br><br> 	
		<div class="clear"></div>
		
	</div> 
    <div class="clear"></div>
    <!-- Fin ContenedorMedio -->
    
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
	<img src="Imagenes/logo2.jpg" alt="Integrantes" width="64" height="64"></a>
    </div>
     
	</div>
    <div class="clear"></div>
    <br> <br>
    <!-- Fin ContenedorFinal -->

	</div>  <!-- Fin ContenedorSupremo -->
</body>
</html>
