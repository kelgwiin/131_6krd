<?php
	class Hotel extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			//Cargando la librería para el control de las sesiones
			$this->load->library('session');
			$this->load->model('droche_model');
			
		}

		public function index()
		{
			$data['title'] = "Hotel D'roche";
			$data['usuario'] = $this->_get_usuario_activo();
			
			$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],$data);
			$this->load->view('hotel_vw/index');
			$this->load->view('hotel_vw/footer');	
		}
		
		public function registro_usuario()
		{
			$data['title'] = "Hotel D'roche";
			$data['usuario'] = $this->_get_usuario_activo();
			
			$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
			 $data);
			$this->load->view('hotel_vw/registro_usuario');
			$this->load->view('hotel_vw/footer');
		}
		
		
		public function ver_reservas()
		{
			$data['usuario'] = $this->_get_usuario_activo();
			
			if($data['usuario']['rol'] == 'estandar' || 
				$data['usuario']['rol'] == 'admin'){
				$data['title'] = "Hotel D'roche";
			
				$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
				 $data);
				$this->load->view('hotel_vw/ver_reservas');
				$this->load->view('hotel_vw/footer');
			}
		}			
		
		public function disponibilidad()
		{
			$data['usuario'] = $this->_get_usuario_activo();
			
			if($data['usuario']['rol'] == 'estandar' || 
				$data['usuario']['rol'] == 'admin'){
				$data['title'] = "Hotel D'roche";
		
				$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
				 $data);
				$this->load->view('hotel_vw/disponibilidad');
				$this->load->view('hotel_vw/footer');
			}
		}	
		
		public function contactar()
		{
			$data['usuario'] = $this->_get_usuario_activo();
			
			$data['title'] = "Hotel D'roche";
			$this->load->view('hotel_vw/header_'.$data['usuario']['rol'],
				$data);
			$this->load->view('hotel_vw/contactar');
			$this->load->view('hotel_vw/footer');
		}		
		
		//--------------------------------------------------------------
		//	Sección de Funciones de Utilidades
		//--------------------------------------------------------------
		
		public function guardar_usuario(){
			$data_insert = array();
			$data_insert['rol'] = 'estandar';
			
			
			printf('{"estatus":"ok"}');
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
				$data['title'] = "Hotel D'roche";
				$this->load->view('hotel_vw/header_plano', $data);
				$this->load->view('hotel_vw/denegado');
				$this->load->view('hotel_vw/footer_plano');
			}
			
			
		}//end-of function: iniciar sesión
		
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
