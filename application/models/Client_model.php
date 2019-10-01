<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	class Client_model extends CI_Model {
		private $table_client = 'mst_client';
		
		public $id;
		public $name;
		public $address;
		public $city;
		public $npwp;
		public $phone;
		public $pic;
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
		
		public function map_list($clients)
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
			$query 	= $this->db->get($this->table_client);
			$clients = $query->result();
			
			$items = $this->map_list($clients);
			
			return $items;
			
		}
		public function insert_from_post()
		{
			$this->load->model('Client_model');
			$this->db->select('*');
			$this->db->from($this->table_client);
			$this->db->where('name =', $this->input->post('client_name'));
			$this->db->where('city =', $this->input->post('client_city'));
			$this->db->where('address =', $this->input->post('client_address'));
			$item = $this->db->count_all_results();
			
			if($item == 0){
				$this->id					= '';
				$this->name					= $this->input->post('client_name');
				$this->address				= $this->input->post('client_address');
				$this->city					= $this->input->post('client_city');
				$this->pic					= $this->input->post('client_pic');
				$this->phone				= $this->input->post('client_phone');
				$this->npwp					= $this->input->post('client_npwp');
				$this->created_by			= 1;
				$this->created_date			= date('Y-m-d');
				$db_item 					= $this->get_db_from_stub($this);
				$db_result 					= $this->db->insert($this->table_client, $db_item);
				
				if($db_result){
					$text_result = 1;
				} else {
					$text_result = 2;
				}
			} else {
				$text_result = 3;
			}
			
			return $text_result;
		}
		public function show_by_id($id)
		{
			$where['id'] = $id;
			$this->db->where($where);
			$query = $this->db->get($this->table_client, 1);
			$item = $query->row();
			
			return ($item !== null) ? $this->get_stub_from_db($item) : null;
		}
		
		public function update_from_post($id)
		{
			$where['id']			= $id;
			$this->name				= $this->input->post('client_name');
			$this->address			= $this->input->post('client_address');
			$this->city				= $this->input->post('client_city');
			$this->pic				= $this->input->post('client_pic');
			$this->phone			= $this->input->post('client_phone');
			$this->npwp				= $this->input->post('client_npwp');
			
			$db_item = $this->get_db_from_stub();
			
			$this->db->where($where);
			// $this->db->set('name', $this->name);
			// $this->db->set('address', $this->address);
			// $this->db->set('city', $this->city);
			// $this->db->set('pic', $this->pic);
			// $this->db->set('phone', $this->phone);
			// $this->db->set('npwp', $this->npwp);\
			$this->db->update($this->table_client, $db_item);
		}
	}

?>