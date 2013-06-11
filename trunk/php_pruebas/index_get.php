<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Prueba de Formularios (POST)</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.20" />
</head>

<body>
	
	<h1> Mi primer formulario </h1>
	<form name = "prueba de formularios" action = "info_get.php" method = "GET"> 
	Nombre: <input type = "text" name = "nombre"> <br>
	Apellido: <input type = "text" name = "apellido"> <br>
	Edad : 
	
	<select name = "edad">
	<?php
		for ($i = 1; $i <= 150; $i++)
		{
			printf("<option>%d</option>",$i);
		}
		
	?>
	</select>
	
	<br>
	<br>
	Telefono: <input type = "text" name = "tlf"> <br>
	
	Sexo: M <input type = "radio" name = "sexo_tipo" value = "M">
	F<input type = "radio" name = "sexo_tipo" value = "F"> <br> <br>
	
	<input type = "submit" value = "Enviar">
	</form>
</body>

</html>

