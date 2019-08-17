<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Report extends CI_Controller {
		public function index()
		{
			$data_header['css_list'] 			= array('application/css/create_event.css');
			$data_header['js_list'] 			= array();
			$this->load->model('Dashboard_model');
			$user_id 							= $this->session->userdata('user_id');
			$data_header['profile_information']	= $this->Dashboard_model->profile_information($user_id);
			$this->load->view('header',$data_header);
			
			$this->load->model('Report_model');
			$items = $this->Report_model->show_all_event();
			
			$data['result_events'] = $items;
			$this->load->view('event', $data);
		}
		
		public function create_report()
		{
			$data_header['css_list'] 			= array();
			$data_header['js_list'] 			= array('application/js/preview.js');
			$this->load->model('Dashboard_model');
			$user_id 							= $this->session->userdata('user_id');
			$data_header['profile_information']	= $this->Dashboard_model->profile_information($user_id);
			$this->load->view('header',$data_header);
			
			$data['model'] = new class{};
			$this->load->view('create_report', $data);
		}
		
		public function Input_report()
		{
			print_r($_POST);
		}
	}

?>