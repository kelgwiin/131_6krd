<?php
class Droche_prueba_cll extends CI_Controller {
    public function __construct(){
	parent::__construct();
	$this->load->model('droche_model');
    }

    public function index(){
         echo'<html>
                <head>
                    <title> Drocheeeee</title>
               </head>
                <body>';
         echo "<h1> Hotel Droche en desarrollo </h1>";
         //Prueba de INSERTAR
//         echo "<h2>Prueba de insertar</h2>";
//         $user_data = Array();
//         $user_data['id_usuario'] = 'kelgwiin';
//         $user_data['clave'] = '123456';
//         $user_data['nombre'] = 'kelwin';
//         $user_data['apellido'] = 'gamez';
//         $user_data['correo'] = 'kelgwiin@gmail.com';
//         $user_data['sexo'] = 'm';
//         $user_data['cedula'] = '20542093';
//         $user_data['fecha_nac'] = '02/02/1992';
//         $user_data['num_tarjeta'] = '165413213204454';
//         $user_data['tipo_cuenta'] = 'ahorro';
//         $user_data['nacionalidad'] = 'venezolano';
//         $user_data['rif'] = 'V-20542093-9';         
//         
//         $this->droche_model->add($user_data,"usuario");
//         
         //ELIMINAR
         echo "eliminar <br>";
         
         $var = $this->droche_model->del('habitacion', array('id_habitacion' => 2));
         echo $var;
         
         if ($var){
            echo "lo eliminoo<br>";
         }else{
             echo "no lo hizo<br>";
         }
         
         //LISTAR
//         print_r($this->droche_model->all('habitacion') );
         
         echo "cuerpo";
         echo'</body> </html>';
	
    }
}
