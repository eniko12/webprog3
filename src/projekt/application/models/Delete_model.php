<?php
class Delete_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('HelperModels/YNQuestion_model');
            $this->load->model('HelperModels/ThreeAnsQuestion_model');
       }
   
   
    
    public function deleteYN($id){
        return $this->YNQuestion_model->deleteYN($id);        
    }
    
    public function deleteThreeAns($id){
        return $this->ThreeAnsQuestion_model->delete($id);
    }
    
}
