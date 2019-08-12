<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Welcome extends CI_Controller {
		public function index()
		{
			$this->load->view('login.php');
		}
		
		public function log_in()
		{
			$this->load->model('Login_model');
			$result = $this->Login_model->check_user_password($this->input->post('username'),$this->input->post('password'));
			if(!$result){
				header('location:' . site_url('Welcome'));
			} else {
				$session_stored = array('user_id' => $result);
				$this->session->set_userdata($session_stored);
				redirect(site_url("Dashboard"));
			}
		}
	}
?>