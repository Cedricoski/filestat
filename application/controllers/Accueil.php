<?php

class Accueil extends CI_Controller
{
	public $p;
	public function __construct()
	{
		parent::__construct();

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

		$data['nb2'] = $this->users_model->get_nb_archives();
		$data['nb3'] = $this->users_model->get_nb_numerises();
		$data['page_title'] = 'Accueil';
		$this->load->view('common/header', $data);
		$this->load->view('filter/index', $data);
		$this->load->view('common/footer', $data);

	}



}
