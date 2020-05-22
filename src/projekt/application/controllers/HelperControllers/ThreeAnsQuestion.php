<?php
class ThreeAnsQuestion extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('ThreeAnsQuestion_model');
       
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
        $record = $this->ThreeAnsQuestion_model->getAll();
        if($record == NULL){
            show_error('Nem található egy kérdés sem!');
        }       
       else{            
            $view_params = [
                'threeans'    =>  $record
            ];

            $this->load->helper('form');           
            $this->load->view('ThreeAnsQ/listAll',$view_params);
        }      
    }
    
    public function add($question, $a, $b ,$c, $correct){
        $this->ThreeAnsQuestion_model->create($question, $a, $b ,$c, $correct);
                
        $this->load->helper('form');           
        $this->load->view('YNQuestion/created');
    }
    
    public function delete(int $id){
        $this->ThreeAnsQuestion_model->delete($id);
        
        $this->load->helper('form');           
        $this->load->view('YNQuestion/deleted');
    }
    
     public function edit($question, $a, $b ,$c, $correct, $id = NULL){  
        if($id == NULL){
            show_error('A szerkesztéshez adjon meg egy id-t!');
        }    
        $record = $this->ThreeAnsQuestion_model->getById($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
         $this->ThreeAnsQuestion_model->edit($id, $question, $a, $b ,$c, $correct);
        
        }
    
}



