

	<!-- Barra de navegación-->
	<div class = "grid_12">
		<a href = "index.php/agenda">
		<img src = "application/views/agenda_vw/config/Imagenes/Home.png" height = "30px"></a>
	</div>	<!--  Cierre Barra Navegacion --> 
	<div class = "clear"></div>
	
	
	<!-- Inicio ContenedorMedio -->
	<div class="grid_12" id="ContenedorMedio">
		<div class="grid_6 alpha"> 
		
		<?php 
			/* $rs: se llena en el controlador
			 */
			$rs = $rs[0];
			
			echo '<h2> :=:=> Nombre y Apellido </h2>';
			printf("<p class = \"info\">%s %s </p>",$rs['nombre'],$rs['apellido']);	
			
			if(isset($rs['edo_civil'])){
				echo '<h2> :=:=> Estado Civil</h2>';	
				printf("<p class = \"info\">%s</p>",$rs['edo_civil']);	
			}
			
			if(isset($rs['sexo'])){
				echo '<h2> :=:=> Sexo</h2>';
				printf("<p class = \"info\">%s</p>",$rs['sexo']);
			}
		?>

		<br><br><br> 	
		
		</div>	
		
		<div class = "grid_6 omega">
			<?php
			
			if(isset($rs['pais'])){
				echo '<h2> :=:=> País de Origen</h2>';
				printf("<p class = \"info\">%s</p>",$rs['pais']);
			}
			
			if(isset($rs['direccion'])){
				echo '<h2> :=:=> Dirección</h2>';
				printf("<p class = \"info\">%s</p>",$rs['direccion']);
			}
			
			echo '<h2> :=:> Número de teléfono</h2>';
			printf("<p class = \"info\">%s</p>",$rs['telefono']);
			
			?>
			
		</div>
		
	</div> <!-- Fin ContenedorMedio -->
    <div class="clear"></div>
    
 
