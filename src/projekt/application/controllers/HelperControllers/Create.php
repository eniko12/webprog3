<?php
class Create extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Create_model');
    }
    
    
    public function createThreeAns($question, $a, $b ,$c, $correct){
        $this->Create_model->addThreeAns($question, $a, $b ,$c, $correct);        
    }
    
    public function createYN($q, $ans){
        $this->Create_model->addYN($q, $ans);       
    }
    
}

