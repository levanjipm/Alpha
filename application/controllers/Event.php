<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Event extends CI_Controller {
		public function index()
		{
			$this->load->model('Event_model');
			$items = $this->Event_model->show_all_event();
			
			$data['result_events'] = $items;
			$this->load->view('event', $data);
		}
		
		public function create_event()
		{
			if ($this->input->method() == "post") $this->create_event_do();
			
			$data['model'] = new class{};
			$this->load->view('create_event', $data);
		}
		
		public function create_event_do()
		{
			$this->load->model('Event_model');
			$this->Event_model->insert_from_post();
			
			redirect('Event');
		}
	}

?>