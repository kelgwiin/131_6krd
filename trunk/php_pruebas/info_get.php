<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
	<title>Prueba de Formularios - Mis Datos</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	<meta name="generator" content="Geany 0.20" />
</head>

<body>
	
	<h1> Mis datos</h1>
	
	<?php
	printf("<strong>Nombre</strong> %s <br>",$_GET["nombre"]);
	printf("<strong>Apellido</strong>%s ",$_GET["apellido"]);
	
	printf("<strong> Edad</strong> %s <br>",$_GET["edad"]);
	printf("<strong> Telefono</strong> %s <br>",$_GET["tlf"]);
	printf("<strong> Sexo</strong> %s <br>",$_GET["sexo_tipo"]);
	
	
	?>
	
	<br>
	<a href = "index.php"> Atras</a>
</body>

</html>

