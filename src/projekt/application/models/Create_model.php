<?php
class Create_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('HelperModels/YNQuestion_model');
            $this->load->model('HelperModels/ThreeAnsQuestion_model');
       }
   
   
    
    public function addYN($question, $ans){
        return $this->YNQuestion_model->create($question, $ans);        
    }
    
    public function addThreeAns($question, $a, $b ,$c, $correct){
        return $this->ThreeAnsQuestion_model->create($question, $a, $b ,$c, $correct);
    }
    
}