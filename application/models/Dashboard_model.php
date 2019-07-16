<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Dashboard_model extends CI_Controller {	
		private $table_user = 'user';
		// constructor
		public $id;
		public $first_name;
		public $last_name;
		public $username;
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_new_stub_from_db($db)
		{
			$stub = new Dashboard_model();
			
			$stub->id					= $db->id;
			$stub->first_name			= $db->first_name;
			$stub->last_name			= $db->last_name;
			$stub->username				= $db->username;
			
			return $stub;
		}
		
		public function map_list($items)
		{
			$result = array();
			foreach ($items as $item)
			{
				$result[] = $this->get_new_stub_from_db($item);
			}
			return $result;
		}
		
		public function show_all_user()
		{
			$query = $this->db->get($this->table_user);
			$users = $query->result();
			$items = $this->map_list($users);
			return $items;
			
		}
	}

?>