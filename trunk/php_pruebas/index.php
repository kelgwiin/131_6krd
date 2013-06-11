<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Prueba de Formularios</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.20" />
</head>

<body>
	
	<h1> Mi primer formulario </h1>
	<form name = "prueba de formularios" action = "info.php" method = "POST"> 
	Nombre: <input type = "text"> <br>
	Apellido: <input type = "text"> <br>
	Edad : 
	
	<select>
	<?php
		for ($i = 1; $i <= 150; $i++)
		{
			printf("<option>%d</option>",$i);
		}
		
	?>
	</select>
	
	<br>
	
	
	<input type = "submit" value = "Enviar">
	</form>
</body>

</html>

