<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard extends CI_Controller {
		public function index()
		{
			$this->load->model('Dashboard_model');
			$this->load->model('Item_model');
			$items = $this->Dashboard_model->show_all_user();
			
			$data['result_user'] = $items;
			$this->load->view('dashboard', $data);
		}
	}

?>