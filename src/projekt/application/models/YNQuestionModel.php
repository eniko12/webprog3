<?php
class YNQuestionModel extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
       }
   
    
    public function GenerateId(){
    
        $id = rand(1000000, 9999999);
        return $id;
    }
    
    public function create($question, $ans){
        $id="A".$this->GenerateId();
        $type = 1;
        $record = [
            'id'  => $id, 
            'question'   =>  $question,
        ];
       $this->db->insert('questions',$record);
       $recordYN = [
           'question_id' => $id,
           'answer' =>$ans,
           'type_id' => $type
       ];
       return $this->db->insert('yesnoq',$recordYN);
    }
    
    public function deleteYN($id){
        $this->db->select('*');
        $this->db->from('yesnoq');
        $this->db->where('id',$id);
        $row = $this->db->get()->row();
        $qId = $row->question_id;
        $this->db->where('id',$qId);
        $this->db->delete('questions');
        
       $this->db->where('id',$id);
       $this->db->delete('yesnoq');
    }
    
      public function editYN($id, String $question, $ans){
        $record = [
            'id'  =>  $id, 
            'answer'   =>  $ans,
        ];
        $this->db->where('id',$id);
        $this->db->update('yesnoq',$record);
        
        $this->db->select('*');
        $this->db->from('yesnoq');
        $this->db->where('id',$id);
        $row = $this->db->get()->row();
        $qId = $row->question_id;
        
            
        $record2 = [
            'id'  =>  $qId,
            'question'   =>  $question,
        ];
        $this->db->where('id',$qId);        
        return $this->db->update('questions',$record2);
    }
    
    
    public function getById(int $id){
        $this->db->select("*");
        $this->db->from('yesnoq');
        $this->db->where('id',$id); 
        
        $query= $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function getAll(){
       $this->db->select('*');
       $this->db->from('yesnoq');
       
       $query = $this->db->get(); 
       $result = $query->result(); 
    
       return $result;    
    }    
  }
