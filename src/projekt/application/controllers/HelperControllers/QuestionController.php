<?php
class QuestionController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('QuestionModel');
       
    }
    
    
    public function profil($Id = NULL){
        if($Id == NULL){
            show_error('Hiányzik az ID');
        }    
        $record = $this->QuestionModel->getQuestionById($Id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }       
       else{            
            $view_params = [
                'q'    =>  $record
            ];

            $this->load->helper('form');
           
            $this->load->view('Question/QuestionView',$view_params);
        }
    }    
    
    public function showAll(){         
        $record = $this->QuestionModel->getAll();
        if($record == NULL){
            show_error('Nem található egy kérdés sem!');
        }       
       else{            
            $view_params = [
                'q'    =>  $record
            ];

            $this->load->helper('form');           
            $this->load->view('Question/QuestionView',$view_params);
        }      
    }
    
    public function add(String $q){
        $this->QuestionModel->addQuestion($q);
                
        $this->load->helper('form');           
        $this->load->view('Question/AddYNView');
    }
    
    public function delete(String $id){
        $this->QuestionModel->deleteQuestion($id);
        
        $this->load->helper('form');           
        $this->load->view('Question/DeletedQuestionView');
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

