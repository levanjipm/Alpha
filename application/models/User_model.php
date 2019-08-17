<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class User_model extends CI_Model {
		private $table_user = 'user';
		public $id;
		public $first_name;
		public $last_name;
		public $username;
		public $is_active;
		public $username;
		
		public function __construct()
		{
			parent::__construct();
		}
		
		public function get_stub_from_db($db_item)
		{
			$this->id				= $db_item->id;
			$this->name				= $db_item->name;
			$this->address			= $db_item->address;
			$this->city				= $db_item->city;
			$this->npwp				= $db_item->npwp;
			$this->phone			= $db_item->phone;
			$this->pic				= $db_item->pic;
			$this->created_by		= $db_item->created_by;
			$this->created_date		= $db_item->created_date;
			
			return $this;
		}
		
		public function get_db_from_stub()
		{
			$db_item = new class{};
			
			$db_item->id				= $this->id;
			$db_item->name				= $this->name;
			$db_item->address			= $this->address;
			$db_item->city				= $this->city;
			$db_item->npwp				= $this->npwp;
			$db_item->phone				= $this->phone;
			$db_item->pic				= $this->pic;
			$db_item->created_by		= $this->created_by;
			$db_item->created_date		= $this->created_date;
			
			return $db_item;
		}
		
		public function get_new_stub_from_db($db_item)
		{
			$stub = new Client_model();
			
			$stub->id					= $db_item->id;
			$stub->name					= $db_item->name;
			$stub->address				= $db_item->address;
			$stub->city					= $db_item->city;
			$stub->npwp					= $db_item->npwp;
			$stub->phone				= $db_item->phone;
			$stub->pic					= $db_item->pic;
			$stub->created_by			= $db_item->created_by;
			$stub->created_date			= $db_item->created_date;
			
			return $stub;
		}
		
		public function map_list($users)
		{
			$result = array();
			foreach ($clients as $client)
			{
				$result[] = $this->get_new_stub_from_db($client);
			}
			return $result;
		}
		
		public function show_all()
		{
			$query 	= $this->db->get($this->table_user);
			$users = $query->result();
			
			$items = $this->map_list($users);
			
			return $items;
			
		}
		}
		public function show_by_id($id)
		{
			$where['id'] = $id;
			$this->db->where($where);
			$query = $this->db->get($this->table_client, 1);
			$item = $query->row();
			
			return ($item !== null) ? $this->get_stub_from_db($item) : null;
		}
	}

?>