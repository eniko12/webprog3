<?php
class ThreeAnsFileUpload_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('Create_model');
       }
       
        public function getDataFromFileThreeAns(){
        $myfile = fopen("./uploads/ThreeAns/threeAns.txt", "r") or die("Unable to open file!");
        
        $questions = array();
        
        while(!feof($myfile)) {
          $line = fgets($myfile);
          $parts = explode('|', $line);
          $q =[
              'question' => $parts[0],
              'a' => $parts[1],
              'b' => $parts[2],
              'c' => $parts[3],
              'correct' => $parts[4]
          ];
          array_push($questions,$q);
        }
        fclose($myfile);
        return $questions;
    }
    
    public function addToDatabaseThreeAns(){
        $questions = $this->getDataFromFileThreeAns();
        for($i=0; $i<count($questions);$i++){
           $q =$questions[$i];
           $question = $q['question'];
           $a = $q['a'];
           $b = $q['b'];
           $c = $q['c'];
           $correct = $q['correct'];
           $this->Create_model->addThreeAns($question, $a, $b ,$c, $correct);
        }        
    }
       
}