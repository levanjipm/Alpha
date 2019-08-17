<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Project extends CI_Controller {
		public function index()
		{
			$data_header['css_list'] 			= array('application/css/create_event.css');
			$data_header['js_list'] 			= array();
			$this->load->model('Dashboard_model');
			$user_id 							= $this->session->userdata('user_id');
			$data_header['profile_information']	= $this->Dashboard_model->profile_information($user_id);
			$this->load->view('header',$data_header);
			$this->load->view('project');
		}
		
		public function create_project()
		{
			$data_header['css_list'] 			= array('application/css/create_event.css');
			$data_header['js_list'] 			= array();
			$this->load->model('Dashboard_model');
			$user_id 							= $this->session->userdata('user_id');
			$data_header['profile_information']	= $this->Dashboard_model->profile_information($user_id);
			$this->load->view('header',$data_header);
			
			$this->load->model('Client_model');
			$data['client_list'] = $this->Client_model->show_all();
			$this->load->view('create_project',$data);
		}
		
		public function create_detail()
		{
			$data_header['css_list'] 			= array();
			$data_header['js_list'] 			= array();
			$this->load->model('Dashboard_model');
			$user_id 							= $this->session->userdata('user_id');
			$data_header['profile_information']	= $this->Dashboard_model->profile_information($user_id);
			$this->load->view('header',$data_header);
			
			$client_id							= $_POST['client'];
			$data['data_general']				= $_POST;
			$this->session->set_userdata('project_general',$data['data_general']);
			$this->load->model('Client_model');
			$data['client_profile_information']	= $this->Client_model->show_by_id($client_id);
			
			$this->load->view('create_project_detail',$data);
		}
		
		public function validate_project()
		{
			$data_header['css_list'] 			= array();
			$data_header['js_list'] 			= array();
			$this->load->model('Dashboard_model');
			$user_id 							= $this->session->userdata('user_id');
			$data_header['profile_information']	= $this->Dashboard_model->profile_information($user_id);
			$this->load->view('header',$data_header);
			
			$data['data_general']					= $this->session->userdata('project_general');
			
			$client_id								= $data['data_general']['client'];
			$this->load->model('Client_model');
			$data['data_detail']				= $_POST;
			$data['client_profile_information']	= $this->Client_model->show_by_id($client_id);
			
			if(!empty($_POST['preliminary_task'])){
				$data['prelimiary_task_array']		= $_POST['preliminary_task'];
				$data['preliminary_task_quantity']	= $_POST['preliminary_task_quantity'];
				$data['preliminary_unit']			= $_POST['preliminary_unit'];
			}
			
			if(!empty($_POST['bored_pile_array'])){
				$data['bored_pile_array']			= $_POST['bored_pile_name'];
				$data['main_diameter']				= $_POST['main_diameter'];	
				$data['main_coordinate_x']			= $_POST['main_coordinate_x'];	
				$data['main_coordinate_y']			= $_POST['main_coordinate_y'];	
				$data['main_depth']					= $_POST['main_depth'];
			}
			
			if(!empty($_POST['other_task_array'])){
				$data['other_task_array']			= $_POST['other_task'];
				$data['other_task_quantity']		= $_POST['other_task_quantity'];	
				$data['other_unit']					= $_POST['other_unit'];			
			}
			
			$this->load->view('create_project_validate',$data);
		}
	}

?>