<?php
class Logout_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('User_model');
       }
   
    
    public function logout($username){
        $u = $this->User_model->getByName($username);
        if($u == NULL){
            show_error('Nem létezik ilyen felhasználó!');
        } 
        else
        {
            $user =$u[0];
            
                $Id= $user->id;
                return $this->doTheLogout($Id);          
            
        }
    }
  
    public function checkIfLoggedIn($Id){
        $u =$this->User_model->getById($Id);
        $logged = $u[0]->loggedin;
        if($logged == 1){
            return true;
        }
        else{
            return false;
        }
    }
    
    public function doTheLogout($Id){
        if($this->checkIfLoggedIn($Id)){   
            $user2 = $this->User_model->getById($Id);
            $this->User_model->edit($Id,$user2[0]->email,$user2[0]->username,$user2[0]->password,$user2[0]->admin,0);
          }
         else{
          return 0;
         }
    }
    
 
}