<?php
class Answer extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Answer_model');
       
    }
    
    
    public function answerId($Id = NULL){
        if($Id == NULL){
            show_error('Hiányzik az ID');
        }    
        $record = $this->Answer_model->getAnswerById($Id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }       
       else{            
            $view_params = [
                'a'    =>  $record
            ];

            $this->load->helper('form');
           
            $this->load->view('Answer/listAns',$view_params);
        }
    }    
    
    public function showAll(){         
        $record = $this->Answer_model->getAll();
        if($record == NULL){
            show_error('Nem található egy kérdés sem!');
        }       
       else{            
            $view_params = [
                'a'    =>  $record
            ];

            $this->load->helper('form');           
            $this->load->view('Answer/listAns',$view_params);
        }      
    }
    
    public function addAns(String $a, String $b, String $c, String $correct){
        $this->Answer_model->addAnswer($a, $b ,$c, $correct);
                
        $this->load->helper('form');           
        $this->load->view('Answer/addAns');
    }
    
    public function deleteAns(int $id){
        $this->Answer_model->deleteAnswer($id);
        
        $this->load->helper('form');           
        $this->load->view('Answer/deletedAns');
    }
    
     public function edit(String $a, String $b, String $c, String $correct, $id = NULL){  
        if($id == NULL){
            show_error('A szerkesztéshez adjon meg egy id-t!');
        }    
        $record = $this->Answer_model->getAnswerById($id);
        if($record == NULL){
            show_error('Nem létezik ilyen rekord!');
        }
         $this->Answer_model->editAnswer($id, $a, $b ,$c, $correct);
            $view_params = [
                'a'    =>  $record
            ];

            $this->load->helper('form');
            $this->load->view('Answer/listAns',$view_params);
        }
    
}


