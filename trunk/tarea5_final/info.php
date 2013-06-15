<?php
	include('libreria_config.php');
	getHeader('Información - Guía Telefónica');
	
	$bd = new BaseDatos();
	$bd->connect();
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
	</div>	<!--  Cierre Barra Navegacion --> 
	<div class = "clear"></div>
	
	
	<!-- Inicio ContenedorMedio -->
	<div class="grid_12" id="ContenedorMedio">
		<div class="grid_6 alpha"> 
		
		<?php 
			$st = 
			'SELECT nombre,apellido,telefono,direccion, sexo,edo_civil, pais 
			FROM daweb_krd.dir_contacto 
			WHERE cod_contacto = \'' . $_GET['id'] . '\';' ;
	 
			$rs_ = $bd->query($st);
	 
			$rs = mysql_fetch_array($rs_);
			
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
     
	</div> <!-- Fin ContenedorFinal -->
    <div class="clear"></div>
    <br> <br>
   
	</div>  <!-- Fin ContenedorSupremo -->
</body>
</html>
