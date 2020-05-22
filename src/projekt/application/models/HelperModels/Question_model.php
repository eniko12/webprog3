<?php
class Question_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
       }
   
    
    public function GenerateId(){
    
        $id = rand(1000000, 9999999);
        return $id;
    }
    
    public function addQuestion ($question){
        $id="A".$this->GenerateId();
        $record = [
            'id'  => $id, 
            'question'   =>  $question,
        ];
       return $this->db->insert('questions',$record);
    }
    
    public function deleteQuestion ($id){
        $this->db->where('id',$id);
        return $this->db->delete('questions');
    }
    
      public function editQuestion($id, $question){
        $record = [
            'id'  =>  $id, 
            'question'   =>  $question,
        ];
        $this->db->where('id',$id);
        return $this->db->update('questions',$record);
    }
    
    
    public function getQuestionById(String $id){
        $this->db->select("*");
        $this->db->from('questions');
        $this->db->where('id',$id); 
        
        $query= $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function getAll(){
       $this->db->select('*');
       $this->db->from('questions');
       
       $query = $this->db->get(); 
       $result = $query->result(); 
    
       return $result;    
    }    
  }