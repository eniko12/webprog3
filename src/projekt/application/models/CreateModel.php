<?php
class CreateModel extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('YNQuestionModel');
            $this->load->model('ThreeAnsQuestionModel');
       }
   
   
    
    public function addYN($question, $ans){
        return $this->YNQuestionModel->create($question, $ans);        
    }
    
    public function addThreeAns($question, $a, $b ,$c, $correct){
        return $this->ThreeAnsQuestionModel->create($question, $a, $b ,$c, $correct);
    }
    
}