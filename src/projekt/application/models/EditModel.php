<?php
class EditModel extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('HelperModels/YNQuestionModel');
            $this->load->model('HelperModels/ThreeAnsQuestionModel');
       }
   
   
    
    public function editYN($id, String $question, $ans){
        return $this->YNQuestionModel->editYN($id, $question, $ans);       
    }
    
    public function editThreeAns($id, $question, $a, $b ,$c, $correct){
        return $this->ThreeAnsQuestionModel->edit($id, $question, $a, $b ,$c, $correct);
    }
    
}
