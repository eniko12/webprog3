<?php
class Random_model extends CI_Model{
    public function __construct(){
            parent::__construct();

            $this->load->database();
            $this->load->model('ShowAll_model');
       }
   
       
       public function getRandomYNMaxFromCount(){
            $all=$this->ShowAll_model->showYn();
            return count($all)-1;
       }
  
    public function RandomForYN(){    
        $rnd = rand(0, $this->getRandomYNMaxFromCount());
        return $rnd;
    }
    
    public function getRandomThreeAnsMaxFromCount(){
            $all=$this->ShowAll_model->showThreeAns();
            return count($all)-1;
    }
    
   public function RandomForThreeAns(){    
        $rnd = rand(0, $this->getRandomYNMaxFromCount());
        return $rnd;
    }
    
    
    public function getRandomThreeAnsQ(){
        $question =$this->ShowAll_model->showThreeAns();
        $ThreeAnsRandomQ = array();
        for($i=0; $i<=3; $i++) :
            array_push($ThreeAnsRandomQ, $question[$this->RandomForThreeAns()]);
        endfor;
        return $ThreeAnsRandomQ;
    }
    
    public function getRandomYNQ(){
        $question =$this->ShowAll_model->showYN();
        $YNRandomQ = array();
        for($i=0; $i<=3; $i++) :
           array_push($YNRandomQ, $question[$this->RandomForYN()]);
        endfor;
        return $YNRandomQ;
    }
    
    
}