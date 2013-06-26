<?php
	class Agenda_model extends CI_Model {
		public function __construct()
		{
			$this->load->database();
		}
	
	/*Consulta todos los contactos con ciertos campos o la información
	 * restante del contacto dado el id de este.
	 */
	public function get_contactos($id_contacto = FALSE)
	{
		if ($id_contacto === FALSE)
		{
			$sql = 'SELECT cod_contacto,nombre,apellido,telefono,direccion 
					FROM dir_contacto; ';
					
			$query = $this->db->query($sql);
			return $query->result_array();
		}
		$sql ='SELECT nombre,apellido,telefono,direccion, sexo,edo_civil, pais 
				FROM dir_contacto 
				WHERE cod_contacto = \'' . $id_contacto . '\';' ;
			
			$query = $this->db->query($sql);
			return $query->result_array();
	}
	
	public function guardar(){
		//Podrían utilizarse el método post de CI, pero por flojera no lo hago
		
		$sql = "INSERT INTO dir_contacto";

		$vals = '(';
		$nom_cols = '(';
		
		foreach ($_POST as $k => $v){
		//Verificar si es vacío el campo
			if(isset($v) && strlen($v) > 0){
				$vals .= '\'' . $v. '\',';
				$nom_cols .= $k.',';
			}
	
		}
		$lon = strlen($vals);
		$vals[$lon-1] = ')';
		$vals  .= ';';

		$lon = strlen($nom_cols);
		$nom_cols[$lon-1] = ')';
		$nom_cols .= ' VALUES ';

		$sql .= $nom_cols . $vals;
		$this->db->query($sql);
	}

	public function eliminar(){
		
		if(isset($_POST)){
			
			foreach ($_POST as $k=>$v) {
				
				switch ($k)
				{
					case "checked":
						foreach ($v as $val){
							$sql = 'DELETE FROM dir_contacto '. 
							'where cod_contacto = \''. $val.'\';';
							$this->db->query($sql);
						}
						
					break;
					
					default: ;
						
				}
				
			}
		}
	}
	
	
	public function guardar_info(){
		
	
	$sql = "INSERT INTO dir_msj_contactar ";
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

	$this->db->query($sql);

	echo 'Su mensaje ha sido guardado, gracias por escribirnos,'
	 .'entendemos que su tiempo es valioso! ';	
	
	
	}

}
