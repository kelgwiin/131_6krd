<!DOCTYPE html>
<html> 

<head>
<link href="estilo.css" rel="stylesheet">

<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<title>Guia Telefonica</title>

</head>

<body>
<!-- Inicio ContenedorSupremo -->
<table align=center width= "100%"> <h1 align=center >GUIA TELEFONICA</h1> </table>
<table align=left width = "50%">
			<td>
			<div class="nuevo">
			<form id = "form1" action="insertar.php" method="POST">
				<div align = "center"><h3>Agregar</h3></div>
				<table align=center>
					<td>
					<label for="nombre">Nombre :</label><br>
					<input tabindex="1" name="nombre" id="nombre" type="text" class="text" /><br> <br> <br>
					<label for="edad">Edad : 
	
							<select name = "edad">
							<?php
						for ($i = 1; $i <= 150; $i++)
						{
							printf("<option>%d</option>",$i);
							}
		
						?>
					</select> <br>
					
					</td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>
						<label for="apellido">apellido :</label><br>
					<input tabindex="2" name="apellido" id="apellido" type="text" class="text" /><br>
					
					</label> 
					<label for="telefono">Telefono :</label><br>
					<input tabindex="4" name ="telefono" id = "telefono" type="text" class="text" /><br>
					
					</td>
					
				
				</table>
				<div align = "center"><input tabindex="6" name="submit" id="send" type="submit" class="submit" value="Guardar"></div>
				
				
				
			</form>
			</div>
			</td>
			
</table>
<table align=right width = "50%">
			<td>
			<div class="nuevo">
			<div align = "center"><h3>Modificar</h3></div>
			</div>
			</td>
			
</table>
<table align=center width = "100%">
			<td>
			<div class="nuevo">
			<div align = "center"><h3>Contactos</h3></div>
			</div>
			</td>
			
</table>
</body>
</html>
