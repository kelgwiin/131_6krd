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
         
         //ELIMINACIÓN pero con DOBLE CODIGO
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
//                 rsv_num_habitaciones('B',2) );
         
         //NUM RESERVAS DE HABITACIONES POR RANGO FECHA
//         printf("Num habitaciones reservadas por rango de fecha: %d de usuario <br>",
//                 $this->droche_model->rsv_num_habitaciones_ocupadas(
//                         'B',2,'2013-02-03','2013-02-14') );
         
         //DISPOBILIDAD DE HABITACIONES
      $this->_disponibilidad();
         
         //RESERVAS POR USUARIO
//         $this->_reservas_por_usuario("baltazar666");
         
         //VERIFICAR EXISTENCIA DE USUARIO
//         $this->_usuario();
         
         //AGREGAR MINIBAR A UNA RESERVA (se debe hacer sólo una vez por cada reserva)
//         $this->droche_model->generar_minibar(1,'B');// este sería el asociado a baltazar666
//         echo "<br> generado el minibar <br>";
         
        //OCUPAR HABITACION Y AGREGANDO EL MINIBAR DE una vez
//        $this->droche_model->rsv_ocupar(1,'B',1);
//        echo '<br>ocupando<br>';
        
        //PRUEBA DE FACTURACION
//        $this->droche_model->facturar('baltazar666',array(array(1,'cierre')));
//        echo "<br>fin de cierre facturacion<br>";
        
        echo "<br> <br>cuerpo<br>";
        echo'</body> </html>';
	
    }
    /**
     * TODAS LAS FUNCIONES ABAJO DESARROLLADAS SON DE PRUEBA y ESTAS SON 
     * A MANERA DE EJEMPLO DEL USO DE LAS FUNCIONES DEL MODELO
     * 
     * LAS UNICAS FUNCIONES OFICIALES DEL SISTEMA SON LAS DE 
     * ::droche_model.php:: 
     */
    
    
    private function _disponibilidad (){
        $data = $this->droche_model->rsv_disponibilidad('2013-08-15','2013-08-30');
        echo "<br>-------------------------------------<br>";
        foreach ($data['cabecera'] as $val){
            printf("%s ",$val);
        }echo "<br><br>";
        
        foreach ($data['filas'] as $fila){
            foreach($fila as $item){
                printf("\t %s \t",$item);
            }echo "<br>";
        }
    }
    
    private function _reservas_por_usuario($user){
        $data = $this->droche_model->rsv_por_usuario($user);// sin estatus
//        $data = $this->droche_model->rsv_por_usuario($user,'activa'); //con estatus
        
        echo "<br> <br>";
        $cabecera = array_keys($data[0]);
        
        foreach($cabecera as $val) {
            printf(" %s ",$val);
        }
        echo "<br><br>";
        
        foreach ($data as $fila ){
            foreach( $fila as $item){
                printf(" %s ",$item);
            }echo "<br><br>";
        }
    }
    
    private function _usuario(){
        //para validar clave y usuario
//        $resp = $this->droche_model->usuario_existe('kelwin_gamez','123456');
        
        //solo para validar existencia de usuario
        $resp = $this->droche_model->usuario_existe('kelwin_gamez');
         
         if($resp['usuario']){
             printf("Existe usuario %s <br>",$resp['usuario']);
             
             if(isset($resp['clave']) && $resp['clave']){
                 echo "Clave correcta<br>";
             }else
                 echo "Clave incorrecta o no aplica<br>";
         }else{
             printf("NO Existe usuario %s <br>",$resp['usuario']);
         }
         
    }
}
