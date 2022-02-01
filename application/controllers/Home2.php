<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home2 extends CI_Controller {
	
	public function __construct()
		{
			parent::__construct();
			$this->load->helper('form');
			$this->load->library('form_validation');
			$this->load->model('users_model');
			$this->logged_in();
		}
	private function logged_in()
    {
        if( ! $this->session->userdata('authenticated')){
            redirect('users/login');
        }
    }
	
	public function index()
	{
		$data['page_title']='BARCODES';
		$data['datacode']=$this->users_model->get_code();
		$this->load->view('common/header', $data);
		$this->load->view('index', $data);
		$this->load->view('common/footer');
		
	}
}
