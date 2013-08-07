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

			<h3 align = "left" >Mis Reservas</h3>
			
			<hr>
			<div class = "row">
				<div class = "large-3 columns">
					<a align = "left" class = "button secondary radius small"
				 id="boton_cancelar_reserva" title = "Cancelar reserva" >
					Cancelar reserva
					</a>
				</div>
				
				<div class = "large-9 columns"></div>
			</div>
			
			<!---------------------->	
			<!-- Tabla principal -->
			<!--------------------->
			
					<!-- Creación de la tabla-->
					<table class="display" id ="tb_mis_reservas" cellpadding="0" 
					cellspacing="0" border="0" width = "100%">
					
					<thead>
						<tr>
							<th>#</th>
							<th>id</th>
							<th>id_hab</th>
							<th>id_usuario</th>
							<th>camas_infantiles</th>
							<th>fecha_ini</th>
							<th>fecha_fin</th>
							<th>categoria_habitacion</th>
							<th>tipo_habitacion</th>
							<th>estatus_reserva</th>
							<th>caso_especial</th>
						</tr>
					</thead>
					
					<tbody>
						<?php
						foreach($tabla as $fila){
							echo '<tr>';
							echo '<td ><input type = "checkbox"></td>';
							foreach($fila as $item ){
								if($item !== NULL){
									printf('<td>%s</td>',$item);
								}else{
									printf('<td></td>',$item);
								}
							}
							echo '</tr>';
						}
						?>
					</tbody>
					
					</table>
				
			
			
			<br>
			<hr><br>
			
		</div><!-- fin de panel radius -->
	</div>		
</div>            
           
