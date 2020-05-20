<?php
class Question_Model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
       }
   
    public $QIdNumber = "0000";
    public function addNewYN($question, $correct){ 
       
    }
    
    public function getQuestion(String $id){
        $this->db->query("SELECT * FROM questions where id =". $id.";");
    }
}