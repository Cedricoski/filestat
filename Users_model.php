<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Users_model extends CI_Model{

    private $table = 'code';
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form','assets');
        $this->load->library('form_validation');

    }

   public function login($pseudo, $password)
    {
        $this->db->where('pseudo', $pseudo);
        $this->db->where('password', md5($password));
        $this->db->where('active', 1);
        $query = $this->db->get('users');

        if($query->num_rows() == 1) {
            return $query->row();
        }

        return false;
    }

    public function get_code()
    {

        return $this->db->select('*',false)
        ->from($this->table)
		->order_by('id','ASC')
        ->get()
        ->result();
    }

	public function Numerises()
    {

        $SQL = 'SELECT * from doc_numerises';
        $periode = $this->input->post('periode');
        $auteur = $this->input->post('auteur');
        $tache = $this->input->post('tache'); // supposons que c'est null en post
        $code_client= $this->input->post('code_client');
        if (empty($periode) && empty($auteur) && empty($tache) && empty($code_client)) {
            return $this->db->select('*',false)
        ->from('doc_numerises')
        ->get()
        ->result();
        }
        else{
            if ( !empty ($periode) ){
                $split = explode('-', $periode);

            #check make sure have 2 elements in array
            $count = count($split);
            if($count <> 2){
              #invalid data
              return false;
            }



            $start = strtotime($split[0]);
            $end = strtotime($split[1]);
             $SQL .= ' WHERE timestamp BETWEEN "'.$start.'" AND"'.$end.'"' ;
            }

            if ( !empty ($auteur) ){
             $SQL .= ' AND author ="'.$auteur.'"';
            }


            if ( !empty ($tache) ){
             $SQL .= ' AND lot="'.$tache.'"' ;
            }

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }
    public function nb_Numerises()
    {

        $SQL = 'SELECT count(nom_fichier) as Total from doc_numerises';
        $periode = $this->input->post('periode');
        $auteur = $this->input->post('auteur');
        $tache = $this->input->post('tache'); // supposons que c'est null en post
        $code_client= $this->input->post('code_client');
        if (empty($periode) && empty($auteur) && empty($tache) && empty($code_client)) {
            return $this->db->select('count(nom_fichier) as Total',false)
        ->from('doc_numerises')
        ->get()
        ->result();
        }
        else{
            if ( !empty ($periode) ){
                $split = explode('-', $periode);

            #check make sure have 2 elements in array
            $count = count($split);
            if($count <> 2){
              #invalid data
              return false;
            }



            $start = strtotime($split[0]);
            $end = strtotime($split[1]);
             $SQL .= ' WHERE timestamp BETWEEN "'.$start.'" AND"'.$end.'"' ;
            }

            if ( !empty ($auteur) ){
             $SQL .= ' AND author ="'.$auteur.'"';
            }


            if ( !empty ($tache) ){
             $SQL .= ' AND lot="'.$tache.'"' ;
            }


            $query = $this->db->query($SQL);
            return $query->result();
        }



    }
    public function nb_pg_Numerises()
    {

        $SQL = 'SELECT sum(nb_doc) as Total from doc_numerises';
        $periode = $this->input->post('periode');
        $auteur = $this->input->post('auteur');
        $tache = $this->input->post('tache'); // supposons que c'est null en post
        $code_client= $this->input->post('code_client');
        if (empty($periode) && empty($auteur) && empty($tache) && empty($code_client)) {
            return $this->db->select('sum(nb_doc) as Total',false)
        ->from('doc_numerises')
        ->get()
        ->result();
        }
        else{
            if ( !empty ($periode) ){
                $split = explode('-', $periode);

            #check make sure have 2 elements in array
            $count = count($split);
            if($count <> 2){
              #invalid data
              return false;
            }



            $start = strtotime($split[0]);
            $end = strtotime($split[1]);
             $SQL .= ' WHERE timestamp BETWEEN "'.$start.'" AND"'.$end.'"' ;
            }

            if ( !empty ($auteur) ){
             $SQL .= ' AND author ="'.$auteur.'"';
            }


            if ( !empty ($tache) ){
             $SQL .= ' AND lot="'.$tache.'"' ;
            }

            

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }
    public function get_auth_numerises()
	{

		return $this->db->select('*',false)
        ->from('doc_numerises')
        ->group_by('author')
        ->get()
        ->result();
	}
    public function get_codcli_numerises()
	{

		return $this->db->select('code_client',false)
        ->from('doc_numerises')
        ->group_by('code_client')
        ->get()
        ->result();
	}
    public function get_tache_numerises()
	{

		return $this->db->select('lot',false)
        ->from('doc_numerises')
        ->group_by('lot')
        ->get()
        ->result();
	}

    public function get_auth_archives()
	{

		return $this->db->select('author',false)
        ->from('doc_archives')
        ->group_by('')
        ->get()
        ->result();
	}
    public function get_codcli_archives()
	{

		return $this->db->select('code_client',false)
        ->from('doc_archives')
        ->group_by('code_client')
        ->get()
        ->result();
	}
    public function get_tache_archives()
	{

		return $this->db->select('lot',false)
        ->from('doc_archives')
        ->group_by('lot')
        ->get()
        ->result();
	}
    public function get_auth_recales()
	{

		return $this->db->select('*',false)
        ->from('doc_recales')
        ->group_by('author')
        ->get()
        ->result();
	}
    public function get_tache_recales()
	{

		return $this->db->select('lot',false)
        ->from('doc_recales')
        ->group_by('lot')
        ->get()
        ->result();
	}

	public function Recales()
    {

        $SQL = 'SELECT * from doc_recales';
        $periode = $this->input->post('periode');
        $auteur = $this->input->post('auteur');
        $tache = $this->input->post('tache'); // supposons que c'est null en post
        $code_client= $this->input->post('code_client');
        if (empty($periode) && empty($auteur) && empty($tache) && empty($code_client)) {
            return $this->db->select('*',false)
        ->from('doc_recales')
        ->get()
        ->result();
        }
        else{
            if ( !empty ($periode) ){
                $split = explode('-', $periode);

            #check make sure have 2 elements in array
            $count = count($split);
            if($count <> 2){
              #invalid data
              return false;
            }



            $start = strtotime($split[0]);
            $end = strtotime($split[1]);
             $SQL .= ' WHERE timestamp BETWEEN "'.$start.'" AND"'.$end.'"' ;
            }

            if ( !empty ($auteur) ){
             $SQL .= ' AND author ="'.$auteur.'"';
            }


            if ( !empty ($tache) ){
             $SQL .= ' AND lot="'.$tache.'"' ;
            }

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }
    public function nb_Recales()
    {

        $SQL = 'SELECT count(nom_fichier) as Total from doc_recales';
        $periode = $this->input->post('periode');
        $auteur = $this->input->post('auteur');
        $tache = $this->input->post('tache'); // supposons que c'est null en post
        $code_client= $this->input->post('code_client');
        if (empty($periode) && empty($auteur) && empty($tache) && empty($code_client)) {
            return $this->db->select('count(nom_fichier) as Total',false)
        ->from('doc_recales')
        ->get()
        ->result();
        }
        else{
            if ( !empty ($periode) ){
                $split = explode('-', $periode);

            #check make sure have 2 elements in array
            $count = count($split);
            if($count <> 2){
              #invalid data
              return false;
            }



            $start = strtotime($split[0]);
            $end = strtotime($split[1]);
             $SQL .= ' WHERE timestamp BETWEEN "'.$start.'" AND"'.$end.'"' ;
            }

            if ( !empty ($auteur) ){
             $SQL .= ' AND author ="'.$auteur.'"';
            }


            if ( !empty ($tache) ){
             $SQL .= ' AND lot="'.$tache.'"' ;
            }

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }

    public function Archives()
    {


        $SQL = 'SELECT * from doc_archives';
        $periode = $this->input->post('periode');
        $auteur = $this->input->post('auteur');
        $tache = $this->input->post('tache'); // supposons que c'est null en post
        $code_client= $this->input->post('code_client');
        if (empty($periode) && empty($auteur) && empty($tache) && empty($code_client)) {
            return $this->db->select('*',false)
        ->from('doc_archives')
        ->get()
        ->result();
        }
        else{
            if ( !empty ($periode) ){
                $split = explode('-', $periode);

            #check make sure have 2 elements in array
            $count = count($split);
            if($count <> 2){
              #invalid data
              return false;
            }



            $start = strtotime($split[0]);
            $end = strtotime($split[1]);
             $SQL .= ' WHERE timestamp BETWEEN "'.$start.'" AND"'.$end.'"' ;
            }

            if ( !empty ($auteur) ){
             $SQL .= ' AND author ="'.$auteur.'"';
            }


            if ( !empty ($tache) ){
             $SQL .= ' AND lot="'.$tache.'"' ;
            }

            if ( !empty ($code_client) ){
             $SQL .= ' AND code_client ="'.$code_client.'"' ;
            }

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }
    public function nb_Archives()
    {


        $SQL = 'SELECT count(nom_fichier) as Total from doc_archives';
        $periode = $this->input->post('periode');
        $auteur = $this->input->post('auteur');
        $tache = $this->input->post('tache'); // supposons que c'est null en post
        $code_client= $this->input->post('code_client');
        if (empty($periode) && empty($auteur) && empty($tache) && empty($code_client)) {
            return $this->db->select('count(nom_fichier) as Total',false)
        ->from('doc_archives')
        ->get()
        ->result();
        }
        else{
            if ( !empty ($periode) ){
                $split = explode('-', $periode);

            #check make sure have 2 elements in array
            $count = count($split);
            if($count <> 2){
              #invalid data
              return false;
            }



            $start = strtotime($split[0]);
            $end = strtotime($split[1]);
             $SQL .= ' WHERE timestamp BETWEEN "'.$start.'" AND"'.$end.'"' ;
            }

            if ( !empty ($auteur) ){
             $SQL .= ' AND author ="'.$auteur.'"';
            }


            if ( !empty ($tache) ){
             $SQL .= ' AND lot="'.$tache.'"' ;
            }

            if ( !empty ($code_client) ){
             $SQL .= ' AND code_client ="'.$code_client.'"' ;
            }

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }

    public function nb_pg_Archives()
    {

        $SQL = 'SELECT sum(nb_doc) as Total from doc_archives';
        $periode = $this->input->post('periode');
        $auteur = $this->input->post('auteur');
        $tache = $this->input->post('tache'); // supposons que c'est null en post
        $code_client= $this->input->post('code_client');
        if (empty($periode) && empty($auteur) && empty($tache) && empty($code_client)) {
            return $this->db->select('sum(nb_doc) as Total',false)
        ->from('doc_archives')
        ->get()
        ->result();
        }
        else{
            if ( !empty ($periode) ){
                $split = explode('-', $periode);

            #check make sure have 2 elements in array
            $count = count($split);
            if($count <> 2){
              #invalid data
              return false;
            }



            $start = strtotime($split[0]);
            $end = strtotime($split[1]);
             $SQL .= ' WHERE timestamp BETWEEN "'.$start.'" AND"'.$end.'"' ;
            }

            if ( !empty ($auteur) ){
             $SQL .= ' AND author ="'.$auteur.'"';
            }


            if ( !empty ($tache) ){
             $SQL .= ' AND lot="'.$tache.'"' ;
            }

            if ( !empty ($code_client) ){
             $SQL .= ' AND code_client ="'.$code_client.'"' ;
            }

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }
}









?>
