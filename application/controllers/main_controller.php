<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class user extends CI_Controller {
	public function main_dashboard()
	{
		$this->load->model('main_model');
		$items = $this->item_model->get_all_item();
		
		$data['item_list'] = $items;
		$this->load->view('main_view', $data);
	}
}

?>