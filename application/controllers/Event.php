<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Event extends CI_Controller {
		public function index()
		{
			//Load Header//
			$this->load->helper('url');
			
			//Load body//
			$data['model'] = new class{};
			$this->load->view('header',$data);
			
			$this->load->model('Event_model');
			$items = $this->Event_model->show_all_event();
			
			$data['result_events'] = $items;
			$this->load->view('event', $data);
		}
		
		public function create_event()
		{
			//Load header//
			$data_header['css_list'] = array('application/css/create_event.css');
			$this->load->view('header',$data_header);
			
			if ($this->input->method() == "post") $this->create_event_do();
			
			$data['model'] = new class{};
			$this->load->view('create_event', $data);
		}
		
		public function create_event_do()
		{
			$this->load->model('Event_model');
			$item = $this->Event_model->insert_from_post();
			
			$data['text_result'] = $item;
			echo $item;
		}
	}

?>