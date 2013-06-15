<?php

include('libreria_config.php');	
$bd = new BaseDatos();
$bd->connect();
	
	if(isset($_POST)){
		
		foreach ($_POST as $k=>$v) {
			
			switch ($k)
			{
				case "checked":
					foreach ($v as $val){
						$sql = 'delete from daweb_krd.dir_contacto '. 
						'where cod_contacto = \''. $val.'\';';
						$bd->query($sql);
					}
					
				break;
				
				default: ;
					
			}
			
		}
	}
?>
