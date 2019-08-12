<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Login_model extends CI_model {	
		private $table_user = 'user';
		// constructor
		public $id;
		public $username;
		public $password;
		public function __construct()
		{
			parent::__construct();
		}
		
		public function check_user_password($username_input, $password_input)
		{
			$this->db->select('id');
			$this->db->where('username', $username_input);
			$this->db->where('password', $password_input);
			
			$num_rows = $this->db->count_all_results('user');
			if($num_rows != 0){
				$query 		= $this->db->get('user');
				$data 		= $query->result_array();
				return $data[0]['id'];
			}
		}
	}

?>