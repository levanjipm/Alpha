<?php

class Item_list_model extends CI_Model {
	
	// constructor
	public function __construct()
	{
		parent::__construct();
	}
	
	public function get_item($id)
	{
		$item[0]["id"] = 1;
		$item[0]["name"] = "nenen";
		$item[1]["id"] = 2;
		$item[1]["name"] = "titit";
		return $item;
	}
}

?>