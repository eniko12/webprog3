<?php
class UserController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('UserModel');
       
    }
    
    
    public function profil($Id = NULL){
        if($Id == NULL){
            show_error('Hiányzik az ID');
        }    
        $record = $this->UserModel->getById($Id);
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
        $record = $this->UserModel->getAll();
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
        $this->UserModel->addUser($email, $username, $passw);
       
                
        $this->load->helper('form');           
        $this->load->view('User/added');
    }
    
     public function addAdmin($email, $username, $passw){
        $this->UserModel->addAdmin($email, $username, $passw);
       
                
        $this->load->helper('form');           
        $this->load->view('User/added');
    }
    
    public function delete(String $id){
        $this->UserModel->deleteUser($id);
        
        $this->load->helper('form');           
        $this->load->view('User/deleted');
    }
    
     public function edit($question, $id = NULL){  
        if($id == NULL){
            show_error('A szerkesztéshez adjon meg egy id-t!');
        }    
        $record = $this->QuestionModel->getQuestionById($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
         $this->QuestionModel->editQuestion($id, $question);
            $view_params = [
                'q'    =>  $record
            ];

            $this->load->helper('form');
            $this->load->view('Question/QuestionView',$view_params);
        }
    
}



