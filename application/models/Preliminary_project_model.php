<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Project_model extends CI_Model {
		public $id;
		public $name;
		public $quantity;
		public $unit;
		public $project_id;
		
		public function get_db_from_stub()
		{
			$db_item = new class{};
			
			$db_item->id				= $this->id;
			$db_item->name				= $this->name;
			$db_item->quantity			= $this->quantity;
			$db_item->unit				= $this->unit;
			$db_item->project_id		= $this->project_id;
			
			return $db_item;
		}
		
		public function insert_from_post()
		{
			$this->id				= "";
			$this->name				= $this->session->userdata('user_id');
			$this->quantity			= $this->input->post('client');
			$this->unit				= $this->input->post('ProjectDocument');
			$this->project_id		= $this->input->post('Projectdate');
		
			$db_item 				= $this->get_db_from_stub();
			$db_result 				= $this->db->insert($this->table_project, $db_item);
		}
	}
?>