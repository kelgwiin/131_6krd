<?php
	include('libreria_config.php');
	getHeader('Guardar - Guía Telefónica');
?>	
<div class="container_12" id="ContenedorSupremo"> 
	<div class="grid_12" id="ContenedorSuperior">      
		<div id="LogoTeam" class="grid_4 alpha" style="background-image:url(Imagenes/logo.png);width:50px;height:50px;"></div>    
		<div class="grid_8 omega" id="barraSuperior">
		<br> <h1 style="font-size:50px;text-align:center;" >  Guía Telefónica </h1></div>  
	</div> <!-- Fin ContenedorSuperior -->
	<div class="clear"></div>
	<div class = "grid_12">
		<a href = "index.php"> <img src = "Imagenes/Home.png" height = "30px"></a>
	</div> <!-- Fin Barra de navegación-->
	<div class = "clear"></div>
	
	<div class="grid_12" id="ContenedorMedio">
		<div class =  "grid_12">
		<?php
			if(isset($_POST["submit"])){ 
			
				$con = mysql_connect("localhost","daweb_krd","krd");
				if (!$con)
					  {
					  die('Could not connect: ' . mysql_error());
					  }

					mysql_select_db("daweb_krd", $con);
					$sql="INSERT INTO contacto (id,nombre, apellido, direccion, sexo, e_civil, country, telefono)
					VALUES
					(NULL,'$_POST[nombre]','$_POST[lastname]','$_POST[address]','$_POST[sex]','$_POST[e_civil]','$_POST[country]','$_POST[tlf]')";

					if (!mysql_query($sql,$con))
					  {
					  die('Error: ' . mysql_error());
					  }
					echo "se ha guardado un nuevo contacto";

					mysql_close($con);
				
				}else{printf("<h1>No se recibieron los datos</h1>");}
		?>
		</div>
	</div>
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
	</div>
</body>
</html>
