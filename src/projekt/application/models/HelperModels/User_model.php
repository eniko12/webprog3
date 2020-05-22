<?php
class User_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
       }
   
    
    public function addUser($email, $username, $passw){        
        $record = [
            'email'  => $email, 
            'username'   =>  $username,
            'password' => $passw,
            'admin' => 0
        ];
       return $this->db->insert('user',$record);
    }
    
    public function addAdmin($email, $username, $passw){        
        $record = [
            'email'  => $email, 
            'username'   =>  $username,
            'password' => $passw,
            'admin' => 1
        ];
       return $this->db->insert('user',$record);
    }
    
    
    public function deleteUser ($id){
        $this->db->where('id',$id);
        return $this->db->delete('user');
    }
    
      public function edit($id, $question){
        $record = [
            'id'  =>  $id, 
            'question'   =>  $question,
        ];
        $this->db->where('id',$id);
        return $this->db->update('questions',$record);
    }
    
    
    public function getById(String $id){
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('id',$id); 
        
        $query= $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function getAll(){
       $this->db->select('*');
       $this->db->from('user');
       
       $query = $this->db->get(); 
       $result = $query->result(); 
    
       return $result;    
    }    
  }
