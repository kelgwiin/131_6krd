<!-- 
<style type="text/css" title="currentStyle">
			@import "application/views/hotel_vw/config/DataTables-1.9.4/examples//examples_support/themes/smoothness/jquery-ui-1.8.4.custom.css";
			
			@impor "application/views/hotel_vw/config/css/tabla_round.css";
		</style>
-->


<div class="row" style="margin:auto;">
	<div class="large-12 columns" style="text-align:center;">	
		<div class="panel radius" style=" background-color:white;border-color:#DFD6D6; border-width:2px; ">	

			<h3 align = "left" >Habitaciones Disponibles</h3><hr>
			
			<form class = "custom" data-abide>
		 
				<div class="row collapse">
					<div class="small-3 large-1 columns">
						<span class="prefix">Entrada:</span>
					</div>
					<div class="small-9 large-1 columns" style="float:left">
						<input name = "fecha_ini" id="datepicker_entrada" type="text" placeholder="">
					</div>
				
					<div style="margin-left:40px;" class="small-3 large-1 columns">
						<span class="prefix">Salida:</span>
					</div>
					<div class="small-9 large-1 columns" style="float:left">
						<input name = "fecha_fin" id="datepicker_salida" type="text" placeholder="">
					</div>   
				
				
				<div class="large-2 small-2 columns" style="margin-left:40px;width:90px;">
					<span class="prefix">Categoria</span>
				</div>
				<div class="large-2 small-3 columns">
				  <select name = "categoria" id = "categoria" >
					<option value = "B">Business</option>
					<option value = "N">Normal</option>
					<option value = "A">Alta</option>
				  </select>
				</div>		
				
				<div class="large-1 columns" style="margin-left:40px;width:90px;">
					<span class="prefix">Tipo</span>
				</div>
				<div class="large-4  columns" style="float:left;width:100px;">
				  <select name = "tipo" id = "tipo" style="height:32px;">
					<option value = "1">Individual</option>
					<option value = "2">Doble</option>
				  </select>
				</div>								
						
						
				</div>		
			</form> 
			
			<!-- Boton de Buscar-->
			<div class = "row" align = "left">
			<div class = "large-12 columns">
			
			<a class = "button secondary radius small" href="#" id="boton_filtrar_disponibilidad" title = "Filtrar búsqueda" >
				<img src="application/views/hotel_vw/config/img/buscar.png"
				 width = "30px" >
				Filtrar
			</a>
			
			</div>
			</div>
			
			<hr><br>
			
			<!-- Tabla principal -->
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
						?>
					</tbody>
					
					</table>
				</div>
			</div>
			
			
			<br>
			<hr><br>
			
		<!-- Botones de acciones-->
		<a align = "left" class = "button secondary radius small" href="#" id="boton_filtrar_disponibilidad" title = "Filtrar búsqueda" >
				<img src="application/views/hotel_vw/config/img/buscar.png"
				 width = "30px" >
				Reservar...en desarrollo
		</a>	
			
		</div><!-- fin de panel radius -->
	</div>		
</div>            
            
