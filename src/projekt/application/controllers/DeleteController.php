<?php
class DeleteController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('DeleteModel');
    }
    
    
    public function deleteThreeAns($id){
        $this->DeleteModel->deleteThreeAns($id);        
    }
    
    public function deleteYN($id){
        $this->DeleteModel->deleteYN($id);       
    }
    
}
