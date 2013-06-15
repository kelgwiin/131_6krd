<?php
	include('libreria_config.php');
	getHeader('Contáctanos  - Guía Telefónica');
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
	
	<!-- Barra de Navegación-->
	<div class = "grid_12">
		<a href = "index.php"> <img src = "Imagenes/Home.png" height = "30px"></a>
	</div>  <!-- Fin Barra de Navegación-->
	<div class = "clear"></div>
	
	
	<!-- Inicio ContenedorMedio -->
	<div class="grid_12" id="ContenedorMedio">
		
		<div class = "grid_12">			
		<h2>Contáctanos:</h2>
		<p>
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar
			Algún mensaje que colocar</p>
			
			<br />
			
			<span id = "error_camposObligatorios">Error, los campos 
			marcados con asterisco (*) son obligarios <br /> </span>
		</div>
		<div class = "clear"></div>
		
		<!-- Inicio Formulario de contacto -->
		<form >
		<div class = "grid_3 alpha">
			<label for="name">Nombre: </label> <br/> <br/>
			<label for="email">Correo electrónico:</label> <br/> <br/>
			<label for="company">Sitio web:</label> <br/> <br/> <br/>
			<label for="message">Cuerpo del mensaje:</label>
		</div>
			
		<div class = "grid_9 omega">
			<input id="name" name="name" class="text" /> *<br/>
			<input id="email" name="email" class="text" /> *<br/>
			<input id="web" name="company" class="text" />  <br/> <br/>
			<textarea id="message" name="message" rows="6" cols="50"></textarea>*
		</div>	
		
		</form> <!-- Fin Formulario de contacto -->
		<div class = "clear"></div> <!-- Cambio de nivel -->
		
		<div class = "grid_12">
			<button id = "bt_contactar" name="imageField" class="enviar">
			Enviar 
			</button>
		</div>
		
		
		<br><br><br><br><br><br> 	
	</div> 
    <!-- Fin ContenedorMedio -->
	<div class="clear"></div>
	
	
    <!-- Colocar la data de regreso del servidor
    Solo es visible cuando se activa desde ajax (app.js)
    -->
    <div class = "grid_12" id = "msj">
		
		<br>
		<br>
		<br>
		
		<h2></h2>
		
		<br>
		<br>
		<br>
		<br>
    </div>
    <!-- Fin de mensaje de éxito desde el servidor -->
    
	<div class = "clear"></div>
	
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
