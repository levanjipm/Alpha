<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belcome extends CI_Controller {

	public function index()
	{
		$this->load->model('item_list_model');
		$item = $this->item_list_model->get_item(1);
		
		$data['item_dioper'] = $item;
		$this->load->view('welcome_message', $data);
		$this->load->view('welcome_kenji', $data);
	}

}
