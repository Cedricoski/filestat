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



	public function Numerises()
    {

        $SQL = 'SELECT * from doc_numerises';
        $periode = $this->input->post('periode');
        $hostname = $this->input->post('hostname');
        $author = $this->input->post('author');
        if (empty($periode) && empty($hostname) && empty($author)) {
          return false;
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

            if ( !empty ($hostname) ){
             $SQL .= ' AND hostname ="'.$hostname.'"';
            }


            if ( !empty ($author) ){
             $SQL .= ' AND author ="'.$author.'"';
            }

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }
    public function nb_Numerises()
    {

        $SQL = 'SELECT count(lot) as Total from doc_numerises';
        $periode = $this->input->post('periode');
        $hostname = $this->input->post('hostname');
        $author = $this->input->post('author'); // supposons que c'est null en post
        $code_client= $this->input->post('code_client');
        if (empty($periode) && empty($hostname) && empty($author)) {
            return $this->db->select('count(lot) as Total',false)
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

            if ( !empty ($hostname) ){
             $SQL .= ' AND hostname ="'.$hostname.'"';
            }
            if ( !empty ($author) ){
             $SQL .= ' AND author ="'.$author.'"';
            }
            $query = $this->db->query($SQL);
            return $query->result();
        }



    }

    public function get_nb_numerises()
    {

        $SQL = 'SELECT sum(nb_doc) as total2 from doc_numerises';
        $periode = $this->input->post('periode');
        $hostname = $this->input->post('hostname');
        if (empty($periode)) {
            return $this->db->select('sum(nb_doc) as total2',false)
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

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }


    public function nb_doc()
    {

        $SQL = 'SELECT sum(nb_doc) as Total from doc_numerises';
        $periode = $this->input->post('periode');
        $hostname = $this->input->post('hostname');
        $author = $this->input->post('author'); // supposons que c'est null en post
        $code_client= $this->input->post('code_client');
        if (empty($periode) && empty($hostname) && empty($author)) {
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

            if ( !empty ($hostname) ){
             $SQL .= ' AND hostname ="'.$hostname.'"';
            }

            if ( !empty ($author) ){
             $SQL .= ' AND author ="'.$author.'"';
            }

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }

    public function get_hostname()
	{

		return $this->db->select('*',false)
        ->from('doc_numerises')
        ->group_by('hostname')
        ->get()
        ->result();
	}

  public function get_author()
{

  return $this->db->select('*',false)
      ->from('doc_numerises')
      ->group_by('author')
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


    public function get_nom_doc_archives()
	{

		return $this->db->select('nom_document',false)
        ->from('doc_archives')
        ->group_by('nom_document')
        ->get()
        ->result();
	}
    public function get_sous_dossier_archives()
	{

		return $this->db->select('sous_dossier',false)
        ->from('doc_archives')
        ->group_by('sous_dossier')
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

    public function Archives()
    {


        $SQL = 'SELECT * from doc_archives';
        $periode = $this->input->post('periode');
        $nom_doc = $this->input->post('nom_doc');
        $sous_dossier = $this->input->post('sous_dossier'); // supposons que c'est null en post
        if (empty($periode) && empty($nom_doc) && empty($sous_dossier)) {
            return false;
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

            if ( !empty ($nom_doc) ){
             $SQL .= ' AND nom_document ="'.$nom_doc.'"';
            }


            if ( !empty ($sous_dossier) ){
             $SQL .= ' AND sous_dossier="'.$sous_dossier.'"' ;
            }

            $query = $this->db->query($SQL);
            return $query->result();
        }



    }
    public function get_nb_archives()
	{
    $SQL = 'SELECT count(sous_dossier) as total1 from doc_archives';
    $periode = $this->input->post('periode');
    if (empty($periode)) {
        return $this->db->select('count(sous_dossier) as total1',false)
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

      $query = $this->db->query($SQL);
      return $query->result();
    }


	}
    public function nb_Archives()
    {


        $SQL = 'SELECT count(sous_dossier) as Total from doc_archives';
        $periode = $this->input->post('periode');
        $nom_doc = $this->input->post('nom_doc');
        $sous_dossier = $this->input->post('sous_dossier'); // supposons que c'est null en post
        if (empty($periode) && empty($nom_doc) && empty($sous_dossier)) {
            return $this->db->select('count(sous_dossier) as Total',false)
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

          if ( !empty ($nom_doc) ){
           $SQL .= ' AND nom_document ="'.$nom_doc.'"';
          }


          if ( !empty ($sous_dossier) ){
           $SQL .= ' AND sous_dossier="'.$sous_dossier.'"' ;
          }

          $query = $this->db->query($SQL);
          return $query->result();
        }



    }


}









?>
