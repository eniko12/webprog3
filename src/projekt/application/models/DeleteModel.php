<?php
class DeleteModel extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('HelperModels/YNQuestionModel');
            $this->load->model('HelperModels/ThreeAnsQuestionModel');
       }
   
   
    
    public function deleteYN($id){
        return $this->YNQuestionModel->deleteYN($id);        
    }
    
    public function deleteThreeAns($id){
        return $this->ThreeAnsQuestionModel->delete($id);
    }
    
}
