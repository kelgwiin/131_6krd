<?php
	class Hotel extends CI_Controller {
		public function __construct()
		{
			parent::__construct();
			
		}

		public function index()
		{
			$data['title'] = "Hotel D'roche";
		
			$this->load->view('hotel_vw/header', $data);
			$this->load->view('hotel_vw/index');
			$this->load->view('hotel_vw/footer');
		}
		
		public function registro_usuario()
		{
			$data['title'] = "Hotel D'roche";
		
			$this->load->view('hotel_vw/header', $data);
			$this->load->view('hotel_vw/registro_usuario');
			$this->load->view('hotel_vw/footer');
		}
		
		
		public function ver_reservas()
		{
			$data['title'] = "Hotel D'roche";
		
			$this->load->view('hotel_vw/header', $data);
			$this->load->view('hotel_vw/ver_reservas');
			$this->load->view('hotel_vw/footer');
		}			
		
		public function disponibilidad()
		{
			$data['title'] = "Hotel D'roche";
		
			$this->load->view('hotel_vw/header', $data);
			$this->load->view('hotel_vw/disponibilidad');
			$this->load->view('hotel_vw/footer');
		}	
		
		public function contactar()
		{
			$data['title'] = "Hotel D'roche";
		
			$this->load->view('hotel_vw/header', $data);
			$this->load->view('hotel_vw/contactar');
			$this->load->view('hotel_vw/footer');
		}		
			
			
		
										
}
