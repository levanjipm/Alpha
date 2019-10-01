<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Weather extends CI_Controller {
		public function index()
		{
			$data_header['js_list'] = array();
			$data_header['css_list'] = array();
			$data_header['model'] = new class{};
			
			$this->load->model('Dashboard_model');
			$user_id 							= $this->session->userdata('user_id');
			$data_header['profile_information']	= $this->Dashboard_model->profile_information($user_id);
			$this->load->view('header',$data_header);
			
			$this->load->model('Weather_model');
			$items = $this->Weather_model->show_all();
			
			$data['result_weather'] = $items;
			$this->load->view('weather', $data);
		}
		
		public function create_weather()
		{
			//Load header//
			$data_header['css_list'] = array();
			$data_header['js_list'] = array();
			
			$this->load->model('Dashboard_model');
			$user_id 							= $this->session->userdata('user_id');
			$data_header['profile_information']	= $this->Dashboard_model->profile_information($user_id);
			$this->load->view('header',$data_header);
			
			$data['model'] = new class{};
			$this->load->view('create_weather', $data);
		}
		
		public function create_weather_do()
		{
			$this->load->model('Weather_model');
			$item = $this->Weather_model->insert_from_post();
			
			$data['text_result'] = $item;
			echo $item;
		}
		
		public function edit_weather($id)
		{
			//Load header//
			$data_header['css_list'] = array();
			$data_header['js_list'] = array();
			$this->load->model('Dashboard_model');
			$user_id 							= $this->session->userdata('user_id');
			$data_header['profile_information']	= $this->Dashboard_model->profile_information($user_id);
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