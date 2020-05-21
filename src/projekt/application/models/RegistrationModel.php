<?php
class RegistrationModel extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
             $this->load->model('HelperModels/UserModel');
       }
   
    
    public function register($email, $username, $passw){
        return $this->UserModel->addUser($email, $username, $passw);    
    }
    
     public function registerAdmin($email, $username, $passw){
        return $this->UserModel->addAdmin($email, $username, $passw);    
    }
    
        
    
}
