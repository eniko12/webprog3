<?php
class Logout extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Logout_model');
        $this->load->library('form_validation');
    }
    
    
   
    public function logout(){   
            $this->checkUserAndLogout(); 
            $this->load->view('Main/LoggedOut');
    }

    public function checkUserAndLogout(){
     $this->db->select('*');
     $this->db->from('user');
     $this->db->where('loggedin', 1);
     $query=$this->db->get();
     $logged=$query->result();
     foreach ($logged as $l) :
        $this->Logout_model->logout($l->username);
     endforeach;
    }
 }

