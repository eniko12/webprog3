<?php
class Delete extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Delete_model');
    }
    
    
    public function deleteThreeAns($id){
        $this->Delete_model->deleteThreeAns($id);        
    }
    
    public function deleteYN($id){
        $this->Delete_model->deleteYN($id);       
    }
    
}
