<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
		public function index()
		{			
			$data['session'] = $this->session->userdata('user_id');
			$this->load->model('Dashboard_model');
			$this->load->Dashboard_model->profile_information();
			$this->load->view('header',$data);
		}
	}

?>