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
//         echo "eliminar <br>";
         
//         $var = $this->droche_model->del('habitacion', array('id_habitacion' => 2));
//         
//         if ($var){
//            echo "lo eliminoo<br>";
//         }else{
//             echo "no lo hizo<br>";
//         }
         
         //Eliminacion pero con doble codigo
//            $this->droche_model->del('table1', array('id1' => 2, 'id2' => 3));
//         echo "listo doble";
//         
//         //LISTAR
//         print_r($this->droche_model->all('habitacion') );
//         
         
         //Prueba de CONTEO
         //con el select count(*) probada cosas de CI
//         echo $this->droche_model->contar('habitacion');
         
         //UPDATE 
//         echo "actualizar <br>";
//         $this->droche_model->update('usuario',array('id_usuario'=>'kelgwiin'),
//                 array('id_usuario'=>'kelwin_gamez'));
         
//         $this->droche_model->update('table1',array('id1'=>11, 'id2' => 22),
//                 array('dato2'=>'cosa cambiada', 'dat2' => 'siiiiii'));
         
         // NUM HABITACIONES TOTALES
//         printf("Num habitaciones %d <br>",$this->droche_model->
//                 rsva_num_habitaciones('N',1) );
         
         //NUM HABITACIONES POR RANGO FECHA
         printf("Num habitaciones  por rango de fecha: %d de usuario <br>",
                 $this->droche_model->rsva_num_habitaciones_ocupadas(
                         'B',2,'2013-02-03','2013-02-14') );
         
         echo "<br> <br>cuerpo<br>";
         echo'</body> </html>';
	
    }
}
