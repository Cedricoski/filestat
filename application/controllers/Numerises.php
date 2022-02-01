<?php

class Numerises extends CI_Controller
{

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

		$data['page_title'] = 'Documents Numérisés';
		$data['hostname'] = $this->users_model->get_hostname();
		$data['author'] = $this->users_model->get_author();
		$data['tache'] = $this->users_model->get_tache_numerises();
		$data['req'] = $this->users_model->Numerises();
		$data['nb'] = $this->users_model->nb_Numerises();
		$data['nb_doc'] = $this->users_model->nb_doc();
		$this->load->view('common/header', $data);
		$this->load->view('numerises', $data);
		$this->load->view('common/footer');

	}



}
