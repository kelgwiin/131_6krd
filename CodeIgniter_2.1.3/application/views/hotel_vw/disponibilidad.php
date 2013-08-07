<!-- 
<style type="text/css" title="currentStyle">
			@import "application/views/hotel_vw/config/DataTables-1.9.4/examples//examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css";
			
			@impor "application/views/hotel_vw/config/css/tabla_round.css";
		</style>
-->

<!-- Para resaltar-->
<style type="text/css" >
	
tbody tr.even:hover, tbody tr.even td.highlighted {
	background-color: #ECFFB3;
}

tbody tr.odd:hover, tbody tr.odd td.highlighted {
	background-color: #E6FF99;
}

table.display tr.even.row_selected td {
	background-color: #B0BED9;
}

table.display tr.odd.row_selected td {
	background-color: #9FAFD1;
}


</style>

<div class="row" style="margin:auto;">
	<div class="large-12 columns" style="text-align:center;">	
		<div class="panel radius" style=" background-color:white;border-color:#DFD6D6; border-width:2px; ">	

			<h3 align = "left" >Habitaciones Disponibles</h3><hr>
			
			<div class = "panel radius" style="background:#F5FFEA">
			<br>
			
			<!-- Inicio de Formulario -->
			<form class = "custom" data-abide><!-- Sólo para visualización porque se enviar por ajax-->
				
				<!-- Entrada-->
				<div class = "large-3 columns">
					<div class = "row collapse">
						<div class = "large-6 columns">
							<span class="prefix">Entrada:</span>
						</div>
						
						<div class = "large-6 columns">
							<input  name = "fecha_ini" id="datepicker_disp_ini" type="text"
								<?php 
									if($hay_datos){
										printf('value = "%s"',$fecha_ini);
									}else{
										echo 'placeholder="YYYY-MM-DD"';
									}
								?>
							 ><!-- fin de input-->
						</div>
					</div>
				</div>
				
				<!--Salida -->
				<div class = "large-3 columns">
					<div class = "row collapse">
						<div class = "large-6 columns">
							<span class="prefix">Salida:</span>
						</div>
						<div class = "large-6 columns">
							<input  name = "fecha_fin" 
							id="datepicker_disp_sal" type="text" 
								<?php 
									if($hay_datos){
										printf('value = "%s"',$fecha_fin);
									}else{
										echo 'placeholder ="YYYY-MM-DD"';
									}
								?>
							><!-- fin de input-->
						</div>
					</div>
				</div>
				
				<!-- Categoría-->
				<div class = "large-3 columns">
					<div class = "row collapse">
						<div class = "large-5 columns">
							<span class="prefix">Categoría:</span>
						</div>
						<div class = "large-7 columns">
							<select  name = "categoria" id = "categoria" >
								<option value = "B" id = "Business">Business</option>
								<option value = "N" id = "Normal">Normal</option>
								<option value = "A" id = "Alta">Alta</option>
							</select>
						</div>
					</div>
				</div>
				
				<!-- Tipo-->
				<div class = "large-3 columns">
					<div class = "row collapse">
						<div class = "large-4 columns">
							<span class="prefix">Tipo:</span>
						</div>
						<div class = "large-8 columns">
							<select name = "tipo" id = "tipo" style="height:32px;">
								<option value = "1" id = "Individual">Individual</option>
								<option value = "2" id = "Doble">Doble</option>
							</select>
						</div>
					</div>
				</div>
				
				<!-- Checkbox TODOS-->
				<div class = "row">
					<div class = "large-2 columns">
						<label for="todos_disp">
							<input checked = "on" type="checkbox" id="todos_disp" >
							<span class="custom checkbox"></span> Todos
						</label>
					</div>
				</div>
			</form> <!-- Cierre de form-->
			
			<!-- Errores no ingresó las fechas-->
			<div class = "row">
				<div class = "large-2 columns">
					<span class="alert label" id = "error_ingresa_fechas" style="display:none">
					Debes ingresar las fechas para poder hacer las búsquedas
					</span>
				</div>
			</div>
			
			
			</div> <!-- Cierre panel superior-->
			
			<hr><br>
			
			
			<!-- BOTONES de Filtrar, Buscar-->
			<h6 align = "left">Acciones:</h6>
			<div class = "row" >
				
				<!-- Boton Filtrar-->
				<div class = "large-2 columns">
				<a class = "button secondary radius small"
				 id="boton_filtrar_disponibilidad" title = "Filtrar búsqueda" >
					<img src="application/views/hotel_vw/config/img/filter.png"
					width = "30px" >
					Buscar
				</a>
				</div>
				
				<!-- Boton Hacer Reservas-->
				<div class = "large-2 columns">
					<a align = "left" class = "button secondary radius small"
					id="boton_hacer_reservar" title = "Hacer reserva" 
						<?php
							//se esconde para el usuario invitado
							if($usuario['rol'] == 'invitado'){
								echo 'style="display:none"';
							}
						?>
					>
					<img src="application/views/hotel_vw/config/img/usb.png"
					width = "30px" >
					 Reservar
					</a>	
				</div>
				
				<div ></div>
				
			</div>
			
			<!---------------------->	
			<!-- Tabla principal -->
			<!--------------------->
			<div class = "row">
				<div class = "large-12 columns">
					<!-- Creación de la tabla-->
					<table class="display" id ="tb_disponibilidad" cellpadding="0" 
					cellspacing="0" border="0" >
					
					<thead>
						<tr>
							<?php
								foreach($tabla['cabecera'] as $item){
									printf('<th>%s</th>',$item);
								}
							?>
						</tr>
					</thead>
					
					<tbody>
						<?php
						if($hay_datos){
							foreach($tabla['filas'] as $fila){
								echo '<tr>';
								foreach($fila as $item ){
									if($item !== 'check'){
										printf('<td>%s</td>',$item);
									}else{
										echo '<td ><input type = "checkbox"></td>';
									}
								}
								echo '</tr>';
							}
						}
						?>
					</tbody>
					
					</table>
				</div>
			</div>
			
			
			<br>
			<hr><br>
			
		</div><!-- fin de panel radius -->
	</div>		
</div>            
           
