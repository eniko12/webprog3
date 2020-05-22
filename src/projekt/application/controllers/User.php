<?php
class User extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('User_model');
       
    }
    
    
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
           
            $this->load->view('User/listAll',$view_params);
        }
    }    
    
    public function showAll(){         
        $record = $this->User_model->getAll();
        if($record == NULL){
            show_error('Nem található egy kérdés sem!');
        }       
       else{            
            $view_params = [
                'u'    =>  $record
            ];

            $this->load->helper('form');           
            $this->load->view('User/listAll',$view_params);
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
    
     public function edit($question, $id = NULL){  
        if($id == NULL){
            show_error('A szerkesztéshez adjon meg egy id-t!');
        }    
        $record = $this->User_model->getById($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
         $this->User_model->edit($id, $question);
            $view_params = [
                'q'    =>  $record
            ];

            $this->load->helper('form');
            $this->load->view('Question/QuestionView',$view_params);
        }
    
}



