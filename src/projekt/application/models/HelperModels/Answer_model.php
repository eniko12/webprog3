<?php
class Answer_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
       }
   
    
    public function addAnswer( $a, $b ,$c, $correct){
        $record = [
            'a'  => $a, 
            'b'  => $b,
            'c'  => $c,
            'correct'  => $correct,
        ];
       return $this->db->insert('answer',$record);
    }
    
    public function deleteAnswer ($id){
        $this->db->where('id',$id);
        return $this->db->delete('answer');
    }
    
      public function editAnswer($id, $a, $b ,$c, $correct){
        $record = [
            'id'  =>  $id, 
            'a'  => $a, 
            'b'  => $b,
            'c'  => $c,
            'correct'  => $correct,
        ];
        $this->db->where('id',$id);
        return $this->db->update('answer',$record);
    }
    
    
    public function getAnswerById(int $id){
        $this->db->select("*");
        $this->db->from('answer');
        $this->db->where('id',$id); 
        
        $query= $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function getAll(){
       $this->db->select('*');
       $this->db->from('answer');
       
       $query = $this->db->get(); 
       $result = $query->result(); 
    
       return $result;    
    }    
  }

