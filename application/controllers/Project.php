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
			} else{
				$data['prelimiary_task_array']		= array();
				$data['preliminary_task_quantity']	= array();
				$data['preliminary_unit']			= array();
			}
			
			if(!empty($_POST['bored_pile_name'])){
				$data['bored_pile_array']			= $_POST['bored_pile_name'];
				$data['main_diameter_array']		= $_POST['main_diameter'];	
				$data['main_coordinate_x_array']	= $_POST['main_coordinate_x'];	
				$data['main_coordinate_y_array']	= $_POST['main_coordinate_y'];	
				$data['main_depth_array']			= $_POST['main_depth'];
			} else {
				$data['bored_pile_array']			= array();
				$data['main_diameter_array']		= array();
				$data['main_coordinate_x_array']	= array();
				$data['main_coordinate_y_array']	= array();
				$data['main_depth_array']			= array();
			}
			
			if(!empty($_POST['other_task'])){
				$data['other_task_array']			= $_POST['other_task'];
				$data['other_task_quantity']		= $_POST['other_task_quantity'];	
				$data['other_unit']					= $_POST['other_unit'];			
			} else {
				$data['other_task_array']			= array();
				$data['other_task_quantity']		= array();
				$data['other_unit']					= array();
			}
			
			$this->load->view('create_project_validate',$data);
		}
		
		public function input_project()
		{
			$bored_pile_array = $_POST['bored_pile_array'];
			$batch = array();
			foreach($bored_pile_array as $key=>$bored_pile_array_content){
				$insert = array(
					'bored_pile' 		=> $bored_pile_array[$key]['bored_pile'],
					'main_diameter' 	=> $bored_pile_array[$key]['main_diameter'],
					'main_coordinate_x' => $bored_pile_array[$key]['main_coordinate_x'],
					'main_coordinate_y' => $bored_pile_array[$key]['main_coordinate_y'],
					'main_depth' 		=> $bored_pile_array[$key]['main_depth']
				);
				
				array_push($batch, $insert);
				next($bored_pile_array);
			}
			$this->db->insert_batch('project_bored_pile', $batch);
		}
		
		public function create_project_input()
		{
			$this->load->model('Project_model');
			//$this->Project_model->insert_from_post();
			print_r($_POST);
			if(!empty($_POST['preliminary_task'])){
				foreach($pre_task as $key => $task){
					$key;
				// $prelimiary_task_array		= $_POST['preliminary_task']['task'];
				// $preliminary_task_quantity	= $_POST['preliminary_task']['quantity'];
				// $preliminary_unit			= $_POST['preliminary_unit'];
			// }
			
			// $this->load->model('Preliminary_project_model');
			// foreach($prelimiary_task_array as $task){
				
			// echo '<br>';
			// $data['data_general']					= $this->session->userdata('project_general');
			// print_r($data['data_general']);
				}
			}
		}
	}

?>