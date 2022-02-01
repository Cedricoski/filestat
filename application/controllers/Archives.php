<?php

class Archives extends CI_Controller
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

		$data['sous_dossier'] = $this->users_model->get_sous_dossier_archives();
		$data['nom_doc'] = $this->users_model->get_nom_doc_archives();
		$data['page_title'] = 'Documents Archivés';
		$data['req'] = $this->users_model->Archives();
		$data['nb'] = $this->users_model->nb_Archives();
		$this->load->view('common/header', $data);
		$this->load->view('archives', $data);
		$this->load->view('common/footer');

	}



}
