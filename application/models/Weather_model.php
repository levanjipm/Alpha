<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Weather_model extends CI_Controller {	
		private $table_weather = 'mst_weather';
		// constructor
		public $id;
		public $name;
		public $created_by;
		public $created_date;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_stub_from_db($db_item)
		{
			$this->id				= $db_item->id;
			$this->name				= $db_item->name;
			$this->created_by		= $db_item->created_by;
			$this->created_date		= $db_item->created_date;
			
			return $this;
		}
		
		public function get_db_from_stub()
		{
			$db_item = new class{};
			
			$db_item->id				= $this->id;
			$db_item->name				= $this->name;
			$db_item->created_by		= $this->created_by;
			$db_item->created_date		= $this->created_date;
			
			return $db_item;
		}
		
		public function get_new_stub_from_db($db_item)
		{
			$stub = new Weather_model();
			
			$stub->id				= $db_item->id;
			$stub->name				= $db_item->name;
			$stub->created_by		= $db_item->created_by;
			$stub->created_date		= $db_item->created_date;
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
		
		public function show_all()
		{
			$query 	= $this->db->get($this->table_weather);
			$events = $query->result();
			
			$items = $this->map_list($events);
			
			return $items;
			
		}
		public function insert_from_post()
		{
			$this->load->model('Weather_model');
			// $cur_event = $this->Event_model->get_by_account_id($this->session->userdata('id'));
			
			$this->id				= "";
			$this->name				= $this->input->post('weather_name');
			$this->created_by		= 1;
			$this->created_date		= date('Y-m-d');
		
			$db_item 				= $this->get_db_from_stub($this);
			$db_result 				= $this->db->insert($this->table_weather, $db_item);
			if($db_result){
				$text_result = 1;
			} else {
				$text_result = 0;
			}
			return $text_result;
		}
		public function show_by_id($id)
		{
			$where['id'] = $id;
		
			$this->db->where($where);
			$query = $this->db->get($this->table_weather, 1);
			$item = $query->row();
			
			return ($item !== null) ? $this->get_stub_from_db($item) : null;
		}
		
		public function update_from_post($id)
		{
			$where['id']		 = $id;
			$this->name			= $this->input->post('weather_name');
			
			$this->db->where($where);
			$this->db->set('name', $this->name);
			$this->db->update($this->table_weather);
		}
	}

?>