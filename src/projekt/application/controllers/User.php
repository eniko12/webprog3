<?php
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('User_model');
       
    }
    
    
   public function index(){
    if($this->User_model->IsLoggedIn()){
         $id = $this->User_model->getLoggedInId();
        $this->profil($id);
    }
    else{
         redirect(base_url().'Login/login');
    }    }
   
    public function profil($Id = NULL){
        if($Id == NULL){
            show_error('Hiányzik az ID');
        }    
        $record = $this->User_model->getById($Id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }       
       else{            
            $view_params = [
                'u'    =>  $record
            ];

            $this->load->helper('form');
           
            $this->load->view('User/Profil',$view_params);
        }
    } 
    
      public function profilByName($username = NULL){
        if($username == NULL){
            show_error('Hiányzik az ID');
        }    
        $record = $this->User_model->getByName($username);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }       
       else{            
            $view_params = [
                'u'    =>  $record
            ];

            $this->load->helper('form');
           
            $this->load->view('User/Profil',$view_params);
        }
    }
    
    public function showAll(){
        if($this->User_model->IsLoggedIn()){
            $user_id = $this->User_model->getLoggedInId();
            if($this->User_model->isAdmin($user_id)){
                $this->showAllUser();
            }
            else{
                show_error("Nem rendelkezel admin jogosultsággal.");
            }
        }
        else{
            redirect(base_url().'Login/login');
        }
    }
    public function showAllUser(){         
        $record = $this->User_model->getAll();
        if($record == NULL){
            show_error('Nem található egy regisztrált felhasználó sem!');
        }       
       else{            
            $view_params = [
                'u'    =>  $record
            ];

            $this->load->helper('form');           
            $this->load->view('User/Profil',$view_params);
        }      
    }
    
    public function add($email, $username, $passw){
        $this->User_model->addUser($email, $username, $passw);
       
                
        $this->load->helper('form');           
        $this->load->view('User/added');
    }
    
     public function addAdmin($email, $username, $passw){
        $this->User_model->addAdmin($email, $username, $passw);
       
                
        $this->load->helper('form');           
        $this->load->view('User/added');
    }
    
    public function delete(String $id){
        $this->User_model->deleteUser($id);
        
        $this->load->helper('form');           
        $this->load->view('User/deleted');
    }
    
     public function edit($email,$username,$passw,$admin,$loggedin, $id=NULL){  
        if($id == NULL){
            show_error('A szerkesztéshez adjon meg egy id-t!');
        }    
        $user= $this->User_model->getById($id);
        if($user == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
         $this->User_model->edit($id,$email,$username,$passw,$admin,$loggedin);
            $view_params = [
                'u'    =>  $user
            ];

            $this->load->helper('form');
            $this->load->view('User/Profil',$view_params);
        }
    
}



