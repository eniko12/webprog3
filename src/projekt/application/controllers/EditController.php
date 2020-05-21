<?php
class EditController extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('EditModel');
    }
    
    
    public function editThreeAns($id, $question, $a, $b ,$c, $correct){
        $this->EditModel->editThreeAns($id, $question, $a, $b ,$c, $correct);        
    }
    
    public function editYN($id, String $question, $ans){
        $this->EditModel->editYN($id, $question, $ans);       
    }
    
}
