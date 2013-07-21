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
        $sql = "INSERT INTO " . $name;
        
        $vals = '(';
	$nom_cols = '(';
		
	foreach ($data as $k => $v){
            $vals .= '\'' . $v. '\',';
            $nom_cols .= $k.',';
	}
        
        $lon_vals = strlen($vals);
	$vals[$lon_vals-1] = ')';//sustituyendo la coma (',') por paréntesis (')')
	$vals  .= ';';
        
        $lon_cols = strlen($nom_cols);
	$nom_cols[$lon_cols-1] = ')';//sustituyendo la coma (',') por paréntesis (')')
        
        //terminando de armar la sentencia sql
        $nom_cols .= ' VALUES ';
        $sql .= $nom_cols . $vals; 
        
        return $this->db->query($sql);
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
        
        $sql = "DELETE FROM " . $nombre_tabla . " ";
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
            echo "entraaa";
        }
        
        $sql .= $where . " ;";
        print_r($sql);
        
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
        $num_vals = array_count_values($claves_vals);
                
        $where = "WHERE ";
        for ($i = 0; $i < $num_vals-1; $i++){
            $where .= $claves[$i] . " = ? AND ";
        }
        $where .= $vals[$num_vals-1]  . " = ? ;";
    
        //terminando de armar la sentencia
        $sql .= $set . $where;
        
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
     * @return Array $resp array( 'usuario' => ? , 'clave' => ?)
     */
    public function usuario_exist($usuario , $clave = NULL){
        $resp = Array();
        
        $sql = "SELECT clave ".
        "FROM usuario ".
        "WHERE id_usuario = ? ;";
        
        $rs = $this->db->query($sql,array($usuario));
        
        if($rs->num_rows() > 0 ){ // si existe
            $resp['usuario'] = TRUE;
          
            if($clave !== NULL){// se valida la clave o no 
                $r = $rs->first_row('array');
                
                if($r['clave'] == $clave){
                    $resp['clave'] = TRUE;
                }else{
                    $resp['clave'] = FALSE;
                }
            }
            
            
        }else{
            $resp['usuario'] = FALSE;
            $resp['clave'] = FALSE;
        }
        return $resp;
    }
    //end-of Gestión de USUARIOS
    
    //--------------------------------------------------------------------------
    //                   Gestión de Reservas
    //--------------------------------------------------------------------------
    /**
     * Listar cantidad de habitaciones disponibles dado un rando de fecha.
     * @param String $usuario Nombre del usuario
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
    public function rsva_disponibilidad($usuario, $fecha_ini, $fecha_fin){
        $data = Array();
        $data['cabecera'] = Array('#','Categoría','Tipo','Cantidad');
        
        $filas = Array();
        //normal/individual
        $num_1 = $this->rsva_num_habitaciones('N', 1) -
                $this->rsva_num_habitaciones_ocupadas($usuario, 'N',1,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check-off','Normal','Individual',$num_1);
        
       //normal/doble
        $num_2 = $this->rsva_num_habitaciones('N', 2) -
                $this->rsva_num_habitaciones_ocupadas($usuario, 'N',2,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check-off','Normal','Doble',$num_2);
       
        //Business/Individual
        $num_3 = $this->rsva_num_habitaciones('B', 1) -
                $this->rsva_num_habitaciones_ocupadas($usuario, 'B',1,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check-off','Business','Individual',$num_3);
        
        //Business/Doble
        $num_4 = $this->rsva_num_habitaciones('B', 2) -
                $this->rsva_num_habitaciones_ocupadas($usuario, 'B',2,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check-off','Business','Doble',$num_4);
        
        //Alta/Individual
        $num_5 = $this->rsva_num_habitaciones('A', 1) -
                $this->rsva_num_habitaciones_ocupadas($usuario, 'A',1,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check-off','Business','Doble',$num_5);
        
        //Alta/Individual
        $num_6 = $this->rsva_num_habitaciones('A', 2) -
                $this->rsva_num_habitaciones_ocupadas($usuario, 'A',2,
                         $fecha_ini, $fecha_fin);
        $filas[] = Array('check-off','Business','Doble',$num_6);
        
        $data['filas'] = $filas;
        return $data;
    }
    
    /**
     * Número de habitaciones totales en el hotel estén o no ocupadas.
     * @param char $categoria 'N', 'B', 'A'
     * @param int $tipo 1: individual, 2:doble
     * @return int Número de habitaciones.
     */
    public function rsva_num_habitaciones($categoria, $tipo){
        $sql = 'SELECT count(*)
                FROM habitaciones
                WHERE categoria = ? AND tipo = ? ;';
        $query = $this->db->query($sql, Array($categoria,$tipo));
        $row = $query->first_row('array');
        
        return $row['count(*)'];
    }
    /**
     * Número de habitaciones reservadas
     * @param String Nombre del usuario
     * @param char $categoria 'N', 'B', 'A'
     * @param int $tipo 1: individual, 2:doble
     * @return int Número de habitaciones reservadas.
     */
    public function rsva_num_habitaciones_ocupadas($id_usuario, $categoria, $tipo,
            $fecha_ini, $fecha_fin){
        $sql = 'SELECT count(*)
                FROM reserva_ocupa
                WHERE id_usuario = ? AND ? >= fecha_ini AND ? <= fecha_ini AND ' .
                '? >= fecha_fin AND ? <= fecha_fin ' .
                'AND categoria_habitacion = ? AND tipo = ? ' .
                "estatus_reserva = 'activa' OR estatus_reserva = 'ocupada' ;";
        
        $query = $this->db->query($sql, Array($id_usuario, $fecha_ini,$fecha_ini,
            $fecha_fin, $fecha_fin, $categoria, $tipo));
        $row = $query->first_row('array');
        return $row['count(*)'];
    }
    //end-of Gestión de Reservas
}
