
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller{
    
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('users_model');
    }
    
    private function logged_in()
    {
        if( ! $this->session->userdata('authenticated')){
            redirect('users/login');
        }
    }
    
    public function login()
    {
        $data['title'] = "Login";
        
        $this->form_validation->set_rules('pseudo', 'pseudo', 'trim|required');
        $this->form_validation->set_rules('password', 'password', 'required');
        
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');
        
        if($this->form_validation->run() == false){
            $this->load->view('common/header2', $data);
            $this->load->view('users/login', $data);
            $this->load->view('common/footer2', $data);
        } 
        else {
            $pseudo = $this->security->xss_clean($this->input->post('pseudo'));
            $password = $this->security->xss_clean($this->input->post('password'));
            
            $user = $this->users_model->login($pseudo, $password);
            
            if($user){
                $userdata = array(
                    'id' => $user->id,
                    'authenticated' => TRUE
                );
                
                $this->session->set_userdata($userdata);
                
                redirect('accueil');
            }
            else {
                $this->session->set_flashdata('message', 'Mot de passe ou pseudo incorrect');
                redirect('users/login');
            }
        }
    }
    
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('users/login');
    }
}
?>
