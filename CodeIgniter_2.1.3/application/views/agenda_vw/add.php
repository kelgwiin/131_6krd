
	
	<!-- Barra de navegación-->
	<div class = "grid_12">
		<a href = "index.php/agenda"> 
		<img src = "application/views/agenda_vw/config/Imagenes/Home.png"
		 height = "30px"></a>
	</div> <!-- Fin Barra de navegación-->
	<div class = "clear"></div>
	
	
	<!-- Inicio ContenedorMedio -->
	<div class="grid_12" id="ContenedorMedio">
		
		<div class =  "grid_12">
			<h2>Agregando nuevo contacto</h2>
			<span id = "error_camposObligatorios">Error, los campos 
			marcados con asterisco (*) son obligatorios <br /> </span>
			
			<span id = "noesNumero">Error, el número de teléfono debe ser sólo números</span>
			
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
    
    <div class = "clear"></div>
    <!-- Fin ContenedorMedio -->
    
    
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
    <!-- Fin de mensaje de éxito desde el servidor-->
    
    <div class="clear"></div>
    

