<?php
	class Hotel extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			//Cargando la librería para el control de las sesiones
			$this->load->library('session');
			$this->load->model('droche_model');
		}
		
		/* @param Boolean $msj_nuevo_usuario Para mostrar o no un mensaje
		 * que indique que se creo un nuevo usuario
		 */ 
		public function index($msj_nuevo_usuario=false)
		{
			$data['title'] = "Hotel D'roche";
			$data['usuario'] = $this->_get_usuario_activo();
			$data['mostrar_mensaje'] = $msj_nuevo_usuario;
			
			$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],$data);
			$this->load->view('hotel_vw/index');
			$this->load->view('hotel_vw/footer');	
		}
		
		public function registro_usuario()
		{
			$data['title'] = "Registro usuario - Hotel D'roche";
			$data['usuario'] = $this->_get_usuario_activo();
			$data['mostrar_mensaje'] = false;
			
			$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
			 $data);
			$this->load->view('hotel_vw/registro_usuario');
			$this->load->view('hotel_vw/footer');
		}
		
		/* url: Mis reservas
		 * Muestra las reservas que tiene un usuario
		 */  
		public function ver_reservas()
		{
			$data['usuario'] = $this->_get_usuario_activo();
			
			if($data['usuario']['rol'] == 'estandar' || 
				$data['usuario']['rol'] == 'admin'){
				$data['title'] = "Ver reservas - Hotel D'roche";
				$data['mostrar_mensaje'] = false;
				
				$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
				 $data);
				$this->load->view('hotel_vw/ver_reservas');
				$this->load->view('hotel_vw/footer');
			}else{
				$this->_pag_denegado();
			}
		}			
		
		/* url: Mis facturas
		 * Muestra las reservas que tiene un usuario
		 */  
		public function ver_facturas()
		{
			$data['usuario'] = $this->_get_usuario_activo();
			
			if($data['usuario']['rol'] == 'estandar' || 
				$data['usuario']['rol'] == 'admin'){
				$data['title'] = "Ver reservas - Hotel D'roche";
				$data['mostrar_mensaje'] = false;
				
				$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
				 $data);
				 echo "facturas<br>";
				//~ $this->load->view('hotel_vw/ver_reservas');
				
				$this->load->view('hotel_vw/footer');
			}else{
				$this->_pag_denegado();
			}
		}			
		
		public function disponibilidad()
		{
			$data['usuario'] = $this->_get_usuario_activo();
			
			if($data['usuario']['rol'] == 'estandar' || 
				$data['usuario']['rol'] == 'admin'){
				$data['title'] = "Disponibilidad - Hotel D'roche";
				$data['mostrar_mensaje'] = false;
				
				$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
				 $data);
				 
				$this->load->view('hotel_vw/disponibilidad');
				
				$this->load->view('hotel_vw/footer');
			}else{
				$this->_pag_denegado();
			}
		}	
		
		/*Gestión de reservas adminstrador
		 */ 
		public function reservas_admin(){
			$data['usuario'] = $this->_get_usuario_activo();
			
			if($data['usuario']['rol'] == 'admin'){
				$data['title'] = "Gestión reservas - Hotel D'roche";
				$data['mostrar_mensaje'] = false;
				
				$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
				 $data);
				 echo "reservas admin<br>";
				//~ $this->load->view('hotel_vw/ver_reservas');
				
				$this->load->view('hotel_vw/footer');
			}else{
				$this->_pag_denegado();
			}
		}
		
		/*Listar en una tabla toda la info asociada a una tabla del hotel:
		 * -Reservas
		 * -Usuarios
		 * -Habitaciones
		 * -Facturas
		 * -Llamadas
		 */ 
		public function reportes($nombre_reporte="reservas"){
			$data['usuario'] = $this->_get_usuario_activo();
			
			if($data['usuario']['rol'] == 'admin'){
				$data['title'] = "Reporte de ".$nombre_reporte. 
				" - Hotel D'roche";
				
				$data['mostrar_mensaje'] = false;
				
				$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
				 $data);
				 echo "Reportes<br>";
				//~ $this->load->view('hotel_vw/ver_reservas');
				
				$this->load->view('hotel_vw/footer');
			}else{
				$this->_pag_denegado();
			}
		}
		public function contactar()
		{
			$data['usuario'] = $this->_get_usuario_activo();
			
			$data['title'] = "Hotel D'roche";
			$data['mostrar_mensaje'] = false;
			
			$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
				$data);
			$this->load->view('hotel_vw/contactar');
			$this->load->view('hotel_vw/footer');
		}		
		
		
		
		//--------------------------------------------------------------
		//	Sección de Funciones de Utilidades
		//--------------------------------------------------------------
		
		/*Guarda el registro del usuario que se obtiene de la llamada
		 * hecha en ajax.
		 */ 
		public function guardar_usuario(){
			$data_insert = array();
			$data_insert['rol'] = 'estandar';
			
			$p = $this->input->post();
			$p['clave'] = sha1($p['clave']);
			foreach( $p as $k=>$v){
				//para que no tome la confirmacion de la clave del formulario
				if($k != "confirmacion_clave"){
					$data_insert[$k] = $v;
				}
			}
			
			//insertando en la BD
			$r = $this->droche_model->add($data_insert,'usuario');
			
			//activando la sesion para el usuario que se acaba de registrar
			
			echo '{"estatus":"ok"}';
		}
		/*Obtiene el rol y el nombre del usuario de las cookies, cuyo
		 * dominio es: {estandar,invitado,admin}. En función de ello se
		 * mostrarán algunas vistas
		 * 
		 * @return Array(String,String) invitado|admin|estandar & nombre
		 * de usuario.
		 */ 
		private function _get_usuario_activo(){
			$userdata = $this->session->all_userdata();
			$rs = array();
			
			if(!isset($userdata['username'])){
				$userdata = array(
					'username' => 'invitado',
					'logged_in' => TRUE,
					'rol' => 'invitado'
					);
				$this->session->set_userdata($userdata);
			}
			$rs['rol'] = $userdata['rol'];
			$rs['nombre'] = $userdata['username'];
			return $rs;
		}
		
		/*Verifica la existencia de un usuario. Se llama desde ajax
		 */ 
		public function existe_usuario(){
			$usr = $this->input->post('usuario');
			$rs = $this->droche_model->usuario_existe($usr);
			printf('{"existe_usr":"%s"}',$rs['usuario']);
		}
		/* Función que permite iniciar sesión. Es llamada mediante AJAX
		 */
		public function ini_sesion(){
			$userdata = $this->session->all_userdata();
			$msj = "";
			$username = "";
			
			if( $this->input->post('usuario') && $userdata['username'] == 'invitado'){
				
					$username = $this->input->post('usuario');
					$pass = $this->input->post('clave');
					$msj = "";
			
					$rs = $this->droche_model->usuario_existe($username, $pass);
			
				if($rs['usuario'] && $rs['clave']){
					//configuraciones de las cookies
					$userdata = array(
					'username' => $username,
					'logged_in' => TRUE,
					'rol' => $rs['rol']
					);
					$this->session->set_userdata($userdata);
					$msj = "ok";
				}else{
					$msj  = "error";
				}
				//Creando respuesta en formato JSON, para que pueda ser transformado en JS
				//esto es envia vía AJAX
				printf('{"usuario":"%s","estatus":"%s","rol":"%s"}',$username,$msj,$rs['rol']);
			}else{
				//Vista de acceso denegado
				$this->_pag_denegado();
			}
			
			
		}//end-of function: iniciar sesión
		
		private function _pag_denegado(){
			$data['title'] = "Hotel D'roche";
			$this->load->view('hotel_vw/header_plano', $data);
			$this->load->view('hotel_vw/denegado');
			$this->load->view('hotel_vw/footer_plano');
		}
		
		public function cerrar_sesion(){
			$d = $this->session->all_userdata();
			
			$this->session->unset_userdata(array('username' =>$d['username'],
			'rol' => $d['rol']));
			
			//usuario por defecto
			$userdata = array(
					'username' => 'invitado',
					'logged_in' => TRUE,
					'rol' => 'invitado'
					);
			$this->session->set_userdata($userdata);
		}
										
}
