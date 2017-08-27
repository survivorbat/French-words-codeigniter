<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		$this->load->helper('form');
		$this->load->view('default');
	}
	public function createList(){
		$this->load->library(array('form_validation'));
		$this->form_validation->set_rules('van', '', 'trim|required|is_natural_no_zero|less_than_equal_to[60]|greater_than_equal_to[1]');
		$this->form_validation->set_rules('tot', '', 'trim|required|is_natural_no_zero|less_than_equal_to[60]|greater_than_equal_to[1]');
		$this->form_validation->set_rules('type', '', 'trim|required|in_list[overhoren,lijst]');
		$this->form_validation->set_rules('amount', '', 'trim|required|is_natural_no_zero');
		if ($this->form_validation->run() == FALSE){
			echo 'Er ging iets mis bij het aanmaken van deze lijst, probeer het nog een keer!';
		} else {
			$this->load->model('CreateList');
			$data = array(
				'van' => $this->input->post('van'),
				'type' => $this->input->post('type'),
				'tot' => $this->input->post('tot'),
				'amount' => $this->input->post('amount')
			);
			echo join($this->CreateList->getList($data));
		}
	}
}
