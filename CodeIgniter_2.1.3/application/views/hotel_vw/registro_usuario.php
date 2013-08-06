<!-- Modal de error en data enviada-->
<div id="aviso_error_registro" class="reveal-modal small">
  <p>
	<img src = "application/views/hotel_vw/config/img/aviso.png" width = "50px">
	Hay errores en la información ingresada, verifíquela.
  </p>
<a class="close-reveal-modal">&#215;</a>

</div>

<!-- Modal de error inesperado-->
<div id="aviso_error_inesperado" class="reveal-modal small">
  <p>
	<img src = "application/views/hotel_vw/config/img/aviso.png" width = "50px">
	Error inesperado :(.
  </p>
<a class="close-reveal-modal">&#215;</a>

</div>

<div class="row" style="margin:auto;">
	<div class="large-12 columns" style="text-align:center;">	
		<div class="panel radius" style=" background-color:white;">	
		
        <form  class="custom" data-abide id="fr_registro_usuario" 
        method="post" action="index.php/hotel/guardar_usuario">
			
			<fieldset>
				<legend align = "left">Registrar Usuario</legend>
			<!-- Usuario -->
			<div class = "row">
				<div class = "large-6 columns">
					<label for = "usuario">Usuario <small>requerido</small></label>
					<input name = "id_usuario" id = "usuario_registro" type="text" 
					pattern = "alpha_numeric" placeholder = "nombreUsuario"required>
					<small class="error" data-error-message style = "display:none">Ingrese el usuario</small>
				</div>
				
				<!-- Errores-->
				<div class = "large-6 columns" align = "left" >
					<span class="alert label" id = "error_claves_distintas" style="display:none">
						Las contraseñas no coinciden</span>
						<br>
						<br>
					<span class="alert label" id = "error_usuario_existente" style="display:none">
						El usuario ya existe, escoja otro</span>
						<br>
						<br>
					
				</div>
			</div>
			
			<!-- Clave -->
			<div class = "row">
				<div class = "large-6 columns">
					<label for = "clave">Contraseña <small>Requerido</small></label>
					<input name = "clave" id = "clave_registro" type="password"
					pattern = "alpha_numeric" placeholder = "*****" required>
					<small class="error" style = "display:none" data-error-message>
						Ingrese la clave</small>
				</div>
				
				<div class = "large-6 columns">
					<label for = "confirmacion_clave">Confirmación de contraseña <small>Requerido</small></label>
					<input name = "confirmacion_clave" id = "confirmacion_clave" 
					type="password" pattern="alpha_numeric" placeholder = "*****" required>
					<small class="error" data-error-message style = "display:none">
						Ingrese la contraseña</small>
				</div>
			</div>
			
			<!-- Nombre y Apellido -->
			<div class = "row">
				<div class = "large-6 columns">
					<!-- Nombre-->
					<label for = "nombre">Nombre <small>Requerido</small></label>
					<input name = "nombre" id = "nombre" type="text"
					placeholder = "nombre" required>
						
					<small class="error" data-error-message style = "display:none">
					Ingrese el nombre</small>
				</div>
				
				<div class = "large-6 columns">
					<label for = "apellido">Apellido <small>Requerido</small></label>
					<input name = "apellido" id = "apellido" 
					type="text" placeholder = "apellido" required>
					<small class="error" data-error-message style = "display:none">Ingrese el apellido</small>
				</div>
			</div>
			
			<!-- Correo, sexo, cedula-->
			<div class = "row" >
					<!-- Correo-->
					<div class = "large-5 columns">
						<label for = "correo">Correo <small>Requerido</small></label>
						<input type = "text"name = "correo" id = "correo" 
						pattern="email" placeholder = "nombre@servidor.com" required>
						
						<small class="error" data-error-message style = "display:none">
							Formato de correo inválido</small>
					</div>
					
					<!-- sexo -->
					<div class = "large-3 columns">
						<label for = "sexo" style = "color:white">.</label>
						
						<div class = "row collapse">
							<div class = "large-3 columns">
								<span class = "prefix">Sexo</span>
							</div>
							
							<div class = "large-5 columns">
								<select id = "sexo" name = "sexo" class = "small" required>
									<option value = "F">F</option>
									<option value = "M">M</option>
								</select>
							</div>	
							
							<div class = "large-5 columns"></div>
						</div>
					</div>
					
					<!-- Cédula-->
					<div class = "large-4 columns">
						<label for = "cedula">Cedula <small>Requerido</small></label>
						<input name = "cedula" id = "cedula" 
						 type="number"  placeholder = "12345689" pattern = "number" required>
						<small class="error" data-content-message style = "display:none">Ingrese sólo números</small>
					</div>
					
			</div>
				
			<!-- rif, fecha de nacimiento , nacionalidad-->
			<div class = "row">
					<!-- rif -->
					<div class = "large-5 columns">
						<label for = "rif">RIF <small>Requerido</small></label>
						<input name = "rif" id = "rif" 
						type="text" placeholder = "V-1322365-9" required>
						<small class="error" style = "display:none">Ingrese el RIF</small>
					</div>
					
					<!-- Fecha nacimiento -->
					<div class = "large-3 columns">
						<label for = "fecha_nac">Fecha de Nacimiento
						 <small>Requerido</small></label>
						<input name = "fecha_nac" id = "datepicker_registro" 
						type="text" placeholder="YYYY-MM-DD" required >
						
						<small class = "error" data-error-message style="display:none">
							Seleccione una fecha
						</small>
					</div>
					
					<!-- Nacionalidad-->
					<div class = "large-4 columns">
						
						<label for = "nacionalidad" style = "color:white">.</label>
						
						<div  class = "row collapse">
							<!-- etiqueta-->
							<div class = "large-6 columns">
								<span class = "prefix">Nacionalidad</span>
							</div>
							
							<!-- Opciones-->
							<div class = "large-3 columns">
								<select id = "nacionalidad" name = "nacionalidad" 
								class = "small" required>
									<option value = "V" title = "Venezolano">V</option>
									<option value = "E" title = "Extranjero">E</option>
								</select>
							</div>
							
							<div class = "large-3 columns"></div>
							
						</div>
					</div>
			</div>
            
            <div class="row">
            <div class="large-12 columns">
                <hr>
              </div>
            </div>
            
            <!-- Número de tarjeta, tipo de cuenta-->
            <div class = "row">
				<!-- Número de tarjeta-->
				<div class = "large-4 columns">
					<label for = "num_tarjeta">Número de Tarjeta <small>Requerido</small></label>
					<input name = "num_tarjeta" id = "num_tarjeta" 
						type="number" pattern = "number_card" placeholder = "512345678912345" required>
					<small class="error" style = "display:none">Formato de tarjeta inválido</small>
				</div>
				
				<!-- Tipo de cuenta-->
				<div class = "large-4 columns">
					<label for="tipo_cuenta" style = "color:white">.</label>
					<div  class = "row collapse">
							<!-- etiqueta tipo de cuenta-->
							<div class = "large-6 columns">
								<span class = "prefix">Tipo de cuenta</span>
							</div>
							
							<!-- Opciones-->
							<div class = "large-4 columns">
								<select id = "tipo_cuenta" name = "tipo_cuenta" 
								class = "small" required>
									<option value = "ahorro" >Ahorro</option>
									<option value = "corriente">Corriente</option>
								</select>
							</div>
							
							<div class = "large-2 colums"></div>
					</div>
				</div>
				
				<div class = "large-4 columns"></div>
				
            </div>
			
        </fieldset>
        
        <!-- Boton Enviar -->
			<div class = "row" align = "left">
				<div class = "large-2 columns">
					<button type = "submit" class = "radius small">Enviar</button>
				</div>
				
				<!-- Errores -->
				<div class = "large-10 columns">
					<span class="alert label" id = "error_num_tarjeta" style="display:none">
						El número de tarjeta debe contener 16 dígitos numéricos</span>
				</div>
			</div>
        
		</form>
		</div> <!-- panel-->
		
	</div>		
</div>	
