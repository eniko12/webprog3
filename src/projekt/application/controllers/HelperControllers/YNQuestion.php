<?php
class YNQuestion extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('YNQuestion_model');
       
    }
    
    
    public function profil($Id = NULL){
        if($Id == NULL){
            show_error('Hiányzik az ID');
        }    
        $record = $this->YNQuestion_model->getQuestionById($Id);
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
        $record = $this->YNQuestion_model->getAll();
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
        $this->YNQuestion_model->create($q, $ans);
                
        $this->load->helper('form');           
        $this->load->view('YNQuestion/created');
    }
    
    public function delete(int $id){
        $this->YNQuestion_model->deleteYN($id);
        
        $this->load->helper('form');           
        $this->load->view('YNQuestion/deleted');
    }
    
     public function edit(String $question, $ans, $id = NULL){  
        if($id == NULL){
            show_error('A szerkesztéshez adjon meg egy id-t!');
        }    
        $record = $this->YNQuestion_model->getById($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
         $this->YNQuestion_model->editYN($id, $question, $ans);
        
        }
    
}



