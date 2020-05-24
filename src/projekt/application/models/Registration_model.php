<?php
class Registration_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
             $this->load->model('User_model');
       }
   
    
    public function register($email, $username, $passw){
        return $this->User_model->addUser($email, $username, $passw);    
    }
    
    public function registerAdmin($email, $username, $passw){
        return $this->User_model->addAdmin($email, $username, $passw);    
    }
    
    public function adminExists($username){
        if($this->User_model->getByName($username) == NULL){
            return false;
        }
        else{
            return true;
        }
    }
    
    public function addFirstAdmin($email, $username,$password){
           if($this->adminExists($username)){               
           }else{
                $this->registerAdmin($email,$username, password_hash($password, PASSWORD_DEFAULT));
           }
     }
 
}
