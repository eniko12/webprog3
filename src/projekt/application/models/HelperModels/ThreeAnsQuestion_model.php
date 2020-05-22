<?php
class ThreeAnsQuestion_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
       }
   
    
    public function GenerateId(){
    
        $id = rand(1000000, 9999999);
        return $id;
    }
    
    public function create($question, $a, $b ,$c, $correct){
        $id="A".$this->GenerateId();
        $type = 0;
        $record = ['id'  => $id,'question'   =>  $question,];
       $this->db->insert('questions',$record);       
       $recordAns = ['a'  => $a,'b'  => $b,'c'  => $c,'correct'  => $correct,];
       $this->db->insert('answer',$recordAns); 
       
       $this->db->select('id');
       $this->db->from('answer');
       $this->db->where('correct', $correct);
       $query= $this->db->get();
       $row = $query->row();
       $aId= $row->id;
       
       $record3 = [
           'question_id' => $id,
           'ans_id' =>$aId,
           'type_id' => $type
       ];
       return $this->db->insert('threeansq',$record3);
    }
    
    public function delete($id){
        $this->db->select('*');
        $this->db->from('threeansq');        
        $this->db->where('id',$id);  
        $query= $this->db->get();
        $row = $query->row();
        $qId= $row->question_id;
        $aId =$row->ans_id;
        
        $this->db->where('id',$qId);
        $this->db->delete('questions');
        
        $this->db->where('id',$aId);
        $this->db->delete('answer');
        
        $this->db->where('id',$id);
        return $this->db->delete('threeansq');
    }
    
      public function edit($id, $question, $a, $b ,$c, $correct){       
        $this->db->select('*');
        $this->db->from('threeansq');
        $this->db->where('id',$id);
        $row = $this->db->get()->row();
        $qId = $row->question_id;
        $aId = $row->ans_id;
          
        $record =[
            'id'  =>  $qId,
            'question'   =>  $question,
        ];
        $this->db->where('id',$qId);        
        $this->db->update('questions',$record);
        
        $recordAns = [
           'id'=>$aId,
           'a'  => $a,
           'b'  => $b,
           'c'  => $c,
           'correct'  => $correct,];
        $this->db->where('id',$aId);        
        return $this->db->update('answer',$recordAns);
        
    }
    
    
    public function getById(int $id){
        $this->db->select("*");
        $this->db->from('threeansq');
        $this->db->where('id',$id); 
        
        $query= $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function getAll(){
       $this->db->select('*');
       $this->db->from('threeansq');
       
       $query = $this->db->get(); 
       $result = $query->result(); 
    
       return $result;    
    }    
  }

