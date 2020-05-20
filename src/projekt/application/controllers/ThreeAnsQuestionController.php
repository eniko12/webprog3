<?php
class ThreeAnsQuestionController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('ThreeAnsQuestionModel');
       
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
        $record = $this->ThreeAnsQuestionModel->getAll();
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
        $this->ThreeAnsQuestionModel->create($question, $a, $b ,$c, $correct);
                
        $this->load->helper('form');           
        $this->load->view('YNQuestion/created');
    }
    
    public function delete(int $id){
        $this->ThreeAnsQuestionModel->delete($id);
        
        $this->load->helper('form');           
        $this->load->view('YNQuestion/deleted');
    }
    
     public function edit($question, $a, $b ,$c, $correct, $id = NULL){  
        if($id == NULL){
            show_error('A szerkesztéshez adjon meg egy id-t!');
        }    
        $record = $this->ThreeAnsQuestionModel->getById($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
         $this->ThreeAnsQuestionModel->edit($id, $question, $a, $b ,$c, $correct);
        
        }
    
}



