<?php
class Edit_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('HelperModels/YNQuestion_model');
            $this->load->model('HelperModels/ThreeAnsQuestion_model');
       }
   
   
    
    public function editYN($id, String $question, $ans){
        return $this->YNQuestion_model->editYN($id, $question, $ans);       
    }
    
    public function editThreeAns($id, $question, $a, $b ,$c, $correct){
        return $this->ThreeAnsQuestion_model->edit($id, $question, $a, $b ,$c, $correct);
    }
    
}
