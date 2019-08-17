<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Report_model extends CI_Model {	
		private $table_event = 'event';
		// constructor
		public $id;
		public $name;
		public $description;
		public $created_by;
		public $created_date;
		public $event_date;
		public $text_result;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_db_from_stub()
		{
			$db_item = new class{};
			
			$db_item->id				= $this->id;
			$db_item->name				= $this->name;
			$db_item->description		= $this->description;
			$db_item->created_by		= $this->created_by;
			$db_item->created_date		= $this->created_date;
			$db_item->event_date		= $this->event_date;
			
			return $db_item;
		}
		
		public function get_new_stub_from_db($db_item)
		{
			$stub = new Report_model();
			
			$stub->id				= $db_item->id;
			$stub->name				= $db_item->name;
			$stub->description		= $db_item->description;
			$stub->created_by		= $db_item->created_by;
			$stub->created_date		= $db_item->created_date;
			$stub->event_date		= $db_item->event_date;
			return $stub;
		}
		
		public function map_list($events)
		{
			$result = array();
			foreach ($events as $event)
			{
				$result[] = $this->get_new_stub_from_db($event);
			}
			return $result;
		}
		
		public function show_all_event()
		{
			$query 	= $this->db->get($this->table_event);
			$events = $query->result();
			
			$items = $this->map_list($events);
			
			return $items;
			
		}
		public function insert_from_post()
		{
			$this->load->model('Report_model');
			
			$this->id				= "";
			$this->name				= $this->input->post('event_name');
			$this->event_date		= $this->input->post('event_date');
			$this->description		= $this->input->post('event_description');
			$this->created_by		= 1;
			$this->created_date		= date('Y-m-d');
		
			$db_item 				= $this->get_db_from_stub($this);
			$db_result 				= $this->db->insert($this->table_event, $db_item);
			if($db_result){
				$text_result = 1;
			} else {
				$text_result = 0;
			}
			return $text_result;
		}
	}

?>