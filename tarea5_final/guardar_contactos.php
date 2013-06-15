<?php
include('libreria_config.php');
	
$bd = new BaseDatos();
$bd->connect();
	

$sql = "INSERT INTO daweb_krd.dir_contacto";

$vals = '(';
$nom_cols = '(';

foreach ($_POST as $k => $v){
	//Verificar si es vacío el campo
	if(isset($v) && strlen($v) > 0){
		$vals .= '\'' . $v. '\',';
		$nom_cols .= $k.',';
	}
	
}
$lon = strlen($vals);
$vals[$lon-1] = ')';
$vals  .= ';';

$lon = strlen($nom_cols);
$nom_cols[$lon-1] = ')';
$nom_cols .= ' VALUES ';

$sql .= $nom_cols . $vals;
$bd->query($sql);

echo "El contacto ha sido agregado con exito!";

	
?>
