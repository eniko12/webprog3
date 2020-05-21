<?php
class CreateController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('CreateModel');
    }
    
    
    public function createThreeAns($question, $a, $b ,$c, $correct){
        $this->CreateModel->addThreeAns($question, $a, $b ,$c, $correct);        
    }
    
    public function createYN($q, $ans){
        $this->CreateModel->addYN($q, $ans);       
    }
    
}

