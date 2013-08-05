<?php

class Droche_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    //--------------------------------------------------------------------------
    //                              Métodos Genéricos
    //--------------------------------------------------------------------------
    
    /**
     * PRE-CONDITION: Cada elemento pasado debe contener un valor, si en el
     * formulario está vacío, omitir la inclusión dentro del array ya que ello
     * afecta en la construcción de la sentencia para insertar.
     * 
     * Genera de manera genérica el insertar en una tabla. Siguiendo el esquema
     * estricto de (clave,valor).
     * 
     * @param Array $data Contendrá los datos para agregar un usuario,
     * para cada par de valores tendran la forma: (CLAVE de la tabla, VALOR). La
     * clave de la tabla es estrictamente necesaria, el orden no importa, si
     * un campo es nulo no es necesaria agregar la entrada en el array.
     * 
     * @param String $name Nombre de la tabla.
     * 
     * @return Boolean True/False según si lo agregó o no.
     */
    public function add($data,$name){
        $sql = "INSERT INTO " . $name . "( ";
        
        //otra forma de insertar
        $claves = array_keys($data);
        $vals = array_values($data);
        
        $values = "VALUES (";
        foreach ($claves as $item) {
            $sql.=  $item . ',';
            $values .= "?,";
        }
        $tama = strlen($sql);
        $sql[$tama-1] = ')';
        
        $tama_values = strlen($values);
        $values[$tama_values-1] = ')';
        
        $sql.= " " . $values . ";";
        
//        echo $sql . "<br>";
        
        return $this->db->query($sql,$vals);
    }
    
    /**
     * Genera la consulta para eliminar data de una tabla, dados su(s) 
     * clave(s) con su(s) respectivo(s) valor(es).
     * @param String $nombre_tabla
     * @param Array $claves_vals e.g. array('nom_clave1' => valor_clave1, ... ,
     * 'nom_claveN=>valor_claveN')
     * 
     * @return Boolean True/False dependiendo si tiene éxito o no.
     */
    public function del($nombre_tabla, $claves_vals){
        $sql = "DELETE FROM " . $nombre_tabla . " ".
                "WHERE ";
        $where = "";
        
        $claves =  array_keys($claves_vals);
        $vals = array_values($claves_vals);
        $num_vals = count($claves_vals);
    
        for ($i=0; $i < $num_vals; $i++){
            $where .= $claves[$i] . " = ? ";
           
            if($i !== $num_vals-1 ){
                $where .= " AND ";
            }
        }
        
        $sql .= $where . " ;";
        return $this->db->query($sql, $vals);
    }
    
    /**
     * Obtiene toda la data dado el nombre de una tabla.
     * @param String $table_name Nombre de la tabla.
     * 
     * @return Array Un array de filas del tipo (clave,valor), donde clave el nombre de
     * asociado a cada una de las columnas.
     */
    public function all($table_name){
        $sql = "SELECT * FROM ". $table_name . " ;";
        $q = $this->db->query($sql);
        return $q->result_array();
    }
    
    /**
     * Actualiza una una fila de la tabla dado el nombre, las claves y la
     * data a actualizar.
     * @param String $table_name Nombre de la tabla 
     * @param Array $claves_vals Pares de (clave,valor), donde clave es el 
     * nombre asociado a la columna de la tabla.
     * @param Array $nomcols_data Pares de (clave,valor), donde clave es el 
     * nombre de la(s) columna(s) a modificar.
     * 
     * @return Boolean True/False, Depende si se logro o no actualizar.
     */
    public function update($table_name, $claves_vals,$nomcols_data){
        $sql = "UPDATE ". $table_name . " ";
        
        //Preparando el SET
        $set = "SET ";
        foreach ($nomcols_data as $k=>$v){
            $set .= $k . " = '".$v."' ,";
        }
        //eliminando la coma sobrante del final, cambiándola por un espacio
        $long_set = strlen($set);
        $set[$long_set-1] = " ";
        
        //Preparando el WHERE
        $claves =  array_keys($claves_vals);
        $vals = array_values($claves_vals);
        $num_vals = count($claves_vals);
        
        $where = " WHERE ";
        for ($i=0; $i < $num_vals; $i++){
            $where .= $claves[$i] . " = ? ";
           
            if($i !== $num_vals-1 ){
                $where .= " AND ";
            }
        }
        //terminando de armar la sentencia
        $sql .= $set . $where. ";";
        
        //print_r($sql);
        
        return $this->db->query($sql,$vals);
    }
    
    //end-of Métodos Genéricos
    
    
    //--------------------------------------------------------------------------
    //                          Gestión de USUARIOS
    //--------------------------------------------------------------------------
    
    //Métodos...    
    /* - usuario_exist
     * 
     */
    
    /**
     * TABLA usuario:
     * --------------
     * id_usuario
     * clave
     * nombre
     * apellido
     * correo
     * sexo
     * cedula
     * fecha_nac
     * num_tarjeta
     * tipo_cuenta
     * nacionalidad
     * rif
     * id_rol 
     * 
     */
    
    /**
     * Caso #1: Verifica la existencia de un usuario. <br>
     * Caso #2: Si también se pasa el parámetro $key se valida que la clave corresponda.
     * 
     * @param String $usuario Nombre de usuario (id_usuario)
     * @param String $clave Clave asociada al usuario
     * 
     * @return Array $resp array( 'usuario' => boolean , 'clave' => boolean, 'rol' => string)
     */
    public function usuario_existe($usuario , $clave = NULL){
        $resp = Array();
        
        $sql = "SELECT clave,rol ".
        "FROM usuario ".
        "WHERE id_usuario = ? ;";
        
        $rs = $this->db->query($sql,array($usuario));
        
        if($rs->num_rows() > 0 ){ // si existe
            $resp['usuario'] = TRUE;
			$r = $rs->first_row('array');
			
			if($clave !== NULL){// se valida la clave o no 
                if($r['clave'] == sha1($clave) ){
                    $resp['clave'] = TRUE;
                }else{
                    $resp['clave'] = FALSE;
                }
            }
			$resp['rol'] = $r['rol'];
            
        }else{
            $resp['usuario'] = FALSE;
            $resp['clave'] = FALSE;
            $resp['rol'] = "";
        }
        return $resp;
    }
    //end-of Gestión de USUARIOS
    
    //--------------------------------------------------------------------------
    //                   Gestión de Reservas
    //--------------------------------------------------------------------------
    /**
     * Listar cantidad de habitaciones disponibles dado un rando de fecha.
     * @param Date $fecha_ini Fecha inicial
     * @param Date $fecha_fin Fecha final
     * 
     * @return Array Un array de dos campos:
     *  Primero: cabecera => (Categoría, Tipo, Cantidad)
     *  Segundo: array de array con la info de cada fila
     *      Normal,individual | cantidad
     *      Normal, Doble | cantida 
     *      Business, Indivual | cantidad
     *      Business, Doble | cantidad
     *      Alta, individual | cantidad
     *      Alta, doble | cantidad
     */
    public function rsv_disponibilidad($fecha_ini, $fecha_fin){
        $data = Array();
        $data['cabecera'] = Array('#','Categoría','Tipo','Cantidad');
        
        $filas = Array();
        //normal/individual
        $num_1 = $this->rsv_num_habitaciones('N', 1) -
                $this->rsv_num_habitaciones_ocupadas('N',1,
                        $fecha_ini, $fecha_fin);
        $filas[] = Array('check','Normal','Individual',$num_1);
        
       //normal/doble
        $num_2 = $this->rsv_num_habitaciones('N', 2) -
                $this->rsv_num_habitaciones_ocupadas('N',2,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check','Normal','Doble',$num_2);
       
        //Business/Individual
        $num_3 = $this->rsv_num_habitaciones('B', 1) -
                $this->rsv_num_habitaciones_ocupadas('B',1,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check','Business','Individual',$num_3);
        
        //Business/Doble
        $num_4 = $this->rsv_num_habitaciones('B', 2) -
                $this->rsv_num_habitaciones_ocupadas('B',2,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check','Business','Doble',$num_4);
        
        //Alta/Individual
        $num_5 = $this->rsv_num_habitaciones('A', 1) -
                $this->rsv_num_habitaciones_ocupadas( 'A',1,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check','Alta','Individual',$num_5);
        
        //Alta/Individual
        $num_6 = $this->rsv_num_habitaciones('A', 2) -
                $this->rsv_num_habitaciones_ocupadas( 'A',2,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check','Alta','Doble',$num_6);
        
        $data['filas'] = $filas;
        return $data;
    }
    
    /**
     * Número de habitaciones totales en el hotel estén o no ocupadas.
     * @param char $categoria 'N', 'B', 'A'
     * @param int $tipo 1: individual, 2:doble
     * @return int Número de habitaciones.
     */
    public function rsv_num_habitaciones($categoria, $tipo){
        $sql = 'SELECT count(*)
                FROM habitacion
                WHERE categoria = ? AND tipo = ? ;';
        $query = $this->db->query($sql, Array($categoria,$tipo));
        $row = $query->first_row('array');
        
        return $row['count(*)'];
    }
    
    /**
     * Número de habitaciones RESERVADAS
     * @param char $categoria 'N', 'B', 'A'
     * @param int $tipo 1: individual, 2: doble
     * @return int Número de habitaciones reservadas.
     */
    public function rsv_num_habitaciones_ocupadas($categoria, $tipo,
            $fecha_ini, $fecha_fin){
        $sql = 'SELECT count(*)
                
                FROM reserva_ocupa AS rsv JOIN  usuario AS usr 
                     ON rsv.id_usuario = usr.id_usuario
                
                WHERE ( fecha_ini BETWEEN ? AND ? ' .
                'OR fecha_fin BETWEEN ? AND ? ) ' .
                'AND rsv.categoria_habitacion = ? AND rsv.tipo_habitacion = ? AND '.
                " ( estatus_reserva = 'activa' OR estatus_reserva = 'ocupada' );";
        
        $query = $this->db->query($sql, Array($fecha_ini,$fecha_fin,
        $fecha_ini, $fecha_fin, $categoria,
            $tipo));
        $row = $query->first_row('array');
        return $row['count(*)'];
    }
    /**
     * Obtiene las reservas asociadas a un usuario. Si se omite el estatus de
     * reserva se listan todas las que tiene asociada.
     * 
     * @param String $id_usuario
     * @param String $estatus_reserva Puede ser {activa,ocupada,cerrada,cancelada}
     * @return Array Es un array de array que contiene la data de la consulta
     */
    public function rsv_por_usuario($id_usuario, $estatus_reserva = NULL){
        if($estatus_reserva !== NULL ){
            $sql = "SELECT * FROM reserva_ocupa " .
                "WHERE id_usuario = ? AND estatus_reserva = ? ;";
            $query = $this->db->query($sql, array($id_usuario,$estatus_reserva));
        }else{
            $sql = "SELECT * FROM reserva_ocupa  " .
                    "WHERE id_usuario = ? ;";
            $query = $this->db->query($sql, array($id_usuario));
        }
        
        return $query->result_array();
    }
    
    /**
     * Se cambia el estatus de una reserva de 'activa' a 'ocupada'. Y
     * se llama a un procedimiento para generar el minibar en función del tipo de
     * habitación.
     * @param int $id_reserva_ocupa id de la tabla de reserva_ocupa
     * @param char $categoria_hab Categoría de la habitación {'N','B','A'}
     * @param int $tipo_hab Tipo de habitación {1,2}.
     */
    public function rsv_ocupar($id_reserva_ocupa,$categoria_hab, $tipo_hab){
        //Generando el minibar
        $this->generar_minibar($id_reserva_ocupa, $categoria_hab);
        
        //seleccionando el id de una habitación libre
        $sql = 'SELECT id_habitacion AS id ' . 
                'FROM habitacion ' .
                'WHERE categoria = ? AND tipo = ? '.
                'LIMIT 1 ;';
        $query = $this->db->query($sql, array($categoria_hab,$tipo_hab));
        $rs = $query->first_row('array');
        $id_hab = $rs['id'];
                
        //Actualizando el estatus de la reserva_ocupa y asignando la habitación en la
        //reserva
        $clave = array('id_reserva_ocupa'=>$id_reserva_ocupa);
        $data_actualizar = array('estatus_reserva' => 'ocupada',
            'id_habitacion_usr_hab' => $id_hab);
        $this->update('reserva_ocupa', $clave, $data_actualizar);
        
        //Actualizar el estatus de la habitación
        $this->update('habitacion', array('id_habitacion' => $id_hab) , 
                array('estatus_habitacion' => 'ocupada'));
    }
    //end-of Gestión de Reservas

    /**
     * Genera el Minibar con los items predeterminados segun su categoría
     * 
     * 4 cerveza
     * 2 vinos
     * 4 aguas
     * 4 refrescos
     * 4 alcohol
     * 
     * @param int $id_reserva
     * @return boolean Si fue efectiva la generación del minibar
     */
    public function generar_minibar($id_reserva,$categoria){
        //id de CERVEZA del almacen
        $id_cerveza = $this->_get_id_ca('cerveza', $categoria);
        
        //id de VINO del almacen
        $id_vino = $this->_get_id_ca('vino', $categoria);
        
        //id de ALCOHOL del almacen
        $id_alcohol = $this->_get_id_ca('alcohol', $categoria);
        
        //id de AGUA
        $id_agua = $this->_get_id_ca('agua','N');
        
        //id de REFRESCO
        $id_refresco = $this->_get_id_ca('refresco', 'N');
        
        //insercion de 4 cervezas
        $this->_add_minibar($id_reserva, $id_cerveza, 4);
        
        //insercion de 2 vinos
        $this->_add_minibar($id_reserva, $id_vino, 2);
        
        //insercion de 4 aguas
        $this->_add_minibar($id_reserva, $id_agua, 4);
        
        //insercion de 4 refrescos
        $this->_add_minibar($id_reserva, $id_refresco, 4);
        
        //insercion de 4 alcohol
        $this->_add_minibar($id_reserva, $id_alcohol, 4);
        
        return true;
    }
    /**
     * Obtiene el id de un producto del almancen
     * @param String $nombre
     * @param char $categoria
     * @return int id asociado al producto
     */
    private function _get_id_ca($nombre, $categoria){
        $sql = "SELECT id_consumible_almacen " .
                "FROM consumible_almacen ".
                "WHERE nombre = ? AND categoria = ? ;";
        $q = $this->db->query($sql, array($nombre,$categoria));
        $row = $q->first_row('array');
        return  $row['id_consumible_almacen'];
    }
    /**
     * Agrega el item a la tabla consumible y resta de la cantidad total de la 
     * tabla de consumible almacen.
     * @param int $id_reserva
     * @param int $id_ca id de consumible almacen
     * @param int $cant cantidad de productos asociados
     */
    private function _add_minibar($id_reserva,$id_ca,$cant){
        $data = array(
            'id_reserva_ocupa' => $id_reserva,
            'ids_consumible_almacen' => $id_ca,
            'cantidad' => $cant
        );
        //Se agrega el item del minibar y automáticamente se llama internamente
        //a un TRIGGER que actualiza la cantidad de items disponibles en 
        //consumible_almacen.
        $this->add($data,'consumible');
        
    }
    //end of mini-bar
    
    //--------------------------------------------------------------------------
    //                          Gestión de Facturas
    //--------------------------------------------------------------------------
    /**
     * Genera la data de la factura.
     * @param String $id_usuario Nombre de usuario 
     * @param Array(Array(int,String)) $ids_rsv_tipo_fact Es un array que por cada
     * entrada contiene un par con la siguiente información: <br />
     *      (int)id de reserva: es el id asociado a la tabla reserva_ocupa <br/>
     * 
     *      (String) tipo facturación: Por cada reserva se deberá indicar si es de <br/>
     *      'cierre' || 'cancelacion'. Porque en función de ello varían los cálculos,<br/>
     */
    public function facturar($id_usuario,$ids_rsv_tipo_fact){
       $total_int = 0; // precio total de llamadas internacionales
       $total_nac = 0;// precio total de llamadas nacionales
        
        // Actualizar el estatus de facturas a viejas que el usuario pudiese tener
        //previamente.
        $condicion = array('id_usuario' => $id_usuario);
        $data_actualizar = array('estatus_factura' => 'vieja');
        $this->update('factura',$condicion, $data_actualizar);
        
        //crear la factura (sin items)
        $sql_crear_fact = 'INSERT INTO factura (id_usuario, fecha_emision) '.
                          'VALUES (\''.$id_usuario.'\', current_date() ) ;';
        $this->db->query($sql_crear_fact);
        
        //obteniendo el id de la última tupla de factura recien creada
        $query = $this->db->query('SELECT last_insert_id() as id;');
        $rs = $query->first_row('array');
        $id_factura = $rs['id'];
        
        //agregar items a la factura
        foreach ($ids_rsv_tipo_fact as $par){
              $id_reserva = $par[0];//id de reserva ocupa
              $tipo_facturacion = $par[1];//tipo de facturacion
              
              //---------------------------------------------------
              // Precio de Alojamiento (dias*precio_hab*precio_cat)
              // 
              // NOTA: se hacen los cálculos pero la asignación se
              // realiza después del condicional.
              //---------------------------------------------------
                
              //obteniendo la cantidad de días de una reserva,tipo, categoria,
              //número de camas infantiles.
              $sql_rsv = 'SELECT datediff(fecha_fin,fecha_ini) as dias, tipo_habitacion as tipo,  ' .
                         'categoria_habitacion as cat, num_camas_infantiles as ci, caso_especial, '.
                         'id_habitacion_usr_hab as id_hab, fecha_ini '.
                         'FROM reserva_ocupa '.
                         'WHERE id_reserva_ocupa = ? ;';
              $query_rsv= $this->db->query($sql_rsv, array($id_reserva) );
              $rs_rsv  = $query_rsv->first_row('array');
                
              //verificando caso especial
              if($rs_rsv['caso_especial'] == TRUE){
                  $tipo_hab = 1;
              }else{
                  $tipo_hab = (int) ($rs_rsv['tipo']);
              }
                
              //consultar precio de tipo de habitación
              $sql_tipo_hab = 'SELECT precio ' .
                              'FROM consumible_almacen ' .
                              'WHERE nombre = ? ;';
                
              if($tipo_hab == 1 ){
                  $query_hab_ind = $this->db->query($sql_tipo_hab,
                      array('habitacion_individual'));
                  $rs_hab_ind = $query_hab_ind->first_row('array'); 
                  $precio_hab = $rs_hab_ind['precio'];
              }else{
                  $query_hab_doble = $this->db->query($sql_tipo_hab,
                      array('habitacion_doble'));
                  $rs_hab_doble = $query_hab_doble->first_row('array');
                  $precio_hab = $rs_hab_doble['precio'];
              }
                
              //consultar precio categoría (alojamiento)
              $sql_categoria = 'SELECT precio ' .
                               'FROM consumible_almacen '.
                               "WHERE nombre = 'alojamiento' AND categoria = ? ;"; 
              $query_categoria = $this->db->query($sql_categoria, $rs_rsv['cat']);
              $rs_cat = $query_categoria->first_row('array');
              $precio_categoria = $rs_cat['precio'];
                
              //calculando el precio del alojamiento
              $precio_alojamiento = $rs_rsv['dias']*$precio_hab*$precio_categoria;    
          
          //------------------------------------------------------- 
          //Los cálculos de esta sección en adelante sólo aplican
          //cuando la facturación es por CIERRE de reserva.
          //------------------------------------------------------- 
         if($tipo_facturacion === "cierre"){
                //agregando item de alojamiento a la factura
                $data_item_fact_aloja = array(
                'id_factura' => $id_factura,
                'nombre' => 'Alojamiento',
                'precio' => $precio_alojamiento,
                'cantidad' => $rs_rsv['dias'],
                'num_habitacion' => $rs_rsv['id_hab']
                );
                $this->add($data_item_fact_aloja, 'items_factura');
             
                //----------------------------------------------
                // Cálculo para el número de CAMAS INFANTILES
                //----------------------------------------------
                 if($rs_rsv['ci'] > 0 ){
                     //obteniendo el precio de cada cama infantil
                    $sql_ci = 'SELECT precio '.
                              'FROM consumible_almacen '.
                              "WHERE nombre = 'cama_niño' ;";
                    $query_ci = $this->db->query($sql_ci);
                    $rs_ci = $query_ci->first_row('array');
                    $precio_ci = $rs_ci['precio'];
                    
                    $data_item_fact_ci = array(
                        'id_factura' => $id_factura,
                        'nombre' => 'Camas Infantiles',
                        'precio' =>  $precio_ci*$rs_rsv['ci'],
                        'cantidad' => $rs_rsv['ci'],
                        'num_habitacion' => $rs_rsv['id_hab']
                        );
                    $this->add($data_item_fact_ci, 'items_factura');
                }
                
                //-------------------------------------
                //Calculos para contabilizar el MINIBAR
                //-------------------------------------
                    //precios  y descripción de cada item del  minibar
                $sql_precio = 'SELECT precio, id_consumible_almacen, nombre, marca
                               FROM consumible_almacen as ca
                               WHERE ca.id_consumible_almacen IN 
                                   ( 
                                    SELECT ids_consumible_almacen
                                    FROM consumible
                                    WHERE id_reserva_ocupa = ?  
                                   )
                               ORDER BY id_consumible_almacen; ';
                $query_precio = $this->db->query($sql_precio, array($id_reserva));
                $rs_precio_descr = $query_precio->result_array();//tabla de precio y descripción
                
                    //cantidad de cada item del minibar
                $sql_cant = 'SELECT cantidad, ids_consumible_almacen 
                             FROM consumible
                             WHERE id_reserva_ocupa = ? 
                             ORDER BY ids_consumible_almacen; ';
                $query_cant = $this->db->query($sql_cant, array($id_reserva));
                $row_cantidad = $query_cant->first_row('array');//tabla de cantidades
                 
                    //ingresando los items del minibar a la factura
                foreach($rs_precio_descr as $row){
                    $data_item_fact = array(
                        'id_factura' => $id_factura,
                        'nombre' => ucfirst($row['nombre']) . ' - ' .$row['marca'],
                        'precio' => $row['precio']*$row_cantidad['cantidad'],
                        'cantidad' => $row_cantidad['cantidad'],
                        'num_habitacion' => $rs_rsv['id_hab']
                        );
                    //agregando campo a la base de datos
                    $this->add($data_item_fact, 'items_factura');
                    
                    //siguiente fila
                    $row_cantidad = $query_cant->next_row('array');
                }//end-of foreach de minibar
                
                //--------------------------------------------------------------
                //Cálculos para contabilizar las llamadas (si las hay)
                //--------------------------------------------------------------
                $sql_calls = 'SELECT hora_ini, hora_fin, tipo '.
                             'FROM llamadas_tlfs ' .
                             'WHERE id_reserva_ocupa = ? ;';
                $query_calls = $this->db->query($sql_calls, array($id_reserva));
                $rs_calls = $query_calls->result_array();
                
                if(count($rs_calls) > 0){
                    //Obteniendo PRECIO DE LLAMADAS
                    $sql_precio_call = 'SELECT  precio
                                 FROM consumible_almacen
                                 WHERE nombre =  ? ;';
                    
                    //llamada  internacional
                    $query_call_int  = $this->db->query($sql_precio_call,
                         array ('llamada_internacional'));
                    $rs_precio_call_int = $query_call_int->first_row('array');
                    
                    //llamada nacional
                    $query_call_nac = $this->db->query($sql_precio_call,
                         array('llamada_nacional'));
                    $rs_precio_call_nac = $query_call_nac->first_row('array');
                }
                
                $num_calls_int = 0;
                $num_calls_nac = 0;
                //recorrido por la lista de llamadas 
                foreach($rs_calls as $row){
                    $sql_time = 'SELECT timediff(?,?) as hora ;';
                    $query_time = $this->db->query($sql_time, array($row['hora_fin'],
                        $row['hora_ini']));
                    $rs_time = $query_time->first_row('array');
                    
                    $sql_min = 'SELECT minute(?) as min ;';
                    $query_min = $this->db->query($sql_min, array($rs_time['hora']));
                    $rs_min = $query_min->first_row('array');
                    
                    $sql_hora = 'SELECT hour(?) as hora;';
                    $query_hora = $this->db->query($sql_hora, array($rs_time['hora']));
                    $rs_hora = $query_hora->first_row('array');
                    
                    $mins_total = 60*$rs_hora['hora'] + $rs_min['min'];
                    
                    //cuando la llamada no dura más de un minuto
                    if($mins_total == 0){
                        $mins_total = 1;
                    }
                    
                    //acumulando el precio
                    if($row['tipo'] == 'I'){//internacional
                        $total_int += $mins_total * $rs_precio_call_int['precio'];
                        $num_calls_int++;
                    }else{//nacional
                        $total_nac += $mins_total * $rs_precio_call_nac['precio'];
                        $num_calls_nac++;
                    }
                    
                }//end-of foreach calls
                
                $data_item_fact = array(
                        'id_factura' => $id_factura,
                        'num_habitacion' => $rs_rsv['id_hab']
                        );
                
                if($num_calls_int > 0){ // agregando llamada internacional
                    $data_item_fact['nombre'] = 'llam. int.';
                    $data_item_fact['precio'] = $total_int;
                    $data_item_fact['cantidad'] = $num_calls_int;
                    //agregando la llamada como item a la factura
                    $this->add($data_item_fact, 'items_factura');
                }
                
                if($num_calls_nac > 0){ // agregando llamada nacional
                    $data_item_fact['nombre'] = 'llam. nac.';
                    $data_item_fact['precio'] = $total_nac;
                    $data_item_fact['cantidad'] = $num_calls_nac;
                    //agregando la llamada como item a la factura
                    $this->add($data_item_fact, 'items_factura');
                }
                
                //actualizando el estatus de la reserva a cerrada
                $data_act_rsv = array ('estatus_reserva' => 'cerrada');
                $clave = array('id_reserva_ocupa' => $id_reserva);
                $this->update('reserva_ocupa', $clave, $data_act_rsv);
                
                //actualizando la habitacion libre
                $data_hab = array('estatus_habitacion' => 'libre');
                $clave_hab = array('id_habitacion' => $rs_rsv['id_hab']);
                $this->update('habitacion', $clave_hab,$data_hab);
             
          }else{//corresponde CANCELACIÓN de reserva
                
                //calculando el número días previos a la reserva
                $sql_dias_previos = "SELECT datediff(?,current_date()) as dias ;";
                $query_dias_previos = $this->db->query($sql_dias_previos,
                        array($rs_rsv['fecha_ini']));
                $rs_dias_previos = $query_dias_previos->first_row('array');
                
                $pena_msj = "";
                if($rs_dias_previos['dias']  === 0){//100%
                    $precio_pena = $precio_alojamiento;
                    $pena_msj = " 100%";
                }elseif($rs_dias_previos['dias'] === 1){//30% 1 día antes
                    $precio_pena = $precio_alojamiento*(0.30);
                    $pena_msj = " 30%";
                }elseif($rs_dias_previos['dias'] >= 2 && 
                        $rs_dias_previos['dias'] <= 4){//10% 2-5 días antes
                    $precio_pena = $precio_alojamiento*(0.10);
                    $pena_msj = " 10%";
                }else{// > 5 días 0%
                    $precio_pena = 0;
                }
                
                //printf("<br>dias previos: %s <br>",$rs_dias_previos['dias']);
                
                if($precio_pena > 0){
                    //Agregando a la factura la penalización
                    $data_item_fact_aloja = array(
                    'id_factura' => $id_factura,
                    'nombre' => 'Penalización -'.$pena_msj,
                    'precio' => $precio_pena,
                    'cantidad' => $rs_dias_previos['dias'],
                    );
                    $this->add($data_item_fact_aloja, 'items_factura');
                }
                
                //actualizando el estatus de la reserva a cancelada
                $data_act_rsv = array ('estatus_reserva' => 'cancelada');
                $clave = array('id_reserva_ocupa' => $id_reserva);
                $this->update('reserva_ocupa', $clave, $data_act_rsv);
          }//end-of if tipo de facturación
          
       }//end-of: foreach reservas_ids
    }//end-of function: facturar
    
    //end-of Gestión de Facturas
}
