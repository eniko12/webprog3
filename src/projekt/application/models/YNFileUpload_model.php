<?php
class YNFileUpload_model extends CI_Model{
    public function __construct(){
            parent::__construct();

          $this->load->database();
          $this->load->model('Create_model'); 
       }
       
       public function getDataFromFileYN(){
        $myfile = fopen("./uploads/YN/YN.txt", "r") or die("Unable to open file!");
        
        $questions = array();
        
        while(!feof($myfile)) {
          $line = fgets($myfile);
          $parts = explode('|', $line);
          $q =[
              'question' => $parts[0],
              'answer' => $parts[1]
          ];
          array_push($questions,$q);
        }
        fclose($myfile);
        return $questions;
    }
    
    public function addToDatabaseThreeAns(){
        $questions = $this->getDataFromFileYN();
        for($i=0; $i<count($questions);$i++){
           $q =$questions[$i];
           $question = $q['question'];
           $ans = $q['answer'];
           $this->Create_model->addYN($question, $ans);
        }
    } 
}