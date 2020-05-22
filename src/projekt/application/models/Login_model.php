<?php
class Login_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('User_model');
       }
   
    
    public function login($username, $passw){
        $u = $this->User_model->getByName($username);
        if($u == NULL){
            show_error('Nem létezik ilyen felhasználó!');
        } 
        else
        {
            $user =$u[0];
            if($this->checkPassw($user, $passw)){
                $Id= $user->id;
                return $this->doTheLogin($Id);          
             }
             else{
                 return 0;
             }
        }
    }
    
    public function checkPassw($user,$passw){
        if($user->password == $passw){
            return true;
        }
        else { 
            return false;
        }
    }
    public function checkIfNotLoggedIn($Id){
        $u =$this->User_model->getById($Id);
        $logged = $u[0]->loggedin;
        if($logged == 1){
            return false;
        }
        else{
            return true;
        }
    }
    
    public function doTheLogin($Id){
        if($this->checkIfNotLoggedIn($Id)){   
            $user2 = $this->User_model->getById($Id);
            $this->User_model->edit($Id,$user2[0]->email,$user2[0]->username,$user2[0]->password,$user2[0]->admin,1);
          }
         else{
          return 0;
         }
    }
    
 
}