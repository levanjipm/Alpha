<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Project_model extends CI_Model {	
		private $table_project = 'code_project';
		public $id;
		public $start_date;
		public $document_name;
		public $created_by;
		public $created_date;
		public $client_id;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_stub_from_db($db_item)
		{
			$this->id					= $db_item->id;
			$this->name					= $db_item->name;
			$this->start_date			= $db_item->start_date;
			$this->document_name		= $db_item->document_name;
			$this->created_by			= $db_item->created_by;
			$this->created_date			= $db_item->created_date;
			$this->client_id			= $db_item->client_id;
			
			return $this;
		}
		
		public function get_db_from_stub()
		{
			$db_item = new class{};
			
			$db_item->id				= $this->id;
			$db_item->start_date		= $this->start_date;
			$db_item->document_name		= $this->document_name;
			$db_item->client_id			= $this->client_id;
			$db_item->created_by		= $this->created_by;
			$db_item->created_date		= $this->created_date;
			
			return $db_item;
		}
		
		public function get_new_stub_from_db($db_item)
		{
			$stub = new Project_model();
			
			$stub->id					= $db_item->id;
			$stub->name					= $db_item->name;
			$stub->start_date			= $db_item->start_date;
			$stub->client_id			= $db_item->client_id;
			$stub->document_name		= $db_item->document_name;
			$stub->created_by			= $db_item->created_by;
			$stub->created_date			= $db_item->created_date;
			
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
		
		public function show_incomplete_project()
		{
			$this->db->select('count(*) as project_in_total');
			$query = $this->db->get();
			$result_db = ($this->db->last_query() == NULL) ? 0 : $query;
			
			return $result_db;
		}
		
		public function show_all()
		{
			$query 	= $this->db->get($this->table_project);
			$events = $query->result();
			
			$items = $this->map_list($events);
			
			return $items;
			
		}
		public function insert_from_post()
		{
			$project_general		= $this->session->userdata('project_general');
			$this->id				= "";
			$this->created_by		= $this->session->userdata('user_id');
			$this->client_id		= $project_general['client'];
			$this->document_name	= $project_general['ProjectDocument'];
			$this->start_date		= $project_general['Projectdate'];
			$this->created_date		= date('Y-m-d');
		
			$db_item 				= $this->get_db_from_stub();
			$db_result 				= $this->db->insert($this->table_project, $db_item);
			$insert_id 				= $this->db->insert_id();

			return  $insert_id;
		}
		
		public function show_by_id($id)
		{
			$where['id'] = $id;
		
			$this->db->where($where);
			$query = $this->db->get($this->table_project, 1);
			$item = $query->row();
			
			return ($item !== null) ? $this->get_stub_from_db($item) : null;
		}
		
		public function update_from_post($id)
		{
			$where['id']		 = $id;
			$this->name			= $this->input->post('weather_name');
			
			$this->db->where($where);
			$this->db->set('name', $this->name);
			$this->db->update($this->table_project);
		}
	}

?>