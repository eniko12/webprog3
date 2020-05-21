<?php
class ShowAllModel extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('HelperModels/YNQuestionModel');
            $this->load->model('HelperModels/ThreeAnsQuestionModel');
       }
   
   
    
    public function showYN(){
        return $this->YNQuestionModel->getAll();       
    }
    
    public function showThreeAns(){
        return $this->ThreeAnsQuestionModel->getAll();
    }
    
    public function getQByIdYN($id){
        $this->db->select('*');
        $this->db->from('yesnoq');
        $this->db->where('id',$id);
        $row = $this->db->get()->row();
        $qId = $row->question_id;
        return $this->getQuestion($qId);        
    }
    
      public function getQByIdThreeAns($id){
        $this->db->select('*');
        $this->db->from('threeansq');
        $this->db->where('id',$id);
        $row = $this->db->get()->row();
        $qId = $row->question_id;
        return $this->getQuestion($qId);  
    }
    
    public function getQuestion($id){
        $this->db->select("*");
        $this->db->from('questions');
        $this->db->where('id',$id); 
        
        $row = $this->db->get()->row();
        $result = $row->question;
        
        return $result;
    }
    
}