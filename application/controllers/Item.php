<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Item extends CI_Controller {
	public function item_list()
	{
		$this->load->model('item_model');
		$items = $this->item_model->get_all_item();
		
		$data['item_list'] = $items;
		$this->load->view('item_list', $data);
	}
	public function get_item($id)
	{
		$this->load->model('item_model');
		$items = $this->item_model->get_item_by_id($id);
		
		$data['item_list'] = $items;
		$this->load->view('item_list', $data);
	}
}
