<?php

function getHeader($title){
	echo '<!DOCTYPE html>
<html> 
<head>
	<link rel="stylesheet" type="text/css" media="all" href="css/reset.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/text.css" />
	<link rel="stylesheet" type="text/css" media="all" href="css/960.css" />
	<link rel="stylesheet" type="text/css"  href="css/config_krd.css"/>
	<link rel="icon"   type="image/x-icon"  href="Imagenes/favicon.ico" />
	
	<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
	<script src="js/app.js" type="text/javascript"></script>
	
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
	
	<title>';
	
	printf("%s </title> </head> </body>",$title);
}

class BaseDatos{
	private $user = 'daweb_krd';
	private $pass = 'krd';
	private $database = 'daweb_krd';
	
	/*Constructor principal
	 */ 
	function __construct(){
	
	}
	
	public function connect(){
		
	}
	
	public function disconnect(){
	
	}
	
	/*Funcion para realizar las consultas de SQL
	 */
	public function query(){
	
	}
}

?>