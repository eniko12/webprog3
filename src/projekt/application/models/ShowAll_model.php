<?php
class ShowAll_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('HelperModels/YNQuestion_model');
            $this->load->model('HelperModels/ThreeAnsQuestion_model');
       }
   
   
    
    public function showYN(){
        return $this->YNQuestion_model->getAll();       
    }
    
    public function showThreeAns(){
        return $this->ThreeAnsQuestion_model->getAll();
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
    
    public function getAnsById($id){
        $this->db->select('*');
        $this->db->from('threeansq');
        $this->db->where('id',$id);
        $row = $this->db->get()->row();
        $aId = $row->ans_id;
        return $this->getAnswer($aId);  
    }
    
    public function getAnswer($id){
        $this->db->select("*");
        $this->db->from('answer');
        $this->db->where('id',$id); 
        
        $row = $this->db->get()->row();
        $result = $row;
        
        return $result;
    }
    
}