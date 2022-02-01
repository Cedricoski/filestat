<?php 

class Recales extends CI_Controller 
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
		
		$data['auteur2'] = $this->users_model->get_auth_recales();
		$data['tache2'] = $this->users_model->get_tache_recales();
		$data['page_title'] = 'Documents Recalés';
		$data['req'] = $this->users_model->Recales();
		$data['nb2'] = $this->users_model->nb_Recales();
		$this->load->view('common/header', $data);
		$this->load->view('recales', $data);
		$this->load->view('common/footer');
		
	}
	

	
}