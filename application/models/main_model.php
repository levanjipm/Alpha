<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	private $table_user = 'user';
	// constructor
	public $user_id;
	public $user_first_name;
	public $user_last_name;
	public function __construct()
	{
		parent::__construct();
	}
	
	class user extends CI_Controller {	
		public function get_new_stub_from_db($user_id)
		{
			$stub = new user();
			
			$stub->id					= $db_id->id;
			$stub->name					= $db_name->name;
			return $stub;
		}
		public function map_list($users)
		{
			$result = array();
			foreach ($users as $user)
			{
				$result[] = $this->get_new_stub_from_db($item);
			}
			return $result;
		}
		public function show_all_user()
		{
			$query = $this->db->get($this->table_user);
			$users = $query->result();
			
			$data['item_list'] = $items;
			$this->load->view('main_view', $data);
		}
	}

?>