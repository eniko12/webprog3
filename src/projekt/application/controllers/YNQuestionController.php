<?php
class YNQuestionController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('YNQuestionModel');
       
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
        $record = $this->YNQuestionModel->getAll();
        if($record == NULL){
            show_error('Nem található egy kérdés sem!');
        }       
       else{            
            $view_params = [
                'yn'    =>  $record
            ];

            $this->load->helper('form');           
            $this->load->view('YNQuestion/listAll',$view_params);
        }      
    }
    
    public function add($q, $ans){
        $this->YNQuestionModel->create($q, $ans);
                
        $this->load->helper('form');           
        $this->load->view('YNQuestion/created');
    }
    
    public function delete(int $id){
        $this->YNQuestionModel->deleteYN($id);
        
        $this->load->helper('form');           
        $this->load->view('YNQuestion/deleted');
    }
    
     public function edit(String $question, $ans, $id = NULL){  
        if($id == NULL){
            show_error('A szerkesztéshez adjon meg egy id-t!');
        }    
        $record = $this->YNQuestionModel->getById($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
         $this->YNQuestionModel->editYN($id, $question, $ans);
        
        }
    
}



