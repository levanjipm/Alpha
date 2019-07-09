<?php

class Item_model extends CI_Model {
	
	private $table_item = 'itemlist';
	// constructor
	public $id;
	public $reference;
	
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->reference			= $db_item->reference;
		return $this;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Item_model();
		
		$stub->id					= $db_item->id;
		$stub->reference			= $db_item->reference;
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
	public function get_all_item()
	{
		$query = $this->db->get($this->table_item);
		$items = $query->result();
		
		return $this->map_list($items);
	}
	public function get_item_by_id($id)
	{
			$this->db->where('id', $id);
			$query = $this->db->get($this->table_item);
			$item = $query->row();
			
			return $this->get_stub_from_db($item);
	}
}

?>