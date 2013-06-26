<?php
	class Agenda extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			$this->load->model('agenda_model');
		}

		public function index()
		{
			$data['contactos'] = $this->agenda_model->get_contactos();
			$data['title'] = 'Guía Telefónica';
		
			$this->load->view('agenda_vw/header', $data);
			$this->load->view('agenda_vw/index', $data);
			$this->load->view('agenda_vw/footer');
		}
		
		/**
		 * @param id_c: Codigo asociado al contacto, para posteriormene
		 * hacer la consulta de toda la data asociada a este.
		 */ 
		public function info($id_c){
			$data['title'] = 'Información - Guía Telefónica';
			$data['rs'] = $this->agenda_model->get_contactos($id_c);
			
			$this->load->view('agenda_vw/header', $data);
			$this->load->view('agenda_vw/info',$data);
			$this->load->view('agenda_vw/footer');
		}
		
		public function agregar(){
			$data['title'] = 'Agregar - Guía Telefónica';
			
			$this->load->view('agenda_vw/header', $data);
			$this->load->view('agenda_vw/add', $data);
			$this->load->view('agenda_vw/footer');
		}
		
		public function guardar(){
			//Tratamiento desde ajax
			//Obtener la información del post
			
			$this->agenda_model->guardar();
			echo "El contacto ha sido agregado con exito!";
		}
		
		public function integrantes()
		{
			$data['title'] = 'Integrantes - Guía Telefónica';
			
			$this->load->view('agenda_vw/header', $data);
			$this->load->view('agenda_vw/about');
			$this->load->view('agenda_vw/footer');	
		}
		
		public function eliminar()
		{
			//Tratamiento desde ajax
			//Obtener la información del post
			
			$this->agenda_model->eliminar();
			//echo "El contacto ha sido eliminado con exito!";
		}
		
		public function contactar(){
		
			//Tratamiento desde ajax
			//Obtener la información del post
			
			$data['title'] = 'Contactar - Guía Telefónica';
			
			$this->load->view('agenda_vw/header', $data);
			$this->load->view('agenda_vw/contact');
			$this->load->view('agenda_vw/footer');				
			
			
			//$this->agenda_model->contactar();			
			//echo "El contacto ha sido agregado con exito!";			
		}
		
		public function guardar_info(){
			//Tratamiento desde ajax
			//Obtener la información del post
			
			$this->agenda_model->guardar_info();
			//echo "El contacto ha sido agregado con exito!";
		}						
		
		
		
}
