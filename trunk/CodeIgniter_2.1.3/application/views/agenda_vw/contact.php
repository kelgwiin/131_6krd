
	
	<!-- Barra de Navegación-->
	<div class = "grid_12">
		<a href = "index.php/agenda"> <img src = "application/views/agenda_vw/config/Imagenes/Home.png" height = "30px"></a>
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
	
