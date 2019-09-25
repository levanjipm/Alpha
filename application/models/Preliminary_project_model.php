<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Preliminary_project_model extends CI_Model {
		private $table_project = 'preliminary_task';
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
		
		public function insert($preliminary_project){
			foreach($preliminary_project->task_array as $task){
				$key				= key($preliminary_project->task_array);
				
				$this->id			= "";
				$this->name			= $task;
				$this->quantity		= $preliminary_project->quantity_array[$key];
				$this->unit			= $preliminary_project->unit_array[$key];
				$this->project_id	= $preliminary_project->project_id;
				
				$db_item 				= $this->get_db_from_stub();
				$db_result 				= $this->db->insert($this->table_project, $db_item);
				
				next($preliminary_project->task_array);
			}
			//insert_batch
		}
	}
?>