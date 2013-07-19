<?php

class Droche_model extends CI_Model {
    public function __construct()
    {
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
     * @param Array $data Información a almacenar
     * @param String $name Nombre de la tabla.
     * 
     * @return Boolean True/False según si lo agregó o no.
     */
    private function _add($data,$name){
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
     * @param Array $claves_vals e.g. array('nom_clave1' => valor_clave1, ... ,'nom_claveN=>valor_claveN')
     * 
     * @return 
     */
    private function _del($nombre_tabla, $claves_vals){
        $sql = "DELETE FROM " . $nombre_tabla . " ";
                "WHERE ";
        $where = "";
        
        $claves =  array_keys($claves_vals);
        $vals = array_values($claves_vals);
        $num_vals = array_count_values($claves_vals);
    
        for ($i = 0; $i < $num_vals-1; $i++){
            $where .= $claves[$i] . " = ? AND ";
        }
        $where .= $claves[$num_vals-1]  . " = ? ;";
        
        $sql .= $where;
        return $this->db->query($sql, $vals);
    }
    
    /**
     * Obtiene toda la data dado el nombre de una tabla.
     * @param String $table_name Nombre de la tabla.
     * @return Array Un array del tipo (clave,valor), donde clave el nombre de
     * asociado a cada una de las columnas.
     */
    private function _all($table_name){
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
     * @return Boolean Depende si se logro o no actualizar.
     */
    private function _update($table_name, $claves_vals,$nomcols_data){
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
    
    /**
     * PRE-CONDITION: El usuario no debe existir en el sistema para poder
     * agregarlo
     *  <br>
     * Agrega un usuario a la base de datos
     * 
     * @param Array $data Contendrá los datos para agregar un usuario,
     * para cada par de valores tendran la forma: (CLAVE de la tabla, VALOR). La
     * clave de la tabla es estrictamente necesaria, el orden no importa, si
     * un campo es nulo no es necesaria agregar la entrada en el array.
     *
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
     * @return Boolean Según si fue o no agregado el usuario con exito.
     */
    public function usuario_add($data){
        return  $this->_add($data, "usuario");
    }
    
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
                $r = $rs->result_array();
                
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
    
    /**
     * Elimina un usuario dado su id_usuario
     * @param String $valor_id_usuario Nombre de usuario
     * @return Boolean True/False dependiendo si tiene éxito o no
     */
    public function usuario_del($valor_id_usuario){
        //como es una actualización retorna TRUE o FALSE en vez de data.
        $rs = $this->_del("usuario", Array("id_usuario"=>$valor_id_usuario));
        return $rs;
    }
    /**
     * Obtiene todos los usuario del sistema
     * @return Array Del tipo (nomcol,valcol).
     */
    public function usuario_all(){
        $q = $this->_all("usuario");
        return $q->result_array();
    }
    
    /**
     * Actualiza la tabla del usuario dado sus campos claves y la data.
     * @param Array $nomcols_data Con pares del tipo (nom_col,val_col)
     * @param Array $claves_vals Con pares del tipo (clave_col, val_col).
     */
    public function usuario_update($nomcols_data,$claves_vals){
        return $this->_update("usuario", $claves_vals, $nomcols_data);
    }
    
    //end-of Gestión de USUARIOS
}
