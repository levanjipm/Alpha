<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Users extends CI_Controller {
		public function index()
		{
			$this->load->library('session');
			$data_header['css_list'] 			= array();
			$data_header['js_list'] 			= array();
			$this->load->model('Dashboard_model');
			$user_id 							= $this->session->userdata('user_id');
			$data_header['profile_information']	= $this->Dashboard_model->profile_information($user_id);
			$this->load->view('header',$data_header);
			$this->load->view('user');
		}
	}
?>