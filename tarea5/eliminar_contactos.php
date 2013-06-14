<?php
//Esto es para pruebas
	if(isset($_POST)){
		
		foreach ($_POST as $k=>$v) {
			
			switch ($k)
			{
				case "checked":
					foreach ($v as $val){
						printf("%s \n", $val);
					}
				break;
				
				default: echo 'Nada';
					
			}
			
		}
	}
?>
