<?php
class Edit extends CI_Controller{
    public function __construct(){
        parent::__construct();
        
        $this->load->model('Edit_model');
    }
    
    
    public function editThreeAns($id, $question, $a, $b ,$c, $correct){
        $this->Edit_model->editThreeAns($id, $question, $a, $b ,$c, $correct);        
    }
    
    public function editYN($id, String $question, $ans){
        $this->Edit_model->editYN($id, $question, $ans);       
    }
    
}
