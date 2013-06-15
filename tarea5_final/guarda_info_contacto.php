<?php
include('libreria_config.php');
$bd = new BaseDatos();
$bd->connect();

	
$sql = 'INSERT INTO daweb_krd.dir_msj_contactar ';
$cols = '(';
$values = '(';

foreach($_POST as $k=>$v){
	if(isset($v) && strlen($v)){
		$values .= '\'' . $v . '\',';
		$cols .= $k  . ',';
	}
} 

$l = strlen($cols);
$cols[$l-1] = ')';
$cols .= ' ';

$l = strlen($values);
$values[$l-1] = ')';
$values .= ';';

$sql .= $cols . ' VALUES ' .$values; 

$bd->query($sql);

echo 'Su mensaje ha sido guardado, gracias por escribirnos,'
 .'entendemos que su tiempo es valioso! ';

?>
