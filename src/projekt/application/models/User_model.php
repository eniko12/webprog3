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
            'admin' => 0,
            'loggedin' => 0
        ];
       return $this->db->insert('user',$record);
    }
    
    public function addAdmin($email, $username, $passw){        
        $record = [
            'email'  => $email, 
            'username'   =>  $username,
            'password' => $passw,
            'admin' => 1,
            'loggedin' => 0
        ];
       return $this->db->insert('user',$record);
    }
    
    
    public function deleteUser ($id){
        $this->db->where('id',$id);
        return $this->db->delete('user');
    }
    
      public function edit($id,$email,$username,$passw,$admin,$loggedin){
          $record = [
            'id'  =>  $id, 
            'email'  => $email, 
            'username'   =>  $username,
            'password' => $passw,
            'admin' => $admin,
            'loggedin' => $loggedin            
        ];
        $this->db->where('id',$id);
        return $this->db->update('user',$record);
    }
    
    
    public function getById($id){
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('id',$id); 
        
        $query= $this->db->get();
        $result = $query->result();
        
        return $result;
    }
    
    public function getByName($username){
        $this->db->select("*");
        $this->db->from('user');
        $this->db->where('username',$username); 
        
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
