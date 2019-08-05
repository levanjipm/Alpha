<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Client extends CI_Controller {
		public function index()
		{
			//Load Header//
			$this->load->helper('url');
			
			//Load body//	
			$data_header['css_list'] = array();
			$data_header['js_list'] = array();
			$data['model'] = new class{};
			$this->load->view('header',$data_header);
			
			$this->load->model('Client_model');
			$items = $this->Client_model->show_all();
			
			$data['result_client'] = $items;
			$this->load->view('client', $data);
		}
		
		public function create_client()
		{
			//Load header//
			$data_header['css_list'] = array('application/css/create_client.css');
			$data_header['js_list'] = array();
			$this->load->view('header',$data_header);
			
			$data['model'] = new class{};
			$this->load->view('create_client', $data);
		}
		
		public function create_client_do()
		{
			$this->load->model('Client_model');
			$item = $this->Client_model->insert_from_post();
			
			$data['text_result'] = $item;
			echo $item;
		}
		
		public function edit_weather($id)
		{
			//Load header//
			$data_header['css_list'] = array();
			$this->load->view('header',$data_header);
			
			$this->load->model('Weather_model');
			$item = $this->Weather_model->show_by_id($id);
			
			$data['model'] = $item;
			$this->load->view('edit_weather', $data);
		}
		
		public function edit_weather_do($id)
		{
			$this->load->model('Weather_model');
			$item = $this->Weather_model->update_from_post($id);
			redirect('Weather');
		}
	}

?>